<?php
/**
 * Month View Loop Grid Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
$days_of_week = tribe_events_get_days_of_week();
$week = 0;
global $wp_locale;
?>
	<h2 class="sr-only"><?php printf( esc_html__( 'Calendar of %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?></h2>

	<table class="calendar-month-grid">
		<caption class="sr-only">
			<?php printf( esc_html__( 'Calendar of %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>
		</caption>
		
		<thead>
			<tr>
<?php
	foreach ( $days_of_week as $day ) :
?>
					<th id="tribe-events-<?php echo esc_attr( strtolower( $day ) ); ?>" title="<?php echo esc_attr( $day ); ?>" data-day-abbr="<?php echo esc_attr( $wp_locale->get_weekday_abbrev( $day ) ); ?>">
						<?php echo $day; ?>
					</th>
<?php
	endforeach;
?>
			</tr>
		</thead>

		<tbody>
			<tr>
<?php
	while ( tribe_events_have_month_days() ) :
		tribe_events_the_month_day();
		if ( $week != tribe_events_get_current_week() ) :
			$week ++;
?>
			</tr>
			<tr>
<?php
		endif;
		
		$daydata = tribe_events_get_current_month_day();
?>

				<td class="<?php tribe_events_the_month_day_classes() ?>"
					data-day="<?php echo esc_attr( isset( $daydata['daynum'] ) ? $daydata['date'] : '' ); ?>"
					data-tribejson='<?php echo tribe_events_template_data( null, [ 'date_name' => tribe_format_date( $daydata['date'], false ) ] ); ?>'
				>
					<?php tribe_get_template_part( 'month/single', 'day' ) ?>
				</td>
<?php
	endwhile;
?>
			</tr>
		</tbody>
	</table>