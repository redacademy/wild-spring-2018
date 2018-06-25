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

	

<?php get_sidebar(); ?>
<?php get_footer(); ?>
