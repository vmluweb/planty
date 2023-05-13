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

/* HOOKS ACTION */
function planty_supports()
{
    register_nav_menu('menu-footer', 'Pied-de-page');
}

add_action('after_setup_theme', 'planty_supports');


/* HOOKS FILTER */
function add_new_item_to_nav_menu($items, $args)
{
    if (is_user_logged_in() && $args->theme_location == 'main-menu') {
        $items .= '<li id="menu-item-45" class="menu-item"><a title="Admin" href="' . get_permalink(admin_url()) . '"><span>Admin</span></a></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'add_new_item_to_nav_menu', 10, 2);
