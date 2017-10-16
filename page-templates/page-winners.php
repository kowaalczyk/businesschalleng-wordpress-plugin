<?php
/**
 * Template Name: Winners Page
 *
 * Template for winners page
 *
 * Should not be used for other pages.
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

    <div class="card" id="zwyciezcy">
        <div class="card-image">\
            <h3 class="card-title hsbc-card-title">Zwycięzcy poprzednich edycji</h3>
        </div>
        <div class="card-content">
            <?php
            $winners_posts = get_field('winners_posts');
            if($winners_posts):
                foreach ($winners_posts as $p):
                    echo hsbc_post($p->ID);
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer();