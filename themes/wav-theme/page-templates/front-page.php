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
<section class="activities">
			<h2>Seasonal Activity Ideas</h2>

				<div class="activities-container carousel">
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

						<article class="activities-posts-single carousel-cell">
							<div class="activities-posts-single-text">
								<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
								<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( '' ); ?>
                                <p><?php echo CFS()->get('description')?></p>

                                <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-green">see details</a>
                        </div>
							</div><!-- .activities-posts-single-text-->
                        </article><!-- activities-posts-single -->
                        <?php endif; ?>

					<?php endforeach; wp_reset_postdata(); ?>

				</div><!-- activities-container -->

					 <div class="activities-button">
          				<a class="yellow-button" href=<?php echo get_post_type_archive_link( 'activity' ) ?>>see activities</a>
					</div>


</section><!--end of activity section-->

<!--upcoming events-->
    <section class="events">
                <h2>Upcoming Events</h2>
                <!-- <div class="tribe_event-container"> -->
                <div class="events-container carousel">
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
                echo('<article class="event-post-single carousel-cell">');
                echo('<div><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_post_thumbnail( $event, 'large').'</a></div>');
                echo('<h3 class="entry-title"><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_title( $event).'</a></h3>' );
                echo('<p>'.$event->post_content.'</p>');
                echo('<p>'.tribe_get_start_date($event).'<p>');
                echo('<div><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">See details &rsaquo;</a></div>');
                echo('<p id="get-category">click here</p>');
                $tags = wp_get_post_tags($event->ID);
                echo('<ul>');
                foreach ( $tags as $tag ) {
                    echo('<li>'.$tag->name.'</li>');
                }
                echo('</ul>');

                //need to add ajax get tags from json
                echo('</article>');
            }
            ?>
				</div><!-- events-container -->
                 <div class="button yellow-button">
                        <a href="#">create events</a>
                </div>
                 <div class="button blue-button">
          				<a href=<?php echo get_post_type_archive_link( 'tribe_event' ) ?>>find events &rsaquo;</a>
				</div>
    </section><!--end of events section-->

<!--what is WAV-->
            <section>
                <h2>What is WAV?</h2>
                <div class="about-container">
                        <div class="single-about-container">
                            <h3><?php echo CFS()->get('front_page_wav_what_is_wav_about_header')?></h3>
							<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_about_img')?>">
                            <p><?php echo CFS()->get('front_page_wav_what_is_wav_about_text')?></p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="single-festival-container">
                            <h3><?php echo CFS()->get('front_page_wav_what_is_wav_festival_header')?></h3>
							<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_festival_img')?>">
							<p><?php echo CFS()->get('front_page_wav_what_is_wav_festival_text')?></p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                        <div class="single-school-container">
						<h3><?php echo CFS()->get('front_page_wav_what_is_wav_school_header')?></h3>
						<img src="<?php echo CFS()->get('front_page_wav_what_is_wav_school_img')?>">
						<p><?php echo CFS()->get('front_page_wav_what_is_wav_school_text')?></p>
                            <a href="#">learn more &rsaquo; </a>
                        </div>
                </div>
                <div class="button yellow-button">
                        <a href="#">find more</a>
                </div>
            </section><!--end of what is WAV section-->
<!--social media feeds-->
            <section class="sm-feed">
				<h2>Stay Up to Date</h2>
				<div class="sm-feed-container">
<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwildaboutvancouver%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1670564316547876" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	<a class="twitter-timeline"
  href="https://twitter.com/WildAboutVan">
Tweets by @WildAboutVan
</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div><?php echo CFS()->get('front_page_wav_instagram_feed')?></div>
</div>
            </section><!--end of social media feeds-->

		</main><!-- #main -->
    </div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>