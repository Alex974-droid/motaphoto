
//OUVERTURE MENU TOGGLE
document.addEventListener('DOMContentLoaded', () => {
  const boutonBurger = document.querySelector('.menu-toggle');
  const menu = document.querySelector('nav');

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

//FERMETURE MODALE
jQuery(document).ready(function($) {
  $('.ppopup-close').click(function() {
    $(this).closest('.ppopup-overlay').hide();
  });
});

// MODAL CONTACT //
var modal = document.getElementById('ContactModal');
var btn = document.querySelector(".open-contact-modal");
var span = document.getElementsByClassName("close")[0];

// Ouverture Modale
btn.onclick = function() {
    modal.style.display = "block";
}

// Fermeture au clic en dehors de la Modale
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}