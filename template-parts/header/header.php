<header class="header">
    <div class="container-xl">
        <div class="header__bar">

            <!-- Logo -->
            <?php get_template_part('template-parts/header/logo') ?>

            <!-- Desktop Menu -->
            <?php get_template_part('template-parts/header/menu') ?>

            <!-- Actions -->
            <div class="header__actions">
                <?php
                $header_button = get('header__button', true);
                if ($header_button): ?>
                    <a class="button button--header header__cta" href="<?php echo $header_button['url'] ?>">
                        <?php echo $header_button['title'] ?>
                    </a>
                <?php endif; ?>

                <?php get_template_part('template-parts/header/mobile-menu') ?>
            </div>

        </div>
    </div>
</header>
