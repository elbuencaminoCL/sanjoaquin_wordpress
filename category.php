<?php get_header(); ?>
	<!--main-->
	<div id="main" class="clearfix">
		<div id="foto-encabezado" class="absolute">
			<?
				print apply_filters( 'taxonomy-images-queried-term-image', '', array(
				    'image_size' => 'encabezado'
				) );
			?>
		</div>
		<h2 class="titulo-seccion center relative"><span><?php single_cat_title(); ?></span></h2>

		<div class="container relative">
			<ul>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li class="clearfix">
						<?php
							if ( has_post_thumbnail() ) {
								echo '<div class="col-sm-3">';
									echo '<a class="block" href="'.get_the_permalink($post->ID).'">';
							    		echo get_the_post_thumbnail($post->ID, 'news', array('class' => 'img-responsive'));
							    	echo '</a>';
							    echo '</div>';
							    echo '<div class="col-sm-9">';
							} else {
								echo '<div class="col-sm-12">';
							}
						?>
							<h5><a href="<? the_permalink();?>"><? the_title();?></a></h5>
							<?php
								global $post;
								if ( has_excerpt( $post->ID ) ) {
									$excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
								    echo '<div class="center intro">';
										echo $excerpt;
									echo '</div>';
								}
							?>
							<a href="<? the_permalink();?>" class="pull-right btn-primary btn-blck">Ver más</a>
						</div>
					</li>
				<?php endwhile; else: ?>
					<p>Lo sentimos, no hay resultados para lo que buscas. Te sugerimos realizar una nueva b&uacute;squeda.</p>
				<?php endif; ?>
			</ul>

			<div class="center">
				<nav>
					<?php wp_pagenavi(); ?>
						<ul class="pagination">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>

				</div>
									
			</div><!-- CONTAINER -->

		</div><!--/main-->
<?php get_footer(); ?>