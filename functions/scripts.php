<?php
function dutchtown_enqueue_styles()
{
    wp_enqueue_style( 'main', autoversion( '/dist/css/main.min.css' ) );

    if ( function_exists( 'tribe_is_event' ) && tribe_is_event() ) :
        wp_enqueue_style( 'calendar', autoversion( '/dist/css/calendar.min.css' ) );
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_enqueue_styles' );

function dutchtown_enqueue_scripts()
{
    wp_register_script( 'dutchtown-scripts', autoversion( '/dist/js/scripts.min.js' ), false, '0.1', true );
    wp_enqueue_script( 'dutchtown-scripts' );

    if ( is_post_type_archive( 'places' ) ) :
        wp_register_script( 'dutchtown-masonry', autoversion( '/dist/js/masonry.min.js'), false, '4.2.2', true );
        wp_enqueue_script( 'dutchtown-masonry' );
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_enqueue_scripts' );

function dutchtown_enqueue_non_init_scripts()
{
    if ( is_singular() && comments_open() && get_option('thread_comments') ) :
        wp_register_script( 'comment-reply', ABSPATH . '/wp-includes/js/comment-reply.min.js', false, '1.0', true );
        wp_enqueue_script( 'comment-reply' );
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_enqueue_non_init_scripts' );

function dutchtown_deregister_scripts()
{
    if
    (
        is_admin() ||
        function_exists( 'tribe_is_event' ) && tribe_is_month() ||
        function_exists( 'tribe_is_event' ) && tribe_is_event() && is_single() ||
        function_exists( 'tribe_is_event' ) && tribe_is_venue() ||
        has_shortcode( get_the_content(), 'forminator_form' ) ||
        is_singular( 'places' )
    ):
        return;
    else :
        wp_deregister_script( 'jquery-core' );
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_deregister_scripts' );

function dutchtown_deregister_footer_scripts()
{
    if ( ! is_admin() ) :
        wp_dequeue_script( 'underscore' );
        wp_dequeue_script( 'underscore-after' );
        wp_dequeue_script( 'underscore-before' );
        wp_dequeue_script( 'wp-embed' );

        wp_deregister_script( 'underscore' );
        wp_deregister_script( 'underscore-after' );
        wp_deregister_script( 'underscore-before' );
        wp_deregister_script( 'wp-embed' );
    endif;
}

add_action( 'wp_footer', 'dutchtown_deregister_footer_scripts' );

function dutchtown_deregister_styles()
{
    wp_deregister_style( 'block-gallery-frontend' );
    wp_deregister_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'dutchtown_deregister_styles');