            <div id="carrusel" class="carousel slide" data-ride="carousel">
                <?php 
                    $args = array (
                        'category_name'  => 'slider',
                        'posts_per_page' => '10',
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                    echo '<ol class="carousel-indicators">';
                        $i=0; while ( $query->have_posts() ) : $query->the_post();
                            echo '<li data-target="#carrusel" data-slide-to="'.$i.'"></li>';
                        ++$i; endwhile;  
                    echo '</ol>';
                    } else {
                        echo '<p>No se han encontrado posts para esta categoría.</p>';
                    }
                    wp_reset_postdata();
                ?>
                <?php 
                    $args = array (
                        'category_name'  => 'slider',
                        'posts_per_page' => '10',
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        echo '<div class="carousel-inner" role="listbox">';
                        while ( $query->have_posts() ) : $query->the_post();
                        $excerpt= apply_filters('the_excerpt', get_post_field('post_excerpt', $query->ID));
                ?>
                    <div class="item">
                        <? echo get_the_post_thumbnail($post->ID, 'slider', array('class' => 'img-responsive')); ?>
                        <div class="container">
                            <div class="carousel-caption">
                                <div class="clearfix">
                                    <h1><? the_title();?></h1>
                                </div>
                                <div class="clearfix">
                                    <h2><? echo $excerpt; ?></h2>
                                </div>
                                <p><a id="btn-slider" class="btn btn-lg btn-default shadow" href="#" role="button">Ver Proyecto Educativo</a></p>
                            </div>
                        </div>
                    </div>
                <?
                        endwhile;
                        echo '</div>';
                    } else {
                        echo '<p>No se han encontrado posts para esta categoría.</p>';
                    }
                    wp_reset_postdata();
                ?>
                <a class="left carousel-control" href="#carrusel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carrusel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>