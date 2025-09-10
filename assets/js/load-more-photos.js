// PAGINATION DES PHOTOS
(function ($) {
    $(document).ready(function () {

        $('.btn-load-more').on('click', function (e) {
            e.preventDefault();

            const button = $(this);

            const ajaxurl = button.data('ajaxurl');
            const data = {
                action: button.data('action'),
                nonce:  button.data('nonce'),
                page:   button.data('page'),
            };

            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
            .then(response => response.json())
            .then(body => {
                
                if (!body.success) {
                    button.hide();
                    return;
                }

                $('.photo-grid').append(body.data.html);

                if (body.data.is_last_page) {
                    button.hide();
                } else {
                    const newPage = parseInt(data.page) + 1;
                    button.data('page', newPage);
                    button.text('Charger plus').prop('disabled', false);
                }
            })
            .catch(error => {
                console.error('Erreur : ', error);
                button.text('Erreur - Réessayer').prop('disabled', false);
            });
        });
        
    });
})(jQuery);