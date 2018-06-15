<?php
/**
 * The sidebar containing the main widget area.s
 *
 * @package WAV_Starter_Theme
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="second" class="widget-area2" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #secondary -->
