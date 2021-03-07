<?php
function autoversion( $url )
{
    // $path = pathinfo( $url );
    $base = get_template_directory();
    $ver = '?v=' . filemtime( $base . $url);
    return get_template_directory_uri() . $url . $ver;
}