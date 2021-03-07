<?php
function dutchtown_format_phone( $phone_number )
{
    // make sure we have something
    if ( ! get_field( 'telephone' ) ) :
        return '';
    endif;
    
    // strip out everything but numbers
    $phone_number = preg_replace( "/[^0-9]/", "", $phone_number );
    $length = strlen($phone_number);
    
    switch( $length ) :
        case 7:
        return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone_number);
        break;
    
        case 10:
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number);
        break;

        case 11:
        return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$2-$3-$4", $phone_number);
        break;

        default:
        return $phone_number;
        break;
    endswitch;
}