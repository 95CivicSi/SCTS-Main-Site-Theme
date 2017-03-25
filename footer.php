<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package kurama
 */
?>

	</div><!-- #content -->

	<?php kurama_load_footer_sidebar(); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php echo ( get_theme_mod('kurama_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','kurama')) : esc_html( get_theme_mod('kurama_footer_text') ); ?>
			<span class="sep"></span>
			<?php printf( __('%1$s'),'<a href="'.esc_url("http://www.sctscomputing.com/credits").'" rel="designer">Credits</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->
<script><?php echo get_theme_mod('kurama_analytics'); ?></script>


<?php wp_footer(); ?>

</body>
</html>
