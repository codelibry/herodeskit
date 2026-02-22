import Swiper from 'swiper';

function TestimonialsSlider() {
    const swiperEl = document.querySelector('.js-testimonials-swiper');
    if (!swiperEl) return;

    new Swiper(swiperEl, {
        slidesPerView: 'auto',
        spaceBetween: 16,
        centeredSlides: true,
        grabCursor: true,
        loop: true,
        breakpoints: {
            768: {
                spaceBetween: 64,
            },
        },
    });

    document.querySelectorAll('.js-read-more').forEach((btn) => {
        btn.addEventListener('click', () => {
            const wrap = btn.closest('.js-review-text');
            if (!wrap) return;

            const textEl = wrap.querySelector('.testimonials-v2__text');
            const fullText = wrap.dataset.full;
            const shortText = wrap.dataset.short;
            const isExpanded = wrap.classList.contains('is-expanded');

            if (isExpanded) {
                textEl.innerHTML = `\u201C${shortText}\u201D`;
                btn.textContent = 'Read more';
                wrap.classList.remove('is-expanded');
            } else {
                textEl.innerHTML = `\u201C${fullText}\u201D`;
                btn.textContent = 'Read less';
                wrap.classList.add('is-expanded');
            }
        });
    });
}

export default TestimonialsSlider;
