<?php
/**
 * Theme Options
 *
 * @author 		SpyroSol
 * @category 	Admin
 * @package 	Spyropress
 */

global $spyropress_theme_settings;

$spyropress_theme_settings['general'] = array(

	array(
        'label' => esc_html__( 'General Settings', 'sonno' ),
        'type' => 'heading',
        'slug' => 'generalsettings',
        'icon' => 'module-icon-general'
    ),

    array(
		'label' => esc_html__( 'Custom Logo', 'sonno' ),
        'desc' => esc_html__( 'Upload a logo for your site or specify an image URL directly.', 'sonno' ),
		'id' => 'logo',
        'type' => 'upload'
	),
	
	array(
		'label' => __( 'Custom Favicon', 'sonno' ),
        'desc' => __( 'Upload a favicon for your site or specify an icon URL directly.<br/>Accepted formats: ico, png, gif<br/>Dimension: 16px x 16px.', 'sonno' ),
		'id' => 'custom_favicon',
        'type' => 'upload'
	),

    array(
		'label' => esc_html__( 'Apple Touch Icon (small)', 'sonno' ),
        'desc' => esc_html__( 'Upload apple favicon.<br/>Accepted formats: png<br/>Dimension: 57px x 57px.', 'sonno' ),
		'id' => 'apple_small',
        'type' => 'upload'
	),

    array(
		'label' => esc_html__( 'Apple Touch Icon (medium)', 'sonno' ),
        'desc' => esc_html__( 'Upload apple favicon.<br/>Accepted formats: png<br/>Dimension: 72px x 72px.', 'sonno' ),
		'id' => 'apple_medium',
        'type' => 'upload'
	),

    array(
		'label' => esc_html__( 'Apple Touch Icon (large)', 'sonno' ),
        'desc' => esc_html__( 'Upload apple favicon.<br/>Accepted formats: png<br/>Dimension: 114px x 114px.', 'sonno' ),
		'id' => 'apple_large',
        'type' => 'upload'
	),
    
    array(
        'label' => esc_html__(  'Social Icons', 'sonno' ),
        'id' => 'social_icons',
        'type' => 'repeater',
        'item_title' => 'network',
        'fields' => array(
        
            array(
                'label' => esc_html__( 'Network', 'sonno' ),
                'id' => 'network',
                'type' => 'select',
                'options' => spyropress_get_options_social()
            ),
            array(
                'label' => esc_html__( 'Link', 'sonno' ),
                'id' => 'link',
                'type' => 'text'
            )
        )
    )

); // End General Settings

$spyropress_theme_settings['layout'] = array(

    array(
        'label' => esc_html__( 'Layout Options', 'sonno' ),
        'type' => 'heading',
        'slug' => 'layout',
        'icon' => 'module-icon-layout'
    ),

    array(
        'label' => esc_html__( 'Page Loader', 'sonno' ),
        'type' => 'sub_heading'
    ),
    
    array(
		'label' => esc_html__( 'Page Loader', 'sonno' ),
		'id' => 'page-loader',
        'type' => 'checkbox',
        'options' => array(
            '1' => esc_html__( 'Disable Page Loader', 'sonno' ),
        )
	),

    array(
        'label' => esc_html__( 'Custom CSS', 'sonno' ),
        'type' => 'sub_heading'
    ),

    array(
        'id' => 'custom_css_textarea',
        'type' => 'textarea',
        'rows' => 12,
        'class' => 'section-full'
    )

); // End Layout Options

$spyropress_theme_settings['header'] = array(

    array(
        'label' => esc_html__( 'Header Customization', 'sonno' ),
        'type' => 'heading',
        'slug' => 'header',
        'icon' => 'module-icon-layout'
    ),
    
    array(
        'label' => esc_html__( 'Custom Links', 'sonno' ),
        'id' => 'links',
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
        	),
            
            
        )
    )
    
);

$spyropress_theme_settings['footer'] = array(

    array(
        'label' => esc_html__( 'Footer Customization', 'sonno' ),
        'type' => 'heading',
        'slug' => 'footer',
        'icon' => 'module-icon-footer'
    ),

    array(
		'label' => esc_html__( 'Copyright', 'sonno' ),
        'desc' => esc_html__( 'Custom HTML and Text that will appear in the footer of your theme.', 'sonno' ),
		'id' => 'footer_copyright',
        'type' => 'editor'
	)

); // END FOOTER

