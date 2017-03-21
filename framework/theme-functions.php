<?php
/*
 * @package kurama, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */
 
 
class Kurama_Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="menu-desc">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

class Kurama_Menu_With_Icon extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

/*
 * Pagination Function. Implements core paginate_links function.
 */
function kurama_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}

//Quick Fixes for Custom Post Types.
function kurama_pagination_queried( $query ) {
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . __(' of ', 'kurama') . $query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}

/*
** Customizer Controls 
*/
if (class_exists('WP_Customize_Control')) {
	class Kurama_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'kurama' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
} 

if ( class_exists('WP_Customize_Control') && class_exists('woocommerce') ) {
	class Kurama_WP_Customize_Product_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'kurama' ),
                    'option_none_value' => '0',
                    'taxonomy'          => 'product_cat',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}    
if (class_exists('WP_Customize_Control')) {
	class Kurama_WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
             printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }
}

/*
** Function to Trim the length of Excerpt and More
*/
function kurama_excerpt_length( $length ) {
	return 28;
}
add_filter( 'excerpt_length', 'kurama_excerpt_length', 999 );

function kurama_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'kurama_excerpt_more' );


/*
** Function to check if Sidebar is enabled on Current Page 
*/

function kurama_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('kurama_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('kurama_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('kurama_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	elseif( get_theme_mod('kurama_disable_sidebar_archive') && is_archive() ) :
		$load_sidebar = false;
	elseif( get_theme_mod('kurama_disable_sidebar_portfolio') && (get_post_type() == 'portfolio') ) :
		$load_sidebar = false;			
	elseif ( get_post_meta( get_the_ID(), 'enable-full-width', true ) )	:
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Load Footer Sidebar
*/
function kurama_load_footer_sidebar() {
	$cols = get_theme_mod('kurama_footer_sidebar_columns','4');
	get_template_part('footer/footer', $cols );
}


/*
**	Determining Sidebar and Primary Width
*/
function kurama_primary_class() {
	$sw = esc_html( get_theme_mod('kurama_sidebar_width',4) );
	$class = "col-md-".(12-$sw);
	
	if ( !kurama_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('kurama_primary-width', 'kurama_primary_class');

function kurama_secondary_class() {
	$sw = esc_html( get_theme_mod('kurama_sidebar_width',4) );
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('kurama_secondary-width', 'kurama_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function kurama_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function kurama_fade($color, $val) {
	return "rgba(".kurama_hex2rgb($color).",". $val.")";
}



/*
** Function to Set Main Class 
*/
function kurama_get_main_class(){
	
	$layout = get_theme_mod('kurama_blog_layout');
	if (strpos($layout,'kurama') !== false) {
	    	echo 'kurama-main';
	}		
}
add_action('kurama_main-class', 'kurama_get_main_class');


/*
** Function to Get Theme Layout 
*/
function kurama_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('kurama_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('kurama_blog_layout') );
	else :
		get_template_part( $ldir ,'grid');	
	endif;	
}
add_action('kurama_blog_layout', 'kurama_get_blog_layout');

/*
** Function to Get Portfolio Archive Layout 
*/
function kurama_get_portfolio_layout(){
	static $kurama_post_count = 0;
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('kurama_portfolio_layout') ) :
		get_template_part( $ldir , get_theme_mod('kurama_portfolio_layout') );
	else :
		get_template_part( $ldir ,'kurama');	
	endif;	
}
add_action('kurama_portfolio_layout', 'kurama_get_portfolio_layout');



/*
** Function to Deal with Elements of Inequal Heights, Enclose them in a bootstrap row.
*/
function kurama_open_div_row() {
	echo "<div class='row grid-row col-md-12'>";
}
function kurama_close_div_row() {
	echo "</div><!--.grid-row-->";
}


function kurama_before_article() {

	global $kurama_post_count;
	$array_2_3_4 = array('grid_2_column',
							'grid_3_column',
							'grid_4_column',
							'photos_3_column',
							'photos_2_column',
							'kurama',	//2 col		
							'kurama_3_column',	
							'templates/template-blog-kurama.php',	
							'templates/template-blog-kurama3c.php',			
							'templates/template-blog-grid3c.php',
							'templates/template-blog-grid2c.php', 
							'templates/template-blog-grid4c.php',
							'templates/template-blog-photos3c.php',
							'templates/template-blog-photos2c.php'
						);
	//wp_reset_postdata();	- Don't Reset any Data, because we are not using get_post_meta	
	//See what the get_queried_object_id() function does. Though, the Query is reset in template files.			
	//For 2,3,4 Column Posts
	$page_template = get_post_meta( get_queried_object_id(), '_wp_page_template', true );
	$kurama_layout = get_theme_mod('kurama_blog_layout'); //BUG FIXER
	if (is_page_template() ) : //Disable input from kurama Layout if we are in a page template.
		$kurama_layout = 'none';
	endif;
	
	if ( in_array( $kurama_layout, $array_2_3_4 ) || in_array( $page_template, $array_2_3_4 ) ) : 
			 if ( $kurama_post_count  == 0 ) {
			  	kurama_open_div_row();
			  }
	endif;	  	
}
add_action('kurama_before-article', 'kurama_before_article');

/* Pre and Post Article Hooking */
function kurama_after_article() {
	global $kurama_post_count;
	//echo $kurama_post_count;
	wp_reset_postdata();
	$template = get_post_meta( get_the_id(), '_wp_page_template', true );
	$kurama_layout = get_theme_mod('kurama_blog_layout'); //BUG FIXER
	
	if (is_page_template() ) : //Disable input from kurama Layout if we are in a page template.
		$kurama_layout = 'none';
	endif;
	
		
	//For 3 Column Posts
	if (   ( $kurama_layout == 'grid_3_column' ) 
		|| ( $kurama_layout == 'photos_3_column' )
		|| ( $kurama_layout == 'kurama_3_column' )
 		|| ( $template == 'templates/template-blog-grid3c.php' )
 		|| ( $template == 'templates/template-blog-kurama3c.php' )
 		|| ( $template == 'templates/template-blog-photos3c.php' ) ):
		
		

		global $wp_query;
		if (($wp_query->current_post +1) == ($wp_query->post_count)) :
			 	kurama_close_div_row();
		else :
			if ( ( $kurama_post_count ) == 2 ) {
			 	kurama_close_div_row();
				$kurama_post_count = 0;
				}
			else {
				$kurama_post_count++;
			}
		endif;		
		
	//For 2 Column Posts
	elseif ( ( $kurama_layout == 'grid_2_column' )
		|| ( $kurama_layout == 'photos_2_column' )
		|| ( $kurama_layout == 'kurama' )
		|| ( $template == 'templates/template-blog-grid2c.php' )
		|| ( $template == 'templates/template-blog-kurama.php' )
		|| ( $template == 'templates/template-blog-photos2c.php' ) ):
		
		
		
		global $wp_query;
		if (($wp_query->current_post +1) == ($wp_query->post_count)) :
			 	kurama_close_div_row();
			 	$kurama_post_count = 0;
		else :
			if ( ( $kurama_post_count ) == 1 ) {
			 	kurama_close_div_row();
				$kurama_post_count = 0;
				}
			else {
				$kurama_post_count++;
			}
		endif;		
	
	elseif ( ( $kurama_layout == 'grid_4_column' )
		|| ( $template == 'templates/template-blog-grid4c.php' ) ):
		
		
		
		global $wp_query;
		if (($wp_query->current_post +1) == ($wp_query->post_count)) :
			 	kurama_close_div_row();
		else :
			if ( ( $kurama_post_count ) == 3 ) {
			 	kurama_close_div_row();
				$kurama_post_count = 0;
				}
			else {
				$kurama_post_count++;
			}
		endif;		
	endif;
	
}
add_action('kurama_after-article', 'kurama_after_article');



/*
** Function to check if Component is Enabled.
*/
function kurama_is_enabled( $component ) {
	
	wp_reset_postdata();
	$return_val = false;
	
	switch ($component) {
		
		case 'slider' :
		
			if ( ( get_theme_mod('kurama_main_slider_enable' ) && is_home() )
				|| ( get_theme_mod('kurama_main_slider_enable_front' ) && is_front_page() )
				|| ( get_theme_mod('kurama_main_slider_enable_posts' ) && is_single() )
				|| ( get_theme_mod('kurama_main_slider_enable_pages' ) && is_page() )
				||( get_post_meta( get_the_ID(), 'enable-slider', true ) ) ) :
					$return_val = true;
			endif;
			break;
		
		case 'featured-products' :
		
			if ( ( get_theme_mod('kurama_box_enable') && ( is_home() ) )
				|| ( get_theme_mod('kurama_box_enable_front') && ( is_front_page() ) )
				|| ( get_post_meta( get_the_ID(), 'enable-sqbx', true ) ) ) :
					$return_val = true;
				endif;
				break;
		
		case 'coverflow-products' :
		
			 if ( ( get_theme_mod('kurama_coverflow_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_coverflow_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-coverflow', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;	
			 	
		case 'featured-posts' :
		
			 if ( ( get_theme_mod('kurama_a_box_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_a_box_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-sqbx-posts', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;	
			 	
		case 'coverflow-posts' :
		
			 if ( ( get_theme_mod('kurama_a_coverflow_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_a_coverflow_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-coverflow-posts', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;
			 	
		case 'showcase' :
		
			 if ( ( get_theme_mod('kurama_showcase_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_showcase_enable_posts') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_showcase_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-showcase', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;
			 	
		case 'grid' :
		
			 if ( ( get_theme_mod('kurama_grid_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_grid_enable_posts') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_grid_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-grid', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;	
			 	
		case 'fn1' :
		
			 if ( ( get_theme_mod('kurama_fn_enable1') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_fn_enable_posts1') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_fn_enable_front1') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-fn1', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;	
			 	
		case 'fn2' :
		
			 if ( ( get_theme_mod('kurama_fn_enable2') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_fn_enable_posts2') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_fn_enable_front2') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-fn2', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;	
			 	
			 	
		case 'fn3' :
		
			 if ( ( get_theme_mod('kurama_fn_enable3') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_fn_enable_posts3') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_fn_enable_front3') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-fn3', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;
		
		case 'farea1' :
		
			 if ( ( get_theme_mod('kurama_farea1_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_farea1_enable_posts') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_farea1_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-fn3', true ) ) ) : 
			 		$return_val = true;
			 	endif;
			 	break;	 			 		 		 	 			 		 	 		 		
									
	}//endswitch
	
	return $return_val;
	
}

/*
**	Hook Just before content. To Display Featured Content and Slider.
*/
function kurama_display_fc() {
	
		//Nested Function
		function show($s) {
			switch ($s) {
				case 'main_slider' :
					if  ( kurama_is_enabled( 'slider' ) )
						get_template_part('slider', 'swiper' );
					break;
				case 'showcase':
					if  ( kurama_is_enabled( 'showcase' ) )
						get_template_part('featured','showcase' );
					break;
				case 'a_coverflow':
					if  ( kurama_is_enabled( 'coverflow-posts' ) )
						get_template_part('coverflow', 'posts');
					break;
				case 'fn1':
					if  ( kurama_is_enabled( 'fn1' ) )
						get_template_part('featured', 'news');
					break;		
				case 'fn2':
					if  ( kurama_is_enabled( 'fn2' ) )
						get_template_part('featured', 'news2');
					break;
				case 'fn3':
					if  ( kurama_is_enabled( 'fn3' ) )
						get_template_part('featured', 'news3');
					break;					
				case 'a_box':
					if  ( kurama_is_enabled( 'featured-posts' ) )
						get_template_part('featured','posts');	
					break;
				case 'box' :
					if  ( kurama_is_enabled( 'featured-products' ) )
						get_template_part('featured', 'products');
					break;
				case 'farea1' :
					if  ( kurama_is_enabled( 'farea1' ) )
						get_template_part('featured', 'area1');
					break;	
				case 'coverflow';
					if  ( kurama_is_enabled( 'coverflow-products' ) )
						get_template_part('coverflow', 'product'); 
					break;
				case 'topad':
					if ( get_theme_mod('kurama_topad') )
						get_template_part('topad');
					break;	
			}	
					
		}	
		
		//get order of components
		//farea1 is directly loaded from header.php
		$list = array('main_slider','showcase','fn1','fn2','fn3','coverflow','box','a_coverflow','a_box','topad'); //Write Them in their Default Order of Appearance.
		$order = array();
		
		$x = 0;
		foreach ($list as $i) {	
			if( get_theme_mod('kurama_'.$i.'_priority') == 10 ) : //Customizer Defaults Loaded
				$order[] = 10 + $x;
			else :		
				$order[] = get_theme_mod('kurama_'.$i.'_priority' , 10 + $x);
			endif;	
			$x += 0.01; //Use Decimel Because users can set priority as 11 too.
		}
		
		$sorted = array_combine($order, $list);
		ksort($sorted); //Sort on the Value of Keys 
		$sorted = array_values($sorted); //Fetch only the values, get rid of keys.
				
		//Display the Components
		foreach($sorted as $s) {
				show($s);
		}	
		
}
add_action('kurama-before_content', 'kurama_display_fc');


/*
** kurama Render Slider
*/
function kurama_render_slider() {
	$kurama_slider = array(
		'speed' => get_theme_mod('kurama_slider_speed', 500 ),
		'autoplay' => get_theme_mod('kurama_slider_pause', 5000 ), //Autoplay = 0 to disable, else time between slides
		'effect' => get_theme_mod('kurama_slider_effect', 'fade' )
	);
	wp_localize_script( 'kurama-custom-js', 'slider_object', $kurama_slider );
}
add_action('wp_enqueue_scripts', 'kurama_render_slider', 20);


/*
** Header custom js
*/
function kurama_header_js() {
	if ( get_theme_mod('kurama_custom_js') ) 
		echo "<script>".get_theme_mod('kurama_custom_js')."</script>";
		
}
add_action('wp_head', 'kurama_header_js');

/*
** Load WooCommerce Compatibility FIle
*/
if ( class_exists('woocommerce') ) :
	require get_template_directory() . '/framework/woocommerce.php';
endif;


/*
** Load Custom Widgets
*/
require get_template_directory() . '/framework/widgets/recent-posts.php';
//require get_template_directory() . '/framework/widgets/video.php'; BUGGED
//require get_template_directory() . '/framework/widgets/featured-posts.php'; BUGGED
require get_template_directory() . '/framework/widgets/rt-featured-posts.php';
require get_template_directory() . '/framework/widgets/rt-flickr.php';
require get_template_directory() . '/framework/widgets/rt-most-commented.php';
require get_template_directory() . '/framework/widgets/rt-recent-comments.php';
require get_template_directory() . '/framework/widgets/rt-social.php';

function rt_register_widgets() {
	register_widget('RT_Feature_Posts');
	register_widget('RT_Recent_Comments');
	register_widget('RT_Social_Links');
	register_widget('RT_Flickr');
	register_widget('RT_Most_Commented');
}
add_action('widgets_init', 'rt_register_widgets', 1);


/**
 * Include Meta Boxes.
 */
 
require get_template_directory() . '/framework/metaboxes/page-attributes.php';
require get_template_directory() . '/framework/metaboxes/display-options.php';


