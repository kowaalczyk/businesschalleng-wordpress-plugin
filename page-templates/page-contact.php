<?php
/**
 * Template Name: Contact Page
 *
 * Conatct page template
 *
 * Should not be used in other pages.
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
                <img width="88" height="88"
                     src="../assets/img/hsbc-logo.png"
                     alt="">
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
                        <li class="hsbc-nav-item">
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
                        <li class="active hsbc-nav-item">
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
    <li><a href="collapsible.html">Zadania i materiały</a></li>
    <li><a href="collapsible.html">Zwycięzcy</a></li>
    <li><a href="collapsible.html">Partnerzy</a></li>
    <li><a href="collapsible.html">Organizatorzy</a></li>
    <li class="active"><a href="collapsible.html">Kontakt</a></li>
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

    <div class="card" id="kontakt">
        <div class="card-content">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12 l7">
                        <h4>
                            Let's talk!
                        </h4>
                        <div class="divider"></div>
                        <p class="flow-text">
                            <br>
                            Śmiało piszcie do nas ze wszystkimi pytaniami w wiadomościach na nasz fanpage (formularz obok) lub w wiadomościach mailowych na adres
                            <a href="mailto:kontakt@businesschallenge.pl">kontakt@businesschallenge.pl</a>.
                        </p>
                    </div>
                    <div class="col s12 m12 l5">
                        <!-- Facebook Messenger -->
                        <div class="hsbc-contact-messenger">
                            <div class="fb-page" data-href="https://www.facebook.com/hsbcpoland" data-tabs="messages" data-width="380" data-height="320" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/hsbcpoland" class="fb-xfbml-parse-ignore"></blockquote></div>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhsbcpoland&amp;tabs=messages&amp;width=380&amp;height=320&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="380" height="320" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();