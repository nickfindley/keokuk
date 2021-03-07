<?php
/**
 * Main (Index) Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();
?>

    <main id="content">
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