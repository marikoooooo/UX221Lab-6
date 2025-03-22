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
$header_socials = json_to_array(get_theme_mod('crt_manage_header_social'));
$header_social_style = get_theme_mod('crt_manage_header_social_style');
if(!empty($args['style'])) {
    $header_social_style = $args['style'];
}
if(!empty($header_socials)) : ?>
<div class="head__social <?php echo esc_attr($header_social_style); ?> <?php echo esc_attr($args['class']); ?>">
    <ul class="head__social--list p-0 m-0 <?php echo esc_attr('head__social--' . $header_social_style); ?>">
        <?php foreach ( $header_socials as $item ): ?>
            <li class="">
                <?php
                    $css_attrs = '';
                    if($header_social_style == 'bg-color') {
                        $css_attrs = 'background-color: '.$item['color'].';border-radius: 50%;';
                    } elseif ($header_social_style == 'color') {
                        $css_attrs = 'color: '.$item['color'].';border-radius: 50%;';
                    } elseif ($header_social_style == 'none-border-solid') {
                        $css_attrs = 'color: #000;';
                    } elseif ($header_social_style == 'border-line-solid') {
                        $css_attrs = 'border: 1px solid #000;color: #000;border-radius: 50%;';
                    }
                ?>
                <a style="<?php echo esc_attr($css_attrs); ?>" class="" href="<?php echo esc_attr($item['link']) ?>" target="_blank" rel="alternate" title="<?php echo esc_attr($item['icon_value']) ?>">
                    <i class="<?php echo esc_attr($item['icon_value']) ?>"></i>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
