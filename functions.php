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
