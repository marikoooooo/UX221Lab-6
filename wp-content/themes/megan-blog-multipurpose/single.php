<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

get_header();
?>
<?php
    $post_id = get_the_ID();
    $thumbnail = get_theme_mod('crt_manage_single_thumbnail', 'outer-thumb');
    $args = mmlb_archive_layout();
    $col_one = $args['col_one'];
    $col_two = $args['col_two'];
    $sidebar_position = $args['sidebar'];
    $related_layout = $args['layout'];
    $layout = get_theme_mod('crt_manage_single_sidebar', 'right-sidebar');
    if(get_post_format() == 'aside') {
        $layout = 'right-sidebar';
    }
    mmlb_set_post_view_count($post_id);
?>
<main  class="site-main single-<?php echo esc_attr($layout); ?>" itemscope="" itemtype="https://schema.org/CreativeWork">
    <section class="single-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center py-3 py-sm-5">
                    <div class="breadcrumb-option">
                        <?php do_action('megan_minimal_lightweight_blog_breadcrumb'); ?>
                    </div>
                    <div class="single-heading-default">
                        <?php the_title( '<h1 class="single-heading-default__title text-center">', '</h1>' ); ?>
                        <div class="entry mt-3 d-flex justify-content-center">
                            <?php megan_minimal_lightweight_blog_entry_options(get_post($post_id), array('class' => 'd-flex justify-content-center', 'entry_date' => true, 'entry_cat' => false, 'entry_author' => true, 'entry_read_time' => false, 'entry_comment' => false, 'entry_view_count' => true)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-content mt-4">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <div class="single-detail__inner">
                        <?php megan_minimal_lightweight_blog_post_thumb('image-default lazy ratio32 mb-3') ?>
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'single' );

                            get_template_part( 'template-parts/content', 'single-share' );

                            do_action( 'megan_minimal_lightweight_blog_post_navigation' );

                            do_action( 'megan_minimal_lightweight_blog_author', $post );

                            // Related Posts
                            if ( is_singular( 'post' ) ) {
                                $related_heading = get_theme_mod( 'crt_manage_single_related_heading', __( 'Related Posts','megan-blog-multipurpose' ) );
                                $grid = str_contains($related_layout, 'masonry');
                                $cat_content_id      = get_the_category( $post->ID )[0]->term_id;
                                $args                = array(
                                    'cat'            => $cat_content_id,
    //                                'posts_per_page' => 3,
                                    'post__not_in'   => array( $post->ID ),
                                    'orderby'        => 'rand',
                                );
                                $query               = new WP_Query( $args );
                                if ( $query->have_posts() ) :
                                    ?>
                                    <div class="related-posts mt-4">
                                        <h2><?php echo esc_html( $related_heading ); ?></h2>
                                        <div class="<?php echo esc_attr($grid ? 'grid':'row') ?>">
                                            <?php
                                                while ( $query->have_posts() ) :
                                                $query->the_post();
                                                get_template_part( 'template-parts/content', $related_layout );
                                                endwhile;
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            }

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                        </div>
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
get_footer();
