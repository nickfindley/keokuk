<?php
$block_id = 'news-' . $block['id'];
$block_classes = 'news';

if ( ! empty( $block['className'] ) ) :
    $block_classes .= ' ' . $block['className'];
endif;

$title = get_field( 'title' );
$body = get_field( 'body' );
$url = get_field( 'posts_url' );
$number = get_field( 'number_of_posts' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
    <header>
        <h2><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
        <p><?php echo $body; ?></p>
    </header>
<?php
    $args = array(
        'posts_per_page' => $number,
    );
    $posts_query = new WP_Query( $args );
    
    if ( $posts_query->have_posts() ) :
        while ( $posts_query->have_posts() ) :
            $posts_query->the_post();
            if ( has_post_thumbnail() ) :
?>
    <article class="has-featured-image">
<?php
            else :
?>
    <article>
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
                <p><?php dutchtown_posted_on(); ?></p>
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
            <?php the_excerpt(); ?>
        </div>
    </article>
<?php
        endwhile;
        wp_reset_postdata();
    endif;
?>
</section>