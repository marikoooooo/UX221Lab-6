<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Megan_Minimal_Lightweight_Blog
 */

if ( ! function_exists( 'megan_minimal_lightweight_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function megan_minimal_lightweight_blog_posted_on() {
		if ( get_theme_mod( 'megan_minimal_lightweight_blog_post_hide_date', false ) ) {
			return;
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date','megan-blog-multipurpose' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function megan_minimal_lightweight_blog_posted_by($post) {
        $avatar = true;
        $author = '';
        if($avatar) {
            $url = get_avatar($post->post_author);
            $author = sprintf(
                esc_html_x( '%s', '','megan-blog-multipurpose' ),'<a href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . $url . esc_html( get_the_author_meta('display_name', $post->post_author) ) . '</a>'
            );
        } else {
            $author = sprintf(
                esc_html_x( 'By %s', '','megan-blog-multipurpose' ),'<a href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . esc_html( get_the_author_meta('display_name', $post->post_author) ) . '</a>'
            );
        }
		echo '<span class="entry-author">' . $author . '</span>';
	}
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function megan_minimal_lightweight_blog_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$hide_category = get_theme_mod( 'megan_minimal_lightweight_blog_post_hide_category', false );
			$hide_tag      = get_theme_mod( 'megan_minimal_lightweight_blog_post_hide_tags', false );

			if ( ! $hide_category ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ','megan-blog-multipurpose' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( '%1$s','megan-blog-multipurpose' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( ', Edit <span class="screen-reader-text">%s</span>','megan-blog-multipurpose' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_comment_count' ) ) :
    function megan_minimal_lightweight_blog_entry_comment_count($post_id) {
        $comment_count = get_comment_count($post_id)['approved'];
        printf( esc_html__( '%1$s %2$s','megan-blog-multipurpose' ),'<i class="fa-regular fa-comment"></i>', $comment_count );
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_read_time' ) ) :
    function megan_minimal_lightweight_blog_entry_read_time($post_id) {
        $time_read = get_post_meta($post_id, 'crt_manage_post_metabox_time_read', true);
        $time_read = $time_read ? $time_read:'1';
        printf( esc_html__( '%1$s %2$s','megan-blog-multipurpose' ), '<i class="fa-regular fa-clock"></i>',$time_read );
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_view_count' ) ) :
    function megan_minimal_lightweight_blog_entry_view_count($post_id) {
        $view_count = get_post_meta($post_id, 'post_view_count', true);
        $view_count = $view_count ? $view_count:'1';
        if(!empty($view_count)) {
            printf( esc_html__( '%1$s %2$s ','megan-blog-multipurpose' ), '<i class="fa-regular fa-eye"></i>', $view_count );
        }
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_date' ) ) :
    function megan_minimal_lightweight_blog_entry_date($post) {
        $entry_date_format = get_theme_mod('crt_manage_entry_date_format', 'F d, Y');
        $date = date($entry_date_format, strtotime($post->post_date));
        printf( esc_html__( '%1$s %2$s ','megan-blog-multipurpose' ), '<i class="fa-regular fa-calendar"></i>', $date );
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_single_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function megan_minimal_lightweight_blog_entry_single_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            $hide_category = get_theme_mod( 'megan_minimal_lightweight_blog_post_hide_category', false );
            $hide_tag      = get_theme_mod( 'megan_minimal_lightweight_blog_post_hide_tags', false );

            if ( ! $hide_category ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ','megan-blog-multipurpose' ) );
                if ( $categories_list ) {
                    /* translators: 1: list of categories. */
                    printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s','megan-blog-multipurpose' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }

            if ( ! $hide_tag ) {
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator','megan-blog-multipurpose' ) );
                if ( $tags_list ) {
                    /* translators: 1: list of tags. */
                    printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s','megan-blog-multipurpose' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
        }

        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>','megan-blog-multipurpose' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry_category' ) ) :
    function megan_minimal_lightweight_blog_entry_category($post_id) {
        $categories_list = get_the_category_list( esc_html__( ', ','megan-blog-multipurpose' ), 'multiple', $post_id );
        if ( $categories_list ) {
            printf( esc_html__( '%1$s','megan-blog-multipurpose' ), $categories_list );
        }
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_entry' ) ) :
    /**
     * Prints HTML with meta information for the categories
     */
	function megan_minimal_lightweight_blog_entry_options( $post, $args = array('class' => 'mt-2', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => true, 'entry_read_time' => true, 'entry_comment' => true, 'entry_view_count' => true, 'entry_date_order' => 1, 'entry_cat_order' => 2, 'entry_author_order' => 3, 'entry_read_time_order' => 4, 'entry_comment_order' => 5, 'entry_view_count_order' => 6)) {
        $post_id = $post->ID;
        ?>
        <div class="entry <?php echo esc_attr($args['class']); ?>">
            <?php if(isset($args['entry_date']) && $args['entry_date']): ?>
                <span class="entry__date <?php echo isset($args['entry_date_order']) ? 'order-'. $args['entry_date_order']:''; ?>"><?php megan_minimal_lightweight_blog_entry_date($post); ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_cat']) && $args['entry_cat']): ?>
                <span class="entry__category <?php echo isset($args['entry_cat_order']) ? 'order-'. $args['entry_cat_order']:''; ?>"><?php megan_minimal_lightweight_blog_entry_category($post_id) ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_author']) && $args['entry_author']): ?>
                <span class="entry__author <?php echo isset($args['entry_author_order']) ? 'order-'. $args['entry_author_order']:''; ?>"><?php megan_minimal_lightweight_blog_posted_by($post) ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_read_time']) && $args['entry_read_time']): ?>
                <span class="entry__read-time <?php echo isset($args['entry_read_time_order']) ? 'order-'. $args['entry_read_time_order']:''; ?>"><?php megan_minimal_lightweight_blog_entry_read_time($post_id) ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_comment']) && $args['entry_comment']): ?>
                <span class="entry__comment <?php echo isset($args['entry_comment_order']) ? 'order-'. $args['entry_comment_order']:''; ?>"><?php megan_minimal_lightweight_blog_entry_comment_count($post_id) ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_view_count']) && $args['entry_view_count']): ?>
                <span class="entry__view-count <?php echo isset($args['entry_view_count_order']) ? 'order-'. $args['entry_view_count_order']:''; ?>"><?php megan_minimal_lightweight_blog_entry_view_count($post_id) ?></span>
            <?php endif; ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function megan_minimal_lightweight_blog_post_thumbnail($thumb = '') {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if(is_page()):
            $thumbnail = get_theme_mod('crt_manage_page_thumbnail', 'outer-thumb');
            $thumbnail_size = get_theme_mod('crt_manage_page_thumbnail_size', 'ratio169');
        ?>
            <div class="post-thumbnail mb-4 post-thumbnail_<?php echo esc_attr($thumbnail); ?>">
                <?php $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() ); ?>
                <figure class="ratio lazy <?php echo esc_attr($thumbnail_size); ?>" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
            </div><!-- .post-thumbnail -->
        <?php
		elseif ( is_singular() ) :
            $thumbnail = get_theme_mod('crt_manage_single_thumbnail', 'outer-thumb');
            $thumbnail_size = get_theme_mod('crt_manage_single_thumbnail_size', 'ratio169');
            ?>
			<div class="post-thumbnail mb-4 post-thumbnail_<?php echo esc_attr($thumbnail); ?>">
                <?php $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() ); ?>
                <figure class="ratio lazy <?php echo esc_attr($thumbnail_size); ?>" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
			</div><!-- .post-thumbnail -->
			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_post_thumb' ) ) :
    function megan_minimal_lightweight_blog_post_thumb($class = 'ratio32', $size = 'megan-minimal-lightweight-blog-image-medium') {
        $post = get_post();
        $post_id = $post->ID;
        $post_format = get_post_format($post) ? : 'standard';
        $get_thumbnail_url = get_the_post_thumbnail_url( $post_id, $size );
        $galleries = get_post_meta($post_id, 'crt_manage_post_metabox_gallery');
        if(!empty($galleries)) {
            $galleries = array_merge($galleries[0], array($get_thumbnail_url));
        }
    ?>
            <?php if($post_format == 'gallery' && !empty($galleries)): ?>
                <div class="gallery-image">
                    <?php foreach ($galleries as $image): ?>
                        <div>
                            <figure class="<?php echo esc_attr($class) ?>" style="background-image: url(<?php echo esc_html($image); ?>)"></figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: if($get_thumbnail_url): ?>
                <figure class="<?php echo esc_attr($class) ?>" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
            <?php endif; endif; ?>
        <?php
    }
endif;


if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'megan_minimal_lightweight_blog_heading' ) ) :
    /**
     * Prints HTML with heading information for the section
     */
    function megan_minimal_lightweight_blog_heading( $section_title, $section_sub_title) {
        $heading_style = get_theme_mod('crt_manage_heading_style', 'center');
        $heading_line_position = get_theme_mod('crt_manage_heading_line_position', 'bottom');
        $heading_sub_enable = get_theme_mod('crt_manage_heading_sub_enable', true);
        ?>
        <div class="heading-default heading-default__<?php echo esc_attr($heading_style); ?> heading-default__line--<?php echo esc_attr($heading_line_position); ?>">
            <div class="heading-default__inner">
                <h2 class="heading-default__title"><?php echo esc_html($section_title); ?></h2>
                <?php if($heading_sub_enable): ?>
                    <span class="heading-default__sub"><?php echo esc_html($section_sub_title); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
endif;
