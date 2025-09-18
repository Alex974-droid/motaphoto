<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<div class="container">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div><?php the_content(); ?></div>
<?php endwhile; endif; ?>
</div>



<?php get_template_part('template-parts/site-header-mobile'); ?>
<?php get_footer(); ?>