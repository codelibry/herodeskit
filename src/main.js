import InitPopups from './js/popup.js';
import MobileMenu from './js/mobile-menu.js';
import BannerSlider from './js/banner-slider.js';
import TestimSlider from './js/testimonials.js';
import Accordion from './js/accordion.js';

import './js/header-submenu';
import './scss/main.scss';

/*
 * On DOM Content Load
 */
document.addEventListener('DOMContentLoaded', () => {

  InitPopups();
  MobileMenu();
  BannerSlider();
  TestimSlider();
  Accordion();

});

/*
 * On Full Page Load
 */
window.addEventListener('load', () => {

});