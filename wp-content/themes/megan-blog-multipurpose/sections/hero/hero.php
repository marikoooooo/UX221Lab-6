<?php
    $enable_hero = get_theme_mod('crt_manage_enable_hero_v1_section');
    if(!$enable_hero) {
        return;
    }
    $hero_type = get_theme_mod('crt_manage_hero_v1_type', 'v1');
    $left_post = get_theme_mod('crt_manage_hero_v1_left_post');
    $center_post = get_theme_mod('crt_manage_hero_v1_center_post');
    $right_post = get_theme_mod('crt_manage_hero_v1_right_post');
?>
<section id="hero-v1" class="mt-4 <?php echo 'hero_' . esc_attr($hero_type); ?> position-relative">
    <?php get_template_part( 'sections/hero/hero-'. $hero_type ); ?>
</section>


