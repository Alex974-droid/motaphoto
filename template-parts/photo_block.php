<?php
/**
 * Template part pour afficher un bloc photo.
 */

$fullscreen_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<div class="photo-block">
    
    <?php the_post_thumbnail('large'); ?>
    
    <div class="photo-overlay">
        <a href="<?php echo esc_url($fullscreen_url); ?>" class="fullscreen-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.svg" alt="Afficher en plein écran">
        </a>
        
        <a href="<?php the_permalink(); ?>" class="eye-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.svg" alt="Voir la photo">
        </a>
        
        <span class="photo-reference"><?php the_field('reference'); ?></span>
        <span class="photo-category"><?php echo get_the_term_list( get_the_ID(), 'categorie' ); ?></span>
    </div>
</div>