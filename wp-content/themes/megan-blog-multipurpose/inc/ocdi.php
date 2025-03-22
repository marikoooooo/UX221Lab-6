<?php

function import_files() {
    return [
        [
            'import_file_name'             => 'Luca',
            'categories'                   => [ 'Listings' ],
            'import_file_url'            => 'http://demo1.crthemes.com/data/luca/content.xml',
            'import_widget_file_url'     => 'http://demo1.crthemes.com/data/luca/widgets.wie',
            'import_customizer_file_url' => 'http://demo1.crthemes.com/data/luca/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.png',
            'preview_url'                  => MMLB_URL_DEMO,
        ]
    ];
}
add_filter( 'ocdi/import_files', 'import_files' );


/**
 * OCDI before import.
 */
function megan_minimal_lightweight_blog__before_content_import( $selected_import ) {
    $shop = get_page_by_path('shop');
    $wishlist = get_page_by_path('wishlist');
    $home = get_page_by_path('home');
    $checkout = get_page_by_path('checkout');
    $blog = get_page_by_path('blog');
    $cart = get_page_by_path('cart');
    $myaccount = get_page_by_path( 'my-account' );

    wp_delete_post($shop->ID);
    wp_delete_post($wishlist->ID);
    wp_delete_post($home->ID);
    wp_delete_post($checkout->ID);
    wp_delete_post($blog->ID);
    wp_delete_post($cart->ID);
    wp_delete_post($myaccount->ID);
}
add_action( 'ocdi/before_content_import', 'megan_minimal_lightweight_blog__before_content_import' );

/**
 * OCDI after import.
 */
function megan_minimal_lightweight_blog_after_import_setup() {

	// Assign menus to their locations.
	$primary_menu = get_term_by( 'name', 'Menu 1', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $primary_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

    $woocommerce_shop = get_page_by_path('shop');
    $woocommerce_checkout = get_page_by_path( 'checkout' );
    $woocommerce_cart = get_page_by_path( 'cart' );
    $woocommerce_myaccount = get_page_by_path( 'my-account' );
    update_option( 'woocommerce_cart', $woocommerce_cart->ID );
    update_option( 'woocommerce_checkout_page_id', $woocommerce_checkout->ID );
    update_option( 'woocommerce_cart_page_id', $woocommerce_cart->ID );
    update_option( 'woocommerce_myaccount_page_id', $woocommerce_myaccount->ID );
    update_option( 'woocommerce_shop_page_id', $woocommerce_shop->ID );
}
add_action( 'ocdi/after_import', 'megan_minimal_lightweight_blog_after_import_setup' );



