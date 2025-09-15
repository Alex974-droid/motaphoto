<?php
/**
 * Affiche le contenu du header du site
 * TEST
 * @package motaphoto
 */
?>

<header id="main-header-mobile">
    <div class ="menu-container-mobile">
    <div class="logo-mobile">
        <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } else {
                echo '<h3>' . get_bloginfo('name') . '</h3>';
            }
        ?>
    </div>

    <button class="menu-toggle-mobile" aria-controls="nav-menu" aria-expanded="false">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </button>

    <nav id="nav-menu-mobile" role="navigation">
        <?php
        wp_nav_menu([
            'theme_location' =>	'menu_principal',
            'container' => false,
            'menu_class' => 'menu',
            ]);
        ?>
    </nav>
        </div>
</header>