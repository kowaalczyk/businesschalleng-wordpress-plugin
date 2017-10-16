<?php
// STYLES ENQUEUED FROM NON-STANDARD LOCATION
// (from assets/css)
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

// MENUS

function hsbc_register_menus() {
    register_nav_menus( array(
        'hsbc_main_menu' => __( 'HSBC Main Menu' ),
        'hsbc_edition_submenu' => __( 'HSBC Edition Submenu' )
    ) );
}
add_action( 'init', 'hsbc_register_menus' );

function hsbc_menu_item_filters ($classes, $item, $args) {
    if($args->theme_location == 'hsbc_main_menu') {
        $classes[] = 'hsbc-nav-item';
    }

    if(in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }

    return $classes;
}
add_filter('nav_menu_css_class' , 'hsbc_menu_item_filters' , 10 , 3);

function hsbc_menu_link_filters ($atts, $item, $args) {
    if($args->theme_location == 'hsbc_edition_submenu' || $args->theme_location == 'hsbc_main_menu') {
        $atts['class'] = 'grey-text text-darken-4';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'hsbc_menu_link_filters', 10, 3);

// HELPER FUNCTIONS

function hsbc_category_names($pid) {
    $categories = get_the_category($pid);
    return array_column($categories, 'name');
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

function hsbc_get_member_name($pid) {
    return get_field('full_name', $pid);
}

function hsbc_team_member_names($pid) {
    $team_members = get_field('team_members', $pid);
    $team_member_ids = array_column($team_members, 'ID');
    $names = array_map('hsbc_get_member_name', $team_member_ids);
    return $names;
}

function hsbc_get_team_members($pid, $member_formatter) {
    $team_members = get_field('team_members', $pid);
    $team_member_ids = array_column($team_members, 'ID');
    $team_member_templates = array_map($member_formatter, $team_member_ids);
    return $team_member_templates;
}

function hsbc_winning_formatter($pid) {
    $name = get_field('full_name', $pid);
    $about = get_field('about_the_member', $pid);
    if(!$about) {
        $about = '';
    }

    return <<<EOT
    <li class="collection-item">
        <span class="title hsbc-li-title">
            $name
        </span>
        <p>
            $about
        </p>
    </li>
EOT;
}

function hsbc_secondary_formatter($pid) {
    $name = get_field('full_name', $pid);

    return <<<EOT
    <li class="collection-item center-align">
        <span class="title">
            $name
        </span>
    </li>
EOT;
}

function hsbc_minor_formatter($pid) {
    $name = get_field('full_name', $pid);

    return <<<EOT
    <li class="collection-item center-align">
        <p>
            $name
        </p>
    </li>
EOT;
}

function hsbc_team_two_template($pid) {
    $team_title = get_field('team_name', $pid);
    $team_description = get_field('team_description', $pid);
    $team_photo = get_field('team_photo', $pid);
    $team_members = hsbc_get_team_members($pid, 'hsbc_secondary_formatter');
    $team_members_joined = join(' ', $team_members);
    $team_place = get_field('team_place_text', $pid);
    if(! $team_place) {
        $team_place = '';
    } else {
        $team_place = ' - ' . $team_place;
    }

    return <<<EOT
    <div class="col s12 m6 l6">
        <h5>
            $team_title 
            <span class="grey-text hsbc-right-subtitle">$team_place</span>
        </h5>
        <p>
            $team_description
        </p>
        <img class="responsive-img materialboxed hsbc-team-image-container" src="$team_photo" alt="">
        <ul class="collection z-depth-2">
            $team_members_joined
        </ul>
    </div>
EOT;
}

function hsbc_team_many_template($pid) {
    $team_title = get_field('team_name', $pid);
    $team_members = hsbc_get_team_members($pid, 'hsbc_minor_formatter');
    $team_members_joined = join(' ', $team_members);

    return <<<EOT
    <div class="col s12 m6 l4">
        <ul class="collection with-header z-depth-2">
            <li class="collection-header hsbc-li-finalist-title center-align">
                <h5>
                    $team_title
                </h5>
            </li>
            $team_members_joined
        </ul>
    </div>
EOT;
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

function hsbc_single_paragraph($pid) {
    $title = get_the_title($pid);
    $content = get_field('text_content', $pid);

    return <<<EOT
    <h5>
        $title
    </h5>
    <p class="flow-text">
        $content
    </p>
EOT;
}

function hsbc_partial_paragraphs($pid) {
    $paragraphs = get_field('more_paragraphs', $pid);
    $paragraph_ids = array_column($paragraphs, 'ID');
    $paragpaph_templates = array_map('hsbc_single_paragraph', $paragraph_ids);
    return join(' ', $paragpaph_templates);
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

function hsbc_partial_team_in_list($pid) {
    $team_name = get_field('team_name', $pid);
    $team_mentor = get_field('team_mentor', $pid);
    if(!$team_mentor) {
        $team_mentor = '';
    }
    $team_member_names = hsbc_team_member_names($pid);
    $team_members = join(" - ", $team_member_names);

    return <<<EOT
    <li class="collection-item avatar">
        <span class="title hsbc-li-title">$team_name</span>
        <p>
            $team_members
            <br>
            Opiekun: $team_mentor
        </p>
    </li>
EOT;
}

function hsbc_partial_team_list($pid) {
    $teams = get_field('teams', $pid);
    $team_ids = array_column($teams, 'ID');
    $team_templates = array_map('hsbc_partial_team_in_list', $team_ids);
    $team_lis = join(" ", $team_templates);

    return <<<EOT
    <ul class="collection">
    $team_lis
    </ul>
EOT;
}

function hsbc_partial_team_one($teams) {
    $pid = $teams[0]->ID;

    $team_title = get_field('team_name', $pid);
    $team_description = get_field('team_description', $pid);
    $team_photo = get_field('team_photo', $pid);
    $team_members = hsbc_get_team_members($pid, 'hsbc_winning_formatter');
    $team_members_joined = join(' ', $team_members);

    $team_place = get_field('team_place_text', $pid);
    if(! $team_place) {
        $team_place = '';
    } else {
        $team_place = ' - ' . $team_place;
    }

    return <<<EOT
    <h4>
        $team_title
        <span class="grey-text hsbc-right-subtitle">$team_place</span>
    </h4>
    <p class="flow-text">
        $team_description
    </p>
    <div class="row">
        <div class="col s12 m12 l6 hsbc-team-image-container">
            <img class="responsive-img materialboxed" src="$team_photo" alt="">
        </div>
        <div class="col s12 m12 l6">
            <ul class="collection z-depth-2">
                $team_members_joined
            </ul>
        </div>
    </div>
EOT;

}

function hsbc_partial_team_two($teams) {
    $team_ids = array_column($teams, 'ID');
    $team_templates = array_map('hsbc_team_two_template', $team_ids);
    $team_templates_joined = join(' ', $team_templates);

    return <<<EOT
    <div class="row">
    $team_templates_joined
    </div>
EOT;
}


function hsbc_partial_team_many($teams, $pid) {
    $title = get_the_title($pid);

    $team_ids = array_column($teams, 'ID');
    $team_templates = array_map('hsbc_team_many_template', $team_ids);
    $team_templates_joined = join(' ', $team_templates);

    return <<<EOT
    <h5>
        $title    
    </h5>
    <div class="row">
    $team_templates_joined
    </div>
EOT;
}

// HSBC POST TEMPLATES

function hsbc_post_standard($pid) {
    $title_and_text_partial = hsbc_partial_title_and_text($pid);

    $add_side_image = get_field('add_side_image', $pid);
    $image_row_partial = ($add_side_image ? hsbc_partial_side_image_row($pid) : '');

    $add_more_paragraphs = get_field('add_more_paragraphs', $pid);
    $more_paragraphs_partial = ($add_more_paragraphs ? hsbc_partial_paragraphs($pid) : '');

    $add_normal_buttons = get_field('add_normal_buttons', $pid);
    $btn_row_partial = ($add_normal_buttons == 1 ? hsbc_partial_normal_buttons($pid) : '');

    return <<<EOT
    <div class="section">
    $title_and_text_partial
    $more_paragraphs_partial
    $image_row_partial
    $btn_row_partial
    </div>
EOT;
}

function hsbc_post_list($pid) {
    $title_and_text_partial = hsbc_partial_title_and_text($pid);
    $team_collection_partial = hsbc_partial_team_list($pid);

    return <<<EOT
    <div class="section">
    $title_and_text_partial
        <div class="row">
            <div class="col l1 show-on-large">
                <!-- whitespace -->
            </div>
            <div class="col s12 m12 l10 z-depth-4 hsbc-team-list-wrapper">
                $team_collection_partial
            </div> 
            <div class="col l1 show-on-large">
                <!-- whitespace -->
            </div>
        </div>
    </div>
EOT;
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
    $title_and_text_partial = hsbc_partial_title_and_text($pid);

    $registration_text = get_field('registration_text', $pid);
    $registration_dates = get_field('registration_dates', $pid);

    $test_text = get_field('test_text', $pid);
    $test_dates = get_field('test_dates', $pid);

    $presentation_text = get_field('presentation_text', $pid);
    $presentation_dates = get_field('presentation_dates', $pid);

    $final_text = get_field('final_text', $pid);
    $final_dates = get_field('final_dates', $pid);

    //TODO: Consider adding registration link (and for other sections too)

    return <<<EOT
    <div class="section">
    $title_and_text_partial
        <div class="row">
            <div class="col s12 m3 l3">
                <div class="hsbc-svg-container center-align">
                    <i class="material-icons md-60">people</i>
                </div>
                <p class="center-align hsbc-calendar">
                $registration_text
                </p>
                <p class="center-align hsbc-calendar">
                $registration_dates
                </p>
            </div>
            <div class="col s12 m3 l3">
                <div class="hsbc-svg-container center-align">
                    <i class="material-icons md-60">laptop_chromebook</i>
                </div>
                <p class="center-align hsbc-calendar">
                $test_text
                </p>
                <p class="center-align hsbc-calendar">
                $test_dates
                </p>
            </div>
            <div class="col s12 m3 l3">
                <div class="hsbc-svg-container center-align">
                    <i class="material-icons md-60">slideshow</i>
                </div>
                <p class="center-align hsbc-calendar">
                $presentation_text
                </p>
                <p class="center-align hsbc-calendar">
                $presentation_dates
                </p>
            </div>
            <div class="col s12 m3 l3">
                <div class="hsbc-svg-container center-align">
                    <i class="material-icons md-60">next_week</i>
                </div>
                <p class="center-align hsbc-calendar">
                $final_text
                </p>
                <p class="center-align hsbc-calendar">
                $final_dates
                </p>
            </div>
        </div>
    </div>
EOT;

}


function hsbc_post_team($pid) {
    $team_components = get_field('teams', $pid);
    switch (sizeof($team_components)) {
        case 1:
            $team_partial = hsbc_partial_team_one($team_components);
            break;
        case 2:
            $team_partial = hsbc_partial_team_two($team_components);
            break;
        default:
            $team_partial = hsbc_partial_team_many($team_components, $pid);
            break;
    }

    return <<<EOT
    <div class="section">
    $team_partial
    </div>
EOT;
}

function hsbc_post_partner($pid) {
    $partner_name = get_the_title($pid);
    $partner_logo = get_field('partner_logo', $pid);
    $partner_description = get_field('partner_description', $pid);
    if(!$partner_description) {
        $partner_description = '';
    }
    $partner_url = get_field('partner_website', $pid);
    $partner_type = get_field('partner_type', $pid);

    return <<<EOT
    <div class="section">
        <div class="row">
            <div class="col s12 m6 l5">
                <a href="$partner_url" target="_blank">
                    <img class="responsive-img"
                     src="$partner_logo"
                     alt="">                
                </a>
            </div>
            <div class="col s12 m6 l7">
                <h5>
                    $partner_name
                    <span class="grey-text hsbc-right-subtitle">$partner_type</span>
                </h5>
                <p class="flow-text">
                    $partner_description
                </p>
            </div>
        </div>    
    </div> 
EOT;
}

function hsbc_post($pid) {
    $cat_names = hsbc_category_names($pid);

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
