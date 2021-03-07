<?php
/**
 * Month View Content Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<div class="calendar-month">
<?php
	tribe_the_notices();
	tribe_get_template_part( 'month/loop', 'grid' );
?>
	<nav class="calendar-footer-nav" aria-label="Calendar Month Navigation">
		<ul>
			<li>
				<?php tribe_events_the_previous_month_link(); ?>
			</li>
			<li>
				<?php tribe_events_the_next_month_link(); ?>
			</li>
		</ul>
	</nav>

	<footer class="article-footer">
		<p class="article-breadcrumbs">
			<?php yoast_breadcrumb(); ?>
		</p>
	</footer>
<?php
	tribe_get_template_part( 'month/tooltip' );
?>
</div>