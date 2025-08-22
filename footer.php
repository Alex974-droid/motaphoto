
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main>
<footer class="site-footer">
    <div class="footer-menu">
        <!-- Affichage Menu du FOOTER -->
        <?php
            wp_nav_menu(array(
                'theme_location' => 'menu_footer',
                'container' => false,
                'menu_class' => 'menu',
            ));
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
