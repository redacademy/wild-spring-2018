<?php
/**
 * Template Name: Contact
 * 
 * The template for displaying all pages.
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<div class="top" id="top">
		<main id="main" class="site-main" role="main">
			<div class="contact-banner hero-banner">
			<img src="<?php echo CFS()->get( 'contact_image' ); ?>">
			</div>
			<div class="contact-main">
				<div class="contactandfaq">
					<div class="contact-top">
						<h2 class="contactus"> contact us </h2>
						<div class="contact-button1">
							<a href="#faq">faq</a>
					</div>
					</div>
					<aside class="sidebar-2" id="sidebar-2">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) ?>
					</aside>
				</div>
				<div class="contact-submit">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php endwhile; // End of the loop. ?>

					<section class="faq" id="faq">
					<div class="faq-event-submission">
	<div class="accordion">
		<div class="question">
		Who Can Submit an Event/Lesson?
		</div>
		<div class="answer">	
		Vancouver community-based organizations that offer outdoor education experiences are invited to “showcase” what they are currently doing by contributing an event to the festival. Potential hosts may be, but not limited to, non-profits, for-profits, and in/formal educational organizations (including those who may not see themselves as being just outdoor-based).  Teachers are also invited to submit a lesson to WAV, showcasing the teacher they are doing outdoors.
		</div>
		<div class="question">
		Who Will Attend the event/lesson?
		</div>
		<div class="answer">	
		The weekday events will focus on schools, teachers, community-based organizations, and students, while the weekend events will be directed towards families and community-members at large.  Most school lessons are closed events, and not open to the general public.  Events may be open or have a registration.  Check each event/lesson for details.
		</div>
		<div class="question">
		Looking for Event/Lesson Ideas?
		</div>
		<div class="answer">	
		Take a look at the great events our 2015 Event Hosts and 2016 Events Hosts offered.
		</div>
		<div class="question">
		Event/Lesson Role
		</div>
		<div class="answer">	
		Event hosts will determine the “event” they wish to contribute to the festival (stand-up paddle boarding, gardening, cycling, art, music, etc). All aspects of the event are organized by each event host including: the date and time of the event, equipment, safety, supervision, insurance, and registration of participants. In addition:

		The event will be located in Vancouver
		There will be no fee for participants
		There will be an educational component that invites participants to take something away that they can enact elsewhere (school, home, community-centre, etc.) and share their experience with others
		Lessons will be offered by teachers/educators.  They will be closed events that only the teacher and students participate in.  Different classes many join up for a lesson, or even different schools and grade levels may collaborate for an outdoor lesson.  Outdoor lessons are a chance to share what you are currently doing outdoors with other teachers/educators.
		</div>
		<div class="question">
		Our Part
		</div>
		<div class="answer">
		Wild About Vancouver will offer advertising and promotion of your event in addition to an event schedule and map of the festival to assist participants in choosing events to attend. WAV will also hold a preparation workshop for event providers in the weeks leading up to the festival. After the event, WAV will help collect data from the event so we can all learn from the experience.
		For lessons, WAV will share your outdoor teaching with other teachers/educators to help inspire them to take their teaching outdoors and offer some ideas about the range of learning that can happen outdoors.
		</div>
		<div class="question">
		I Need Help Planning My Event/Lesson
		</div>
		<div class="answer">	
		Check out this helpful Wild About Vancouver Event Host Guide.
		</div>
		<div class="question">
		I Need Funding for My Event/Lesson
		</div>
		<div class="answer">	
		Groups and/or individuals wishing to offer an event in the WAV Festival may apply for funding to help with costs associated with their event. There is no guarantee that WAV will be able to find a sponsor, but we will try!

		Looking for funding for your event?  Check out Go Grants  or the City of Vancouver’s Greenest City Neighbourhood Small Grants.
		</div>
	</div>
</div>
					
					</section>

					<div class="contact-button2">
						<a href="#top">Back To Top</a>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
