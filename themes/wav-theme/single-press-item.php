<?php
/**
 * The template for displaying all single posts.
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<?php $banner_img =  CFS()->get("hero_image_post"); 
	if(!empty($banner_img)): ?>

	<div class="single-post-banner"><img src="<?php echo $banner_img; ?> " alt="banner image for WAV post page"></div>
	<h1 id="1" class="page-title">Our Blog</h1>
	<?php
	endif;
	?>
	


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="image-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large' ); ?>
                    <?php endif; ?>
                </div>

                <div class="text-wrapper">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					

				<div class="entry-content">
                    <?php the_content(); ?>
                    <p><a href="<?php echo esc_url(CFS()->get('external_hyperlink'));?>" alt="Link to article"> To read more click here </a></p>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

                            </div>
			</article><!-- #post-## -->

			<?php the_post_navigation( array(
            'prev_text'                  => __( '&#8249; Prev Post' ),
            'next_text'                  => __( 'Next Post &#8250;' ),
       		 ) ); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
