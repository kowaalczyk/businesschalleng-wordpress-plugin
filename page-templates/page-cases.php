<?php
/**
 * Template Name: Cases Page
 * Cases page template file
 *
 * Template for cases page, should not be used for any other pages.
 *
 * @link http://linkedin.com/in/kowaalczyk
 *
 * @package HSBC_Theme
 * @subpackage Main_Theme
 * @since 0.1
 * @version 0.1
 */

get_header(); ?>

<!-- NAVIGATION -->
<!-- HEADER NAV -->
<ul id="edition-dropdown" class="dropdown-content black-text">
    <li><a href="/edition-1" class="grey-text text-darken-4">Edycja 1</a></li>
    <li><a href="/edition-2" class="grey-text text-darken-4">Edycja 2</a></li>
    <li><a href="/edition-3" class="grey-text text-darken-4">Edycja 3</a></li>
</ul>

<div class="hide-on-med-and-down navbar-fixed" id="hsbc-big-navbar">
    <nav class="nav-extended white hsbc-nav-container">
        <div class="row">
            <div class="col m2 l1 center-align hsbc-logo-container">
                <img class=""
                     src="../assets/img/hsbc-logo.png"
                     alt="High School Business Challenge logo">
                <!--TODO: Logo in SVG-->
            </div>
            <div class="col m10 l11">
                <div class="nav-wrapper">
                    <ul>
                        <li class="hsbc-nav-item">
                            <a href="/" class="grey-text text-darken-4">Bieżąca edycja</a>
                        </li>
                        <li class="hsbc-nav-item">
                            <a href="#!" class="grey-text text-darken-4 dropdown-button" data-activates="edition-dropdown">Poprzednie edycje</a>
                        </li>
                        <li class="active hsbc-nav-item">
                            <a href="/cases" class="grey-text text-darken-4">Zadania i materiały</a>
                        </li>
                        <li class="hsbc-nav-item">
                            <a href="/winners" class="grey-text text-darken-4">Zwycięzcy</a>
                        </li>
                        <li class="hsbc-nav-item">
                            <a href="/partners" class="grey-text text-darken-4">Partnerzy</a>
                        </li>
                        <li class="hsbc-nav-item">
                            <a href="/org" class="grey-text text-darken-4">Organizatorzy</a>
                        </li>
                        <li class="hsbc-nav-item">
                            <a href="/contact" class="grey-text text-darken-4">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- SIDE NAV -->
<ul id="edition-dropdown-sidenav" class="dropdown-content black-text">
    <li><a href="/edition-1" class="grey-text text-darken-4">Edycja 1</a></li>
    <li><a href="/edition-2" class="grey-text text-darken-4">Edycja 2</a></li>
    <li><a href="/edition-3" class="grey-text text-darken-4">Edycja 3</a></li>
</ul>

<ul class="side-nav" id="hsbc-mobile-nav">
    <li><a href="sass.html">Bieżąca edycja</a></li>
    <li><a href="#!"
           class="grey-text text-darken-4 dropdown-button"
           data-activates="edition-dropdown-sidenav">Poprzednie edycje</a>
    </li>
    <li class="active"><a href="collapsible.html">Zadania i materiały</a></li>
    <li><a href="collapsible.html">Zwycięzcy</a></li>
    <li><a href="collapsible.html">Partnerzy</a></li>
    <li><a href="collapsible.html">Organizatorzy</a></li>
    <li><a href="collapsible.html">Kontakt</a></li>
</ul>

<div class="navbar-fixed hide-on-large-only" id="hsbc-small-navbar">
    <nav class="">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo hide-on-small-only">High School Business Challenge</a>
            <a href="#" data-activates="hsbc-mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>

<!-- CONTENT -->
<div class="container hsbc-container">
    <div class="card" id="zadania">
        <div class="card-image">
            <img src="../assets/img/case-background.jpg" alt="">
            <h3 class="card-title hsbc-card-title">Zadania z poprzednich lat</h3>
        </div>
        <div class="card-content">

            <!-- TODO CASE POSTS -->

        </div>
    </div>

    <div class="card" id="zrodla-wiedzy">
        <div class="card-content yellow darken-2">
            <h3 class="card-title white-text hsbc-card-title">
                Źródła wiedzy
            </h3>
        </div>
        <div class="card-content">

            <!-- TODO KNOWLEDGE POSTS -->

        </div>
    </div>
</div>

<?php get_footer();