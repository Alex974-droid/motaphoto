 // Code pour "charger Plus" et "Filtres Photos"
(function ($) {
    $(document).ready(function () {
        // FILTRES
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.custom-select-wrapper').length) {
                $('.custom-select-wrapper').removeClass('open');
            }
        });

        $('.select-trigger').on('click', function (e) {
            e.stopPropagation();
            const wrapper = $(this).closest('.custom-select-wrapper');
            $('.custom-select-wrapper').not(wrapper).removeClass('open');
            wrapper.toggleClass('open');
        });

        $('.select-options li').on('click', function () {
            const wrapper = $(this).closest('.custom-select-wrapper');
            const trigger = wrapper.find('.select-trigger span');
            const hiddenSelect = wrapper.find('.hidden-select');
            const value = $(this).data('value');
            const text = $(this).text();

            trigger.text(text);
            hiddenSelect.val(value);
            
            wrapper.find('.select-options li').removeClass('selected');
            $(this).addClass('selected');

            wrapper.removeClass('open');

            hiddenSelect.trigger('change');
        });
        
        let currentPage = 2;
        const photoGrid = $('.photo-grid');
        const filtersForm = $('#photo-filters-form');
        const loadMoreBtn = $('.js-load-more');

        function fetchPhotos(reset = false) {
            if (reset) {
                currentPage = 1; 
            }

            const ajaxurl = loadMoreBtn.data('ajaxurl');
            const data = {
                action: 'filter_and_load_photos',
                nonce: loadMoreBtn.data('nonce'),
                page: currentPage,
                categorie: filtersForm.find('#filter-categorie').val(),
                format: filtersForm.find('#filter-format').val(),
                orderby: filtersForm.find('#filter-orderby').val(),
            };

            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    //'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
            .then(response => response.json())
            .then(body => {
                photoGrid.css('opacity', 1); 
                if (!body.success) {
                    if (reset) {
                        photoGrid.html('<p class="no-results">"Aucune photo trouvé.</p>');
                    }
                    loadMoreBtn.hide();
                    return;
                }

                if (reset) {
                    photoGrid.html(body.data.html);
                } else {
                    photoGrid.append(body.data.html);
                }

                if (currentPage >= body.data.max_pages) {
                    loadMoreBtn.hide();
                } else {
                    loadMoreBtn.show();
                }
                
                currentPage++;
            })
            .catch(error => {
                console.error('Erreur:', error);
                photoGrid.css('opacity', 1);
            });
        }

        filtersForm.on('change', 'select', function () {
            fetchPhotos(true);
        });

        loadMoreBtn.on('click', function () {
            fetchPhotos(false);
        });
    });
    
})(jQuery);