$spyropress_theme_settings['post'] = array(

    array(
        'label' => esc_html__( 'Post Options', 'sonno' ),
        'type' => 'heading',
        'slug' => 'post',
        'icon' => 'module-icon-post'
    ),

    array(
		'label' => esc_html__( 'Excerpt Settings', 'sonno' ),
		'type' => 'sub_heading'
	),

    array(
        'label' => esc_html__( 'Length by', 'sonno' ),
        'id' => 'excerpt_by',
        'type' => 'select',
        'options' => array (
            '' => '',
            'words' => esc_html__( 'Words', 'sonno' ),
            'chars' => esc_html__( 'Character', 'sonno' ),
        ),
        'std' => 'words'
	),

    array(
		'label' => esc_html__( 'Length', 'sonno' ),
        'desc' => esc_html__( 'Set the length of excerpt.', 'sonno' ),
		'id' => 'excerpt_length',
        'type' => 'text',
        'std' => 30
	),

    array(
		'label' => esc_html__( 'Ellipsis', 'sonno' ),
        'desc' => esc_html__( 'This is the description field, again good for additional info.', 'sonno' ),
		'id' => 'excerpt_ellipsis',
        'type' => 'text',
        'std' => '&hellip;'
	),

    array(
		'label' => esc_html__( 'Before Text', 'sonno' ),
        'desc' => esc_html__( 'This is the description field, again good for additional info.', 'sonno' ),
		'id' => 'excerpt_before_text',
        'type' => 'text',
        'std' => '<p>'
	),

    array(
		'label' => esc_html__( 'After Text', 'sonno' ),
        'desc' => esc_html__( 'This is the description field, again good for additional info.', 'sonno' ),
		'id' => 'excerpt_after_text',
        'type' => 'text',
        'std' => '</p>'
	),

    array(
		'label' => esc_html__( 'Read More', 'sonno' ),
		'id' => 'excerpt_link_to_post',
        'type' => 'checkbox',
        'options' => array(
            1 => esc_html__( 'Enable or disable Read more link.', 'sonno' ),
        ),
        'std' => 1
	),

    array(
		'label' => esc_html__( 'Link Text', 'sonno' ),
        'desc' => esc_html__( 'A text for Read More button.', 'sonno' ),
		'id' => 'excerpt_link_text',
        'type' => 'text',
        'std' => 'Continue Reading..'
	)
    

); // End Blog Settings

