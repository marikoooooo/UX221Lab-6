<?php
?>

<div class="head__logo">
    <?php if ( has_custom_logo() ) : ?>
        <div class="site-logo">
            <?php $logo = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php echo ( is_front_page() || is_home() ) ? '<h1 class="head__sologan">':'<h2 class="head__sologan">'; ?>
                <img class="dark" src="<?php echo esc_attr($logo); ?>" alt="<?php bloginfo( 'name' ); ?>">
                <?php echo ( is_front_page() || is_home() ) ? '</h1>':'</h2>'; ?>
            </a>
        </div>
    <?php else : ?>
        <div class="site-identity">
            <?php if ( is_front_page() || is_home() ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="head__sologan"><strong><?php bloginfo( 'name' ); ?></strong><?php if(get_bloginfo( 'description' )) { echo '<span>'; bloginfo( 'description' ); echo '</span>';} ?></h1></a>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h2 class="head__sologan"><strong><?php bloginfo( 'name' ); ?></strong><?php if(get_bloginfo( 'description' )) { echo '<span>'; bloginfo( 'description' ); echo '</span>';} ?></h2></a>
            <?php endif;  ?>
        </div>
    <?php endif; ?>
</div>
