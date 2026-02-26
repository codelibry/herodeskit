<?php

$label       = $args['hero-about__label'] ?? get_sub_field('hero-about__label');
$title       = $args['hero-about__title'] ?? get_sub_field('hero-about__title');
$description = $args['hero-about__description'] ?? get_sub_field('hero-about__description');
$image       = $args['hero-about__image'] ?? get_sub_field('hero-about__image');
$poster      = $args['hero-about__poster'] ?? get_sub_field('hero-about__poster');
$video       = $args['hero-about__video'] ?? get_sub_field('hero-about__video');

if (empty($title)) {
    return;
}

$has_video = !empty($poster) || !empty($video);
$has_media = !empty($image) || $has_video;

?>

<section class="hero-about">
    <div class="container">

        <div class="hero-about__top">
            <div class="hero-about__heading">
                <h1 class="hero-about__title" data-reveal="fade-up">
                    <?php echo esc_html($title); ?>
                </h1>
            </div>

            <div class="hero-about__text" data-reveal="fade-up" data-reveal-delay="100">
                <?php if ($label): ?>
                    <span class="hero-about__label">
                        <?php echo esc_html($label); ?>
                    </span>
                <?php endif; ?>

                <?php if ($description): ?>
                    <div class="hero-about__description">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($has_media): ?>
            <div class="hero-about__media" data-reveal="zoom-in" data-reveal-delay="200">
                <?php if ($image): ?>
                    <div class="hero-about__image">
                        <?php echo wp_get_attachment_image($image, 'large', false, [
                            'class' => 'hero-about__img',
                        ]); ?>
                    </div>
                <?php endif; ?>

                <?php if ($has_video): ?>
                    <div class="hero-about__video-player js-video-player">
                        <?php if ($video): ?>
                            <video
                                class="hero-about__video"
                                <?php if ($poster): ?>poster="<?php echo esc_url(wp_get_attachment_url($poster)); ?>"<?php endif; ?>
                                playsinline
                                preload="metadata"
                            >
                                <source src="<?php echo esc_url(wp_get_attachment_url($video)); ?>" type="video/mp4">
                            </video>
                        <?php elseif ($poster): ?>
                            <?php echo wp_get_attachment_image($poster, 'large', false, [
                                'class' => 'hero-about__poster',
                            ]); ?>
                        <?php endif; ?>

                        <?php if ($video): ?>
                            <button class="hero-about__play video-play" type="button" aria-label="Play video">
                                <?php echo get_inline_svg('play-icon'); ?>
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
