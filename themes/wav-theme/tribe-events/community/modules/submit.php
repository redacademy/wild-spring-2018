<?php
// Don't load directly
defined( 'WPINC' ) or die;

/**
 * Event Submission Form
 * The wrapper template for the event submission form.
 *
 * Override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/community/modules/submit.php
 *
 * @since    4.5
 * @version  4.5
 */
?>

<?php
$events_label_singular = tribe_get_event_label_singular();

if ( isset( $post_id ) && $post_id ) {
	$button_label = sprintf( __( 'Update %s', 'tribe-events-community' ), $events_label_singular );
} else {
	$button_label = sprintf( __( 'Submit %s', 'tribe-events-community' ), $events_label_singular );
}
$button_label = apply_filters( 'tribe_community_event_edit_button_label', $button_label );
?>

<div class="tribe-events-community-footer">
	<?php
	/**
	 * Allow developers to hook and add content to the beginning of this section
	 */
	do_action( 'tribe_events_community_section_before_submit' );
	?>

	<input
		type="submit"
		id="post"
		class="tribe-button submit events-community-submit event-submit-button"
		value="<?php echo esc_attr( $button_label ); ?>"
		name="community-event"
	/>

	<?php
	/**
	 * Allow developers to hook and add content to the end of this section
	 */
	do_action( 'tribe_events_community_section_after_submit' );
	?>
</div>


