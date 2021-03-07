<?php
$block_id = 'flickity-events' . $block['id'];
$block_classes = 'flickity';

if ( ! empty( $block['className'] ) ) :
    $block_classes .= ' ' . $block['className'];
endif;

$title = get_field( 'title' );
$body = get_field( 'body' );
$url = get_field( 'url' );
$number = get_field( 'number_of_events' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
    <!-- <header>
        <h2><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
        <p><?php echo $body; ?></p>
    </header> -->
<?php
    $args = array(
        'posts_per_page' => $number,
        'post_type' => array( Tribe__Events__Main::POSTTYPE ),
        'eventDisplay' => 'list',
        'meta_key'=>'_EventStartDate',
        'orderby'=>'_EventStartDate',
        'order'=>'ASC',
        'tribeHideRecurrence' => true,
    );
    $posts_query = new WP_Query( $args );

    if ( $posts_query->have_posts() ) :
?>
    <div class="flickity-events">
        <article class="flickity-event title-slide">
            <h3><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
            <p><?php echo $body; ?></p>
        </article>
<?php
        while ( $posts_query->have_posts() ) :
            $posts_query->the_post();

            if ( has_post_thumbnail() ) :
?>
        <article class="flickity-event has-featured-image">
<?php
            else :
?>
        <article class="flickity-event">
<?php
            endif;
?>
            <header class="article-header">
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>

                <section class="article-meta">
                    <p>
                        <?php dutchtown_posted_on(); ?>
                    </p>

                    <p class="venue-link">
<?php
            require get_template_directory() . '/functions/venue-link.php';
?>
                        <i class="fas fa-fw fa-map-marker-alt"></i> <?php echo $venue_link; ?>
                    </p>
                </section>
            </header>       
<?php
            if ( has_post_thumbnail() ) :
?>
            <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
            </div>
<?php
            endif;
?>

            <div class="article-content">
            <?php echo get_excerpt_by_id( $post->ID ); ?>
            </div>
        </article>
<?php
        endwhile;
        wp_reset_postdata();
?>
        
<?php
    endif;
?>
</section>