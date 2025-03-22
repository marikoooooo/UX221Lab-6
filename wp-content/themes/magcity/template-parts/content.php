<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package magcity
 */
?>
<?php 
$show_cat = get_theme_mod('magcity_blog_page_catgories',true); 
$show_date = get_theme_mod('magcity_archive_co_post_date',true); 
$show_author = get_theme_mod('magcity_archive_co_post_author',true);  
$show_content = get_theme_mod('magcity_blog_content',true);  
?>

<div class="blog-box">
    <div class="d-flex flex-wrap">
        <div class="posts-thumb align-self-stretch">

        <?php 
        if(has_post_thumbnail()){
           
            magcity_post_thumbnail(); 
        
        }else {
        ?>  
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/default.jpg">
        <?php } ?>
        </div>
        <div class="posts-content">
            <?php if($show_cat) magcity_all_categories(); ?>
            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="posts-meta">
                <span class="posts-author"> <?php if($show_author) { ?><i class="fa fa-user"></i><?php magcity_posted_by(); ?><?php } ?> </span> 
                <span class="posts-date"> <?php if($show_date) { ?><i class="fa fa-clock-o"></i><?php magcity_posted_on(); ?><?php } ?> </span>
            </div>
            <?php if($show_content) the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="read-more-btn"><span><?php echo esc_html(get_theme_mod('magcity_read_more_label', 'Read More')); ?></span> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>
</div>