<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * This is overriden file for events loop on calendar list view from wav/tribe-events/list/loop.php
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
	$lastDate = '';
	while ( have_posts() ) : the_post();
		do_action( 'tribe_events_inside_before_loop' );

		/// Get the day header ///
		$date = DateTime::createFromFormat("Y-m-d H:i:s", $post->EventStartDate);
		$currentDate = $date->format("M d, Y");
		if ($currentDate != $lastDate)
		{
			if ($lastDate != '') echo('</div>');
			echo('<h2 class="tribe-events-list-separator-month"><span>'.$date->format("M d, Y").'</span></h2>');
			echo('<div class="same-date-events-container">');
			$lastDate = $currentDate;
		}
		//tribe_events_list_the_date_headers();

		/// Event  ///
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>
		<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>" <?php echo $post_parent; ?>>
			<?php
			$event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';

			/**
			 * Filters the event type used when selecting a template to render
			 *
			 * @param $event_type
			 */
			$event_type = apply_filters( 'tribe_events_list_view_event_type', $event_type );

			tribe_get_template_part( 'list/single', $event_type );
			?>
		</div>


		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile;
	if ($lastDate != '') echo('</div>');
	?>

</div><!-- .tribe-events-loop -->
