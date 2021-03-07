<?php
function dutchtown_posted_on( $args = array() )
{
    global $post;

    $defaults = array(
        'before_posted_on'	=> '',
        'after_posted_on'	=> ''
    );

    $args = wp_parse_args( $args, $defaults );

    $time_string = '<time datetime="%1$s">%2$s</time>';
    
    if ( function_exists( 'tribe_is_event' ) && tribe_is_event() )
    {
        $time_string = sprintf( $time_string,
            esc_attr( tribe_get_start_date( $post->ID, false, 'c' ) ),
            esc_html( tribe_get_start_date() )
        );
        $span_text = 'Event on ';
    }
    else
    {
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );
        $span_text = 'Posted on ';
    }

    $posted_on = sprintf(
        /* translators: %s: post date. */
        esc_html_x( '%s', 'post date', 'dutchtown' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fas fa-bookmark"></i> ' . $time_string . '</a>'
    );

    echo  $args['before_posted_on'] . $posted_on . $args['after_posted_on'];
}