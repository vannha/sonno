<?php
/**
 * Module: Call of Action
 * A lightweight, flexible component to showcase key content on your site.
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Call_Action extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->path =  get_template_directory().'/framework/builder/modules/call-action';
        $this->description = esc_html__( 'Call of Actin', 'sonno' );
        $this->id_base = 'call_action';
        $this->name = esc_html__( 'Call of Action', 'sonno' );
        
        // Fields
        $this->fields = array(
            
            array(
                'label' => esc_html__( 'Title', 'sonno' ),
                'id' => 'spyropress_title',
                'type' => 'text',
            ),
            
            array(
                'label' => esc_html__( 'Sub Title', 'sonno' ),
                'id' => 'spyropress_sub_title',
                'type' => 'text'
            )
        );
        
        $this->fields = spyropress_get_options_link( $this->fields );

        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {

        // extracting info
        extract( $spyropress_args ); extract( $spyropress_instance );
        
        //Required View File
        require( $this->get_view() ); 
    }
}
//Register Module Class Spyropress_Module_Call_Action
spyropress_builder_register_module( 'Spyropress_Module_Call_Action' );