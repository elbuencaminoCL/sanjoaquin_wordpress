<?php
    /*
    Template Name: Home
    */
?>

<?php get_header(); ?>
    <div id="main" class="clearfix">
        <div class="cont-header">
            <? include_once('modulos/slider.php');?>
        </div>
        <div id="proyecto" class="clearfix">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <? the_content();?>
                        <?php if( get_field('_agregar_enlace') ): ?>
                            <div class="cont-button clearfix">
                                <a href="<?php the_field('_agregar_enlace'); ?>" class="button button-home">Ver proyecto educacional</a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <div id="accesos-directos">
            <div class="container">
                <div class="center">
                    <h1>Accesos Directos</h1>
                </div>
                <div class="row">
                    <? include_once('modulos/accesos.php');?>
                </div>
            </div>
        </div>

        <div id="segmentos" class="clearfix block">
            <?php if(function_exists('home_pages')) home_pages("id=".$post->ID."&class=hp&childs=true"); ?>
        </div>

        <div id="noticias" class="block-image clearfix block">
            <div class="container">             
                <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
                    <h3>Últimas noticias</h3>
                </div>
                <div class="row">
                    <? include_once('modulos/noticias.php');?>
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
                        <a href="<?php bloginfo('wpurl'); ?>/noticias/" class="todas-noticias">Ver todas las noticias</a>
                    </div>
                </div>
            </div>
        </div>          

        <div id="main-bottom">
            <div class="container">
                <div class="row">
                    <div id="extra" class="col col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                        <h3>EXTRAPROGRAMÁTICAS</h3>
                        <?php if( get_field('_titulo_banner_1') ): ?>
                            <?
                                $title1 = get_field('_titulo_banner_1');
                                $imagen1 = get_field('_imagen_banner_1');
                                $enlace1 = get_field('_enlace_banner_1');
                            ?>
                            <div class="taller">
                                <img class="img-responsive hidden-xs" src="<?php echo $imagen1; ?>" alt="<?php echo $title1; ?>" />
                                <div class="opacidad-taller"></div>
                                <div>
                                    <a class="btn-extra" href="<?php echo $enlace1; ?>"><?php echo $title1; ?></a>
                                </div>
                            </div>
                        <?php endif; wp_reset_postdata(); ?>
                        <?php if( get_field('_titulo_banner_2') ): ?>
                            <?
                                $title2 = get_field('_titulo_banner_2');
                                $imagen2 = get_field('_imagen_banner_2');
                                $enlace2 = get_field('_enlace_banner_2');
                            ?>
                            <div class="taller">
                                <img class="img-responsive hidden-xs" src="<?php echo $imagen2; ?>" alt="<?php echo $title2; ?>" />
                                <div class="opacidad-taller"></div>
                                <div>
                                    <a class="btn-extra" href="<?php echo $enlace2; ?>"><?php echo $title2; ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <a href="<?php bloginfo('wpurl'); ?>/extra-programaticas/" class="ver-todos pull-right">Ver Todos</a>
                    </div>

                    <div id="calendario" class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Calendario</h3>
                        <? include_once('modulos/calendar.php');?>
                        <a href="<?php bloginfo('wpurl'); ?>/calendario-de-eventos/" class="ver-todos pull-right">Ver todo el Calendario</a>
                    </div>
                </div>
            </div>              
        </div>
    </div>
<?php get_footer(); ?>