<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_fn( $wp_customize ) {

	//FEATURED NEWS	
	$wp_customize->add_panel( 'kurama_fn_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Featured News Sections','kurama'),
	) );
		
	
	for ($f = 1; $f < 4; $f++) {
		
		$wp_customize->add_section(
		    'kurama_a_fn_boxes'.$f,
		    array(
		        'title'     => __('Featured News Area '.$f,'kurama'),
		        'priority'  => 20,
		        'panel' => 'kurama_fn_panel',
		    )
		);
		
		$wp_customize->add_setting(
			'kurama_fn_enable'.$f,
			array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
		);
		
		$wp_customize->add_control(
				'kurama_fn_enable'.$f, array(
			    'settings' => 'kurama_fn_enable'.$f,
			    'label'    => __( 'Enable Featured News on Blog/Home.', 'kurama' ),
			    'section'  => 'kurama_a_fn_boxes'.$f,
			    'type'     => 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'kurama_fn_enable_posts'.$f,
			array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
		);
		
		$wp_customize->add_control(
				'kurama_fn_enable_posts'.$f, array(
			    'settings' => 'kurama_fn_enable_posts'.$f,
			    'label'    => __( 'Enable On All Posts', 'kurama' ),
			    'section'  => 'kurama_a_fn_boxes'.$f,
			    'type'     => 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'kurama_fn_enable_front'.$f,
			array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
		);
		
		$wp_customize->add_control(
				'kurama_fn_enable_front'.$f, array(
			    'settings' => 'kurama_fn_enable_front'.$f,
			    'label'    => __( 'Enable on Static Front Page', 'kurama' ),
			    'section'  => 'kurama_a_fn_boxes'.$f,
			    'type'     => 'checkbox',
			)
		);
		
	 
		$wp_customize->add_setting(
			'kurama_fn_title'.$f,
			array( 'sanitize_callback' => 'sanitize_text_field' )
		);
		
		$wp_customize->add_control(
				'kurama_fn_title'.$f, array(
			    'settings' => 'kurama_fn_title'.$f,
			    'label'    => __( 'Title','kurama' ),
			    'description'    => __( 'Leave Blank to disable','kurama' ),
			    'section'  => 'kurama_a_fn_boxes'.$f,
			    'type'     => 'text',
			)
		);
	 
	 	$wp_customize->add_setting(
		    'kurama_fn_cat'.$f,
		    array( 'sanitize_callback' => 'kurama_sanitize_category' )
		);
		
		$wp_customize->add_control(
		    new Kurama_WP_Customize_Category_Control(
		        $wp_customize,
		        'kurama_fn_cat'.$f,
		        array(
		            'label'    => __('Posts Category.','kurama'),
		            'settings' => 'kurama_fn_cat'.$f,
		            'section'  => 'kurama_a_fn_boxes'.$f
		        )
		    )
		);
		
		$wp_customize->add_setting(
		'kurama_fn'.$f.'_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
		);
		
		$wp_customize->add_control(
				'kurama_fn'.$f.'_priority', array(
			    'settings' => 'kurama_fn'.$f.'_priority',
			    'label'    => __( 'Priority', 'kurama' ),
			    'section'  => 'kurama_a_fn_boxes'.$f,
			    'type'     => 'number',
			    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
			)
		);
		
	} //endfor

}
	
add_action( 'customize_register', 'kurama_customize_register_fn' );