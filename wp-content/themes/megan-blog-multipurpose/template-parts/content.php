<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megan_Minimal_Lightweight_Blog
 */
?>

<?php
    $entry_list_date = get_theme_mod( 'crt_manage_entry_list_date', true );
    $entry_list_category = get_theme_mod( 'crt_manage_entry_list_category', true );
    $entry_list_author = get_theme_mod( 'crt_manage_entry_list_author', false );
    $entry_list_read_time = get_theme_mod( 'crt_manage_entry_list_read_time', false );
    $entry_list_comment = get_theme_mod( 'crt_manage_entry_list_comment', false );
    $entry_list_view = get_theme_mod( 'crt_manage_entry_list_view', false );
    $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'megan-minimal-lightweight-blog-image-medium' );

    $get_permalink = get_permalink();
    $post = get_post();
    $post_format = get_post_format($post) ? : 'standard';
?>
<div id="post-<?php the_ID(); ?>" class="post-list__item mb-4 mb-lg-6 <?php echo 'post_' . esc_attr($post_format); ?>">
    <div class="post-list__item--inner border-default">
        <div class="row">
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <a href="<?php echo esc_html($get_permalink); ?>">
                    <figure class="image-default lazy ratio32" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
                </a>
            </div>
            <div class="col-12 col-md-7">
                <div class="post-list__item--content">
                    <h3 class="post-list__title">
                        <a href="<?php echo esc_html($get_permalink); ?>"><?php echo get_the_title() ?></a>
                    </h3>
                    <div class="entry mb-2">
                        <?php megan_minimal_lightweight_blog_entry_options($post, array('class' => 'mt-2', 'entry_date' => $entry_list_date, 'entry_cat' => $entry_list_category, 'entry_author' => $entry_list_author, 'entry_read_time' => $entry_list_read_time, 'entry_comment' => $entry_list_comment, 'entry_view_count' => $entry_list_view)); ?>
                    </div>
                    <div class="post-list__sub">
                        <?php echo megan_minimal_lightweight_blog_excerpt_custom(30, get_the_ID()); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>