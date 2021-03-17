<?php
function dutchtown_deny_blocks()
{
    wp_enqueue_script( 'deny-blocks', get_template_directory_uri() . '/dist/js/deny-blocks.js', array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ) );
}

add_action( 'enqueue_block_editor_assets', 'dutchtown_deny_blocks' );