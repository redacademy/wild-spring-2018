<?php
/**
 * Event Submission Form
 * The wrapper template for the event submission form.
 *
 * Override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/community/edit-event.php
 *
 * @since    3.1
 * @version  4.5
 *
 * @var int|string $tribe_event_id
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! isset( $tribe_event_id ) ) {
	$tribe_event_id = null;
}

?>

<?php tribe_get_template_part( 'community/modules/header-links' ); ?>

<?php do_action( 'tribe_events_community_form_before_template', $tribe_event_id ); ?>

<form method="post" enctype="multipart/form-data" class="event-submission-form" data-datepicker_format="<?php echo esc_attr( tribe_get_option( 'datepickerFormat', 0 ) ); ?>">
	<input type="hidden" name="post_ID" id="post_ID" value="<?php echo absint( $tribe_event_id ); ?>"/>
	<?php wp_nonce_field( 'ecp_event_submission' ); ?>

	<?php tribe_get_template_part( 'community/modules/title' ); ?>

	<?php tribe_get_template_part( 'community/modules/description' ); ?>

	<?php tribe_get_template_part( 'community/modules/datepickers' ); ?>

	<?php tribe_get_template_part( 'community/modules/image' ); ?>

	<?php tribe_get_template_part( 'community/modules/taxonomy', null, array( 'taxonomy' => Tribe__Events__Main::TAXONOMY ) ); ?>

	<?php tribe_get_template_part( 'community/modules/taxonomy', null, array( 'taxonomy' => 'post_tag' ) ); ?>

	<?php tribe_get_template_part( 'community/modules/venue' ); ?>

	<?php tribe_get_template_part( 'community/modules/organizer' ); ?>

	<?php tribe_get_template_part( 'community/modules/website' ); ?>

	<?php tribe_get_template_part( 'community/modules/custom' ); ?>


	<?php tribe_get_template_part( 'community/modules/spam-control' ); ?>

	<?php tribe_get_template_part( 'community/modules/submit' ); ?>
</form>


<?php do_action( 'tribe_events_community_form_after_template', $tribe_event_id ); ?>
