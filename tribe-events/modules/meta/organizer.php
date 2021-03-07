<?php
/**
 * Single Event Meta Organizer Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

foreach ( $organizer_ids as $organizer ) :
	if ( ! $organizer ) :
		continue;
	endif;

    $organizer_id = get_the_id( $organizer );
	$organizer_name = get_the_title( $organizer );
    $phone = tribe_get_organizer_phone( $organizer );
    $email = tribe_get_organizer_email( $organizer );
    $website = tribe_get_organizer_website_url( $organizer );
    $website_parse = parse_url( $website );
    $website_host = str_ireplace('www.', '', parse_url($website, PHP_URL_HOST));

	if ( ! empty ( get_field( 'place_url', $organizer ) ) ) :
		$organizer_url = get_field( 'place_url', $organizer );
		$organizer_link = '<a href="' . $organizer_url . '">' . $organizer_name .'</a>';

	elseif ( ! empty ( get_field( 'place_id', $organizer_id ) ) ) : 
		$organizer_url = get_permalink( get_field( 'place_id', $organizer_id ) );
		$organizer_link = '<a href="' . $organizer_url . '">' . $organizer_name .'</a>';

	else :
		$args = array(
			'post_type' => 'places',
			'posts_per_page' => 5,
			'title' => $organizer_name
		);
		$query = new WP_Query($args);
		if ( $query->have_posts() ) :
			if ( $query->post_count == 1 ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					$organizer_url = get_permalink( get_the_ID() );
					$organizer_link = '<a href="' . $organizer_url . '">' . $organizer_name .'</a>';
				endwhile;
                wp_reset_postdata();
			endif;
		else :
			$organizer_link = tribe_get_organizer_link( $organizer );
		endif;
	endif;
?>

		<h4>
			<span class="subheading">Organizer<span class="sr-only">:</span> </span>
			<?php echo $organizer_link; ?>
		</h4>

<?php
	if ( ! empty( $phone) || ! empty( $email ) || ! empty( $website ) ) :
?>
		<dl>
<?php
		if ( ! empty( $phone ) ) :
?>
			<dt><i class="fas fa-fw fa-phone"></i> Phone</dt>
			<dd>
				<a href="tel:<?php echo esc_html( $phone ); ?>" title="Initiate telephone call to <?php echo $organizer_name; ?>">
					<?php echo esc_html( $phone ); ?>
				</a>
			</dd>
<?php
		endif;

		if ( ! empty( $email ) ) :
?>
			<dt><i class="fas fa-fw fa-envelope"></i> Email</dt>
			<dd>
				<a href="mailto:<?php echo esc_html( $email ); ?>">
					<?php echo esc_html( $email ); ?>
				</a>
			</dd>
<?php
		endif;

		if ( ! empty( $website ) ) :
?>
			<dt><i class="fas fa-fw fa-link"></i> Website</dt>
			<dd>
				<a href="<?php echo $website; ?>" target="_blank">
					<?php echo $website_host; ?>
				</a>
			</dd>
<?php
		endif;
?>
		</dl>
<?php
	endif;
endforeach;