<?php

$subtitle = $args['testimonials_subtitle'] ?? get_sub_field('testimonials_subtitle');
$title = $args['testimonials_title'] ?? get_sub_field('testimonials_title');

$query_args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 10,
    'post_status'    => 'publish'
);

$testim_query = new WP_Query($query_args);

?>

<?php if ($testim_query->have_posts()): ?>
    <section class="testimonial-slider | section" style="position: relative;">
        <div class="container flow">
             <?php if($title): ?>
            <h2 class="testimonial__title" data-reveal="fade-up">
                <?php echo $title ?>
            </h2>
        <?php endif; ?>
        <?php if($subtitle): ?>
            <div class="testimonial__subtitle" data-reveal="fade-up" data-reveal-delay="100">
                <?php echo $subtitle ?>
            </div>
        <?php endif; ?>
            <div class="slider-wrapper | flow" data-reveal="fade-up" data-reveal-delay="200">
                <div class="swiper">
                    <ul class="swiper-wrapper">
                            <?php while ($testim_query->have_posts()) :
                                $testim_query->the_post();
                                    $name = get_the_title();
                                    $testim_text = get_the_content();
                                    $position = get('position');
                                    $rating = get('rating');
                                    $avatar = get('avatar');
                                ?>
                                    <li class='testimonial-slide | swiper-slide'>
                                        <div class="testimonial-slide__content">
                                            <?php if($rating): ?>
                                                <div class="testimonial-slide__rating">
                                                    <?php for($i = 0; $i < $rating; $i++){ ?>
                                                        <span class="star"></span>
                                                    <?php } ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($testim_text): ?>
                                                <div class="testimonial-slide__text">
                                                    <?php echo $testim_text; ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="testimonial-slide__meta">
                                                <?php if($avatar): ?>
                                                    <div class="testimonial-slide__avatar">
                                                        <img src="<?php echo $avatar; ?>" width="56" height="56">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="testimonial-slide__meta-box">
                                                    <?php if($name): ?>
                                                        <div class="testimonial-slide__name">
                                                            <?php echo $name; ?>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if($position): ?>
                                                        <div class="testimonial-slide__pos">
                                                            <?php echo $position ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <?php wp_reset_postdata(); ?>
                            <?php endwhile; ?>
                    </ul>
                </div>
                <div class="testimonial-swiper-pagination swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php endif; ?>