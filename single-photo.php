<?php
/**
 * The Template single pour le CPT "Photos"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package motaphoto
 * 
 * 
 */
?>

<?php get_header(); ?>


  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      the_title('<h1>', '</h1>');
      the_content();
    endwhile;
  endif;
  ?>


<?php get_footer(); ?>