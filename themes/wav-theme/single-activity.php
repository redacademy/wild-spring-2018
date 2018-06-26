<?php
/**
 * Template Name: activity Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<div class="heading-carousel">
<?php $loop = CFS()->get( 'activity_image_loop' );
         
         if(!empty($loop[0]['activity_image'])): ?>
        
        <section class="carousel-container">
            <div class="double-carousel carousel-main">
                
                    <?php foreach ( $loop as $row ) :?>
                        <div class="carousel-cell">
                            <img src="<?php echo $row['activity_image']; ?>">
                        </div>
                    <?php endforeach; ?>
                
            </div>
            
            <div class="carousel-nav">
            
                <?php   foreach ( $loop as $row ) {?>
                        <div class="carousel-cell">
                            <img src="<?php echo $row['activity_image']; ?>">
                        </div>
                <?php } ?>
            </div>

        </section>
        <?php endif; ?> 

<header class="entry-header">
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->


<p class="activity-location">
<?php echo CFS()->get('activity_location') ?>
</p>

</div>

<div class="flex-container">

<div class="left-side">

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

<h2 class="tags">Tags</h2>

<div class="tags">
    <?php
    $tags_list = get_the_tag_list( '', esc_html( ' ' ) );
    if ( $tags_list ) {
    printf( '<span class="tags-links">' . esc_html( '%1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }                                
    ?>
</div>

</div>

<div class="right-side">

<?php echo CFS()->get('maps') ?>

</div>

</div>

<p class="creat-event-button">
<input type="submit" value="Create Event" class="creat-events-button">
</p>

<?php get_footer(); ?>
