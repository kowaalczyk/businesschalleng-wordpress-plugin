<?php
//enqueuing styles from assets/css
function hsbc_theme_stylesheets() {
    wp_enqueue_style( 'hsbc-theme-materialize-style',  get_template_directory_uri() .'/assets/css/materialize.min.css', array(), null, 'all' );
    wp_enqueue_style( 'hsbc-theme-hsbc-style',  get_template_directory_uri() .'/assets/css/hsbc.css', array('hsbc-theme-materialize-style'), null, 'all' );
    wp_enqueue_style( 'hsbc-theme-required-style', get_stylesheet_uri(), '', null, 'all' );
}
add_action( 'wp_enqueue_scripts', 'hsbc_theme_stylesheets' );

function hsbc_theme_scripts() {
    wp_enqueue_script( 'hsbc-theme-jquery-script', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', array(), null, true );
    wp_enqueue_script( 'hsbc-theme-materialize-script', get_template_directory_uri() . '/assets/js/materialize.min.js', array('hsbc-theme-jquery-script'), null, true );
    wp_enqueue_script( 'hsbc-theme-hsbc-script', get_template_directory_uri() . '/assets/js/hsbc.js', array('hsbc-theme-materialize-script'), null, true );
}
add_action( 'wp_enqueue_scripts', 'hsbc_theme_scripts' );

function hsbc_category_names($p) {
    $categories = get_the_category($p->ID);
    return array_column($categories, 'name');
}

function hsbc_is_post($p) {
    $cat_names = hsbc_category_names($p);
    return in_array('HSBC Posts', $cat_names)
}

function hsbc_is_component($c) {
    $cat_names = hsbc_category_names($c);
    return in_array('HSBC Components', $cat_names)
}

function hsbc_render_post($p) {
    $cat_names = hsbc_category_names($p);

    if(in_array('HSBC Standard Posts', $cat_names)):
        return get_template_part('hsbc_post', 'standard');
    endif;

    if(in_array('HSBC List Posts', $cat_names)):
        return get_template_part('hsbc_post', 'list');
    endif;

    if(in_array('HSBC External Media Posts', $cat_names)):
        return get_template_part('hsbc_post', 'external_media');
    endif;

    if(in_array('HSBC Calendar Posts', $cat_names)):
        return get_template_part('hsbc_post', 'calendar');
    endif;

    if(in_array('HSBC Team Posts', $cat_names)):
        return get_template_part('hsbc_post', 'team');
    endif;

    if(in_array('HSBC Partner Posts', $cat_names)):
        return get_template_part('hsbc_post', 'partner');
    endif;
}

function hsbc_render_component($c) {
    $cat_names = hsbc_category_names($c);

    if(in_array('HSBC Button Components', $cat_names)):
        return get_template_part('hsbc_component', 'button');
    endif;

    if(in_array('HSBC Text Components', $cat_names)):
        return get_template_part('hsbc_component', 'text');
    endif;

    if(in_array('HSBC Team Member Components', $cat_names)):
        return get_template_part('hsbc_component', 'team_member');
    endif;

    if(in_array('HSBC Team Components', $cat_names)):
        return get_template_part('hsbc_component', 'team');
    endif;
}