<?php
//enqueuing styles from assets/css
function hsbc_theme_stylesheets() {
    wp_enqueue_style( 'hsbc-theme-materialize-min',  get_template_directory_uri() .'/assets/css/materialize.min.css', array(), null, 'all' );
    wp_enqueue_style( 'hsbc-theme-hsbc',  get_template_directory_uri() .'/assets/css/hsbc.css', array(), null, 'all' );
    wp_enqueue_style( 'hsbc-theme-required-style', get_stylesheet_uri(), '', null, 'all' );
}
add_action( 'wp_enqueue_scripts', 'hsbc_theme_stylesheets' );
// TODO
//function hsbc_theme_scripts() {
//    wp_enqueue_script( 'hsbc-theme-jquery' )
//}
?>