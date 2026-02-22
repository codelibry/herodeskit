<?php

$footer_description  = get('footer__description', $options = true);
$footer_company_name = get('footer__company-name', $options = true);
$footer_email        = get('footer__email', $options = true);
$footer_phone        = get('footer__phone', $options = true);
$footer_socials      = get('footer__socials', $options = true);

?>

<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__inner">

            <div class="footer__brand">
                <div class="footer__brand-top">
                    <a href="<?php echo home_url(); ?>" class="footer__logo">
                        <?php echo get_inline_svg('logo'); ?>
                        <span class="visually-hidden"><?php esc_html_e('Go to homepage', 'codelibry'); ?></span>
                    </a>

                    <?php if ($footer_description): ?>
                        <p class="footer__description">
                            <?php echo esc_html($footer_description); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($footer_company_name): ?>
                    <p class="footer__copyright">
                        &copy; <?php echo date('Y'); ?> <?php echo esc_html($footer_company_name); ?>. All rights reserved.
                    </p>
                <?php endif; ?>
            </div>

            <div class="footer__columns">
                <nav class="footer__nav">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu-1',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]);
                    ?>
                </nav>

                <div class="footer__contacts">
                    <div class="footer__contacts-info">
                        <?php if ($footer_email): ?>
                            <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="footer__contact-link">
                                <?php echo esc_html($footer_email); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ($footer_phone): ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $footer_phone)); ?>" class="footer__contact-link">
                                <?php echo esc_html($footer_phone); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if ($footer_socials): ?>
                        <div class="footer__socials">
                            <?php foreach ($footer_socials as $social): ?>
                                <?php if (!empty($social['link'])): ?>
                                    <a href="<?php echo esc_url($social['link']); ?>" class="footer__social" target="_blank" rel="noopener noreferrer">
                                        <?php if (!empty($social['icon'])): ?>
                                            <?php echo wp_get_attachment_image($social['icon'], 'thumbnail', false, [
                                                'class' => 'footer__social-icon',
                                            ]); ?>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</footer>
