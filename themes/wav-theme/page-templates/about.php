<?php
/**
 * Template Name: About Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <h1>About WAV</h1>
    <h1>Our Festival</h1>
    <a>More Info</a>
    <h1>The Team</h1>
    <a>See More</a>
    <h1>Collaborators</h1>
    <h1>Work</h1>
        <h2>Festival History</h2>
        <h2>School Outreach</h2>
    <h1>Press</h1>
<?php get_footer(); ?>
