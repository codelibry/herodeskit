<?php

$title   = $args['team-members__title'] ?? get_sub_field('team-members__title');
$members = $args['team-members__list'] ?? get_sub_field('team-members__list');

if (empty($members)) {
    return;
}

?>

<section class="team-members">
    <div class="container">

        <?php if ($title): ?>
            <h2 class="team-members__title">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <div class="team-members__grid auto-grid">
            <?php foreach ($members as $member):
                $image    = $member['image'] ?? '';
                $name     = $member['name'] ?? '';
                $position = $member['position'] ?? '';

                if (empty($name)) continue;
            ?>
                <div class="team-members__card">
                    <?php if ($image): ?>
                        <div class="team-members__media">
                            <?php if (is_numeric($image)): ?>
                                <?php echo wp_get_attachment_image($image, 'medium_large', false, [
                                    'class'   => 'team-members__img',
                                    'loading' => 'lazy',
                                ]) ?>
                            <?php else: ?>
                                <img class="team-members__img" src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="team-members__info">
                        <p class="team-members__name">
                            <?php echo esc_html($name); ?>
                        </p>
                        <?php if ($position): ?>
                            <p class="team-members__position">
                                <?php echo esc_html($position); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
