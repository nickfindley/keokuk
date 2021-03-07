<?php
/**
 * Single Event Meta Venue Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

if ( ! tribe_get_venue_id() ) :
	return;
endif;

global $post;

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_url();
$website_parse = parse_url( $website );
$website_host = str_ireplace('www.', '', parse_url($website, PHP_URL_HOST));

require get_template_directory() . '/functions/venue-link.php';
?>
<h4>
	<span class="subheading">Location<span class="sr-only">: </span></span>
	<?php echo $venue_link; ?>
</h4>

<dl>
<?php
	if ( tribe_address_exists() ) :
?>
		<dt><i class="fas fa-fw fa-map-marker-alt"></i> Address</dt>
		<dd>
			<address>
				<?php echo tribe_get_full_address(); ?>
			</address>
		</dd>
<?php
	endif;

	if ( ! empty( $phone ) ):
?>
		<dt><i class="fas fa-fw fa-phone"></i> Phone</dt>
		<dd>
			<a href="tel:<?php echo esc_html( $phone ); ?>" title="Initiate telephone call to <?php echo $venue_name; ?>">
				<?php echo esc_html( $phone ); ?>
			</a>
		</dd>
<?php
	endif;
	
	if ( ! empty( $website ) ):
?>
		<dt><i class="fas fa-fw fa-link"></i> Website</dt>
		<dd>
			<a href="<?php echo $website; ?>">
				<?php echo $website_host; ?>
			</a>
		</dd>
<?php
	endif;
?>
</dl>