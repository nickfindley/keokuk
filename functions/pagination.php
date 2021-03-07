<?php 
/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 *
 * @return string
 * Accepts a WP_Query instance to build pagination (for custom wp_query()), 
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 4.9.5
 * - Tested with Bootstrap 4.1
 * - Tested on Sage 9
 *
 * USAGE:
 *     <?php echo bootstrap_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php 
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ...
 *       echo bootstrap_pagination($query);
 *     ?>
 */
function dutchtown_pagination( \WP_Query $wp_query = null, $echo = true )
{
	if ( null === $wp_query ) :
		global $wp_query;
	endif;

    $current_page = get_query_var( 'paged' );
    $last_page = $wp_query->max_num_pages;

    if ( $current_page == null || $current_page == $last_page ) :
        $end_size = 2;
        $mid_size = 2;
    else :
        $end_size = 1;
        $mid_size = 1;
    endif;

	$pages = paginate_links( array(
        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'format'       => '?paged=%#%',
        'current'      => max( 1, get_query_var( 'paged' ) ),
        'total'        => $wp_query->max_num_pages,
        'type'         => 'array',
        'show_all'     => false,
        'end_size'     => $end_size,
        'mid_size'     => $mid_size,
        'prev_next'    => true,
        'prev_text'    => __( '<i class="fas fa-caret-left"></i> Newer Posts' ),
        'next_text'    => __( 'Older Posts <i class="fas fa-caret-right"></i>' ),
        'add_args'     => false,
        'add_fragment' => ''
        )
    );
	if ( is_array( $pages ) ) :
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<nav class="pagination" aria-label="Archive pages"><ul>';
		
        foreach ( $pages as $page ) :
            $pagination .= '<li' . ( strpos( $page, 'current' ) !== false ? ' class="active"' : '') . '>';
            $pagination .= str_replace( 'page-numbers', '', $page ) . '</li>';
        endforeach;
		
        $pagination .= '</ul></nav>';
		
        if ( $echo ) :
			echo $pagination;
		else :
			return $pagination;
		endif;
	endif;

	return null;
}