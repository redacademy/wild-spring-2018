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
			<div class="contact-banner">
			<img class="hero-banner" src="<?php echo CFS()->get( 'contact_image' ); ?>">
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

					<div class="contact-button2">
						<a href="#top">Back To Top</a>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
