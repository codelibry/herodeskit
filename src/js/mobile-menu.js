/*
 * Mobile Menu
 */
function mobileMenu() {
  if(!document.querySelector('.mobile-menu')) {
    return;
  }

  const button = document.querySelector('.header__mobile-menu-button');
  const closeButton = document.querySelector('.mobile-menu__close');
  const menu = document.querySelector('.mobile-menu');
  const overlay = document.querySelector('.mobile-menu-overlay');

  function openMenu() {
    menu.classList.add('open');
    if (overlay) overlay.classList.add('is-active');
    document.body.classList.add('no-scroll');
  }

  function closeMenu() {
    menu.classList.remove('open');
    if (overlay) overlay.classList.remove('is-active');
    document.body.classList.remove('no-scroll');
  }

  button.addEventListener('click', () => {
    menu.classList.contains('open') ? closeMenu() : openMenu();
  });

  if (closeButton) {
    closeButton.addEventListener('click', closeMenu);
  }

  if (overlay) {
    overlay.addEventListener('click', closeMenu);
  }

  document.addEventListener('click', (e) => {
    if (e.target.closest('.header__mobile-menu-button') || e.target.closest('.mobile-menu')) {
      return;
    }

    closeMenu();
  });
}

export default mobileMenu;
