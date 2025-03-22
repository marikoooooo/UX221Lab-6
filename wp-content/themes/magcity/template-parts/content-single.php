<?php 
$show_categories = get_theme_mod('magcity_single_co_post_categories',true); 
$show_author = get_theme_mod('magcity_single_co_post_author',true); 
$show_date = get_theme_mod('magcity_single_co_post_date',true); 
$show_comment = get_theme_mod('magcity_single_co_post_comments',true); 
$show_tags = get_theme_mod('magcity_single_co_post_tags',true); 
$show_image = get_theme_mod('magcity_single_co_featured_image_post',true); 
?>

 <div class="blog-wrap">
    <div class="image-part mb-25">
         <?php
        if($show_image && has_post_thumbnail()){
            the_post_thumbnail(); 
        } ?>
    </div>
    <div class="content-part p-0">
        <?php if($show_categories) { ?> <div class="category-name"> <?php the_category(' '); ?></div> <?php } ?>
        <h3 class="heading-title mb-20"><?php the_title(); ?></h3>
        <ul class="blog-meta mb-20">
            <?php if($show_author) { ?><li><i class="fa fa-user"></i><?php magcity_posted_by(); ?></li><?php } ?>
            <?php if($show_comment) { ?><li><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number());  ?></li><?php } ?>
            <?php if($show_date) { ?><li><i class="fa fa-clock-o"></i><?php esc_html(magcity_posted_on()); ?></li><?php } ?>
        </ul>                                
        <?php the_content();wp_link_pages(); ?>

        
        <?php if(has_tag() && $show_tags) { ?>
            <div class="post-tags">
                <a href="#"><?php the_tags(null, ' ', '<br />'); ?></a>
            </div>
        <?php } ?>
     
        <?php 

        if (get_previous_post_link()) { 
            $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
        }
        if (get_next_post_link()) { 
             $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
        } ?>

        <div class="post-navigation mt-4">
        <?php if (get_previous_post_link()) { ?>
            <a href="<?php echo esc_url($previous_post_url); ?>" class="blog-prev">
                <i class="fa fa-angle-double-left"></i> <?php _e('Previous Post', 'magcity'); ?>
             </a>
        <?php } ?> 
        <?php if(get_next_post_link()) { ?>
            <a href="<?php echo esc_url($next_post_url); ?>" class="blog-next">
                <?php _e('Next Post', 'magcity'); ?>
                <i class="fa fa-angle-double-right"></i> 
            </a>
        <?php } ?>
    </div>
    </div>
</div>