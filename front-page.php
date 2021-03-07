<?php
/**
 * Front Page Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();
if ( have_posts() ) :
    while ( have_posts() ) :
    the_post(); 
?>

    <main id="content">
<?php
    if ( has_post_thumbnail() ) :
?>
        <header class="page-header has-featured-image">
            <div class="container">
                <div class="post-thumbnail">
                    <?php the_post_thumbnail( '', ['class' => 'no-lazyload'] ); ?>
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
                        <?php the_title(); ?>
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

        <div class="container container-page-content">
            <?php the_content(); ?>
        </div>
    </main>

<?php
    endwhile;
endif;

get_footer();