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

<div class="faq-event-submission">
[faq title="Who Can Submit an Event/Lesson?"]Vancouver community-based organizations that offer outdoor education experiences are invited to “showcase” what they are currently doing by contributing an event to the festival. Potential hosts may be, but not limited to, non-profits, for-profits, and in/formal educational organizations (including those who may not see themselves as being just outdoor-based). Teachers are also invited to submit a lesson to WAV, showcasing the teacher they are doing outdoors.[/faq]

[faq title="Who Will Attend the event/lesson?"]The weekday events will focus on schools, teachers, community-based organizations, and students, while the weekend events will be directed towards families and community-members at large. Most school lessons are closed events, and not open to the general public. Events may be open or have a registration. Check each event/lesson for details.[/faq]

[faq title="Looking for Event/Lesson Ideas?"]Take a look at the great events our 2015 Event Hosts and 2016 Events Hosts offered.[/faq]

[faq title="Event/Lesson Role"]Event hosts will determine the “event” they wish to contribute to the festival (stand-up paddle boarding, gardening, cycling, art, music, etc). All aspects of the event are organized by each event host including: the date and time of the event, equipment, safety, supervision, insurance, and registration of participants. In addition:

The event will be located in Vancouver
There will be no fee for participants
There will be an educational component that invites participants to take something away that they can enact elsewhere (school, home, community-centre, etc.) and share their experience with others
Lessons will be offered by teachers/educators. They will be closed events that only the teacher and students participate in. Different classes many join up for a lesson, or even different schools and grade levels may collaborate for an outdoor lesson. Outdoor lessons are a chance to share what you are currently doing outdoors with other teachers/educators.[/faq]

[faq title="Our Part"]Wild About Vancouver will offer advertising and promotion of your event in addition to an event schedule and map of the festival to assist participants in choosing events to attend. WAV will also hold a preparation workshop for event providers in the weeks leading up to the festival. After the event, WAV will help collect data from the event so we can all learn from the experience.
For lessons, WAV will share your outdoor teaching with other teachers/educators to help inspire them to take their teaching outdoors and offer some ideas about the range of learning that can happen outdoors.[/faq]

[faq title="I Need Help Planning My Event/Lesson"]Check out this helpful Wild About Vancouver Event Host Guide.[/faq]

[faq title="I Need Funding for My Event/Lesson"]Groups and/or individuals wishing to offer an event in the WAV Festival may apply for funding to help with costs associated with their event. There is no guarantee that WAV will be able to find a sponsor, but we will try!

Looking for funding for your event? Check out Go Grants or the City of Vancouver’s Greenest City Neighbourhood Small Grants.[/faq]

</div>

<?php do_action( 'tribe_events_community_form_after_template', $tribe_event_id ); ?>
