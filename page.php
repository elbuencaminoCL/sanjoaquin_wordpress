<?php get_header(); ?>

	<!--main-->
	<div id="main" class="clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="foto-encabezado" class="absolute">
				<?php 
					$image = get_field('_cabecera');
					$size = 'encabezado'; 
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
				?>
	    	</div>
			<h2 class="titulo-seccion center relative"><span><? the_title();?></span></h2>

			<div id="proyecto-educativo" class="container relative">
				<?php
					global $post;
					if ( has_excerpt( $post->ID ) ) {
						$excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
					    echo '<div class="center intro bajada">';
					    	if(is_page('proyecto-educativo')){
					    		echo '<img src=""'.get_bloginfo('template_directory').'/img/iconos/ico-globo.svg"><br>';
					    	}
							echo $excerpt;
						echo '</div>';
					} 
				?>
				<div class="row">
					<div class="container relative">
						<div id="desc-departamento" class="clearfix row">
							<?php
								if ( has_post_thumbnail() ) {
									echo '<div class="col-sm-6 col-xs-12">';
								    	echo get_the_post_thumbnail($post->ID, 'generica', array('class' => 'img-responsive'));
								    echo '</div>';
								}
							?>
							<? the_content();?>
						</div>

						<? include_once('modulos/descargas.php');?>
					</div>
				</div>					
			</div>
		<?php endwhile; else: ?>
            <div class="col-xs-12">
                <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
            </div>
        <?php endif; ?>
	</div>
	<!--/main-->

<?php get_footer(); ?>