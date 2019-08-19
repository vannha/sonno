<?php
/**
 * Module: Sub-Pages
 * A list of sub-page titles or excerpts.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Row_Options extends SpyropressBuilderModule {

    public function __construct() {

        $this->cssclass = 'row-options';
        $this->description = esc_html__( 'Set row options and styling here.', 'sonno' );
        $this->id_base = 'spyropress_row_options';
        $this->name = esc_html__( 'Row Options', 'sonno' );
        $this->show_custom_css = true;

        $spyropress_locations = get_registered_nav_menus();
        $spyropress_menus = wp_get_nav_menus();
        $spyropress_menu_options = array();

        if ( isset( $spyropress_locations ) && count( $spyropress_locations ) > 0 && isset( $spyropress_menus ) && count( $spyropress_menus ) > 0 ) {
            foreach ( $spyropress_menus as $spyropress_menu ) {
                $spyropress_menu_options[$spyropress_menu->term_id] = $spyropress_menu->name;
            }
        }

        // Fields
        $this->fields = array(

            array(
                'id' => 'show',
                'type' => 'checkbox',
                'options' => array(
                    '1' => '<strong>' . esc_html__( 'Disable this row temporarily', 'sonno' ) . '</strong>'
                )
            ),

            array(
                'label' => esc_html__( 'Section Skin', 'sonno' ),
                'id' => 'skin',
                'class' => 'enable_changer section-full',
                'type' => 'select',
                'options' => array(
                    'dark' => esc_html__( 'Dark Section', 'sonno' ),
                    'gray' => esc_html__( 'Gray Section', 'sonno' ),
                    'gallery' => esc_html__( 'Gallery Section', 'sonno' ),
                    'featured' => esc_html__( 'Featured Section', 'sonno' ),
                    'parallax' => esc_html__( 'Parallax Section', 'sonno' ),
                )
            ),
            
            array(
                'label' => esc_html__( 'Parallax Background', 'sonno' ),
                'id' => 'parallax_bg',
                'class' => 'skin parallax section-full',
                'type' => 'upload'
            )
        );

        if( !empty( $spyropress_menu_options ) ) {

            $this->fields[] = array(
                'label' => esc_html__( 'OnePage Menu Builder', 'sonno' ),
                'type' => 'sub_heading'
            );

            $this->fields[] = array(
                'label' => esc_html__( 'Select Menu', 'sonno' ),
                'id' => 'menu_id',
                'type' => 'select',
                'options' => $spyropress_menu_options
            );

            $this->fields[] = array(
                'label' => esc_html__( 'Menu Label', 'sonno' ),
                'id' => 'menu_label',
                'type' => 'text'
            );
        }

        $this->create_widget();

        add_filter( 'builder_save_row_css', array( $this, 'spyropress_compile_css' ), 10, 3 );
    }

    function after_validate_fields( $spyropress_instance = '' ) {

        if(
            isset( $spyropress_instance['menu_id'] ) && isset( $spyropress_instance['menu_label'] ) &&
            !empty( $spyropress_instance['menu_id'] ) && !empty( $spyropress_instance['menu_label'] )
        ) {

            $spyropress_key = sanitize_key( $spyropress_instance['menu_label'] );
            if( isset( $spyropress_instance['custom_container_id'] ) && !empty( $spyropress_instance['custom_container_id'] ) )
                 $spyropress_key = $spyropress_instance['custom_container_id'];
            else
                $spyropress_instance['custom_container_id'] = $spyropress_key;
            $spyropress_menu_link = '#HOME_URL#' . $spyropress_key;
            
            $spyropress_is_link = false;

            $spyropress_menu_items = wp_get_nav_menu_items( $spyropress_instance['menu_id'] );
            foreach ( $spyropress_menu_items as $spyropress_menu_item ) {
                if ( $spyropress_menu_item->url == $spyropress_menu_link ) {
                    $spyropress_is_link = true;
                    break;
                }
            }

            if ( ! $spyropress_is_link ) {
                wp_update_nav_menu_item( $spyropress_instance['menu_id'], 0, array(
                    'menu-item-title' => $spyropress_instance['menu_label'],
                    'menu-item-classes' => 'internal',
                    'menu-item-url' => $spyropress_menu_link,
                    'menu-item-status' => 'publish' ) );

                update_option( 'menu_check', true );
            }
        }
        return $spyropress_instance;
    }

    function spyropress_compile_css( $spyropress_row_id, $spyropress_instance, $old_instance ) {

        $spyropress_row_id = isset( $spyropress_instance['custom_container_id'] ) ? $spyropress_instance['custom_container_id'] : $row_id;
        $spyropress_row_class = isset( $spyropress_instance['custom_container_class'] ) ? $spyropress_instance['custom_container_class'] : '';
        $spyropress_insertion = '';

        // row custom css
        if ( isset( $spyropress_instance['row_custom_css'] ) && $spyropress_instance['row_custom_css'] ) {
            $spyropress_custom_css = $spyropress_instance['row_custom_css'];

            /**
             * @deprecated {this_row}
             * @version 3.10
             */
            $spyropress_custom_css = str_replace( '{this_row}', '#' . $spyropress_row_id, $spyropress_custom_css );

            /**
             * @since 3.10
             */
            $spyropress_custom_css = str_replace( '{row_id}', '#' . $spyropress_row_id, $spyropress_custom_css );
            $spyropress_custom_css = str_replace( '{row_class}', '.' . spyropress_uglify_cssclass( $spyropress_row_class ), $spyropress_custom_css );

            $spyropress_insertion .= $spyropress_custom_css;
        }

        return $spyropress_insertion;
    }
}