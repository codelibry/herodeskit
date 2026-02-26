<?php

$title      = $args['testimonials-v2__title'] ?? get_sub_field('testimonials-v2__title');
$word_limit = $args['testimonials-v2__word-limit'] ?? get_sub_field('testimonials-v2__word-limit');
$word_limit = $word_limit ? (int) $word_limit : 50;

// Get reviews from the Google Reviews plugin
global $wpdb;
$table_name = $wpdb->prefix . 'trustindex_google_reviews';
$reviews = [];
$total_reviews = 0;
$avg_rating = 5;

if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name))) {
    $reviews = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM %i WHERE hidden = 0 AND rating = 5 ORDER BY date DESC", $table_name)
    );
    $total_reviews = (int) $wpdb->get_var(
        $wpdb->prepare("SELECT COUNT(*) FROM %i WHERE hidden = 0", $table_name)
    );
    $avg_score = $wpdb->get_var(
        $wpdb->prepare("SELECT AVG(rating) FROM %i WHERE hidden = 0", $table_name)
    );
    $avg_rating = $avg_score ? round((float) $avg_score) : 5;
}

if (empty($title) && empty($reviews)) {
    return;
}

// Build Google Maps profile URL
$google_profile_url = '';
$page_details = get_option('trustindex-google-page-details');
if (!empty($page_details['id'])) {
    $google_profile_url = 'https://www.google.com/maps/search/?api=1&query=Google&query_place_id=' . urlencode($page_details['id']);
}

?>

<section class="testimonials-v2">
    <?php if ($title): ?>
        <h2 class="testimonials-v2__title">
            <?php echo wp_kses_post($title); ?>
        </h2>
    <?php endif; ?>

    <?php if (!empty($reviews)): ?>
        <div class="testimonials-v2__carousel">
            <div class="swiper js-testimonials-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($reviews as $review):
                        $full_text = esc_html(wp_strip_all_tags($review->text));
                        $words = explode(' ', $full_text);
                        $is_long = count($words) > $word_limit;
                        $short_text = $is_long ? implode(' ', array_slice($words, 0, $word_limit)) . '...' : $full_text;

                        // Format date
                        $review_date = '';
                        if (!empty($review->date)) {
                            $timestamp = strtotime($review->date);
                            if ($timestamp) {
                                $review_date = date_i18n('F j, Y', $timestamp);
                            }
                        }
                    ?>
                        <div class="swiper-slide">
                            <?php if ($google_profile_url): ?>
                                <a href="<?php echo esc_url($google_profile_url); ?>" target="_blank" rel="noopener noreferrer" class="testimonials-v2__card testimonials-v2__card--link">
                            <?php else: ?>
                                <div class="testimonials-v2__card">
                            <?php endif; ?>

                                <img src="https://cdn.trustindex.io/assets/platform/Google/icon.svg" alt="Google" class="testimonials-v2__google-badge" width="30" height="30" loading="lazy">

                                <div class="testimonials-v2__avatar">
                                    <?php if (!empty($review->user_photo)): ?>
                                        <img src="<?php echo esc_url($review->user_photo); ?>" alt="<?php echo esc_attr($review->user); ?>" width="62" height="62" loading="lazy">
                                    <?php else: ?>
                                        <?php echo get_inline_svg('quote-icon'); ?>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($review->text)): ?>
                                    <div class="testimonials-v2__text-wrap js-review-text" <?php if ($is_long): ?>data-full="<?php echo esc_attr($full_text); ?>" data-short="<?php echo esc_attr($short_text); ?>"<?php endif; ?>>
                                        <p class="testimonials-v2__text">
                                            &ldquo;<?php echo $is_long ? $short_text : $full_text; ?>&rdquo;
                                        </p>
                                        <?php if ($is_long): ?>
                                            <button type="button" class="testimonials-v2__read-more js-read-more">Read more</button>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="testimonials-v2__author">
                                    <div class="testimonials-v2__author-info">
                                        <?php if (!empty($review->user)): ?>
                                            <span class="testimonials-v2__name">
                                                <?php echo esc_html($review->user); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($review_date): ?>
                                            <span class="testimonials-v2__location">
                                                <?php echo esc_html($review_date); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="testimonials-v2__rating">
                                        <?php
                                        $stars = !empty($review->rating) ? (int) $review->rating : 5;
                                        for ($i = 0; $i < $stars; $i++):
                                        ?>
                                            <?php echo get_inline_svg('star-gold'); ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                            <?php if ($google_profile_url): ?>
                                </a>
                            <?php else: ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="testimonials-v2__badge">
            <div class="testimonials-v2__badge-inner">
                <div class="testimonials-v2__google-icon">
                    <img src="https://cdn.trustindex.io/assets/platform/Google/icon.svg" alt="Google" width="72" height="72">
                </div>
                <div class="testimonials-v2__badge-info">
                    <span class="testimonials-v2__badge-label">Excellent</span>
                    <div class="testimonials-v2__badge-stars">
                        <?php for ($i = 0; $i < $avg_rating; $i++): ?>
                            <?php echo get_inline_svg('star-gold'); ?>
                        <?php endfor; ?>
                    </div>
                    <span class="testimonials-v2__badge-count">
                        Based on <?php echo esc_html($total_reviews); ?> reviews
                    </span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
