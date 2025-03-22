<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

?>
<!-- start footer -->
<footer class="footer mt-5" itemscope="" itemtype="https://schema.org/WPFooter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer__inner">
                    <div class="row">
                        <?php
                            $widget_active = mmlb_footer_is_widget();
                            $col = !empty($widget_active) ? 12/count($widget_active):12;
                        ?>
                        <?php if(!empty($widget_active)): ?>
                            <?php foreach($widget_active as $v): ?>
                                <div class="col-12 col-md-6 col-lg-<?php echo esc_attr($col); ?> mb-3">
                                    <?php dynamic_sidebar( 'footer-' . $v ); ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                if(is_active_sidebar( 'footer-above' )) {
                                    dynamic_sidebar( 'footer-above' );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

<?php wp_footer(); ?>

</body>
</html>
