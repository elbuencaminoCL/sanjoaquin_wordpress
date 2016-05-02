        <!--FOOTER-->
    <? if(is_page('inicio') || is_front_page()) { ?>
        <footer id="footer" class="clearfix">
    <? } else { ?>
        <footer id="footer" class="clearfix margen-footer">
    <? } ?>
            <div id="footer-pic">
                <img src="<?php bloginfo('template_directory'); ?>/img/footer.jpg">
            </div>
            <div class="container">
                <div class="row">
                    <div class="center clearfix">
                        <img class="img-responsive logo" src="<?php bloginfo('template_directory'); ?>/img/logo-footer.png">
                        <div class="pull-right clearfix">
                            <p>Siguenos en:</p>
                            <?php $options = get_option('csmlc_theme_options');
                                if ($options['facebook']) {
                                    echo '<a href="'.$options['facebook'].'" class="block pull-right">';
                                        echo '<img class="img-responsive" src="'.get_bloginfo('template_directory').'/img/iconos/ico-facebook.png">';
                                    echo '</a>';
                                } 
                            ?>
                            <?php $options = get_option('csmlc_theme_options');
                                if ($options['twitter']) {
                                    echo '<a href="'.$options['twitter'].'" class="block pull-right">';
                                        echo '<img class="img-responsive" src="'.get_bloginfo('template_directory').'/img/iconos/ico-twitter.png">';
                                    echo '</a>';
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <?php $options = get_option('csmlc_theme_options');
                                if ($options['direccion']) {
                                    echo $options['direccion'];
                                } 
                            ?>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            Copyright©2015 - Colegio Santa María de Lo Cañas
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <?php $options = get_option('csmlc_theme_options');
                                if ($options['datos_contacto']) {
                                    echo $options['datos_contacto'];
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>          
        </footer>
        <!--/FOOTER-->
    </div>

    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.lettering.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('li.dropdown ul').addClass('dropdown-menu');
            $(".carousel-inner .item:first-child, .carousel-indicators li:first-child").addClass('active');
        });
    </script>
    <? if(is_page('infraestructura')) { ?>
        <script src="<?php bloginfo('template_directory'); ?>/js/infra.js"></script>
    <? } ?>
    <? if(is_page('extra-programaticas')) { ?>
        <script src="<?php bloginfo('template_directory'); ?>/js/jquery.mixitup.js"></script>
    <? } ?>
</body>

</html>