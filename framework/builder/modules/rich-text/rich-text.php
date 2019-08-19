<?php
/**
 * Module: Rich Text
 * Provides a WYSIWYG editor.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Rich_Text extends SpyropressBuilderModule {

    public function __construct() {
        
        // Widget variable settings.
        $this->path =  get_template_directory().'/framework/builder/modules/rich-text';
        $this->cssclass = 'rich-text';
        $this->description = esc_html__( 'Provides a WYSIWYG editor.', 'sonno' );
        $this->id_base = 'rich_text';
        $this->name = esc_html__( 'Rich Text', 'sonno' );

        // Fields
        $this->fields = array(
            array(
                'id' => 'rich_text',
                'type' => 'editor'
            )
        );

        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {

        // extracting info
        extract( $spyropress_args ); extract( $spyropress_instance );
        
        // get view to render
        require( $this->get_view() );
    }
}
//Register Module Class Spyropress_Module_Rich_Text
spyropress_builder_register_module( 'Spyropress_Module_Rich_Text' );