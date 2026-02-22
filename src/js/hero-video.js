function initVideoPlayer(player) {
    const video = player.querySelector('video');
    const playBtn = player.querySelector('.video-play');

    if (!video || !playBtn) return;

    video.setAttribute('controlsList', 'nodownload noplaybackrate');
    video.setAttribute('disablePictureInPicture', '');
    video.addEventListener('contextmenu', (e) => e.preventDefault());

    function startPlay() {
        video.play();
        playBtn.classList.add('is-hidden');
        player.classList.add('is-playing');
    }

    player.addEventListener('click', (e) => {
        if (video.paused || video.ended) {
            startPlay();
        }
    });

    video.addEventListener('click', (e) => {
        if (!video.paused) {
            e.stopPropagation();
            video.pause();
        }
    });

    video.addEventListener('pause', () => {
        playBtn.classList.remove('is-hidden');
        player.classList.remove('is-playing');
    });

    video.addEventListener('ended', () => {
        playBtn.classList.remove('is-hidden');
        player.classList.remove('is-playing');
    });
}

function HeroVideo() {
    const players = document.querySelectorAll('.js-video-player');
    players.forEach(initVideoPlayer);
}

export default HeroVideo;
