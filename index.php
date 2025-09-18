<?php
/**
 * The template for displaying The home page template which is the front page by default
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * *
 * @package motaphoto
 */

?>
<?php get_header(); ?>

<div class="container">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div><?php the_content(); ?></div>
<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>