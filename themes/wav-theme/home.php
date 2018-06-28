<?php
/**
 * The main template file.
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

    
    <?php $banner_img =  esc_url(CFS()->get("hero_image_blogs", 226)); 
	if(!empty($banner_img)): ?>

	<div class="activity-banner"><img class="hero-banner" src="<?php echo $banner_img; ?> " alt="banner image for WAV archive blog page"></div>
	
	<header class="page-header" id="1">				
        <h1 id="1" class="page-title">Our Blog</h1>
	</header>

	<?php	
	endif;
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <fieldset>
                    <label>
                        <input type="search" class="search-field" placeholder="       Search ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
                    </label>
                    <button class="search-submit">
                        <span class="icon-search" aria-hidden="true">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="screen-reader-text"><?php echo esc_html( 'Search' ); ?></span>
                    </button>
                </fieldset>
            </form>

        <?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
				</header>
			<?php endif; ?>

            <?php /* Start the Loop */ ?>
            
            <div class="blogs-wrapper">

            <?php while ( have_posts() ) : the_post(); ?>
            
                <div class="blogs-item">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="image-header-container">

                            <div class="image-wrapper">
                                <?php if ( has_post_thumbnail() ) : ?>
                                <a href=<?php echo esc_url(get_post_permalink()) ?>><?php the_post_thumbnail( 'large' ); ?></a>
                                <?php endif; ?>
                            </div>

                            <div class="title-post-on">

                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                            <?php if ( 'post' === get_post_type() ) : ?>
                            <div class="entry-meta">
                                <?php the_time('F j, Y / h:i A') ?>
                            </div><!-- .entry-meta -->
                            <?php endif; ?>

                            </div>
                    </div>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->

                    <div class="tags">
                        <?php
                        $tags_list = get_the_tag_list( '', esc_html( ' ' ) );
                        if ( $tags_list ) {
                        printf( '<span class="tags-links">' . esc_html( '%1$s' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                        }                                
                        ?>
                    </div>
                                    
                    <p class="see-details">
                        <a href="<?php esc_url(the_permalink()); ?>"class="see-detail-button">Read More</a>
                    </p>
                    
                </div>

            <?php endwhile; ?>
            
            <?php WAV_Starter_numbered_pagination(); ?>
        

        <p class="navigation-up-arrow">
			<a href="#1" class="navigation-arrow">▲</a>
		</p>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

    </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
