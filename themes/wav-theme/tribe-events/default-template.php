<?php
/**
 * Template Name: Events-Calendar Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 * ------>This is overriden teplate in wav/tribe-events root
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

<div id="tribe-events-pg-template" class="tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<h2 class="button">here is the button</h2>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->


<?php
get_footer();
?>







