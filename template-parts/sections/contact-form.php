<?php

$title       = $args['contact-form__title'] ?? get_sub_field('contact-form__title');
$subtitle    = $args['contact-form__subtitle'] ?? get_sub_field('contact-form__subtitle');
$form_id     = $args['contact-form__form'] ?? get_sub_field('contact-form__form');

if (empty($title)) {
    return;
}

?>

<section class="contact-form">
    <div class="container">

        <div class="contact-form__hero">
            <h1 class="contact-form__title">
                <?php echo esc_html($title); ?>
            </h1>

            <?php if ($subtitle): ?>
                <p class="contact-form__subtitle">
                    <?php echo nl2br(esc_html($subtitle)); ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if ($form_id): ?>
            <div class="contact-form__body">
                <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($form_id) . '"]'); ?>
            </div>
        <?php endif; ?>

    </div>
</section>
