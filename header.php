<?php
/**
 * Header Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
    <?php // get_template_part( 'head/favicons' ); ?>	
	<?php wp_head(); ?>
</head>

<?php
    $body_class = '';
    if ( get_current_blog_id() !== 1 ) :
        $body_class = 'subsite';
    endif;
?>

<body <?php body_class( $body_class ); ?>>
    <a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content.', 'dutchtown' ); ?></a>
    <?php get_template_part( 'nav/page-nav' ); ?>