<?php

function codelibry_testimonial_post_type() {
    if (!post_type_exists('testimonial')) {
        $labels = [
            'name'                  => 'Testimonial',
            'singular_name'         => 'Testimonial',
            'menu_name'             => 'Testimonials',
            'name_admin_bar'        => 'Testimonials',
            'add_new_item'          => 'Add New Testimonial',
        ];

        $args = [
            'labels'                => $labels,
            'label'                 => 'Testimonials',
            'supports'              => ['title', 'editor', 'thumbnail', 'excerpt'],
            'menu_position'         => 5,
            'public'                => true,
            'has_archive'           => false,
            'menu_icon'             => 'dashicons-admin-site',
            'capability_type'       => 'page',
            'show_in_rest'          => true
        ];

        register_post_type('testimonial', $args);
    }
}

add_action('init', 'codelibry_testimonial_post_type', 0);