<?php
/**
 * Module: Our Clients
 * Display a list of our clients
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Our_Clients extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        // Widget variable settings
        $this->path =  get_template_directory().'/framework/builder/modules/our-clients';
        $this->cssclass = 'module-our-clients';
        $this->description = esc_html__( 'Display a list of our clients.', 'sonno' );
        $this->id_base = 'spyropress_our_clients';
        $this->name = esc_html__( 'Our Clients', 'sonno' );

        // Fields
        $this->fields = array (

            array(
                'label' => esc_html__( 'Client', 'sonno' ),
                'id' => 'spyropress_clients',
                'type' => 'repeater',
                'fields' => array(
                
                    array(
                        'label' => esc_html__( 'Logo', 'sonno' ),
                        'id' => 'spyropress_logo',
                        'type' => 'upload'
                    ),
                    
                    array(
                        'label' => esc_html__( 'Url', 'sonno' ),
                        'id' => 'spyropress_url',
                        'type' => 'text'
                    )
                )
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
//Register Module Class Spyropress_Module_Our_Clients
spyropress_builder_register_module( 'Spyropress_Module_Our_Clients' );