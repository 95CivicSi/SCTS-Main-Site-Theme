<div id="featured-news-2" class="container featured-area">
	
	<div class="col-md-12">
	<?php if (get_theme_mod('kurama_fn_title2')) : ?>
		<div class="section-title title-font">
			<span><div><?php echo esc_html( get_theme_mod('kurama_fn_title2' ) ) ?></div></span>
		</div>
	<?php endif; ?>
	    <div class="featured-news-container">
	        <div class="fg-wrapper">
	            <?php
		            	$count = 1;
				        $args = array( 
			        	'post_type' => 'post',
			        	'posts_per_page' => 4, 
			        	'cat'  => esc_html( get_theme_mod('kurama_fn_cat2',0) ),
			        	'ignore_sticky_posts' => 1,
			        	);
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : 
				        
				        	$loop->the_post(); 
				        	
				        	if ( has_post_thumbnail() ) :
				        		$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID), 'kurama-thumb' ); 
								$image_url = $image_data[0]; 
							endif;		
				        	
				        ?>
						<div class="fg-item-container col-md-3 col-sm-3 col-xs-6">
							<div class="fg-item">
								<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
									<img src="<?php echo $image_url; ?>">
									<div class="product-details">
										<h3><?php the_title(); ?></h3>
									</div>
								</a>
								</div>
						</div>					
						 <?php 
							 $count++;
							 endwhile; ?>
						 <?php wp_reset_query(); ?>	
						
		        </div>	        
	    </div>
	</div>     
</div>
