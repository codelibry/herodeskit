<div class="header__mobile-menu">
  <button class="header__mobile-menu-button">
    <?php echo get_inline_svg('menu-icon') ?>
    <span class="visually-hidden"><?php esc_html_e('Mobile Menu', 'codelibry') ?></span>
  </button>

  <!-- Mobile Menu -->
  <div class="mobile-menu">
    <button class="mobile-menu__close" type="button">
      <?php echo get_inline_svg('close-icon') ?>
      <span class="visually-hidden"><?php esc_html_e('Close mobile menu', 'codelibry') ?></span>
    </button>

    <div class="container">
      <div class="mobile-menu__menu">
        <?php
          wp_nav_menu([
            'theme_location' => 'header-menu',
         ]);
        ?>
      </div>

      <?php
      $header_button = get('header__button', true);
      if ($header_button): ?>
          <a class="button button--header mobile-menu__button" href="<?php echo $header_button['url'] ?>">
              <?php echo $header_button['title'] ?>
          </a>
      <?php endif; ?>
    </div>
  </div>
  <!-- Mobile Menu End -->

  <div class="mobile-menu-overlay"></div>
</div>
