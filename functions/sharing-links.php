<?php
function dutchtown_popup( $height = '400', $width = '600' )
{
    $onclick = 'javascript:window.open(this.href,\'\', \'';
    $onclick .= 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
    $onclick .= 'height=' . $height;
    $onclick .= ',width=' . $width;
    $onclick .= '\');return false;';

    return $onclick;
}

function dutchtown_facebook_link( $id = null )
{
    // global $post;
    
    if ( ! $id ) :
        $id = get_the_ID();
    endif;

    $url = get_the_permalink( $id );

    $href = 'https://www.facebook.com/sharer/sharer.php?u=';
    $href .= urlencode( $url );
    $href .= '&amp;t=';
    $href .= urlencode( get_the_title( $id ) );

    $anchor = '<a href="' . $href . '" onclick="' . dutchtown_popup( '300' ) . '" target="_blank" rel="noopener" title="Share on Facebook">';
    $anchor .= '<i class="fab fa-facebook-f"></i><span class="sr-only">Facebook</span></a>';

    echo $anchor;
}

function dutchtown_twitter_link( $id = null )
{
    // global $post;
    
    if ( ! $id ) :
        $id = get_the_ID();
    endif;

    $url = get_the_permalink( $id );

    $href = 'http://twitter.com/share?text=';
    $href .= urlencode( get_the_title( $id ) . ' ' );
    $href .= '&amp;url=' . urlencode( $url );

    $anchor = '<a href="' . $href . '" onclick="' . dutchtown_popup() . '" target="_blank" rel="noopener" title="Share on Twitter">';
    $anchor .= '<i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>';

    echo $anchor;
}

function dutchtown_mailto_link( $id = null )
{
    // global $post;
    
    if ( ! $id ) :
        $id = get_the_ID();
    endif;


    $url = get_the_permalink( $id );

    $href = 'mailto:?subject=';
    $href .= urlencode( get_the_title( $id ) );
    $href .= '&amp;body=';
    $href .= urlencode( 'Take a look at what I found on DutchtownSTL.org:' );
    $href .= '%0a%0d';
    $href .= urlencode( get_the_title( $id ) );
    $href .= '%0a';
    $href .= urlencode( $url );

    $anchor = '<a href="' . $href . '" onclick="' . dutchtown_popup() .'" target="_blank" rel="noopener" title="Share via email">';
    $anchor .= '<i class="fas fa-envelope"></i><span class="sr-only">Email</span></a>';

    echo $anchor;
}