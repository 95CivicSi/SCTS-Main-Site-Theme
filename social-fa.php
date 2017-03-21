<?php
/*
** Template to Render Social Icons on Top Bar
*/

for ($i = 1; $i < 11; $i++) : 
	$social = esc_attr( get_theme_mod('kurama_social_'.$i) );
	if ( ($social != 'none') && ($social != '') ) : ?>
	<span><a class="social-icon" href="<?php echo esc_url( get_theme_mod('kurama_social_url'.$i) ); ?>"><i class="fa fa-fw fa-<?php echo esc_attr($social); ?>"></i></a></span>
	<?php endif;

endfor; ?>