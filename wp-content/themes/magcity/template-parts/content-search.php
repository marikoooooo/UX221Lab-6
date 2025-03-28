<?php
/**
 * Template part for displaying results in search pages
 *
 * @package magcity
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			magcity_posted_on();
			magcity_posted_by();
			?>
		</div>< 
		<?php endif; ?>
	</header> 
    <?php magcity_post_thumbnail(); ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div> 
	<footer class="entry-footer">
		<?php magcity_entry_footer(); ?>
	</footer> 
</article><!-- #post-<?php the_ID(); ?> -->
