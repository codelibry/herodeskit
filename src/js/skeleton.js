/**
 * Skeleton Loading — adds shimmer to media wrappers, removes on load
 */

const MEDIA_SELECTORS = [
  '.hero__video-player',
  '.hero-about__video-player',
  '.hero-about__image',
  '.news-card__media',
  '.news-cards__media',
  '.content-image__media',
  '.team-members__media',
  '.testimonials-v2__avatar',
  '.banner-slide',
];

const FALLBACK_TIMEOUT = 5000;

export default function Skeleton() {
  const wrappers = document.querySelectorAll(MEDIA_SELECTORS.join(','));

  wrappers.forEach((wrapper) => {
    const media = wrapper.querySelector('img, video');
    if (!media) return;

    // If already loaded (cached), skip skeleton
    if (media.tagName === 'IMG' && media.complete && media.naturalWidth > 0) {
      return;
    }

    if (media.tagName === 'VIDEO' && media.readyState >= 2) {
      return;
    }

    // Add skeleton
    wrapper.classList.add('skeleton');

    const markLoaded = () => {
      wrapper.classList.add('skeleton--loaded');
      clearTimeout(fallback);

      // Fully remove skeleton classes after fade-in completes
      setTimeout(() => {
        wrapper.classList.remove('skeleton', 'skeleton--loaded');
      }, 500);
    };

    // Listen for load
    if (media.tagName === 'IMG') {
      media.addEventListener('load', markLoaded, { once: true });
      media.addEventListener('error', markLoaded, { once: true });
    } else {
      media.addEventListener('loadeddata', markLoaded, { once: true });
      media.addEventListener('error', markLoaded, { once: true });
    }

    // Fallback — remove skeleton after timeout
    const fallback = setTimeout(markLoaded, FALLBACK_TIMEOUT);
  });
}
