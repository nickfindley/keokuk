<?php
/**
 * Month View Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<div id="tribe-events" class="" data-live_ajax="0" data-datepicker_format="1" data-category="" data-featured="">
	<header class="article-header">
		<div class="container">
			<h1>
				<a href="<?php the_permalink(); ?>">
					<?php the_field( 'calendar_title', 'option' ); ?>
				</a>
			</h1>

			<section class="article-sharing">
			<?php
				dutchtown_facebook_link();
				dutchtown_twitter_link();
				dutchtown_mailto_link();
			?>
			</section>
		</div>
	</header>

	<div class="container container-article-content">
		<?php the_field( 'calendar_body', 'option' ); ?>
	</div>
<?php
		tribe_get_template_part( 'month/content' );
?>
</div>