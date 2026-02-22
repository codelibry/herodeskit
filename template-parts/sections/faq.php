<?php

$faq_subtitle = $args['faq__faq-subtitle'] ?? get_sub_field('faq__faq-subtitle');
$faq_title = $args['faq__faq-title'] ?? get_sub_field('faq__faq-title');
$faq_image = $args['faq__faq-image'] ?? get_sub_field('faq__faq-image');
$faq_list = $args['faq__faq-list'] ?? get_sub_field('faq__faq-list');

if(empty($faq_list)) {
    return;
}
?>

<section class="faq | section">
    <div class="container | flow">
        <div class="faq__faq auto-grid" data-layout="50-50" id="faq-secondary">  <!-- or id="faq" -->
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
                        'variant' => 'secondary'
                    ]); ?> <!-- or 'variant' => 'primary' -->
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
