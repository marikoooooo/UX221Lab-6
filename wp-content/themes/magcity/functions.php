<?php
/**
 * magcity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package magcity
 */

if ( ! defined( 'MAGCITY_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MAGCITY_VERSION', '1.0.2' );
}

if ( ! function_exists( 'magcity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magcity_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on magcity, use a find and replace
		 * to change 'magcity' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magcity', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
			'top'    => __( 'Primary Menu', 'magcity' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'magcity_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'magcity_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magcity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magcity_content_width', 640 );
}
add_action( 'after_setup_theme', 'magcity_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magcity_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'magcity' ),
			'id'            => 'sidebar-main',
			'description'   => __( 'Add widgets here.', 'magcity' ),
			'before_widget' => '<div id="%1$s" class="widget sidebar-post sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><h3 class="title mb-20">',
			'after_title'   => '</h3></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'magcity' ),
			'id'            => 'footer-widgets',
			'description'   => __( 'Add widgets here.', 'magcity' ),
			'before_widget' => '<div class="%2$s footer-widget col-md-3 col-sm-6 col-xs-12">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><h3 class="widget-title mb-20">',
			'after_title'   => '</h3></div>',
		)
	);
}
add_action( 'widgets_init', 'magcity_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function magcity_scripts() {
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css');
	wp_enqueue_style('magcity-meanmenu-css', get_template_directory_uri() . '/assets/css/magcity-meanmenu.css');
	wp_enqueue_style('magcity-responsive-css', get_template_directory_uri() . '/assets/css/magcity-responsive.css');
	wp_enqueue_style('magcity-custom-css', get_template_directory_uri() . '/assets/css/magcity-custom.css');


	wp_enqueue_style( 'magcity-style', get_stylesheet_uri(), array(), MAGCITY_VERSION );
	wp_style_add_data( 'magcity-style', 'rtl', 'replace' );

	wp_enqueue_script( 'magcity-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), MAGCITY_VERSION, true );

	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.js',array('jquery'), MAGCITY_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js',array(), MAGCITY_VERSION, true );

	wp_enqueue_script( 'magcity-main-js', get_template_directory_uri() . '/assets/js/main.js',array(), MAGCITY_VERSION, true );

	wp_enqueue_script( 'magcity-global-js', get_template_directory_uri() . '/assets/js/global.js',array(), MAGCITY_VERSION, true );
	
	wp_enqueue_script( 'magcity-menu-modal', get_template_directory_uri() . '/assets/js/menu-accessibility.js',array(), MAGCITY_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magcity_scripts' );

function magcity_blog_admin_notice() {
    if (get_user_meta(get_current_user_id(), 'magcity_blog_notice_dismissed', true)) {
        return;
    }
    ?>
    <div class="notice notice-info is-dismissible" id="magcity-blog-notice">
        <p><strong>Thanks for installing Magcity Blog!</strong> 🎉</p>
        <p>
            Build your perfect blog with our customizable and feature-rich theme.  
            Explore a variety of features, elements, and exclusive customization options to craft a stunning website.
        </p>
        <p>
            <a href="https://demo.techknowprime.com/bizzmaster/" class="button button-primary" target="_blank">Live Demo</a>
            <a href="https://techknowprime.com/product/bizzmaster/" class="button button-secondary" target="_blank">Buy Pro</a>
        </p>
    </div>
    
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).on('click', '.notice.is-dismissible', function() {
                $.post(ajaxurl, { 
                    action: 'dismiss_magcity_blog_notice',
                    security: '<?php echo wp_create_nonce("dismiss_magcity_blog_notice"); ?>'
                });
            });
        });
    </script>
    <?php
}
add_action('admin_notices', 'magcity_blog_admin_notice');


function dismiss_magcity_blog_notice() {
    check_ajax_referer('dismiss_magcity_blog_notice', 'security');
    update_user_meta(get_current_user_id(), 'magcity_blog_notice_dismissed', true);
    wp_die();
}
add_action('wp_ajax_dismiss_magcity_blog_notice', 'dismiss_magcity_blog_notice');

function reset_magcity_blog_notice() {
    $users = get_users();
    foreach ($users as $user) {
        delete_user_meta($user->ID, 'magcity_blog_notice_dismissed');
    }
}
add_action('after_switch_theme', 'reset_magcity_blog_notice');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/controls.php';

require get_template_directory() . '/inc/customizer.php';

require_once( trailingslashit( get_template_directory() ) . '/inc/custom-button/class-customize.php' );

/**
 * tgm plugin recommendation
 */
require get_template_directory()  . '/inc/tgm/class-tgm-plugin-activation.php';
require get_template_directory(). '/inc/tgm/hook-tgm.php';