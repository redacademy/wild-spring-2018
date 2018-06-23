<?php
/**
 * The sidebar containing the widget area for custom links in secondary navigation on about us page.
 *
 * @package WAV_Starter_Theme
 */

if ( ! is_active_sidebar( 'sidebar-about-nav' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-about-nav' ); ?>
</div><!-- #secondary -->