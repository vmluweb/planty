<?php
// Chargement des scripts dans ce thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Blankslate
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour les personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    // Chargement du /css/shortcodes/image-title.css pour le shortcode image-title
    wp_enqueue_style('image-title-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/image-title.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/image-title.css'));
}


/** SHORTCODES */
add_shortcode('image-title', 'image_text_func');
function image_text_func($atts)
{
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'image-title');

    ob_start();

    if ($atts['src'] != "") {
?>

        <div class="image-title" style="background-image: url(<?= $atts['src'] ?>)">
            <p class="productsHomeImageTitle"><?= $atts['titre'] ?></p>
        </div>

<?php
    }

    //Fin de récupération du flux d'information et du stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}


/* HOOKS ACTIONS */
function planty_supports()
{
    register_nav_menu('menu-footer', 'Pied-de-page');
}

add_action('after_setup_theme', 'planty_supports');


/* HOOKS FILTER */
function add_admin_link($items, $args)
{
    if ($args->theme_location == 'main-menu') {
        $items = $items . '<li id="menu-item-45" class="menu-item"><a title="Admin" href="' . admin_url() . '"><span>Admin</span></a></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
