<?php
    $enable_shortcode = get_theme_mod('crt_manage_enable_shortcode_section');
    $shortcode = get_theme_mod('crt_manage_shortcode_content');
    if(!$enable_shortcode) {
        return;
    }
?>
<section id="shortcode" class="shortcode mt-5 position-relative">
    <?php crt_manage_section_link( 'Shortcode' ); ?>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode($shortcode);?>
            </div>
        </div>
    </div>
</section>
