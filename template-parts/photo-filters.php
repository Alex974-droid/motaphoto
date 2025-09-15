<?php
// Récupérer les termes pour la taxonomie 'categorie'
$categories = get_terms([
    'taxonomy'   => 'categorie',
    'hide_empty' => true,
]);

// Récupérer les termes pour la taxonomie 'format'
$formats = get_terms([
    'taxonomy'   => 'format',
    'hide_empty' => true,
]);
?>

<form id="photo-filters-form" class="photo-filters-form">
    <div class="filters-container">
        
        <div class="filters-left">
            <?php if (!is_wp_error($categories) && !empty($categories)) : ?>
            <div class="custom-select-wrapper">
                <select id="filter-categorie" name="categorie" class="hidden-select">
                    <option value="">CATÉGORIES</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="select-trigger">
                    <span>CATÉGORIES</span>
                    <div class="arrow-icons">
                        <img class="arrow-down" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down-s.svg" alt="Ouvrir le menu">
                        <img class="arrow-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-up-s.svg" alt="Fermer le menu">
                    </div>
                </div>
                <ul class="select-options">
                    <li data-value="">CATÉGORIES</li>
                    <?php foreach ($categories as $category) : ?>
                        <li data-value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if (!is_wp_error($formats) && !empty($formats)) : ?>
            <div class="custom-select-wrapper">
                <select id="filter-format" name="format" class="hidden-select">
                    <option value="">FORMATS</option>
                    <?php foreach ($formats as $format) : ?>
                        <option value="<?php echo esc_attr($format->slug); ?>"><?php echo esc_html($format->name); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="select-trigger">
                    <span>FORMATS</span>
                    <div class="arrow-icons">
                        <img class="arrow-down" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down-s.svg" alt="Ouvrir le menu">
                        <img class="arrow-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-up-s.svg" alt="Fermer le menu">
                    </div>
                </div>
                <ul class="select-options">
                    <li data-value="">FORMATS</li>
                    <?php foreach ($formats as $format) : ?>
                        <li data-value="<?php echo esc_attr($format->slug); ?>"><?php echo esc_html($format->name); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>

        <div class="filters-right">
            <div class="custom-select-wrapper">
                <select id="filter-orderby" name="orderby" class="hidden-select">
                    <option value="date_desc">TRIER PAR</option>
                    <option value="date_desc">À partir des plus récentes</option>
                    <option value="date_asc">À partir des plus anciennes</option>
                </select>
                <div class="select-trigger">
                    <span>TRIER PAR</span>
                     <div class="arrow-icons">
                        <img class="arrow-down" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down-s.svg" alt="Ouvrir le menu">
                        <img class="arrow-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-up-s.svg" alt="Fermer le menu">
                    </div>
                </div>
                <ul class="select-options">
                    <li data-value="date_desc">TRIER PAR</li>
                    <li data-value="date_desc">À partir des plus récentes</li>
                    <li data-value="date_asc">À partir des plus anciennes</li>
                </ul>
            </div>
        </div>
    </div>
</form>