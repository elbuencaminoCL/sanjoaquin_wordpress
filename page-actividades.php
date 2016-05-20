<?php
    /*
    Template Name: Actividades
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

			<div class="container extrapro">
				<?php if( get_field('_subtitulo_bloque_1') ): ?>
                    <?
                        $subtitle1 = get_field('_subtitulo_bloque_1');
                        $text1 = get_field('_texto_introduccion_1');
                    ?>
                    <h1 class="upper"><?php echo $subtitle1; ?></h1>
					<br>
					<h2 class="t-lato">
						<?php echo $text1; ?>
					</h2>
					<br>
                <?php endif; wp_reset_postdata(); ?>			

				<div class="row cards-talleres">
					<?php
						$selecciones = new WP_Query( array(
					        'post_type' => 'selecciones',
					        'posts_per_page' => -1
					    ) );
					    if ( $selecciones->have_posts() ) : while ( $selecciones->have_posts() ) : $selecciones->the_post();
					?>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="caluga-taller shadow">
								<div class="col-sm-5 col-xs-12 foto-taller">
									<?php
										if ( has_post_thumbnail() ) {
											echo get_the_post_thumbnail($selecciones->ID, 'act', array('class' => 'img-responsive'));
										} else {
											echo '<img src="'.get_bloginfo('template_directory').'/img/gen450.png" class="img-responsive" />';
										}
									?>
								</div>

								<div class="col-sm-7 col-xs-12 info-taller t-lato">
									<h4 class="t-exo"><? the_title();?></h4>
									<?php if( get_field('_profesor_a_cargo') ): ?>
			                            <h5 class="t-exo"><?php the_field('_profesor_a_cargo'); ?></h5>
			                        <?php endif; ?>
			                        <?php if( get_field('_modalidad') ): ?>
			                            <p><span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/ico-taller-modalidad.svg"></span>Modalidad: <?php the_field('_modalidad'); ?></p>
			                        <?php endif; ?>
			                        <?php if( get_field('_lugar_talleres') ): ?>
			                            <p><span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/ico-taller-lugar.svg"></span>Lugar: <?php the_field('_lugar_talleres'); ?></p>
			                        <?php endif; ?>
									
									<div class="row">
										<a class="center upper btn-default btn-block btn-lg t-exo" href="<? the_permalink();?>">Más Información</a>
									</div>
								</div>
							</div>
						</div>
					<? endwhile; endif; wp_reset_postdata(); ?>
				</div>

				<?php if( get_field('_subtitulo_bloque_2') ): ?>
                    <?
                        $subtitle2 = get_field('_subtitulo_bloque_2');
                        $text2 = get_field('_texto_intro_2');
                    ?>
                    <h1 class="upper"><?php echo $subtitle2; ?></h1>
					<br>
					<h2 class="t-lato"><?php echo $text2; ?></h2>
					<br>
                <?php endif; wp_reset_postdata(); ?>	

				<nav id="nav-ciclos" class="relative" role="navigation">
					<ul class="nav nav-pills">
						<li role="presentation" class="filter" data-filter="all">TODAS</li>
					  	<? echo get_custom_terms('actividades-extraprogramaticas',$args);?>
					</ul>

					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ciclos-nav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand hidden show-xs" href="<?php bloginfo('wpurl'); ?>/ciclos/">Ciclos</a>
					</div>			 
				</nav>
				<br>

				<div class="row cards-talleres">
					<?php
						$actividades = new WP_Query( array(
					        'post_type' => 'actividades',
					        'posts_per_page' => -1
					    ) );
					    if ( $actividades->have_posts() ) : while ( $actividades->have_posts() ) : $actividades->the_post();
					    $terms = get_the_terms( $post->ID, 'actividades-extraprogramaticas' );
					?>
						<div class="col-md-4 col-sm-6 col-xs-12 mix <? foreach($terms as $term){ echo $term->slug.' ';} ?> ">
							<div class="caluga-taller shadow">
								<div class="col-sm-5 col-xs-12 foto-taller">
									<?php
										if ( has_post_thumbnail() ) {
											echo get_the_post_thumbnail($actividades->ID, 'act', array('class' => 'img-responsive'));
										} else {
											echo '<img src="'.get_bloginfo('template_directory').'/img/gen450.png" class="img-responsive" />';
										}
									?>
								</div>

								<div class="col-sm-7 col-xs-12 info-taller t-lato">
									<h4 class="t-exo"><? the_title();?></h4>
									<?php if( get_field('_profesor_a_cargo') ): ?>
			                            <h5 class="t-exo"><?php the_field('_profesor_a_cargo'); ?></h5>
			                        <?php endif; ?>
			                        <?php if( get_field('_modalidad') ): ?>
			                            <p><span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/ico-taller-modalidad.svg"></span>Modalidad: <?php the_field('_modalidad'); ?></p>
			                        <?php endif; ?>
			                        <?php if( get_field('_lugar_talleres') ): ?>
			                            <p><span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/ico-taller-lugar.svg"></span>Lugar: <?php the_field('_lugar_talleres'); ?></p>
			                        <?php endif; ?>
									
									<div class="row">
										<a class="center upper btn-default btn-block btn-lg t-exo" href="<? the_permalink();?>">Más Información</a>
									</div>
								</div>
							</div>
						</div>
					<? endwhile; endif; wp_reset_postdata(); ?>
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