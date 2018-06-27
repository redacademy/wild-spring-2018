<?php
/**
 * Template Name: archive-activity Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>
<!-- 368 -->
	<?php $banner_img =  CFS()->get("hero_image_archive_activity", 299); 
	if(!empty($banner_img)): ?>

	<div class="activity-banner"><img src="<?php echo $banner_img; ?> " alt="banner image for WAV archive activity page"></div>
	
	<header class="page-header" id="1">				
        <h1 class="page-title">Outdoor Activity Ideas</h1>
	</header>

	<?php	
	endif;
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				
	
		<?php if ( have_posts() ) : ?>


			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<fieldset>
				<label>
					<input type="search" class="search-field" placeholder="SEARCH ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
				</label>

					<span class="screen-reader-text"><?php echo esc_html( 'Search' ); ?></span>
				</button>
			</fieldset>
		</form>


            <?php /* Start the Loop */ ?>
            <div class="activities-wrapper">

                <?php while ( have_posts() ) : the_post(); ?>
                    
                <div class="activity-item">

					<?php $loop = CFS()->get( 'activity_image_loop' );
					if ( ! empty ( $loop ) && ! is_wp_error( $loop ) ) : ?>                    

						<div class="archive-activity-carousel">
							<?php 
							foreach ( $loop as $row ) {?>
								<div class="carousel-cell">
									<a href=<?php echo get_post_permalink() ?>><img src="<?php echo $row['activity_image']; ?>"></a>
								</div>
							<?php } 
							?>
						</div>

					<?php endif; ?>

					<header class="entry-header">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					</header>

					<p class="activity-location">
						<?php echo CFS()->get('activity_location') ?>
					</p>

					<p class="description-paragraph">
    					<?php echo CFS()->get('description') ?>
					</p>

					<div class="tags">
						<?php
						$tags_list = get_the_tag_list( '', esc_html( ' ' ) );
						if ( $tags_list ) {
						printf( '<span class="tags-links">' . esc_html( '%1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
						}                                
						?>
					</div>
					
					<p class="see-details">
						<a href="<?php the_permalink(); ?>"class="see-detail-button">See details</a>
					</p>
				</div>


					<?php endwhile; ?>

					<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

        			<?php endif; ?>

			</div>

			<?php WAV_Starter_numbered_pagination(); ?>

			
			<p class="navigation-up-arrow">
				<a href="#1" class="navigation-arrow">▲</a>
			</p>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
