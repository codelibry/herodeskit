<?php

$about_content = $args['faq-about__about-content'] ?? get_sub_field('faq-about__about-content');
$contacts_content = $args['faq-about__contacts-content'] ?? get_sub_field('faq-about__contacts-content');
$about_image = $args['faq-about__about-image'] ?? get_sub_field('faq-about__about-image');
$faq_title = $args['faq-about__faq-title'] ?? get_sub_field('faq-about__faq-title');
$faq_subtitle = $args['faq-about__faq-subtitle'] ?? get_sub_field('faq-about__faq-subtitle');
$faq_image = $args['faq-about__faq-image'] ?? get_sub_field('faq-about__faq-image');
$faq_list = $args['faq-about__faq-list'] ?? get_sub_field('faq-about__faq-list');

if(empty($about_content) && empty($contacts_content) && empty($faq_list)) {
    return;
}

?>

<section class="faq-about | section" id="about">
    <div class="container | flow">
        <div class="faq-about__about auto-grid" data-layout="50-50">
            <div class="faq-about__about-content | flow">
                <?php if($about_content): ?>
                    <div class="box content">
                        <?php echo $about_content ?>
                    </div>
                <?php endif; ?>

                <?php if($contacts_content): ?>
                    <div class="box content" id="contacts">
                        <?php echo $contacts_content ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (is_numeric($about_image)): ?>
                <div class="box">
                    <?php echo wp_get_attachment_image($about_image, 'medium', false, [
                      'loading' => 'lazy'
                    ]) ?>
                </div>
            <?php else: ?>
                <img src="<?php echo $about_image; ?>" class="attachment-large size-large" alt="test-slide-image" decoding="sync" fetchpriority="high">
            <?php endif; ?>
        </div>

        <div class="faq-about__faq auto-grid" data-layout="50-50" id="faq">
            <?php if (is_numeric($faq_image)): ?>
                <div class="box">
                    <?php echo wp_get_attachment_image($faq_image, 'medium', false, [
                      'loading' => 'lazy'
                    ]) ?>
                </div>
            <?php else: ?>
                <img src="<?php echo $faq_image; ?>" class="attachment-large size-large" alt="test-slide-image" decoding="sync" fetchpriority="high">
            <?php endif; ?>
            
            <?php if(!empty($faq_list)): ?>
                <div class="box">
                    <?php get_template_part('template-parts/parts/accordion', null, [
                        'subtitle' => $faq_subtitle,
                        'title' => $faq_title,
                        'list' => $faq_list,
                        'variant' => 'primary'
                    ]); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
