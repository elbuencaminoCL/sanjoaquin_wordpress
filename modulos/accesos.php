                    <?php if( have_rows('_accesos_directos') ): ?>
                        <?php while( have_rows('_accesos_directos') ): the_row(); 
                            $image = get_sub_field('_icono_acceso');
                            $titulo = get_sub_field('_titulo_acceso');
                            $link = get_sub_field('_enlace_acceso_directo');
                        ?>
                            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <a class="block clearfix" href="<?php echo $link; ?>">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-4">
                                        <img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $titulo ?>" />
                                    </div>
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-8">
                                        <?php echo $titulo; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>