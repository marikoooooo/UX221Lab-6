<?php
/**
 * Megan Minimal Lightweight Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

if ( ! defined( 'MMLB_VERSION' ) ) {
	define( 'MMLB_VERSION', wp_get_theme()->get( 'Version' ) );
}
if ( ! defined( 'MMLB_NAME' ) ) {
    define( 'MMLB_NAME', wp_get_theme()->get( 'Name' ) );
}
if ( ! defined( 'MMLB_URL_DEMO' ) ) {
    define( 'MMLB_URL_DEMO', wp_get_theme()->get( 'ThemeURI' ) );
}
if ( ! defined( 'MMLB_URL_DOCS' ) ) {
    define( 'MMLB_URL_DOCS', '#' );
}
if ( ! defined( 'MMLB_URL_GET_PREMIUM' ) ) {
    define( 'MMLB_URL_GET_PREMIUM', '#' );
}
if ( ! defined( 'MMLB_ID_THEMES_PREMIUM' ) ) {
    define( 'MMLB_ID_THEMES_PREMIUM', 58 );
}

if ( ! function_exists( 'mmlb_setup' ) ) :
    function mmlb_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'register_block_style' );

        add_theme_support( 'register_block_pattern' );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'post-formats', array( 'aside', 'video', 'gallery', 'audio') );

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

        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
        ) );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary','megan-blog-multipurpose' ),
            )
        );
        register_nav_menus(
            array(
                'footer' => esc_html__( 'Footer','megan-blog-multipurpose' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'mmlb_setup' );

add_image_size( 'megan-minimal-lightweight-blog-image-medium', 600, 9999 );
add_image_size( 'megan-minimal-lightweight-blog-image-large', 1200, 9999 );

if ( ! function_exists( 'mmlb_after_active' ) ) :
    function mmlb_after_active() {
        $theme_active = get_option('stylesheet');

    }
endif;
add_action('after_switch_theme', 'mmlb_after_active');


if ( ! function_exists( 'mmlb_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see mmlb_header_style().
     */
    function mmlb_header_style() {
        $header_text_color = get_header_textcolor();

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
            return;
        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
            // Has the text been hidden?
            if ( ! display_header_text() ) :
                ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                color: red !important;
            }
            <?php
            // If the user has set a custom color for the text use that.
        else :
            ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }
            <?php endif; ?>
        </style>
        <?php
    }
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mmlb_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'mmlb_content_width', 640 );
}
add_action( 'after_setup_theme', 'mmlb_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function mmlb_widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
    register_sidebar( array(
        'name' => $name,
        'id' => $id,
        'description' => $description,
        'before_widget' => $beforeWidget,
        'after_widget' => $afterWidget,
        'before_title' => $beforeTitle,
        'after_title' => $afterTitle,
    ));
}

function mmlb_widgets_init() {
    mmlb_widget_registration('Sidebar Front Page', 'sidebar-1', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Sidebar Inner 1', 'sidebar-2', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Sidebar Inner 2', 'sidebar-3', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Sidebar Inner 4', 'sidebar-4', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Sidebar Inner 5', 'sidebar-5', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Sidebar Inner 6', 'sidebar-6', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Sidebar E-Commerce', 'sidebar-e-commerce', 'Add widgets here.', '<section id="%1$s" class="widget %2$s">', '</section>', '<h2 class="widget-title"><span>', '</span></h2>');

    mmlb_widget_registration('Footer 1', 'footer-1', 'Add widgets here.', '<div id="%1$s" class="footer %2$s">', '</div>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Footer 2', 'footer-2', 'Add widgets here.', '<div id="%1$s" class="footer %2$s">', '</div>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Footer 3', 'footer-3', 'Add widgets here.', '<div id="%1$s" class="footer %2$s">', '</div>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Footer 4', 'footer-4', 'Add widgets here.', '<div id="%1$s" class="footer %2$s">', '</div>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Footer 5', 'footer-5', 'Add widgets here.', '<div id="%1$s" class="footer %2$s">', '</div>', '<h2 class="widget-title"><span>', '</span></h2>');
    mmlb_widget_registration('Footer Above', 'footer-above', 'Add widgets here.', '<div id="%1$s" class="footer %2$s">', '</div>', '<h2 class="widget-title"><span>', '</span></h2>');
}
add_action( 'widgets_init', 'mmlb_widgets_init' );

/**
 * Count Widget Footer Active
 */
function mmlb_footer_is_widget() {
    $widget_active = array();
    for($i = 1; $i < 5;$i++) {
        if(is_active_sidebar( 'footer-'.$i )) {
            $widget_active[$i] = $i;
        }
    }
    return $widget_active;
}

/**
 * Enqueue scripts and styles.
 */
