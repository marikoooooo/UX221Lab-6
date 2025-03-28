<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<main class="site-main">
    <?php do_action('mmlb_archive_header'); ?>
    <section class="block-content mt-4">
        <div class="container">
            <div class="">
                <div class="row bor-col-d">
                    <?php
                        $args = mmlb_archive_layout();
                        $col_one = $args['col_one'];
                        $col_two = $args['col_two'];
                        $layout = $args['layout'];
                        $sidebar_position = $args['sidebar'];
                    ?>
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <?php
                            if ( woocommerce_product_loop() ) {
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );

                                woocommerce_product_loop_start();

                                if ( wc_get_loop_prop( 'total' ) ) {
                                    while ( have_posts() ) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action( 'woocommerce_shop_loop' );

                                        wc_get_template_part( 'content', 'product' );
                                    }
                                }

                                woocommerce_product_loop_end();

                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            } else {
                                /**
                                 * Hook: woocommerce_no_products_found.
                                 *
                                 * @hooked wc_no_products_found - 10
                                 */
                                do_action( 'woocommerce_no_products_found' );
                            }

                            /**
                             * Hook: woocommerce_after_main_content.
                             *
                             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                             */
                            do_action( 'woocommerce_after_main_content' );
                            ?>
                    </div>
                    <div class="<?php echo esc_attr($col_two); ?>">
                        <aside id="secondary" class="widget-area">
                            <?php
                                if ( is_active_sidebar( $sidebar_position ) ) {
                                    dynamic_sidebar( $sidebar_position );
                                }
                            ?>
                        </aside>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer( 'shop' );
