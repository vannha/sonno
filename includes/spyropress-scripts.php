<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @category Core
 * @package SpyroPress
 *
 */

/**
 * Register StyleSheets
 */
function spyropress_register_stylesheets() {

    // Default stylesheets
    wp_enqueue_style( 'spyropress-bootstrap', assets_css() . 'bootstrap.min.css', false, false );
    wp_enqueue_style( 'spyropress-overwrite', assets_css() . 'overwrite.css', false, false );
    wp_enqueue_style( 'spyropress-stylesheet', assets() . 'fonts/open-sans/stylesheet.css', false, false );
    wp_enqueue_style( 'spyropress-icons', assets_css() . 'icons.css', false, false );
    wp_enqueue_style( 'spyropress-jssor-slider', assets_css() . 'jssor-slider.css', false, false );
    wp_enqueue_style( 'spyropress-jwgslider', assets_css() . 'jwgslider.css', false, false );
    wp_enqueue_style( 'spyropress-prettyPhoto', assets_css() . 'prettyPhoto.css', false, false );
    wp_enqueue_style( 'spyropress-owl-carousel', assets_css() . 'owl.carousel.css', false, false );
    wp_enqueue_style( 'spyropress-owl-theme', assets_css() . 'owl.theme.css', false, false );
    wp_enqueue_style( 'spyropress-owl-transitions', assets_css() . 'owl.transitions.css', false, false );
    wp_enqueue_style( 'spyropress-masonry', assets_css() . 'masonry.css', false, false );
    wp_enqueue_style( 'spyropress-flexslider', assets_css() . 'flexslider.css', false, false );
    wp_enqueue_style( 'spyropress-style', assets_css() . 'style.css', false, false );
    wp_enqueue_style( 'spyropress-default', assets_css() . 'skins/default.css', false, false );

    // Dynamic StyleSheet
    if ( file_exists( dynamic_css_path() . 'dynamic.css' ) )
        wp_enqueue_style( 'spyropress-dynamic', dynamic_css_url() . 'dynamic.css', false, '2.0.0' );

    // Builder StyleSheet
    if ( file_exists( dynamic_css_path() . 'builder.css' ) )
        wp_enqueue_style( 'spyropress-builder', dynamic_css_url() . 'builder.css', false, '2.0.0' );

}

/**
 * Enqueque Scripts
 */
function spyropress_register_scripts() {

    /**
     * Register Scripts
     */
    // threaded comments
    if ( is_single() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    // Plugins
    wp_register_script( 'spyropress-jquery-bootstrap', assets_js() . 'bootstrap.min.js', false, false, true );
    wp_register_script( 'spyropress-jquery-workaround', assets_js() . 'ie10-viewport-bug-workaround.js', false, false, true );
    wp_register_script( 'spyropress-jquery-easing', assets_js() . 'jquery.easing.1.3.js', array('jquery'), false, true );
    wp_register_script( 'spyropress-jquery-owl-carousel', assets_js() . 'owlcarousel/owl.carousel.js', false, false, true );
    wp_register_script( 'spyropress-jquery-jwgSlider', assets_js() . 'jwgslider/jwgSlider.js', false, false, true );
    wp_register_script( 'spyropress-jquery-parallax', assets_js() . 'parallax/jquery.parallax-1.1.3.js', false, false, true );
    wp_register_script( 'spyropress-jquery-isotope', assets_js() . 'isotope/isotope.pkgd.js', false, false, true );
    wp_register_script( 'spyropress-jquery-isotope-main', assets_js() . 'isotope/main.js', false, false, true );
    wp_register_script( 'spyropress-jquery-ticker', assets_js() . 'ticker/ticker.js', false, false, true );
    wp_register_script( 'spyropress-jquery-prettyPhoto', assets_js() . 'prettyPhoto/jquery.prettyPhoto.js', false, false, true );
    wp_register_script( 'spyropress-jquery-directional', assets_js() . 'hoverdirection/jquery.directional-hover.min.js', false, false, true );
    wp_register_script( 'spyropress-jquery-totop', assets_js() . 'totop/jquery.ui.totop.js', false, false, true );
    wp_register_script( 'spyropress-jquery-infinitescroll', assets_js() . 'infinitescroll/jquery.infinitescroll.js', false, false, true );
    wp_register_script( 'spyropress-jquery-flexslider', assets_js() . 'flexslider/jquery.flexslider-min.js', false, false, true );
    
    $spyropress_deps = array(
        'spyropress-jquery-bootstrap',
        'spyropress-jquery-workaround',
        'spyropress-jquery-easing',
        'spyropress-jquery-owl-carousel',
        'spyropress-jquery-jwgSlider',
        'spyropress-jquery-parallax',
        'spyropress-jquery-isotope',
        'spyropress-jquery-isotope-main',
        'spyropress-jquery-ticker',
        'spyropress-jquery-prettyPhoto',
        'spyropress-jquery-directional',
        'spyropress-jquery-totop',
        'spyropress-jquery-infinitescroll',
        'spyropress-jquery-flexslider'
    );
    // custom scripts
    wp_register_script( 'custom-script', assets_js() . 'custom.js', $spyropress_deps, false, true );

    /**
     * Enqueue All
     */
    wp_enqueue_script( 'custom-script' );
}

function spyropress_conditional_scripts() {

    $spyropress_content = '
    <!-- Just for debugging purposes. Don\'t actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="'. assets_js() .'ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="'. assets_js() .'ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="'. assets_js() .'html5shiv.min.js"></script>
      <script src="'. assets_js() .'respond.min.js"></script>
    <![endif]-->
      
    <!--[if IE 8]>
        <link href="'. assets_css() .'style.ie8.css" rel="stylesheet">
    <![endif]-->';

    echo get_relative_url( $spyropress_content );
}