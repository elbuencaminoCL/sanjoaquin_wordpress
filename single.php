<?php get_header(); ?>
	<?php if(is_singular('actividades') || is_singular('selecciones')) { ?>
		<? include(TEMPLATEPATH .'/single-talleres.php'); ?>
	<? } elseif(is_singular('galerias')) { ?>
		<? include(TEMPLATEPATH .'/single-galerias.php'); ?>
	<? } else { ?>
		<? include(TEMPLATEPATH .'/single-general.php'); ?>
	<? } ?>
<?php get_footer(); ?>