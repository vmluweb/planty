<?php
// Chargement des scripts dans ce thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Blankslate
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour les personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

/* HOOKS ACTIONS */
function montheme_supports()
{
    register_nav_menu('menu-footer', 'Pied-de-page');
}

add_action('after_setup_theme', 'montheme_supports');
