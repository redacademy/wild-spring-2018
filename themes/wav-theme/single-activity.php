<?php
/**
 * Template Name: activity Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>
<section>
    <div class="carousel carousel-main" data-flickity>
        <?php $loop = CFS()->get( 'activity_image_loop' );
        foreach ( $loop as $row ) {?>
            <div class="carousel-cell">
                 <img src="<?php echo $row['activity_image']; ?>">
            </div>
        <?php } ?>
    </div>
    <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
        <?php $loop = CFS()->get( 'activity_image_loop' );
            foreach ( $loop as $row ) {?>
                <div class="carousel-cell">
                    <img src="<?php echo $row['activity_image']; ?>">
                </div>
        <?php } ?>
    </div>

   <h3><?php echo $row['description']; ?></h3>
    <p><?php echo $row['location']; ?></p>

</section>
<?php get_footer(); ?>

 <!--  -->




	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
