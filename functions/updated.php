<?php

function dutchtown_is_updated()
{
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) :
        return true;
    else :
        return false;
    endif;
}

function dutchtown_updated_on( $args = array() )
{
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) :
        $defaults = array(
            'before_updated_on'	=> '',
            'after_updated_on'	=> ''
        );

        $args = wp_parse_args( $args, $defaults );

        $time_string = '<time class="updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $updated_on = sprintf(
            esc_html_x( '%s', 'post date', 'dutchtown' ), $time_string
        );

        echo $args['before_updated_on'] . $updated_on . $args['after_updated_on'];
    endif;
}