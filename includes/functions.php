<?php
if ( !defined('ABSPATH')) exit;
/**
 * Theme's Functions and Definitions
 * @file           functions.php
 * @package        csmlc 
**/

add_post_type_support('page', 'excerpt');
add_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

//=================================================================== IMAGES//   
function wpse_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_theme_support') ) {
        set_post_thumbnail_size( 200, 200, true ); 
    }
    if ( function_exists( 'add_image_size' ) ) { 
        add_image_size( 'encabezado', 2000, 250, array( 'center', 'center'));
        add_image_size( 'generica', 540, 360, array( 'center', 'center'));
        add_image_size( 'news', 300, 200, array( 'center', 'center'));
        add_image_size( 'news-home', 265, 150, array( 'center', 'center'));
        add_image_size( 'news-det', 870, 580, array( 'center', 'center'));
        add_image_size( 'news-featured', 600, 400, array( 'center', 'center'));
        add_image_size( 'gal', 360, 240, array( 'center', 'center'));
        add_image_size( 'banner', 555, 220, array( 'center', 'center'));
        add_image_size( 'child', 650, 350, array( 'center', 'center'));
        add_image_size( 'act', 150, 190, array( 'center', 'center'));
    }
} 
add_action( 'after_setup_theme', 'wpse_setup_theme' );

//=================================================================== SVG//
add_filter('upload_mimes', 'my_upload_mimes');
function my_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

//=================================================================== CUT OFF// 
function short_title($after = '', $length) {
    $mytitle = explode(' ', get_the_title(), $length);
    if (count($mytitle)>=$length) {
        array_pop($mytitle);
        $mytitle = implode(" ",$mytitle). $after;
    } else {
        $mytitle = implode(" ",$mytitle);
    }
    return $mytitle;
}

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

