<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_wpf( $wp_customize ) {

	//Extra Panel for Users, who dont have WooCommerce	
	// CREATE THE fcp PANEL
	$wp_customize->add_panel( 'kurama_a_fcp_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Featured Posts Area','kurama'),
	    'description'    => '',
	) );
	
	//FEATURED AREA 1
	$wp_customize->add_section(
	    'kurama_fc_section',
	    array(
	        'title'     => __('Featured Area 1 (Just Below Header)','kurama'),
	        'priority'  => 10,
	        'panel'     => 'kurama_a_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_farea1_enable',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_farea1_enable', array(
		    'settings' => 'kurama_farea1_enable',
		    'label'    => __( 'Enable Featured Area 1.', 'kurama' ),
		    'section'  => 'kurama_fc_section',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_farea1_enable_posts',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_farea1_enable_posts', array(
		    'settings' => 'kurama_farea1_enable_posts',
		    'label'    => __( 'Enable on All posts.', 'kurama' ),
		    'section'  => 'kurama_fc_section',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_farea1_enable_pages',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_farea1_enable_pages', array(
		    'settings' => 'kurama_farea1_enable_pages',
		    'label'    => __( 'Enable on all Pages', 'kurama' ),
		    'section'  => 'kurama_fc_section',
		    'type'     => 'checkbox',
		)
	);
	 
 	$wp_customize->add_setting(
	    'kurama_farea1_cat',
	    array( 'sanitize_callback' => 'kurama_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Category_Control(
	        $wp_customize,
	        'kurama_farea1_cat',
	        array(
	            'label'    => __('Category.','kurama'),
	            'settings' => 'kurama_farea1_cat',
	            'section'  => 'kurama_fc_section'
	        )
	    )
	);
	
/*
	$wp_customize->add_setting(
		'kurama_farea1_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_farea1_priority', array(
		    'settings' => 'kurama_farea1_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_fc_section',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);
*/
	
	
	//SQUARE BOXES
	$wp_customize->add_section(
	    'kurama_a_fc_section',
	    array(
	        'title'     => __('Square Boxes','kurama'),
	        'priority'  => 10,
	        'panel'     => 'kurama_a_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_a_box_enable',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_a_box_enable', array(
		    'settings' => 'kurama_a_box_enable',
		    'label'    => __( 'Enable Square Boxes & Posts Slider.', 'kurama' ),
		    'section'  => 'kurama_a_fc_section',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_a_box_enable_front',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_a_box_enable_front', array(
		    'settings' => 'kurama_a_box_enable_front',
		    'label'    => __( 'Enable on static front page.', 'kurama' ),
		    'section'  => 'kurama_a_fc_section',
		    'type'     => 'checkbox',
		)
	);

	
 
	$wp_customize->add_setting(
		'kurama_a_box_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_a_box_title', array(
		    'settings' => 'kurama_a_box_title',
		    'label'    => __( 'Title for the Boxes','kurama' ),
		    'section'  => 'kurama_a_fc_section',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'kurama_a_box_cat',
	    array( 'sanitize_callback' => 'kurama_sanitize_product_category' )
	);
	
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Category_Control(
	        $wp_customize,
	        'kurama_a_box_cat',
	        array(
	            'label'    => __('Posts Category.','kurama'),
	            'settings' => 'kurama_a_box_cat',
	            'section'  => 'kurama_a_fc_section'
	        )
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_a_box_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_a_box_priority', array(
		    'settings' => 'kurama_a_box_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_a_fc_section',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);
		
	//SLIDER
	$wp_customize->add_section(
	    'kurama_a_fc_slider',
	    array(
	        'title'     => __('3D Cube Posts Slider','kurama'),
	        'priority'  => 10,
	        'panel'     => 'kurama_a_fcp_panel',
	        'description' => 'This is the Posts Slider, displayed left to the square boxes.',
	    )
	);
	
	
	$wp_customize->add_setting(
		'kurama_a_slider_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_a_slider_title', array(
		    'settings' => 'kurama_a_slider_title',
		    'label'    => __( 'Title for the Slider', 'kurama' ),
		    'section'  => 'kurama_a_fc_slider',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_a_slider_count',
		array( 'sanitize_callback' => 'kurama_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'kurama_a_slider_count', array(
		    'settings' => 'kurama_a_slider_count',
		    'label'    => __( 'No. of Posts(Min:3, Max: 10)', 'kurama' ),
		    'section'  => 'kurama_a_fc_slider',
		    'type'     => 'range',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 10,
		        'step'  => 1,
		        'class' => 'test-class test',
		        'style' => 'color: #0a0',
		    ),
		)
	);
		
	$wp_customize->add_setting(
		    'kurama_a_slider_cat',
		    array( 'sanitize_callback' => 'kurama_sanitize_product_category' )
		);
		
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Category_Control(
	        $wp_customize,
	        'kurama_a_slider_cat',
	        array(
	            'label'    => __('Category For Slider.','kurama'),
	            'settings' => 'kurama_a_slider_cat',
	            'section'  => 'kurama_a_fc_slider'
	        )
	    )
	);
	
	
	
	//COVERFLOW
	
	$wp_customize->add_section(
	    'kurama_a_fc_coverflow',
	    array(
	        'title'     => __('Top CoverFlow Slider','kurama'),
	        'priority'  => 5,
	        'panel'     => 'kurama_a_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_a_coverflow_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_a_coverflow_title', array(
		    'settings' => 'kurama_a_coverflow_title',
		    'label'    => __( 'Title for the Coverflow', 'kurama' ),
		    'section'  => 'kurama_a_fc_coverflow',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_a_coverflow_enable',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_a_coverflow_enable', array(
		    'settings' => 'kurama_a_coverflow_enable',
		    'label'    => __( 'Enable on Home/Blog.', 'kurama' ),
		    'section'  => 'kurama_a_fc_coverflow',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_a_coverflow_enable_front',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_a_coverflow_enable_front', array(
		    'settings' => 'kurama_a_coverflow_enable_front',
		    'label'    => __( 'Enable on static front page', 'kurama' ),
		    'section'  => 'kurama_a_fc_coverflow',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		    'kurama_a_coverflow_cat',
		    array( 'sanitize_callback' => 'kurama_sanitize_category' )
		);
	
		
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Category_Control(
	        $wp_customize,
	        'kurama_a_coverflow_cat',
	        array(
	            'label'    => __('Category For Image Grid','kurama'),
	            'settings' => 'kurama_a_coverflow_cat',
	            'section'  => 'kurama_a_fc_coverflow'
	        )
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_a_coverflow_pc',
		array( 'sanitize_callback' => 'kurama_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'kurama_a_coverflow_pc', array(
		    'settings' => 'kurama_a_coverflow_pc',
		    'label'    => __( 'Max No. of Posts in the Grid. Min: 5.', 'kurama' ),
		    'section'  => 'kurama_a_fc_coverflow',
		    'type'     => 'number',
		    'default'  => '0'
		)
	);
	
	$wp_customize->add_setting(
		'kurama_a_coverflow_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_a_coverflow_priority', array(
		    'settings' => 'kurama_a_coverflow_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_a_fc_coverflow',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);

}
	
add_action( 'customize_register', 'kurama_customize_register_wpf' );