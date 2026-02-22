<?php

$title    = $args['hero__title'] ?? get_sub_field('hero__title');
$subtitle = $args['hero__subtitle'] ?? get_sub_field('hero__subtitle');
$button   = $args['hero__button'] ?? get_sub_field('hero__button');
$poster   = $args['hero__poster'] ?? get_sub_field('hero__poster');
$video    = $args['hero__video'] ?? get_sub_field('hero__video');

if (empty($title) && empty($subtitle)) {
    return;
}

$has_video = !empty($poster) || !empty($video);

?>

<section class="hero">
    <div class="container">

        <div class="hero__inner">
            <?php if ($title): ?>
                <h1 class="hero__title">
                    <?php echo esc_html($title); ?>
                </h1>
            <?php endif; ?>

            <?php if ($subtitle): ?>
                <p class="hero__subtitle">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>

            <?php if ($button): ?>
                <a class="button button--hero" href="<?php echo esc_url($button['url']); ?>">
                    <?php echo esc_html($button['title']); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ($has_video): ?>
            <div class="hero__video-player js-video-player">
                <?php if ($video): ?>
                    <video
                        class="hero__video"
                        <?php if ($poster): ?>poster="<?php echo esc_url(wp_get_attachment_url($poster)); ?>"<?php endif; ?>
                        playsinline
                        preload="metadata"
                    >
                        <source src="<?php echo esc_url(wp_get_attachment_url($video)); ?>" type="video/mp4">
                    </video>
                <?php elseif ($poster): ?>
                    <?php echo wp_get_attachment_image($poster, 'large', false, [
                        'class' => 'hero__poster',
                    ]); ?>
                <?php endif; ?>

                <?php if ($video): ?>
                    <button class="hero__play video-play" type="button" aria-label="Play video">
                        <?php echo get_inline_svg('play-icon'); ?>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
