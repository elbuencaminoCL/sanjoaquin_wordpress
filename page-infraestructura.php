<?php
    /*
    Template Name: Infraestructura
    */
?>

<?php get_header(); ?>
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

			<div class="container relative">
				<?php
					global $post;
					if ( has_excerpt( $post->ID ) ) {
						$excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
					    echo '<h2 class="center t-lato">';
							echo $excerpt;
						echo '</h2>';
					} 
				?>

				<div class="clearfix listado-infra">
					<div class="col-sm-7 col-xs-12">
						<ul>
								<li>2 Multicanchas y 1 Gimnasio</li>
								<li>Laboratorio de Ciencias</li>
								<li>Casino</li>
								<li>Ámplios espacios de áreas verdes</li>
						</ul>
					</div>
					<div class="col-sm-5 col-xs-12">
						<ul>
							<li>Granja</li>
							<li>Piscina</li>
							<li>Biblioteca</li>
						</ul>
					</div>
				</div>

					<div id="lugares" class="dropdown">
						<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Selecciona un punto para ver más información<span class="glyphicon glyphicon-hand-up"></span>
						</button>

						<ul id="lista-cuadros" class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a id="botonA"><span>A</span>Dirección - Admisión</a></li>
							<li><a id="botonB"><span>B</span>Atención Apoderados</a></li>
							<li><a id="botonC"><span>C</span>Salas Infant School</a></li>
							<li><a id="botonD"><span>D</span>Salas Elementary School</a></li>
							<li><a id="botonE"><span>E</span>Granja</a></li>
							<li><a id="botonF"><span>F</span>Multicancha</a></li>
							<li><a id="botonG"><span>G</span>Kiosko</a></li>
							<li><a id="botonH"><span>H</span>Salas High School</a></li>
							<li><a id="botonI"><span>I</span>Enfermeria</a></li>
							<li><a id="botonJ"><span>J</span>Casino</a></li>
							<li><a id="botonK"><span>K</span>Bodega</a></li>
							<li><a id="botonL"><span>L</span>Biblioteca</a></li>
							<li><a id="botonM"><span>M</span>Laboratorio</a></li>
							<li><a id="botonN"><span>N</span>Gimnasio</a></li>	
							<li><a id="toggle-lugares"><span class="glyphicon glyphicon-menu-up"></span></a></li>						
						</ul>
					</div>

					<!-- SELECTOR DE LUGARES -->
					<div id="infra-desc">
						<?php 
                            $infraestructura = array (
                                'post_type'  => 'infraestructura',
                                'posts_per_page' => -1
                            );
                            $infra = new WP_Query( $infraestructura );
                            if ( $infra->have_posts() ) {
                                while ( $infra->have_posts() ) : $infra->the_post();
                        ?>
                            <div id="cuadroA" class="cuadro dropdown open">
								<h3 class="btn dropdown-toggle clearfix upper">
									<? the_title();?> <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
								</h3>
								<article class="dropdown-menu">
									<img class="img-responsive" src="img/slider1.jpg">
									<? the_content();?>
								</article>
							</div>
                        <?
                                endwhile;
                                wp_reset_postdata();
                            }
                        ?>


						<div id="cuadroA" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								DIRECCIÓN - ADMISION <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroB" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								ATENCIÓN APODERADOS <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroC" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								SALAS INFANT SCHOOL <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroD" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								SALAS ELEMENTARY SCHOOL <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroE" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								GRANJA <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroF" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								MULTICANCHA <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroG" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								KIOSKO <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroH" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								SALAS HIGH SCHOOL <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroI" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								ENFERMERIA <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroJ" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								CASINO <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroK" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								BODEGA <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroL" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								BIBLIOTECA <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroM" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								LABORATORIO <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

						<div id="cuadroN" class="cuadro dropdown open">

							<h3 class="btn dropdown-toggle clearfix">
								GIMNASIO <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>

							<article class="dropdown-menu">

								<img class="img-responsive" src="img/slider1.jpg">

								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

							</article>
							
						</div>

					</div><!-- /FIN DE SELECTOR DE LUGARS -->

					
			</div><!-- CONTAINER -->

			<div id="mapa" class="hidden-xs">
				<img class="img-responsive" src="img/mapa_colegio.svg">
			</div>

		<?php endwhile; else: ?>
            <div class="col-xs-12">
                <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
            </div>
        <?php endif; ?>
	</div>
	<!--/main-->

<?php get_footer(); ?>