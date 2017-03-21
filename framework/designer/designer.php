<?php
/*
*
* Dynamically Design the theme using Less Compiler for PHP
* Compiler Runs only when Customizer is Loaded, not for users. So no effect on site performance.
*
*/	
if (!class_exists('lessc')) {
require get_template_directory() ."/framework/designer/lessc.inc.php";
}


function kurama_exec_less() {
	$less = new lessc;
	$inputFile = get_template_directory() ."/assets/less/custom.less";
	$outputFile = get_template_directory() ."/assets/css/custom.css";

	$less->setVariables(array(
		"accent" => get_theme_mod('kurama_skin_var_accent','#3f1c18'),	
		"background" => get_theme_mod('kurama_skin_var_background','#fff'),
		//"header-bg" => get_theme_mod('kurama_skin_var_headerbg','#3f1c18'),
		//"header-color" => get_theme_mod('kurama_skin_var_headercolor','#d8a33e'),
		"onaccent" => get_theme_mod('kurama_skin_var_onaccent','#d8a33e'),
		"content" => get_theme_mod('kurama_skin_var_content','#8e8f77'), 
		"footer-bg" => get_theme_mod('kurama_skin_var_footerbg','#fcfeed'),
	  
	));
	
	
	if ( is_customize_preview() )  {
		try {
			$less->compileFile( $inputFile, $outputFile ); 
		} catch(exception $e) {
			echo "fatal error: " . $e->getMessage();
		}
		
	} 
	else {
		$less->checkedCompile( $inputFile, $outputFile );
	}

}	
add_action('wp_head','kurama_exec_less', 1);