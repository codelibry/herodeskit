<?php
/**
 * Blog / News archive page.
 * WordPress uses home.php for the posts listing page.
 */
get_header();

$paged      = get_query_var('paged') ? get_query_var('paged') : 1;
$total      = $wp_query->max_num_pages;
$current    = max(1, $paged);
?>

<main class="main" id="main">

    <!-- Hero -->
    <section class="news-archive__hero">
        <div class="container">
            <h1 class="news-archive__title">News</h1>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="news-archive__grid-section">
        <div class="container">

            <?php if (have_posts()): ?>
                <div class="news-archive__grid auto-grid">
                    <?php while (have_posts()): the_post();
                        get_template_part('template-parts/components/news-card', null, [
                            'image' => get_post_thumbnail_id(),
                            'date'  => get_the_date('F j, Y'),
                            'title' => get_the_title(),
                            'link'  => get_permalink(),
                        ]);
                    endwhile; ?>
                </div>

                <?php if ($total > 1): ?>
                    <nav class="news-pagination" aria-label="<?php esc_attr_e('Posts pagination', 'codelibry'); ?>">

                        <!-- Desktop pagination -->
                        <div class="news-pagination__desktop">
                            <?php if ($current > 1): ?>
                                <a href="<?php echo esc_url(get_pagenum_link($current - 1)); ?>" class="news-pagination__arrow news-pagination__arrow--prev" aria-label="Previous page">
                                    <svg width="21" height="14" viewBox="0 0 21 14" fill="none" style="transform: rotate(180deg)"><path d="M0.75 6.75L18.75 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12.75 0.75L19.3076 6.75L12.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    <span>Back</span>
                                </a>
                            <?php endif; ?>

                            <div class="news-pagination__numbers">
                                <?php
                                /**
                                 * Smart pagination: 1, 2 ... (last-1), last
                                 * Shows first 2 pages, ellipsis, last 2 pages.
                                 * Neighbours of current page are always visible.
                                 */
                                $show = [];

                                // Always show page 1 and 2
                                $show[] = 1;
                                if ($total >= 2) $show[] = 2;

                                // Current page and neighbours
                                if ($current > 1) $show[] = $current - 1;
                                $show[] = $current;
                                if ($current < $total) $show[] = $current + 1;

                                // Last 2 pages
                                if ($total >= 2) $show[] = $total - 1;
                                $show[] = $total;

                                $show = array_unique($show);
                                sort($show);
                                // Remove values < 1 or > total
                                $show = array_filter($show, function($p) use ($total) {
                                    return $p >= 1 && $p <= $total;
                                });
                                $show = array_values($show);

                                $prev = 0;
                                foreach ($show as $page):
                                    if ($page - $prev > 1): ?>
                                        <span class="news-pagination__dots">&hellip;</span>
                                    <?php endif;

                                    if ($page == $current): ?>
                                        <span class="news-pagination__number is-current"><?php echo $page; ?></span>
                                    <?php else: ?>
                                        <a href="<?php echo esc_url(get_pagenum_link($page)); ?>" class="news-pagination__number"><?php echo $page; ?></a>
                                    <?php endif;

                                    $prev = $page;
                                endforeach; ?>
                            </div>

                            <?php if ($current < $total): ?>
                                <a href="<?php echo esc_url(get_pagenum_link($current + 1)); ?>" class="news-pagination__arrow news-pagination__arrow--next">
                                    <span>Next</span>
                                    <svg width="21" height="14" viewBox="0 0 21 14" fill="none"><path d="M0.75 6.75L18.75 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12.75 0.75L19.3076 6.75L12.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Mobile pagination -->
                        <div class="news-pagination__mobile">
                            <?php if ($current > 1): ?>
                                <a href="<?php echo esc_url(get_pagenum_link($current - 1)); ?>" class="news-pagination__arrow news-pagination__arrow--prev" aria-label="Previous page">
                                    <svg width="21" height="14" viewBox="0 0 21 14" fill="none" style="transform: rotate(180deg)"><path d="M0.75 6.75L18.75 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12.75 0.75L19.3076 6.75L12.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    <span>Prev</span>
                                </a>
                            <?php else: ?>
                                <span class="news-pagination__arrow news-pagination__arrow--prev is-disabled">
                                    <svg width="21" height="14" viewBox="0 0 21 14" fill="none" style="transform: rotate(180deg)"><path d="M0.75 6.75L18.75 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12.75 0.75L19.3076 6.75L12.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    <span>Prev</span>
                                </span>
                            <?php endif; ?>

                            <span class="news-pagination__current"><?php echo $current; ?></span>

                            <?php if ($current < $total): ?>
                                <a href="<?php echo esc_url(get_pagenum_link($current + 1)); ?>" class="news-pagination__arrow news-pagination__arrow--next">
                                    <span>Next</span>
                                    <svg width="21" height="14" viewBox="0 0 21 14" fill="none"><path d="M0.75 6.75L18.75 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12.75 0.75L19.3076 6.75L12.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </a>
                            <?php else: ?>
                                <span class="news-pagination__arrow news-pagination__arrow--next is-disabled">
                                    <span>Next</span>
                                    <svg width="21" height="14" viewBox="0 0 21 14" fill="none"><path d="M0.75 6.75L18.75 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12.75 0.75L19.3076 6.75L12.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </span>
                            <?php endif; ?>
                        </div>

                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <p class="news-archive__empty">No posts found.</p>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
