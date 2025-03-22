<?php

if(isset($_GET['home'])) {
    set_theme_mod('crt_manage_hero_v1_thumbnail_size', 'ratio32');
    if($_GET['home'] == 'classic') {
        set_theme_mod('crt_manage_enable_hero_v1_section', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_full_width', false);
        set_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', false);
        set_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', true);
        set_theme_mod('crt_manage_hero_v1_slider_on_row', '3');
        set_theme_mod( 'crt_manage_post_latest_layout', 'large-image' );
        set_theme_mod( 'crt_manage_post_latest_sidebar', 'no-sidebar' );
    }
    if($_GET['home'] == 'tax') {
        set_theme_mod('crt_manage_enable_hero_v1_section', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_full_width', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', false);
        set_theme_mod('crt_manage_hero_v1_slider_on_row', '3');
        set_theme_mod( 'crt_manage_post_latest_layout', '' );
        set_theme_mod( 'crt_manage_post_latest_sidebar', 'right-sidebar' );
    }
    if($_GET['home'] == 'post') {
        set_theme_mod('crt_manage_enable_hero_v1_section', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_full_width', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', true);
        set_theme_mod('crt_manage_hero_v1_slider_on_row', '3');
        set_theme_mod( 'crt_manage_post_latest_layout', '' );
        set_theme_mod( 'crt_manage_post_latest_sidebar', 'right-sidebar' );
    }
    if($_GET['home'] == 'post-large') {
        set_theme_mod('crt_manage_enable_hero_v1_section', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_full_width', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', true);
        set_theme_mod('crt_manage_hero_v1_slider_on_row', '1');
        set_theme_mod('crt_manage_hero_v1_thumbnail_size', 'ratio169');
        set_theme_mod( 'crt_manage_post_latest_layout', '' );
        set_theme_mod( 'crt_manage_post_latest_sidebar', 'right-sidebar' );
    }
    if($_GET['home'] == 'grid') {
        set_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_full_width', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
        set_theme_mod('crt_manage_hero_v1_slider_on_row', '3');
        set_theme_mod( 'crt_manage_post_latest_layout', 'grid3' );
        set_theme_mod( 'crt_manage_latest_post_per_page', '9' );
        set_theme_mod( 'crt_manage_post_latest_sidebar', 'no-sidebar' );
    }
    if($_GET['home'] == 'masonry') {
        set_theme_mod('crt_manage_enable_hero_v1_slider_post_tax', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_full_width', true);
        set_theme_mod('crt_manage_enable_hero_v1_slider_center_mode', true);
        set_theme_mod('crt_manage_hero_v1_slider_on_row', '3');
        set_theme_mod( 'crt_manage_post_latest_layout', 'masonry3' );
        set_theme_mod( 'crt_manage_post_latest_sidebar', 'no-sidebar' );
    }
    for($i = 1; $i < 11; $i++) {
        if($_GET['home'] == 'color' . $i) {
            set_theme_mod( 'crt_manage_bg_color', 'color' . $i );
        }
    }
}
?>

