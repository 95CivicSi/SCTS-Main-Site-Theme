<?php if ( ( get_theme_mod('kurama_farea1_enable') && ( is_home() ) )
			 	|| ( get_theme_mod('kurama_farea1_enable_posts') && ( is_single() ) )
			 	|| ( get_theme_mod('kurama_farea1_enable_front') && ( is_front_page() ) )
			 	|| ( get_post_meta( get_the_ID(), 'enable-fn3', true ) ) ) : 
			 	?>
<div id="featured-area-1">
<div class="container-fluid">
	<div class="popular-articles col-md-12">	
		
		<?php /* Start the Loop */ $count=0; ?>
				<?php
		    		$args = array( 'posts_per_page' => 4, 'category' => get_theme_mod('kurama_farea1_cat') );
					$lastposts = get_posts( $args );
					foreach ( $lastposts as $post ) :
					  setup_postdata( $post ); ?>
				
				    <div class="col-md-3 col-sm-6 col-xs-6 imgcontainer">
				    	<div class="popimage">
				        <?php if (has_post_thumbnail()) : ?>	
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('kurama-pop-thumb'); ?></a>
						<?php else : ?>
								<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
						<?php endif; ?>
							<div class="titledesc">
				            <h2><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h2>
				            <span class="readmore title-font"><a href="<?php the_permalink() ?>"><?php _e('Read More','kurama') ?></a></span>
				        </div>
				    	</div>	
				        <div class="postdate">
			            	<span class="day"><?php the_time('j'); ?></span>
			            	<span class="month"><?php the_time('M'); ?></span>
			            </div>
				    </div>
				    
				<?php $count++;
				if ($count == 4) break;
				 endforeach; ?>
				 <?php wp_reset_postdata(); ?>
	</div>

</div><!--.container-->
</div>
<?php endif; ?>