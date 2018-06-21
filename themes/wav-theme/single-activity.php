<?php
/**
 * Template Name: activity Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<section class="carousel-container">
    <div class="carousel double-carousel carousel-main">
        <?php $loop = CFS()->get( 'activity_image_loop' );
        foreach ( $loop as $row ) {?>
            <div class="carousel-cell">
                 <img src="<?php echo $row['activity_image']; ?>">
            </div>
        <?php } ?>
    </div>
       
    <div class="carousel-nav">
        <?php $loop = CFS()->get( 'activity_image_loop' );
            foreach ( $loop as $row ) {?>
                <div class="carousel-cell">
                    <img src="<?php echo $row['activity_image']; ?>">
                </div>
        <?php } ?>
    </div>

</section>

<header class="entry-header">
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<p class="activity-location">
<?php echo CFS()->get('activity_location') ?>
</p>

<h2 class="description">
    <?php
        $description_props = CFS()->get_field_info('description');
        echo $description_props['label'];
    ?>
</h2>

<p class="description-paragraph">
    <?php echo CFS()->get('description') ?>
</p>

<h2>
    <?php
        $location_props = CFS()->get_field_info('location');
        echo $location_props['label'];
    ?>
</h2>

<p class="location">
<?php echo CFS()->get('location') ?>
</p>

<div class="tags">
    <?php
    $tags_list = get_the_tag_list( '', esc_html( ' ' ) );
    if ( $tags_list ) {
    printf( '<span class="tags-links">' . esc_html( 'Tags  %1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }                                
    ?>
</div>

<?php echo CFS()->get('maps') ?>

<p>
<input type="submit" value="Creat Events" class="creat-events-button">
</p>

<?php get_footer(); ?>
