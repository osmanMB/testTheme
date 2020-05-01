<?php

function o_register_css() {
    $version = wp_get_theme()->get( 'version' );
    wp_enqueue_style('o-style', get_template_directory_uri() . "/style.css", array('o-bootstrap'), $version, 'all');
    wp_enqueue_style('o-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('o-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

add_action('wp_enqueue_scripts', 'o_register_css');

?>