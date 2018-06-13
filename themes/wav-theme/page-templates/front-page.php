<?php
/**
 * Template Name: Front-Page Page
 *
 * @package WAV_Starter_Theme
 */


get_header(); ?>
<!--banner-->
<section class="front-page-banner">
			<a href="<?php echo home_url() ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>" alt="front-page-banner"/></a>
			</section><!--banner-->


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<img src="<?php echo CFS()->get( 'front_page_wav_img' ); ?>">
<h1><?php echo CFS()->get('front_page_wav_main_title')?></h1>
<p><?php echo CFS()->get('front_page_wav_mission')?></p>
			</section>
            <section>
                <h2>Upcoming Events</h2>
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
            <section>
                <h2>What is WAV?</h2>
                <div class="about-container">
                        <div class="single-about-cotainer">
                            <h3>About us</h3>
                            <p>Wild About Vancouver, is an organization that helps people to learn outdoor activity benefits and share outdoor experience to the world. </p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="single-about-cotainer">
                            <h3>Our Festival</h3>
                            <p>WAV hosts various kinds of local festivals on streets and schools. <br>Please check our calendar, blog, and social medias to keep on track!</p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="single-about-cotainer">
                            <h3>School Outreach</h3>
                            <p>WAV involves local schools to help UBC students to design a local outdoor learning project unique to the individual school. Expanding outdoor learning program will get INvolve more students to outdoor activities. </p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="more-about-button yellow-button">
                        <a href="#">find more</a>
                </div>
                </div>
            </section>
            <section>
                <h2>Stay Up to Date</h2>
            </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div><!-- #primary -->