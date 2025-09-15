<?php
// Fichier CSS et SCRIPT JS personalisé
function motaphoto_enqueue_scripts() {
    // CSS
    wp_enqueue_style(
        'motaphoto-style',
        get_stylesheet_uri()
    );

    // JS
    wp_enqueue_script('jquery'); 
    wp_enqueue_script(
        'motaphoto-script',
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        array(),       
        null,            
        true             
    );

    // JS pour pagination photos
    wp_enqueue_script(
        'motaphoto-loadmore-script',
        get_stylesheet_directory_uri() . '/assets/js/load-more-photos.js',
        array('jquery'),
        '1.1',
        true
    );

    // NONCE
    wp_localize_script(
        'motaphoto-loadmore-script', 
        'photo_filter_params', 
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('photo_filter_nonce') 
        )
    );
}

add_action('wp_enqueue_scripts', 'motaphoto_enqueue_scripts');



// Ajout gestion menus dashboard 
function register_custom_menu() {
    register_nav_menus(array(
        'menu_principal' => __('Menu Principal', 'motaphoto'),
        'menu_footer'  => __('Menu Pied de page', 'motaphoto'),
    ));
}
add_action( 'init', 'register_custom_menu' );



 // Ajout logo personnalisé dans le thème enfant
function motaphoto_setup() {
    $logo_width  = 300;
    $logo_height = 40;
    add_theme_support(
        'custom-logo',
        array(
            'height'               => $logo_height,
            'width'                => $logo_width,
            'flex-width'           => true,
            'flex-height'          => true,
        )
    );
}
add_action( 'after_setup_theme', 'motaphoto_setup' );


// PAGINATION DES PHOTOS / FILTRES

function ajax_filter_and_load_photos() {
    
    check_ajax_referer('photo_filter_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 8;

    $args = [
        'post_type'      => 'photos',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
    ];

    // Trie photos
    $orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : '';
    if ($orderby === 'date_asc') {
        $args['orderby'] = 'date';
        $args['order']   = 'ASC';
    } else {
        $args['orderby'] = 'date';
        $args['order']   = 'DESC';
    }

    // Requête de taxonomie
    $tax_query = ['relation' => 'AND'];
    if (!empty($_POST['categorie'])) {
        $tax_query[] = [
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_POST['categorie']),
        ];
    }
    if (!empty($_POST['format'])) {
        $tax_query[] = [
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_POST['format']),
        ];
    }

    if (count($tax_query) > 1) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/photo_block');
        endwhile;
        $html = ob_get_clean();

        wp_send_json_success([
            'html'      => $html,
            'max_pages' => $query->max_num_pages 
        ]);
    } else {
        wp_send_json_error(['message' => 'Aucune photo ne correspond à votre recherche.']);
    }

    wp_die();
}

add_action('wp_ajax_filter_and_load_photos', 'ajax_filter_and_load_photos');
add_action('wp_ajax_nopriv_filter_and_load_photos', 'ajax_filter_and_load_photos');
