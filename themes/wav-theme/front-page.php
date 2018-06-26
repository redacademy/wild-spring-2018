<?php
/**
 * 
 *
 * @package WAV_Starter_Theme
 */


get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!--banner-->
	<section class="front-page-banner hero-banner">
		<img src="<?php echo CFS()->get( 'front_page_wav_img' ); ?> " alt="banner image for WAV front-page">
        <div class="banner-text">
            <h1><?php echo CFS()->get('front_page_wav_main_title')?></h1>
            <p><?php echo CFS()->get('front_page_wav_mission')?></p>
        </div>
	</section><!--end of banner-->
<!--activity ideas-->
<section class="activities">
			<h2>Seasonal Activity Ideas</h2>

				<div class="activities-container carousel-front-page" data-flickity='{ "watchCSS": true }'>
					<?php
					$args = array(
						'post_type' => 'activity',
						'posts_per_page' => 2,
						'orderby' => 'date',
						'order' => 'ASC'
						);
					$latest_activity_posts = get_posts( $args ); // returns an array of posts
					?>

					<?php foreach ( $latest_activity_posts as $post ) : setup_postdata( $post ); ?>

						<article class="activities-posts-single carousel-front-page-cell">
							<div class="activities-posts-single-text">
								<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
								<?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( '' ); ?>
                                <?php endif; ?>
                                <p><?php echo CFS()->get('description')?></p>

                                <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-green">See details &rsaquo;</a>
                        </div>
							</div><!-- .activities-posts-single-text-->
                        </article><!-- activities-posts-single -->

					<?php endforeach; wp_reset_postdata(); ?>

				</div><!-- activities-container -->

					 <div class="button contact-button1 activities-button">
          				<a  href=<?php echo get_post_type_archive_link( 'activity' ) ?>>see activities</a>
					</div>


</section><!--end of activity section-->

<!--upcoming events-->
    <section class="events">
                <h2>Upcoming Events</h2>
                <!-- <div class="tribe_event-container"> -->
                <div class="events-container carousel-front-page" data-flickity='{ "watchCSS": true }'>
                <!-- // the loop for events as per documentation -->
           <?php
           $args = array(//array to get the upcoming events, only three of them
			'posts_per_page' => 3,
			'orderby' => 'date',
            'order' => 'ASC',
            'eventDisplay'=>'upcoming'
        );
            $events = tribe_get_events($args);

            if ( empty( $events ) ) {
                echo('Sorry, nothing found.');
            }
            else foreach( $events as $event ) {
                echo('<article class="event-post-single carousel-front-page-cell">');
                echo('<div><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_post_thumbnail( $event, 'large').'</a></div>');
                echo('<h3 class="entry-title"><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_title( $event).'</a></h3>' );
                // echo('<p>'.$event->post_content.'</p>');
                echo('<p>'.tribe_get_start_date($event).'<p>');
                echo('<p>'.get_the_excerpt($event).'</p>');
                //tribe_meta_event_tags( sprintf( esc_html__( '%s Tags:', 'the-events-calendar' ), tribe_get_event_label_singular() ), ', ');

                    $tags = wp_get_post_tags($event->ID);
                    echo('<ul class="tags-list">');
                         foreach ( $tags as $tag ) {
                            echo('<li><a href="tag/'.$tag->slug.'"> #'.$tag->name.'</a></li>');
                         }
                    echo('</ul>');

                echo('<div class="read-more"><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">See details &rsaquo;</a></div>');
                echo('</article>');
            }
            ?>
                </div><!-- events-container -->
                <div class="events-buttons-container">
                    <div class="button contact-button1">
                    <a href=<?php echo get_post_type_archive_link( 'tribe_event' ) ?>>create events</a>
                    </div>
                    <div class="button blue-button">
                            <a href=<?php echo get_post_type_archive_link( 'tribe_events' ) ?>>find events</a>
                    </div>
                </div>

    </section><!--end of events section-->

<!--what is WAV-->
            <section>
                <h2>What is WAV?</h2>
                <!--tab navigation-->
                <ul class="tabs">
                    <li class="tab-link current" data-tab="tab-1"><?php echo CFS()->get('front_page_wav_what_is_wav_about_header')?></li>
                    <li class="tab-link" data-tab="tab-2"><?php echo CFS()->get('front_page_wav_what_is_wav_festival_header')?></li>
                    <li class="tab-link" data-tab="tab-3"><?php echo CFS()->get('front_page_wav_what_is_wav_school_header')?></li>
                </ul>
                <div class="about-container data-tab">
                        <div id="tab-1" class="single-about-container tab-content current">
                            <h3><?php echo CFS()->get('front_page_wav_what_is_wav_about_header')?></h3>
							<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_about_img')?>" alt="WAV logo">
                            <p><?php echo CFS()->get('front_page_wav_what_is_wav_about_text')?></p>
                            <a class="read-more" href="<?php echo get_permalink( get_page_by_title( 'About' ) ) ?>">learn more &rsaquo; </a>
                        </div>
                        <div id="tab-2" class="single-festival-container tab-content">
                            <h3><?php echo CFS()->get('front_page_wav_what_is_wav_festival_header')?></h3>
							<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_festival_img')?>" alt="WAV picture of festival activity">
							<p><?php echo CFS()->get('front_page_wav_what_is_wav_festival_text')?></p>
                            <a class="read-more" href="<?php echo get_permalink( get_page_by_title( 'About' ) ) ?>">learn more &rsaquo; </a>
                        </div>
                        <div id="tab-3" class="single-school-container tab-content">
						    <h3><?php echo CFS()->get('front_page_wav_what_is_wav_school_header')?></h3>
						    <img src="<?php echo CFS()->get('front_page_wav_what_is_wav_school_img')?>" alt="WAV image of school outreach activity">
						    <p><?php echo CFS()->get('front_page_wav_what_is_wav_school_text')?></p>
                            <a class="read-more" href="<?php echo get_permalink( get_page_by_title( 'About' ))?>">learn more &rsaquo; </a>
                        </div>
                </div>
                <div class="button contact-button1">
                        <a href="<?php echo get_permalink( get_page_by_title( 'About' ) ) ?>">find more</a>
                </div>
            </section><!--end of what is WAV section-->
            <!--social media feeds-->
            <section class="sm-feed">
				<h2>Stay Up to Date</h2>
			        <div id="sidebar-front-page" class=" sm-feed-container">
				        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-front-page') ) ?>
                    </div>
                </section><!--end of social media feeds-->
		</main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
