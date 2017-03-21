<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_wc( $wp_customize ) {

	//WOOCOMMERCE ENABLED STUFF
	if ( class_exists('woocommerce') ) :
	// CREATE THE fcp PANEL
	$wp_customize->add_panel( 'kurama_fcp_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => 'Featured Product Showcase',
	    'description'    => '',
	) );
	
	
	//SQUARE BOXES
	$wp_customize->add_section(
	    'kurama_fc_boxes',
	    array(
	        'title'     => __('Square Boxes','kurama'),
	        'priority'  => 10,
	        'panel'     => 'kurama_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_box_enable',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_box_enable', array(
		    'settings' => 'kurama_box_enable',
		    'label'    => __( 'Enable Square Boxes & Posts Slider.', 'kurama' ),
		    'section'  => 'kurama_fc_boxes',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_box_enable_front',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_box_enable_front', array(
		    'settings' => 'kurama_box_enable_front',
		    'label'    => __( 'Enable on Static Front Page', 'kurama' ),
		    'section'  => 'kurama_fc_boxes',
		    'type'     => 'checkbox',
		)
	);
	
 
	$wp_customize->add_setting(
		'kurama_box_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_box_title', array(
		    'settings' => 'kurama_box_title',
		    'label'    => __( 'Title for the Boxes','kurama' ),
		    'section'  => 'kurama_fc_boxes',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'kurama_box_cat',
	    array( 'sanitize_callback' => 'kurama_sanitize_product_category' )
	);
	
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Product_Category_Control(
	        $wp_customize,
	        'kurama_box_cat',
	        array(
	            'label'    => __('Product Category.','kurama'),
	            'settings' => 'kurama_box_cat',
	            'section'  => 'kurama_fc_boxes'
	        )
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_box_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_box_priority', array(
		    'settings' => 'kurama_box_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_fc_boxes',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);
	
		
	//SLIDER
	$wp_customize->add_section(
	    'kurama_fc_slider',
	    array(
	        'title'     => __('3D Cube Products Slider','kurama'),
	        'priority'  => 10,
	        'panel'     => 'kurama_fcp_panel',
	        'description' => 'This is the Posts Slider, displayed left to the square boxes.',
	    )
	);
	
	
	$wp_customize->add_setting(
		'kurama_slider_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_slider_title', array(
		    'settings' => 'kurama_slider_title',
		    'label'    => __( 'Title for the Slider', 'kurama' ),
		    'section'  => 'kurama_fc_slider',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_slider_count',
		array( 'sanitize_callback' => 'kurama_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'kurama_slider_count', array(
		    'settings' => 'kurama_slider_count',
		    'label'    => __( 'No. of Posts(Min:3, Max: 10)', 'kurama' ),
		    'section'  => 'kurama_fc_slider',
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
		    'kurama_slider_cat',
		    array( 'sanitize_callback' => 'kurama_sanitize_product_category' )
		);
		
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Product_Category_Control(
	        $wp_customize,
	        'kurama_slider_cat',
	        array(
	            'label'    => __('Category For Slider.','kurama'),
	            'settings' => 'kurama_slider_cat',
	            'section'  => 'kurama_fc_slider'
	        )
	    )
	);
	
	
	
	//COVERFLOW
	
	$wp_customize->add_section(
	    'kurama_fc_coverflow',
	    array(
	        'title'     => __('Top CoverFlow Slider','kurama'),
	        'priority'  => 5,
	        'panel'     => 'kurama_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_coverflow_enable',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_coverflow_enable', array(
		    'settings' => 'kurama_coverflow_enable',
		    'label'    => __( 'Enable', 'kurama' ),
		    'section'  => 'kurama_fc_coverflow',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_coverflow_enable_front',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_coverflow_enable_front', array(
		    'settings' => 'kurama_coverflow_enable_front',
		    'label'    => __( 'Enable on Static Front Page', 'kurama' ),
		    'section'  => 'kurama_fc_coverflow',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'kurama_coverflow_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_coverflow_title', array(
		    'settings' => 'kurama_coverflow_title',
		    'label'    => __( 'Title for the Coverflow', 'kurama' ),
		    'section'  => 'kurama_fc_coverflow',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		    'kurama_coverflow_cat',
		    array( 'sanitize_callback' => 'kurama_sanitize_product_category' )
		);
	
		
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Product_Category_Control(
	        $wp_customize,
	        'kurama_coverflow_cat',
	        array(
	            'label'    => __('Category For Image Grid','kurama'),
	            'settings' => 'kurama_coverflow_cat',
	            'section'  => 'kurama_fc_coverflow'
	        )
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_coverflow_pc',
		array( 'sanitize_callback' => 'kurama_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'kurama_coverflow_pc', array(
		    'settings' => 'kurama_coverflow_pc',
		    'label'    => __( 'Max No. of Posts in the Grid. Min: 5.', 'kurama' ),
		    'section'  => 'kurama_fc_coverflow',
		    'type'     => 'number',
		    'default'  => '0'
		)
	);
	
	$wp_customize->add_setting(
		'kurama_coverflow_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_coverflow_priority', array(
		    'settings' => 'kurama_coverflow_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_fc_coverflow',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);
	
	endif; //end class exists woocommerce

}
	
add_action( 'customize_register', 'kurama_customize_register_wc' );