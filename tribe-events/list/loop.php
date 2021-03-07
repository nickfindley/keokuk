<?php
/**
 * List View Loop Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

global $more, $post;
$more = false;

while ( have_posts() ) : 
	the_post();
?>
	
<?php
	$event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';
	$event_type = apply_filters( 'tribe_events_day_view_event_type', $event_type );

	tribe_get_template_part( 'list/single', $event_type );
endwhile;
?>