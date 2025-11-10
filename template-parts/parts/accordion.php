<?php

$subtitle = get_array_value($args, 'subtitle');
$title = get_array_value($args, 'title');
$list = get_array_value($args, 'list');
$variant = get_array_value($args, 'variant', 'primary');

$variant_class = 'accordion--' . $variant;

?>

<div class="accordion | flow <?php echo $variant_class ?>">
    <?php if($subtitle): ?>
        <h5 class="accordion-title | h5">
            <?php echo $subtitle ?>
        </h5>
    <?php endif; ?>
    <?php if($title): ?>
        <h2 class="accordion-title | h3">
            <?php echo $title ?>
        </h2>
    <?php endif; ?>

    <?php foreach ($list as $item): 
        $title = $item['title'];
        $content = $item['content'];
    ?>
        <div class="accordion-item">
            <?php if($title): ?>
                <button class="accordion-header">
                    <?php echo $title ?>
                </button>
            <?php endif; ?>

            <?php if($content): ?>
                <div class="accordion-content">
                    <?php echo $content ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
