<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megan_Minimal_Lightweight_Blog
 */
?>
<div id="header__side" class="header__side">
    <div class="header__side--inner">
        <div class="d-flex flex-column">
            <!--Start navigation mobile-->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <?php
                        if(get_theme_mod('crt_manage_header_left_show_cart') || get_theme_mod('crt_manage_header_right_show_cart'))
                            get_template_part( 'template-parts/header/header-cart' ,'', array('class' => 'left me-2', 'style' => '' )) ; ?>
                    <?php
                        if(get_theme_mod('crt_manage_header_left_show_social') || get_theme_mod('crt_manage_header_right_show_social'))
                            get_template_part( 'template-parts/header/header-social', '', array('class' => 'justify-content-start left', 'style' => '') ); ?>
                </div>
                <div>
                    <?php
                        if(get_theme_mod('crt_manage_header_left_show_search') || get_theme_mod('crt_manage_header_right_show_search'))
                            get_template_part( 'template-parts/header/header-search' , '', array('class' => 'left', 'style' => '' ) ); ?>
                </div>
            </div>
            <div class="">
                <nav class="nav__mobile" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu(
                                array(
                                    'container' => false,
                                    'theme_location' => 'primary',
                                )
                            );
                        }
                    ?>
                </nav>
            </div>

            <!--End navigation mobile-->
        </div>
    </div>
</div>