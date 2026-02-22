<?php

$title  = $args['news-cards__title'] ?? get_sub_field('news-cards__title');
$button = $args['news-cards__button'] ?? get_sub_field('news-cards__button');

$recent_posts = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (!$recent_posts->have_posts()) {
    return;
}

?>

<section class="news-cards">
    <div class="container">

        <div class="news-cards__header">
            <?php if ($title): ?>
                <h2 class="news-cards__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($button): ?>
                <a class="button button--news-outline" href="<?php echo esc_url($button['url']); ?>">
                    <?php echo esc_html($button['title']); ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="news-cards__grid auto-grid">
            <?php while ($recent_posts->have_posts()): $recent_posts->the_post();
                $image_id = get_post_thumbnail_id();
                $link     = get_permalink();
            ?>
                <a href="<?php echo esc_url($link); ?>" class="news-cards__card">
                    <?php if ($image_id): ?>
                        <div class="news-cards__media">
                            <?php echo wp_get_attachment_image($image_id, 'medium_large', false, [
                                'class'   => 'news-cards__img',
                                'loading' => 'lazy',
                            ]) ?>
                        </div>
                    <?php endif; ?>

                    <div class="news-cards__details">
                        <p class="news-cards__date">
                            <?php echo get_the_date('F j, Y'); ?>
                        </p>

                        <p class="news-cards__card-title">
                            <?php echo esc_html(get_the_title()); ?>
                        </p>
                    </div>
                </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>

    </div>
</section>
