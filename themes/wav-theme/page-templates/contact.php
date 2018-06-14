<?php
/**
 * Template Name: Contact
 * 
 * The template for displaying all pages.
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<img src="<?php echo CFS()->get( 'contact_img' ); ?>">

<aside id="sidebar-2">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) ?>
</aside>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
