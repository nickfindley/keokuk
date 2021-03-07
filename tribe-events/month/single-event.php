<?php
/**
 * Month View Single Event Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

global $post;

$day      = tribe_events_get_current_month_day();
$event_id = "{$post->ID}-{$day['date']}";
$link     = tribe_get_event_link( $post );
$title    = get_the_title( $post );
?>

<div id="tribe-events-event-<?php echo esc_attr( $event_id ); ?>" class="<?php tribe_events_event_classes() ?> calendar-month-event" data-tribejson='<?php echo esc_attr( tribe_events_template_data( $post ) ); ?>'>
	<h3 class="calendar-month-event-title">
		<a href="<?php echo esc_url( $link ) ?>" class="url">
			<?php echo $title ?>
		</a>
	</h3>
</div>