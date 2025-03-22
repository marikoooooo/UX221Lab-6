<?php
/**
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

$args = mmlb_archive_layout();
$col_one = $args['col_one'];
$col_two = $args['col_two'];
$layout = get_theme_mod('crt_manage_page_sidebar', 'right-sidebar');
$sidebar_position = $args['sidebar'];
$thumbnail = get_theme_mod('crt_manage_page_thumbnail', 'outer-thumb');

?>
<main  class="site-main single-<?php echo esc_attr($layout); ?>">
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
                            <?php megan_minimal_lightweight_blog_entry_options(get_post(), array('class' => 'd-flex justify-content-center', 'entry_date' => true, 'entry_cat' => false, 'entry_author' => true, 'entry_read_time' => false, 'entry_comment' => false, 'entry_view_count' => false)); ?>
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
                        <div class="page__inner">
                            <?php megan_minimal_lightweight_blog_post_thumb('image-default lazy ratio32 mb-3'); ?>
                            <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($col_two); ?>">
                        <?php
                        if ( ! is_active_sidebar( $sidebar_position ) ) {
                            return;
                        }
                        ?>
                        <aside id="secondary" class="widget-area">
                            <?php dynamic_sidebar( $sidebar_position ); ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
