<?php
    $post_url = get_permalink();
?>

<div class="single-share d-flex flex-column justify-content-center align-content-center">
    <div class="single-share__icon d-flex justify-content-center align-content-center mb-4">
        <label>Share Article:</label>
        <ul>
            <li>
                <a class="facebook button circle" rel="nofollow noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($post_url) ?>" target="_blank"><i class="fa-brands fa-facebook-f fa-fw"></i></a>
            </li>
            <li>
                <a class="twitter button circle" rel="nofollow noopener" href="http://twitter.com/share?text=Far+far+away%2C+behind+the+word+mountains&amp;url=<?php echo esc_attr($post_url) ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            </li>
            <li>
                <a class="email button circle" rel="nofollow noopener" href="mailto:?subject=Far+far+away%2C+behind+the+word+mountains&amp;body=<?php echo esc_attr($post_url) ?>" target="_blank"><i class="fa fa-envelope"></i></a>
            </li>
            <li>
                <a class="whatsapp button circle" rel="nofollow noopener" href="https://api.whatsapp.com/send?text=<?php echo esc_attr($post_url) ?>" data-action="share/whatsapp/share" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
            </li>
            <li>
                <a class="single-share__btn-js" rel="nofollow noopener" target="_blank"><i class="fa-solid fa-link"></i></a>
            </li>
        </ul>
    </div>
    <input id="single-share-url" class="single-share__url" value="<?php echo esc_html($post_url); ?>" />
</div>
