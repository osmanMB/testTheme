<?php
function o_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'o_theme_support');

function o_menus() {

    $locations = array (
        'primary' => 'primary left sidebar',
        'footer'  => 'footer menu list'
    );

    register_nav_menus($locations);
}

add_action('init', 'o_menus');

function o_register_css() {
    wp_enqueue_style('o-normalize', "https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css", array(), '8.0.1', 'all');
    wp_enqueue_style('o-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('o-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('o-style', get_template_directory_uri() . "/style.css", array('o-bootstrap'), wp_get_theme()->get('Version'), 'all');

}

add_action('wp_enqueue_scripts', 'o_register_css');


function o_register_js() {
    
    wp_enqueue_script('o-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('o-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array('o-jquery'), '4.4.1', true);
    wp_enqueue_script('o-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('o-main', get_template_directory_uri() . "/assets/js/main.js", array('o-bootstrap'), '1.1', true);

}

add_action('wp_enqueue_scripts', 'o_register_js');

function o_widget_areas() {

    register_sidebar(
        array (
            'before_title' => '',
            'after_title'  => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'sidebar area',
            'id'   => 'sidebar-1',
            'discription' => 'sidebar widget area'
        )
    );

    register_sidebar(
        array (
            'before_title' => '',
            'after_title'  => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'footer area',
            'id'   => 'footer-1',
            'discription' => 'footer widget area'
        )
    );
}

add_action('widgets_init', 'o_widget_areas');

function o_get_the_archive_title() {
    $title = __( 'Archives' );
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'osman' ) . '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'osman' ) . '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'osman' ) . '<span class="page-description">' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'osman' ) . '<span class="page-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'osman' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'osman' ) . '<span class="page-description">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'osman' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'osman' ) . '<span class="page-description">' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = __( 'Post Type Archives: ', 'osman' ) . '<span class="page-description">' . post_type_archive_title( '', false ) . '</span>';
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: %s: Taxonomy singular name. */
		$title = sprintf( esc_html__( '%s Archives:', 'osman' ), $tax->labels->singular_name );
	} else {
		$title = __( 'Archives:', 'osman' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'o_get_the_archive_title' );
