<?php

$title       = $args['cta-banner__title'] ?? get_sub_field('cta-banner__title');
$description = $args['cta-banner__description'] ?? get_sub_field('cta-banner__description');
$button_1    = $args['cta-banner__button-1'] ?? get_sub_field('cta-banner__button-1');
$button_2    = $args['cta-banner__button-2'] ?? get_sub_field('cta-banner__button-2');

if (empty($title)) {
    return;
}

?>

<section class="cta-banner">
    <div class="container">
        <div class="cta-banner__inner">

            <div class="cta-banner__mesh" aria-hidden="true">
                <img src="<?php echo get_image_src('mesh.png'); ?>" alt="" loading="lazy">
            </div>

            <div class="cta-banner__content">
                <h2 class="cta-banner__title">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($description): ?>
                    <p class="cta-banner__description">
                        <?php echo esc_html($description); ?>
                    </p>
                <?php endif; ?>

                <?php if ($button_1 || $button_2): ?>
                    <div class="cta-banner__actions">
                        <?php if ($button_1): ?>
                            <a class="button button--cta-primary" href="<?php echo esc_url($button_1['url']); ?>">
                                <?php echo esc_html($button_1['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ($button_2): ?>
                            <a class="button button--cta-outline" href="<?php echo esc_url($button_2['url']); ?>">
                                <?php echo esc_html($button_2['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
