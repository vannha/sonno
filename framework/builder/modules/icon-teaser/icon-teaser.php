<?php

/**
 * Module: Icon Teaser
 * Display a brief text with a link and use hundreds of built-in icons
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Icon_Teaser extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        // Widget variable settings
        $this->path = get_template_directory().'/framework/builder/modules/icon-teaser';
        $this->cssclass = 'module-icon-teaser';
        $this->description = esc_html__( 'Display a brief text with a link and use of icons.', 'sonno' );
        $this->id_base = 'spyropress_icon_teaser';
        $this->name = esc_html__( 'Icon Teaser', 'sonno' );
        
        //template.
        $this->templates['view'] = array( 'view' => 'view.php', 'label' =>esc_html__( 'Style One', 'sonno' ) );
        $this->templates['view-one'] = array( 'view' => 'view-one.php', 'label' =>esc_html__( 'Style Two', 'sonno' ) );
        
        // Fields
        $this->fields = array (
            
            array(
                'label' => esc_html__( 'Template', 'sonno' ),
                'id' => 'template',
                'class' => 'enable_changer section-full',
                'type' => 'select',
                'options' => $this->get_option_templates()
            ),
             
            array(
                'label' => esc_html__( 'Columns', 'sonno' ),
                'id' => 'spyropress_columns',
                'class' => 'template view section-full',
                'type' => 'select',
                'options' => array(
                    2 => esc_html__( '2 Column', 'sonno' ),
                    3 => esc_html__( '3 Column', 'sonno' ),
                    4 => esc_html__( '4 Column', 'sonno' ),
                )
            ),
            
            array(
                'label' => esc_html__( 'Teaser', 'sonno' ),
                'id' => 'spyropress_teasers',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
                    
                    array(
                        'label' => esc_html__( 'Title', 'sonno' ),
                        'id' => 'spyropress_title',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon', 'sonno' ),
                        'id' => 'spyropress_icon',
                        'type' => 'select',
                        'options' => spyropress_get_options_moon_icons()
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon Color', 'sonno' ),
                        'id' => 'spyropress_icon_color',
                        'type' => 'select',
                        'options' => array(
                            'icon-primary' => esc_html__( 'Primary', 'sonno' ),
                            'icon-secondary' => esc_html__( 'Secondary', 'sonno' ),
                            'icon-tertiary' => esc_html__( 'Tertiary', 'sonno' ),
                            'icon-quaternary' => esc_html__( 'Quaternary', 'sonno' )
                        )
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon Size', 'sonno' ),
                        'id' => 'spyropress_icon_size',
                        'class' => 'template view-one',
                        'type' => 'select',
                        'options' => array(
                            'icon-2x' => esc_html__( 'Small', 'sonno' ),
                            'icon-3x' => esc_html__( 'Normal', 'sonno' ),
                            'icon-4x' => esc_html__( 'Large', 'sonno' ),
                            'icon-5x' => esc_html__( 'Extra Large', 'sonno' )
                        )
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon Postion', 'sonno' ),
                        'id' => 'spyropress_icon_pos',
                        'class' => 'template view-one',
                        'type' => 'select',
                        'options' => array(
                            'alignleft' => esc_html__( 'Left', 'sonno' ),
                            'alignright' => esc_html__( 'Right', 'sonno' )
                        ),'std' => 'alignleft'
                    ),
        
                    array(
                        'label' => esc_html__( 'Content', 'sonno' ),
                        'id' => 'spyropress_content',
                        'type' => 'textarea',
                        'rows' => 3
                    ) 
                )
            )
        );
        
        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {
        
        // extracting info
        extract( $spyropress_args ); extract( $spyropress_instance );
        
        //Get the Template 
        $spyropress_template = isset( $spyropress_instance['template'] ) ? $spyropress_instance['template'] : '';

        //Include View File.
        require( $this->get_view( $spyropress_template ) );
    }
    
    function spyropress_generate_teaser_one( $spyropress_item, $spyropress_atts ){
        
        //Icon Class for Type Color Size
        $spyropress_icons = array( 'icon' );
        if( isset( $spyropress_item['spyropress_icon'] ) ){
            $spyropress_icons[] = $spyropress_item['spyropress_icon'];
        }
        if( isset( $spyropress_item['spyropress_icon_color'] ) ){
            $spyropress_icons[] = $spyropress_item['spyropress_icon_color'];
        }
        $spyropress_title = isset($spyropress_item['spyropress_title']) ? $spyropress_item['spyropress_title'] : '';
        $spyropress_content = isset($spyropress_item['spyropress_content']) ? $spyropress_item['spyropress_content'] : '';
        
        if (!empty('spyropress_title') || !empty('spyropress_content')) :
            //Retrun Html
            return 
            '<div class="'. esc_attr( $spyropress_atts['column_class'] ) .'">
                <span class="'. esc_attr( spyropress_clean_cssclass( $spyropress_icons ) ) .'"></span>
                <h5>'. esc_html( $spyropress_title ) .'</h5>
                <p>'. esc_html( $spyropress_content ) .'</p>
            </div>';
        endif;
    }
    
    function spyropress_generate_teaser_two( $spyropress_item, $spyropress_atts ){
        
        //Icon Class for Type Color Size
        $spyropress_icons = array( 'icon' );
        if( isset( $spyropress_item['spyropress_icon'] ) ){
            $spyropress_icons[] = $spyropress_item['spyropress_icon'];
        }
        if( isset( $spyropress_item['spyropress_icon_color'] ) ){
            $spyropress_icons[] = $spyropress_item['spyropress_icon_color'];
        }
        if( isset( $spyropress_item['spyropress_icon_size'] ) ){
            $spyropress_icons[] = $spyropress_item['spyropress_icon_size'];
        }
        if( isset( $spyropress_item['spyropress_icon_pos'] ) ){
            $spyropress_icons[] = $spyropress_item['spyropress_icon_pos'];
        }
        $spyropress_title = isset($spyropress_item['spyropress_title']) ? $spyropress_item['spyropress_title'] : '';
        $spyropress_content = isset($spyropress_item['spyropress_content']) ? $spyropress_item['spyropress_content'] : '';
        
        if (!empty('spyropress_title') || !empty('spyropress_content')) :
           return 
        '<li>
            <span class="'. esc_attr( spyropress_clean_cssclass( $spyropress_icons ) ) .'"></span>
            <h5>'. esc_html( $spyropress_title ) .'</h5>
            <p>'. esc_html( $spyropress_content ) .'</p>
        </li>';
        endif;
        //Retrun Html
        
    }

}
//Register Module Class Spyropress_Module_Icon_Teaser
spyropress_builder_register_module( 'Spyropress_Module_Icon_Teaser' );