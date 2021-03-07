<?php
$block_id = 'masonry-container-' . $block['id'];
$block_classes= 'masonry-container';

if ( ! empty( $block['className'] ) ) :
     $block_classes .= ' ' . $block['className'];
endif;
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
    <InnerBlocks />
</div>