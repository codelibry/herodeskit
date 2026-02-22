<?php
/**
 * Reusable News Card component.
 *
 * Usage:
 *   get_template_part('template-parts/components/news-card', null, [
 *       'image' => $image_id_or_url,
 *       'date'  => 'December 12, 2025',
 *       'title' => 'Card title',
 *       'link'  => 'https://...',
 *   ]);
 */

$image = $args['image'] ?? '';
$date  = $args['date'] ?? '';
$title = $args['title'] ?? '';
$link  = $args['link'] ?? '';

if (empty($title)) {
    return;
}

$tag_open  = $link ? '<a href="' . esc_url($link) . '" class="news-card">' : '<div class="news-card">';
$tag_close = $link ? '</a>' : '</div>';

echo $tag_open;
?>

    <?php if ($image): ?>
        <div class="news-card__media">
            <?php if (is_numeric($image)): ?>
                <?php echo wp_get_attachment_image($image, 'medium_large', false, [
                    'class'   => 'news-card__img',
                    'loading' => 'lazy',
                ]); ?>
            <?php else: ?>
                <img class="news-card__img" src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="news-card__details">
        <?php if ($date): ?>
            <p class="news-card__date">
                <?php echo esc_html($date); ?>
            </p>
        <?php endif; ?>

        <p class="news-card__title">
            <?php echo esc_html($title); ?>
        </p>
    </div>

<?php echo $tag_close; ?>
