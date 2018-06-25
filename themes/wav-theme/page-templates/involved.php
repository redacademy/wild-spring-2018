<?php
/**
 * Template Name: Involved Page
 * 
 * The template for displaying all pages.
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="get-involved hero-banner">
                <img src="<?php echo CFS()->get( 'get_involved_image' ); ?>">
            </div>

                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title">Volunteer</h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

        <img src="<?php echo CFS()->get( 'side_image' ); ?>">


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
