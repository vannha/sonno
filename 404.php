<?php
/**
 * 404 Page Template
 * 
 * @package Sonno
 * @author ThemeSuared
 * @link http://themesuared.com/sonno/
 */

    get_header();
    
    spyropress_before_main_container(); 
        get_template_part( 'templates/page', 'breadcrumb' );  //Include Page Breadcrumb Html.
    
    //Translation Theme Options
    $spyropress_translate['404-subtitle'] = get_setting('translate') ? get_setting( 'error-404-subtitle', 'We`re sorry, but the page you are looking for doesn`t exist.' ) : esc_html__( 'We`re sorry, but the page you are looking for doesn`t exist.', 'sonno' );
    $spyropress_translate['404-text'] = get_setting('translate') ? get_setting( 'error-404-text', 'Please check entered address and try again <em>or</em>' ) : esc_html__( 'Please check entered address and try again or', 'sonno' );
    $spyropress_translate['404-btn'] = get_setting('translate') ? get_setting( 'error-404-btn', 'go to homepage' ) : esc_html__( 'go to homepage', 'sonno' );
?>

    <div id="post-0" class="container marginTop section">
        
        <!-- 404 page -->
		<div class="text-center">
			<h4><?php echo esc_html( $spyropress_translate['404-subtitle'] ); ?></h4>
			<div class="entry-content">
                <p><span class="check"><?php echo esc_html( $spyropress_translate['404-text'], array( 'em' => array() ) ); ?></span> <a href="<?php echo esc_url( site_url() ); ?>"><?php echo esc_html( $spyropress_translate['404-btn'] ); ?> <span>&rarr;</span></a></p>
            </div>
		</div>
        
    </div>
<?php 
    spyropress_after_main_container(); 
get_footer(); 