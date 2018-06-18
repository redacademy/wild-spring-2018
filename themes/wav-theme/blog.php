<?php
/**
 * Template Name: blog-1 Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
    </div><!-- #primary -->
    




    				<section class="last-journal">
					<div class="container">
						<?php
							$args = array(
							'post_type' => 'post',
							'order' => 'DSC' );
							$post_posts = get_posts( $args ); // returns an array of posts
						?>

						<ul>
							<?php foreach ( $post_posts as $post ) : setup_postdata( $post ); ?>

								<li>

									<div class="small-photo-wrapper">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'large' ); ?>
										<?php endif; ?>
									</div>

									<div class="small-post-wrapper">

										<div class="entry-meta">
										<p class="posted-date"><?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></p>
										<?php the_title( sprintf( '<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
										</div>
									</div>

									<a href="<?php the_permalink(); ?>"class="journal-button">Read Entry</a>

								</li>

							
						
							<?php endforeach; wp_reset_postdata(); ?>

						</ul>

					</div>

                </section>
                




<?php get_sidebar(); ?>
<?php get_footer(); ?>
