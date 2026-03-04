<?php

$title     = $args['service-area__title'] ?? get_sub_field('service-area__title');
$text      = $args['service-area__text'] ?? get_sub_field('service-area__text');
$countries = $args['service-area__countries'] ?? get_sub_field('service-area__countries');

if (empty($title)) {
    return;
}

?>

<section class="service-area">
    <div class="container">

        <?php if ($title): ?>
            <h2 class="service-area__title" data-reveal="fade-up">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($text): ?>
            <p class="service-area__text" data-reveal="fade-up" data-reveal-delay="100">
                <?php echo esc_html($text); ?>
            </p>
        <?php endif; ?>

        <?php if ($countries): ?>
            <ul class="service-area__list" data-reveal="fade-up" data-reveal-delay="200">
                <?php foreach ($countries as $item): ?>
                    <li class="service-area__item"><?php echo esc_html($item['service-area__country']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </div>
</section>
