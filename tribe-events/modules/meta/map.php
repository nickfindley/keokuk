<?php
/**
 * Single Event Meta Map Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

$map = tribe_get_embedded_map();

if ( empty( $map ) ) :
	return;
endif;
?>

<div class="calendar-single-map">
	<?php echo $map; ?>
</div>
