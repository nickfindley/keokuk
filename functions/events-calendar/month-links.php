<?php
function dutchtown_events_previous_month_link()
{
    $url = tribe_get_previous_month_link();
    $date = Tribe__Events__Main::instance()->previousMonth( tribe_get_month_view_date() );
    $text = tribe_get_previous_month_text();
    $html = '<a data-month="' . $date . '" href="' . esc_url($url) . '" rel="prev"><i class="fas fa-caret-left"></i> ' . $text . ' </a>';
    return $html;
}

add_filter('tribe_events_the_previous_month_link', 'dutchtown_events_previous_month_link');

function dutchtown_events_next_month_link()
{
    $url = tribe_get_next_month_link();
    $date = Tribe__Events__Main::instance()->nextMonth( tribe_get_month_view_date() );
    $text = tribe_get_next_month_text();
    $html = '<a data-month="' . $date . '" href="' . esc_url($url) . '" rel="next">' . $text . ' <i class="fas fa-caret-right"></i></a>';
    return $html;
}

add_filter('tribe_events_the_next_month_link', 'dutchtown_events_next_month_link');