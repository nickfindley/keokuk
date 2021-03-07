<?php
function dutchtown_calendar_default_blocks( $template )
{
    $template = [
        [ 'core/paragraph', [
            'placeholder' => __( 'Add Description...', 'the-events-calendar' ),
        ], ],
        [ 'tribe/event-datetime' ],
        [ 'tribe/event-website' ],
        [ 'tribe/event-price' ],
        [ 'tribe/event-venue' ],
        [ 'tribe/event-organizer' ],
        
    ];

    return $template;
}

add_filter( 'tribe_events_editor_default_template', 'dutchtown_calendar_default_blocks', 11, 1 );