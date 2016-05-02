<?php
	/*
	Template Name: Noticias
	*/
?>

<?php get_header(); ?>
	<!--main-->
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
				<div class="row">
					<!--Burbuja alerta para suscribirse-->
					<div class="alert alert-warning alert-dismissible burbuja-alerta" role="alert">
						<div class="col-sm-5 col-xs-12">
							<h4 class="t-exo">Suscríbete a nuestro boletín y recibe todos los eventos en tu mail</h4>
						</div>

						<div class="col-sm-4 col-xs-12">
							<input type="mail" placeholder="Escribe aquí tu mail"></input>
						</div>

						<div class="col-sm-2 col-xs-12">
							<button type="submit" class="btn-primary btn-lg btn-block btn-suscribirse">Suscribirse</button>
						</div>

						<div class="col-sm-1 col-xs-12">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><img src="<? bloginfo('template_directory');?>/img/iconos/cerrar.svg"></span></button>
						</div>
					</div><!--/Burbuja alerta para suscribirse-->					

					<div id="ultimas-noticias" class="clearfix">
						<h1 class="upper t-exo">Últimas Noticias</h1>
						<?php
						    $featured_posts = new WP_Query( array(
						        'post_type' => 'post',
						        'posts_per_page' => 1,
						        'tax_query' => array(
						            array(
						                'taxonomy' => 'pts_feature_tax',
						                'field' => 'slug',
						                'terms' => array( 'featured' ),
						            )
						        )
						    ) );
						    if ( $featured_posts->have_posts() ) : while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
						?>
							<div class="col-md-9 col-sm-12">							
								<div class="row noti-principal">
									<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 detalle">
										<h4><? the_title();?></h4>
										<h5><?php echo get_the_date(); ?></h5>
										<?
											$excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
											if($excerpt) {
	                                            echo '<p>'.$excerpt.'</p>';
	                                        } else {
	                                            echo content(20);
	                                        }
										?>
										<a class="btn-primary btn-lg btn-block ver-noticia-principal" href="<? the_permalink();?>">Ver Noticia</a>
									</div>
									<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 img-noti-principal hidden-xs">
										<? 
											if(has_post_thumbnail()){
				                                echo get_the_post_thumbnail($post->ID, 'news-featured', array('class' => 'img-responsive'));
				                            } else {
				                                echo '<img src="'.get_bloginfo('template_directory').'/img/default-news.jpg" class="img-responsive" alt="Colegio Santa María de Lo Cañas" />';
				                            }
				                        ?>
									</div>
								</div>
							</div>
						<? endwhile; endif; ?>

						<div class="col-sm-3 col-xs-12 categorias-noti">
							<nav class="navbar shadow" role="navigation">
								<div class="clearfix text-center">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cat-noticias">
										<img class="img-responsive" src="http://placehold.it/24x24">
									</button>
									<h4 class="t-exo">Categorías</h4>
								</div>
					 
								<div class="collapse navbar-collapse padd-cero" id="">
									<?php
										global $ancestor;
										$childcats = get_categories('child_of=19&hide_empty=0');
										echo '<ul class="nav nav-pills nav-stacked">';
											echo '<li role="presentation" class="active"><a href="#">TODAS</a></li>';
											foreach ($childcats as $childcat) {
												if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
												    echo '<li role="presentation"><a href="'.get_category_link($childcat->cat_ID).'">';
												    echo $childcat->cat_name . '</a>';
												    echo '</li>';
												    $ancestor = $childcat->cat_ID;
												}
											}
										echo '</ul>';
									?>
								</div>
							</nav>
						</div>
					</div>

					<div id="noticias" class="block-image clearfix block noti-page">
						<div class="container">
							<div class="row">
								<div class="flex">
									<?php 
			                            $news = array (
			                                'category_name'  => 'noticias',
			                                'posts_per_page' => 8
			                            );
			                            $new = new WP_Query( $news );
			                            if ( $new->have_posts() ) {
			                                while ( $new->have_posts() ) : $new->the_post();
			                                    $excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $new->ID));
			                                    echo '<div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 car-noticia">';
			                                        echo '<div class="col col-lg-12 col-md-12 col-sm-12 hidden-xs">';
			                                            echo '<div class="row">';
			                                                echo '<a class="block" href="'.get_the_permalink().'">';
			                                                if(has_post_thumbnail()){
			                                                    echo get_the_post_thumbnail($post->ID, 'news-home', array('class' => 'img-responsive'));
			                                                } else {
			                                                    echo '<img src="'.get_bloginfo('template_directory').'/img/default-news.jpg" class="img-responsive" alt="Colegio Santa María de Lo Cañas" />';
			                                                }
			                                                echo '</a>';
			                                            echo '</div>';
			                                        echo '</div>';
			                                        echo '<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 detalle">';
			                                            echo '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
			                                            echo '<h5>'.get_the_date().'</h5>';
			                                            if($excerpt) {
			                                                echo '<p class="hidden-xs">'.$excerpt.'</p>';
			                                            } else {
			                                                echo '<p class="hidden-xs">'.content(12).'</p>';
			                                            }
			                                            echo '<a class="ver-mas" href="'.get_the_permalink().'">Ver Noticia</a>';
			                                        echo '</div>';
			                                    echo '</div>';
			                                endwhile;
			                                wp_reset_query();
			                            }
			                        ?>
			                    </div>
								<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
									<a href="<?php bloginfo('wpurl'); ?>/seccion/noticias/" class="todas-noticias">Ver todas las noticias</a>
								</div>
							</div>
						</div>
					</div><!--/Noticias generales - otras Noticias-->
				</div><!-- /ROW -->					
			</div>
		<?php endwhile; else: ?>
            <div class="col-xs-12">
                <p class="textos">Lo sentimos, el contenido que buscas no se encuentra disponible.</p>
            </div>
        <?php endif; ?>
	</div><!--/main-->
<?php get_footer(); ?>