<?php
/**
 * Module: Home Section
 * Add Home Intro section content on the top of your site page
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Home_Section extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->path =  get_template_directory().'/framework/builder/modules/home-section';
        $this->cssclass = 'module-home-section';
        $this->description = esc_html__( 'Add Home Intro section content on the top of your site page', 'sonno' );
        $this->id_base = 'spyropress_home_section';
        $this->name = esc_html__( 'Home Intro Section', 'sonno' );
        
        // Templates
        $this->templates['view'] = array( 'view' => 'view.php', 'label' =>esc_html__( 'Style One', 'sonno' ) );
        $this->templates['view-one'] = array( 'view' => 'view-one.php', 'label' =>esc_html__( 'Style Two', 'sonno' ) );
        $this->templates['view-two'] = array( 'view' => 'view-two.php', 'label' =>esc_html__( 'Style Three', 'sonno' ) );
        
        // Fields
        $this->fields = array(
            
            array(
                'label' => esc_html__( 'Template', 'sonno' ),
                'id' => 'template',
                'class' => 'enable_changer section-full',
                'type' => 'select',
                'options' => $this->get_option_templates()
            ),
            
            array(
                'label' => esc_html__( 'Background', 'sonno' ),
                'id' => 'spyropress_bg_image',
                'class' => 'template view view-one view-two section-full',
                'type' => 'upload',
            ),
        
            array(
                'label' => esc_html__( 'Heading Text', 'sonno' ),
                'id' => 'spyropress_heading',
                'class' => 'template view view-one view-two section-full',
                'type' => 'text',
            ),
            
            array(
                'label' => esc_html__( 'Sub Heading Text', 'sonno' ),
                'id' => 'spyropress_sub_heading',
                'class' => 'template view view-one view-two section-full',
                'type' => 'text',
            ),
            
            array(
                'label' => esc_html__( 'Form Shortcode', 'sonno' ),
                'id' => 'spyropress_frm_shortcode',
                'class' => 'template view section-full',
                'type' => 'text',
            ),
            
            array(
                'label' => esc_html__( 'Video', 'sonno' ),
                'id' => 'spyropress_video',
                'class' => 'template view-two section-full',
                'type' => 'text',
            ),
            
            array(
                'label' => esc_html__( 'List', 'sonno' ),
                'id' => 'spyropress_lists',
                'class' => 'template view-two section-full',
                'type' => 'repeater',
                'item_title' => 'spyropress_list',
                'fields' => array(
                
                    array(
                        'label' => esc_html__( 'Item', 'sonno' ),
                        'id' => 'spyropress_list',
                        'type' => 'text',
                    )
                )
            ),
            
            array(
                'label' => esc_html__( 'Slider Slides', 'sonno' ),
                'id' => 'spyropress_slides',
                'class' => 'template view-one section-full',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
                
                    array(
                        'label' => esc_html__( 'Image', 'sonno' ),
                        'id' => 'spyropress_image',
                        'type' => 'upload',
                    )
                )
            ),
            
            array(
                'label' => esc_html__( 'Custom Links', 'sonno' ),
                'id' => 'spyropress_links',
                'class' => 'template view-one section-full',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
        
                    array(
                        'label' => esc_html__( 'Title', 'sonno' ),
                        'id' => 'title',
                        'type' => 'text',
                    ),
                    
                    array(
                    	'label' => esc_html__( 'URL', 'sonno' ),
                    	'id' => 'url',
                    	'type' => 'text'
                    ),
                    
                    array(
                        'label' => esc_html__( 'Icon', 'sonno' ),
                        'id' => 'icon',
                        'type' => 'select',
                        'options' => spyropress_get_options_moon_icons()
                    ),
                    
                    array(
                        'label' => esc_html__( 'Button Type', 'sonno' ),
                        'id' => 'btn_type',
                        'type' => 'select',
                        'options' => array(
                            'btn-default' => esc_html__( 'default', 'sonno' ),
                            'btn-primary' => esc_html__( 'Primary', 'sonno' ),
                            'btn-success' => esc_html__( 'Success', 'sonno' ),
                            'btn-info' => esc_html__( 'Info', 'sonno' ),
                            'btn-warning' => esc_html__( 'Warning', 'sonno' ),
                            'btn-danger' => esc_html__( 'Danger', 'sonno' ),
                            'btn-link' => esc_html__( 'Link', 'sonno' ),
                            'btn-quaternary' => esc_html__( 'Quaternary', 'sonno' ),
                            'btn-tertiary' => esc_html__( 'Tertiary', 'sonno' ),
                            'btn-secondary' => esc_html__( 'Secondary', 'sonno' ),
                        )
                    ),
                    
                    array(
                		'label' => esc_html__( 'Bottom Colored', 'sonno' ),
                		'id' => 'btn-colored',
                        'type' => 'checkbox',
                        'options' => array(
                            'btn-bavel' => esc_html__( 'Enable Button Bottom Border Colored', 'sonno' ),
                        )
                	)
                )
            )
        );

        $this->create_widget();
    }

    function widget( $spyropress_args, $spyropress_instance ) {

        // extracting info
        extract( $spyropress_args ); extract( $spyropress_instance );
        
        //Template Module
        $spyropress_template = isset( $spyropress_instance['template'] ) ? $spyropress_instance['template'] : '';
        
        //Required View File
        require( $this->get_view( $spyropress_template ) ); 
    }
}
//Register Module Class Spyropress_Module_Home_Section
spyropress_builder_register_module( 'Spyropress_Module_Home_Section' );