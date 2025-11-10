import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

function TestimSlider() {
    const swiper = document.querySelector('.testimonial-slider .swiper');

    if (swiper) {
        new Swiper(swiper, {
            modules: [Pagination],
            slidesPerView: 1,
            spaceBetween: 60,
            pagination: {
                el: ".testimonial-slider .testimonial-swiper-pagination",
                clickable: true
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            loop: true,
            breakpoints: {
                640: {
                slidesPerView: 1,
                spaceBetween: 10,
                },
                768: {
                slidesPerView: 2,
                spaceBetween: 10,
                },
                1024: {
                slidesPerView: 3,  
                spaceBetween: 20,
                },
            },
        });
    }
}

export default TestimSlider;
