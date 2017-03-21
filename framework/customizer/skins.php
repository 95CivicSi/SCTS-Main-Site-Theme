<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_skins( $wp_customize ) {

	//Replace Header Text Color with, separate colors for Title and Description
	//Override kurama_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_setting('header_textcolor');

	$wp_customize->add_setting('kurama_site_titlecolor', array(
	    'default'     => '#d09c3c',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_site_titlecolor', array(
			'label' => __('Site Title Color','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('kurama_header_desccolor', array(
	    'default'     => '#eee',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_header_desccolor', array(
			'label' => __('Site Tagline Color','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	//Select the Default Theme Skin
	$wp_customize->add_section(
	    'kurama_skin_options',
	    array(
	        'title'     => __('Theme Skin & Colors','kurama'),
	        'priority'  => 39,
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_skin',
		array(
			'default'=> 'default',
			'sanitize_callback' => 'kurama_sanitize_skin' 
			)
	);
	
	$skins = array( 'default' => __('Default (Brown)','kurama'),
					'orange' =>  __('Orange','kurama'),
					'darkblue' => __('Dark Blue','kurama'),
					'grayscale' => __('Grayscale','kurama'),
					'slick' => __('Slick','kurama'),
					'brie' => __('Brie','kurama'),
					'custom' => __('BUILD CUSTOM SKIN','kurama'),
					);
	
	$wp_customize->add_control(
		'kurama_skin',array(
				'settings' => 'kurama_skin',
				'section'  => 'kurama_skin_options',
				'label' => __('Choose from the Skins Below','kurama'),
				'type' => 'select',
				'choices' => $skins,
			)
	);
	
	function kurama_sanitize_skin( $input ) {
		if ( in_array($input, array('default','orange','brown','green','grayscale','custom', 'blue', 'darkblue','yellow','slick','brie','custom') ) )
			return $input;
		else
			return '';
	}
	
	//CUSTOM SKIN BUILDER
	
	$wp_customize->add_setting('kurama_skin_var_background', array(
	    'default'     => '#FFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_background', array(
			'label' => __('Primary Background','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_background',
			'active_callback' => 'kurama_skin_custom',
			'type' => 'color'
		) ) 
	);
	
	
	$wp_customize->add_setting('kurama_skin_var_accent', array(
	    'default'     => '#3f1c18',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_accent', array(
			'label' => __('Primary Accent','kurama'),
			'description' => __('For Most Users, Changing this only color is sufficient. It is recommended to use <strong>darker</strong> shades of colors.','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_accent',
			'type' => 'color',
			'active_callback' => 'kurama_skin_custom',
		) ) 
	);
	
	$wp_customize->add_setting('kurama_skin_var_onaccent', array(
	    'default'     => '#d8a33e',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_onaccent', array(
			'label' => __('Contrast (On Accent)','kurama'),
			'description' => __('If Accent is Light, this should be dark & vice-versa. This is the Text Color, for places where background color is primary accent.','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_onaccent',
			'type' => 'color',
			'active_callback' => 'kurama_skin_custom',
		) ) 
	);
	
	
/*  To Be added in Future
	$wp_customize->add_setting('kurama_skin_var_headerbg', array(
	    'default'     => '#3f1c18',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_headerbg', array(
			'label' => __('Header Background','kurama'),
			'description' => __('Background color of the header region.','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_headerbg',
			'type' => 'color',
			'active_callback' => 'kurama_skin_custom',
		) ) 
	);
	
	$wp_customize->add_setting('kurama_skin_var_headercolor', array(
	    'default'     => '#d8a33e',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_headercolor', array(
			'label' => __('Header Text Color.','kurama'),
			'description' => __('Color Of Items on header like Top Menu, Social Icons, etc.','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_headercolor',
			'type' => 'color',
			'active_callback' => 'kurama_skin_custom',
		) ) 
	);	
*/
	
	
	$wp_customize->add_setting('kurama_skin_var_content', array(
	    'default'     => '#8e8f77',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_content', array(
			'label' => __('Content Color','kurama'),
			'description' => __('Must be Dark, like Black or Dark grey. Any darker color is acceptable.','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_content',
			'active_callback' => 'kurama_skin_custom',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('kurama_skin_var_footerbg', array(
	    'default'     => '#fcfeed',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'kurama_skin_var_footerbg', array(
			'label' => __('Footer Background','kurama'),
			'description' => __('Background color of Footer Widget Area. The color should be in same tone as the background so that text is visible.','kurama'),
			'section' => 'kurama_skin_options',
			'settings' => 'kurama_skin_var_footerbg',
			'active_callback' => 'kurama_skin_custom',
			'type' => 'color'
		) ) 
	);
	
	function kurama_skin_custom( $control ) {
		$option = $control->manager->get_setting('kurama_skin');
	    return $option->value() == 'custom' ;
	}

}
	
add_action( 'customize_register', 'kurama_customize_register_skins' );