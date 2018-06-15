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
			<img src="<?php echo CFS()->get( 'contact_img' ); ?>">
			<div class="contact-top">
				<h2> contact us </h2>
				<button class="contact-button">
					<a href="#faq">faq</a>
				</button>
			</div>
			<aside id="sidebar-2">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) ?>
			</aside>


				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>

				<section class="faq" id="faq">
				</section>

				<button class="contact-button">
					<a href="#top">Back To Top</a>
				</butto >

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
