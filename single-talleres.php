<?php get_header(); ?>	
	<div id="main" class="clearfix">
<?
			$extra = get_page_by_path('academias');
		?>
		<div id="foto-encabezado" class="absolute">
			<?php 
				$image = get_field('_cabecera', $extra);
				$size = 'encabezado'; 
				if($image) {
					echo wp_get_attachment_image( $image, $size );
				}
			?>
		</div>
<h2 class="titulo-seccion center relative"><span class="upper"><img src="<?php bloginfo('template_directory'); ?>/img/iconos/noticias.svg"><? echo get_the_title($extra);?></span></h2>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="titulo-taller relative">
				<div class="container">
						<h1 class="upper t-exo"><? the_title();?></h1>
						<?php if( get_field('_profesor_a_cargo') ): ?>
				        <h3><?php the_field('_profesor_a_cargo'); ?></h3>
				    <?php endif; ?>
				</div>
			</div>

			<div class="container relative ficha-taller">
				<div class="row">
					<div class="col-sm-7 col-xs-12">
						<div class="row">
							<? 
								if(has_post_thumbnail()){
				                    echo get_the_post_thumbnail($post->ID, 'taller', array('class' => 'img-responsive'));
				                } else {
				                    echo '<img src="'.get_bloginfo('template_directory').'/img/gen870.png" class="img-responsive" alt="Colegio San Joaquín" />';
				                }
				            ?>
						</div>
					</div>

					<div class="col-sm-5 col-xs-12">
						<? the_content();?>
					</div>

					<div class="col-sm-12 info-ficha-taller">
						<div class="row">
							<h3 class="t-exo">Horarios</h3>
							
							<?php if( have_rows('_horarios_talleres') ): ?>
								<?php while( have_rows('_horarios_talleres') ): the_row(); 
									$curso = get_sub_field('_curso_act');
									$dia = get_sub_field('_dia_act');
									$horario = get_sub_field('_horario_act');
								?>
									<div class="col-sm-12">
										<h3 class="upper"><?php echo $curso; ?></h3>
										<div class="col-sm-11 horario-taller">
											<p class="upper">Horario</p>
											<div class="col-md-4 col-sm-6 col-xs-12 dia-horario"><?php echo $dia; ?></div>
											<div class="col-md-4 col-sm-6 col-xs-12"><span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/ico-taller-hora.svg"></span> <?php echo $horario; ?></div>
										</div>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>

							<div class="col-sm-4">
								<div class="row">
									<a class="btn-primary btn-lg btn-block btn-azul" href="<?php bloginfo('wpurl'); ?>/academias/"><span class="glyphicon glyphicon-menu-left"></span>Volver a Academias</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; else: ?>
	        <div class="col-xs-12">
	            <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
	        </div>
	    <?php endif; ?>
	</div>
<?php get_footer(); ?>