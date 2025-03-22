<?php
    $tax = get_theme_mod('crt_manage_hero_v1_center_tax');
    $ratio = get_theme_mod('crt_manage_hero_v1_thumbnail_size', 'ratio32');
?>
<?php if(!empty($tax)): ?>
    <?php foreach ( $tax as $tax_id ) :
        $term = get_term($tax_id);
        $count = $term->count;
        $name = $term->name;
        $term_link = get_term_link($term);
        $thumbnail_url = get_term_meta($tax_id, 'crt_manage_tax_image', true);
    ?>
        <div class="hero-tax__item">
            <div class="hero-tax__item--inner">
                <a href="<?php echo esc_attr($term_link); ?>">
                    <figure class="<?php echo esc_attr($ratio); ?>" style="background-image: url(<?php echo esc_attr($thumbnail_url); ?>)">
                        <div class="hero-tax__content">
                            <h2 class="hero-tax__name"><?php echo esc_html($name); ?></h2>
                            <span class="hero-tax__count"><?php echo esc_html($count) . ' - Articles'; ?></span>
                        </div>
                    </figure>
                </a>
            </div>
        </div>
    <?php endforeach;  ?>
<?php endif; ?>
