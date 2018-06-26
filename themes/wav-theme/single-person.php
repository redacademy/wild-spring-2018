<?php
/**
 * Template Name: Single-Person Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

<article class="single-person">
        <section class="person-profile-picture">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?></a>
            <?php endif; ?>
        </section>
         

        <section class="person-informaton">
                <header class="entry-header">
                    <h1><?php echo esc_html(CFS()->get( 'persons_name' )) ; ?></h1>
                    <h3>Role: <?php echo esc_html(CFS()->get('team_member_or_collaborator')) ;?></h3>
                </header><!-- .entry-header -->

                

            <p class="person-description">
                <?php echo CFS()->get('person_description') ?>
            </p>
</section>
</article>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_post_navigation( array(
            'prev_text'                  => __( '&#8249; Prev Post' ),
            'next_text'                  => __( 'Next Post &#8250;' ),
       		 ) ); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	


<?php get_footer(); ?>

