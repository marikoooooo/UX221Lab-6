<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div >
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Megan_Minimal_Lightweight_Blog
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content','megan-blog-multipurpose' ); ?></a>

    <?php do_action('megan_minimal_lightweight_blog_header'); ?>

