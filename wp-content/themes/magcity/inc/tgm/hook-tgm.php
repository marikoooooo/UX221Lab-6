<?php
/**
 * Recommended plugins
 *
 * @package magcity
 */

if ( ! function_exists( 'blog_town_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function blog_town_recommended_plugins() {

        $plugins = array(              
          
            array(
                'name'     => esc_html__( 'Responsive Accordion Slider', 'magcity' ),
                'slug'     => 'responsive-accordion-slider',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Easy Pricing Table WP', 'magcity' ),
                'slug'     => 'easy-pricing-table-wp',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Team Builder Showcase', 'magcity' ),
                'slug'     => 'team-buider-showcase',
                'required' => false,
            )
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'blog_town_recommended_plugins' );