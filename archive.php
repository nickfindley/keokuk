<?php
/**
 * Archive Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();
?>
    <main id="content">
        <header class="page-header">
            <div class="container">
                <h1>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_archive_title(); ?>
                    </a>
                </h1>
            </div>
        </header>
<?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/article' );
        endwhile;

        dutchtown_pagination();
    endif;
?>
    </main>
<?php
get_footer();