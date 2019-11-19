<?php
/**
 * ThemeSquared: Recent Posts
 * The most recent posts on your site.
 *
 * @package        SpyroPress
 * @category    Widgets
 * @author        SpyroSol
 */
if ( ! function_exists( 'register_cpt_widget' ) ) {
	return;
}

class Spyropress_Widget_Recent_Posts extends SpyropressWidget {

	/**
	 * Constructor
	 */
	function __construct() {

		// Widget variable settings.
		$this->path        = get_template_directory() . '/includes/widgets/recent-posts';
		$this->cssclass    = 'widget_popular_posts';
		$this->description = esc_html__( 'The most recent posts on your site.', 'sonno' );
		$this->id_base     = 'spyropress_recent_posts';
		$this->name        = esc_html__( 'ThemeSquared: Recent Posts', 'sonno' );

		$this->fields = array(

			array(
				'label' => esc_html__( 'Title', 'sonno' ),
				'id'    => 'spyropress_title',
				'type'  => 'text',
			),
			array(
				'label' => esc_html__( 'Number of posts to show:', 'sonno' ),
				'id'    => 'spyropress_number',
				'type'  => 'range_slider',
				'max'   => 50
			)
		);

		$this->create_widget();
	}

	function widget( $spyropress_args, $spyropress_instance ) {

		// extracting info
		extract( $spyropress_args );
		extract( $spyropress_instance );

		// get view to render
		require( $this->get_view() );
	}

}

// class SpyroPress_Widget_TabWidget
register_cpt_widget( 'Spyropress_Widget_Recent_Posts' );