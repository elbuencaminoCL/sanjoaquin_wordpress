<?php get_header(); ?>	
	<div id="main" class="clearfix">
		<div id="foto-encabezado" class="">
			<img class="img-responsive" src="img/banner-extra.jpg">
			<div id="filtro-encab"></div>
			<div class="titulo-encabezado container text-center">
				<h3>EXTRA PROGRAMÁTICAS</h3>
			</div>
		</div>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="titulo-taller relative">
				<div class="container">
					<div class="row">
						<h3 class="upper t-exo"><? the_title();?></h3>
						<h4>Nombre Profesor Taller</h4>
					</div>
				</div>
			</div>

			<div class="container relative ficha-taller">
				<div class="row">
					<div class="col-sm-7 col-xs-12">
						<div class="row">
							<img class="img-responsive img-ficha-taller" src="img/1600.jpg">
						</div>
					</div>

					<div class="col-sm-5 col-xs-12">
						<? the_content();?>
					</div>

					<div class="col-sm-12 info-ficha-taller">
						<div class="row">
							<h3 class="t-exo">Horarios</h3>
							
							<div class="col-sm-12">
								<h4 class="upper">Elementary School</h4>

								<div class="col-sm-11 horario-taller">
									<p class="upper">Horario</p>
									<div class="col-sm-3 col-xs-12">
								
									Lunes, Miercoles y Viernes
									</div>
									<div class="col-sm-3 col-xs-12">
									16:30 a 20:00 Hrs.
									</div>
								</div>
							</div>
							
							<div class="col-sm-12">
								<h4 class="upper">High School</h4>

								<div class="col-sm-11 horario-taller">
									<p class="upper">Horario</p>
									<div class="col-sm-3 col-xs-12">
									
									Lunes, Miercoles y Viernes
									</div>
									<div class="col-sm-3 col-xs-12">
									16:30 a 20:00 Hrs.
									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="row">
									<a class="btn-primary btn-lg btn-block btn-azul" href="#"><span class="glyphicon glyphicon-menu-left"></span>Volver a Extra Programáticas</a>
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