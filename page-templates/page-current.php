<?php
/**
 * Template Name: Current Page
 * The main template file
 *
 * Displays HSBC Home Page
 *
 * @link http://linkedin.com/in/kowaalczyk
 *
 * @package HSBC_Theme
 * @subpackage Main_Theme
 * @since 0.1
 * @version 0.1
 */

get_header(); ?>

    <!-- CONTENT -->
    <div class="container hsbc-container">
        <!-- JUMBO WITH LINKS -->
        <div class="hide-on-small-only hsbc-jumbo-container">
            <div class="parallax-container hsbc-jumbo">
                <div class="parallax"><img src="<?php the_field('jumbo_image') ?>" alt=""></div>
            </div>
            <div class="hsbc-jumbo-content">
                <!-- jumbo heading -->
                <div class="row">
                    <div class="col l12 hide-on-med-and-down">
                        <h1 class="hsbc-jumbo-text">
                            High School Business Challenge
                        </h1>
                    </div>
                    <div class="col l12 hsbc-jumbo-text-placeholder">
                        <!-- whitespace -->
                    </div>
                </div>

                <!-- jumbo buttons -->
                <div class="row">
                    <div class="col m3 l3">
                        <a class="hsbc-scroll card-panel hoverable center-align yellow black-text"
                           href="#aktualnosci">
                            <?php the_field('first_section_title') ?>
                        </a>
                    </div>
                    <div class="col m3 l3">
                        <a class="hsbc-scroll card-panel hoverable center-align red black-text"
                           href="#o-konkursie">
                            <?php the_field('second_section_title') ?>
                        </a>
                    </div>
                    <div class="col m3 l3">
                        <a class="hsbc-scroll card-panel hoverable center-align blue black-text"
                           href="#harmonogram">
                            <?php the_field('third_section_title') ?>
                        </a>
                    </div>
                    <div class="col m3 l3">
                        <a class="hsbc-scroll card-panel hoverable center-align green black-text"
                           href="#faq">
                            <?php the_field('fourth_section_title') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="aktualnosci">
            <div class="card-content yellow darken-2">
                <h3 class="card-title white-text hsbc-card-title">
                    <?php the_field('first_section_title') ?>
                </h3>
            </div>
            <div class="card-content">
                <?php
                $news_posts = get_field('first_section_posts');
                if($news_posts):
                    foreach ($news_posts as $p):
                        echo hsbc_post($p->ID);
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="card" id="o-konkursie">
            <div class="card-content red darken-2">
                <h3 class="card-title white-text hsbc-card-title">
                    <?php the_field('second_section_title') ?>
                </h3>
            </div>
            <div class="card-content">
                <?php
                $about_posts = get_field('second_section_posts');
                if($about_posts):
                    foreach ($about_posts as $p):
                        echo hsbc_post($p->ID);
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="card" id="harmonogram">
            <div class="card-content blue darken-2">
                <h3 class="card-title white-text hsbc-card-title">
                    <?php the_field('third_section_title') ?>
                </h3>
            </div>
            <div class="card-content">
                <?php
                $calendar_posts = get_field('third_section_posts');
                if($calendar_posts):
                    foreach ($calendar_posts as $p):
                        echo hsbc_post($p->ID);
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="card" id="faq">
            <div class="card-content green darken-2">
                <h3 class="card-title white-text hsbc-card-title">
                    <?php the_field('fourth_section_title') ?>
                </h3>
            </div>
            <div class="card-content">
                <?php
                $faq_posts = get_field('fourth_section_posts');
                if($faq_posts):
                    foreach ($faq_posts as $p):
                        echo hsbc_post($p->ID);
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>

<?php get_footer();