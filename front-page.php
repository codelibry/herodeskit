<?php 

get_header();

get_template_part('template-parts/sections/banner-slider', null, array(
    'is_example' => true,
    'slider' => array(
        array(
            'subtitle' => 'Slide Subtitle',
            'title' => 'Slide Title',
            'description' => 'Slide Description',
            'button' => array(
                'url' => home_url(),
                'title' => 'Button'
                ),
            'image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg'
        ),
        array(
            'subtitle' => 'Slide Subtitle',
            'title' => 'Slide Title',
            'description' => 'Slide Description',
            'button' => array(
                'url' => home_url(),
                'title' => 'Button'
            ),
            'image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg'
        ),
    )
));


get_template_part('template-parts/sections/our-advantages', null, array(
    'is_example' => true,
    'advantages_subtitle' => 'Benefits Subtitle',
    'advantages_title' => 'Benefits Title',
    'advantages_list' => array(
        array(
            'title' => 'Our Advantages Title',
            'description' => 'Our Advantages Description',
            'icon' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg'
        ),
        array(
            'title' => 'Our Advantages Title',
            'description' => 'Our Advantages Description',
            'icon' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg'
        ),
    )
));


get_template_part('template-parts/sections/benefits', null, array(
    'is_example' => true,
    'benefits-subtitle' => 'Benefits Subtitle',
    'benefits-title' => 'Benefits Title',
    'benefits-image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg',
    'benefits-button' => array(
        'url' => home_url(),
        'title' => 'Button'
    ),
    'benefits_content-list' => array(
        array(
            'title' => 'Benefits list Title',
            'content' => 'Benefits list Content'
        ),
        array(
            'title' => 'Benefits list Title',
            'content' => 'Benefits list Content'
        ),
    )
));


get_template_part('template-parts/sections/content-image', null, array(
    'is_example' => true,
    'content-subtitle' => 'Content-Image Subtitle',
    'content-title' => 'Content-Image Title',
    'content-image_image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg',
    'content-image_content' => 'Content-Image Content',
    'content-button' => array(
        'url' => home_url(),
        'title' => 'Button'
    )
));


get_template_part('template-parts/sections/testimonials', null, array(
    'is_example' => true,
    'testimonials_subtitle' => 'Testimonials Subtitle',
    'testimonials_title' => 'Testimonials Title',
    'faq-about__faq-list' => array(
        array(
            'title' => 'FAQ item Title',
            'content' => 'FAQ item Content'
        ),
        array(
            'title' => 'FAQ item Title',
            'content' => 'FAQ item Content'
        ),
    )
));


get_template_part('template-parts/sections/faq-about', null, array(
    'is_example' => true,
    'faq-about__about-content' => 'FAQ About Content',
    'faq-about__contacts-content' => 'FAQ Contacts Content',
    'faq-about__about-image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg',
    'faq-about__faq-image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg',
    'faq-about__faq-subtitle' => 'FAQ Main Sub Title',
    'faq-about__faq-title' => 'FAQ Main Title',
    'faq-about__faq-list' => array(
        array(
            'title' => 'FAQ item Title',
            'content' => 'FAQ item Content'
        ),
        array(
            'title' => 'FAQ item Title',
            'content' => 'FAQ item Content'
        ),
    )
));


get_template_part('template-parts/sections/faq', null, array(
    'is_example' => true,
    'faq__faq-subtitle' => 'FAQ Subtitle',
    'faq__faq-title' => 'FAQ Title',
    'faq__faq-image' => CODELIBRY_THEME_URI . '/src/assets/images/placeholder.jpg',
    'faq__faq-list' => array(
        array(
            'title' => 'FAQ item Title',
            'content' => 'FAQ item Content'
        ),
        array(
            'title' => 'FAQ item Title',
            'content' => 'FAQ item Content'
        ),
    )
));


get_footer();

?>
