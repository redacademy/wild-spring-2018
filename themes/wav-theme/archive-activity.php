<?php
/**
 * Template Name: archive-activity Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">				
                <h1 class="entry-title">Outdoor Activity Ideas</h1>
			</header>

			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <fieldset>
                    <label>
                        <input type="search" class="search-field" placeholder="SEARCH ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
                    </label>
                    <button class="search-submit">
                        <span class="icon-search" aria-hidden="true">
                            <i class="fa fa-search"></i>
                        </span>
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
									<img src="<?php echo $row['activity_image']; ?>">
								</div>
							<?php } 
							?>
						</div>

					<?php endif; ?>

					<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
						printf( '<span class="tags-links">' . esc_html( 'Tags  %1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
						}                                
						?>
					</div>

					<a href="<?php the_permalink(); ?>"class="see-detail-button">See Details</a>
					
				</div>


					<?php endwhile; ?>

					<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

        			<?php endif; ?>

            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
