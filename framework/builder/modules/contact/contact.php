<?php
/**
 * Contact Info
 * Quickly add contact info to your sidebar e.g. address, phone, email.
 *
 * @package		SpyroPress
 * @category	Modules
 * @author		SpyroSol
 */

class SpyroPress_Module_Contact_Info extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    function __construct() {

        // Widget variable settings.
        $this->path = get_template_directory().'/framework/builder/modules/contact';
        $this->cssclass = 'contact_infos';
        $this->description = esc_html__( 'Quickly add contact info to your sidebar e.g. address, phone, email.', 'sonno' );
        $this->id_base = 'spyropress_contact_infos';
        $this->name = esc_html__( 'Contact Info', 'sonno' );

        $this->fields = array(
            
            array(
                'label' => esc_html__( 'Address', 'sonno' ),
                'id' => 'spyropress_address',
                'type' => 'textarea',
                'rows' => 3
            ),
                
            array( 'type' => 'row' ),
                array( 'type' => 'col', 'size' => 6 ),
                    
                    array(
                        'label' => esc_html__( 'Email', 'sonno' ),
                        'id' => 'spyropress_email',
                        'type' => 'text',
                    ),
                   
                array( 'type' => 'col_end' ),
    
                array( 'type' => 'col', 'size' => 6 ),

                    array(
                        'label' => esc_html__( 'Phone', 'sonno' ),
                        'id' => 'spyropress_phone',
                        'type' => 'text',
                    ),
                    
                array( 'type' => 'col_end' ),
            array( 'type' => 'row_end' ),
            
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        extract( $args ); extract(  $instance );

        // get view to render
        require( $this->get_view() );
    }

}
//Rigester Class SpyroPress_Module_Contact_Info.
spyropress_builder_register_module( 'SpyroPress_Module_Contact_Info' );