<?php get_header();?>

<?php
    if (have_rows('flexible-page')) :
        while (have_rows('flexible-page')) : the_row();
            get_template_part('template-parts/sections/' . get_row_layout());
        endwhile;
    endif;
?>

<?php get_footer();?>
