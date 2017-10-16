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
                        <?php the_title() ?>
                    </h1>
                </div>
                <div class="col l12 hsbc-jumbo-text-placeholder">
                    <!-- whitespace -->
                </div>
            </div>

            <!-- jumbo buttons -->
            <div class="row">
                <div class="col m4 l4">
                    <a class="hsbc-scroll card-panel hoverable center-align yellow black-text"
                       href="#zadania">
                        <?php the_field('first_section_title') ?>
                    </a>
                </div>
                <div class="col m4 l4">
                    <a class="hsbc-scroll card-panel hoverable center-align red black-text"
                       href="#zagadnienia-merytoryczne">
                        <?php the_field('second_section_title') ?>
                    </a>
                </div>
                <div class="col m4 l4">
                    <a class="hsbc-scroll card-panel hoverable center-align blue black-text"
                       href="#zrodla-wiedzy">
                        <?php the_field('third_section_title') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="hsbc-mobile-jumbo-container">
        <div class="show-small hsbc-mobile-jumbo">
            <!--TODO Mobile Jumbo-->
        </div>
        <div class="show-small hsbc-mobile-jumbo-links">
            <!--TODO Mobile Jumbo-->
        </div>
    </div>

    <div class="card" id="zadania">
        <div class="card-content yellow darken-2">
            <h3 class="card-title white-text hsbc-card-title">
                <?php the_field('first_section_title') ?>
            </h3>
        </div>
        <div class="card-content">
            <?php
            $case_posts = get_field('first_section_posts');
            if($case_posts):
                foreach ($case_posts as $p):
                    echo hsbc_post($p->ID);
                endforeach;
            endif;
            ?>
        </div>
    </div>

    <div class="card" id="zagadnienia-merytoryczne">
        <div class="card-content red darken-2">
            <h3 class="card-title white-text hsbc-card-title">
                <?php the_field('second_section_title') ?>
            </h3>
        </div>
        <div class="card-content">
            <?php
            $second_post = get_field('second_section_post');
            if($second_post):
                echo hsbc_post($second_post->ID);
            endif;
            ?>
        </div>
    </div>

    <div class="card" id="zrodla-wiedzy">
        <div class="card-content blue darken-2">
            <h3 class="card-title white-text hsbc-card-title">
                <?php the_field('third_section_title') ?>
            </h3>
        </div>
        <div class="card-content">
            <?php
            $third_post = get_field('third_section_post');
            if($third_post):
                echo hsbc_post($third_post->ID);
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer();