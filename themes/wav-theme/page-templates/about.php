<?php
/**
 * Template Name: About Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <nav>
                <ul class="aboutNavigation">
                    <li><a href="#aboutJump">About Wav</a></li>
                    <li><a href="#festivalJump">Festival</a></li>
                    <li><a href="#teamJump">Team</a></li>
                    <li><a href="#collaboratorsJump">Collaborators</a></li>
                    <li><a href="#workJump">Work</a></li>
                    <li><a href="#pressJump">Press</a></li>
                </ul>
            </nav>
<!-- the abouv nav should be replaced with registered wigdet area for navigation with custom links. TODO, when time permits -->

            <div class="anchor" id="aboutJump"></div>

            <section class="aboutWav">

                <h1>About WAV</h1>

                <div class="header-img-container">
                    <img class="header-img" src="<?php echo esc_url(CFS()->get( 'about_wav_img' )); ?>">
                </div>

                <p><?php echo esc_html(CFS()->get( 'about_wav' )); ?></p>

                <div class="videoAboutWav"> <!--Container for a video-->

                    <div><?php echo CFS()->get( 'video_about_test' );?></div>

                    <p><?php echo esc_html(CFS()->get( 'text_about_video' )); ?></p>

                </div>

            </section><!--end of aboutWav-->

            <div class="anchor" id="festivalJump"></div>
            <section class="ourFestival">
                <h1>Our Festival</h1>
                <div class="header-img-container">
                    <img class="header-img" src="<?php echo esc_url(CFS()->get( 'our_festival_img' )); ?>">
                </div>
                <p><?php echo esc_html(CFS()->get( 'our_festival' )); ?></p>

                <div class="center-button">
                    <a href="<?php echo get_post_type_archive_link( 'festival' ) ?>" class="green-button">More Information</a>
                </div>
            </section>

            <div class="anchor" id="teamJump"></div>
            <section class="theTeam">
                <h1>The Team</h1>
                    <div class="teamMembers about-carousel" data-flickity='{ "watchCSS": true, "groupCells": true, "freeScroll": false  }'>

                        <?php
                            $args = array( 'post_type' => 'person', 'category_name' => 'team', 'order' => 'ASC', 'posts_per_page' => 4,);
                            $team_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $team_posts as $post ) : setup_postdata( $post ); ?>
                            <div class="teamMember about-carousel-cell">
                                <!-- <header class="entry-header"> -->
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( CFS()->get( 'personal_webpage' )) ?>" alt="Team Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                <!-- </header> -->

                            </div><!--end of teamMember-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of teamMembers-->

                    <div class="center-button">
                        <a href="<?php echo get_post_type_archive_link( 'person' ) ?>" class="green-button">See More</a>
                    </div>

                    <!-- <a class="hidden-mobile green-button" href=<?php echo get_post_type_archive_link( 'person' ) ?>>See More</a> -->
            </section>

                <div class="anchor" id="collaboratorsJump"></div>
            <section class="collaborators">
                <h1>Collaborators</h1>
                <div class="collaborators about-carousel" data-flickity='{ "watchCSS": true , "groupCells": true, "freeScroll": false }'>

                 <?php
                    $args = array( 'post_type' => 'person', 'category_name' => 'collaborator', 'order' => 'ASC', 'posts_per_page' => 3,);
                    $collaborators_posts = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $collaborators_posts as $post ) : setup_postdata( $post ); ?>
                    <div class="collaborator about-carousel-cell">
                                <!-- <header class="entry-header"> -->
                        <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url(CFS()->get( 'personal_webpage' )); ?>" alt="Collaborator Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                <!-- </header> -->
                            </div><!--end of collaborator-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of collaborators-->

            </section>

                <div class="anchor" id="workJump"></div>
                    <h1>Work</h1>

                        <section class="festivals">
                        <h2>Festival History</h2>
                        <div class="festivals about-carousel" data-flickity='{ "watchCSS": true, "groupCells": true, "freeScroll": false  }'>

                        <?php
                            $args = array( 'post_type' => 'festival', 'order' => 'ASC', 'posts_per_page' => 4);
                            $festival_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $festival_posts as $post ) : setup_postdata( $post ); ?>
                            <div class="festival about-carousel-cell">
                                <!-- <header class="entry-header"> -->
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink()) ?>" alt="Festival Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                <!-- </header> -->
                            </div><!--end of collaborator-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of collaborators-->

                </section>

                  <section class="schoolOutreach">
                        <h2>School Outreach</h2>
                        <div class="schoolOutreach-container">

                        <?php
                            $args = array( 'post_type' => 'post', 'category'=>'school-outreach', 'order' => 'ASC', 'posts_per_page' => 2);
                            $school_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $school_posts as $post ) : setup_postdata( $post ); ?>
                            <div class="schoolItem">
                                <header class="entry-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink()) ?>" alt="School Outreach Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header>

                            </div><!--end of collaborator-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of collaborators-->

                </section>

                <div class="anchor" id="pressJump"></div>

                 <section class="press">
                        <h1>Press</h1>
                        <div class="press about-carousel" data-flickity='{ "watchCSS": true , "groupCells": true, "freeScroll": false }'>

                        <?php
                            $args = array( 'post_type' => 'press-item', 'order' => 'ASC', 'posts_per_page' => 4);
                            $press_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $press_posts as $post ) : setup_postdata( $post ); ?>
                            <div class="pressItem about-carousel-cell">
                                <header class="entry-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( CFS()->get( 'external_hyperlink' )); ?>" alt="Press Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header>
                                <div>
                                    <p><?php echo esc_html(CFS()->get( 'source' )) ; ?></p>
                                    <p><?php echo esc_html(CFS()->get( 'date' )) ; ?></p>
                                </div>
                            </div><!--end of pressItem-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of press-->

                    <div class="center-button">
                        <a href="<?php echo get_post_type_archive_link( 'press-items' ) ?>" class="green-button">See More</a>
                    </div>

                    <!-- <a class="green-button" href=<?php echo get_post_type_archive_link( 'press-items' ) ?>>See More</a> -->
                </section>

		</main><!-- #main -->
    </div><!-- #primary -->
    
  

        
<?php get_footer(); ?>
