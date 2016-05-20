<?php
    /*
    Template Name: Departamento
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
					    echo '<div class="center intro bajada">';
					    	echo '<img src="'.get_bloginfo('template_directory').'/img/iconos/ico-globo.svg"><br>';
							echo $excerpt;
						echo '</div>';
					} 
				?>

				<div id="desc-departamento" class="clearfix">
					<div class="row">
					<?php
						if ( has_post_thumbnail() ) {
							echo '<div class="col-sm-6 col-xs-12">';
						    	echo get_the_post_thumbnail($post->ID, 'generica', array('class' => 'img-responsive'));
							echo '</div>';
							echo '<div class="col-md-6 col-sm-12 col-xs-12 desc-departamento">';
								echo get_the_content();
							echo '</div>';
						} else {
							echo get_the_content();
						}
					?>
					</div>
				</div>

				<h3 class="upper titulo-tres clearfix">Noticias del Departamento</h3>

				<div id="noticias" class="clearfix">
					<div class="row">
						<?php 
							$posts = get_field('_noticias_departamento');
							$exc= apply_filters('the_excerpt', get_post_field('post_excerpt', $posts->ID));
						if( $posts ): ?>
						    <?php foreach( $posts as $post): ?>
						        <?php setup_postdata( $post); ?>
						        
						        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 card-noticia">
						        	<div class="col-xs-12 shadow">
						        		<div class="row">
						        		
						        			<div class="col col-lg-12 col-md-12 col-sm-12 foto-titulo">
						        				<div class="row">
						        					<a class="block" href="<? the_permalink();?>">
						        						<?
			                                				if(has_post_thumbnail()){
			                                            		echo get_the_post_thumbnail($post->ID, 'news-related', array('class' => 'img-responsive'));
															} else {
			                                            		echo '<img src="'.get_bloginfo('template_directory').'/img/default-news.jpg" class="img-responsive" alt="Colegio Santa María de Lo Cañas" />';
															}
														?>
						        					</a>
						        					<div class="opacidad-card"></div>';
                                                    <p class="t-exo"><?php the_title(); ?></p>';
						        				</div>
						        			</div>
						        			
						        			<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 detalle">
						        				<p class="t-mini t-exo fecha-noti">
						        					<span><img src="<?php bloginfo('template_directory'); ?>/img/iconos/calendario-mini-blanco.svg"></span><? the_date();?>
						        				</p>
						        				<?
						        					if($excerpt) {
                                                        	echo '<p class="hidden-xs">'.$excerpt.'</p>';
                                                    } else {
                                                        echo '<p class="hidden-xs">'.content(20).'</p>';
                                                    }
                                                ?>
                                                <a class="ver-mas upper t-exo" href="<? the_permalink();?>">Ver Noticia</a>
						        			</div>
			                                										
							            </div>
							        </div>
						        </div>
						        
						        
						    
						    
						    <?php wp_reset_postdata(); ?>
						    <?php endforeach; ?>
						    
						<?php endif; ?>
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