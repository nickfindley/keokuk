<?php
function dutchtown_setup()
{		
    load_theme_textdomain( 'dutchtown', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        )
    );

    add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'dutchtown_setup' );

function dutchtown_image_sizes()
{
    add_image_size( 'xs', 500, 1500 );
    add_image_size( 'sm', 540, 1620 );
    add_image_size( 'md', 690, 2070 );
    add_image_size( 'lg', 930, 2790 );
    add_image_size( 'xl', 1110, 3330 );
}

add_action( 'init', 'dutchtown_image_sizes' );

function dutchtown_intermediate_image_sizes( $sizes )
{    
    unset( $sizes[ 'medium_large' ] );
    unset( $sizes[ 'large' ] ); 
    return $sizes;
}

add_filter( 'intermediate_image_sizes_advanced', 'dutchtown_intermediate_image_sizes', 10, 2 );