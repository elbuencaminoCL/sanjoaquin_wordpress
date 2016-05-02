<?php
    /*
    Template Name: Guías
    */
?>

<?php get_header(); ?>
	<!--main-->
	<div id="main" class="clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="foto-encabezado" class="absolute">
				<?php if( get_field('_cabecera') ): ?>
	    			<img src="<?php the_field('_cabecera'); ?>" class="img-responsive" />
	    		<?php endif; ?>
	    	</div>
			<h2 class="titulo-seccion center relative"><span><? the_title();?></span></h2>

			<div class="center upper descripcion-guia">
				<img src="<?php bloginfo('template_directory'); ?>/img/iconos/ico-guia.svg"><br>
				<h2>En esta sección podrás descargar material de estudio correspondiente a tu curso y asignatura.</h2>
			</div>

			<div id="buscador-guias">
				<div class="container clearfix">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12"><h2 class="upper text-right">Guías disponibles</h2></div>
						<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle t-lato" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Seleccione un curso para ver las guías
							<span class="glyphicon glyphicon-menu-down"></span>
							</button>

							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="#">Nombre curso número 1</a></li>
								<li><a href="#">Nombre curso número 2</a></li>
								<li><a href="#">Nombre curso número 3</a></li>
								<li><a href="#">Nombre curso número 4</a></li>
								<li><a href="#">Nombre curso número 5</a></li>
							</ul>
						</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<a class="btn btn-primary btn-md btn-block btn-buscar" href="guias_seleccion.html" role="button">BUSCAR</a>
						</div>
					</div>
				</div>
			</div>

			<div class="container relative contenedor-guias">

				<div class="panel panel-default no-border">
					<div class="panel-body center no-border">
						<img src="img/iconos/ico-guia-busqueda.svg">
						<p>AÚN NO SE HA REALIZADO NINGUNA BÚSQUEDA
						SELECCIONA UN CURSO PARA VER LAS GUÍAS DISPONIBLES</p>
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