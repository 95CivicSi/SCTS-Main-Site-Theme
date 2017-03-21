<?php
/* The Template to Render the showcase
*
*/

//Define all Variables.		
?>
<div id="showcase" class="featured-area">
	<?php if (get_theme_mod('kurama_showcase_title')) : ?>
		<div class="section-title title-font">
			<span><div><?php echo esc_html( get_theme_mod('kurama_showcase_title' ) ) ?></div></span>
		</div>
	<?php endif; ?>
	<div class="container">
		<div class="showcase-container">
	            <div class="showcase-wrapper">
	            <?php
	            for ( $i = 1; $i <= 4; $i++ ) :

					$url = esc_url ( get_theme_mod('kurama_showcase_url'.$i) );
					$img = esc_url ( get_theme_mod('kurama_showcase_img'.$i) );
					$title = esc_html( get_theme_mod('kurama_showcase_title'.$i) );
					$desc = esc_html( get_theme_mod('kurama_showcase_desc'.$i) );
					 
					
					?>
					<div class="showcase-item col-md-3 col-sm-3 col-xs-12">
		            	<a href="<?php echo $url; ?>">
		            		<img src="<?php echo $img ?>" data-thumb="<?php echo $img ?>" title="<?php echo $title." - ".$desc ?>" />
		            	
		            	<div class="showcase-caption">
			                
			                <?php if ($title) : ?>
				                <div class="showcase-title"><?php echo $title ?></div>
				                <div class="showcase-desc"><span><?php echo $desc ?></span></div>
				            <?php endif; ?> 
				            
						</div>
						
						</a>

		            </div>
	             <?php endfor; ?>
	               
	            </div>
	         
	        </div>
	</div> 
</div>   