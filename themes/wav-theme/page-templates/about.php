<?php
/**
 * Template Name: About Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

            <nav class="mainNavigation">
                <ul class="aboutNavigation">
                    <li><a href="#aboutJump">About Wav</a></li>
                    <li><a href="#festivalJump">Our Festival</a></li> 
                    <li><a href="#teamJump">The Team</a></li> 
                    <li><a href="#collaboratorsJump">Collaborators</a></li>
                    <li><a href="#workJump">Work</a></li> 
                    <li><a href="#pressJump">Press</a></li>
                </ul>
            </nav>

		</main><!-- #main -->
	</div><!-- #primary -->

     

<div class="anchor" id="aboutJump"></div>
    <h1>About WAV</h1>
        <img src="<?php echo CFS()->get( 'about_wav_img' ); ?>">
        <p><?php echo CFS()->get( 'about_wav' ); ?></p>
        <a href="#">Read about Wild About Vancouver's Goals</a>
        <div> <!--Container for a video-->
            <?php echo CFS()->get( 'video_about' ); ?>
        </div>
        <p><?php echo CFS()->get( 'text_about_video' ); ?></p>

      <div class="anchor" id="festivalJump"></div>
    <h1>Our Festival</h1>
        <img src="<?php echo CFS()->get( 'our_festival_img' ); ?>">
        <p><?php echo CFS()->get( 'our_festival' ); ?></p>
    <a>More Info</a>

<div class="anchor" id="teamJump"></div>
    <h1>The Team</h1>
        <section class="container-holder">
                <div class="container">
                    <h1 class="container-header">Inhabitent Journal</h1>
                    <div class="inhabitent-journal listed-posts">

                <?php
                    $args = array( 'post_type' => 'person', 'category_name' => 'team', 'order' => 'ASC', 'numberposts' => '4' );
                    $journal_posts = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
                <div class="ijbox">
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php endif; ?>
                    </header>

                    <div class="entry-meta solid-border">
                        <div class="journal-meta">
                            
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </div> <!-- end of journal-meta-->

                        <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-border">Read Entry </a>
                        </div><!--end of read-more-->

                    </div><!--end of entry-meta-->
                </div><!--end of ijbox-->

                        <?php endforeach; wp_reset_postdata(); ?>
                    </div> <!--end of inhabitent-journal-->

                </div><!--end of container-->
            </section>
    <a>See More</a>

    <div class="anchor" id="collaboratorsJump"></div>
    <h1>Collaborators</h1>
    <section class="container-holder">
                <div class="container">
                    <h1 class="container-header">Inhabitent Journal</h1>
                    <div class="inhabitent-journal listed-posts">

                <?php
                    $args = array( 'post_type' => 'person', 'category_name' => 'collaborator', 'order' => 'ASC', 'numberposts' => '4' );
                    $collaborators = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $collaborators as $post ) : setup_postdata( $post ); ?>
                <div class="ijbox">
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php endif; ?>
                    </header>

                    <div class="entry-meta solid-border">
                        <div class="journal-meta">
                            
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </div> <!-- end of journal-meta-->

                        <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-border">Read Entry </a>
                        </div><!--end of read-more-->

                    </div><!--end of entry-meta-->
                </div><!--end of ijbox-->

                        <?php endforeach; wp_reset_postdata(); ?>
                    </div> <!--end of inhabitent-journal-->

                </div><!--end of container-->
            </section>

             <div class="anchor" id="workJump"></div>
    <h1>Work</h1>
        <h2>Festival History</h2>
        
    <section class="container-holder">
                <div class="container">

                    <div class="inhabitent-journal listed-posts">

                <?php
                    $args = array( 'post_type' => 'festival', 'order' => 'ASC', 'numberposts' => '5' );
                    $journal_posts = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
                <div class="ijbox">
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php endif; ?>
                    </header>

                    <div class="entry-meta solid-border">
                        <div class="journal-meta">
                            
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </div> <!-- end of journal-meta-->

                        <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-border">Read Entry </a>
                        </div><!--end of read-more-->

                    </div><!--end of entry-meta-->
                </div><!--end of ijbox-->

                        <?php endforeach; wp_reset_postdata(); ?>
                    </div> <!--end of inhabitent-journal-->

                </div><!--end of container-->
            </section>
        <h2>School Outreach</h2>
        <section class="container-holder">
                <div class="container">

                    <div class="inhabitent-journal listed-posts">

                <?php
                    $args = array( 'post_type' => 'post', 'category' => 'school-outreach','order' => 'ASC', 'numberposts' => '5' );
                    $journal_posts = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
                <div class="ijbox">
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php endif; ?>
                    </header>

                    <div class="entry-meta solid-border">
                        <div class="journal-meta">
                            
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </div> <!-- end of journal-meta-->

                        <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-border">Read Entry </a>
                        </div><!--end of read-more-->

                    </div><!--end of entry-meta-->
                </div><!--end of ijbox-->

                        <?php endforeach; wp_reset_postdata(); ?>
                    </div> <!--end of inhabitent-journal-->

                </div><!--end of container-->
            </section>

        <div class="anchor" id="pressJump"></div>
    <h1>Press</h1>

    <section class="container-holder">
                <div class="container">

                    <div class="inhabitent-journal listed-posts">

                <?php
                    $args = array( 'post_type' => 'press-item', 'order' => 'ASC', 'numberposts' => '5' );
                    $journal_posts = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
                <div class="ijbox">
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php endif; ?>
                    </header>

                    <div class="entry-meta solid-border">
                        <div class="journal-meta">
                            
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </div> <!-- end of journal-meta-->

                        <div class="read-more">
                            <a href="<?php echo esc_url(get_permalink())?>" class="button-border">Read Entry </a>
                        </div><!--end of read-more-->

                    </div><!--end of entry-meta-->
                </div><!--end of ijbox-->

                        <?php endforeach; wp_reset_postdata(); ?>
                    </div> <!--end of inhabitent-journal-->

                </div><!--end of container-->
            </section>

<?php get_footer(); ?>
