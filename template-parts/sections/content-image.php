<?php

$media_type  = $args['content-image__media-type'] ?? get_sub_field('content-image__media-type');
$direction   = $args['content-image__direction'] ?? get_sub_field('content-image__direction');
$ratio       = $args['content-image__ratio'] ?? get_sub_field('content-image__ratio');
$image       = $args['content-image__image'] ?? get_sub_field('content-image__image');
$map_url     = $args['content-image__map-url'] ?? get_sub_field('content-image__map-url');
$subtitle    = $args['content-image__subtitle'] ?? get_sub_field('content-image__subtitle');
$title       = $args['content-image__title'] ?? get_sub_field('content-image__title');
$content     = $args['content-image__content'] ?? get_sub_field('content-image__content');
$card_number = $args['content-image__card-number'] ?? get_sub_field('content-image__card-number');
$card_text   = $args['content-image__card-text'] ?? get_sub_field('content-image__card-text');

if (empty($title)) {
    return;
}

$media_type = $media_type ?: 'image';
$is_map     = $media_type === 'map' && !empty($map_url);
$direction  = $direction ?: 'image-left';
$ratio      = $ratio ?: 'portrait';
$modifier   = $direction === 'image-right' ? 'content-image--reversed' : '';
$ratio_class = $is_map ? 'content-image--map' : 'content-image--' . $ratio;

// Convert Google Maps URL to embed URL
$embed_url = '';
if ($is_map) {
    if (strpos($map_url, '/embed') !== false) {
        // Already an embed URL
        $embed_url = $map_url;
    } elseif (preg_match('/@([-\d.]+),([-\d.]+),([\d.]+)z/', $map_url, $matches)) {
        // Share URL with coordinates: /@lat,lng,zoomz
        $lat  = $matches[1];
        $lng  = $matches[2];
        $zoom = (float) $matches[3];
        // Convert zoom level to embed "d" parameter (meters per view)
        $d = 591657550.5 / pow(2, $zoom);
        $embed_url = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d' . round($d) . '!2d' . $lng . '!3d' . $lat . '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1&hl=en&language=en';
    } else {
        // Fallback: use Google Maps embed API with query
        $embed_url = 'https://www.google.com/maps/embed/v1/place?key=&q=' . urlencode($map_url);
    }
}

$has_media = $is_map || !empty($image);

?>

<section class="content-image <?php echo esc_attr($modifier); ?> <?php echo esc_attr($ratio_class); ?>">
    <div class="container">
        <div class="content-image__row">

            <?php if ($has_media): ?>
                <div class="content-image__media" data-reveal="<?php echo $direction === 'image-right' ? 'fade-right' : 'fade-left'; ?>">
                    <?php if ($is_map): ?>
                        <iframe
                            class="content-image__map"
                            src="<?php echo esc_url($embed_url); ?>"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    <?php elseif (is_numeric($image)): ?>
                        <?php echo wp_get_attachment_image($image, 'large', false, [
                            'class'   => 'content-image__img',
                            'loading' => 'lazy',
                        ]) ?>
                    <?php else: ?>
                        <img class="content-image__img" src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
                    <?php endif; ?>

                    <?php if (!$is_map && ($card_number || $card_text)): ?>
                        <div class="content-image__card">
                            <?php if ($card_number): ?>
                                <span class="content-image__card-number"><?php echo esc_html($card_number); ?></span>
                            <?php endif; ?>
                            <?php if ($card_text): ?>
                                <p class="content-image__card-text"><?php echo wp_kses_post($card_text); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content-image__body" data-reveal="<?php echo $direction === 'image-right' ? 'fade-left' : 'fade-right'; ?>" data-reveal-delay="150">
                <?php if ($subtitle): ?>
                    <p class="content-image__subtitle">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <h2 class="content-image__title">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($content): ?>
                    <div class="content-image__content | content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
