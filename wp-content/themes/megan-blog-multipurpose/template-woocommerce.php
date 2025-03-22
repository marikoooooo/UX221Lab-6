<?php
/**
 * Template Name: Woocommerce
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

get_header();
?>
<main  class="site-main">
    <section class="custom-block-woo">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'woo' );

                        endwhile; // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
