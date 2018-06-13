<?php
/**
 * Template Name: Front-Page Page
 *
 * @package WAV_Starter_Theme
 */


get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!--banner-->
	<section class="front-page-banner">
		<img src="<?php echo CFS()->get( 'front_page_wav_img' ); ?>">
		<h1><?php echo CFS()->get('front_page_wav_main_title')?></h1>
		<p><?php echo CFS()->get('front_page_wav_mission')?></p>
	</section><!--end of banner-->
<!--activity ideas-->
<section>
</section><!--end of activity section-->

<!--upcoming events-->
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
    </section><!--end of events section-->

<!--what is WAV-->
            <section>
                <h2>What is WAV?</h2>
                <div class="about-container">
                        <div class="single-about-cotainer">
                            <h3><?php echo CFS()->get('front_page_wav_what_is_wav_about_header')?></h3>
							<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_about_img')?>">
                            <p><?php echo CFS()->get('front_page_wav_what_is_wav_about_text')?></p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="single-about-cotainer">
                            <h3><?php echo CFS()->get('front_page_wav_what_is_wav_festival_header')?></h3>
							<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_festival_img')?>">
							<p><?php echo CFS()->get('front_page_wav_what_is_wav_festival_text')?></p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="single-about-cotainer">
						<h3><?php echo CFS()->get('front_page_wav_what_is_wav_school_header')?></h3>
						<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_school_img')?>">
						<p><?php echo CFS()->get('front_page_wav_what_is_wav_school_text')?></p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="more-about-button yellow-button">
                        <a href="#">find more</a>
                </div>
                </div>
            </section><!--end of what is WAV section-->
<!--social media feeds-->
            <section>
                <h2>Stay Up to Date</h2>
            </section><!--end of social media feeds-->


		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>