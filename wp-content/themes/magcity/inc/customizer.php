<?php
/**
 * magcity Theme Customizer
 *
 * @package magcity
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function magcity_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	 
	//=============================================================
	// Remove header image from theme customizer
	//=============================================================
	$wp_customize->remove_control("header_image");

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'magcity_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'magcity_customize_partial_blogdescription',
			)
		);
	}

	/*Magcity Option Panel*/
	$wp_customize->add_panel( 'magcity_theme_options', array(
	    'title'     => __( 'Magcity Theme Options', 'magcity' ),
	    'priority'  => 1,
	) );

	/*Top Header Options Section*/
	$wp_customize->add_section( 'magcity_top_header_options', array (
		'title'     => __( 'Top Header Options', 'magcity' ),
		'panel'     => 'magcity_theme_options',
		'priority'  => 10,
		'description' => __( 'Personalize the settings top header.', 'magcity' ),
	) );

	// Top Header Display Control
	$wp_customize->add_setting ( 'magcity_top_header_display', array (
		'default'           =>  true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_top_header_display', array (
		'label'           => __( 'Display Top Header', 'magcity' ),
		'section'         => 'magcity_top_header_options',
		'priority'        => 1,
		'type'            => 'checkbox',
	) );

	// Top Header Contact Display Control
	$wp_customize->add_setting ( 'magcity_top_header_contact_display', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_top_header_contact_display', array (
		'label'           => __( 'Display Contact Number', 'magcity' ),
		'section'         => 'magcity_top_header_options',
		'priority'        => 2,
		'type'            => 'checkbox',
		'active_callback' => 'magcity_header_active_callback'
	) );

	// Contact Number
	$wp_customize->add_setting ( 'magcity_top_header_contact', array(
		'default'           => __( '011(987) 1786', 'magcity' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'magcity_top_header_contact', array(
		'label'    => __( 'Contact Number', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 3,
		'type'     => 'text',
		'active_callback' => 'magcity_header_contact_active_callback'
	) );

  // Top Header Email Display Control
	$wp_customize->add_setting ( 'magcity_top_header_email_display', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_top_header_email_display', array (
		'label'           => __( 'Display Email', 'magcity' ),
		'section'         => 'magcity_top_header_options',
		'priority'        => 4,
		'type'            => 'checkbox',
		'active_callback' => 'magcity_header_active_callback'
	) );

	// Email
	$wp_customize->add_setting ( 'magcity_top_header_email', array(
		'default'           => __( 'support@example.com', 'magcity' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'magcity_top_header_email', array(
		'label'    => __( 'Email', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 5,
		'type'     => 'text',
		'active_callback' => 'magcity_header_email_active_callback'
	) );

	// Top Header Address Display Control
	$wp_customize->add_setting ( 'magcity_top_header_address_display', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_top_header_address_display', array (
		'label'           => __( 'Display Address', 'magcity' ),
		'section'         => 'magcity_top_header_options',
		'priority'        => 6,
		'type'            => 'checkbox',
		'active_callback' => 'magcity_header_active_callback'
	) );

	// Address
	$wp_customize->add_setting ( 'magcity_top_header_address', array(
		'default'           => __( 'Conaway Street, Fairbanks', 'magcity' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'magcity_top_header_address', array(
		'label'    => __( 'Address', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 7,
		'type'     => 'text',
		'active_callback' => 'magcity_header_address_active_callback'
	) );

	// Top Header Menu Social Icon Display Control
	$wp_customize->add_setting ( 'magcity_top_header_social_icon_display', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_top_header_social_icon_display', array (
		'label'           => __( 'Display Top Header Social Icons', 'magcity' ),
		'section'         => 'magcity_top_header_options',
		'priority'        => 8,
		'type'            => 'checkbox',
		'active_callback' => 'magcity_header_active_callback'
	) );

	// Facebook URL
	$wp_customize->add_setting ( 'magcity_social_icon_fb_url', array(
		'default'           => __( '#', 'magcity' ),
		'sanitize_callback' => 'esc_url_raw',


	) );

	$wp_customize->add_control ( 'magcity_social_icon_fb_url', array(
		'label'    => __( 'Facebook URL', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 9,
		'type'     => 'url',
		'active_callback' => 'magcity_header_social_active_callback'

	) );

	// Twitter URL
	$wp_customize->add_setting ( 'magcity_social_icon_twitter_url', array(
		'default'           => __( '#', 'magcity' ),
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'magcity_social_icon_twitter_url', array(
		'label'    => __( 'Twitter URL', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 10,
		'type'     => 'url',
		'active_callback' => 'magcity_header_social_active_callback'
	) );

	// Linkedin URL
	$wp_customize->add_setting ( 'magcity_social_icon_linkedin_url', array(
		'default'           => __( '#', 'magcity' ),
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'magcity_social_icon_linkedin_url', array(
		'label'    => __( 'Linkedin URL', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 11,
		'type'     => 'url',
		'active_callback' => 'magcity_header_social_active_callback'
	) );

	// Instagram URL
	$wp_customize->add_setting ( 'magcity_social_icon_insta_url', array(
		'default'           => __( '#', 'magcity' ),
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'magcity_social_icon_insta_url', array(
		'label'    => __( 'Instagram URL', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 12,
		'type'     => 'url',
		'active_callback' => 'magcity_header_social_active_callback'
	) );

	// Pinterest URL
	/*$wp_customize->add_setting ( 'magcity_social_icon_pint_url', array(
		'default'           => __( '#', 'magcity' ),
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'magcity_social_icon_pint_url', array(
		'label'    => __( 'Pinterest URL', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 13,
		'type'     => 'url',
		'active_callback' => 'magcity_header_social_active_callback'
	) );

		// Youtube URL
	$wp_customize->add_setting ( 'magcity_social_icon_yout_url', array(
		'default'           => __( '#', 'magcity' ),
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control ( 'magcity_social_icon_yout_url', array(
		'label'    => __( 'Youtube URL', 'magcity' ),
		'section'  => 'magcity_top_header_options',
		'priority' => 14,
		'type'     => 'url',
		'active_callback' => 'magcity_header_social_active_callback'
	) );*/

	// Social URL Target Display Control
	$wp_customize->add_setting ( 'magcity_social_icon_target_display', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_social_icon_target_display', array (
		'label'           => __( 'Display Social URL in new Window', 'magcity' ),
		'section'         => 'magcity_top_header_options',
		'priority'        => 15,
		'type'            => 'checkbox',
		'active_callback' => 'magcity_header_social_active_callback'
	) );


	/*General Options Section*/
	$wp_customize->add_section( 'magcity_general_options', array (
		'title'     => __( 'General Options', 'magcity' ),
		'panel'     => 'magcity_theme_options',
		'priority'  => 20,
		'description' => __( 'Personalize the settings of your theme.', 'magcity' ),
	) );

	// Enable Sticky Header
	$wp_customize->add_setting ( 'magcity_enable_sticky_header', array (
		'default'           =>  true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_enable_sticky_header', array (
		'label'           => __( 'Enable Sticky Header', 'magcity' ),
		'section'         => 'magcity_general_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Enable Scroll to Top
	$wp_customize->add_setting ( 'magcity_enable_scroll_top', array (
		'default'           =>  true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_enable_scroll_top', array (
		'label'           => __( 'Enable Scroll to Top', 'magcity' ),
		'section'         => 'magcity_general_options',
		'priority'        => 10,
		'type'            => 'checkbox',
	) );

	// Read More Label
	$wp_customize->add_setting ( 'magcity_read_more_label', array(
		'default'           => __( 'Read More', 'magcity' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'magcity_read_more_label', array(
		'label'    => __( 'Read More Label', 'magcity' ),
		'section'  => 'magcity_general_options',
		'priority' => 15,
		'type'     => 'text',
	) );

	// Excerpt Length
	$wp_customize->add_setting ( 'magcity_excerpt_length', array(
		'default'           => __( '20', 'magcity' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control ( 'magcity_excerpt_length', array(
		'label'    => __( 'Excerpt Length', 'magcity' ),
		'description' => __( '0 length will not show the excerpt.', 'magcity' ),
		'section'  => 'magcity_general_options',
		'priority' => 20,
		'type'     => 'number',
	) );

	/*layout options*/
	$wp_customize->add_section( 'magcity_layout_options', array (
		'title'     => __( 'Layout Options', 'magcity' ),
		'panel'     => 'magcity_theme_options',
		'priority'  => 30,
		'description' => __( 'Personalize the layout settings of your theme.', 'magcity' ),
	) );

	// Theme Layout
	$wp_customize->add_setting ( 'magcity_theme_layout', array(
		'default'           => __('wide', 'magcity' ),
		'sanitize_callback' => 'magcity_sanitize_select',
	) );

	$wp_customize->add_control ( 'magcity_theme_layout', array(
		'label'    => __( 'Theme Layout', 'magcity' ),
		'description' => __( 'Box layout will be visible at minimum 1200px display', 'magcity' ),
		'section'  => 'magcity_layout_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => array(
			'wide' => __( 'Wide', 'magcity' ),
			'box'  => __( 'Box',  'magcity' ),
		),
	) );

	// Main Sidebar Position
	$wp_customize->add_setting ( 'magcity_sidebar_position', array (
		'default'           => __( 'right', 'magcity' ),
		'sanitize_callback' => 'magcity_sanitize_select',
	) );

	$wp_customize->add_control ( 'magcity_sidebar_position', array (
		'label'    => __( 'Sidebar Position', 'magcity' ),
		'section'  => 'magcity_layout_options',
		'priority' => 2,
		'type'     => 'select',
		'choices'  => array(
			'right' => __( 'Right Sidebar', 'magcity'),
			'left'  => __( 'Left Sidebar',  'magcity'),
			'no'    => __( 'No Sidebar',  'magcity'),
		),
	) );

	/*Blog Post Options*/
	$wp_customize->add_section( 'magcity_archive_content_options', array (
		'title'     => __( 'Blog Post Options', 'magcity' ),
		'panel'     => 'magcity_theme_options',
		'priority'  => 40,
		'description' => __( 'Setting will also apply on archieve and search page.', 'magcity' ),
	) );

	// Post Category Display Control
	$wp_customize->add_setting ( 'magcity_blog_page_catgories', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_blog_page_catgories', array (
		'label'           => __( 'Display Categories', 'magcity' ),
		'section'         => 'magcity_archive_content_options',
		'priority'        => 1,
		'type'            => 'checkbox',
	) );

	// Post Author Display Control
	$wp_customize->add_setting ( 'magcity_archive_co_post_author', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_archive_co_post_author', array (
		'label'           => __( 'Display Author', 'magcity' ),
		'section'         => 'magcity_archive_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Comments Display Control
	/*$wp_customize->add_setting ( 'magcity_archive_co_post_comments', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_archive_co_post_comments', array (
		'label'           => __( 'Display Comments Count', 'magcity' ),
		'section'         => 'magcity_archive_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );*/

	// Post Date Display Control
	$wp_customize->add_setting ( 'magcity_archive_co_post_date', array (
		'default'           =>  true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_archive_co_post_date', array (
		'label'           => __( 'Display Date', 'magcity' ),
		'section'         => 'magcity_archive_content_options',
		'priority'        => 4,
		'type'            => 'checkbox',
	) );

	// Featured Image Archive Control
	$wp_customize->add_setting ( 'magcity_blog_content', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_blog_content', array (
		'label'           => __( 'Display Content', 'magcity' ),
		'section'         => 'magcity_archive_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	/*Single Post Options*/
	$wp_customize->add_section( 'magcity_single_content_options', array (
		'title'     => __( 'Single Post Options', 'magcity' ),
		'panel'     => 'magcity_theme_options',
		'priority'  => 50,
		'description' => __( 'Setting will apply on the content of single posts.', 'magcity' ),
	) );

	// Post Categories Display Control
	$wp_customize->add_setting ( 'magcity_single_co_post_categories', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_single_co_post_categories', array (
		'label'           => __( 'Display Categories', 'magcity' ),
		'section'         => 'magcity_single_content_options',
		'priority'        => 1,
		'type'            => 'checkbox',
	) );

	// Post Author Display Control
	$wp_customize->add_setting ( 'magcity_single_co_post_author', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_single_co_post_author', array (
		'label'           => __( 'Display Author', 'magcity' ),
		'section'         => 'magcity_single_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Single Post Comments Display Control
	$wp_customize->add_setting ( 'magcity_single_co_post_comments', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_single_co_post_comments', array (
		'label'           => __( 'Display Comments Count', 'magcity' ),
		'section'         => 'magcity_single_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );

	// Post Date Display Control
	$wp_customize->add_setting ( 'magcity_single_co_post_date', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_single_co_post_date', array (
		'label'           => __( 'Display Date', 'magcity' ),
		'section'         => 'magcity_single_content_options',
		'priority'        => 4,
		'type'            => 'checkbox',
	) );

	// Single Post Tags Display Control
	$wp_customize->add_setting ( 'magcity_single_co_post_tags', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_single_co_post_tags', array (
		'label'           => __( 'Display Tags', 'magcity' ),
		'section'         => 'magcity_single_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Featured Image Post Display Control
	$wp_customize->add_setting ( 'magcity_single_co_featured_image_post', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_single_co_featured_image_post', array (
		'label'           => __( 'Display Featured Image', 'magcity' ),
		'section'         => 'magcity_single_content_options',
		'priority'        => 7,
		'type'            => 'checkbox',
	) );

	/*Footer Option*/
	$wp_customize->add_section( 'magcity_footer_options', array (
		'title'       => __( 'Footer Options', 'magcity' ),
		'panel'       => 'magcity_theme_options',
		'priority'    => 60,
		'description' => __( 'Personalize the footer settings of your theme.', 'magcity' ),
	) );

	// Top Header Display Control
	$wp_customize->add_setting ( 'magcity_footer_copyright_display', array (
		'default'           => true,
		'sanitize_callback' => 'magcity_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'magcity_footer_copyright_display', array (
		'label'           => __( 'Display Copyright Footer', 'magcity' ),
		'section'         => 'magcity_footer_options',
		'priority'        => 1,
		'type'            => 'checkbox',
	) );

	// Copyright Control
	$wp_customize->add_setting ( 'magcity_copyright', array (
		'default'           => __( 'Powered by WordPress', 'magcity' ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control ( 'magcity_copyright', array (
		'label'    => __( 'Copyright', 'magcity' ),
		'section'  => 'magcity_footer_options',
		'priority' => 2,
		'type'     => 'textarea',
		'active_callback' => 'magcity_footer_copyright_callback'
	) );
}
add_action( 'customize_register', 'magcity_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magcity_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magcity_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magcity_customize_preview_js() {
	wp_enqueue_script( 'magcity-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), MAGCITY_VERSION, true );
}
add_action( 'customize_preview_init', 'magcity_customize_preview_js' );

/*callback function for top header section*/
if ( !function_exists('magcity_header_active_callback') ) :
  function magcity_header_active_callback(){
  	  $show_topheader = get_theme_mod('magcity_top_header_display',true);
      
      if( true == $show_topheader ){
          return true;
      }
      else{
          return false;
      }
  }
endif;
if ( !function_exists('magcity_header_social_active_callback') ) :
  function magcity_header_social_active_callback(){
  	  $show_social = get_theme_mod('magcity_top_header_social_icon_display',true);
  	  $show_topheader = get_theme_mod('magcity_top_header_display',true);
      
      if( $show_social && $show_topheader ){
          return true;
      }
      else{
          return false;
      }
  }
endif;


if ( !function_exists('magcity_header_contact_active_callback') ) :
  function magcity_header_contact_active_callback(){
  	  $show_contact = get_theme_mod('magcity_top_header_contact_display',true);
  	  $show_topheader = get_theme_mod('magcity_top_header_display',true);
      
      if( $show_contact && $show_topheader ){
          return true;
      }
      else{
          return false;
      }
  }
endif;


if ( !function_exists('magcity_header_email_active_callback') ) :
  function magcity_header_email_active_callback(){
  	  $show_email = get_theme_mod('magcity_top_header_email_display',true);
  	  $show_topheader = get_theme_mod('magcity_top_header_display',true);
      
      if( $show_email && $show_topheader ){
          return true;
      }
      else{
          return false;
      }
  }
endif;


if ( !function_exists('magcity_header_address_active_callback') ) :
  function magcity_header_address_active_callback(){
  	  $show_address = get_theme_mod('magcity_top_header_address_display',true);
  	  $show_topheader = get_theme_mod('magcity_top_header_display',true);
      
      if( $show_address && $show_topheader ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

if ( !function_exists('magcity_footer_copyright_callback') ) :
  function magcity_footer_copyright_callback(){
  
  	  $show_copyright = get_theme_mod('magcity_footer_copyright_display',true);
      
      if( true == $show_copyright ){
          return true;
      }
      else{
          return false;
      }
  }
endif;