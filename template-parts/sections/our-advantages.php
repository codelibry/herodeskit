<?php

$subtitle = $args['advantages_subtitle'] ?? get_sub_field('advantages_subtitle');
$title = $args['advantages_title'] ?? get_sub_field('advantages_title');
$list = $args['advantages_list'] ?? get_sub_field('advantages_list');


if(empty($list)) {
    return;
}

?>

<section class="advantages | section">
    <div class="container | flow">
        <?php if($title): ?>
            <h2 class="advantages__title" data-reveal="fade-up">
                <?php echo $title ?>
            </h2>
        <?php endif; ?>

        <?php if($subtitle): ?>
            <p class="advantages__subtitle" data-reveal="fade-up" data-reveal-delay="100">
                <?php echo $subtitle ?>
            </p>
        <?php endif; ?>

        <div class="advantages__container" id="our-advantages" data-reveal="fade-up" data-reveal-delay="200">
            <?php if(!empty($list)): ?>
                <div class="box">
                    <div class="advantages-grid auto-grid" data-layout="thirds">
                        <?php foreach ($list as $item): 
                            $title = $item['title'];
                            $description = $item['description'];
                            $image = $item['icon'];
                        ?>
                            <div class='advantages-item'>
                                <?php if (is_numeric($image)): ?>
                                <?php echo wp_get_attachment_image($image, 'medium', false, [
                                    'loading' => 'lazy'
                                ]) ;?>
                                <?php else: ?>
                                    <img src="<?php echo $image; ?>" class="attachment-large size-large" alt="test-slide-image" decoding="sync" fetchpriority="high">
                                <?php endif; ?>

                                <?php if($title): ?>
                                    <p class="advantages-item__title">
                                        <?php echo $title ?>
                                    </p>
                                <?php endif; ?>

                                <?php if($description): ?>
                                    <p class="advantages-item__content">
                                        <?php echo $description ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
