<?php
    /*
    Template Name: Contacto
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
				<div class="col-sm-7 col-xs-12">
					<h3 class="upper titulo-tres">Contáctanos</h3>
					<form id="form-contacto">
						<div class="row">
							<div class="col-sm-6">
								<h5>Nombre Completo *</h5>
								<input type="text" placeholder="Nombre Completo">
							</div>
							<div class="col-sm-6">
								<h5>EMAIL *</h5>
								<input type="mail" placeholder="nombre@mail.com">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<h5>ASUNTO DEL MENSAJE *</h5>
								<input type="text" placeholder="Asunto">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<h5>MENSAJE *</h5>
								<input type="text" placeholder="Escriba aquí su mensaje">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<p>* Datos obligatorios</p>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-block btn-primary pull-right" href="#">ENVIAR</button>
							</div>
						</div>

					</form>

				</div>

				<div class="col-sm-5 col-xs-12">
					<h4>UBICACIÓN</h4>

					<div class="ubicacion">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.8075477360585!2d-70.5535766847986!3d-33.532388980750504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d114a6d41697%3A0xb0fe31af72b4b607!2sColegio+Santa+Mar%C3%ADa+De+Lo+Ca%C3%B1as!5e0!3m2!1sen!2scl!4v1459891444161" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
						<p>Dirección: Las Araucarias Norte 8103, El Hualle 8032, La Florida</p>
						<p>Telefono: Admisión +56 2296 5657</p>
						<p>Telefono: Secretaria +56 2296 5657</p>
						<p>Email: contacto@colegio.cl</p>
					</div>
				</div>

				<div class="col-xs-12 como-llegar">
					<h3 class="upper titulo-tres">Cómo Llegar</h3>				

					<div class="panel-group" id="destino" role="tablist" aria-multiselectable="true">

				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title upper titulo-panel">
				        <a class="clearfix" role="button" data-toggle="collapse" data-parent="#destino" href="#destinoOne" aria-expanded="false" aria-controls="destinoOne">
				        Como Llegar Uno <img class="pull-right" src="img/iconos/ico-toggle.svg">
				        </a>
				      </h4>
				    </div>
				    <div id="destinoOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>

				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title upper titulo-panel">
				        <a class="clearfix" role="button" data-toggle="collapse" data-parent="#destino" href="#destinoTwo" aria-expanded="false" aria-controls="destinoTwo">
				        Como Llegar dos <img class="pull-right" src="img/iconos/ico-toggle.svg">
				        </a>
				      </h4>
				    </div>
				    <div id="destinoTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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