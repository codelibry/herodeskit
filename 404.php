<?php

get_header();

$content = get('404__content', $options = true);
$button  = get('404__button', $options = true);

?>

<main id="main">
    <section class="not-found">
        <div class="container">
            <div class="not-found__inner">
                <?php if ($content): ?>
                    <div class="not-found__text content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>

                <div class="not-found__action">
                    <?php if ($button): ?>
                        <a class="button button--not-found" href="<?php echo esc_url($button['url']); ?>">
                            <span><?php echo esc_html($button['title']); ?></span>
                            <?php echo get_inline_svg('arrow-right-small'); ?>
                        </a>
                    <?php else: ?>
                        <a class="button button--not-found" href="<?php echo esc_url(home_url('/')); ?>">
                            <span><?php esc_html_e('Go Back', 'codelibry'); ?></span>
                            <?php echo get_inline_svg('arrow-right-small'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
