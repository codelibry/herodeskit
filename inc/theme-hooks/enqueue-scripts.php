<?php

/*
 * Enqueue Styles
 */
function codelibry_enqueue_styles() {
  // Google Fonts: Montserrat, Poppins, Outfit
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Outfit:wght@500&family=Poppins:wght@500;600&display=swap', [], null, 'all');

  $style_version = filemtime(CODELIBRY_THEME_PATH . "/dist/css/main.min.css");
  wp_enqueue_style('main-style', CODELIBRY_THEME_URI . "/dist/css/main.min.css", ['google-fonts'], $style_version, 'all');
}
add_action('wp_enqueue_scripts', 'codelibry_enqueue_styles', 999999);


/*
 * Enqueue Scripts
 */
function codelibry_enqueue_js() {
  $script_version = filemtime(CODELIBRY_THEME_PATH . "/dist/main.min.js");
  wp_enqueue_script('main-script', CODELIBRY_THEME_URI . "/dist/main.min.js", [], $script_version, true);

  // Passing PHP variables to JavaScript
  wp_localize_script('main-script', 'site', [
    'ajax_url'    => admin_url('admin-ajax.php'),
    'ajax_nonce'  => wp_create_nonce('secure_nonce_name'),
    'site_url'    => get_site_url(),
    'theme_url'   => get_template_directory_uri(),
  ]);
}
add_action('wp_enqueue_scripts', 'codelibry_enqueue_js');
