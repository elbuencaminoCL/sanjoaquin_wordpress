                            <?php 
                                $args = array (
                                    'post_type'          => 'tribe_events',
                                    'posts_per_archive_page' => '4',
                                );
                                $query = new WP_Query( $args );
                                if ( $query->have_posts() ) {
                                    while ( $query->have_posts() ) {
                                        $query->the_post();
                                        echo '<a href="'.get_the_permalink().'" class="block clearfix evento">';
                                            echo '<div class="col-sm-12">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-sm-3 col-xs-3 fecha">';
                                                        echo '<div>';
                                                            echo '<h4 class="upper">'.tribe_get_start_date(null, false, 'M').'</h4>';
                                                            echo '<h2>'.tribe_get_start_date(null, false, 'j').'</h2>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                    echo '<div class="col-sm-9 col-xs-9 event-desc">';
                                                        echo '<h4>'.$post->post_title.'</h4>';
                                                        echo '<p>'.excerpt(10).'</p>';
                                                        echo '<div class="col-sm-8 col-xs-6">';
                                                            echo '<div class="row">';
                                                                echo '<img src="'.get_bloginfo('template_directory').'/img/iconos/ico-lugar.svg"> '.tribe_get_venue();
                                                            echo '</div>';
                                                        echo '</div>';
                                                        echo '<div class="col-sm-4">';
                                                            echo '<div class="row">';
                                                                echo '<img src="'.get_bloginfo('template_directory').'/img/iconos/ico-hora.svg"> '.tribe_get_start_date( null, false, 'H:i' );
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</a>';
                                    }
                                } else {
                                    echo '<p>No se han encontrado posts para esta categoría.</p>';
                                }
                                wp_reset_postdata();
                            ?>