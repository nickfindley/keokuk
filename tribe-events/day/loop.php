<?php
/**
 * Day View Loop Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

global $more, $post, $wp_query; 
$more = false;
$current_timeslot = null;

while ( have_posts() ) : 
	the_post();
	
	if ( $current_timeslot != $post->timeslot ) :
		$current_timeslot = $post->timeslot;
		$current_timeslot = str_replace( 'am', ' am', $current_timeslot );
		$current_timeslot = str_replace( 'pm', ' pm', $current_timeslot );
?>
	<header class="calendar-day-timeslot container">
		<h2>
			<?php echo $current_timeslot; ?>
		</h2>
	</header>
<?php
	endif;
	
	$event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';
	$event_type = apply_filters( 'tribe_events_day_view_event_type', $event_type );

	tribe_get_template_part( 'list/single', $event_type );
endwhile;
?>