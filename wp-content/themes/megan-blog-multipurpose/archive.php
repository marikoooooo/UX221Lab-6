<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

get_header();
?>
<main  class="site-main">
    <?php do_action('mmlb_archive_header'); ?>
    <section class="area-category mt-4">
        <div class="container">
            <div class="">
                <div class="row bor-col-d">
                    <?php
                        $args = mmlb_archive_layout();
                        $col_one = $args['col_one'];
                        $col_two = $args['col_two'];
                        $layout = $args['layout'];
                        $sidebar_position = $args['sidebar'];
                        $grid = str_contains($layout, 'masonry');
                    ?>
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <div class="archive__inner ">
                            <div class="<?php echo esc_attr($grid ? 'grid bor-col-d':'row bor-col-d') ?>">
                                <?php if ( have_posts() ) :
                                        /* Start the Loop */
                                        while ( have_posts() ) :
                                            the_post();
                                            /*
                                            * Include the Post-Type-specific template for the content.
                                            * If you want to override this in a child theme, then include a file
                                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                            */

                                            get_template_part( 'template-parts/content', $layout, array('sidebar' => $col_two) );
                                        endwhile;
                                    else :
                                        get_template_part( 'template-parts/content', 'none' );
                                    endif;
                                ?>
                            </div>
                            <?php
                                do_action( 'megan_minimal_lightweight_blog_posts_pagination' );
                            ?>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($col_two); ?>">
                        <aside id="secondary" class="widget-area">
                            <?php
                                if (is_active_sidebar( $sidebar_position ) ) {
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
get_footer();
