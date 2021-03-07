<?php
function dutchtown_deregister_tribe_scripts()
{
    if ( ! is_admin() ) :
        // wp_deregister_script( 'jquery-placeholder' );
        wp_deregister_script( 'swiper' );
        // wp_deregister_script( 'the-events-calendar' );
        wp_deregister_script( 'tribe-events-ajax-day' );
        wp_deregister_script( 'tribe-events-bar' );
        // wp_deregister_script( 'tribe-events-bootstrap-datepicker' );
        // wp_deregister_script( 'tribe-events-calendar-script' );
        wp_deregister_script( 'tribe-events-dynamic' );
        // wp_deregister_script( 'tribe-events-jquery-resize' );
        wp_deregister_script( 'tribe-events-php-date-formatter' );
        wp_deregister_script( 'tribe-events-list' );
        wp_deregister_script( 'tribe-events-pro' );
        wp_deregister_script( 'tribe-events-pro-geoloc' );
        wp_deregister_script( 'tribe-events-pro-slimscroll' );
        wp_deregister_script( 'tribe-events-pro-week' );
        wp_deregister_script( 'tribe-events-views-v2-accordion' );
        wp_deregister_script( 'tribe-events-views-v2-bootstrap-datepicker' );
        wp_deregister_script( 'tribe-events-views-v2-breakpoints' );
        wp_deregister_script( 'tribe-events-views-v2-datepicker' );
        wp_deregister_script( 'tribe-events-views-v2-datepicker-pro' );
        wp_deregister_script( 'tribe-events-views-v2-events-bar' );
        wp_deregister_script( 'tribe-events-views-v2-events-bar-inputs' );
        wp_deregister_script( 'tribe-events-views-v2-manager' );
        wp_deregister_script( 'tribe-events-views-v2-map-events' );
        wp_deregister_script( 'tribe-events-views-v2-map-events-scroller' );
        wp_deregister_script( 'tribe-events-views-v2-map-no-venue-modal' );
        wp_deregister_script( 'tribe-events-views-v2-map-provider-google-maps' );
        wp_deregister_script( 'tribe-events-views-v2-month-grid' );
        wp_deregister_script( 'tribe-events-views-v2-month-mobile-events' );
        wp_deregister_script( 'tribe-events-views-v2-multiday-events' );
        wp_deregister_script( 'tribe-events-views-v2-multiday-events-pro' );
        wp_deregister_script( 'tribe-events-views-v2-nanoscroller' );
        wp_deregister_script( 'tribe-events-views-v2-navigation-scroll' );
        wp_deregister_script( 'tribe-events-views-v2-toggle-recurrence' );
        wp_deregister_script( 'tribe-events-views-v2-tooltip' );
        wp_deregister_script( 'tribe-events-views-v2-tooltip-pro' );
        wp_deregister_script( 'tribe-events-views-v2-view-selector' );
        wp_deregister_script( 'tribe-events-views-v2-viewport' );
        wp_deregister_script( 'tribe-events-views-v2-week-day-selector' );
        wp_deregister_script( 'tribe-events-views-v2-week-event-link' );
        wp_deregister_script( 'tribe-events-views-v2-week-grid-scroller' );
        wp_deregister_script( 'tribe-events-views-v2-week-multiday-toggle' );
        // wp_deregister_script( 'tribe-moment' );
        wp_deregister_script( 'tribe-query-string' );
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_deregister_tribe_scripts' );

function dutchtown_deregister_tribe_styles()
{
    if ( ! is_admin() ) :
        wp_deregister_style( 'tribe-common-skeleton-style' );
        wp_deregister_style( 'tribe-events-block-event-datetime' );
        wp_deregister_style( 'tribe-events-block-event-organizer' );
        wp_deregister_style( 'tribe-events-block-event-price' );
        wp_deregister_style( 'tribe-events-block-event-venue' );
        wp_deregister_style( 'tribe-events-block-event-website' );
        wp_deregister_style( 'tribe-events-calendar-full-mobile-style' );
        wp_deregister_style( 'tribe-events-calendar-full-pro-mobile-style' );
        wp_deregister_style( 'tribe-events-calendar-mobile-style' );
        wp_deregister_style( 'tribe-events-calendar-pro-mobile-style' );
        wp_deregister_style( 'tribe-events-calendar-pro-style' );
        wp_deregister_style( 'tribe-events-calendar-style' );
        wp_deregister_style( 'tribe-events-full-calendar-style' );
        wp_deregister_style( 'tribe-events-full-pro-calendar-style' );
        wp_deregister_style( 'tribe-events-pro-skeleton' );
        wp_deregister_style( 'tribe-events-skeleton' );
        wp_deregister_style( 'tribe-tooltip' );       
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_deregister_tribe_styles' );