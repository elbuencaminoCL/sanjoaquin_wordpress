<?php
    /*
    Template Name: Horarios
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

			<?php
				global $post;
				if ( has_excerpt( $post->ID ) ) {
					$excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
				    echo '<div class="center upper descripcion-guia">';
					    echo '<img src=""'.get_bloginfo('template_directory').'/img/iconos//ico-guia.svg"><br>';
						echo $excerpt;
					echo '</div>';
				} 
			?>

			<?php
                $args = array(
                    'post_type'      => 'horarios',
                    'posts_per_page' => -1
                );
                $loop = new WP_Query( $args );
                echo '<div id="buscador-guias">';
                if ( $loop->have_posts() ) {
                ?>
                	<div class="container clearfix">
						<div class="row">
							<div class="col-md-4 col-sm-12 col-xs-12"><h2 class="upper text-right">Horarios de clases</h2></div>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle t-lato" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										Seleccione un curso para ver los horarios
										<span class="glyphicon glyphicon-menu-down"></span>
									</button>
				                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				                        get_custom_terms('horarios-cursos', $args_custom);
				                    </ul>
				                </div>
				            </div>
				            <div class="col-md-4 col-sm-12 col-xs-12">
								<a class="btn btn-primary btn-md btn-block btn-buscar" href="guias_seleccion.html" role="button">BUSCAR</a>
							</div>
				                    <? 
				                    	while ( $loop->have_posts() ) : $loop->the_post();
					                        $terms = get_the_terms( $post->ID, 'horarios-cursos' );
					                        if ( !empty( $terms ) ){
				                                echo '<div class="mix col-lg-4 col-md-4 col-sm-4 col-xs-12';
					                                $i = 1; $terms_size = count($terms_size) - 1;
												    foreach($terms as $term){
											            $term = array_shift( $terms );
											            echo ' '.$term->slug;
											            $i++; 
											        }
												echo '" data-myorder="'.$i.'">';
				                                    echo '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail($post->ID, 'gal', array('class' => 'img-responsive')).'</a>';
				                                echo '</div>';
				                            }
				                        endwhile;
				                        } else {
				                                echo __( 'No se han encontrado Horarios' );
				                        }
				                    ?>
		                </div>
		            </div>
                <? 
                wp_reset_postdata();
                echo '</div>';
            ?>

			<div id="buscador-guias">
				<div class="container clearfix">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12"><h2 class="upper text-right">Horarios de clases</h2></div>
						<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle t-lato" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Seleccione un curso para ver los horarios
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