$spyropress_theme_settings['translate'] = array(

	array(
        'label' => esc_html__( 'Translate', 'sonno' ),
        'type' => 'heading',
        'slug' => 'translate',
        'icon' => 'module-icon-docs'
    ),

    array(
		'label' => esc_html__( 'General', 'sonno' ),
		'type' => 'sub_heading'
	),

    array(
        'desc' => esc_html__( 'Turn it off if you want to use .mo .po files for more complex translation.', 'sonno' ),
		'id' => 'translate',
        'type' => 'checkbox',
        'options' => array(
            1 => esc_html__( 'Enable Translate', 'sonno' ),
        ),
        'std' => '1'
	),

    array(
		'label' => esc_html__( 'Home', 'sonno' ),
        'desc' => esc_html__( 'Breadcrumb and Menu', 'sonno' ),
		'id' => 'translate-home',
        'type' => 'text',
        'std' => 'Home'
	),

    array(
		'label' => esc_html__( 'Menu', 'sonno' ),
        'desc' => esc_html__( 'Responsive Menu', 'sonno' ),
		'id' => 'nav-menu',
        'type' => 'text',
        'std' => 'Menu'
	),

    array(
		'label' => esc_html__( 'Search Placeholder', 'sonno' ),
        'desc' => esc_html__( 'Search widget', 'sonno' ),
		'id' => 'search-placeholder',
        'type' => 'text',
        'std' => 'Search..'
	),

    array(
		'label' => esc_html__( 'Search Button', 'sonno' ),
        'desc' => esc_html__( 'Search widget button', 'sonno' ),
		'id' => 'search-btn',
        'type' => 'text',
        'std' => 'Go'
	),

    array(
		'label' => esc_html__( 'Blog & Archives', 'sonno' ),
		'type' => 'sub_heading'
	),

    array(
		'id' => 'translate-comment',
		'type' => 'text',
		'label' => esc_html__('Comment', 'sonno'),
		'desc' => esc_html__('Text to display when there is one comment', 'sonno'),
		'std' => 'Comment'
	),

	array(
		'id' => 'translate-comments',
		'type' => 'text',
		'label' => esc_html__('Comments', 'sonno'),
		'desc' => esc_html__('Text to display when there are more than one comments', 'sonno'),
		'std' => 'Comments'
	),

	array(
		'id' => 'translate-comments-off',
		'type' => 'text',
		'label' => esc_html__('Comments closed', 'sonno'),
		'desc' => esc_html__('Text to display when comments are disabled', 'sonno'),
		'std' => 'Comments are closed.'
	),

     array(
		'id' => 'comment-reply',
		'type' => 'text',
		'label' => esc_html__('Reply', 'sonno'),
		'desc' => esc_html__('Text to display on comment Reply Button', 'sonno'),
		'std' => 'Reply'
	),

    array(
		'label' => esc_html__( 'Blog', 'sonno' ),
        'desc' => esc_html__( 'Recent News &amp; Article <strong>Our Blog</strong>', 'sonno' ),
		'id' => 'blog-title',
        'type' => 'text',
        'std' => 'Recent News &amp; Article <strong>Our Blog</strong>'
	),

    array(
		'label' => esc_html__( 'Category', 'sonno' ),
        'desc' => esc_html__( 'Archive', 'sonno' ),
		'id' => 'cat-title',
        'type' => 'text',
        'std' => 'Category: <strong>%s</strong>'
	),

    array(
		'label' => esc_html__( 'Tag', 'sonno' ),
        'desc' => esc_html__( 'Archive', 'sonno' ),
		'id' => 'tag-title',
        'type' => 'text',
        'std' => 'Tag: <strong>%s</strong>'
	),

    array(
		'label' => esc_html__( 'Day', 'sonno' ),
        'desc' => esc_html__( 'Archive', 'sonno' ),
		'id' => 'day-title',
        'type' => 'text',
        'std' => 'Daily: <strong>%s</strong>'
	),

    array(
		'label' => esc_html__( 'Month', 'sonno' ),
        'desc' => esc_html__( 'Archive', 'sonno' ),
		'id' => 'month-title',
        'type' => 'text',
        'std' => 'Monthly: <strong>%s</strong>'
	),

    array(
		'label' => esc_html__( 'Year', 'sonno' ),
        'desc' => esc_html__( 'Archive', 'sonno' ),
		'id' => 'year-title',
        'type' => 'text',
        'std' => 'Yearly: <strong>%s</strong>'
	),

    array(
		'label' => esc_html__( 'Search', 'sonno' ),
        'desc' => esc_html__( 'Search result page', 'sonno' ),
		'id' => 'search-title',
        'type' => 'text',
        'std' => 'Search results: <strong>%s<strong>'
	),

    array(
		'label' => esc_html__( 'Error 404', 'sonno' ),
		'type' => 'sub_heading'
	),

    array(
		'label' => esc_html__( 'Title', 'sonno' ),
        'desc' => esc_html__( 'Ooops... Error 404', 'sonno' ),
		'id' => 'error-404-title',
        'type' => 'text',
        'std' => 'Ooops... Error <strong>404</strong>'
	),

    array(
		'label' => esc_html__( 'Subtitle', 'sonno' ),
        'desc' => esc_html__( 'We are sorry, but the page you are looking for does not exist.', 'sonno' ),
		'id' => 'error-404-subtitle',
        'type' => 'text',
        'std' => 'We are sorry, but the page you are looking for does not exist.'
	),

    array(
		'label' => esc_html__( 'Text', 'sonno' ),
        'desc' => esc_html__( 'Please check entered address and try again or', 'sonno' ),
		'id' => 'error-404-text',
        'type' => 'text',
        'std' => 'Please check entered address and try again or'
	),

    array(
		'label' => esc_html__( 'Button', 'sonno' ),
        'desc' => esc_html__( 'Go To Homepage button', 'sonno' ),
		'id' => 'error-404-btn',
        'type' => 'text',
        'std' => 'go to homepage'
	),
    
    array(
		'label' => esc_html__( 'Portfolio', 'sonno' ),
		'type' => 'sub_heading'
	),
    
    
    
    array(
		'label' => esc_html__( 'Product Detail', 'sonno' ),
        'desc' => esc_html__( 'Product detail :', 'sonno' ),
		'id' => 'portfolio-detail',
        'type' => 'text',
        'std' => 'Product detail :'
	),
    
    array(
		'label' => esc_html__( 'Name', 'sonno' ),
        'desc' => esc_html__( 'Name', 'sonno' ),
		'id' => 'portfolio-name',
        'type' => 'text',
        'std' => 'Name'
	),
    
    array(
		'label' => esc_html__( 'Categories', 'sonno' ),
        'desc' => esc_html__( 'Categories', 'sonno' ),
		'id' => 'portfolio-categorie',
        'type' => 'text',
        'std' => 'Categories'
	),
    
    array(
		'label' => esc_html__( 'Type', 'sonno' ),
        'desc' => esc_html__( 'Type', 'sonno' ),
		'id' => 'portfolio-type',
        'type' => 'text',
        'std' => 'Type'
	),
    
     array(
		'label' => esc_html__( 'Size', 'sonno' ),
        'desc' => esc_html__( 'Size', 'sonno' ),
		'id' => 'portfolio-size',
        'type' => 'text',
        'std' => 'Size'
	),
    
    array(
		'label' => esc_html__( 'Licence', 'sonno' ),
        'desc' => esc_html__( 'Licence', 'sonno' ),
		'id' => 'portfolio-licence',
        'type' => 'text',
        'std' => 'Licence'
	),
    
    array(
		'label' => esc_html__( 'Description', 'sonno' ),
        'desc' => esc_html__( 'Description :', 'sonno' ),
		'id' => 'portfolio-description',
        'type' => 'text',
        'std' => 'Description :'
	)

);

