<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_layouts( $wp_customize ) {

	// Layout and Design
	$wp_customize->add_panel( 'kurama_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','kurama'),
	) );
	
	//Featured Image Setting
	$wp_customize->add_section( 'kurama_posts_page' , array(
	    'title'      => __( 'Posts Title & Featured Image Settings', 'kurama' ),
	    'priority'   => 31,
	    'panel' => 'kurama_design_panel'
	) );
	
	
	$wp_customize->add_setting(
		'kurama_featimg',
		array( 'default' => 'replace' ,'sanitize_callback' => 'kurama_sanitize_featimg_layout' )
	);
	
	function kurama_sanitize_featimg_layout( $input ) {
		if ( in_array($input, array('replace','noreplace') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'kurama_featimg',array(
				'label' => __('Header Image on Posts Page.','kurama'),
				'description' => __('If You set Featured Image as the header, then your title will display overlapping the featured Image. Please do not use this layout if you do not plan on using Featured images for your website.','kurama'),
				'settings' => 'kurama_featimg',
				'section'  => 'kurama_posts_page',
				'type' => 'select',
				'choices' => array(
						'replace' => __('Featured Image as Header','kurama'),
						'noreplace' => __('Original Header Image','kurama'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'kurama_site_layout_sec',
	    array(
	        'title'     => __('Site Layout','kurama'),
	        'priority'  => 0,
	        'panel'     => 'kurama_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_site_layout',
		array( 'sanitize_callback' => 'kurama_sanitize_site_layout' )
	);
	
	function kurama_sanitize_site_layout( $input ) {
		if ( in_array($input, array('full','boxed') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'kurama_site_layout',array(
				'label' => __('Select Layout','kurama'),
				'settings' => 'kurama_site_layout',
				'section'  => 'kurama_site_layout_sec',
				'type' => 'select',
				'choices' => array(
						'full' => __('Full Width Layout','kurama'),
						'boxed' => __('Boxed','kurama'),
						
					)
			)
	);
	
	$wp_customize->add_section(
	    'kurama_portfolio_options',
	    array(
	        'title'     => __('Portfolio Layout','kurama'),
	        'priority'  => 0,
	        'panel'     => 'kurama_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'kurama_portfolio_layout',
		array( 'sanitize_callback' => 'kurama_sanitize_blog_layout' )
	);
	

	
	$wp_customize->add_control(
		'kurama_portfolio_layout',array(
				'label' => __('Select Layout','kurama'),
				'description' => __('Use this to Set the Layout for Portfolio Archive Pages.','kurama'),
				'settings' => 'kurama_portfolio_layout',
				'section'  => 'kurama_portfolio_options',
				'type' => 'select',
				'choices' => array(
						'kurama' => __('Kurama Layout','kurama'),
						'grid' => __('Basic Blog Layout','kurama'),
						'grid_2_column' => __('Grid - 2 Column','kurama'),
						'grid_3_column' => __('Grid - 3 Column','kurama'),
						'grid_4_column' => __('Grid - 4 Column','kurama'),
						'photos_1_column' => __('Photography - 1 Column','kurama'),
						'photos_2_column' => __('Photography - 2 Column','kurama'),
						'photos_3_column' => __('Photography - 3 Column','kurama'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'kurama_design_options',
	    array(
	        'title'     => __('Blog Layout','kurama'),
	        'priority'  => 0,
	        'panel'     => 'kurama_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'kurama_blog_layout',
		array( 'sanitize_callback' => 'kurama_sanitize_blog_layout' )
	);
	
	function kurama_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','kurama','grid_2_column','grid_3_column','grid_4_column','photos_1_column','photos_2_column','photos_3_column') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'kurama_blog_layout',array(
				'label' => __('Select Layout','kurama'),
				'settings' => 'kurama_blog_layout',
				'section'  => 'kurama_design_options',
				'type' => 'select',
				'choices' => array(
						'grid' => __('Standard Blog Layout','kurama'),
						'kurama' => __('Kurama Theme Layout','kurama'),
						'grid_2_column' => __('Grid - 2 Column','kurama'),
						'grid_3_column' => __('Grid - 3 Column','kurama'),
						'grid_4_column' => __('Grid - 4 Column','kurama'),
						'photos_1_column' => __('Photography - 1 Column','kurama'),
						'photos_2_column' => __('Photography - 2 Column','kurama'),
						'photos_3_column' => __('Photography - 3 Column','kurama'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'kurama_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','kurama'),
	        'priority'  => 0,
	        'panel'     => 'kurama_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_disable_sidebar',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_disable_sidebar', array(
		    'settings' => 'kurama_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','kurama' ),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'kurama_disable_sidebar_home',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_disable_sidebar_home', array(
		    'settings' => 'kurama_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','kurama' ),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'kurama_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'kurama_disable_sidebar_front',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_disable_sidebar_front', array(
		    'settings' => 'kurama_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','kurama' ),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'kurama_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'kurama_disable_sidebar_archive',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_disable_sidebar_archive', array(
		    'settings' => 'kurama_disable_sidebar_archive',
		    'label'    => __( 'Disable Sidebar on Archives(Categories/Tags/etc).','kurama' ),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'kurama_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'kurama_disable_sidebar_portfolio',
		array( 'sanitize_callback' => 'kurama_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'kurama_disable_sidebar_portfolio', array(
		    'settings' => 'kurama_disable_sidebar_portfolio',
		    'label'    => __( 'Disable Sidebar on Portfolio Pages.','kurama' ),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'kurama_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'kurama_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'kurama_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'kurama_sidebar_width', array(
		    'settings' => 'kurama_sidebar_width',
		    'label'    => __( 'Sidebar Width','kurama' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','kurama'),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'kurama_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	$wp_customize->add_setting(
		'kurama_sidebar_loc',
		array(
			'default' => 'right',
		    'sanitize_callback' => 'kurama_sanitize_sidebar_loc' )
	);
	
	$wp_customize->add_control(
			'kurama_sidebar_loc', array(
		    'settings' => 'kurama_sidebar_loc',
		    'label'    => __( 'Sidebar Location','kurama' ),
		    'section'  => 'kurama_sidebar_options',
		    'type'     => 'select',
		    'active_callback' => 'kurama_show_sidebar_options',
		    'choices' => array(
		        'left'   => "Left",
		        'right'   => "Right",
		    ),
		)
	);
	
	/* sanitization */
	function kurama_sanitize_sidebar_loc( $input ) {
		if (in_array($input, array('left','right') ) ) :
			return $input;
		else :
			return '';
		endif;		
	}
	
	
	/* Active Callback Function */
	function kurama_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('kurama_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	$wp_customize-> add_section(
    'kurama_footer_columns',
    array(
    	'title'			=> __('Footer Settings','kurama'),
    	'description'	=> __('Choose How Many Widget Area Columns Do you Want in the Footer. Default: 4.','kurama'),
    	'priority'		=> 10,
    	'panel'			=> 'kurama_design_panel'
    	)
    );
    
    $wp_customize->add_setting(
	'kurama_footer_sidebar_columns',
	array(
		'default'		=> '4',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
	'kurama_footer_sidebar_columns', array(
		'label' => __('No. of Footer Columns','kurama'),
		'section' => 'kurama_footer_columns',
		'settings' => 'kurama_footer_sidebar_columns',
		'type' => 'select',
		'choices' => array(
				'1' => __('1','kurama'),
				'2' => __('2','kurama'),
				'3' => __('3','kurama'),
				'4' => __('4','kurama'),
			)
	) );
	
    
	$wp_customize->add_setting(
	'kurama_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'kurama_footer_text',
	        array(
		        'label' => 'Custom Footer Text',
	            'section' => 'kurama_footer_columns',
	            'settings' => 'kurama_footer_text',
	            'type' => 'text'
	        )
	);	
	
	
	//WooCommerce Options
	$wp_customize->add_section(
	    'kurama_woo_options',
	    array(
	        'title'     => __('WooCommerce Layout','kurama'),
	        'priority'  => 0,
	        'panel'     => 'kurama_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_woo_layout', array( 'default' => '3' )
	);
	
	
	$wp_customize->add_control(
		'kurama_woo_layout',array(
				'label' => __('Select Layout','kurama'),
				'settings' => 'kurama_woo_layout',
				'section'  => 'kurama_woo_options',
				'type' => 'select',
				'default' => '3',
				'choices' => array(
						'2' => __('2 Columns','kurama'),
						'3' => __('3 Columns','kurama'),
						'4' => __('4 Columns','kurama'),
					),
			)
	);
	
	$wp_customize->add_setting(
		'kurama_woo_qty', array( 'default' => '12' )
	);
	
	
	$wp_customize->add_control(
		'kurama_woo_qty',array(
				'description' => __('This Value may reflect after you save and re-load the page.','kurama'),
				'label' => __('No of Products per Page','kurama'),
				'settings' => 'kurama_woo_qty',
				'section'  => 'kurama_woo_options',
				'type' => 'number',
				'default' => '12'
				
			)
	);

}
	
add_action( 'customize_register', 'kurama_customize_register_layouts' );