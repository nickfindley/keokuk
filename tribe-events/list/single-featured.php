<?php
/**
 * List View Single Featured Event Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_details = tribe_get_venue_details();
?>
		<article class="<?php tribe_events_event_classes() ?> calendar-list-event featured">
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
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <section class="article-meta">
                        <p>
							<a href="<?php the_permalink(); ?>">
								<i class="fas fa-fw fa-calendar-alt"></i> <?php echo tribe_get_start_date(); ?>
							</a>
<?php
if ( tribe_is_recurring_event() ) :
?>
							<span class="article-meta-last">
                                <a href="<?php tribe_all_occurences_link(); ?>">
                                    <i class="fas fa-sync-alt"></i> See all times
                                </a>
                            </span>
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
							<span class="article-meta-last">
                                <i class="fas fa-money-bill"></i><?php echo tribe_get_cost( null, true ); ?>
                            </span>
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
				<?php echo get_excerpt_by_id( get_the_ID() ); ?>
			</section>
		</article>