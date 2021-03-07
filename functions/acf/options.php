<?php
if ( function_exists( 'acf_options_page' ) ) :
    function dutchtown_options_pages()
    {
        if ( get_current_blog_id() === 1 ) :
            acf_add_options_sub_page( array(
                'page_title' => 'Calendar Settings',
                'menu_title' => 'Calendar Settings',
                'menu_slug' => 'calendar-settings',
                'capability' => 'edit_posts',
                'redirect' => false
                )
            );

            acf_add_options_sub_page( array(
                'page_title' => 'Places Settings',
                'menu_title' => 'Places Settings',
                'menu_slug' => 'places-settings',
                'capability' => 'edit_posts',
                'redirect' => false
                )
            );
        endif;

        if ( get_current_blog_id() !== 1 ) :
            acf_add_options_sub_page( array(
                'page_title' => 'Block Sites',
                'menu_title' => 'Block Sites',
                'menu_slug' => 'block-sites',
                'capability' => 'edit_posts',
                'redirect' => false
                )
            );
        endif;

        acf_add_options_sub_page( array(
            'page_title' => 'Blog Settings',
            'menu_title' => 'Blog Settings',
            'menu_slug' => 'blog-settings',
            'capability' => 'edit_posts',
            'redirect' => false
            )
        );
    }

    add_action( 'acf/init', 'dutchtown_options_pages' );
endif;