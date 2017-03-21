<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kurama
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kurama' ); ?></a>
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	
	<div class="full-head">
	<div id='top-bar-wrapper'>
		<div id="top-bar">
		
			<div id="search-form" class="col-md-3 col-sm-12">
				<?php get_search_form(); ?>
			</div>	
			
			<div id="top-menu" class="col-md-9 col-sm-12 title-font">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
			<div id="mobile-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
			</div>		
	
		</div>
	</div>
	<div id="head" class="container-fluid">
		<header id="masthead" class="site-header col-md-3 col-sm-5 col-xs-12" role="banner">
			<div class="site-branding">
				<?php if ( kurama_has_logo() ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php kurama_logo(); ?></a>
				</div>
				<?php endif; ?>
				<div id="text-title-desc">
				<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>		
			
			<div id="social-icons">
				<?php get_template_part('social', 'fa'); ?>
			</div>
		
		</header><!-- #masthead -->
		
		<div id="header-image" class="col-md-9 col-sm-7 col-xs-12">
			<?php if ( is_single() && has_post_thumbnail() && (get_theme_mod('kurama_featimg','replace') == 'replace' ) ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif; ?>
		</div>
		
	</div>	
	</div>
	<?php get_template_part('featured', 'area1'); ?>
	
	
	<div class="mega-container">
	
		<?php do_action('kurama-before_content'); ?>				
	
		<div id="content" class="site-content container">
	