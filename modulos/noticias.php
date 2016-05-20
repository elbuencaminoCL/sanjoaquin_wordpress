                        <?php 
                            $news = array (
                                'category_name'  => 'noticias',
                                'posts_per_page' => 4
                            );
                            $new = new WP_Query( $news );
                            if ( $new->have_posts() ) {
                                while ( $new->have_posts() ) : $new->the_post();
                                    $excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $new->ID));
                                    echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 card-noticia hidden-sm">';
                                        echo '<div class="col col-lg-12 shadow">';
                                            echo '<div class="row">';
                                                echo '<div class="col col-lg-12 col-md-12 col-sm-12 foto-titulo">';
                                                    echo '<div class="row">';
                                                        echo '<a class="block" href="'.get_the_permalink().'">';
                                                        if(has_post_thumbnail()){
                                                            echo get_the_post_thumbnail($post->ID, 'news-home', array('class' => 'img-responsive'));
                                                        } else {
                                                            echo '<img src="'.get_bloginfo('template_directory').'/img/default-news.jpg" class="img-responsive" alt="Colegio Santa María de Lo Cañas" />';
                                                        }
                                                        echo '</a>';
                                                        echo '<div class="opacidad-card"></div>';
                                                        echo '<p class="t-exo">'.get_the_title().'</p>';
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 detalle">';
                                                    echo '<p class="t-mini t-exo fecha-noti"><span><img src="'.get_bloginfo('template_directory').'/img/iconos/calendario-mini-blanco.svg"></span>'.get_the_date().'</p>';
                                                    if($excerpt) {
                                                        echo '<p class="hidden-xs">'.$excerpt.'</p>';
                                                    } else {
                                                        echo '<p class="hidden-xs">'.content(20).'</p>';
                                                    }
                                                    echo '<a class="ver-mas upper t-exo" href="#">Ver Noticia</a>';     
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                endwhile;
                                wp_reset_postdata();
                            }
                        ?>