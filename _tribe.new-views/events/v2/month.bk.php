<?php
/**
 * View: Month View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version  5.0.2
 *
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_method          The HTTP method, either `POST` or `GET`, the View will use to make requests.
 * @var string   $rest_nonce           The REST nonce.
 * @var int      $should_manage_url    int containing if it should manage the URL.
 * @var bool     $disable_event_search Boolean on whether to disable the event search.
 * @var string[] $container_classes    Classes used for the container of the view.
 * @var array    $container_data       An additional set of container `data` attributes.
 * @var string   $breakpoint_pointer   String we use as pointer to the current view we are setting up with breakpoints.
 */

$header_classes = [ 'tribe-events-header' ];
if ( empty( $disable_event_search ) ) {
	$header_classes[] = 'tribe-events-header--has-event-search';
}
?>
<div
	class="container"
	data-js="tribe-events-view"
	data-view-rest-nonce="<?php echo esc_attr( $rest_nonce ); ?>"
	data-view-rest-url="<?php echo esc_url( $rest_url ); ?>"
	data-view-rest-method="<?php echo esc_attr( $rest_method ); ?>"
	data-view-manage-url="<?php echo esc_attr( $should_manage_url ); ?>"
>
	<div>
<?php
	// $this->template( 'components/loader', [ 'text' => __( 'Loading...', 'the-events-calendar' ) ] );
	$this->template( 'components/json-ld-data' );
	$this->template( 'components/data' );
?>
		<header>
<?php
	$this->template( 'components/messages' );
	$this->template( 'components/breadcrumbs' );
	// $this->template( 'components/events-bar' );
	// $this->template( 'month/top-bar' );
?>
		</header>
<?php
	// $this->template( 'components/filter-bar' );
?>

		<div
			class="tribe-events-calendar-month"
			role="grid"
			aria-labelledby="tribe-events-calendar-header"
			aria-readonly="true"
			data-js="tribe-events-month-grid"
		>
<?php
	$this->template( 'month/calendar-header' );
	$this->template( 'month/calendar-body' );
?>
		</div>
	</div>
</div>