function mmlb_scripts() {
    wp_enqueue_style( 'megan-news-magazine-style', get_template_directory_uri() . '/style.css', array(), MMLB_VERSION );
    // Main style.
    wp_enqueue_style( 'megan-news-magazine-main-style', get_template_directory_uri() . '/assets/build/css/main.min.css', array(), MMLB_VERSION );

    // Main script.
    wp_enqueue_script( 'megan-news-magazine-main-script', get_template_directory_uri() . '/assets/build/js/main.bundle.js', array( 'jquery' ), MMLB_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_add_inline_script( 'megan-news-magazine-main-script', 'const MMLB_SCRIPT = ' . mmlb_script_inline(), 'before' );
}
add_action( 'wp_enqueue_scripts', 'mmlb_scripts' );

function mmlb_google_font_default() {
    $font_family = array(
        'Roboto:300,regular,700',
        'Merriweather:300,regular,700',
        'Oswald:300,regular,700'
    );
    $query_args = array(
        'family' => urlencode( implode( '|', $font_family ) ),
    );

    if ( ! empty( $font_family ) ) {
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    return $fonts_url;
}

function mmlb_dynamic_front_end_css() {
    if(!crt_manage_plugins_is_active()) {
        $body_font = get_theme_mod('crt_manage_general_body_font', 'Roboto');
        $heading_font = get_theme_mod('crt_manage_general_heading_font', 'Oswald');
        $logo_font = get_theme_mod('crt_manage_header_logo_font', 'Roboto');
        $nav_font = get_theme_mod('crt_manage_general_nav_font', 'Roboto');
        $nav_transform = get_theme_mod('crt_manage_general_nav_transform', 'uppercase');

        $custom_css_front = '';
        $custom_css_front .= ' :root {
           --body-font: '. esc_attr( $body_font ) .';
           --heading-font: '. esc_attr( $heading_font ) .';
           --logo-font: '. esc_attr( $logo_font ) .';
           --nav-font: '. esc_attr( $nav_font ) .';
           --header-nav-transform: '. esc_attr( $nav_transform ) .';
        }';
        wp_register_style( 'megan-news-magazine-style-inline', false );
        wp_enqueue_style( 'megan-news-magazine-style-inline' );
        wp_add_inline_style( 'megan-news-magazine-style-inline', $custom_css_front );

        wp_enqueue_style( 'megan-news-magazine-google-fonts', wptt_get_webfont_url( mmlb_google_font_default() ), array(), null );
    }
}
add_action( 'wp_enqueue_scripts', 'mmlb_dynamic_front_end_css' );

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/inc/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/class-breadcrumb-trail.php';

/**
 * Recommended Plugins
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Quick Setup
 */
require get_template_directory() . '/inc/class-quick-setup.php';

/**
 * Define script const
/**/
function mmlb_script_inline() {
    $slider_show = get_theme_mod('crt_manage_hero_v1_slider_on_row', '1');
    $slider_center_mode = get_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
    $slider_auto_play = get_theme_mod('crt_manage_enable_hero_v1_slider_auto_play', true);
    $slider_center_percent = '10%';
    if( $slider_show < 3) {
        $slider_center_percent = '12%';
    } elseif( $slider_show < 4) {
        $slider_center_percent = '9%';
    } elseif($slider_show < 5) {
        $slider_center_percent = '6%';
    }
    $script_inline = json_encode( array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'HERO_SLIDER_SHOW' => $slider_show,
        'HERO_SLIDER_CENTER_MODE' => $slider_center_mode,
        'HERO_SLIDER_CENTER_PADDING' => $slider_center_mode ? $slider_center_percent:'0',
        'HERO_SLIDER_AUTO_PLAY' => $slider_auto_play,
    ));
    return $script_inline;
}

/**
* Post View Count
/**/
function mmlb_set_post_view_count($postID) {
    $countKey = 'post_view_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Woocommerce.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! function_exists( 'mmlb_is_woocommerce' ) ) {
    function mmlb_is_woocommerce() {
        if(class_exists( 'WooCommerce' )) {
            return true;
        }
        return false;
    }
}
/**
 * CRT Manage is active.
 */
if ( ! function_exists( 'crt_manage_plugins_is_active' ) ) {
    function crt_manage_plugins_is_active() {
        if(class_exists( 'CRT_Manage_Base' )) {
            return true;
        }
        return false;
    }
}
/**
 * Custom Heading Archive.
 */
add_filter('get_the_archive_title', function ($title) {
    $title  = __( 'Archives','megan-blog-multipurpose' );

    if ( is_category() ) {
        $title  = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title  = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title  = get_the_author();
    } elseif ( is_year() ) {
        /* translators: See https://www.php.net/manual/datetime.format.php */
        $title  = get_the_date( _x( 'Y', 'yearly archives date format','megan-blog-multipurpose' ) );
    } elseif ( is_month() ) {
        /* translators: See https://www.php.net/manual/datetime.format.php */
        $title  = get_the_date( _x( 'F Y', 'monthly archives date format','megan-blog-multipurpose' ) );
    } elseif ( is_day() ) {
        /* translators: See https://www.php.net/manual/datetime.format.php */
        $title  = get_the_date( _x( 'F j, Y', 'daily archives date format','megan-blog-multipurpose' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title','megan-blog-multipurpose' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title','megan-blog-multipurpose' );
        }
    } elseif ( is_post_type_archive() ) {
        $title  = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $queried_object = get_queried_object();
        if ( $queried_object ) {
            $tax    = get_taxonomy( $queried_object->taxonomy );
            $title  = single_term_title( '', false );
        }
    } elseif (is_cart()) {
        $title = _x( 'Cart', 'post format archive title','megan-blog-multipurpose' );
    } elseif (is_checkout()) {
        $title = _x( 'Checkout', 'post format archive title','megan-blog-multipurpose' );
    }  elseif (is_search()) {
        $value = get_search_query();
        $title = sprintf( esc_html__( 'Search: %s','megan-blog-multipurpose' ), $value);
    }
    return $title;
});
