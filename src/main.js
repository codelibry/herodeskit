import InitPopups from './js/popup.js';
import MobileMenu from './js/mobile-menu.js';
import BannerSlider from './js/banner-slider.js';
import TestimSlider from './js/testimonials.js';
import Accordion from './js/accordion.js';
import PhoneMask from './js/phone-mask.js';
import ServicesSlider from './js/services-slider.js';
import HeroVideo from './js/hero-video.js';
import TestimonialsSlider from './js/testimonials-slider.js';

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
  PhoneMask();
  ServicesSlider();
  HeroVideo();
  TestimonialsSlider();

});

/*
 * On Full Page Load
 */
window.addEventListener('load', () => {

});