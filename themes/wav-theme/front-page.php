<?php
/**
 * The main template file.
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


<h1>Get involved, Get outdoors!</h1>
<p>To celebrate learning in local nature.</p>

<!--check if single activity can be added from events calendar-->
            <section class="front activity container">
			    <h2>Seasonal Activity Ideas</h2>

				<div class="activity-posts-container">
					<?php
					$args = array(
						'post_type' => 'adventure',
						'posts_per_page' => 2,
						'orderby' => 'date',
						'order' => 'ASC'
						);
					$latest_adventure_posts = get_posts( $args ); // returns an array of posts
					?>

					<?php foreach ( $latest_adventure_posts as $post ) : setup_postdata( $post ); ?>

						<article class="activity-posts-single">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="activity-posts-single-text">
								<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                <?php the_excerpt('<p></>')?>
								<a class="activity-post-button" href=<?php echo get_permalink() ?>>see details</a>
							</div><!-- .activity-posts-single-text-->
						</article><!-- activity-posts-single -->

					<?php endforeach; wp_reset_postdata(); ?>

				</div><!-- activity-posts-container -->

					 <div class="activity-button yellow-button">
          				<a href=<?php echo get_post_type_archive_link( 'activity' ) ?>>see activities</a>
					</div>
			</section>
            <section>
                <h2>Upcoming Events</h2>
                <div class="events-container">
                <!--shortcode from the plugin?-->
                 </div>
                 <div class="create-event-button yellow-button">
                        <a href="#">create events</a>
                </div>
                 <div class="find-event-button blue-button">
          				<a href=<?php echo get_post_type_archive_link( 'event' ) ?>>find events</a>
				</div>
            </section>
            <section>
                <h2>What is WAV?</h2>
                <div class="about-container">
                        <div class="single-about-cotainer">
                            <h3>About us</h3>
                            <p>Wild About Vancouver is an organization that helps people to learn outdoor activity benefits and share outdoor experience to the world. </p>
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