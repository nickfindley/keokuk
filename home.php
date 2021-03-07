<?php
/**
 * Home (Blog) Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();

$blog_title = get_field( 'blog_title', 'option' );
$blog_subtitle_pre = get_field( 'blog_subtitle_pre', 'option' );
$blog_subtitle_post = get_field( 'blog_subtitle_post', 'option' );
$blog_body = get_field( 'blog_body', 'option' );
$blog_header_image = get_field( 'blog_header_image', 'option' );

$blog_page = true;
?>

    <main id="content">
<?php
    if ( $blog_header_image ) :
?>
        <header class="page-header has-featured-image">
            <div class="container">
                <div class="post-thumbnail">
                    <?php echo wp_get_attachment_image( $blog_header_image, null ); ?>
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
                    <a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>">
<?php
    if ( $blog_subtitle_pre ) :
?>
                        <span class="subheading"><?php echo $blog_subtitle_pre; ?></span>
<?php
    endif;
?>
                        <?php echo $blog_title; ?>
<?php
    if ( $blog_subtitle_post ) :
?>
                        <span class="subheading"><?php echo $blog_subtitle_post; ?></span>
<?php
    endif;
?>
                    </a>
                </h1>

                <section class="page-sharing">
<?php
                    dutchtown_facebook_link( get_option( 'page_for_posts' ) );
                    dutchtown_twitter_link( get_option( 'page_for_posts' ) );
                    dutchtown_mailto_link( get_option( 'page_for_posts' ) );
?>
                </section>
            </div>
        </header>
<?php
    if ( $blog_body ) :
?>
        <section class="container container-page-content">
            <?php echo $blog_body; ?>
        </section>
<?php
    endif;
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/article' );
        endwhile;

        dutchtown_pagination();
    else :
?>
        <p>Sorry, no posts.</p>
<?php
    endif;
?>
    </main>

<?php
get_footer();