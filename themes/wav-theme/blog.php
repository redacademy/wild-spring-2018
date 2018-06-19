<?php
/**
 * Template Name: blog Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<h1 class="entry-title">Our Blog</h1>


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
									<?php the_title( sprintf( '<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
									<p class="posted-date"><?php WAV_starter_posted_on(); ?></p>
									<div class="entry-content">
										<?php the_excerpt(); ?>
										</div><!-- .entry-content -->
										</div>
									</div>

									<?php
									
										$tags_list = get_the_tag_list( '', esc_html( ', ' ) );
										if ( $tags_list ) {
											printf( '<span class="tags-links">' . esc_html( 'Tagged &rarr; %1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
										}
										
									
									?>



									<a href="<?php the_permalink(); ?>"class="journal-button">See Details</a>

								</li>						
							<?php endforeach; wp_reset_postdata(); ?>

						</ul>

					</div>

        	</section>
                


		</main><!-- #main -->
    </div><!-- #primary -->
    









<?php get_sidebar(); ?>
<?php get_footer(); ?>
