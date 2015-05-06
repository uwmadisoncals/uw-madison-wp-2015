<?php
/**
 * UW Madison WP 2015 functions and definitions
 *
 * @package UW Madison WP 2015
 */
 
 
add_action('wp_enqueue_scripts', 'se_wp_enqueue_scripts');
function se_wp_enqueue_scripts() {
    wp_enqueue_script('suggest',array( 'jquery' ));
    
}

add_action('wp_head', 'se_wp_head');
function se_wp_head() {
?>
<script type="text/javascript">
    
	
	var se_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>?action=se_lookup';
	var se_ajax_url_https = '<?php echo admin_url('admin-ajax.php','https'); ?>?action=se_lookup';
	
	
    jQuery(document).ready(function() {
	    
	  	//console.log(se_ajax_url2);
	  	$.ajax({
		  url: se_ajax_url
		}).error(function(msg) {
				$.ajax({
				  url: se_ajax_url_https
				}).error(function(msg) {
					console.log("The connection to the admin interface has failed.");	
					
				}).done(function(msg) {
				 
				  var se_ajax_array = msg.split('~');
				  		  
				  
				  	jQuery('.search-field').suggest(se_ajax_array, {
			         suggestionColor   : '#cccccc',
					 moreIndicatorClass: 'suggest-more',
					 moreIndicatorText : '&hellip;'
		        	});
				});
			
		}).done(function(msg) {
		 
		  var se_ajax_array = msg.split('~');
		  		  
		  
		  	jQuery('.search-field').suggest(se_ajax_array, {
	         suggestionColor   : '#cccccc',
			 moreIndicatorClass: 'suggest-more',
			 moreIndicatorText : '&hellip;'
        	});
		});
		
	   //console.log(se_ajax_url3);
        
    });
</script>
<?php
}

add_action('wp_ajax_se_lookup', 'se_lookup');
add_action('wp_ajax_nopriv_se_lookup', 'se_lookup');

function se_lookup() {
    global $wpdb;
    
    

    $search = like_escape($_REQUEST['q']);

    $query = 'SELECT ID,post_title FROM ' . $wpdb->posts . '
        WHERE post_title LIKE \'' . $search . '%\'
        AND post_status = \'publish\'
        ORDER BY post_title ASC';
    
    //$post_array = [];
    foreach ($wpdb->get_results($query) as $row) {
        
        
        $post_title = $row->post_title;
        //$id = $row->ID;

        //$meta = get_post_meta($id, 'YOUR_METANAME', TRUE);

        echo $post_title . "~";
       
    }

    die();
}


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

      

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}


/**** Adding SVG Support ****/
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**** Add Featured Image Support ****/
add_theme_support( 'post-thumbnails' );


/***** Add Custom Post type for Hero Image ****/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'headerslides',
		array(
			'labels' => array(
				'name' => __( 'Header Slides' ),
				'singular_name' => __( 'Header Slide' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array(
	  'title',
	  'editor',
	  'excerpt',
	  'revisions',
	  'thumbnail',
	  'author',
	  'page-attributes',
	  )
		)
	);
}


/*** Setting default header for theme ****/
$defaults = array(
	'default-image'          => get_template_directory_uri() . '/images/default-logo.svg',
	'width'                  => 280,
	'height'                 => 80,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => false,
	'default-text-color'     => '#ffffff',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


/**** Added ACF fields for Header Slides ****/
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_hero-image-fields',
		'title' => 'Hero Image Fields',
		'fields' => array (
			array (
				'key' => 'field_554146e0cd9b4',
				'label' => 'Sub Heading Text',
				'name' => 'sub_heading_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_554146f2cd9b5',
				'label' => 'Link To',
				'name' => 'link_to',
				'type' => 'radio',
				'choices' => array (
					'none' => 'Do not link',
					'pageorpost' => 'Link to a Page or Post',
					'externalurl' => 'Specify a URL',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'none',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5541473ccd9b6',
				'label' => 'Link to a Page or Post',
				'name' => 'link_to_a_page_or_post',
				'type' => 'page_link',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_554146f2cd9b5',
							'operator' => '==',
							'value' => 'pageorpost',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_554147f9cd9b7',
				'label' => 'Specify a URL',
				'name' => 'specify_a_url',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_554146f2cd9b5',
							'operator' => '==',
							'value' => 'externalurl',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'www.wisc.edu',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55414630cd9b2',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'headerslides',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}



/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'uw_madison_wp_2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uw_madison_wp_2015_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on UW Madison WP 2015, use a find and replace
	 * to change 'uw-madison-wp-2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'uw-madison-wp-2015', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'uw-madison-wp-2015' ),
		'youruw' => __( 'Your UW Menu', 'uw-madison-wp-2015' ),
	) );

	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'uw_madison_wp_2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // uw_madison_wp_2015_setup
add_action( 'after_setup_theme', 'uw_madison_wp_2015_setup' );


if (function_exists('add_image_size')) {
		add_image_size( 'hero-image', 1200 ); // 1200 pixels wide (and unlimited height)
	}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function uw_madison_wp_2015_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'uw-madison-wp-2015' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'uw_madison_wp_2015_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uw_madison_wp_2015_scripts() {
	wp_enqueue_style( 'uw-madison-wp-2015-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'uw-madison-wp-2015-mainstyles', get_template_directory_uri().'/dist/styles/master.min.css' );

	wp_enqueue_script( 'uw-madison-wp-2015-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'uw-madison-wp-2015-main', get_template_directory_uri() . '/dist/scripts/main.min.js', array(), '20150429', true );

	wp_enqueue_script( 'uw-madison-wp-2015-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uw_madison_wp_2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Disable support for comments and trackbacks in post types
function wptips_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'wptips_disable_comments_post_types_support');

// Close comments on the front-end
function wptips_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'wptips_disable_comments_status', 20, 2);
add_filter('pings_open', 'wptips_disable_comments_status', 20, 2);

// Hide existing comments
function wptips_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'wptips_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function wptips_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'wptips_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function wptips_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'wptips_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function wptips_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'wptips_disable_comments_dashboard');

// Remove comments links from admin bar
function wptips_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'wptips_disable_comments_admin_bar');


function example_disable_all_comments_and_pings() {
  // Turn off comments
  if( '' != get_option( 'default_ping_status' ) ) {
    update_option( 'default_ping_status', '' );
  } // end if

  // Turn off pings
  if( '' != get_option( 'default_comment_status' ) ) {
    update_option( 'default_comment_status', '' );
  } // end if
} // end example_disable_all_comments_and_pings

add_action( 'after_setup_theme', 'example_disable_all_comments_and_pings' );
