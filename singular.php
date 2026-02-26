<?php get_header(); ?>

<?php
global $post;
$post_slug = $post->post_name;
?>

<main class="main" id="main">
  <div class="singular-page">

      <div class="singular-page__hero">
          <div class="container">
              <h1 class="singular-page__title">
                  <?php the_title(); ?>
              </h1>
              <?php if (is_singular('post')): ?>
                  <p class="singular-page__date"><?php echo get_the_date('F j, Y'); ?></p>
              <?php endif; ?>
          </div>
      </div>

      <div class="singular-page__body">
          <div class="container">
              <div class="content">
                  <?php the_content(); ?>
              </div>
          </div>
      </div>

  </div>

  <?php
    get_template_part('template-parts/sections/cta-banner', null, [
      'cta-banner__title'       => get('cta-banner__title'),
      'cta-banner__description' => get('cta-banner__description'),
      'cta-banner__button-1'    => get('cta-banner__button-1'),
      'cta-banner__button-2'    => get('cta-banner__button-2'),
    ]);
  ?>

</main>

<?php get_footer();?>
