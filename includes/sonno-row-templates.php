<?php
/**
 * SpyroPress Builder
 * Sonno builder row types
 */
/**
 * Full with
 */
class fullwidth_row_class extends SpyropressBuilderRow {

    public function __construct() {

        $this->config = array(
            'name' => esc_html__( 'Fullwidth Row', 'sonno' ),
            'description' => esc_html__( 'Fullwidth row', 'sonno' ),
            'icon' => get_panel_img_path( 'layouts/1col.png' ),
            'columns' => array(
                array( 'type' => 'col_11' )
            )
        );
    }
    
    function row_wrapper( $row_ID, $row ) {
        
        extract( $row['options'] );
    
         // CssClass
        $spyropress_section_class = array(); $spyropress_parallax = $spyropress_overlay = '';
        if( isset( $skin ) && !empty( $skin ) ){
            $spyropress_section_class[] = $skin;
        }
        if( !empty($skin) && $skin == 'parallax' ){
            $spyropress_parallax = 'data-background="'. $parallax_bg .'" data-speed="0.4"';
            $spyropress_overlay = '<div class="overlay"></div>';
        }else{
            $spyropress_section_class[] = 'section'; 
        }
            
    
        $spyropress_row_html = sprintf( '
            <div id="%1$s" class="%2$s" %5$s>
                %6$s
                <div class="%3$s">
                    %4$s
                </div>
            </div>', $row_ID, spyropress_clean_cssclass( $spyropress_section_class ), get_row_class( true ), builder_render_frontend_columns( $row['columns'] ), $spyropress_parallax, $spyropress_overlay
        );
    
        return $spyropress_row_html;
    }
}
spyropress_builder_register_row( 'fullwidth_row_class' );