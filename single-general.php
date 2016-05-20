<?php get_header(); ?>
	<!--main-->
	<div id="main" class="clearfix">

		<div id="foto-encabezado" class="">
			<img class="img-responsive" src="img/banner-extra.jpg">
			<div id="filtro-encab"></div>
			<div class="titulo-encabezado container text-center">
				<h3>NOTICIAS</h3>
			</div>
		</div>

		<div class="container relative ficha-noticia" id="noticias">
			<div class="row">
				<div class="col-sm-9 col-xs-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h3 class="t-exo upper"><? the_title();?></h3>

						<?php
							if ( has_post_thumbnail() ) {
								echo '<div class="col-sm-6 col-xs-12">';
							    	echo get_the_post_thumbnail($post->ID, 'news-det', array('class' => 'img-responsive'));
							    echo '</div>';
							}
						?>

						<article class="clearfix">
							<h4><span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/calendario-mini-verde.svg"></span><?php echo get_the_date(); ?></h4>
							<? the_content();?>

							<a class="pull-right block ico-compartir">
								<img src="img/iconos/ico-twitter.png">
							</a>

							<a class="pull-right block ico-compartir">
								<img src="img/iconos/ico-facebook.png">
							</a>

							<p class="pull-right block p-compartir">Compartir:</p>
						</article>

						<div class="col-sm-4">
							<div class="row">
								<a class="btn-primary btn-lg btn-block btn-azul" href="noticias.html">Volver a NOTICIAS</a>
							</div>
						</div>
					<?php endwhile; else: ?>
			            <div class="col-xs-12">
			                <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
			            </div>
			        <?php endif; ?>
				</div>

				<div class="col-sm-3 hidden-xs car-noticia">
					<h3 class="h3-aside upper text-center">Últimas noticias</h3>
					<div class="col col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							<a class="block" href="#">
								<img src="img/1600.jpg" class="img-responsive" />
							</a>
						</div>									
					</div>

					<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 detalle">																
						<h4><a href="#">Titulo de la Noticia</a></h4>									
						<h5>16 de Marzo de 2016</h5>
						<p class="hidden-xs">Lorem ipsum dolor sit amet, sed an postea invenire, tale voluptatum vel no. Platonem prodesset scripserit eu pro, ut sea utamur dissentias. Odio atqui detracto sed ex, sit...</p>

						<a class="ver-mas" href="noticias_detalle.html">Ver Noticia</a>
					</div>

					<div id="sidebar-bulletin" class="col-sm-12 burbuja-alerta-aside">
						<h4 class="center">Suscríbete a nuestro boletín y recibe todos los eventos en tu mail</h4>
						<input type="mail" placeholder="Escribe aquí tu mail"></input>
						<button type="submit" class="btn-primary btn-lg btn-block btn-suscribirse">Suscribirse</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>