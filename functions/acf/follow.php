<?php
if ( function_exists( 'acf_register_block_type' ) ) :
    function dutchtown_acf_init_follow()
    {
        acf_register_block_type(array(
            'name'              => 'dutchtown_follow',
            'title'             => 'Dutchtown Follow',
            'description'       => 'Display social media links.',
            'render_template'   => 'block-templates/block-follow.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'follow', 'social' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));
    }
    add_action('acf/init', 'dutchtown_acf_init_follow');
endif;

if( function_exists('acf_add_local_field_group') ):
    acf_add_local_field_group(array(
        'key' => 'group_5f4051ea934cf',
        'title' => 'Follow',
        'fields' => array(
            array(
                'key' => 'field_5f405704335a2',
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
                'key' => 'field_5f4052245ee0d',
                'label' => 'Body',
                'name' => 'body',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5f4051f25ee0a',
                'label' => 'Instagram URL',
                'name' => 'instagram_url',
                'type' => 'url',
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
            ),
            array(
                'key' => 'field_5f4051ff5ee0b',
                'label' => 'Facebook URL',
                'name' => 'facebook_url',
                'type' => 'url',
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
            ),
            array(
                'key' => 'field_5f40520c5ee0c',
                'label' => 'Twitter URL',
                'name' => 'twitter_url',
                'type' => 'url',
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
            ),
            array(
                'key' => 'field_5f40520c5ee0yt',
                'label' => 'YouTube URL',
                'name' => 'youtube_url',
                'type' => 'url',
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
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/dutchtown-follow',
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
    ));
endif;