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

get_header(); ?>

<?php

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

	<?php $loop = CFS()->get( 'events_loop' );

					if ( !empty($loop[0]['event_image'])) :?>
						<section class="carousel-container">
						<div class="double-carousel carousel-main">
					<?php foreach ( $loop as $row ) {?>
						<div class="carousel-cell">
							<img src="<?php echo $row['event_image']; ?>">
						</div>
					<?php } ?>
				</div>

				<div class="carousel-nav">
					<?php $loop = CFS()->get( 'events_loop' );
						foreach ( $loop as $row ) {?>
							<div class="carousel-cell">
								<img src="<?php echo $row['event_image']; ?>">
							</div>
					<?php } ?>
				</div>
				<?php

				elseif(empty($loop[0]['event_image']) && has_post_thumbnail()):
				echo ('<div class="event-featured-image">'. the_post_thumbnail( 'large' ).'</div');
				else:
					// echo '<h1>hello</h1>';
					echo ('<div class="event-placeholder-image"><img src="./../../wp-content/themes/wav-theme/assets/images/WAV_placeholder_img.png"/>
					</div>');
				endif; ?>
			</section>

<?php 
	//$event = get_post($event_id);
	echo('<div class="events-container">');
		// echo('<h1 class="tribe-events-single-event-title">'.the_title().'</h1>');
		?>
		<div class="event-main-title-details">
		<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' );
		echo('<p>'.tribe_get_start_date($event_id).'</p>');?>
		</div>
		<?php echo('<div class="event-info-container">');
			echo('<div class="tribe-events-single-event-description tribe-events-content">');
				echo('<h3 class="single-event-title">Description</h3>');
				the_content();
				echo('<h3 class="single-event-details">Details</h3>');
				echo('<h4 class="date-title">Date and time</h4>');
				echo('<p class="date-details">'.tribe_get_start_date($event_id).'</p>');
				if (tribe_has_organizer()) {
					echo('<h4 class="organizer-title">Organizer</h4>');
					echo('<p class="organizer-details">'.tribe_get_organizer($event_id).'</p>');
				}
				$venue = tribe_get_venue_details($event_id);
				if (array_key_exists('address', $venue))
				{
					$address = $venue['address'];
					echo('<h4 class="address-title">Location</h4>');
					echo('<p class="address-details">'.$address.'</p>');
					// echo('<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q='.urlencode($address).'&key=AIzaSyBLLT_lEBaqsLZ5W8a4lq0FI8FK2Nfr2QI" allowfullscreen></iframe>');
					//tribe_get_template_part( 'modules/meta' );
					// echo('div class="google-map">'.tribe_get_template_part( 'modules/meta/map').'</div>');
					tribe_get_template_part( 'modules/meta/map');
				}
				//echo('<h4>Tags</h4>');
				echo(tribe_meta_event_tags('','',false));
			echo('</div>');
		echo('</div>');
	echo('</div>');
			?>
<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>


</div><!-- #tribe-events-content -->
