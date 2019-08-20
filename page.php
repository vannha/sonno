<?php
/**
 * Default Page Template
 * 
 * @package Sonno
 * @author ThemeSuared
 * @link http://themesuared.com/sonno/
 */
 
    get_header();
    
    //Get Page Meta Value.
    $spyropress_options = get_post_meta( get_the_ID(), '_page_options', true );	
                    
    spyropress_before_main_container();
    
        if( !isset( $spyropress_options['breadcrumb'] ) && empty( $spyropress_options['breadcrumb'] ) ){
            get_template_part( 'templates/page', 'breadcrumb' );  //Include Page Breadcrumb Html. 
        }
        get_template_part( 'templates/slider' );  //Include Page Slider 
        
        spyropress_before_loop();
        
            while( have_posts() ) {
                the_post();
        
                spyropress_before_post();
                    
                    get_template_part( 'page', 'content' );
                    
                    // Page Comments 
                    if( !isset( $spyropress_options['comments'] ) && empty( $spyropress_options['comments'] ) ){
                    	echo '<div class="container">';
                        	comments_template( '', true );
                    	echo '</div>';
                    }
        
                spyropress_after_post();
            }
            
        spyropress_after_loop();

    spyropress_after_main_container();

get_footer(); 