import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

function BannerSlider() {
    const swiper = document.querySelector('.banner-slider .swiper');

    if (swiper) {
        new Swiper(swiper, {
            modules: [Pagination],
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".banner-slider .swiper-pagination",
                clickable: true
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            loop: true
        });
    }
}

export default BannerSlider;
