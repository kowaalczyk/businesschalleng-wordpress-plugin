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

// HELPER FUNCTIONS

function hsbc_category_names($pid) {
    $categories = get_the_category($pid);
    return array_column($categories, 'name');
}

function hsbc_is_post($p) {
    $cat_names = hsbc_category_names($p);
    return in_array('HSBC Posts', $cat_names);
}

function hsbc_is_component($c) {
    $cat_names = hsbc_category_names($c);
    return in_array('HSBC Components', $cat_names);
}

// HSBC COMPONENT HELPERS

function hsbc_get_btn_link_url($pid) {
    if(get_field('link_to_file', $pid)) {
        return get_field('file_url', $pid);
    } elseif(get_field('link_to_page', $pid)) {
        return get_field('page_url', $pid);
    } else {
        return get_field('link_url', $pid);
    }
}

// HSBC POST PARTIALS
function hsbc_partial_title_and_text($pid) {
    $title = get_the_title($pid);
    $post_text = get_field('post_text', $pid);
    if(!$post_text) {
        $post_text = '';
    }

    return <<<EOT
    <h4>
        $title
    </h4>
    <p class="flow-text">
        $post_text
    </p>
EOT;
}

function hsbc_partial_side_image_row($pid) {
    $side_image_text = get_field('side_image_text', $pid);
    $image = get_field('image', $pid);
    $side_image_caption = get_field('side_image_caption', $pid);

    return <<<EOT
    <div class="row">
        <div class="col s12 m6">
            <p class="flow-text">
                $side_image_text
            </p>
        </div>
        <div class="col s12 m6">
            <img class="responsive-img materialboxed"
                 src="$image"
                 data-caption="$side_image_caption"
                 alt="$side_image_caption">
        </div>
    </div>

EOT;
}

function hsbc_partial_normal_button($pid) {
    $btn_text = get_field('button_text', $pid);
    $btn_link = hsbc_get_btn_link_url($pid);

    return <<<EOT
    <a class="waves-effect waves-light btn hsbc-btn blue"
               href="$btn_link">
        $btn_text
    </a>

EOT;

}

function hsbc_partial_normal_buttons($pid) {
    $normal_buttons = get_field('normal_buttons', $pid);
    $btn_ids = array_column($normal_buttons, 'ID');
    $btn_templates = array_map('hsbc_partial_normal_button', $btn_ids);
    $btn_renders = join(" ", $btn_templates);

    return <<<EOT
    <div class="row">
        <div class="col s12 center-align">
        $btn_renders
        </div>
    </div>

EOT;

}

// HSBC POST TEMPLATES

function hsbc_post_standard($pid) {
    $title_and_text_partial = hsbc_partial_title_and_text($pid);

    $add_side_image = get_field('add_side_image', $pid);
    $image_row_partial = ($add_side_image ? hsbc_partial_side_image_row($pid) : '');

    $add_normal_buttons = get_field('add_normal_buttons', $pid);
    $btn_row_partial = ($add_normal_buttons == 1 ? hsbc_partial_normal_buttons($pid) : '');

    return <<<EOT
    <div class="section">
    $title_and_text_partial
    $image_row_partial
    $btn_row_partial
    </div>
EOT;
}

function hsbc_post_list($pid) {
    //TODO
    return '';
}

function hsbc_post_external_media($pid) {
    $title_and_text_partial = hsbc_partial_title_and_text($pid);
    $external_media_content = get_field('external_media_content', $pid);

    return <<<EOT
    <div class="section">
    $title_and_text_partial
        <div class="video-container">
            $external_media_content
        </div>
    </div>
EOT;
}

function hsbc_post_calendar($pid) {
    //TODO
    return '';
}

function hsbc_post_team($pid) {
    //TODO
    return '';
}

function hsbc_post_partner($pid) {
    $partner_name = get_the_title($pid);
    $partner_logo = get_field('partner_logo', $pid);
    $partner_description = get_field('partner_description', $pid);
    if(!$partner_description) {
        $partner_description = '';
    }
    //TODO: Partner type, link to partner website

    return <<<EOT
    <div class="section">
        <div class="row">
            <div class="col s12 m6 l5">
                <img class="responsive-img"
                     src="$partner_logo"
                     alt="">
            </div>
            <div class="col s12 m6 l7">
                <h5>
                    $partner_name
                </h5>
                <p class="flow-text">
                    $partner_description
                </p>
            </div>
        </div>    
    </div>
EOT;
}

// HSBC RENDERING FUNCTIONS

function hsbc_post($pid) {
    $cat_names = hsbc_category_names($pid);
    //TODO: Consider sending to function based on post category slug (like in rails)

    if(in_array('HSBC Standard Posts', $cat_names)):
        return hsbc_post_standard($pid);
    endif;

    if(in_array('HSBC List Posts', $cat_names)):
        return hsbc_post_list($pid);
    endif;

    if(in_array('HSBC External Media Posts', $cat_names)):
        return hsbc_post_external_media($pid);
    endif;

    if(in_array('HSBC Calendar Posts', $cat_names)):
        return hsbc_post_calendar($pid);
    endif;

    if(in_array('HSBC Team Posts', $cat_names)):
        return hsbc_post_team($pid);
    endif;

    if(in_array('HSBC Partner Posts', $cat_names)):
        return hsbc_post_partner($pid);
    endif;
}
