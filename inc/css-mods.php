<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function kurama_custom_css_mods() {

	echo "<style id='custom-css-mods'>";
	
	
	//If Menu Description is Disabled.
	if ( !has_nav_menu('primary') || get_theme_mod('kurama_disable_nav_desc') ) :
		echo "#site-navigation ul li a { padding: 16px 12px; }";
	endif;
	
	
	//Exception: IMage transform origin should be left on Left Alignment, i.e. Default
	if ( !get_theme_mod('kurama_center_logo') ) :
		echo "#masthead #site-logo img { transform-origin: left; }";
	endif;	
	
	if ( get_theme_mod('kurama_title_font') ) :
		echo ".title-font, h1, h2, .section-title, .woocommerce ul.products li.product h3 { font-family: ".esc_html( get_theme_mod('kurama_title_font','Lato') )."; }";
	endif;
	
	if ( get_theme_mod('kurama_body_font') ) :
		echo "body { font-family: ".esc_html( get_theme_mod('kurama_body_font','Open Sans') )."; }";
	endif;
	
	if ( get_theme_mod('kurama_site_titlecolor') ) :
		echo "#masthead h1.site-title a { color: ".esc_html( get_theme_mod('kurama_site_titlecolor', '#333') )."; }";
	endif;
	
	
	if ( get_theme_mod('kurama_header_desccolor','#777777') ) :
		echo "#masthead h2.site-description { color: ".esc_html( get_theme_mod('kurama_header_desccolor','#777777') )."; }";
	endif;
	//Check Jetpack is active
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) )
		echo '.pagination { display: none; }';
		
	if ( get_theme_mod('kurama_sidebar_loc') == 'left' ) :
		echo "#secondary { float: left; }#primary,#primary-mono { float: right; }";
	endif;	
	
	if ( get_theme_mod('kurama_site_layout') == 'boxed' ) :
		echo "#page { max-width: 1170px; margin: 20px auto; } @media screen and (min-width: 992px) { #top-bar { padding: 3px 10px; } #top-bar .social-icons { margin-right: 15px; } }";
	endif;	
	
	wp_reset_postdata();	
	if ( get_post_meta( get_the_ID(), 'hide-title', true ) ):
		echo "#primary-mono h1.entry-title, .template-entry-title { display: none; }";
	endif;
	wp_reset_postdata();	
	
	if ( get_theme_mod('kurama_logo_resize') ) :
		$val = esc_html( get_theme_mod('kurama_logo_resize') )/100;
		echo "#masthead .custom-logo { transform-origin: center; transform: scale(".$val."); -webkit-transform: scale(".$val."); -moz-transform: scale(".$val."); -ms-transform: scale(".$val."); }";
		endif;

	echo "</style>";
}

add_action('wp_head', 'kurama_custom_css_mods');