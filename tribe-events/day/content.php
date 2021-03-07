<?php
/**
 * Day View Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$previous_text = '<i class="fas fa-caret-left"></i> Previous Day';
$next_text = 'Next Day <i class="fas fa-caret-right"></i>';
?>

<div class="calendar-day">
<?php
tribe_the_notices();

if ( have_posts() ) :
	tribe_get_template_part( 'day/loop' );
endif;
?>
	<nav class="calendar-footer-nav" aria-label="Day Navigation">
		<ul>
			<li><?php tribe_the_day_link( 'previous day', $previous_text ) ?></li>
			<li><?php tribe_the_day_link( 'next day', $next_text ) ?></li>
		</ul>
	</nav>

	<footer class="article-footer">
		<p class="article-breadcrumbs">
			<?php yoast_breadcrumb(); ?>
		</p>
	</footer>
</div>