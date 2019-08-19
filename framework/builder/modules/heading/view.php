<?php  
    //Print Conetns.
    if( $spyropress_heading ){
    	$spyropress_style = !empty($spyropress_style) ? $spyropress_style : '';
        printf(
            '<div class="title-section %3$s"><%1$s>%2$s</%1$s></div>',esc_attr( $spyropress_html_tag ), wp_kses( $spyropress_heading, array( 'br' => array(), 'strong' => array() ) ),esc_attr( $spyropress_style )
        );
    }
        
    