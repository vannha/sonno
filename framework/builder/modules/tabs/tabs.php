<?php

/**
 * Module: Tabs
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Tabs extends SpyropressBuilderModule {

    public function __construct() {
        
        // Widget variable settings
        $this->path =  get_template_directory().'/framework/builder/modules/tabs';
        $this->description = esc_html__( 'Tab Builder.', 'sonno' );
        $this->id_base = 'tab';
        $this->name = esc_html__( 'Tabs', 'sonno' );

        // Fields
        $this->fields = array(
            array(
                'label' => esc_html__( 'Tab', 'sonno' ),
                'id' => 'spyropress_tabs',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
                    
                    array(
                        'label' => esc_html__( 'Title', 'sonno' ),
                        'id' => 'spyropress_title',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => esc_html__( 'Tab Bucket', 'sonno' ),
                        'id' => 'bucket',
                        'type' => 'select',
                        'desc' => 'If you want to use html instead of plain text.',
                        'options' => spyropress_get_buckets()
                    ),
                    
                    array(
                        'label' => esc_html__( 'Content', 'sonno' ),
                        'id' => 'spyropress_content',
                        'type' => 'textarea',
                        'rows' => 7
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
//Register Module Class Spyropress_Module_Tabs.
spyropress_builder_register_module( 'Spyropress_Module_Tabs' );