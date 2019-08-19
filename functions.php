<?php

/**
 * SpyroPress is a theme framework for professional WordPress theme designing developed by SpyroSol.
 *
 * DON'T HACK ME!! You should NOT modify the SpyroPress theme framework to avoid issues with updates in the future.
 * It's designed to offer cutting edge flexibility - with lots of ways to manipulate output!
 *
 * @package SpyroPress
 */

/**
 * Set Max Content Width
 */

if ( ! isset( $content_width ) )
    $content_width = 726;

if( !function_exists( 'spyropress_content_width' ) ) {
    function spyropress_content_width() {
        if( is_page_template( 'template-full-width.php' ) || is_attachment() ) {
            global $content_width;
            $content_width = 960;
        }
    }
}
add_action( 'template_redirect', 'spyropress_content_width' );

/**
 * Starting SpyroPress Engine
 */
load_template( get_template_directory() . '/framework/spyropress.php', true );
load_template( get_template_directory() . '/includes/init.php', true ); // Extending theme

/**
 * Add theme support for spyropress framework features
 */
add_action( 'after_setup_theme', 'spyropress_theme_setup', 4 );
function spyropress_theme_setup() {

    // Add wordpress features
    add_theme_support( 'automatic-feed-links' );

    // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
    add_theme_support( 'post-thumbnails' );
    
    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style( assets_css() . 'editor-style.css' );
    
    // Root Relative Urls Support
    add_theme_support( 'relative-urls' );

    // SpyroPress Builder
    add_theme_support( 'spyropress-builder' );
	
	// Custom CSS Editor
    add_theme_support( 'spyropress-ace' );
    
    //Title
    add_theme_support( "title-tag" );
    
    //Custom Header
    $spyropress_defaults = array(
    	'default-image'          => '',
    	'random-default'         => false,
    	'width'                  => 0,
    	'height'                 => 0,
    	'flex-height'            => false,
    	'flex-width'             => false,
    	'default-text-color'     => '',
    	'header-text'            => true,
    	'uploads'                => true,
    	'wp-head-callback'       => '',
    	'admin-head-callback'    => '',
    	'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $spyropress_defaults );
    
    //Custom Background
    $spyropress_defaults = array(
    	'default-color'          => '',
    	'default-image'          => '',
    	'default-repeat'         => '',
    	'default-position-x'     => '',
    	'default-attachment'     => '',
    	'wp-head-callback'       => '_custom_background_cb',
    	'admin-head-callback'    => '',
    	'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $spyropress_defaults );

    // Add post formats (http://codex.wordpress.org/Post_Formats)
    add_theme_support( 'post-formats', array(
        'image'
    ) );

    // Add Components
    add_theme_support( 'spyropress-components', array(
        'bucket',
        'portfolio',
        'pricing-table',
        'testimonials',
        'portfolio',
        'slider',
        'staff',
        'page',
        'post',
        'bootstrap-nav',
        'pagination'
    ) );

    // Add Sliders
    add_theme_support( 'spyropress-sliders', array( 'flex' => esc_html__( 'Flex Slider', 'sonno' )) );

    // Add Menus
    add_theme_support( 'spyropress-core-menus', array(
        'primary' => 'Main'
    ) );

    // Add Sidebars
    $spyropress_sidebars = array(
        'primary' => array(
            'name' => esc_html__( 'Primary', 'sonno' ),
            'description' => esc_html__( 'The main (primary) widget area, most often used as a sidebar.','sonno' ),
            'before_widget' => '<div id="%1$s" class="widget widget_sidebar %2$s">',
            'after_widget' => '</div><div class="clearfix"></div>',
            'before_title' => '<h5 class="title-aside">',
            'after_title' => '</h5>'
        ),
        'footer-1' => array(
            'name' => esc_html__( 'Footer One', 'sonno' ),
            'description' => esc_html__( 'The footer most important widget area, most often used as a footer one sidebar.', 'sonno' ),
            'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ),
        'footer-2' => array(
            'name' => esc_html__( 'Footer Two', 'sonno' ),
            'description' => esc_html__( 'The footer most important widget area, most often used as a footer two sidebar.', 'sonno' ),
            'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ),
        'footer-3' => array(
            'name' => esc_html__( 'Footer Three', 'sonno' ),
            'description' => esc_html__( 'The footer most important widget area, most often used as a footer three sidebar.', 'sonno' ),
            'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        )
    );
    add_theme_support( 'spyropress-core-sidebars', $spyropress_sidebars );

    // Options
    $spyropress_options = array(
        'theme' => array(
            'page_title' => esc_html__( 'Theme Options', 'sonno' ),
            'menu_title' => esc_html__( 'Theme Options', 'sonno' ),
            'isactive' => true,
            'hidden' => false
        )
    );
    add_theme_support( 'spyropress-options', $spyropress_options );
    
    /* load demo data setting */
    require_once( get_template_directory() . '/inc/demo-data.php' );
}

function sonno_html($html){
     return $html;
}
// disable for posts
add_filter( 'use_block_editor_for_post', '__return_false', 100 );
