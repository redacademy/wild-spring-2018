<?php
/**
 * The template for displaying all single posts.
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-meta">
						<?php WAV_Starter_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php									
                 	$tags_list = get_the_tag_list( '', esc_html( ', ' ) );
                	if ( $tags_list ) {
               	 	printf( '<span class="tags-links">' . esc_html( 'Tagged &rarr; %1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                	}
                	?>
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

			<?php the_post_navigation( array(
            'prev_text'                  => __( 'Back' ),
            'next_text'                  => __( 'Next' ),
       		 ) ); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
