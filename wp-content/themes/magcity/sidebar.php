<?php
/**
 * The sidebar containing the main widget area
 *
 * @package magcity
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside> 
