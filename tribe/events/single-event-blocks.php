<?php
/**
 * Single Event View Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_details = tribe_get_venue_details();
?>

		<article class="calendar-single">
<?php
            if ( has_post_thumbnail() ) :
?>
            <header class="article-header has-featured-image">
                <div class="container">
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( '', ['class' => 'no-lazyload'] ); ?>
                    </div>
<?php
            else :
?>
            <header class="article-header">
                <div class="container">
<?php
            endif;
?>
                    <h1>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>

					<section class="article-meta">
                        <p>
							<a href="<?php the_permalink(); ?>">
								<i class="fas fa-fw fa-calendar-alt"></i> <?php echo tribe_get_start_date(); ?>
							</a>
<?php
			if ( tribe_is_recurring_event() ) :
?>
							&nbsp;•&nbsp;<a href="<?php tribe_all_occurences_link(); ?>">
								<i class="fas fa-sync-alt"></i> See all times
							</a>
<?php
			endif;
?>
						</p>
<?php
			if ( $venue_details ) :
				require get_template_directory() . '/functions/venue-link.php';
?>
						<p>
							<i class="fas fa-map-marker-alt"></i> <?php echo $venue_link; ?>
<?php
			endif;

			if ( tribe_get_cost() ) :
?>
							&nbsp;•&nbsp;<i class="fas fa-money-bill"></i><?php echo tribe_get_cost( null, true ); ?>
<?php
			endif;
?>
						</p>
                    </section>

                    <section class="article-sharing">
<?php
                        dutchtown_facebook_link();
                        dutchtown_twitter_link();
                        dutchtown_mailto_link();
?>
                    </section>
                </div> 
            </header>

			<section class="container container-article-content">
<?php
				tribe_the_notices();
				$content = get_the_content( null, null, get_the_ID() );
				echo apply_filters( 'the_content' , $content );
?>
				<section class="calendar-single-meta">
<?php
				tribe_get_template_part( 'modules/meta' );
?>
				</section>
			</section>

			<nav class="calendar-footer-nav calendar-footer-nav-single" aria-label="Event Navigation">
				<ul>
					<li>
						<?php tribe_the_prev_event_link( '<span><i class="fas fa-caret-left"></i> Previous event </span>%title%' ) ?>
					</li>
					<li>
						<?php tribe_the_next_event_link( '<span>Next event <i class="fas fa-caret-right"></i></span>%title%' ) ?>
					</li>
				</ul>
			</nav>

			<footer class="article-footer">
				<p class="article-breadcrumbs">
					<?php yoast_breadcrumb(); ?>
				</p>
			</footer>
		</article>