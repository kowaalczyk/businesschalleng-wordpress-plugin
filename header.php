<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> and opens the body tag.
 *
 * @link http://linkedin.com/in/kowaalczyk
 *
 * @package HSBC_Theme
 * @subpackage Main_Theme
 * @since 0.1
 * @version 0.1
 */

?><!DOCTYPE html>

<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>High School Business Challenge Dev Theme</title>

    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
//getting custom global metadata (placeholder for sites without ACF Premium)
$hsbc_logo_data_post = get_page_by_path('hsbc-logo-post-do-not-delete', OBJECT, 'post');
$hsbc_logo_url = get_field('hsbc_logo', $hsbc_logo_data_post->ID);
?>

<!-- NAVIGATION -->
<!-- HEADER NAV -->
<?php
wp_nav_menu( array(
    'theme_location' => 'hsbc_edition_submenu',
    'container' => false,
    'container_class' => false,
    'container_id' => false,
    'menu_class' => 'dropdown-content black-text',
    'menu_id' => 'edition-dropdown'
) );
?>

<div class="hide-on-med-and-down navbar-fixed" id="hsbc-big-navbar">
    <nav class="nav-extended white hsbc-nav-container">
        <div class="row">
            <div class="col m2 l1 center-align hsbc-logo-container">
                <img class=""
                     src="<?php echo $hsbc_logo_url ?>"
                     alt="">
                <!--TODO: Logo in SVG-->
            </div>
            <div class="col m10 l11">
                <div class="nav-wrapper">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'hsbc_main_menu',
                        'container' => false,
                        'container_class' => false,
                        'container_id' => false,
                        'menu_class' => false,
                        'menu_id' => false
                    ) );
                    ?>
                    <ul class="right">
                        <li class="hsbc-nav-item">
                            <a href="#!" class="grey-text text-darken-4 dropdown-button" data-activates="edition-dropdown">Poprzednie edycje</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- SIDE NAV -->
<?php
wp_nav_menu( array(
    'theme_location' => 'hsbc_edition_submenu',
    'container' => false,
    'container_class' => false,
    'container_id' => false,
    'menu_class' => 'dropdown-content black-text',
    'menu_id' => 'edition-dropdown-sidenav'
) );
?>

<ul class="side-nav" id="hsbc-mobile-nav">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'hsbc_main_menu',
        'container' => false,
        'container_class' => false,
        'container_id' => false,
        'menu_class' => false,
        'menu_id' => false,
        'items_wrap' => '<!-- NO ITEMS WRAP id="%1$s" class="%2$s" --> %3$s'
    ) );
    ?>
    <li><a href="#!"
           class="grey-text text-darken-4 dropdown-button"
           data-activates="edition-dropdown-sidenav">Poprzednie edycje</a>
    </li>
</ul>

<div class="navbar-fixed hide-on-large-only" id="hsbc-small-navbar">
    <nav class="">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo hide-on-small-only">High School Business Challenge</a>
            <a href="#!" data-activates="hsbc-mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
