<?php
// chcek
if ( empty( $spyropress_accordions ) ) return;

global $spyropress_accordion_ids;
$spyropress_count = 0;
++$spyropress_accordion_ids;
    
echo '<div class="panel-group" id="accordion'. esc_attr( $spyropress_accordion_ids ). '">';
    foreach( $spyropress_accordions as $spyropress_accordion ) {
        ++$spyropress_count;
        $spyropress_active = ( $spyropress_count == 1 ) ? ' in' : '';
        
        // content
        if( isset( $spyropress_accordion['bucket'] ) ) {
            $spyropress_args = array(
                'post_type' => 'bucket',
                'p' => $spyropress_accordion['bucket']
            );
            $spyropress_query = new WP_Query( $spyropress_args );
            while( $spyropress_query->have_posts() ) {
                $spyropress_query->the_post();
                $spyropress_xcontent = spyropress_get_the_content();
            }
            wp_reset_postdata();
        }
        else {
            $spyropress_xcontent = isset($spyropress_accordion['spyropress_content']) ? $spyropress_accordion['spyropress_content'] : '';
        }
        
        //Icon Class for Type and Color
        $spyropress_icons = array( 'icon' );
        if( isset( $spyropress_accordion['spyropress_icon'] ) ){
                $spyropress_icons[] = $spyropress_accordion['spyropress_icon'];
        }
        if( isset( $spyropress_accordion['spyropress_icon_color'] ) ){
            $spyropress_icons[] = $spyropress_accordion['spyropress_icon_color'];
        }
        $spyropress_icon = isset( $spyropress_accordion['spyropress_icon'] ) ? '<span class="'. esc_attr( spyropress_clean_cssclass( $spyropress_icons ) ) .'"></span>' : '';
        $spyropress_title =  isset($spyropress_accordion['spyropress_title']) ? $spyropress_accordion['spyropress_title'] : '';
        //Contents
        if (!empty($spyropress_xcontent) || !empty($spyropress_title)): 
        echo '<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">'. wp_kses( $spyropress_icon, array( 'span' => array( 'class' => array() ) ) ) .'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion' . esc_attr( $spyropress_accordion_ids ) . '" href="#collapse' . esc_attr( $spyropress_count ) . esc_attr( $spyropress_accordion_ids )  . '">' . wp_kses( $spyropress_icon, array( 'span' => array( 'class' => array() ) ) ) . esc_html( $spyropress_title ) . '</a></h4>
                </div>
                <div id="collapse' . esc_attr( $spyropress_count ) . esc_attr( $spyropress_accordion_ids ) . '" class="panel-collapse collapse' . esc_attr( $spyropress_active ) . '">
                    <div class="panel-body">' .  $spyropress_xcontent . '</div>
                </div>
            </div>';
        endif;
    }
    wp_reset_postdata();

echo '</div>';