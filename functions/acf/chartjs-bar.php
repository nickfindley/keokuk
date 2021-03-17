<?php
if ( function_exists( 'acf_register_block_type' ) ) :
    function dutchtown_acf_init_chartjs_bar()
    {
        acf_register_block_type( array(
            'name' => 'dutchtown-chart-js-bar',
            'title' => 'Dutchtown Chart.js Bar Chart',
            'description' => 'Create a bar chart with Chart.js',
            'category' => 'dutchtown-blocks',
            'icon' => array( 'src' => 'editor-expand' ),
            'mode' => 'preview',
            'keywords' => array( 'dutchtown', 'chart', 'graph', 'bar' ),
            'render_template' => 'block-templates/block-chartjs-bar.php',
            // 'enqueue_style'     => get_stylesheet_directory_uri() . '/assets/scss/partials/blocks/css-output/blocks-max-width.css',
            // 'enqueue_script' => get_stylesheet_directory_uri() . '/dist/js/chart.min.js',
            'supports' => array( 'align' => false )
            )
        );
    }

    add_action( 'acf/init', 'dutchtown_acf_init_chartjs_bar' );
endif;