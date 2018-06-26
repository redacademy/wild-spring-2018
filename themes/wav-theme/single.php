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
	<?php
	endif;
	?>
	
	<h1 id="1" class="page-title">Our Blog</h1>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="image-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large' ); ?>
                    <?php endif; ?>
                </div>

				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<div class="entry-meta">
					<p> posted on <?php  the_time('F j, Y / h:i A') ?> </p>
				</div><!-- .entry-meta -->

                <div class="tags">
                    <?php
                    $tags_list = get_the_tag_list( '', esc_html( ' ' ) );
                    if ( $tags_list ) {
                    printf( '<span class="tags-links">' . esc_html( '%1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                    }                                
                    ?>
                </div>
					

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
            'prev_text'                  => __( '&#8249; Prev Post' ),
            'next_text'                  => __( 'Next Post &#8250;' ),
       		 ) ); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
