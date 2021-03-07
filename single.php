<?php
/**
 * Single Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();
?>
    <main id="content">
<?php
        get_template_part( 'template-parts/article' );
?>
    </main>
<?php
get_footer();