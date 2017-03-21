<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_showcase( $wp_customize ) {

	//CUSTOM SHOWCASE
	$wp_customize->add_panel( 'kurama_showcase_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Custom Showcase','kurama'),
	) );
	
	$wp_customize->add_section(
	    'kurama_sec_showcase_options',
	    array(
	        'title'     => __('Enable/Disable','kurama'),
	        'priority'  => 0,
	        'panel'     => 'kurama_showcase_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_showcase_title',
		array( 'sanitize_callback' => 'kurama_sanitize_text' )
	);
	
	$wp_customize->add_control(
			'kurama_showcase_title', array(
		    'settings' => 'kurama_showcase_title',
		    'label'    => __( 'Showcase Title', 'kurama' ),
		    'section'  => 'kurama_sec_showcase_options',
		    'type'     => 'text',
		)
	);
		
	$wp_customize->add_setting(
		'kurama_showcase_enable',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_showcase_enable', array(
		    'settings' => 'kurama_showcase_enable',
		    'label'    => __( 'Enable Showcase on Home/Blog.', 'kurama' ),
		    'section'  => 'kurama_sec_showcase_options',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_showcase_enable_front',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_showcase_enable_front', array(
		    'settings' => 'kurama_showcase_enable_front',
		    'label'    => __( 'Enable Showcase on Front Page.', 'kurama' ),
		    'section'  => 'kurama_sec_showcase_options',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_showcase_enable_posts',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_showcase_enable_posts', array(
		    'settings' => 'kurama_showcase_enable_posts',
		    'label'    => __( 'Enable Showcase on All Posts.', 'kurama' ),
		    'section'  => 'kurama_sec_showcase_options',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_showcase_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_showcase_priority', array(
		    'settings' => 'kurama_showcase_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_sec_showcase_options',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);
	
	for ( $i = 1 ; $i <= 4 ; $i++ ) :
		
		//Create the settings Once, and Loop through it.
		$wp_customize->add_section(
		    'kurama_showcase_sec'.$i,
		    array(
		        'title'     => __('ShowCase ','kurama').$i,
		        'priority'  => $i,
		        'panel'     => 'kurama_showcase_panel',
		        
		    )
		);	
		
		$wp_customize->add_setting(
			'kurama_showcase_img'.$i,
			array( 'sanitize_callback' => 'esc_url_raw' )
		);
		
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'kurama_showcase_img'.$i,
		        array(
		            'label' => '',
		            'section' => 'kurama_showcase_sec'.$i,
		            'settings' => 'kurama_showcase_img'.$i,			       
		        )
			)
		);
		
		$wp_customize->add_setting(
			'kurama_showcase_title'.$i,
			array( 'sanitize_callback' => 'sanitize_text_field' )
		);
		
		$wp_customize->add_control(
				'kurama_showcase_title'.$i, array(
			    'settings' => 'kurama_showcase_title'.$i,
			    'label'    => __( 'Showcase Title','kurama' ),
			    'section'  => 'kurama_showcase_sec'.$i,
			    'type'     => 'text',
			)
		);
		
		$wp_customize->add_setting(
			'kurama_showcase_desc'.$i,
			array( 'sanitize_callback' => 'sanitize_text_field' )
		);
		
		$wp_customize->add_control(
				'kurama_showcase_desc'.$i, array(
			    'settings' => 'kurama_showcase_desc'.$i,
			    'label'    => __( 'Showcase Description','kurama' ),
			    'section'  => 'kurama_showcase_sec'.$i,
			    'type'     => 'text',
			)
		);
		
		
		$wp_customize->add_setting(
			'kurama_showcase_url'.$i,
			array( 'sanitize_callback' => 'esc_url_raw' )
		);
		
		$wp_customize->add_control(
				'kurama_showcase_url'.$i, array(
			    'settings' => 'kurama_showcase_url'.$i,
			    'label'    => __( 'Target URL','kurama' ),
			    'section'  => 'kurama_showcase_sec'.$i,
			    'type'     => 'url',
			)
		);
		
	endfor;	

}
	
add_action( 'customize_register', 'kurama_customize_register_showcase' );