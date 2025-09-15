
// *** OUVERTURE MENU TOGGLE *** //
document.addEventListener('DOMContentLoaded', () => {
  const boutonBurger = document.querySelector('.menu-toggle');
  const menu = document.getElementById("nav-menu");
  //const menu = document.querySelector('.menu-container');

  let menuOpen = false; 

  boutonBurger.addEventListener('click', () => {
    if (menuOpen) {
      fermerMenu();
    } else {
      ouvrirMenu();
    }
    menuOpen = !menuOpen;
  });

  function ouvrirMenu() {
    boutonBurger.classList.add('active');
    menu.classList.add('open', 'slideInRight');
    menu.classList.remove('fadeOut');
  }

  function fermerMenu() {
    boutonBurger.classList.remove('active');
    menu.classList.remove('slideInRight');
    menu.classList.add('slideOutRight');
    setTimeout(() => {
      menu.classList.remove('open');
      menu.classList.remove('slideOutRight');
    }, 400);
  }
});


//*** MODAL CONTACT HEADER ***//
var modal = document.getElementById('ContactModal');
var btn = document.querySelector(".open-contact-modal");

// Ouverture Modale
btn.onclick = function() {
    modal.style.display = "block";
}

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












