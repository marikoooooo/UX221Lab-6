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
    $entry_grid_three_date = get_theme_mod( 'crt_manage_entry_grid_three_date', true );
    $entry_grid_three_category = get_theme_mod( 'crt_manage_entry_grid_three_category', true );
    $entry_grid_three_author = get_theme_mod( 'crt_manage_entry_grid_three_author', false );
    $entry_grid_three_read_time = get_theme_mod( 'crt_manage_entry_grid_three_read_time', false );
    $entry_grid_three_comment = get_theme_mod( 'crt_manage_entry_grid_three_comment', false );
    $entry_grid_three_view = get_theme_mod( 'crt_manage_entry_grid_three_view', false );
    $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() );
    $get_permalink = get_permalink();
    $post = get_post();
    $post_format = get_post_format($post) ? : 'standard';
?>
<div class="col-12 col-md-6 col-lg-4 mb-4 <?php echo 'post_' . esc_attr($post_format); ?>">
    <div class="post-grid-three__item--inner border-default">
        <a href="<?php echo esc_html($get_permalink); ?>">
            <figure class="post-type-two__image lazy ratio32" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
        </a>
        <div class="post-grid-three__content">
            <?php megan_minimal_lightweight_blog_entry_options($post, array('class' => 'mb-2 justify-content-center', 'entry_date' => $entry_grid_three_date, 'entry_cat' => $entry_grid_three_category, 'entry_author' => $entry_grid_three_author, 'entry_read_time' => $entry_grid_three_read_time, 'entry_comment' => $entry_grid_three_comment, 'entry_view_count' => $entry_grid_three_view)); ?>
            <h3 class="post-grid-three__title"><a href="<?php echo esc_html($get_permalink); ?>"><?php echo get_the_title() ?></a></h3>
            <div class="post-grid-three__sub">
                <?php echo megan_minimal_lightweight_blog_excerpt_custom(30, get_the_ID()); ?>
            </div>
        </div>
    </div>
</div>
