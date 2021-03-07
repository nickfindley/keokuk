<?php
/**
 * List View Content Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div class="calendar-list">
<?php
	tribe_the_notices();

	if ( have_posts() ) :
		tribe_get_template_part( 'list/loop' );
	endif;
?>
	<nav class="calendar-footer-nav" aria-label="Events List Navigation">
		<ul>
<?php
	if ( tribe_has_previous_event() ) :
?>
			<li>
				<a href="<?php echo esc_url( tribe_get_listview_prev_link() ); ?>" rel="prev">
					<i class="fas fa-caret-left"></i> Previous Events
				</a>
			</li>
<?php
	endif;

	if ( tribe_has_next_event() ) :
?>
			<li>
				<a href="<?php echo esc_url( tribe_get_listview_next_link() ); ?>" rel="next">
					Next Events <i class="fas fa-caret-right"></i>
				</a>
			</li>
<?php
	endif;
?>
		</ul>
	</nav>

	<footer class="article-footer">
		<p class="article-breadcrumbs">
			<?php yoast_breadcrumb(); ?>
		</p>
	</footer>
</div>