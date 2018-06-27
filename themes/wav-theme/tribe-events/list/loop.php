<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * This is overriden file for events loop on calendar list view from wav/tribe-events/list/loop.php
 * challenges: add events with the same date and display them in under one header. Change the plugin default date format, change the plugin default single event html structure inside loop.
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<div class="tribe-events-loop">
	<?php
	function wrapGroup($groupDate, $body, $numEvents)
	{
		$eventsText = $numEvents.' event';
		if ($numEvents > 1) $eventsText .= 's';
		echo('<h2 class="tribe-events-list-separator-month"><span>'.$groupDate.'</span><span class="number-of-events-day"> ('.$eventsText.')</span></h2>');
		echo('<div class="same-date-events-container carousel-front-page" data-flickity=\'{ "watchCSS": true, "groupCells": false }\'> ');
		echo($body);
		echo('</div>');
	}

	$lastDate = '';
	$numEvents = 0;
	$groupBody = '';

	while ( have_posts() )
	{
		the_post();
		/// Get the day header ///
		$date = DateTime::createFromFormat("Y-m-d H:i:s", $post->EventStartDate);
		$currentDate = $date->format("M d, Y");
		if ($currentDate != $lastDate)
		{
			if ($groupBody != '') {
				wrapGroup($lastDate, $groupBody, $numEvents);
				$numEvents = 0;
				$groupBody = '';
			}
			$lastDate = $currentDate;
		}
		$numEvents += 1;
		/// Get event body ///
		do_action( 'tribe_events_inside_before_loop' );
		//$groupBody .= ob_get_contents();
		//tribe_events_list_the_date_headers();

		/// Event ///
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		//to avoid printing by functions: http://us.php.net/manual/en/function.ob-clean.php
		ob_start();
		$groupBody .= '<div class="event-item carousel-front-page-cell">';
		$groupBody .= '<div id="post-'.$post->ID.'" class="';
		tribe_events_event_classes();
		$groupBody .= ob_get_contents();
		ob_clean();
		$groupBody .='" '.$post_parent.'>';
		$event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';
		$event_type = apply_filters( 'tribe_events_list_view_event_type', $event_type );
		$groupBody .= ob_get_contents();
		ob_clean();
		tribe_get_template_part( 'list/single', $event_type );
		$groupBody .= ob_get_contents();
		$groupBody .= '</div>';
		$groupBody .= '</div>';
		ob_end_clean();
		do_action( 'tribe_events_inside_after_loop' );
		//$groupBody .= ob_get_contents();
	}
	if ($groupBody != '')
		wrapGroup($lastDate, $groupBody, $numEvents);
	?>

</div><!-- .tribe-events-loop -->

<a class="events-calendar-create-event-button" href="<?php echo get_permalink( get_page_by_title( 'Postid-289' ))?>">Create Event </a>
