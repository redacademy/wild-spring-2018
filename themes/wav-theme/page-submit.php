<?php
/**
 * The template for displaying the Submit a event page.
 * Template Name: Submit an Event Page
 * Adapted for WAV
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

         <section class="event-submission">
            <header class="entry-header">
                <?php echo CFS()->get( 'create_event_hero_image' ); ?>
         		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
         	</header><!-- .entry-header -->

            <?php if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) : ?>

               <div class="event-submission-wrapper">
                  <form name="eventForm" id="event-submission-form">
                     <div>
                        <label for="event-author">Event contact *</label>
                        <input type="text" name="event_author_firstName" id="event-author-firstName" placeholder="First name" required aria-required="true">
                        <input type="text" name="event_author_lastName" id="event-author-firstName" placeholder="Last name" required aria-required="true">
                        <input type="text" name="event_author_phoneNumber" id="event-author-firstName" placeholder="Phone number" required aria-required="true">
                        <input type="text" name="event_author_email" id="event-author-email" placeholder="Email address" required aria-required="true">
                    </div>
                     <div>
                        <label for="event-details">Event Details*</label>
                        <input type="text" name="event_name" id="event-name" placeholder="Event name" required aria-required="true">
                        <input type="date" name="event_start_date" id="event_startDate" placeholder="Start date" required aria-required="true">
                        <input type="date" name="event_end_date" id="event_endDate" placeholder="End date" required aria-required="true">
                        <input type="time" name="event_start_time" id="event_startTime" placeholder="Start time" required aria-required="true">
                        <input type="time" name="event_start_time" id="event_startTime" placeholder="End time" required aria-required="true">
                        <input type="text" name="event_location" id="event_location" placeholder="Location" required aria-required="true">
                        <textarea rows="3" cols="20" name="event_description" id="event-description" required aria-required="true"></textarea>
                     </div>
                     <div>
                        <label for="event-type">Type of event*</label>
                        <input type="radio" id="eventTypeEvent"
                            name="eventType" value="event">
                            <label for="eventTypeEvent">Event</label>
                        <input type="radio" id="eventTypeLesson"
                        name="eventType" value="Lesson">
                        <label for="eventTypeLesson">Lesson</label>
                     </div>
                     <div>
                        <label for="event-tags">Event Tags*</label>
                        <input type="text" name="event_tags" placeholder="Try #Hiking or #Trail" id="event-tags">
                     </div>
                     <div>
                        <label for="event-photos">Upload photos*</label>
                        <input type="button" value="Choose file">
                        
                     </div>
                     <div>
                        <label for="event-tickets">Tickets</label>
                        <input type="hyperlink" name="event_tickets" placeholder="Link" id="event-tickets">
                     </div>

                     <input type="submit" value="Submit" class="pamclicky">
                  </form>

                  <p class="submit-success-message" style="display:none;"></p>
               </div>

            <?php else : ?>

               <p>Sorry, you must be logged in to submit a event!</p>

               <p><?php echo sprintf( '<a href="%1s">%2s</a>', esc_url( wp_login_url() ), 'Click here to login.' ); ?></p>

            <?php endif; ?>
         </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
