import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

function ServicesSlider() {
    const section = document.querySelector('.services-slider');

    if (!section) return;

    const swiperEl = section.querySelector('.swiper');
    const prevBtn  = section.querySelector('.services-slider__prev');
    const nextBtn  = section.querySelector('.services-slider__next');

    if (!swiperEl) return;

    const paginationEl = section.querySelector('.services-slider__pagination');

    new Swiper(swiperEl, {
        modules: [Navigation, Pagination],
        slidesPerView: 'auto',
        spaceBetween: 30,
        grabCursor: true,
        navigation: {
            prevEl: prevBtn,
            nextEl: nextBtn,
        },
        pagination: {
            el: paginationEl,
            clickable: true,
            renderBullet: (index, className) => `<button type="button" class="${className}" aria-label="Go to slide ${index + 1}"></button>`,
        },
    });
}

export default ServicesSlider;