$spyropress_theme_settings['plugins'] = array(

	array(
        'label' => esc_html__( 'Settings', 'sonno' ),
        'type' => 'heading',
        'slug' => 'plugins',
        'icon' => 'module-icon-general'
    ),

    array(
		'label' => esc_html__( 'Email Settings', 'sonno' ),
		'type' => 'sub_heading'
	),

    array(
		'label' => esc_html__( 'Sender Name', 'sonno' ),
        'desc' => esc_html__( 'For example sender name is "WordPress".', 'sonno' ),
		'id' => 'mail_from_name',
        'type' => 'text'
	),

    array(
		'label' => esc_html__( 'Sender Email Address', 'sonno' ),
        'desc' => esc_html__( 'For example sender email address is wordpress@yoursite.com.', 'sonno' ),
		'id' => 'mail_from_email',
        'type' => 'text'
	),

    array(
        'label' => esc_html__( 'Twitter oAuth Settings', 'sonno' ),
        'type' => 'sub_heading'
    ),

    array(
        'label' => esc_html__( 'Twitter Username', 'sonno' ),
        'id' => 'twitter_username',
        'type' => 'text'
    ),

    array(
        'label' => esc_html__( 'Consumer Key', 'sonno' ),
        'id' => 'twitter_consumer_key',
        'type' => 'text'
    ),

    array(
        'label' => esc_html__( 'Consumer Secret', 'sonno' ),
        'id' => 'twitter_consumer_secret',
        'type' => 'text'
    ),

    array(
        'label' => esc_html__( 'Access Token', 'sonno' ),
        'id' => 'twitter_access_token',
        'type' => 'text'
    ),

    array(
        'label' => esc_html__( 'Access Token Secret', 'sonno' ),
        'id' => 'twitter_access_token_secret',
        'type' => 'text'
    ),

    array(
		'label' => esc_html__( 'WP-Pagenavi', 'sonno' ),
		'type' => 'toggle'
	),

    array(
		'label' => esc_html__( 'Text For Number Of Pages', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_pages_text',
        'desc' =>   '%CURRENT_PAGE% - ' . esc_html__( 'The current page number.', 'sonno' ) .
                    '<br />%TOTAL_PAGES% - ' . esc_html__( 'The total number of pages.', 'sonno' ),
        'std' => esc_html__( 'Page %CURRENT_PAGE% of %TOTAL_PAGES%', 'sonno' ),
	),

    array(
		'label' => esc_html__( 'Text For Current Page', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_current_text',
        'desc' => '%PAGE_NUMBER% - '.esc_html__( 'The page number.', 'sonno' ),
        'std' => '%PAGE_NUMBER%'
	),

    array(
		'label' => esc_html__( 'Text For Page', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_page_text',
        'desc' => '%PAGE_NUMBER% - ' .esc_html__( 'The page number.', 'sonno' ),
        'std' => '%PAGE_NUMBER%'
	),

    array(
		'label' => esc_html__( 'Text For First Page', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_first_text',
        'desc' => '%TOTAL_PAGES% - ' .esc_html__( 'The total number of pages.', 'sonno' ),
        'std' => '&laquo; First'
	),

    array(
		'label' => esc_html__( 'Text For Last Page', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_last_text',
        'desc' => '%TOTAL_PAGES% - ' .esc_html__( 'The total number of pages.', 'sonno' ),
        'std' => 'Last &raquo;'
	),

    array(
		'label' => esc_html__( 'Text For Previous Page', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_prev_text',
        'std' => '&laquo;'
	),

    array(
		'label' => esc_html__( 'Text For Next Page', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_next_text',
        'std' => '&raquo;'
	),

    array(
		'label' => esc_html__( 'Text For Previous &hellip;', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_dotleft_text',
        'std' => '&hellip;'
	),

    array(
		'label' => esc_html__( 'Text For Next &hellip;', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_dotright_text',
        'std' => '&hellip;'
    ),

    array(
        'label' => esc_html__( 'Page Navigation Text', 'sonno' ),
        'type' => 'sub_heading',
        'desc' => esc_html__( 'Leaving a field blank will hide that part of the navigation.', 'sonno' ),
    ),

    array(
		'label' => esc_html__( 'Always Show Page Navigation', 'sonno' ),
		'type' => 'checkbox',
        'id' => 'pagination_always_show',
        'options' => array(
            1 => esc_html__( 'Show navigation even if there\'s only one page.', 'sonno' ),
        )
    ),

    array(
		'label' => esc_html__( 'Number Of Pages To Show', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_num_pages',
        'std' => 5
    ),

    array(
		'label' => esc_html__( 'Number Of Larger Page Numbers To Show', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_num_larger_page_numbers',
        'desc' => esc_html__( 'Larger page numbers are in addition to the normal page numbers. They are useful when there are many pages of posts.', 'sonno' ),
        'std' => 3
    ),

    array(
		'label' => esc_html__( 'Show Larger Page Numbers In Multiples Of', 'sonno' ),
		'type' => 'text',
        'id' => 'pagination_larger_page_numbers_multiple',
        'desc' => esc_html__( 'For example, if mutiple is 5, it will show: 5, 10, 15, 20, 25', 'sonno' ),
        'std' => 10
    ),

    array(
		'type' => 'toggle_end'
	),

); // END PLUGINS

$spyropress_theme_settings['separator'] = array(

	array ( 'type' => 'separator' )

); // END Separator

$spyropress_theme_settings['import'] = array(

	array (
        'label' => esc_html__( 'Import / Export', 'sonno' ),
        'type' => 'heading',
        'slug' => 'import-export',
        'icon' => 'module-icon-import'
    ),
    
    array(
        'type' => 'import_dummy'
	),

    array(
        'type' => 'import'
	),

    array(
        'type' => 'export'
	)
    
); // END Import/Export
$spyropress_theme_settings['support'] = array(

	array (
        'label' => esc_html__( 'Support', 'sonno' ),
        'type' => 'heading',
        'slug' => 'support',
        'icon' => 'module-icon-support'
    ),

    array(
		'id' => 'admin/docs-support.php',
        'type' => 'include'
	)

); // END Separator