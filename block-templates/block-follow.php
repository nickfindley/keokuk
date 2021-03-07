<?php
$title = get_field( 'title' );
$body = get_field( 'body' );
$ig = get_field( 'instagram_url' );
$fb = get_field( 'facebook_url' );
$tw = get_field( 'twitter_url' );
$yt = get_field( 'youtube_url' );

$block_id = 'follow-' . $block['id'];
$block_classes= 'follow';

if ( ! empty( $block['className'] ) ) :
     $block_classes .= ' ' . $block['className'];
endif;
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
    <h2><?php echo $title; ?></h2>
    
    <?php echo $body; ?>

    <div class="follow-icons">
        <a href="<?php echo $fb; ?>"><i class="fab fa-facebook-f"></i><span class="sr-only">Facebook</span></a>
        <a href="<?php echo $tw; ?>"><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
        <a href="<?php echo $ig; ?>"><i class="fab fa-instagram"></i><span class="sr-only">Instagram</span></a>
        <a href="<?php echo $yt; ?>"><i class="fab fa-youtube"></i><span class="sr-only">YouTube</span></a>
    </div>
</section>