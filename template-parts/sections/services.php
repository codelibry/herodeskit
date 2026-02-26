<?php

$cards = $args['services__list'] ?? get_sub_field('services__list');

if (empty($cards)) {
    return;
}

?>

<section class="services">
    <div class="container">

        <div class="services__grid auto-grid" data-reveal="fade-up">
            <?php foreach ($cards as $card):
                $icon    = $card['icon'] ?? '';
                $title   = $card['title'] ?? '';
                $content = $card['content'] ?? '';

                if (empty($title)) continue;
            ?>
                <div class="services__card hover-glow">
                    <?php if ($icon): ?>
                        <div class="services__icon">
                            <?php echo wp_get_attachment_image($icon, 'thumbnail', false, [
                                'class'   => 'services__icon-img',
                                'loading' => 'lazy',
                            ]) ?>
                        </div>
                    <?php endif; ?>

                    <div class="services__body">
                        <h3 class="services__title">
                            <?php echo esc_html($title); ?>
                        </h3>

                        <?php if ($content): ?>
                            <div class="services__content content">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
