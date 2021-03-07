<?php
/**
 * Place Category Archive Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();
?>
    <main id="content">
<?php
    $category_id = 'category_' . get_queried_object_id();
    $category_image = get_field( 'category_image', $category_id );
    if ( $category_image ) :
?>
        <header class="page-header has-featured-image">
            <div class="container">
                <div class="post-thumbnail">
                    <?php echo wp_get_attachment_image( $category_image, null ); ?>
                </div>
<?php
    else :
?>
        <header class="page-header">
            <div class="container">
<?php
    endif;
?>
                <h1>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_archive_title(); ?>
                    </a>
                </h1>

                <section class="page-sharing">
<?php
                    dutchtown_facebook_link();
                    dutchtown_twitter_link();
                    dutchtown_mailto_link();
?>
                </section>
            </div>
        </header>

<?php
    if ( category_description() ) :
?>
        <section class="container container-page-content">
            <?php echo category_description(); ?>
        </section>
<?php
    endif;
    
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            if ( ! get_field( 'closed' ) ) :
?>
        <article class="place-listing">
<?php
                if ( has_post_thumbnail() ) :
?>
            <header class="container container-article-content article-header has-featured-image">
                <div class="post-thumbnail">
                    <?php the_post_thumbnail( '', ['class' => 'no-lazyload'] ); ?>
                </div>
<?php
                else :
?>
            <header class="container container-article-content article-header">
<?php
                endif;
?>
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

<?php
                if ( get_field( 'address' ) ) :
?>
                <section class="article-meta">
                    <p><?php the_field( 'address' ); ?></p>
                </section>
<?php
                endif;
?>

                <section class="article-sharing">
<?php
                    dutchtown_facebook_link();
                    dutchtown_twitter_link();
                    dutchtown_mailto_link();
?>
                </section>
            </header>

            <section class="container container-article-content">
                <?php the_excerpt(); ?>
            </section>
        </article>
<?php
            endif;
        endwhile;
        dutchtown_pagination();
    endif;
?>
    </main>
<?php
get_footer();