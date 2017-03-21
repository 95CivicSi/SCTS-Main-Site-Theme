<?php
/**
 * Kurama Theme Customizer
 *
 * @package kurama
 */
 
function kurama_customize_register_social( $wp_customize ) {

	// Social Icons
	$wp_customize->add_section('kurama_social_section', array(
			'title' => __('Social Icons','kurama'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','protpress'),
					'facebook' => __('Facebook','kurama'),
					'twitter' => __('Twitter','kurama'),
					'google-plus' => __('Google Plus','kurama'),
					'instagram' => __('Instagram','kurama'),
					'rss' => __('RSS Feeds','kurama'),
					'vine' => __('Vine','kurama'),
					'vimeo-square' => __('Vimeo','kurama'),
					'youtube' => __('Youtube','kurama'),
					'flickr' => __('Flickr','kurama'),
					'android' => __('Android','kurama'),
					'apple' => __('Apple','kurama'),
					'dribbble' => __('Dribbble','kurama'),
					'foursquare' => __('FourSquare','kurama'),
					'git' => __('Git','kurama'),
					'linkedin' => __('Linked In','kurama'),
					'paypal' => __('PayPal','kurama'),
					'pinterest-p' => __('Pinterest','kurama'),
					'reddit' => __('Reddit','kurama'),
					'skype' => __('Skype','kurama'),
					'soundcloud' => __('SoundCloud','kurama'),
					'tumblr' => __('Tumblr','kurama'),
					'windows' => __('Windows','kurama'),
					'wordpress' => __('WordPress','kurama'),
					'yelp' => __('Yelp','kurama'),
					'vk' => __('VK.com','kurama'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= 10 ; $x++) :
			
		$wp_customize->add_setting(
			'kurama_social_'.$x, array(
				'sanitize_callback' => 'kurama_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'kurama_social_'.$x, array(
					'settings' => 'kurama_social_'.$x,
					'label' => __('Icon ','kurama').$x,
					'section' => 'kurama_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'kurama_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'kurama_social_url'.$x, array(
					'settings' => 'kurama_social_url'.$x,
					'description' => __('Icon ','kurama').$x.__(' Url','kurama'),
					'section' => 'kurama_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function kurama_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr',
					'android',
					'apple',
					'dribbble',
					'foursquare',
					'git',
					'linkedin',
					'paypal',
					'pinterest-p',
					'reddit',
					'skype',
					'soundcloud',
					'tumblr',
					'windows',
					'wordpress',
					'yelp',
					'vk'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
}
	
add_action( 'customize_register', 'kurama_customize_register_social' );	