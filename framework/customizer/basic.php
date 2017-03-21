<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_basic( $wp_customize ) {
	
	//Basic Theme Settings
	$wp_customize->add_section( 'kurama_basic_settings' , array(
	    'title'      => __( 'Basic Settings', 'kurama' ),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'kurama_blog_title' , array(
	    'default'     => 'Latest Posts',
	    'sanitize_callback' => 'kurama_sanitize_text',
	) );
	
	$wp_customize->add_control(	   
        'kurama_blog_title',
        array(
            'label' => __('Title For Blog Posts on Homepage.','kurama'),
            'section' => 'kurama_basic_settings',
            'settings' => 'kurama_blog_title',
            'priority' => 5,
            'type' => 'text',
        )
	);
	
	$wp_customize->add_setting( 'kurama_menu_text' , array(
	    'default'     => 'Browse...',
	    'sanitize_callback' => 'kurama_sanitize_text',
	) );
	
	$wp_customize->add_control(	   
        'kurama_menu_text',
        array(
            'label' => __('Title Menu Button on Mobile Phones.','kurama'),
            'section' => 'kurama_basic_settings',
            'settings' => 'kurama_menu_text',
            'priority' => 5,
            'type' => 'text',
        )
	);

	
	$wp_customize->add_setting( 'kurama_disable_nextprev' , array(
	    'default'     => true,
	    'sanitize_callback' => 'kurama_sanitize_checkbox',
	) );
	
	
	
	$wp_customize->add_control(	   
        'kurama_disable_nextprev',
        array(
            'label' => 'Disable Next/Prev Posts on Single Posts.',
            'description' => 'This will Remove the the link to next and previous posts on all posts.',
            'section' => 'kurama_basic_settings',
            'settings' => 'kurama_disable_nextprev',
            'priority' => 5,
            'type' => 'checkbox',
        )
	);
	
	//Logo Section Related
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Title, Tagline & Logo', 'kurama' );
	
	
	$wp_customize->add_setting( 'kurama_logo_resize' , array(
	    'default'     => 100,
	    'sanitize_callback' => 'kurama_sanitize_positive_number',
	) );
	
	$wp_customize->add_control(
	        'kurama_logo_resize',
	        array(
	            'label' => __('Resize & Adjust Logo','kurama'),
	            'section' => 'title_tagline',
	            'settings' => 'kurama_logo_resize',
	            'priority' => 6,
	            'type' => 'range',
	            'active_callback' => 'kurama_logo_enabled',
	            'input_attrs' => array(
			        'min'   => 30,
			        'max'   => 200,
			        'step'  => 5,
			    ),
	        )
	);
	
	function kurama_logo_enabled($control) {
		$option = $control->manager->get_setting('custom_logo');
		return $option->value() == true;
	}
	
}
add_action( 'customize_register', 'kurama_customize_register_basic' );
