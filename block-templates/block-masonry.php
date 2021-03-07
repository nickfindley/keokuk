<?php
$title = get_field( 'title' );
$title_link = get_field( 'title_link' );
$body = get_field( 'body' );
$image = get_field( 'image' );
$block_style = get_field( 'block_style' );

if ( ! $block_style ) :
    $block_style = 'plain-black';
endif;

$block_id = 'masonry-' . $block['id'];
$block_classes= 'masonry ' . $block_style;

if ( ! empty( $block['className'] ) ) :
     $block_classes .= ' ' . $block['className'];
endif;

if ( $image ) :
    $block_classes .= ' masonry-has-image';
endif;
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
<?php
    if ( $block_style = 'flora-black' || $block_style = 'flora-yellow' ) :
?>
    <div class="masonry-flora-crown"></div>
<?php
    endif;
?>
    <div class="masonry-inner">
<?php
    if ( $image ) :
?>
        <div class="masonry-image">
<?php
        echo wp_get_attachment_image( $image, 'medium', false, array( 'class' => 'card-img-top' ) );
?>
        </div>
<?php
    endif;
?>
        <div class="masonry-body">
<?php
    if ( $title_link ) :
?>
            <h3><a href="<?php echo $title_link; ?>"><?php echo $title; ?></a></h3>
<?php
    else : 
?>
            <h3><?php echo $title; ?></h3>
<?php    
    endif;

    echo $body;
?>
        </div>
    </div>
</div>