<?php
    $post = get_theme_mod('crt_manage_hero_v1_center_post');
    $ratio = get_theme_mod('crt_manage_hero_v1_thumbnail_size', 'ratio169');
?>
<?php if(!empty($post)): ?>
    <?php foreach ( $post as $post_id ) :
        $post = get_post( $post_id );
        $get_permalink = get_permalink( $post );
        $get_thumbnail_url = get_the_post_thumbnail_url( $post, 'megan-minimal-lightweight-blog-image-large');
        ?>
        <div class="hero__item">
            <div class="hero__item--inner">
                <a href="<?php echo esc_attr($get_permalink); ?>">
                    <figure class="<?php echo esc_attr($ratio); ?>" style="background-image: url(<?php echo esc_attr($get_thumbnail_url); ?>)"></figure>
                </a>
                <div class="hero__content">
                    <div class="hero__entry mb-2">
                        <?php megan_minimal_lightweight_blog_entry_date($post); ?>
                    </div>
                    <h3 class="hero__title mb-3"><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h3>
                    <div class="entry__author">
                        <?php megan_minimal_lightweight_blog_entry_options($post, array('class' => 'mt-0', 'entry_date' => false, 'entry_cat' => true, 'entry_author' => true, 'entry_read_time' => false, 'entry_comment' => false, 'entry_view_count' => false, 'entry_date_order' => 1, 'entry_cat_order' => 2, 'entry_author_order' => 3, 'entry_read_time_order' => 4, 'entry_comment_order' => 5, 'entry_view_count_order' => 6)); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;  ?>
<?php endif; ?>
