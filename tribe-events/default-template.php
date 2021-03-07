<?php
/**
 * Default Events Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>
<main id="content">
<?php 
	tribe_get_view();
?>
</main>
<?php
get_footer();
