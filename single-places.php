<?php
/**
 * Single Place Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();

$start_date = date( 'Y-m-d', strtotime( '2019-11-29' ) );
$end_date = date( 'Y-m-d', strtotime( '2019-12-31' ) );
$today = date ( 'Y-m-d' );
$today = date( 'Y-m-d', strtotime( $today ) );
?>
    <main id="content">
        <article>
<?php
    if ( has_post_thumbnail() ) :
?>
            <header class="article-header has-featured-image">
                <div class="container">
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( '', ['class' => 'no-lazyload'] ); ?>
                    </div>
<?php
    else :
?>
            <header class="article-header">
                <div class="container">
<?php
    endif;
?>
                    <h1>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
<?php 
    if (
        get_field( 'dutchtown_cid' ) || 
        get_field( 'cherokee_street' ) ||
        ( get_field( 'promotion' )  && ( $today >= $start_date ) && ( $today <= $end_date ) ) ||
        get_field( 'minority_owned' )
    ) :
?>
                    <section class="place-banner">
<?php
        if ( get_field( 'dutchtown_cid' ) ) :
?>
                        <p>
                            <i class="fas fa-fw fa-city"></i> Located in the <a href="https://www.dutchtownstl.org/cid/">Dutchtown CID</a>
                        </p>
<?php
        endif;

        if ( get_field( 'cherokee_street' ) ) :
?>
                        <p>
                            <i class="fas fa-fw fa-sun"></i> In the <a href="https://cherokeestreet.com/">Cherokee Street</a> Business District
                        </p>
<?php
        endif;
        
        if ( get_field( 'promotion' ) ) :
            if ( $today >= $start_date && $today <= $end_date ) :
?>
                        <p>
                            <i class="fas fa-fw fa-tag"></i> Participating in promotion
                        </p>
<?php
            endif;
        endif;
           
        if ( get_field( 'minority_owned' ) ) :
            if (
                get_field( 'black_owned' ) ||
                get_field( 'woman_owned' ) ||
                get_field( 'latino_owned' )
            ) :
                if ( get_field( 'black_owned' ) ) :
?>
                        <p>
                            <i class="fas fa-fw fa-globe-africa"></i> Black Owned Business
                        </p>
<?php
                endif;

                if ( get_field( 'woman_owned' ) ) :
?>
                        <p>
                            <i class="fas fa-fw fa-venus"></i> Woman Owned Business
                        </p>
<?php
                endif;

                if ( get_field( 'latino_owned' ) ) :
?>
                        <p>
                            <i class="fas fa-fw fa-globe-americas"></i> Latino Owned Business
                        </p>
<?php 
                endif;
            endif;
        endif;
?>
                    </section>
<?php
    endif;
?>

                    <section class="article-sharing">
<?php
                            dutchtown_facebook_link();
                            dutchtown_twitter_link();
                            dutchtown_mailto_link();
?>
                    </section>
                </div>
            </header>

            <section class="place container container-article-content">
<?php
    if ( get_field( 'closed' ) ) :
?>
                <p class="place-closed">
                    This place is reported as <strong>closed</strong>.
                </p>
<?php
    endif;
    
    $date = strtotime( get_field( 'new_in_town' ) );
    // $today = strtotime( date( 'Y-m-d' ) );
    if ( $date != null && $date > $today ) :
?>
                <p class="place-new">
                    <?php the_title(); ?> is <strong>new</strong> to Dutchtown!
                </p>
<?php
    endif;
?>
                <?php the_content(); ?>

<?php
    $website = get_field( 'website' );
    $telephone = dutchtown_format_phone( get_field( 'telephone' ) );
    $email = get_field( 'email' );
?>
                <h3>Contact</h3>
                <dl class="place-contact">
                    <?php if ( get_field( 'address' ) ) : ?>
                    <dt><i class="fas fa-fw fa-map-marker"></i> Address</dt>
                    <dd><?php echo get_field( 'address' ); ?><br>St. Louis, MO <?php echo get_field( 'zip_code' ); ?></dd>
                    <?php endif; ?>

                    <?php if ( $telephone ) : ?>
                    <dt><i class="fas fa-fw fa-phone"></i> Telephone</dt>
                    <dd><a href="tel:<?php echo $telephone; ?>" title="Dial <?php echo $telephone; ?>"><?php echo $telephone; ?></a></dd>
                    <?php endif; ?>

                    <?php if ( $website ) : ?>
                    <?php $website_host = str_ireplace('www.', '', parse_url($website, PHP_URL_HOST)); ?>
                    <dt><i class="fas fa-fw fa-link"></i> Website</dt>
                    <dd><a href="<?php echo $website; ?>" target="_blank"><?php echo $website_host; ?></a></dd>
                    <?php endif; ?>

                    <?php if ( $email ) : ?>
                    <dt><i class="fas fa-fw fa-envelope"></i> Email</dt>
                    <dd><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></dd>
                    <?php endif; ?>
                </dl>
<?php
    if (
        get_field( '24_7' ) ||
        get_field( 'hours' ) ||
        have_rows( 'daily_hours' )
    ) :
?>
                <h3>Business Hours</h3>
<?php
        if ( get_field( '24_7' ) ) :
?>
                <p>
                    <i class="fas fa-fw fa-clock"></i> Open 24 hours, seven days a week.
                </p>
<?php
        elseif ( have_rows( 'daily_hours' ) ) :
?>
                <dl class="place-hours">
<?php
            while ( have_rows( 'daily_hours' ) ) :
                the_row();
?>
                    <dt><i class="fas fa-fw fa-clock"></i> <?php the_sub_field( 'day' ); ?></dt>
                    <dd><?php the_sub_field( 'hours' ); ?></dd>
<?php
            endwhile;
?>
        </dl>
<?php
        elseif ( get_field( 'hours' ) ) :
            $hours = preg_split('/\r\n|\r|\n|: /', get_field( 'hours' ));
?>
                <dl class="place-hours">
<?php
            foreach ( $hours as $hour ) :
                if ( preg_match( '/day/', $hour ) ) :
                    if ( preg_match( '/24 hours/', $hour ) ) : ?>
                    <dt class="twenty-four-hours"><i class="fas fa-fw fa-clock"></i> <?php echo $hour; ?></dt>
<?php
                    else :
?>
                    <dt><i class="fas fa-fw fa-clock"></i> <?php echo $hour; ?></dt>
<?php
                    endif;
                else :
?>
                    <dd><?php echo $hour; ?></dd>
<?php
                endif;
            endforeach;
        endif;
?>
                </dl>
<?php
    endif;
  
    if ( get_field( 'address' ) ) :
?>
                <div class="place-map">
<?php
        $wp_address = get_field( 'address' ) . ', ' . 'St. Louis, MO ' . get_field( 'zip_code' ); 
        $shortcode = '[map addr="' . $wp_address . '"]';
        $shortcode .= get_the_title() . ', ';
        $shortcode .= get_field( 'address' );
        $shortcode .= '[/map]';
        echo do_shortcode( $shortcode )
?>
                </div>
<?php
    endif;
?>
            </section>

            <footer class="article-footer">
<?php
    if ( has_category() || dutchtown_is_updated() ) :
?>
                <p>
<?php
        if ( has_category() ) :
            $category = get_primary_taxonomy_term();
?>
                    Filed under <a href="<?php echo $category['url']; ?>"><?php echo $category['title']; ?></a>.
<?php
        endif;

        if ( dutchtown_is_updated() ) :
?>
                    This post was last updated on <?php dutchtown_updated_on(); ?>.
<?php
        endif;
    endif;
?>
                </p>
<?php
    if ( function_exists( 'yoast_breadcrumb' ) && ! is_home() ) : 
?>
                <p class="article-breadcrumbs">
                    <?php yoast_breadcrumb(); ?>
                </p>
<?php
    endif;
?>
            </footer>
        </article>
    </main>
<?php
get_footer();