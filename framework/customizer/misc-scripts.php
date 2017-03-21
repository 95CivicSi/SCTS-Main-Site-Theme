<?php
/**
 * kurama Theme Customizer
 *
 * @package kurama
 */

function kurama_customize_register_misc( $wp_customize ) {

	// Advertisement	
	class kurama_Custom_Ads_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
	                <textarea rows="10" style="width:100%;" <?php $this->link(); ?>><?php echo $this->value(); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize->add_section('kurama_ads', array(
			'title' => __('Advertisement','kurama'),
			'priority' => 44 ,
	));
	
	$wp_customize->add_setting(
	'kurama_topad',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'kurama_sanitize_ads'
		)
	);
	
	$wp_customize->add_control(
	    new kurama_Custom_Ads_Control(
	        $wp_customize,
	        'kurama_topad',
	        array(
	            'section' => 'kurama_ads',
	            'settings' => 'kurama_topad',
	            'label'   => __('Top Ad','kurama'),
	            'description' => __('Enter your Responsive Adsense Code. For Other Ads use 468x60px Banner.','kurama')
	        )
	    )
	);
	
	$wp_customize->add_setting(
		'kurama_topad_priority',
		array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'kurama_topad_priority', array(
		    'settings' => 'kurama_topad_priority',
		    'label'    => __( 'Priority', 'kurama' ),
		    'section'  => 'kurama_ads',
		    'type'     => 'number',
		    'description' => __('Elements with Low Value of Priority will appear first.','kurama'),
		)
	);
	
	function kurama_sanitize_ads( $input ) {
		  global $allowedposttags;
	      $custom_allowedtags["script"] = array();
	      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	      $output = wp_kses( $input, $custom_allowedtags);
	      return $output;
	}
	
	class Kurama_Custom_JS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;background: #222; color: #eee;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	//Analytics
	$wp_customize-> add_section(
    'kurama_analytics_js',
    array(
    	'title'			=> __('Google Analytics','kurama'),
    	'description'	=> __('Enter your Analytics Code. It will be Included in Footer of the Site. Do NOT Include &lt;script&gt; and &lt;/script&gt; tags.','kurama'),
    	'priority'		=> 45,
    	)
    );
    
	$wp_customize->add_setting(
	'kurama_analytics',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'kurama_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
	    new Kurama_Custom_JS_Control(
	        $wp_customize,
	        'kurama_analytics',
	        array(
	            'section' => 'kurama_analytics_js',
	            'settings' => 'kurama_analytics'
	        )
	    )
	);
	
	$wp_customize->add_section(
	    'kurama_sec_upgrade',
	    array(
	        'title'     => __('Want a Personal SEO Assistant?','kurama'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'kurama_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Kurama_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'kurama_upgrade',
	        array(
	            'label' => __('Hello, How are you?','kurama'),
	            'description' => __('I hope you are enjoying this theme. If you need me to work on your website and increase your Google traffic, then visit inkhive.com and contact us.','kurama'),
	            'section' => 'kurama_sec_upgrade',
	            'settings' => 'kurama_upgrade',			       
	        )
		)
	);
	
	$wp_customize-> add_section(
    'kurama_custom_codes_js',
    array(
    	'title'			=> __('Custom JS','kurama'),
    	'description'	=> __('Enter your Custom JS Code. It will be Included in Head of the Site. Do NOT Include &lt;script&gt; and &lt;/script&gt; tags.','kurama'),
    	'priority'		=> 11,
    	'panel'			=> 'kurama_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'kurama_custom_js',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'kurama_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
	    new Kurama_Custom_JS_Control(
	        $wp_customize,
	        'kurama_custom_js',
	        array(
	            'section' => 'kurama_custom_codes_js',
	            'settings' => 'kurama_custom_js'
	        )
	    )
	);
	
	
}
add_action( 'customize_register', 'kurama_customize_register_misc' );