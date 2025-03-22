<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megan_Minimal_Lightweight_Blog
 */
?>
<?php

?>
<header class="head head--v1">
    <div class="head__inner">
        <div class="head__row">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2 d-flex justify-content-start align-items-center head--v1__left">
                        <?php get_template_part( 'template-parts/header/header-left' ); ?>
                    </div>
                    <div class="col-8">
                        <?php get_template_part( 'template-parts/header/header-logo' ); ?>
                        <div class="head__nav">
                            <?php get_template_part( 'template-parts/header/header-nav' ); ?>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end align-items-center head--v1__right">
                        <?php get_template_part( 'template-parts/header/header-right' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/header/header-side' ); ?>
    <?php get_template_part( 'template-parts/header/header-form-search' ); ?>
</header>
