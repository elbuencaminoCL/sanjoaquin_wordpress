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
						<?
							$izquierda = get_field('_contenido_bloque_izquierda');
							echo $izquierda;
						?>
					</div>
					<div class="col-sm-5 col-xs-12">
						<?
							$derecha = get_field('_contenido_bloque_derecha');
							echo $derecha;
						?>
					</div>
				</div>

				<div id="lugares" class="dropdown">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Selecciona un punto para ver más información<span class="glyphicon glyphicon-hand-up"></span>
					</button>
					<ul id="lista-cuadros" class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<?php 
                            $infraestructura = array (
                                'post_type'  => 'infraestructura',
                                'posts_per_page' => -1
                            );
                            $infra = new WP_Query( $infraestructura );
                            if ( $infra->have_posts() ) {
                                while ( $infra->have_posts() ) : $infra->the_post();
                        ?>
							<li>
								<?
			                        $selected = get_field('_ubicacion');
			                        if ($selected == 'a') {
										echo '<a id="botonA"><span>A</span>';
									} 
									if($selected == 'b') {
										echo '<a id="botonB"><span>B</span>';
									} 
									if($selected == 'c') {
										echo '<a id="botonC"><span>C</span>';
									}
									if($selected == 'd') {
										echo '<a id="botonD"><span>D</span>';
									}
									if($selected == 'e') {
										echo '<a id="botonE"><span>E</span>';
									}
									if($selected == 'f') {
										echo '<a id="botonF"><span>F</span>';
									}
									if($selected == 'g') {
										echo '<a id="botonG"><span>G</span>';
									}
									if($selected == 'h') {
										echo '<a id="botonH"><span>H</span>';
									}
									if($selected == 'i') {
										echo '<a id="botonI"><span>I</span>';
									}
									if($selected == 'j') {
										echo '<a id="botonJ"><span>J</span>';
									}
									if($selected == 'k') {
										echo '<a id="botonK"><span>K</span>';
									}
									if($selected == 'l') {
										echo '<a id="botonL"><span>L</span>';
									}
									if($selected == 'm') {
										echo '<a id="botonM"><span>M</span>';
									}
									if($selected == 'n') {
										echo '<a id="botonN"><span>N</span>';
									}
									if($selected == 'o') {
										echo '<a id="botonO"><span>O</span>';
									}
									if($selected == 'p') {
										echo '<a id="botonP"><span>P</span>';
									}
									if($selected == 'q') {
										echo '<a id="botonQ"><span>Q</span>';
									}
									if($selected == 'r') {
										echo '<a id="botonR"><span>R</span>';
									}
									if($selected == 's') {
										echo '<a id="botonS"><span>S</span>';
									}
									if($selected == 't') {
										echo '<a id="botonT"><span>T</span>';
									}
									if($selected == 'u0') {
										echo '<a id="botonU"><span>U</span>';
									}
									if($selected == 'v') {
										echo '<a id="botonV"><span>V</span>';
									}
									if($selected == 'w') {
										echo '<a id="botonW"><span>W</span>';
									}
									if($selected == 'x') {
										echo '<a id="botonX"><span>X</span>';
									}
									if($selected == 'y') {
										echo '<a id="botonY"><span>Y</span>';
									}
									if($selected == 'z') {
										echo '<a id="botonZ"><span>Z</span>';
									}
								?>
										<? the_title();?>
									</a>
							</li>
						<?
                                endwhile;
                                echo '<li><a id="toggle-lugares"><span class="glyphicon glyphicon-menu-up"></span></a></li>';
                                wp_reset_postdata();
                            }
                        ?>						
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
                      	<?
			                $selected = get_field('_ubicacion');
	                        if ($selected == 'a') {
								echo '<div id="cuadroA" class="cuadro dropdown open">';
							} 
							if($selected == 'b') {
								echo '<div id="cuadroB" class="cuadro dropdown open">';
							} 
							if($selected == 'c') {
								echo '<div id="cuadroC" class="cuadro dropdown open">';
							} 
							if($selected == 'd') {
								echo '<div id="cuadroD" class="cuadro dropdown open">';
							} 
							if($selected == 'e') {
								echo '<div id="cuadroE" class="cuadro dropdown open">';
							} 
							if($selected == 'f') {
								echo '<div id="cuadroF" class="cuadro dropdown open">';
							} 
							if($selected == 'g') {
								echo '<div id="cuadroG" class="cuadro dropdown open">';
							} 
							if($selected == 'h') {
								echo '<div id="cuadroH" class="cuadro dropdown open">';
							}
							if($selected == 'i') {
								echo '<div id="cuadroI" class="cuadro dropdown open">';
							}
							if($selected == 'j') {
								echo '<div id="cuadroJ" class="cuadro dropdown open">';
							}
							if($selected == 'k') {
								echo '<div id="cuadroK" class="cuadro dropdown open">';
							}
							if($selected == 'l') {
								echo '<div id="cuadroL" class="cuadro dropdown open">';
							}
							if($selected == 'm') {
								echo '<div id="cuadroM" class="cuadro dropdown open">';
							}
							if($selected == 'n') {
								echo '<div id="cuadroN" class="cuadro dropdown open">';
							}
							if($selected == 'o') {
								echo '<div id="cuadroO" class="cuadro dropdown open">';
							}
							if($selected == 'p') {
								echo '<div id="cuadroP" class="cuadro dropdown open">';
							}
							if($selected == 'q') {
								echo '<div id="cuadroQ" class="cuadro dropdown open">';
							}
							if($selected == 'r') {
								echo '<div id="cuadroR" class="cuadro dropdown open">';
							}
							if($selected == 's') {
								echo '<div id="cuadroS" class="cuadro dropdown open">';
							}
							if($selected == 't') {
								echo '<div id="cuadroT" class="cuadro dropdown open">';
							}
							if($selected == 'u') {
								echo '<div id="cuadroU" class="cuadro dropdown open">';
							}
							if($selected == 'v') {
								echo '<div id="cuadroV" class="cuadro dropdown open">';
							}
							if($selected == 'w') {
								echo '<div id="cuadroW" class="cuadro dropdown open">';
							}
							if($selected == 'x') {
								echo '<div id="cuadroX" class="cuadro dropdown open">';
							}
							if($selected == 'y') {
								echo '<div id="cuadroy" class="cuadro dropdown open">';
							}
							if($selected == 'z') {
								echo '<div id="cuadroZ" class="cuadro dropdown open">';
							}
						?>
                            <h3 class="btn dropdown-toggle clearfix upper">
								<? the_title();?> <span class="pull-right cerrar-cuadro glyphicon glyphicon-remove"></span>
							</h3>
							<article class="dropdown-menu">
								<? echo get_gallery_images();?>
								<? the_content();?>
							</article>
						</div>
                    <?
                        endwhile;
                        wp_reset_postdata();
                        }
                    ?>
				</div>
			</div>

			<? 
				if(has_post_thumbnail()){
				    echo '<div id="mapa" class="hidden-xs">'.get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-responsive')).'</div>';
				} 
			?>

		<?php endwhile; else: ?>
            <div class="col-xs-12">
                <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
            </div>
        <?php endif; ?>
	</div>
	<!--/main-->

<?php get_footer(); ?>