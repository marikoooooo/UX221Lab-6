<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package magcity
 */

?>
</div><!-- #content -->

<?php 
$show_copyright = get_theme_mod('magcity_footer_copyright_display',true);
$magcity_copyright = get_theme_mod('magcity_copyright','Powered by WordPress'); 
$enable_scroll = get_theme_mod('magcity_enable_scroll_top',true);
?>
<footer class="footer-section">
        <?php if ( is_active_sidebar( 'footer-widgets' ) ) { ?>
            <div class="container">
                <div class="footer-top">
                    <div class="row clearfix">
                        <?php dynamic_sidebar('footer-widgets'); ?>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if($show_copyright) { ?>
            <div class="copyright-footer">
                <div class="container">
                    <div class="row justify-content-center">

                        <p class="footer-copyright">&copy;
                            <?php
                            echo date_i18n(
                                /* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
                                _x( 'Y', 'copyright date format', 'magcity' )
                            );
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                        </p><!-- .footer-copyright -->

                        <p class="copyright-text">
                            <?php if($magcity_copyright=="") { ?>
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'magcity' ) ); ?>">
                                <?php esc_html_e( 'Powered by WordPress', 'magcity' ); ?>
                            </a>
                            <?php } 
                            else { ?>
                                <?php echo esc_html($magcity_copyright); ?>
                            <?php } ?>   
                        </p><!-- .copyright-text -->

                    </div>
                </div>
            </div><!-- .footer-credits -->
        <?php } ?>
    </footer>

    </div><!-- #page -->

    <?php if($enable_scroll) { ?>
    <button onclick="magcityTopFunction()" id="goToTopBtn" title="Go to top">
        <i class="fa fa-angle-up"></i>
    </button> 
    <?php } ?>
	
<?php  wp_footer(); ?>

</body>
</html>