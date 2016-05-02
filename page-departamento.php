<?php
    /*
    Template Name: Departamento
    */
?>

<?php get_header(); ?>

	<div id="main" class="clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="foto-encabezado" class="absolute">
				<?php if( get_field('_cabecera') ): ?>
	    			<img src="<?php the_field('_cabecera'); ?>" class="img-responsive" />
	    		<?php endif; ?>
	    	</div>
			<h2 class="titulo-seccion center relative"><span><? the_title();?></span></h2>

			<div class="container relative">
				<div class="center bajada">
					<img src="img/iconos/ico-globo.svg"><br>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
				</div>

				<div id="desc-departamento" class="clearfix">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<img class="img-responsive" src="img/departamento.jpg">
						</div>
						<div class="col-sm-6 col-xs-12">
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
						</div>
					</div>
				</div>

				<h3 class="upper titulo-tres clearfix">Press Release</h3>

				<div id="noticias" class="clearfix">
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<div class="col-sm-12 hidden-xs">
								<div class="row">
									<a class="block" href="#">
										<img src="img/noticia-1.jpg" class="img-responsive" />
									</a>
								</div>
							</div>

							<div class="col-sm-12 col-xs-12 detalle">						
								<h4>
									<a href="#">Ejemplo de titulo de noticia</a>
								</h4>
								<h5><img src="img/iconos/ico-small-calendar.svg">16 de Marzo de 2016</h5>
								<p class="hidden-xs">Lorem ipsum dolor sit amet, sed an postea invenire, tale voluptatum vel no. Platonem prodesset scripserit eu pro, ut sea utamur dissentias. Odio atqui detracto sed ex, sit...</p>
								<a class="ver-mas" href="#">Ver Noticia</a>			
							</div>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div class="col-sm-12 hidden-xs">
								<div class="row">
									<a class="block" href="#">
										<img src="img/noticia-1.jpg" class="img-responsive" />
									</a>
								</div>
							</div>

							<div class="col-sm-12 col-xs-12 detalle">						
								<h4>
									<a href="#">Ejemplo de titulo de noticia</a>
								</h4>
								<h5><img src="img/iconos/ico-small-calendar.svg">16 de Marzo de 2016</h5>
								<p class="hidden-xs">Lorem ipsum dolor sit amet, sed an postea invenire, tale voluptatum vel no. Platonem prodesset scripserit eu pro, ut sea utamur dissentias. Odio atqui detracto sed ex, sit...</p>
								<a class="ver-mas" href="#">Ver Noticia</a>			
							</div>
						</div>						
						<div class="col-sm-4 col-xs-12">
							<div class="col-sm-12 hidden-xs">
								<div class="row">
									<a class="block" href="#">
										<img src="img/noticia-1.jpg" class="img-responsive" />
									</a>
								</div>
								
							</div>

							<div class="col-sm-12 col-xs-12 detalle">
															
								<h4>
									<a href="#">Ejemplo de titulo de noticia</a>
								</h4>
								
								<h5><img src="img/iconos/ico-small-calendar.svg">16 de Marzo de 2016</h5>

								<p class="hidden-xs">Lorem ipsum dolor sit amet, sed an postea invenire, tale voluptatum vel no. Platonem prodesset scripserit eu pro, ut sea utamur dissentias. Odio atqui detracto sed ex, sit...</p>

								<a class="ver-mas" href="#">Ver Noticia</a>			

							</div>

						</div>

					</div>

				</div><!-- ROW -->					
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