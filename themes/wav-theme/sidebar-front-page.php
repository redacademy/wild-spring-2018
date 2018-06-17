<?php
/**
 * The sidebar containing the widget area for social media feed.
 *
 * @package WAV_Starter_Theme
 */

if ( ! is_active_sidebar( 'sidebar-front-page' ) ) {
	return;
}
?>

<div id="secondary" class="widget-aa" role="complementary">
	<?php dynamic_sidebar( 'sidebar-front-page' ); ?>
</div><!-- #secondary -->