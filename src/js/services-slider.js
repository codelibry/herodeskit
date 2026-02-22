import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

function ServicesSlider() {
    const section = document.querySelector('.services-slider');

    if (!section) return;

    const swiperEl = section.querySelector('.swiper');
    const prevBtn  = section.querySelector('.services-slider__prev');
    const nextBtn  = section.querySelector('.services-slider__next');

    if (!swiperEl) return;

    new Swiper(swiperEl, {
        modules: [Navigation],
        slidesPerView: 'auto',
        spaceBetween: 30,
        grabCursor: true,
        navigation: {
            prevEl: prevBtn,
            nextEl: nextBtn,
        },
    });
}

export default ServicesSlider;
