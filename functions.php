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
    $version = wp_get_theme()->get( 'version' );
    wp_enqueue_style('o-style', get_template_directory_uri() . "/style.css", array('o-bootstrap'), $version, 'all');
    wp_enqueue_style('o-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('o-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

add_action('wp_enqueue_scripts', 'o_register_css');


function o_register_js() {
    
    wp_enqueue_script('o-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('o-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array('o-jquery'), '4.4.1', true);
    wp_enqueue_script('o-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('o-main', get_template_directory_uri() . "/assets/js/main.js", array('o-bootstrap'), '1.1', true);

}

add_action('wp_enqueue_scripts', 'o_register_js');

?>