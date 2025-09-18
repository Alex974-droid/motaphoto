//*** HEADER MOBILE ***//
document.addEventListener('DOMContentLoaded', function () {
    const boutonBurger = document.querySelector('.menu-toggle');
    const boutonBurgerMobile = document.querySelector('.menu-toggle-mobile'); 
    const headerMobile = document.querySelector('.main-header-mobile');
    const containerMobile = document.querySelector('.menu-container-mobile');
    const navMobile = document.querySelector('#nav-menu-mobile');
    const overlay = document.querySelector('#nav-menu-overlay');

    function openMenu() {
        headerMobile.classList.add('active');
        containerMobile.classList.add('active');
        navMobile.classList.add('active');
        overlay.classList.add('active');
    }

    function closeMenu() {
        navMobile.classList.add('closing');
        headerMobile.classList.add('closing');
        overlay.classList.remove('active');

        headerMobile.addEventListener('transitionend', function handler() {
            headerMobile.classList.remove('active', 'closing');
            navMobile.classList.remove('active', 'closing');
            containerMobile.classList.remove('active');
            headerMobile.removeEventListener('transitionend', handler);
        });
    }

    boutonBurger.addEventListener('click', openMenu);
    boutonBurgerMobile.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);
});


//*** MODAL CONTACT HEADER ***//
var modal = document.getElementById('ContactModal');
var btns = document.querySelectorAll(".open-contact-modal");

btns.forEach(function(btn) {
    btn.addEventListener('click', function (e) {
        e.preventDefault(); 
        modal.style.display = "block";
    });
});

// *** MODAL CONTACT PHOTO *** //
jQuery(document).ready(function($) {
  $('.btn-contact').on('click', function(e) {
    e.preventDefault();

    // Récupérer la référence dans data-reference (voir btn-contact single-photos.php)
    var reference = $(this).data('reference');

    if (!reference) {
      reference = $('#photo-ref').text().trim();
    }

    // Inserer la valeur dans le champ du formulaire (voir ID CF7)
    $('#photo-ref-field').val(reference);

    // Ouvrir la modale
    $('#ContactModal').show();
  });

  // Fermer si clic en dehors de la modale
  $(window).on('click', function(e) {
    if ($(e.target).is('#ContactModal')) {
      $('#ContactModal').hide();
    }
  });
});

// *** Affichage des miniatures au survol des flèches single-photos.php *** //
const prevArrow = document.querySelector('.prev-arrow');
const nextArrow = document.querySelector('.next-arrow');
const prevThumb = document.querySelector('.preview-thumbnail-prev');
const nextThumb = document.querySelector('.preview-thumbnail-next');

if (prevArrow && prevThumb) {
  prevArrow.addEventListener('mouseenter', () => prevThumb.classList.add('visible'));
  prevArrow.addEventListener('mouseleave', () => prevThumb.classList.remove('visible'));
}

if (nextArrow && nextThumb) {
  nextArrow.addEventListener('mouseenter', () => nextThumb.classList.add('visible'));
  nextArrow.addEventListener('mouseleave', () => nextThumb.classList.remove('visible'));
}


// LIGHTBOX PHOTOS
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('lightbox');
    if (!lightbox) return;

    const lightboxImg = lightbox.querySelector('.lightbox__container img');
    const lightboxRef = lightbox.querySelector('.lightbox__reference');
    const lightboxCat = lightbox.querySelector('.lightbox__category');
    const closeBtn = lightbox.querySelector('.lightbox__close');
    const nextBtn = lightbox.querySelector('.lightbox__next');
    const prevBtn = lightbox.querySelector('.lightbox__prev');

    let currentIndex = 0;
    let currentGallery = [];

    document.body.addEventListener('click', function(e) {
        const fullscreenIcon = e.target.closest('.fullscreen-icon');

        if (fullscreenIcon) {
            e.preventDefault();
            currentGallery = [];
            const allIcons = document.querySelectorAll('.fullscreen-icon');
            allIcons.forEach(icon => {
                const photoBlock = icon.closest('.photo-block');
                if (photoBlock) {
                    currentGallery.push({
                        src: icon.href,
                        reference: photoBlock.querySelector('.photo-reference')?.textContent || '',
                        category: photoBlock.querySelector('.photo-category')?.textContent || ''
                    });
                }
            });

            currentIndex = Array.from(allIcons).findIndex(icon => icon === fullscreenIcon);

            openLightbox();
        }
    });

    function openLightbox() {
        if (currentIndex < 0 || currentIndex >= currentGallery.length) return;
        updateLightboxContent();
        lightbox.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % currentGallery.length;
        updateLightboxContent();
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
        updateLightboxContent();
    }

    function updateLightboxContent() {
        if (currentGallery.length === 0) return;
        const item = currentGallery[currentIndex];
        lightboxImg.src = item.src;
        lightboxImg.alt = `Photographie - ${item.reference}`;
        lightboxRef.textContent = item.reference;
        lightboxCat.textContent = item.category;
    }

    closeBtn.addEventListener('click', closeLightbox);
    nextBtn.addEventListener('click', showNext);
    prevBtn.addEventListener('click', showPrev);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.style.display === 'flex') {
            closeLightbox();
        }
    });
});





