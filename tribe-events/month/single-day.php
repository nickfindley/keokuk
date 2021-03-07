<?php
/**
 * Month View Single Day Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$day = tribe_events_get_current_month_day();
$datetime = DateTime::createFromFormat('Y-m-d', $day['date'] );
$events_label = ( 1 === $day['total_events'] ) ? tribe_get_event_label_singular() : tribe_get_event_label_plural();
$date_label = date_i18n( tribe_get_date_option( 'dateWithoutYearFormat', 'F j' ), strtotime( $day['date'] ) )
?>

<!-- Day Header -->
<div class="calendar-month-day">
<?php
if ( $day['total_events'] > 0 && tribe_events_is_view_enabled( 'day' ) ) :
	$view_day_label = sprintf( 'View %s', $date_label );
?>
	<a href="<?php echo esc_url( tribe_get_day_link( $day['date'] ) ); ?>" aria-label="<?php echo esc_attr( $view_day_label ); ?>">
        <span class="calendar-month-dayname"><?php echo $datetime->format( 'l' ); ?></span>
        <span class="calendar-month-daynum"><?php echo $day['daynum']; ?></span>
    </a>
<?php
else :
?>
	<span class="calendar-month-dayname"><?php echo $datetime->format( 'l' ); ?></span>
    <span class="calendar-month-daynum"><?php echo $day['daynum']; ?></span>
<?php
endif;
?>
</div>

<div class="calendar-month-day-events">
<?php
while ( $day['events']->have_posts() ) :
	$day['events']->the_post();
	tribe_get_template_part( 'month/single', 'event' );
endwhile;

if ( $day['view_more'] ) :
?>
	<div class="calendar-month-more">
<?php
	$view_all_label = sprintf(
		_n(
			'View %1$s %2$s',
			'View All %1$s %2$s',
			$day['total_events'],
			'the-events-calendar'
		),
		$day['total_events'],
		$events_label
	);

	$view_all_aria_label = sprintf( '%s for %s', $view_all_label, $date_label );
?>
		<a href="<?php echo esc_url( $day['view_more'] ); ?>" aria-label="<?php echo esc_attr( $view_all_aria_label ); ?>">
            <?php echo $view_all_label ?> <i class="fas fa-caret-right"></i>
        </a>
	</div>
<?php
endif;
?>
</div>
