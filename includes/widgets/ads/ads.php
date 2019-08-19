<?php
/**
 * ThemeSquared: Ads Images
 * Display Ads Images in siderbr
 *
 * @package		SpyroPress
 * @category	Widgets
 * @author		SpyroSol
 */

class Spyropress_Widget_Ads extends SpyropressWidget {

    /**
     * Constructor
     */
    function __construct() {

        // Widget variable settings.
        $this->path = get_template_directory() . '/includes/widgets/ads';
        $this->cssclass = 'widget_ads';
        $this->description = esc_html__( 'Display Ads Images in siderbr.', 'sonno' );
        $this->id_base = 'spyropress_ads';
        $this->name = esc_html__( 'ThemeSquared: Ads Images', 'sonno' );

        $this->fields = array(

            array(
                'label' => esc_html__( 'Title', 'sonno' ),
                'id' => 'spyropress_title',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__( 'Ads', 'sonno' ),
                'type' => 'repeater',
                'id' => 'spyropress_ads',
                'hide_label' => true,
                'fields' => array(
                
                    array(
                        'label' => esc_html__( 'Image', 'sonno' ),
                        'id' => 'spyropress_image',
                        'type' => 'upload',
                    ),
                    
                    array(
                        'label' => esc_html__( 'Url / Link', 'sonno' ),
                        'id' => 'spyropress_url',
                        'type' => 'text',
                    )
                )
            )
        );

        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {

        // extracting info
        extract( $spyropress_args );extract( $spyropress_instance );

        // get view to render
        require( $this->get_view() );
    }

} 
// class Spyropress_Widget_Ads
register_widget( 'Spyropress_Widget_Ads' );