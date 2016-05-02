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

			<div class="container relative galeria-detalle">
				<div class="row">
					<div class="col-md-9 col-xs-12">
						<h1 class="upper"><? the_title();?></h1>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-sm-3 datos-ficha-galeria"><span class="glyphicon glyphicon-calendar"></span><? echo get_the_date();?></div>
								<div class="col-sm-3 upper datos-ficha-galeria">
									<?
										$terms = get_the_terms( $post->ID, 'galerias-multimedia' );
										if($terms){
											foreach($terms as $term){
									            $term = array_shift( $terms );
									            echo '| '.$term->name;
									        }
										}
									?>
								</div>
							</div>
						</div>

						<? the_content();?>

						<img class="img-responsive" src="img/1600.jpg">

						<div class="col-sm-5">
							<div class="row">
								<a class="btn-primary btn-lg btn-block btn-azul" href="<?php bloginfo('template_directory'); ?>/nuestro-colegio/galeria-multimedia/"><span class="glyphicon glyphicon-menu-left"></span>  Volver a Galería Multimedia</a>
							</div>
						</div>

					</div>

					<div class="col-md-3 hidden-sm hidden-xs">

						<h3 class="h3-aside upper text-center">Relacionados</h3>

						<a href="btn-block">
							<img class="img-responsive" src="img/notiproof.jpg">
							<h4 class="upper center desc-galeria">Descripción Imagen</h4>
						</a>

						<div id="sidebar-bulletin" class="col-sm-12 burbuja-alerta-aside">
							<h4 class="center">Suscríbete a nuestro boletín y recibe todos los eventos en tu mail</h4>
							<input type="mail" placeholder="Escribe aquí tu mail"></input>
							<button type="submit" class="btn-primary btn-lg btn-block btn-suscribirse">Suscribirse</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/main-->
		<?php endwhile; else: ?>
            <div class="col-xs-12">
                <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
            </div>
        <?php endif; ?>
	</div>
	<!--/main-->
<?php get_footer(); ?>