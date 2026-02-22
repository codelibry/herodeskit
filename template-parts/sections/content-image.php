<?php

$direction   = $args['content-image__direction'] ?? get_sub_field('content-image__direction');
$ratio       = $args['content-image__ratio'] ?? get_sub_field('content-image__ratio');
$image       = $args['content-image__image'] ?? get_sub_field('content-image__image');
$subtitle    = $args['content-image__subtitle'] ?? get_sub_field('content-image__subtitle');
$title       = $args['content-image__title'] ?? get_sub_field('content-image__title');
$content     = $args['content-image__content'] ?? get_sub_field('content-image__content');
$card_number = $args['content-image__card-number'] ?? get_sub_field('content-image__card-number');
$card_text   = $args['content-image__card-text'] ?? get_sub_field('content-image__card-text');

if (empty($title)) {
    return;
}

$direction = $direction ?: 'image-left';
$ratio     = $ratio ?: 'portrait';
$modifier  = $direction === 'image-right' ? 'content-image--reversed' : '';
$ratio_class = 'content-image--' . $ratio;

?>

<section class="content-image <?php echo esc_attr($modifier); ?> <?php echo esc_attr($ratio_class); ?>">
    <div class="container">
        <div class="content-image__row">

            <?php if ($image): ?>
                <div class="content-image__media">
                    <?php if (is_numeric($image)): ?>
                        <?php echo wp_get_attachment_image($image, 'large', false, [
                            'class'   => 'content-image__img',
                            'loading' => 'lazy',
                        ]) ?>
                    <?php else: ?>
                        <img class="content-image__img" src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
                    <?php endif; ?>

                    <?php if ($card_number || $card_text): ?>
                        <div class="content-image__card">
                            <?php if ($card_number): ?>
                                <span class="content-image__card-number"><?php echo esc_html($card_number); ?></span>
                            <?php endif; ?>
                            <?php if ($card_text): ?>
                                <p class="content-image__card-text"><?php echo wp_kses_post($card_text); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content-image__body">
                <?php if ($subtitle): ?>
                    <p class="content-image__subtitle">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <h2 class="content-image__title">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($content): ?>
                    <div class="content-image__content | content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
