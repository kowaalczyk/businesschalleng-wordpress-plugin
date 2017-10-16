<?php
/**
 * Template Name: Organization Page
 *
 * Organization page template file
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
            <h3 class="card-title hsbc-card-title">Organizatorzy konkursu</h3>
        </div>
        <div class="card-content">
        <?php
        $org_posts = get_field('organizer_posts');
        if($org_posts):
            foreach ($org_posts  as $p):
                echo hsbc_post($p->ID);
            endforeach;
        endif;
        ?>
        </div>
    </div>
</div>

<?php get_footer();