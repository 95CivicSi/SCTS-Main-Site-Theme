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
			<?php printf( __( 'Designed by %1$s.', 'kurama' ), '<a href="'.esc_url("https://inkhive.com/").'" rel="nofollow">InkHive WordPress Themes</a>' ); ?>
			<span class="sep"></span>
			<?php echo ( get_theme_mod('kurama_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','kurama')) : esc_html( get_theme_mod('kurama_footer_text') ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->
<script><?php echo get_theme_mod('kurama_analytics'); ?></script>


<?php wp_footer(); ?>

</body>
</html>
