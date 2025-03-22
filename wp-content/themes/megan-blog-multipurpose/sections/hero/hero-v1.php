<?php
    $post = get_theme_mod('crt_manage_hero_v1_center_post');
    $slider_show = get_theme_mod('crt_manage_hero_v1_slider_on_row', '1');
    $slider_full_width = get_theme_mod('crt_manage_enable_hero_v1_slider_full_width', true);
    $slider_center_mode = get_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
    $slider_post_tax = get_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', true);
?>
<?php crt_manage_section_link( 'Hero' ); ?>

<?php if(!$slider_full_width): ?>
<div class="container"><div class="row"><div class="col-12">
<?php endif; ?>
<div class="hero hero__slider-js hero__row-<?php echo esc_attr($slider_show); ?> <?php echo esc_attr(!$slider_center_mode ? 'hero__not-center':'') ?> <?php echo esc_attr($slider_full_width ? 'hero__fullwidth':'') ?>">
    <?php if($slider_post_tax): ?>
        <?php get_template_part( 'sections/hero/hero-post' ); ?>
    <?php else: ?>
        <?php get_template_part( 'sections/hero/hero-tax' ); ?>
    <?php endif; ?>
</div>
<?php if(!$slider_full_width): ?>
</div></div></div>
<?php endif; ?>