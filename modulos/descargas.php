						<?php if( have_rows('_descargar') ): ?>
							<h2 class="titulo-reglamentos upper">Archivos descargables</h2>
							<div class="panel-body">
								<ul>
			                        <?php while( have_rows('_descargar') ): the_row(); 
			                            $titulo = get_sub_field('_titulo_archivo');
			                            $link = get_sub_field('_enlace_archivo');
			                        ?>
			                        	<li class="clearfix">	
									    	<p><?php echo $titulo; ?></p>
									    	<a class="pull-right btn btn-primary btn-descargar" href="<?php echo $link; ?>" target="_blank">
									    		<span class="hidden-xs">Descargar <?php echo $titulo; ?></span> <span class="glyphicon glyphicon-download-alt"></span>
									    	</a>
							    		</li>
			                        <?php endwhile;?>
			                    </ul>
			                </div>
			            <?php endif; wp_reset_postdata(); ?>