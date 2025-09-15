<?php
/**
 * PAGE D'ACCUEIL
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 * 
 * 
 */

?>

<?php get_header(); ?>

<?php
// *** HERO *** //
// Gestion de l'image
$hero_image_data = get_field('image_du_hero');
$default_hero_url = get_template_directory_uri() . '/assets/images/hero_banner.jpeg';
$hero_url = $hero_image_data ? esc_url($hero_image_data['url']) : $default_hero_url;
// Gestion du titre
$hero_title = get_field('titre_du_hero');
$default_title = "PHOTOGRAPHE EVENT";
$hero_title = $hero_title ? $hero_title : $default_title;
?>
    
<section class="hero" style="background-image: url('<?php echo $hero_url; ?>');">
    <div class="hero-content">
        <h1><?php echo esc_html($hero_title); ?></h1>
    </div>
</section>

 <section class="photo-gallery">
    <div class="gallery-container">
        <!-- Template part filtre-photos -->
        <?php get_template_part('template-parts/photo-filters');?>
        <div class="photo-grid">
            <?php
            $args = array(
                'post_type'      => 'photos',      
                'posts_per_page' => 8,              
                'orderby'        => 'date',         
                'order'          => 'DESC',
                'paged'          => 1,      
            );

            $photo_query = new WP_Query( $args );

            if ( $photo_query->have_posts() ) :
                while ( $photo_query->have_posts() ) : $photo_query->the_post(); 
                
                    // Template part pour chaque photo 
                    get_template_part('template-parts/photo_block');

                endwhile;
            endif;
            
            ?>
        </div>

        <div class="load-more-container">
        <?php
        global $photo_query; 
        if ($photo_query->max_num_pages > 1) :
        ?>
            <button
                class="js-load-more btn-load-more" data-ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>"
                data-action="filter_and_load_photos" data-nonce="<?php echo wp_create_nonce('photo_filter_nonce'); ?>" data-page="2" >
                Charger plus
            </button>
        <?php 
        endif;
        wp_reset_postdata();
        ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>


















