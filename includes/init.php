<?php

/**
 * Init Theme Related Settings
 */

/** Internal Settings **/
//get_template_part( 'includes/version' );
require_once 'version.php';

/**
 * Required and Recommended Plugins
 */
function spyropress_register_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $spyropress_plugins = array(
        array(
            'name'      => esc_html__('Contact Form 7','sonno'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('MailChimp','sonno'),
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
        ),
        array(
            'name' => esc_html__('Custom Post Type','sonno'),
            'required' => true,
            'slug' => 'cpt',
            'source' => get_template_directory() . '/includes/plugins/cpt.zip'
        ),
        array(
            'name'               => esc_html__('Ef3 Import and Export','sonno'),
            'slug'               => 'ef3-import-and-export',
            'source'             => esc_url('http://spyropress.com/plugins/ef3-import-and-export.zip'),
            'required'           => false,
        ),
    );
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
    );

    tgmpa( $spyropress_plugins, $config );
    
   /* if( !class_exists('SpyropressCPT') ){
        tgmpa( $spyropress_plugins, array( 'parent_slug' => 'themes.php' ) );
    }else{
    	tgmpa( $spyropress_plugins, array(
        	'parent_slug' => 'spyropress'
    	) );
    }*/
}
add_action( 'tgmpa_register', 'spyropress_register_plugins' );

/**
 * Add modules and tempaltes to SpyroBuilder
 */
function spyropress_register_builder_modules( $modules ) {
    
    get_template_part ( '/includes/sonno-row', 'templates' );

    $spyropress_modules[] = 'modules/rich-text/rich-text.php';
    $spyropress_modules[] = 'modules/row-options/row-options.php';
    $spyropress_modules[] = 'modules/our-clients/clients.php';
    $spyropress_modules[] = 'modules/heading/heading.php';
    $spyropress_modules[] = 'modules/icon-teaser/icon-teaser.php';
    $spyropress_modules[] = 'modules/tabs/tabs.php';
    $spyropress_modules[] = 'modules/call-action/call-action.php';
    $spyropress_modules[] = 'modules/accordion/accordion.php';
    $spyropress_modules[] = 'modules/blog/blog.php';
    $spyropress_modules[] = 'modules/contact/contact.php';
    $spyropress_modules[] = 'modules/home-section/home-section.php';

    return $spyropress_modules;
}
add_filter( 'builder_include_modules', 'spyropress_register_builder_modules' );

/**
 * Define the row wrapper html
 */
function spyropress_row_wrapper( $row_ID, $row ) {
    
    extract( $row['options'] );
    $skin =  !empty($skin) ? $skin : '';
    // CssClass
    $spyropress_section_class = array(); $spyropress_parallax = $spyropress_overlay = '';
    if( isset( $skin ) && !empty( $skin ) ){
        $spyropress_section_class[] = $skin;
    }
    if( $skin == 'parallax' ){
        $spyropress_parallax = 'data-background="'. $parallax_bg .'" data-speed="0.4"';
        $spyropress_overlay = '<div class="overlay"></div>';
    }else{
        $spyropress_section_class[] = 'section'; 
    }
        

    $spyropress_row_html = sprintf( '
        <div id="%1$s" class="%2$s" %5$s>
            %6$s
            <div class="container">
                <div class="%3$s">
                    %4$s
                </div>
            </div>
        </div>', $row_ID, spyropress_clean_cssclass( $spyropress_section_class ), get_row_class( true ), builder_render_frontend_columns( $row['columns'] ), $spyropress_parallax, $spyropress_overlay
    );

    return $spyropress_row_html;
}
add_filter( 'spyropress_builder_row_wrapper', 'spyropress_row_wrapper', 10, 2 );

/**
 * Include Widgets
 */
function spyropress_register_widgets( $widgets ) {
    
    $spyropress_path = get_template_directory() . '/includes/widgets/';


    $spyropress_custom = array(
        $spyropress_path . 'recent-posts/recent-posts.php',
        $spyropress_path . 'ads/ads.php',
    );

    return array_merge( $widgets, $spyropress_custom );
}
add_filter( 'spyropress_register_widgets', 'spyropress_register_widgets' );


/**
 * Comment Callback
 */
if( !function_exists( 'spyropress_comment' ) ) :
function spyropress_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    
    //Translation Theme Option
    $spyropress_translate['comment-reply'] = get_setting( 'translate' ) ? get_setting( 'comment-reply', 'Reply' ) : esc_html__( 'Reply', 'sonno' );
	
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'sonno' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'sonno' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
    <div <?php comment_class('media'); ?> id="li-comment-<?php comment_ID(); ?>" >
		<div class="media-left" >
			<a href="<?php comment_author_url(); ?>">
                <?php 
                    $photo = get_avatar( $comment, 72 ); 
                    echo str_replace( 'photo', 'photo media-object', $photo );
                ?>
			</a>
		</div>
		<div class="media-body">
			<h6 class="media-heading"><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></h6>
			<?php if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sonno' ); ?></em><br />
            <?php
                }
                comment_text();
            ?>
			<p class="reply">
                <?php
                    comment_reply_link( array_merge( $args, array(
                        'depth' => $depth,
                        'reply_text' => $spyropress_translate['comment-reply'],
                        'max_depth' => $args['max_depth'],
                        'before' => '<i class="icon-link"></i>'
                    ) ) );
                ?>
            </p>
		</div>
    </div>
    
	<?php
			break;
	endswitch;
}
endif;

/**
 * Pagination Defaults
 */
function spyropress_pagination_defaults( $spyropress_defaults = array() ) {
    
    $spyropress_defaults['container'] = 'nav';
    $spyropress_defaults['style'] = 'list';
    $spyropress_defaults['container_class'] = 'pager';
    $spyropress_defaults['options']['next_text'] = 'Next <span>&rarr;</span>';
    $spyropress_defaults['options']['prev_text'] = '<span></span> Prev';
    
    return $spyropress_defaults;
}
add_filter( 'spyropress_pagination_defaults', 'spyropress_pagination_defaults' );

/**
 * oEmbed Modifier
 */
function spyropress_oembed_modifier( $spyropress_html ) {
    
    $spyropress_html = preg_replace( '/(width|height|frameborder)="\d*"\s/', "", $spyropress_html );
    
    if( is_str_contain( 'video-container', $spyropress_html ) ) return $spyropress_html;
    
    return '<div class="video-container">' . $spyropress_html . '</div>';
}
add_filter( 'embed_oembed_html', 'spyropress_oembed_modifier', 10 );
add_filter( 'oembed_result', 'spyropress_oembed_modifier', 10 );