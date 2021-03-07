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
?>
		<header class="article-header">
			<div class="container">
				<h1>
					<a href="<?php the_permalink(); ?>">
						<?php echo tribe_get_events_title(); ?>
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
<?php
		tribe_get_template_part( 'day/content' );