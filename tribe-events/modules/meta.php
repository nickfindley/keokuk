<?php
/**
 * Single Event Meta Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

tribe_get_template_part( 'modules/meta/details' );
tribe_get_template_part( 'modules/meta/venue' );
tribe_get_template_part( 'modules/meta/map' );
if ( tribe_has_organizer() ) :
	tribe_get_template_part( 'modules/meta/organizer' );
endif;