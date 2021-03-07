<?php
function dutchtown_deregister_gtranslate_styles()
{
    wp_deregister_style( 'gtranslate-style' ); 
}

add_action( 'wp_enqueue_scripts', 'dutchtown_deregister_gtranslate_styles' );