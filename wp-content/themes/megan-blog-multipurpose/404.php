<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

get_header();
?>
<main  class="site-main">
    <section class="block-default px-50  bg-grey">
        <div class="container-xl">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <div class="main__404">
                            <h1 class="main__404--title"><?php echo esc_html( '404','megan-blog-multipurpose' ); ?></h1>
                            <h3 class="main__404--sub"><?php echo esc_html( 'Page Not Found','megan-blog-multipurpose' ); ?></h3>
                            <p class="main__404--intro">
                                <?php echo esc_html( "The page requested couldn't be found. This could a spelling error in the URL or a removed page.",'megan-blog-multipurpose' ); ?>
                            </p>
                            <a class="main__404--button" href="<?php echo esc_url(home_url()) ?>"><?php echo esc_html( 'Home Page','megan-blog-multipurpose' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
