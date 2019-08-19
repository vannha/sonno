<?php
//Get Page Meta Data.
$spyropress_options = get_post_meta( get_the_ID(), '_page_options', true );

//Simple Slider.
if( isset( $spyropress_options['slider'] ) ) {
   echo do_shortcode( '[slider id="'. esc_attr( $spyropress_options['slider'] ) .'"]' );
}