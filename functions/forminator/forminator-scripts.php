<?php
function dutchtown_forminator_scripts()
{
    if ( has_shortcode( get_the_content(), 'forminator_form' ) ) :
        wp_register_script( 'forminator', autoversion( '/dist/js/forminator.min.js' ) );
        wp_enqueue_script( 'forminator' );
        switch_to_blog( 1 );
        wp_localize_script( 'forminator', 'ajax_object', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        ));
        restore_current_blog();
    endif;
}

add_action( 'wp_enqueue_scripts', 'dutchtown_forminator_scripts' );