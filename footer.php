
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 * 
 * 
 */

?>
</main>
<footer class="site-footer">
    <div class="footer-menu">
        <!-- Affichage Menu FOOTER -->
        <?php
            wp_nav_menu(array(
                'theme_location' => 'menu_footer',
                'container' => false,
                'menu_class' => 'menu',
            ));
        ?>
    </div>

<?php get_template_part('template-parts/modale-contact'); ?>

</footer>

<?php wp_footer(); ?>
</body>
</html>
