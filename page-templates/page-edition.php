<?php
/**
 * Template Name: Edition Page
 *
 * TODO: Edition page template
 *
 * Template for edition pages (right now the only template in this theme prepared for use on multiple pages)
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

    <div class="card" id="zespoly">
        <div class="card-content yellow darken-2">
            <h3 class="card-title white-text hsbc-card-title">
                Zwycięzcy i finaliści
            </h3>
        </div>
        <div class="card-content">
            <?php
            $teams = get_field('teams');
            if($teams):
                foreach ($teams as $p):
                    echo hsbc_post($p->ID);
                endforeach;
            endif;
            ?>
        </div>
    </div>

    <div class="card" id="partnerzy">
        <div class="card-content yellow darken-2">
            <h3 class="card-title white-text hsbc-card-title">
                Partnerzy edycji
            </h3>
        </div>
        <div class="card-content">
            <?php
            $partners = get_field('partners');
            if($partners):
                foreach ($partners as $p):
                    echo hsbc_post($p->ID);
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer();