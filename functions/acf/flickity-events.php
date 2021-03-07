<?php
if ( function_exists( 'acf_register_block_type' ) ) :
    function dutchtown_acf_init_flickity_events()
    {
        acf_register_block_type( array(
            'name' => 'dutchtown-flickity-events',
            'title' => 'Dutchtown Flickity Events',
            'description' => 'A Flickity carousel for events.',
            'category' => 'dutchtown-blocks',
            'icon' => array( 'src' => 'editor-expand' ),
            'mode' => 'preview',
            'keywords' => array( 'dutchtown', 'flickity', 'carousel', 'events' ),
            'render_template' => 'block-templates/block-flickity-events.php',
            'enqueue_style'     => get_stylesheet_directory_uri() . '/dist/css/flickity.css',
            'enqueue_script' => get_stylesheet_directory_uri() . '/dist/js/flickity.min.js',
            'supports' => array( 'align' => false, 'jsx' => true )
            )
        );
    }

    add_action( 'acf/init', 'dutchtown_acf_init_flickity_events' );
endif;

if ( function_exists( 'acf_add_local_field_group' ) ):
    acf_add_local_field_group( array(
        'key' => 'group_6034e38362c85',
        'title' => 'Flickity Events',
        'fields' => array(
            array(
                'key' => 'field_6034e46a8ce17',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6034e4708ce18',
                'label' => 'Body',
                'name' => 'body',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6034e4788ce19',
                'label' => 'URL',
                'name' => 'url',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6034e3eeb9605',
                'label' => 'Number of Events',
                'name' => 'number_of_events',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 5,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/dutchtown-flickity-events',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        )
    );
endif;