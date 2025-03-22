
<?php
    $show_search = get_theme_mod('crt_manage_header_left_show_search');
    $show_search_m = get_theme_mod('crt_manage_header_left_show_search_m');
    $class_m = $show_search_m ? 'd-block':'d-none d-md-block';
    if($show_search)
        get_template_part( 'template-parts/header/header-search' , '', array('class' => 'left ' . $class_m, 'style' => '' ) ); ?>
<?php
    $show_nav_button = get_theme_mod('crt_manage_header_left_show_nav_button');
    $show_nav_button_m = get_theme_mod('crt_manage_header_left_show_nav_button_m');
    $class_m = $show_nav_button_m ? 'd-block':'d-none d-md-block';
    if($show_nav_button)
        get_template_part( 'template-parts/header/header-button-nav' ,'', array('class' => 'left ' . $class_m, 'style' => '' ) ); ?>

<?php
    $show_cart = get_theme_mod('crt_manage_header_left_show_cart');
    $show_cart_m = get_theme_mod('crt_manage_header_left_show_cart_m');
    $class_m = $show_cart_m ? 'd-block':'d-none d-md-block';
    if($show_cart)
        get_template_part( 'template-parts/header/header-cart' ,'', array('class' => 'left ' . $class_m, 'style' => '' )) ;
?>
<?php
    $show_social = get_theme_mod('crt_manage_header_left_show_social');
    $show_social_m = get_theme_mod('crt_manage_header_left_show_social_m');
    $class_m = $show_social_m ? 'd-block':'d-none d-md-block';
    if($show_social)
        get_template_part( 'template-parts/header/header-social', '', array('class' => 'justify-content-start left ' . $class_m, 'style' => '') ); ?>
