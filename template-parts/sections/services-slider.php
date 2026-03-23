<?php

$title = $args['services-slider__title'] ?? get_sub_field('services-slider__title');
$cards = $args['services-slider__list'] ?? get_sub_field('services-slider__list');

if (empty($cards)) {
    return;
}

?>

<section class="services-slider">
    <div class="container">

        <div class="services-slider__header" data-reveal="fade-up">
            <?php if ($title): ?>
                <h2 class="services-slider__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <div class="services-slider__nav">
                <button class="services-slider__prev" type="button" aria-label="Previous slide">
                    <?php echo get_inline_svg('arrow-left-swiper'); ?>
                </button>
                <button class="services-slider__next" type="button" aria-label="Next slide">
                    <?php echo get_inline_svg('arrow-right-swiper'); ?>
                </button>
            </div>
        </div>

        <div class="services-slider__carousel" data-reveal="fade-up" data-reveal-delay="100">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $card):
                        $icon    = $card['icon'] ?? '';
                        $card_title = $card['title'] ?? '';
                        $content = $card['content'] ?? '';

                        if (empty($card_title)) continue;
                    ?>
                        <div class="swiper-slide">
                            <div class="services-slider__card">
                                <?php if ($icon): ?>
                                    <div class="services-slider__icon">
                                        <?php echo wp_get_attachment_image($icon, 'thumbnail', false, [
                                            'class'   => 'services-slider__icon-img',
                                            'loading' => 'lazy',
                                        ]) ?>
                                    </div>
                                <?php endif; ?>

                                <div class="services-slider__body">
                                    <h3 class="services-slider__card-title">
                                        <?php echo esc_html($card_title); ?>
                                    </h3>

                                    <?php if ($content): ?>
                                        <div class="services-slider__content content">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination services-slider__pagination"></div>
            </div>
        </div>

    </div>
</section>
