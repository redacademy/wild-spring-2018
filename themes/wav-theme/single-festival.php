<?php
/**
 * Template Name: Single-Festival Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<section class="carousel-container">
    <div class="double-carousel carousel-main">
        <?php $loop = CFS()->get( 'festival_image_carousel' );
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
