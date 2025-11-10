<?php

if (isset($args['is_example'])){
    $content_subtitle = $args['content-subtitle'];
    $content_title = $args['content-title'];
    $content_image = $args['content-image_image'];
    $content_content = $args['content-image_content'];
    $button = $args['content-button'];
}
else{
    $content_subtitle = get('content-subtitle');
    $content_title = get('content-title');
    $content_image = get('content-image_image');
    $content_content = get('content-image_content');
    $button = get('content-button');
}


if(empty($content_title) && empty($content_subtitle) && empty($content_content)) {
    return;
}

?>

<section class="content-image | section">
    <div class="container | flow">
        <?php if($content_title): ?>
            <h2 class="content-image__title">
                <?php echo $content_title ?>
            </h2>
        <?php endif; ?>

        <?php if($content_subtitle): ?>
            <p class="content-image__subtitle">
                <?php echo $content_subtitle ?>
            </p>
        <?php endif; ?>

        <div class="content-image__container auto-grid" data-layout="50-50" id="content-image"> 
            <?php if($content_image): ?>
                <div class="box">
                    <?php if (is_numeric($content_image)): ?>
                    <?php echo wp_get_attachment_image($content_image, 'medium', false, [
                        'loading' => 'lazy'
                    ]) ?>
                    <?php else: ?>
                        <img src="<?php echo $content_image; ?>" class="attachment-large size-large" alt="test-slide-image" decoding="sync" fetchpriority="high">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($content_content)): ?>
                <div class="box | content-image__content | content">
                    <?php echo $content_content ?>
                        
                    <?php if($button): ?>
                        <a class="button" href="<?php echo $button['url'] ?>">
                            <?php echo $button['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
