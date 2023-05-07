<?php
// Chargement des scripts dans ce thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Blankslate
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour les personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    // Chargement du /css/shortcodes/image-title-home.css pour le shortcode image-title-home
    wp_enqueue_style('image-title-home-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/image-title-home.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/image-title-home.css'));
    // Chargement du /css/shortcodes/image-title-shop.css pour le shortcode image-title-shop
    wp_enqueue_style('image-title-shop-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/image-title-shop.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/image-title-shop.css'));
}


/** SHORTCODES */
add_shortcode('image-title-home', 'image_text_func');
function image_text_func($atts)
{
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'image-title-home');

    ob_start();

    if ($atts['src'] != "") {
?>

        <div id="image-title-home" style="background-image: url(<?= $atts['src'] ?>)">
            <p id="productsHomeImageTitle"><?= $atts['titre'] ?></p>
        </div>

    <?php
    }

    //Fin de récupération du flux d'information et du stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode('image-title-shop', 'image_title_func');
function image_title_func($atts)
{
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'image-title-shop');

    ob_start();

    if ($atts['src'] != "") {
    ?>

        <div id="image-title-shop" style="background-image: url(<?= $atts['src'] ?>)">
            <p id="productsShopImageTitle"><?= $atts['titre'] ?></p>
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
function add_new_item_to_nav_menu($items, $args)
{
    if (is_user_logged_in() && $args->theme_location == 'main-menu') {
        $items .= '<li id="menu-item-45" class="menu-item"><a title="Admin" href="' . get_permalink(admin_url()) . '"><span>Admin</span></a></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'add_new_item_to_nav_menu', 10, 2);
