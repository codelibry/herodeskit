function Reveal() {
  const elements = document.querySelectorAll('[data-reveal]');
  if (!elements.length) return;

  // Respect reduced motion preference
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    elements.forEach(el => el.classList.add('is-revealed'));
    return;
  }

  const isMobile = window.innerWidth < 769;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const delay = el.dataset.revealDelay || 0;

        setTimeout(() => {
          el.classList.add('is-revealed');
        }, delay);

        observer.unobserve(el);
      }
    });
  }, {
    threshold: isMobile ? 0.01 : 0.1,
    rootMargin: isMobile ? '0px' : '0px 0px -50px 0px',
  });

  elements.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      el.classList.add('is-revealed');
    } else {
      observer.observe(el);
    }
  });
}

export default Reveal;
