<?php
function dutchtown_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer One', 'dutchtown' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Two', 'dutchtown' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Three', 'dutchtown' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'dutchtown_widgets_init' );

function dutchtown_register_widgets()
{
    register_widget( 'Dutchtown_HTML_Widget' );
}

add_action( 'widgets_init', 'dutchtown_register_widgets' );

class Dutchtown_HTML_Widget extends WP_Widget_Custom_HTML
{
    function widget( $args, $instance )
    {
        global $post;
        $original_post = $post;
        if ( is_singular() ) :
            $post = get_queried_object();
        else :
            $post = null;
        endif;
 
        add_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );
 
        $instance = array_merge( $this->default_instance, $instance );
 
        $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
 
        $simulated_text_widget_instance = array_merge(
            $instance,
            array(
                'text'   => isset( $instance['content'] ) ? $instance['content'] : '',
                'filter' => false,
                'visual' => false,
            )
        );
        unset( $simulated_text_widget_instance['content'] );
 
        $content = apply_filters( 'widget_text', $instance['content'], $simulated_text_widget_instance, $this );
        $content = wp_targeted_link_rel( $content );
        $content = apply_filters( 'widget_custom_html_content', $content, $instance, $this );
 
        $post = $original_post;
        remove_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) ); 
 
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ) :
            echo $args['before_title'] . $title . $args['after_title'];
        endif;
        
        echo $content;

        echo $args['after_widget'];
    }
}