<?php
/**
 * Places Archive Template
 * @package Dutchtown
 * @subpackage Keokuk
 * @since 0.1
 */

get_header();
?>
    <main id="content">
<?php
    $places_page_title = get_field( 'places_page_title', 'option' );
    $places_page_pre_title = get_field( 'places_page_pre_title', 'option' );
    $places_page_post_title = get_field( 'places_page_post_title', 'option') ;
    $places_page_content = get_field( 'places_page_content', 'option' );
    $places_page_image = get_field( 'places_page_image', 'option' );
    if ( $places_page_image ) :
?>
        <header class="page-header has-featured-image">
            <div class="container">
                <div class="post-thumbnail">
                    <?php echo wp_get_attachment_image( $places_page_image, null ); ?>
                </div>
<?php
    else :
?>
        <header class="page-header">
            <div class="container">
<?php
    endif;
?>
                <h1>
                    <a href="<?php the_permalink(); ?>">
<?php
    if ( $places_page_pre_title ) :
?>
                        <span class="subheading"><?php echo $places_page_pre_title; ?></span>
<?php
    endif;
?>
                        <?php echo $places_page_title; ?>
<?php
    if ( $places_page_post_title ) :
?>
                        <span class="subheading"><?php echo $places_page_post_title; ?></span>
<?php
    endif;
?>
                    </a>
                </h1>

                <section class="page-sharing">
<?php
                    dutchtown_facebook_link();
                    dutchtown_twitter_link();
                    dutchtown_mailto_link();
?>
                </section>
            </div>
        </header>

<?php
    if ( $places_page_content ) :
?>
        <div class="places container container-page-content">
            <?php echo $places_page_content; ?>
<?php
    endif;
?>

            <section class="places-list" id="places-list">
<?php
    $custom_terms = get_terms('place_category');
?>
                <h2>Jump to Category</h2>

                <div class="places-categories">
                    <ul>
<?php
    //  https://wordpress.stackexchange.com/questions/66219/list-all-posts-in-custom-post-type-by-taxonomy
    $custom_terms = get_terms('place_category');
    foreach( $custom_terms as $custom_term ) :
        wp_reset_query();
        $args = array(
            'post_type' => 'places',
            'tax_query' => array(
                'relation' => 'and',
                array(
                    'taxonomy' => 'place_category',
                    'field' => 'slug',
                    'terms' => $custom_term->slug,
                ),
            ),
            'meta_query' => array(
                'relation' => 'and',
                array(
                    'key' => 'closed',
                    'value' => 0,
                    'compare' => '=='
                )
            ),
            'orderby' => 'post_title',
            'order' => 'ASC',
            'posts_per_page' => -1
        );
        $loop = new WP_Query($args);
        if ( $loop->have_posts() ) :
?>
                        <li>
                            <a href="#<?php echo $custom_term->slug; ?>"><?php echo $custom_term->name; ?></a>
                        </li>
<?php
        endif;
    endforeach;
?>
                    </ul>
                </div>
            </section>

            <section class="places-blocks masonry-container">
<?php
    $term_count = 0;

    foreach( $custom_terms as $custom_term ) :
        $term_count++;
        wp_reset_query();
        $args = array(
            'post_type' => 'places',
            'tax_query' => array(
                'relation' => 'and',
                array(
                    'taxonomy' => 'place_category',
                    'field' => 'slug',
                    'terms' => $custom_term->slug,
                ),
            ),
            'meta_query' => array(
                'relation' => 'and',
                array(
                    'key' => 'closed',
                    'value' => 0,
                    'compare' => '=='
                )
            ),
            'orderby' => 'post_title',
            'order' => 'ASC',
            'posts_per_page' => -1
        );

        add_filter('posts_fields', 'dutchtown_temp_column');
        add_filter('posts_orderby', 'dutchtown_sort_by_temp_column');

        $loop = new WP_Query($args);

        remove_filter('posts_fields','dutchtown_temp_column');
        remove_filter('posts_orderby', 'dutchtown_sort_by_temp_column');

        if ( $loop->have_posts() ) :
?>
                <div class="masonry" id="<?php echo $custom_term->slug; ?>">
                    <div class="masonry-inner">
                        <div class="masonry-body">
                            <h2 class="place-category">
                                <a href="/places/category/<?php echo $custom_term->slug; ?>/">
                                    <?php echo $custom_term->name; ?>
                                </a>
                                <a href="#places-list"><span class="sr-only">Top</span><i class="fas fa-caret-up"></i></a>
                            </h2>
                            
                            <ul>
<?php
            while( $loop->have_posts() ) :
                $loop->the_post();
  
                if ( get_field( 'closed' ) == false && get_field( 'hide_from_listings' ) == false  ) :
?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
<?php
                    $date = strtotime( get_field( 'new_in_town' ) );
                    $today = strtotime( date( 'Y-m-d' ) );
                    if ( $date != null && $date > $today ) : 
?>
                                    <span class="new-in-town">New!</span>
<?php 
                    endif;
?>
                                </li>
<?php
                endif;
            endwhile;
?>
                            </ul>
                        </div>
                    </div>
                </div>
<?php
        endif;
    endforeach
?>
            </section>

            <footer class="article-footer">
				<p class="article-breadcrumbs">
					<?php yoast_breadcrumb(); ?>
				</p>
			</footer>
        </div>
    </main>
<?php
get_footer();