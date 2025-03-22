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
    $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() );
    $get_permalink = get_permalink();
    $post = get_post();
    $post_format = get_post_format($post) ? : 'standard';
?>
<div class="grid__item grid__item-three mb-4 <?php echo 'post_' . esc_attr($post_format); ?>">
    <div class="post-masonry-three__item--inner border-default">
        <a href="<?php echo esc_html($get_permalink); ?>">
            <img class="post-type-two__image" src="<?php echo esc_html($get_thumbnail_url); ?>" alt="<?php echo get_the_title() ?>" />
        </a>
        <div class="post-masonry-three__content">
            <?php megan_minimal_lightweight_blog_entry_options($post, array('class' => 'mb-2 justify-content-center', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)); ?>
            <h3 class="post-masonry-three__title"><a href="<?php echo esc_html($get_permalink); ?>"><?php echo get_the_title() ?></a></h3>
            <div class="post-masonry-three__sub">
                <?php echo megan_minimal_lightweight_blog_excerpt_custom(30, get_the_ID()); ?>
            </div>
        </div>
    </div>
</div>
