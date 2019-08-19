<?php
/**
 * Module: Accordion
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Accordions extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings.
        $this->path =  get_template_directory().'/framework/builder/modules/accordion';
        $this->cssclass = '';
        $this->description = esc_html__( 'Accordion Builder.', 'sonno' );
        $this->id_base = 'accordion';
        $this->name = esc_html__( 'Accordions', 'sonno' );

        // Fields
        $this->fields = array(
                        
            array(
                'label' => esc_html__( 'Accordion', 'sonno' ),
                'id' => 'spyropress_accordions',
                'type' => 'repeater',
                'item_title' => 'spyropress_title',
                'fields' => array(
                    
                    array(
                        'label' => esc_html__( 'Title', 'sonno' ),
                        'id' => 'spyropress_title',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => esc_html__( 'Accordion Bucket', 'sonno' ),
                        'id' => 'bucket',
                        'type' => 'select',
                        'desc' => esc_html__( 'If you want to use complex html instead of plain text.', 'sonno' ),
                        'options' => spyropress_get_buckets()
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon', 'sonno' ),
                        'id' => 'spyropress_icon',
                        'type' => 'select',
                        'options' => spyropress_get_options_moon_icons()
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon Color', 'sonno' ),
                        'id' => 'spyropress_icon_color',
                        'type' => 'select',
                        'options' => array(
                            'icon-primary' => esc_html__( 'Primary', 'sonno' ),
                            'icon-secondary' => esc_html__( 'Secondary', 'sonno' ),
                            'icon-tertiary' => esc_html__( 'Tertiary', 'sonno' ),
                            'icon-quaternary' => esc_html__( 'Quaternary', 'sonno' )
                        )
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
//Register Module Class Spyropress_Module_Accordions
spyropress_builder_register_module( 'Spyropress_Module_Accordions' );