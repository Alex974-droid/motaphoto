<?php
/**
 * Template pour afficher un post unique du type "photos".
 *
 * @package motaphoto
 */

get_header(); ?>

<?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
        // Informations photo 
        $photo_reference  = get_field('reference');
        $photo_type       = get_field('type');
        $publication_year = get_the_date('Y');
        $category = get_the_term_list( get_the_ID(), 'categorie');
        $format = get_the_term_list( get_the_ID(), 'format');
?>

<section class="single-photo">
    <div class="photo-container">
        <div class="photo-details">
            <?php the_title('<h2>', '</h2>'); ?>
            <p>Référence : <span id="photo-ref"><?php echo esc_html( $photo_reference ); ?></span></p>
            <p>Catégorie : <?php echo $category; ?></p>
            <p>Format : <?php echo $format; ?></p>
            <p>Type : <?php echo esc_html( $photo_type ); ?></p>
            <p>Année : <?php echo esc_html( $publication_year ); ?></p>
        </div>

        <div class="photo-display">
            <?php 
            // Image mise en avant
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('large'); 
            }
            ?>
        </div>
    </div>

    <?php 
    endwhile; 
    wp_reset_postdata();
    endif; 
    ?>

<!-- Partie "CONTACT" et "NAVIGATION PHOTOS" -->
    <div class="photo-action">
        <div class="contact-cta">
            <p>Cette photo vous intéresse ?</p>
            <button type="button" class="btn-contact" data-reference="<?php echo esc_attr($photo_reference ); ?>">Contact</button>
        </div>

        <div class="photo-navigation">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();

            if ( ! $prev_post ) {
                $first_post_args = array(
                    'post_type'      => get_post_type(),
                    'posts_per_page' => 1,
                    'orderby'        => 'date',
                    'order'          => 'DESC', 
                );
                $last_posts = get_posts($first_post_args);
                if (!empty($last_posts)) {
                    $prev_post = $last_posts[0];
                }
            }

            if ( ! $next_post ) {
                $last_post_args = array(
                    'post_type'      => get_post_type(),
                    'posts_per_page' => 1,
                    'orderby'        => 'date',
                    'order'          => 'ASC', 
                );
                $first_posts = get_posts($last_post_args);
                 if (!empty($first_posts)) {
                    $next_post = $first_posts[0];
                }
            }
            ?>
            
            <!-- NAVIGATION PHOTO -->
                <div class="thumb">
                    <div class="preview-thumbnail-prev">
                        <?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); ?>
                    </div>
                    <div class="preview-thumbnail-next">
                         <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?>
                     </div>

                </div>

            <div class="nav-arrows">

                 <?php if ( $prev_post ) : ?>
                     <a href="<?php echo get_permalink( $prev_post ); ?>" class="prev-arrow">
                        <img class="arrow-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/previous_arrow.svg" alt="Photo précédente">
                    </a>
                    <?php endif; ?>
        
                <?php if ( $next_post ) : ?>
                    <a href="<?php echo get_permalink( $next_post ); ?>" class="next-arrow">
                     <img class="arrow-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/next_arrow.svg" alt="Photo suivante">              
                     </a>
                <?php endif; ?>

            </div>      
        </div>
    </div>
</section>

<!-- PHOTOS APPARENTÉES -->
<section class="related-photos">
    <div class="related-title">
        <h3>Vous aimerez aussi</h3>
    </div>

    <div class="related-photos-grid">
        <?php
        $terms = get_the_terms( get_the_ID(), 'categorie' );
        $term_ids = [];

        if ( $terms && ! is_wp_error( $terms ) ) {
            $term_ids = wp_list_pluck( $terms, 'term_id' );
        }

        if ( ! empty( $term_ids ) ) {
            $args = array(
                'post_type'      => 'photos',
                'posts_per_page' => 2,
                'post__not_in'   => array( get_the_ID() ),
                'orderby'        => 'rand', 
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field'    => 'term_id',
                        'terms'    => $term_ids,
                    ),
                ),
            );

            $related_query = new WP_Query( $args );

            if ( $related_query->have_posts() ) :
                while ( $related_query->have_posts() ) : $related_query->the_post(); 

                    //Template part photo_block
                    get_template_part('template-parts/photo_block');

                endwhile;
            endif;
            
            wp_reset_postdata();
        }
        ?>
    </div>
</section>

<?php get_footer(); ?>