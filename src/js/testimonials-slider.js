import Swiper from 'swiper';

function TestimonialsSlider() {
  const swiperEl = document.querySelector('.js-testimonials-swiper');
  if (!swiperEl) return;

  const swiper = new Swiper(swiperEl, {
    slidesPerView: 1.15,
    spaceBetween: 12,
    grabCursor: true,
    loop: true,
    speed: 420,
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 16,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
    },
  });

  // Custom autoplay instead of Swiper's built-in Autoplay module.
  // Reason: Swiper's pauseOnMouseEnter listens to mouseleave unconditionally.
  // When a "Read more" button is clicked and the card text expands, the DOM
  // mutation causes the browser to fire a spurious mouseleave on the swiper
  // container — which would immediately restart autoplay mid-interaction.
  // By owning the autoplay ourselves we can block restarts with flags.
  let timer = null;
  let isHovered = false;     // true while the pointer is inside the swiper
  let isInteracting = false; // true while a "Read more" button is being pressed

  // Start the interval only when the slider is neither hovered nor mid-click.
  function startAutoplay() {
    // console.log('startAutoplay');
    if (timer || isHovered || isInteracting) return;
    timer = setInterval(() => swiper.slideNext(), 2100);
  }

  // Clear the interval and reset the timer reference.
  function stopAutoplay() {
    // console.log('stopAutoplay');
    clearInterval(timer);
    timer = null;
  }

  startAutoplay();

  // Pause while the user hovers over the slider.
  swiperEl.addEventListener('mouseenter', () => {
    isHovered = true;
    stopAutoplay();
  });

  // Resume when the pointer leaves — but only if we're not mid-button-click,
  // since a DOM mutation from the expand/collapse can fire a false mouseleave.
  swiperEl.addEventListener('mouseleave', () => {
    isHovered = false;
    startAutoplay(); // guarded by isInteracting inside startAutoplay
  });

  document.querySelectorAll('.js-read-more').forEach((btn) => {
    // On press: disable Swiper touch tracking and stop autoplay.
    // allowTouchMove = false prevents Swiper's loop-correction animation
    // from triggering a visible slide jump when the button is tapped.
    btn.addEventListener('mousedown', () => {
      isInteracting = true;
      swiper.allowTouchMove = false;
      stopAutoplay();
    });
    btn.addEventListener('touchstart', () => {
      isInteracting = true;
      swiper.allowTouchMove = false;
      stopAutoplay();
    }, {passive: true});

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

      // Re-enable touch and clear the interaction lock.
      swiper.allowTouchMove = true;
      isInteracting = false;

      // The DOM mutation above may have fired a spurious mouseleave, making
      // isHovered stale. Re-check the real hover state before resuming.
      if (!swiperEl.matches(':hover')) {
        isHovered = false;
        startAutoplay();
      }
    });
  });
}

export default TestimonialsSlider;
