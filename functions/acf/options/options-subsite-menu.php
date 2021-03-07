<?php
if ( get_current_blog_id() !== 1 ) :
    acf_add_options_sub_page( array(
        'page_title' => 'Subsite Menu',
        'menu_title' => 'Subsite Menu',
        'menu_slug' => 'subsite-menu',
        'capability' => 'edit_posts',
        'redirect' => false
        )
    );
endif;

if ( function_exists( 'acf_add_local_field_group' ) ):
    acf_add_local_field_group( array(
        'key' => 'group_602d25bede463',
        'title' => 'Subsite Menu',
        'fields' => array(
            array(
                'key' => 'field_602d25c5237ae',
                'label' => 'Subsite Menu Item',
                'name' => 'subsite_menu_item',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add Menu Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_602d25d7237af',
                        'label' => 'Subsite Menu Item Label',
                        'name' => 'subsite_menu_item_label',
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
                        'key' => 'field_602d25e6237b0',
                        'label' => 'Subsite Menu Item Link',
                        'name' => 'subsite_menu_item_link',
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
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'subsite-menu',
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