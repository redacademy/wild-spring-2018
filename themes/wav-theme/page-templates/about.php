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

            <div class="anchor" id="aboutJump"></div>
           
            <section class="aboutWav">

                <h1>About WAV</h1>

                <div class="header-img-container">
                    <img class="header-img" src="<?php echo CFS()->get( 'about_wav_img' ); ?>"> 
                </div>

                <p><?php echo CFS()->get( 'about_wav' ); ?></p>

                <a href="#">Read about Wild About Vancouver's Goals</a>
                
                <div class="videoAboutWav"> <!--Container for a video-->

                <div><?php echo CFS()->get('video_about_test');?></div>

                    <p><?php echo CFS()->get( 'text_about_video' ); ?></p>
                </div>

                
            </section><!--end of aboutWav-->

            <div class="anchor" id="festivalJump"></div>
            <section class="ourFestival">
            
                <h1>Our Festival</h1>
                <div class="header-img-container">
                    <img class="header-img" src="<?php echo CFS()->get( 'our_festival_img' ); ?>">
                </div>
                <p><?php echo CFS()->get( 'our_festival' ); ?></p>

                <div class="center-button">
                    <a href="#" class="green-button">More Information</a>
                </div>  
            </section>

            <div class="anchor" id="teamJump"></div>
            <section class="theTeam">
                <h1>The Team</h1>
                    <div class="teamMembers carousel">

                        <?php
                            $args = array( 'post_type' => 'person', 'category_name' => 'team', 'order' => 'ASC', 'numberposts'=>-1);
                            $team_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $team_posts as $post ) : setup_postdata( $post ); ?>
                    
                            <div class="teamMember carousel-cell">
                                <header class="entry-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink()) ?>" alt="Team Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header>
                                
     
                            </div><!--end of teamMember-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of teamMembers-->
                    <a class="hidden-mobile">See More</a>
                </section>

                <div class="anchor" id="collaboratorsJump"></div>
    
                    <section class="collaborators">
                        <h1>Collaborators</h1>
                        <div class="collaborators carousel">

                        <?php
                            $args = array( 'post_type' => 'person', 'category_name' => 'collaborator', 'order' => 'ASC', 'numberposts'=>-1);
                            $collaborators_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $collaborators_posts as $post ) : setup_postdata( $post ); ?>
                    
                            <div class="collaborator carousel-cell">
                                <header class="entry-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink()) ?>" alt="Team Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header>
                                
     
                            </div><!--end of collaborator-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of collaborators-->

                </section>

                <div class="anchor" id="workJump"></div>
                    <h1>Work</h1>
                        

                        <section class="festivals">
                        <h2>Festival History</h2>
                        <div class="festivals carousel">

                        <?php
                            $args = array( 'post_type' => 'festival', 'order' => 'ASC', 'numberposts'=>-1);
                            $festival_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $festival_posts as $post ) : setup_postdata( $post ); ?>
                    
                            <div class="festival carousel-cell">
                                <header class="entry-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink()) ?>" alt="Festival Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header>
                                
     
                            </div><!--end of collaborator-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of collaborators-->

                </section>

                  <section class="schoolOutreach">
                        <h2>School Outreach</h2>
                        <div class="schoolOutreach">

                        <?php
                            $args = array( 'post_type' => 'post', 'category'=>'school-outreach', 'order' => 'ASC', 'numberposts'=>-1);
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
                        <div class="press carousel">

                        <?php
                            $args = array( 'post_type' => 'press-item', 'order' => 'ASC', 'numberposts'=>-1);
                            $press_posts = get_posts( $args ); // returns an array of posts
                        ?>

                        <?php foreach ( $press_posts as $post ) : setup_postdata( $post ); ?>
                    
                            <div class="pressItem carousel-cell">
                                <header class="entry-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink()) ?>" alt="Press Image"><?php the_post_thumbnail( 'large' ); ?></a>
                                    <?php endif; ?>

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header>
                                <div class="hidden-mobile">
                                    <p><?php echo CFS()->get( 'source' ); ?></p>
                                    <p><?php echo CFS()->get( 'date' ); ?></p>
                                </div>
                                
     
                            </div><!--end of pressItem-->
                            <?php endforeach; wp_reset_postdata(); ?>
                    </div><!--end of press-->

                </section>

                   
		</main><!-- #main -->
    </div><!-- #primary -->
    
    <section class="events">
                <h2>Upcoming Events</h2>
                <!-- <div class="tribe_event-container"> -->
                <div class="events-container carousel">
                <!-- // the loop for events as per documentation -->
           <?php
           $args = array(//array to get the upcoming events, only three of them
			'posts_per_page' => -1,
			'orderby' => 'date',
            'order' => 'ASC'
        
        );

        $tagArgs = array(
            'label' => '',
            'separator' =>', '
        );
            $events = tribe_get_events($args);
            $tags = tribe_meta_event_tags($tagArgs);

            // $tags = tribe_meta_event_tags ($label = null, $separator = ’, ’, $echo = true );

            if ( empty( $events ) ) {
                echo('Sorry, nothing found.');
            }
            
            else foreach( $events as $event ) {
                // print_r($event);
                var_dump($tags);

              
                echo ('<p>' . tribe_meta_event_tags(sprintf(__('%s Tags:', 'the-events-calendar'), tribe_get_event_label_singular()), ', ', false) . 'HIPPOCATS</p>');
                
               
                echo('<article class="event-post-single carousel-cell">');
                echo('<div><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_post_thumbnail( $event, 'large').'</a></div>');
                echo('<h3 class="entry-title"><a href="'.esc_url( get_permalink($event) ).'" rel="bookmark">'.get_the_title( $event).'</a></h3>' );
                echo('<p>'.$event->post_content.'</p>');
                echo('<p>'.tribe_get_start_date( $event).'<p>');
                echo('</article>');
            }
            ?>
				</div><!-- events-container -->
                 <div class="button yellow-button">
                        <a href="#">create events</a>
                </div>
                 <div class="button blue-button">
          				<a href=<?php echo get_post_type_archive_link( 'tribe_event' ) ?>>find events &rsaquo;</a>
				</div>
    </section><!--end of events section-->

        
<?php get_footer(); ?>
