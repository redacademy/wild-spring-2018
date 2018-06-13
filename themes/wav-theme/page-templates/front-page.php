<?php
/**
 * Template Name: Front-Page Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>


				<div class="tribe_event-container">
                <div class="tribe_event-posts-container">
                <!-- // the loop for events as per documentation -->
           <?php 
           $args = array(//array to get the upcoming events, only three of them
			'posts_per_page' => 3,
			'orderby' => 'date',
            'order' => 'ASC'
        );
            $events = tribe_get_events($args);
            if ( empty( $events ) ) {
                echo('Sorry, nothing found.');
            }
            else foreach( $events as $event ) {
                echo('<article class="event-post-single">');
                echo('<div><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_post_thumbnail( $event, 'medium').'</a></div>');
                echo('<h3 class="entry-title"><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_title( $event).'</a></h3>' );
                echo('<p>'.get_the_excerpt($event).'</p>');
                echo('</article>');
            }
            ?>
				</div><!-- tribe_event-posts-container -->
                 </div>
                 <div class="create-tribe_event-button yellow-button">
                        <a href="#">create events</a>
                </div>
                 <div class="find-tribe_event-button blue-button">
          				<a href=<?php echo get_post_type_archive_link( 'tribe_event' ) ?>>find events</a>
				</div>
            </section>

                			<?php endwhile; // End of the loop. ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>