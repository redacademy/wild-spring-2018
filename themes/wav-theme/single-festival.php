<?php
/**
 * Template Name: Single-Festival Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>




<!--NTS add conditional for no loop -->
				<?php $loop = CFS()->get( 'festival_image_carousel' );
					if ( ! empty ( $loop ) && ! is_wp_error( $loop ) ) : ?>
					<section class="carousel-container">
						<div class="double-carousel carousel-main">
							<?php
							foreach ( $loop as $row ) {?>
								<div class="carousel-cell">
									<img src="<?php echo $row['festival_image']; ?>">
								</div>
							<?php } ?>
						</div>
						
						<div class="carousel-nav">
							<?php $loop = CFS()->get( 'festival_image_carousel' );
								foreach ( $loop as $row ) {?>
									<div class="carousel-cell">
										<img src="<?php echo $row['festival_image']; ?>">
									</div>
							<?php } ?>
						</div>
					

					</section>
					<?php endif; ?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<p class="festival-date">
	<?php echo CFS()->get('dates') ?>
</p>

	<h3 class="festival-description">
		<?php echo CFS()->get('festival_subtitle') ?>
								</h3>
	<p class="festival-description">
		<?php echo CFS()->get('festival_description') ?>
	</p>

<div class="festival-navigation">
	<a href="../../contact" class="button yellow-button">Become an exhibitor</a>
	<a href="../../get-involved" class="button blue-button">Volunteer</a>
								</div>


	


<?php get_footer(); ?>
