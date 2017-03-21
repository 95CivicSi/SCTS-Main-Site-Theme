<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_fonts( $wp_customize ) {

	$wp_customize->add_section(
	    'kurama_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','kurama'),
	        'priority'  => 41,
	        'description' => __('Fonts are Sorted in Order of Popularity. Defaults: Lato, Open Sans.','kurama')
	    )
	);
	
	/**
	 * A class to create a dropdown for all google fonts
	 */
	 class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
	 {
	    private $fonts = false;
	
	    public function __construct($manager, $id, $args = array(), $options = array())
	    {
	        $this->fonts = $this->get_fonts();
	        parent::__construct( $manager, $id, $args );
	    }

	    /**
	     * Render the content of the category dropdown
	     *
	     * @return HTML
	     */
	    public function render_content()
	    {
	        if(!empty($this->fonts))
	        {
	            ?>
	                <label>
	                    <span class="customize-category-select-control" style="font-weight: bold; display: block; padding: 5px 0px;"><?php echo esc_html( $this->label ); ?><br /></span>
	                    
	                    <select <?php $this->link(); ?>>
	                        <?php
	                            foreach ( $this->fonts as $k => $v )
	                            {
	                               printf('<option value="%s" %s>%s</option>', $v->family, selected($this->value(), $k, false), $v->family);
	                            }
	                        ?>
	                    </select>
	                </label>
	            <?php
	        }
	    }
	
	    /**
	     * Get the google fonts from the API or in the cache
	     *
	     * @param  integer $amount
	     *
	     * @return String
	     */
	    public function get_fonts( $amount = 'all' )
	    {
	        $fontFile = get_template_directory().'/inc/cache/google-web-fonts.txt';
	
	        //Total time the file will be cached in seconds, set to a week
	        $cachetime = 86400 * 30;
	
	        if(file_exists($fontFile) && $cachetime < filemtime($fontFile))
	        {
	            $content = json_decode(file_get_contents($fontFile));
	           
	        } else {
	
	            $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=AIzaSyCnUNuE7iJyG-tuhk24EmaLZSC6yn3IjhQ';
	
	            $fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );
	
	            $fp = fopen($fontFile, 'w');
	            fwrite($fp, $fontContent['body']);
	            fclose($fp);
	
	            $content = json_decode($fontContent['body']);
	            
	        }
	
	        if($amount == 'all')
	        {
	            return $content->items;
	        } else {
	            return array_slice($content->items, 0, $amount);
	        }
	        
	    }
	 }
	
	
	
	$wp_customize->add_setting(
		'kurama_title_font' ,array('default' => 'Oswald')
	);
	
	$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'kurama_title_font',array(
				'label' => __('Title Font','kurama'),
				'settings' => 'kurama_title_font',
				'section'  => 'kurama_typo_options',
			)
		)
	);
	
	
	$wp_customize->add_setting(
		'kurama_body_font', array('default' => 'Open Sans')
	);
	
	$wp_customize->add_control(
		new Google_Font_Dropdown_Custom_Control(
		$wp_customize,
		'kurama_body_font',array(
				'label' => __('Body Font','kurama'),
				'settings' => 'kurama_body_font',
				'section'  => 'kurama_typo_options'
			)
		)	
	);
	
}
	
add_action( 'customize_register', 'kurama_customize_register_fonts' );	