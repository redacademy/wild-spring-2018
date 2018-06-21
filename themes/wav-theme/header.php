<?php
/**
 * The header for our theme.
 *
 * @package WAV_Starter_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>

			<header id="masthead" class="site-header" role="banner">
				<!-- <div class="header-container"> -->
				<div class="site-branding">
				<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logos/wav-logo-white.svg'; ?>" class="logo-tent" alt="Inhabitent Logo" />
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logos/wav-logo.svg'; ?>" class="logo-tent2" alt="Inhabitent Logo" />
						</a>	
					<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div><!-- .site-branding -->

				<div class="menu-toggle">

					<button class="hamburger hamburger--collapse" type="button" aria-expanded="false" aria-controls="primary-menu">
					<?php esc_html('Primary Menu');?>
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
						<span class="hamburger-label"></span>
					</button>

				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">

						<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu'));?>
						<div class="social-nav">
							<p class="social-nav-menu">Stay Up To Date</p>
							<?php get_sidebar(); ?>
						</div>

				</nav><!-- #site-navigation -->
<!-- </div> -->
			</header><!-- #masthead -->

			<div id="content" class="site-content">
