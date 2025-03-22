<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package magcity
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>

<div id="page" class="site-wrapper site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'magcity' ); ?></a>
<?php 
$display_topheader = get_theme_mod('magcity_top_header_display',true);
$enable_sticky = get_theme_mod('magcity_enable_sticky_header',true);
$display_contact = get_theme_mod('magcity_top_header_contact_display',true);
$top_contact = get_theme_mod('magcity_top_header_contact','+1-202-555-0186');
$display_email = get_theme_mod('magcity_top_header_email_display',true);
$top_email = get_theme_mod('magcity_top_header_email','support@example.com');
$display_address = get_theme_mod('magcity_top_header_address_display',true);
$top_address = get_theme_mod('magcity_top_header_address','Conaway Street, Fairbanks');

$display_social_icon = get_theme_mod('magcity_top_header_social_icon_display',true);
$facebook_url = get_theme_mod('magcity_social_icon_fb_url','#');
$twitter_url = get_theme_mod('magcity_social_icon_twitter_url','#');
$linkedin_url = get_theme_mod('magcity_social_icon_linkedin_url','#');
$instagram_url = get_theme_mod('magcity_social_icon_insta_url','#');
$social_icon_target = get_theme_mod('magcity_social_icon_target_display',true);
?>
	<header  id="masthead" class="wp-main-header">
        <?php if($display_topheader) { ?>
    		<div class="wp-topbar-menu">
            	<div class="container">
                	<div class="row align-ceter">
                    	
                        <div class="col-lg-8 col-md-8">
                            <div class="topbar-left text-center-md-right text-left">
                                <div class="header-contact">
                                    <ul>
                                        <?php if($display_contact) { ?>
                                        <li>                                       
                                            <a href="tel:<?php echo esc_html($top_contact); ?>">
                                                <i class="fa fa-phone"></i>
                                                 <?php echo esc_html($top_contact); ?>
                                            </a>      
                                        </li>
                                        <?php } ?>

                                        <?php if($display_email) { ?>
                                        <li>
                                            <a href="mailto:<?php echo esc_html($top_email); ?>">
                                                <i class="fa fa-envelope"></i>
                                                <?php echo esc_html($top_email); ?>
                                            </a>                                   
                                        </li>
                                        <?php } ?>

                                        <?php if($display_address) {?>
                                        <li> 
                                            <i class="fa fa-map-marker"></i>
                                                <?php echo esc_html($top_address); ?>            
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 text-md-right">
                        <?php if($display_social_icon) { ?>
                            <div class="topbar-right">
                                <ul class="social-area">
                                    <?php if($facebook_url != "") { ?>
                                       <li><a href="<?php echo esc_url($facebook_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-facebook"></i></a></li> 
                                    <?php } ?>
                                    <?php if($twitter_url != "") { ?>
                                       <li><a href="<?php echo esc_url($twitter_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-twitter"></i></a></li>
                                    <?php } ?>
                                    <?php if($linkedin_url != "") { ?>
                                       <li><a href="<?php echo esc_url($linkedin_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-linkedin"></i></a></li>
                                    <?php } ?>
                                    <?php if($instagram_url != "") { ?>
                                       <li><a href="<?php echo esc_url($instagram_url); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-instagram"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                    <?php } ?>
                        </div>
                	</div>
            	</div>
        	</div>
        <?php } 
    
        ?>

<?php if($enable_sticky){ ?> 
    <div class="header-menu">
<?php } else { ?> 
    <div class="header-menu-non-sticky">
<?php } ?>

    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="site-menu">
                <div class="logo-wrap">
                    <div class="logo"> 

                        <?php
                        // Site Custom Logo
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                        ?> 

                        <div class="magcity-site-branding">
        
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            
                            
                            <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) :
                            ?>
                            <p class="site-description">
                                <?php echo esc_html( $description ); ?>
                            </p>
                            <?php endif; ?>
        
                         </div>  
                     </div>
                 </div>
                <nav id="site-navigation" class="main-navigation">
                            <button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                            <div class="toggle-text"></div>
                                <span class="toggle-bar"></span>
                                <span class="toggle-bar"></span>
                                <span class="toggle-bar"></span>
                            </button>
                            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                                <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'magcity' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                'theme_location' => 'top',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'nav-menu main-menu-modal',
                                
                                ) );
                                ?>
                                </div>
                            </div>
                        </nav><!-- #site-navigation -->
                        <a class="skip-link-menu-end-skip" href="javascript:void(0)"></a>
            	
            </div>
          </div>
        </div>
    </div>
</div>
</header>

    <div id="primary" class="site-content">