//=================================================================== CUSTOM ADMIN LOGO// 
function my_custom_login_logo() {
    echo '<style type="text/css">
        body.login {background-image:url('.get_bloginfo('template_directory').'/imag/back/bg-home.jpg) !important; background-position:center top;}
        h1 a { background-image:url('.get_bloginfo('template_directory').'/imag/logo/logo_csmlc_admin.png) !important; background-size:320px 67px !important; width:320px !important; height:67px !important;}
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

//=================================================================== REMOVE ADMIN MENUS// 
function remove_menus () {
global $menu;
    $restricted = array(__('Links'),__('Comments'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menus');

//=================================================================== CUSTOM FUNCTIONS//
/**
 * Get active section from Request URI
 * @return string post_name of the active section
 */
function section_from_url(){
	global $wpdb;
	$url = $_SERVER['REQUEST_URI'];
	$first_level_pages = $wpdb->get_results("SELECT ID, post_name, post_title FROM $wpdb->posts WHERE post_type = 'page' AND post_parent = 0 AND post_status = 'publish'");
	foreach ( $first_level_pages as $section ) {
		if ( stristr($url, '/'.$section->post_name.'/') ) $out = $section;
	}
	$out->post_title = apply_filters('the_title', $out->post_title);
	return $out;
}

/**
 * Get post/page/attachment ID by post_name (sanitized title)
 * @param string $name The post_name of the object
 * @return integer Object ID in $wpdb->posts
 */
function get_id_by_postname($name){
global $wpdb;
    return $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$name' AND post_status = 'publish'");
}

/**
 * Get permalink by the post_name of the post/page
 * @param string post_name of the object
 * @return string Object permalink
 */
function get_permalink_by_postname($name){
global $wpdb;
	return get_permalink($wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE (post_name = '$name' AND post_status = 'publish') AND (post_type = 'page' OR post_type = 'post')"));
}

function get_attachment_id_from_src ($link) {
    global $wpdb;
        $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
        return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
}

//=================================================================== GET CUSTOM TAXONOMY TERMS //
function get_custom_terms($taxonomies, $args_custom){
    $args_custom = array('orderby'=>'asc','hide_empty'=>true);
    $custom_terms = get_terms(array($taxonomies), $args_custom);
    foreach($custom_terms as $term){
        echo '<li class="filter" data-filter=".'.$term->slug.'" role="presentation">'.$term->name.'</li>';
    }
}

//=================================================================== PARENT PAGES//
function home_pages($args){
global $wpdb;
    $defaults = array( 'id' => $hpages->ID, 'class' => 'hpages', 'excerpt' => true, 'content' => false, 'childs' => false, 'exclude' => true );
    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if($exclude != 'false') $home_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_parent = ".$id.") AND (post_status = 'publish' AND menu_order >= 0) ORDER BY menu_order ASC LIMIT 3");
    else $home_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_parent = ".$id.") AND post_status = 'publish' ORDER BY menu_order ASC LIMIT 3");
    if(!empty($home_pages)){
        $i=0; $home_pages_size = count($home_pages) - 1;
        foreach($home_pages as $hpages){
            if ( $i === 0 ) $pos = ''; elseif ( $i === $home_pages_size ) $pos = 'bloque'; else $pos = 'medio';
            if($hpages->menu_order >= 0){
                echo '<div class="'.$pos.' col col-lg-4 col-md-4 col-sm-4 col-xs-12">';
                    echo '<div class="row">';
                        echo '<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-5">';
                            echo '<div class="row">';
                                echo get_the_post_thumbnail($hpages->ID, 'child', array('class' => 'img-responsive'));
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col col-lg-12 col-md-12 col-sm-12 col-xs-7">';
                            echo '<h3>'.$hpages->post_title.'</h3>';
                            $related1 = get_post_meta( $hpages->ID, '_titulo_relacionado_1', true);
                            $enlace1 = get_post_meta( $hpages->ID, '_enlace_relacionado_1', true);
                            $related2 = get_post_meta( $hpages->ID, '_titulo_relacionado_2', true);
                            $enlace2 = get_post_meta( $hpages->ID, '_enlace_relacionado_2', true);
                            $related3 = get_post_meta( $hpages->ID, '_titulo_relacionado_3', true);
                            $enlace3 = get_post_meta( $hpages->ID, '_enlace_relacionado_3', true);
                            $related4 = get_post_meta( $hpages->ID, '_titulo_relacionado_4', true);
                            $enlace4 = get_post_meta( $hpages->ID, '_enlace_relacionado_4', true);
                            echo '<ul>';
                                if($related1){
                                    echo '<li>';
                                        echo '<a href="'.$enlace1.'">'.$related1.'</a>';
                                    echo '</li>';
                                }
                                if($related2){
                                    echo '<li>';
                                        echo '<a href="'.$enlace2.'">'.$related2.'</a>';
                                    echo '</li>';
                                }
                                if($related3){
                                    echo '<li>';
                                        echo '<a href="'.$enlace3.'">'.$related3.'</a>';
                                    echo '</li>';
                                }
                                if($related4){
                                    echo '<li>';
                                        echo '<a href="'.$enlace4.'">'.$related4.'</a>';
                                    echo '</li>';
                                }
                            echo '</ul>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            $i++; } 
        }
    }
}

function esp_pages($args){
global $wpdb;
    $defaults = array( 'id' => $epages->ID, 'class' => 'epages', 'excerpt' => true, 'content' => false, 'childs' => false, 'exclude' => true );
    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if($exclude != 'false') $esp_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_name = 'seccion-especialidades' AND post_parent = ".$id.") AND (post_status = 'publish' AND menu_order >= 0) ORDER BY menu_order ASC LIMIT 1");
    else $esp_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_name = 'seccion-especialidades' AND post_parent = ".$id.") AND post_status = 'publish' ORDER BY menu_order ASC LIMIT 1");
    if(!empty($esp_pages)){
        $i = 0; $esp_pages_size = count($esp_pages) - 1;
        foreach($esp_pages as $epages){
            if($epages->menu_order >= 0){
                echo '<h2>'.$epages->post_excerpt.'</h2>';
                echo '<p>'.$epages->post_content.'</p>';
            $i++; }
        }
    }
}

function ciclos_pages($args){
global $wpdb;
    // Defaults
    $defaults = array( 'id' => $cpages->ID, 'class' => 'hpage', 'excerpt' => true, 'content' => false, 'childs' => false, 'exclude' => true );
    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if($exclude != 'false') $ciclos_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_parent = ".$id.") AND (post_status = 'publish' AND menu_order >= 0) ORDER BY menu_order ASC");
    else $ciclos_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_parent = ".$id.") AND post_status = 'publish' ORDER BY menu_order ASC");
    if(!empty($ciclos_pages)){
        $i = 0; $ciclos_pages_size = count($ciclos_pages) - 1;
        foreach($ciclos_pages as $cpages){
            if ( $i === 0 ) $pos = ''; elseif ( $i === $ciclos_pages_size ) $pos = 'bloque'; else $pos = 'bloque';
            if($cpages->menu_order >= 0){
                echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading" role="tab" id="headingOne">';
                        echo '<h4 class="panel-title clearfix">';
                            echo '<div class="absolute">';
                                echo get_the_post_thumbnail($cpages->ID, 'home', array('class' => 'img-responsive'));
                                echo '<img class="img-responsive" src="img/ciclo_01.jpg">';
                            echo '</div>';
                            echo '<a class="relative clearfix" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">';
                                echo '<span>'.get_the_title($cpages->ID).'</span> <img class="pull-right" src="'.get_bloginfo().'/img/iconos/ico-toggle.svg">';
                            echo '</a>';
                        echo '</h4>';
                    echo '</div>';
                    echo '<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
                        echo '<div class="panel-body">';
                            echo '<p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            $i++; }
        }
    }
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_actividades' );
function create_post_type_actividades() {
    register_post_type( 'actividades',
        array(
            'labels' => array(
                'name' => __('Act. Extraprogramáticas'),
                'singular_name' => __('Act. Extraprogramática'),
                'add_new' => __('Agregar Actividad'),
                'add_new_item' => __('Agregar nueva Actividad'),
                'edit_item' => __('Editar Actividad'),
                'new_item' => __('Nueva Actividad'),
                'all_items' => __('Todas las Actividades'),
                'view_item' => __('Ver Actividades'),
                'search_items' => __('Buscar Actividades')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-actividades', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

add_action('init', 'create_taxonomy_actividades', 0);
function create_taxonomy_actividades() {
    $labels = array(
        'name'                => __( 'Extraprogramáticas', 'taxonomy general name' ),
        'singular_name'       => __( 'Extraprogramática', 'taxonomy singular name' ),
        'search_items'        => __( 'Buscar en Extraprogramáticas' ),
        'all_items'           => __( 'Todas las Extraprogramáticas' ),
        'edit_item'           => __( 'Editar Extraprogramáticas' ), 
        'update_item'         => __( 'Actualizar Extraprogramáticas' ),
        'add_new_item'        => __( 'Agregar Extraprogramáticas' ),
        'menu_name'           => __( 'Extraprogramáticas' )
    );  
    $args = array(
        'hierarchical'        => true,
        'labels'              => $labels,
        'show_ui'             => true,
        'show_admin_column'   => true,
        'query_var'           => true,
    );
    register_taxonomy('actividades-extraprogramaticas', array('actividades'), $args);
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_selecciones' );
function create_post_type_selecciones() {
    register_post_type( 'selecciones',
        array(
            'labels' => array(
                'name' => __('Selecciones Deportivas'),
                'singular_name' => __('Selección Deportiva'),
                'add_new' => __('Agregar Selección'),
                'add_new_item' => __('Agregar nueva Selección'),
                'edit_item' => __('Editar Selección'),
                'new_item' => __('Nueva Selección'),
                'all_items' => __('Todas las Selecciones'),
                'view_item' => __('Ver Selecciones'),
                'search_items' => __('Buscar Selecciones')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-selecciones', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_infraestructura' );
function create_post_type_infraestructura() {
    register_post_type( 'infraestructura',
        array(
            'labels' => array(
                'name' => __('Infraestructura'),
                'singular_name' => __('Infraestructura'),
                'add_new' => __('Agregar post a Infraestructura'),
                'add_new_item' => __('Agregar nuevo post a Infraestructura'),
                'edit_item' => __('Editar post de Infraestructura'),
                'new_item' => __('Nuevo post de Infraestructura'),
                'all_items' => __('Todos los posts de Infraestructura'),
                'view_item' => __('Ver Infraestructura'),
                'search_items' => __('Buscar en Infraestructura')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-infraestructura', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_listas' );
function create_post_type_listas() {
    register_post_type( 'listas',
        array(
            'labels' => array(
                'name' => __('Listas de Útiles'),
                'singular_name' => __('Lista de Útiles'),
                'add_new' => __('Agregar listas'),
                'add_new_item' => __('Agregar nueva lista'),
                'edit_item' => __('Editar lista'),
                'new_item' => __('Nueva lista'),
                'all_items' => __('Todas las listas'),
                'view_item' => __('Ver listas'),
                'search_items' => __('Buscar listas')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-listas-de-utiles', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_plan' );
function create_post_type_plan() {
    register_post_type( 'planes',
        array(
            'labels' => array(
                'name' => __('Planes Lectores'),
                'singular_name' => __('Plan Lector'),
                'add_new' => __('Agregar plan'),
                'add_new_item' => __('Agregar nuevo plan'),
                'edit_item' => __('Editar plan'),
                'new_item' => __('Nuevo plan'),
                'all_items' => __('Todos los planes'),
                'view_item' => __('Ver planes'),
                'search_items' => __('Buscar planes')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-plan-lector', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_horarios' );
function create_post_type_horarios() {
    register_post_type( 'horarios',
        array(
            'labels' => array(
                'name' => __('Horarios de Clases'),
                'singular_name' => __('Horario de Clases'),
                'add_new' => __('Agregar horario'),
                'add_new_item' => __('Agregar nuevo horario'),
                'edit_item' => __('Editar horario'),
                'new_item' => __('Nuevo horario'),
                'all_items' => __('Todos los horarios'),
                'view_item' => __('Ver horarios'),
                'search_items' => __('Buscar horarios')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-horarios-de-clases', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

add_action('init', 'create_taxonomy_horarios', 0);
function create_taxonomy_horarios() {
    $labels = array(
        'name'                => __( 'Cursos', 'taxonomy general name' ),
        'singular_name'       => __( 'Curso', 'taxonomy singular name' ),
        'search_items'        => __( 'Buscar en Cursos' ),
        'all_items'           => __( 'Todos los Cursos' ),
        'edit_item'           => __( 'Editar Cursos' ), 
        'update_item'         => __( 'Actualizar Cursos' ),
        'add_new_item'        => __( 'Agregar Cursos' ),
        'menu_name'           => __( 'Cursos' )
    );  
    $args = array(
        'hierarchical'        => true,
        'labels'              => $labels,
        'show_ui'             => true,
        'show_admin_column'   => true,
        'query_var'           => true,
    );
    register_taxonomy('horarios-cursos', array('horarios'), $args);
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_reglamentos' );
function create_post_type_reglamentos() {
    register_post_type( 'reglamentos',
        array(
            'labels' => array(
                'name' => __('Reglamentos'),
                'singular_name' => __('Reglamento'),
                'add_new' => __('Agregar Reglamento'),
                'add_new_item' => __('Agregar nuevo Reglamento'),
                'edit_item' => __('Editar Reglamento'),
                'new_item' => __('Nuevo Reglamento'),
                'all_items' => __('Todos los Reglamentos'),
                'view_item' => __('Ver Reglamentos'),
                'search_items' => __('Buscar Reglamentos')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-reglamentos', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_galerias' );
function create_post_type_galerias() {
    register_post_type( 'galerias',
        array(
            'labels' => array(
                'name' => __('Galerías Multimedia'),
                'singular_name' => __('Galería Multimedia'),
                'add_new' => __('Agregar Galería'),
                'add_new_item' => __('Agregar nueva Galería'),
                'edit_item' => __('Editar Galería'),
                'new_item' => __('Nueva Galería'),
                'all_items' => __('Todas las Galerías'),
                'view_item' => __('Ver Galerías'),
                'search_items' => __('Buscar Galerías')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ver-galerias', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
        )
    );
    flush_rewrite_rules();
}

add_action('init', 'create_taxonomy_galerias', 0);
function create_taxonomy_galerias() {
    $labels = array(
        'name'                => __( 'Tipos de Galerías', 'taxonomy general name' ),
        'singular_name'       => __( 'Tipo de Galería', 'taxonomy singular name' ),
        'search_items'        => __( 'Buscar en Tipos de Galerías' ),
        'all_items'           => __( 'Todos los Tipos de Galerías' ),
        'edit_item'           => __( 'Editar Tipos de Galerías' ), 
        'update_item'         => __( 'Actualizar Tipos de Galerías' ),
        'add_new_item'        => __( 'Agregar Tipos de Galerías' ),
        'menu_name'           => __( 'Tipos de Galerías' )
    );  
    $args = array(
        'hierarchical'        => true,
        'labels'              => $labels,
        'show_ui'             => true,
        'show_admin_column'   => true,
        'query_var'           => true,
    );
    register_taxonomy('galerias-multimedia', array('galerias'), $args);
}

//=================================================================== IMAGES FUNCTIONS//
function get_gallery_images(){
    global $wpdb;
    $gallery_pict = $wpdb->get_results("SELECT ID, post_title, post_content, post_excerpt FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image%' AND post_excerpt LIKE 'galeria%' AND post_parent = '".get_the_ID()."' ORDER BY menu_order");
    if ( $gallery_pict ) {
        foreach ( $gallery_pict as $gal ) {
            echo '<div class="col-xs-3">';
                echo '<a href="'.wp_get_attachment_url($gal->ID).'" class="img-responsive" rel="prettyPhoto[gallery1]" title="'.$gal->post_title.'">';
                    echo wp_get_attachment_image($gal->ID, 'gal-image',array('class' => 'img-responsive'));
                echo '</a>';
            echo '</div>';
        } 
    }
}

//=================================================================== CONNECTIONS//
function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'especialidades_to_profesionales',
        'from' => 'especialidades',
        'to' => 'profesionales',
        'cardinality' => 'many-to-many',
        'prevent_duplicates' => true,
        'reciprocal' => true
    ) );
    p2p_register_connection_type( array(
        'name' => 'profesionales_to_profesionales',
        'from' => 'profesionales',
        'to' => 'profesionales',
        'cardinality' => 'many-to-many',
        'prevent_duplicates' => true,
        'reciprocal' => true
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );

//=================================================================== WORDPRESS WIDGETS// 
    function csmlc_widgets_init() {
		register_sidebar(array(
            'name' => __('Sidebar General', 'csmlc'),
            'description' => __('Sidebar general sitio web', 'csmlc'),
            'id' => 'sidebar-general',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '',
            'after_widget' => ''
        ));
    }
	
    add_action('widgets_init', 'csmlc_widgets_init');
//
?>