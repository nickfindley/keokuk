<?php
if ( function_exists( 'ThreeWP_Broadcast' ) ) :
    function broadcasted_from()
    {
        global $post;
        $broadcast_data = ThreeWP_Broadcast()->get_post_broadcast_data( get_current_blog_id(), $post->ID );
        $parent = $broadcast_data->get_linked_parent();
        
        if ( ! $parent ) :
            return;
        endif;
        
        switch_to_blog( $parent['blog_id'] );
        $blog_name = get_bloginfo( 'name' );
        $blog_link = get_site_url();
        restore_current_blog();

        $r = sprintf( 'This post originally appeared on <a href="%s">%s</a>.', $blog_link, $blog_name );
        return $r;
    }
endif;