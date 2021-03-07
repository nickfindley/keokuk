<?php
function dutchtown_register_places() {
    $labels = [
		"name" => __( "Places", "dutchtown" ),
		"singular_name" => __( "Place", "dutchtown" ),
	];

	$args = [
		"label" => __( "Places", "dutchtown" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "places", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"taxonomies" => [ "post_tag" ],
	];

	register_post_type( "places", $args );
}

add_action( 'init', 'dutchtown_register_places' );

function dutchtown_register_place_category() {
	$labels = [
		"name" => __( "Place Categories", "dutchtown" ),
		"singular_name" => __( "Place Category", "dutchtown" ),
	];

	$args = [
		"label" => __( "Place Categories", "dutchtown" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'places/category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "place_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "place_category", [ "places" ], $args );
}

add_action( 'init', 'dutchtown_register_place_category' );

function dutchtown_places_posts_per_page( $query )
{
	if ( is_tax( 'place_category' ) ) :
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', 'post_title' );
		$query->set( 'order', 'ASC' );
	endif;
}

add_action( 'pre_get_posts', 'dutchtown_places_posts_per_page' );