<?php
/**
 * Single Event Template
 * A single event. This displays the carousel, event title, description, meta the Google map for the event.
 *
 * This is an overriden template from  wav-theme/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">
	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			// echo tribe_event_featured_image( $event_id, 'full', false ); ?>
			<div class="events-container">
			<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>
			<?php echo('<p>'.tribe_get_start_date($event).'<p>');?>
			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<h3 class="single-event-title">Description</h3>
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->


			<!-- Event meta -->
			<span class="single-event-details-title"><h3>Details</h3></span>
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
		</div> <!-- #post-x -->
		</div><!--events-container-->

		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>


</div><!-- #tribe-events-content -->
