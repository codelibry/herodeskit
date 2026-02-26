<?php

$benefits_subtitle = $args['benefits-subtitle'] ?? get_sub_field('benefits-subtitle');
$benefits_title = $args['benefits-title'] ?? get_sub_field('benefits-title');
$benefits_image = $args['benefits-image'] ?? get_sub_field('benefits-image');
$benefits_list = $args['benefits_content-list'] ?? get_sub_field('benefits_content-list');
$button = $args['benefits-button'] ?? get_sub_field('benefits-button');

if(empty($benefits_list)) {
    return;
}

?>

<section class="benefits | section">
    <div class="container | flow">
        <?php if($benefits_title): ?>
            <h2 class="benefits__title" data-reveal="fade-up">
                <?php echo $benefits_title ?>
            </h2>
        <?php endif; ?>

        <?php if($benefits_subtitle): ?>
            <p class="benefits__subtitle" data-reveal="fade-up" data-reveal-delay="100">
                <?php echo $benefits_subtitle ?>
            </p>
        <?php endif; ?>

        <div class="benefits__container auto-grid" data-layout="50-50" id="benefits" data-reveal="fade-up" data-reveal-delay="200">  <!-- or id="faq" -->
            <?php if(!empty($benefits_list)): ?>
                <div class="box">
                    <div class="benefits-container">
                        <?php foreach ($benefits_list as $item): 
                            $title = $item['title'];
                            $description = $item['content'];
                        ?>
                            <div class='benefits-item'>
                                <?php if($title): ?>
                                    <p class="benefits-item__title">
                                        <?php echo $title ?>
                                    </p>
                                <?php endif; ?>

                                <?php if($description): ?>
                                    <p class="benefits-item__content">
                                        <?php echo $description ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                        
                    <?php if($button): ?>
                        <a class="button" href="<?php echo $button['url'] ?>">
                            <?php echo $button['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($benefits_image): ?>
                <div class="box">
                    <?php if (is_numeric($benefits_image)): ?>
                    <?php echo wp_get_attachment_image($benefits_image, 'medium', false, [
                        'loading' => 'lazy'
                    ]) ?>
                    <?php else: ?>
                        <img src="<?php echo $benefits_image; ?>" class="attachment-large size-large" alt="test-slide-image" decoding="sync" fetchpriority="high">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>