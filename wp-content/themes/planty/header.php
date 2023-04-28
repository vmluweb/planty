<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">
        <header class="header">
            <div id="branding">
                <!-- Insertion logo -->
                <?php if (get_custom_logo()) :
                    the_custom_logo(); ?>
                <?php endif ?>
            </div>
            <nav id="menu" role="navigation">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'link_before' => '<span itemprop="name">',
                        'link_after' => '</span>'
                    )
                ); ?>
            </nav>
        </header>