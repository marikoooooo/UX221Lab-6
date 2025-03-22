<?php
    $enable_product = get_theme_mod('crt_manage_enable_product_section');
    $heading = get_theme_mod('crt_manage_product_headline');
    $product_list = get_theme_mod('crt_manage_product_list');
    $product_row = get_theme_mod('crt_manage_product_slider_on_row');
    if(!$enable_product) {
        return;
    }
?>

<section id="product" class="product-section mt-5">
    <div class="container position-relative">
        <?php crt_manage_section_link( 'Product' ); ?>
        <div class="col-12">
            <h2 class="product__heading"><?php echo esc_html($heading); ?><i class="fa-solid fa-store"></i></h2>
            <div class="product__list product-col-<?php echo esc_attr($product_row); ?>">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'post__in'      => $product_list
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        get_template_part( 'woocommerce/content', 'product-item' );
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>