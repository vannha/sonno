<?php
/**
 * SpyroPress - A WordPress theme development framework.
 *
 * Text Domain: spyropress
 * Domain Path: /languages/
 *
 * @author      Shakeeb Ahmed <shak@Spyropress.com>
 * @category    Core
 * @copyright   Copyright (c) 2012-2013, SpyroPress
 * @link        http://spyropress.com/
 * @package     SpyroPress
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Spyropress Class - Loads and Initialize the framework.
 *
 * @class Spyropress
 * @version 3.7
 */
class Spyropress {

	/** Variables *****************************************************/
	var $options = array();
	var $context;
	var $lang = '';

	/** KEYS **********************************************************/
	var $api_key = 'y64i1460n7tz2q2ss9a08yftilyfqfynxohb';
	var $themekey = 'fj9nzqmyzqne9ouib0e0ivt9qgarra3nm';
	var $google_api_key = 'AIzaSyBt703vghKlYnKCHzoumkumtLkZ9luJ53U';

	/** Body Classes **************************************************/
	private $_body_classes = array();

	/** Inline ********************************************************/
	private $_jquery_ready = '';
	private $_window_load = '';
	private $_inline_js = '';
	private $_footer_html = '';

	/** Spyropress Constructor, Gets things started **/
	public function __construct() {

		// Auto-load classes on demand
		spl_autoload_register( array( $this, 'autoload' ) );

		// Setup globals
		add_action( 'after_setup_theme', array( $this, 'setup_globals' ), 1 );

		// Include required files
		add_action( 'after_setup_theme', array( $this, 'spyropress_includes' ), 2 );

		// Language functions and translations setup.
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ), 3 );

		// Load settings
		add_action( 'after_setup_theme', array( $this, 'setup_options' ), 11 );

		// Init Components
		add_action( 'after_setup_theme', array( $this, 'spyropress_init_components' ), 11 );

		// Init Custom Post Types and Taxonomies
		add_action( 'after_setup_theme', array( $this, 'init_taxonomy' ), 11 );

		// Init
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'init', array( $this, 'include_template_functions' ), 25 );
	}

	/**
	 * Auto-load classes on demand to reduce memory consumption.
	 */
	function autoload( $class ) {

		$class = strtolower( preg_replace( '/\B([A-Z])/', '-$1', $class ) );

		if ( ( strncmp( $class, 'spyropress', strlen( 'spyropress' ) ) == 0 ) ) {
			$class = str_replace( 'spyropress-', '', $class );
			$class = "class-$class.php";
			$class = $this->framework_path . 'classes/' . $class;

			if ( is_readable( $class ) ) {
				load_template( $class, true );

				return;
			}
		}
	}

	/** Defines the constant paths for use within the core framework, parent theme, and child theme. **/
	function setup_globals() {

		// Version
		$this->version = '3.7.0';

		// Paths
		$tmpDir = get_template_directory();
		$tmpURI = get_template_directory_uri();

		// Framework
		$this->framework_path = $tmpDir . '/framework/';
		$this->framework_url  = $tmpURI . '/framework/';

		// Includes
		$this->includes_path = $tmpDir . '/includes/';
		$this->includes_url  = $tmpURI . '/includes/';

		// Theme
		$this->template_path = $tmpDir . '/';
		$this->template_url  = $tmpURI . '/';

		// Child Theme
		$this->child_path = get_stylesheet_directory() . '/';
		$this->child_url  = get_stylesheet_directory_uri() . '/';

		// Misc
		$this->domain = 'sonno';
	}

	/**
	 * Setup Registered Option Types
	 */
	function setup_options() {

		// Get theme-supported options
		$options = get_theme_support( 'spyropress-options' );

		// If there is no options, return
		if ( empty( $options ) ) {
			return;
		}

		if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
			global $sitepress;
			if ( 'en' != ICL_LANGUAGE_CODE && 'all' != ICL_LANGUAGE_CODE ) {
				$this->lang = '_' . ICL_LANGUAGE_CODE;
				foreach ( $options[0] as $option => $option_meta ) {
					$key = "spyropress_{$option}_settings";
					if ( ! get_option( $key . $this->lang ) ) {
						update_option( $key . $this->lang, get_option( $key ) );
					}
				}


			} elseif ( 'all' == ICL_LANGUAGE_CODE ) {
				$this->lang = '_' . $sitepress->get_default_language();
				if ( $sitepress->get_default_language() == 'en' ) {
					$this->lang = '';
				}
			} else {
				$this->lang = '';
			}
		}

		// get options settings from database
		foreach ( $options[0] as $option => $option_meta ) {
			$key                   = "spyropress_{$option}_settings{$this->lang}";
			$this->options[ $key ] = get_option( $key );
		}
	}

	/** Loads the framework files **/
	function spyropress_includes() {

		//do_action( 'before_spyropress_core_includes' );

		/** Core **************************************************************/

		// Functions
		get_template_part( 'framework/spyropress-core', 'functions' ); // Contains core functions for the front/back end
		get_template_part( 'framework/spyropress', 'context' ); // Contains core functions for the front/back end
		get_template_part( 'framework/spyropress-template', 'hierarchy' ); // Extending template hierarchy making it smarter and more flexible. Inspired by hybrid core.

		if ( is_admin() ) {
			$this->admin_includes();
		}
		if ( defined( 'DOING_AJAX' ) ) {
			$this->ajax_includes();
		}
		if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {
			$this->frontend_includes();
		}


		/** WP Components *****************************************************/
		get_template_part( 'framework/widgets/spyropress-widget', 'init' );

		/** Components ********************************************************/


		// envato verification && site_key
		$is_site_key  = false;
		$code         = get_option( '_spyropress_envato_verification_' . get_internal_name() );
		$cur_site_key = md5( home_url( '/' ) . $code );
		if ( $site_key = get_option( '_spyropress_site_key_' . get_internal_name() ) ) {

			if ( $site_key == $cur_site_key ) {
				$is_site_key = true;
			}
		}

		$this->is_builder_verified = ( bool ) $code && $is_site_key;

		get_template_part( 'framework/builder/spyropress-builder', 'init' );

		// Allow developers to include files before framework initialize
		do_action( 'spyropress_core_includes' );
	}

	/** Load the admin functions **/
	function admin_includes() {
		get_template_part( 'framework/admin/spyropress-admin', 'init' );
		$this->admin = new SpyropressAdmin();
	}

	/** Init Components **/
	function spyropress_init_components() {

		// Get theme-supported menus.
		$components = get_theme_support( 'spyropress-components' );

		// If there is no components, return.
		if ( ! is_array( $components[0] ) ) {
			return;
		}

		$path = 'includes/components/';

		// Register Components
		foreach ( $components[0] as $component ) {
			$temps = array(
				$path . $component . '.php',
			);
			locate_template( $temps, true );
		}
	}

	/** Load the ajax files used on front-end and back-end **/
	function ajax_includes() {
		get_template_part( 'framework/spyropress', 'ajax' );
	}

	/** Load the front-end function **/
	function frontend_includes() {

		get_template_part( 'framework/spyropress', 'actions' ); // Framework hooks used on the front-end
		get_template_part( 'framework/spyropress', 'hooks' ); // WordPress Hooks and Filters
		get_template_part( 'framework/spyropress', 'functions' ); // Contains functions for various front-end events
		get_template_part( 'includes/spyropress', 'scripts' ); // Enqueue scripts and stylesheets
		get_template_part( 'framework/spyropress', 'image' ); // Image retrives and resize functions for the front-end

	}

	/** SpyroPress Template Functions - This makes them pluggable by plugins and themes **/
	function include_template_functions() {
		get_template_part( 'framework/spyropress', 'template' );
	}

	/** Init SpyroPress when WordPress Initialises **/
	function init() {

		// Before init action
		do_action( 'before_spyropress_init' );

		// Load class instances
		$this->cleaner = new SpyropressCleanup();
		$this->widgets = new SpyropressWidgets();

		$this->register_menus(); // Register core nav menu location
		$this->register_sidebars(); // Register core sidebars

		// actions loaded for the frontend and for ajax requests
		if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {

			// Hooks
			add_filter( 'body_class', array( $this, 'body_class' ) );
			add_action( 'wp_footer', array( $this, 'output_footer_html' ), 25 );
			add_action( 'wp_footer', array( $this, 'output_js' ), 25 );
		}

		// Admin actions
		add_action( 'admin_body_class', array( $this, 'body_class' ) );
		add_action( 'admin_footer', array( $this, 'output_js' ), 25 );

		// Init action
		do_action( 'spyropress_init' );
	}

	/** Localisation **/
	function load_textdomain() {

		load_theme_textdomain( $this->domain, $this->template_path . 'languages' );
	}

	/** Init Custom Post Types and Taxonomies **/
	function init_taxonomy() {
		do_action( 'spyropress_register_taxonomy' );
	}

	/** Register Theme Locations **/
	function register_menus() {

		// Get theme-supported menus.
		$menus = get_theme_support( 'spyropress-core-menus' );

		// If there is no menus, return.
		if ( ! is_array( $menus[0] ) ) {
			return;
		}

		// Register menu
		foreach ( $menus[0] as $menu => $v ) {
			register_nav_menu( $menu, ucfirst( $menu ), 'nav menu location' );
		}
	}

	/** Register Sidebars **/
	function register_sidebars() {

		// Get the available core sidebars.
		$core_sidebars = $this->get_core_sidebars();

		// Get the theme-supported sidebars.
		$supported_sidebars = get_theme_support( 'spyropress-core-sidebars' );
		$supported_sidebars = ( ! is_array( $supported_sidebars[0] ) ) ? array() : $supported_sidebars[0];

		// Merged
		$sidebars = array_merge( $supported_sidebars, $core_sidebars );

		// Register supported sidebars
		foreach ( $sidebars as $id => $sidebar ) {

			// Set up some default sidebar arguments.
			$defaults = array(
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			);

			// Allow developers to filter the default sidebar arguments.
			$defaults = apply_filters( 'spyropress_sidebar_defaults', $defaults, $id, $sidebar );

			// Parse the sidebar arguments and defaults.
			$args = wp_parse_args( $sidebar, $defaults );

			// If no 'id' was given, use the $sidebar variable and sanitize it.
			$args['id'] = ( isset( $args['id'] ) ? sanitize_key( $args['id'] ) : sanitize_key( $id ) );

			// Register the sidebar.
			register_sidebar( $args );
		}
	}

	/** Returns an array of the core framework's available sidebars for use in themes. **/
	function get_core_sidebars() {

		// Set up an array of sidebars.
		$sidebars = array();

		// Setup footer sidebars according to selection
		$footer_layout = get_setting( 'footer_layout', false );
		if ( $footer_layout ) {
			$footer_layouts = array(
				'0col'  => 0,
				'1col'  => 1,
				'2col'  => 2,
				'3col'  => 3,
				'4col'  => 4,
				'6col'  => 6,
				'h2col' => 3,
				'2hcol' => 3,
				'h3col' => 4,
				'3hcol' => 4,
				't4col' => 5,
				'4tcol' => 5
			);
			$footer_count   = $footer_layouts[ $footer_layout ];

			for ( $i = 0; $i < $footer_count; $i ++ ) {
				$sidebars[ 'footer-' . ( $i + 1 ) ] = array(
					'name'        => esc_html__( 'Footer ', 'sonno' ) . ( $i + 1 ),
					'description' => esc_html__( 'A widget area loaded in the footer of the site.', 'sonno' )
				);
			}
		}

		return $sidebars;
	}

	/** Body Classes **********************************************************/

	function add_body_class( $class ) {
		$this->_body_classes[] = $class;
	}

	function browser_body_class() {

		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

		if ( $is_lynx ) {
			$this->add_body_class( 'lynx' );
		} elseif ( $is_gecko ) {
			$this->add_body_class( 'gecko' );
		} elseif ( $is_opera ) {
			$this->add_body_class( 'opera' );
		} elseif ( $is_NS4 ) {
			$this->add_body_class( 'ns4' );
		} elseif ( $is_safari ) {
			$this->add_body_class( 'safari' );
		} elseif ( $is_chrome ) {
			$this->add_body_class( 'chrome' );
		} elseif ( $is_IE ) {

			$this->add_body_class( 'ie' );

			// Version Info
			if ( function_exists( 'sprypress_cms_user_agent' ) ) {
				$browser = sprypress_cms_user_agent();
				$browser = substr( "$browser", 25, 8 );
				if ( $browser == "MSIE 6.0" ) {
					$this->add_body_class( 'ie6' );
				} elseif ( $browser == "MSIE 7.0" ) {
					$this->add_body_class( 'ie7' );
				} elseif ( $browser == "MSIE 8.0" ) {
					$this->add_body_class( 'ie8' );
				} elseif ( $browser == "MSIE 9.0" ) {
					$this->add_body_class( 'ie9' );
				}
			}
		} else {
			$this->add_body_class( 'unknown' );
		}

		if ( $is_iphone ) {
			$this->add_body_class( 'iphone' );
		}
	}

	function body_class( $classes ) {

		// add browsers class
		$this->browser_body_class();

		if ( sizeof( $this->_body_classes ) > 0 ) {
			if ( is_admin() ) {
				$classes .= implode( ' ', $this->_body_classes );
			} else {
				$classes = array_merge( $classes, $this->_body_classes );
			}
		}

		return $classes;
	}

	/** Inline Helper **********************************************/

	function add_jquery_ready( $code ) {
		$this->_jquery_ready .= "\n" . $code . "\n";
	}

	function add_window_load( $code ) {
		$this->_window_load .= "\n" . $code . "\n";
	}

	function add_inline_js( $code ) {
		$this->_inline_js .= "\n" . $code . "\n";
	}

	function add_footer_html( $code ) {
		$this->_footer_html .= "\n" . $code . "\n";
	}

	function output_js() {

		if ( $this->_jquery_ready ) {
			"\n" . '$(document).ready( function() {' . "\n" . $this->_jquery_ready . '});' . "\n";
		}
		if ( $this->_window_load ) {
			"\n" . '$(window).load( function() {' . "\n" . $this->_window_load . '});' . "\n";
		}

		if ( $this->_jquery_ready || $this->_window_load || $this->_inline_js ) {

			echo "<!-- SpyroPress JavaScript-->\n";
			echo "<script type=\"text/javascript\">\n";

			if ( $this->_jquery_ready || $this->_window_load ) {
				echo ';(function($) {' . $this->_jquery_ready . $this->_window_load . '})(jQuery);' . "\n";
			}

			echo "\n" . $this->_inline_js . "\n";
			echo "\n</script>\n";
		}

		$this->_jquery_ready = '';
		$this->_window_load  = '';
		$this->_inline_js    = '';
	}

	function output_footer_html() {
		if ( $this->_footer_html ) {
			echo '' . $this->_footer_html;
			$this->_footer_html = '';
		}
	}
}

/**
 * Init Spyropress class
 */
$GLOBALS['spyropress'] = new Spyropress();
?>