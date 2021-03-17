<?php
if ( function_exists( 'acf_register_block_type' ) ) :
    function dutchtown_acf_init_masonry()
    {
        acf_register_block_type(array(
            'name'              => 'dutchtown_masonry',
            'title'             => __('Dutchtown Masonry'),
            'description'       => __('A block in a masonry layout.'),
            'render_template'   => 'block-templates/block-masonry.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'dutchtown', 'block', 'masonry' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
            )
        );
    }

    add_action( 'acf/init', 'dutchtown_acf_init_masonry' );
endif;

if ( function_exists( 'acf_add_local_field_group' ) ) :
    acf_add_local_field_group(array(
        'key' => 'group_5f3dc480f2549',
        'title' => 'Masonry Block',
        'fields' => array(
            array(
                'key' => 'field_5f3dc487a4cd9',
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
                'key' => 'field_5f3dc490a4cda',
                'label' => 'Title Link',
                'name' => 'title_link',
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
                'key' => 'field_5f3dc4c3a4cdb',
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
                'key' => 'field_5f3dc4e2a4cdc',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_603269d4bbf86',
                'label' => 'Block Style',
                'name' => 'block_style',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'plain-black' => 'Plain Black',
                    'plain-yellow' => 'Plain Yellow',
                    'flora-black' => 'Flora Black',
                    'flora-yellow' => 'Flora Yellow',
                ),
                'default_value' => 'plain-black',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/dutchtown-masonry',
                )
            )
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