
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
    menu.classList.add('open', 'fadeInDown');
    menu.classList.remove('fadeOut');
  }

  function fermerMenu() {
    boutonBurger.classList.remove('active');
    menu.classList.remove('fadeInDown');
    menu.classList.add('fadeOut');
    setTimeout(() => {
      menu.classList.remove('open');
      menu.classList.remove('fadeOut');
    }, 200);
  }
});