<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">
        <header class="header-container">
            <div id="branding">
                <!-- Insertion logo -->
                <?php if (get_custom_logo()) :
                    the_custom_logo(); ?>
                <?php endif ?>
            </div>
            <nav id="menu" role="navigation">
                <!-- small screens menu -->
                <div class="burgerMenu">
                    <a href="#" class="toggleMenu">&#9776;</a>
                </div>
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'link_before' => '<span itemprop="name">',
                        'link_after' => '</span>',
                    )
                ); ?>
            </nav>
        </header>