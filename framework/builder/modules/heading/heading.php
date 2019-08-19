<?php
/**
 * Module: Heading
 * Add headings into the page layout wherever needed.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Heading extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->path =  get_template_directory().'/framework/builder/modules/heading';
        $this->cssclass = 'module-heading';
        $this->description = esc_html__( 'Add headings into the page layout wherever needed.', 'sonno' );
        $this->id_base = 'spyropress_heading';
        $this->name = esc_html__( 'Heading', 'sonno' );

        // Fields
        $this->fields = array(

            array(
                'label' => esc_html__( 'Heading Text', 'sonno' ),
                'id' => 'spyropress_heading',
                'type' => 'text',
            ),
            
            array(
                'label' => esc_html__( 'HTML Tag', 'sonno' ),
                'id' => 'spyropress_html_tag',
                'type' => 'select',
                'options' => array(
                    'h1' => esc_html__( 'H1', 'sonno' ),
                    'h2' => esc_html__( 'H2', 'sonno' ),
                    'h3' => esc_html__( 'H3', 'sonno' ),
                    'h4' => esc_html__( 'H4', 'sonno' ),
                    'h5' => esc_html__( 'H5', 'sonno' ),
                    'h6' => esc_html__( 'H6', 'sonno' )
                ),
                'std' => 'h1'
            ),
            
            array(
                'label' => esc_html__( 'Style', 'sonno' ),
                'id' => 'spyropress_style',
                'type' => 'select',
                'options' => array(
                    'Default' => esc_html__( 'Default', 'sonno' ),
                    'small' => esc_html__( 'Small', 'sonno' ),
                ),
                'std' => 'default'
            )
        );

        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {

        // extracting info
        extract( $spyropress_args ); extract( $spyropress_instance );
        
        //Required View File
        require( $this->get_view() ); 
    }
}
//Register Module Class Spyropress_Module_Heading
spyropress_builder_register_module( 'Spyropress_Module_Heading' );