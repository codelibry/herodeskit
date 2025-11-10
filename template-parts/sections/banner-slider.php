<?php

if (isset($args['is_example'])){
    $slider = $args['slider'];
}
else{
    $slider = get('slider');
}

if(empty($slider)) {
  return;
}

?>

<section class="banner-slider | section" style="position: relative;">
    <div class="container flow">
        <div class="slider-wrapper | flow">
            <div class="swiper">
                <ul class="swiper-wrapper">
                     <?php foreach ($slider as $slide): 
                        $subtitle = $slide['subtitle'];
                        $title = $slide['title'];
                        $description = $slide['description'];
                        $image = $slide['image'];
                        $button = $slide['button'];
                    ?>
                        <li class='banner-slide | swiper-slide'>
                            <?php if (is_numeric($image)): ?>
                            <?php echo wp_get_attachment_image($image, 'large', false, [
                              'loading' => false,
                              'decoding' => 'sync',
                              'fetchpriority' => 'high',
                            ]) ?>
                            <?php else: ?>
                                <img src="<?php echo $image; ?>" class="attachment-large size-large" alt="test-slide-image" decoding="sync" fetchpriority="high">
                            <?php endif; ?>

                            <div class="banner-slide__content | flow">
                                <?php if($title): ?>
                                    <h2 class="banner-slide__title">
                                        <?php echo $title ?>
                                    </h2>
                                <?php endif; ?>

                                <?php if($subtitle): ?>
                                    <p class="banner-slide__subtitle">
                                        <?php echo $subtitle ?>
                                    </p>
                                <?php endif; ?>

                                <?php if($description): ?>
                                    <p class="banner-slide__description">
                                        <?php echo $description ?>
                                    </p>
                                <?php endif; ?>

                                 <?php if($button): ?>
                                    <a class="button" href="<?php echo $button['url'] ?>">
                                        <?php echo $button['title'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
