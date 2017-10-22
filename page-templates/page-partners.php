<?php
/**
 * Template Name: Partners Page
 *
 * Template for partners page
 *
 * Should not be used for other pages
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

    <div class="card" id="partnerzy">
        <div class="card-image">
            <img src="<?php the_field('jumbo_image') ?>" alt="">
            <h3 class="card-title hsbc-card-title">
                <?php the_title() ?>
            </h3>
        </div>
        <div class="card-content">
            <?php
            $partners_posts = get_field('partners_posts');
            if($partners_posts):
                foreach ($partners_posts as $p):
                    echo hsbc_post($p->ID);
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer();