<?php
if ( function_exists( 'acf_register_block_type' ) ) :
    function dutchtown_acf_init_masonry_container()
    {
        acf_register_block_type( array(
            'name' => 'dutchtown-masonry-container',
            'title' => 'Dutchtown Masonry Container',
            'description' => 'A container for masonry blocks',
            'category' => 'dutchtown-blocks',
            'icon' => array( 'src' => 'editor-expand' ),
            'mode' => 'preview',
            'keywords' => array( 'dutchtown', 'masonry', 'container' ),
            'render_template' => 'block-templates/block-masonry-container.php',
            // 'enqueue_style'     => get_stylesheet_directory_uri() . '/assets/scss/partials/blocks/css-output/blocks-max-width.css',
            'enqueue_script' => get_stylesheet_directory_uri() . '/dist/js/masonry.min.js',
            'supports' => array( 'align' => false, 'jsx' => true )
            )
        );
    }

    add_action('acf/init', 'dutchtown_acf_init_masonry_container');
endif;