<div class="section">
    <?php $pid = $p->ID ?>

    <h4>
        <?php the_title($pid); ?>
    </h4>
    <p class="flow-text">
        <?php the_field('post_text', $pid) ?>
    </p>

<?php
    if(get_field('add_side_image', $pid)):
?>
    <div class="row">
        <div class="col s12 m6">
            <p class="flow-text">
                <?php the_field('side_image_text', $pid); ?>
            </p>
        </div>
        <div class="col s12 m6">
            <img class="responsive-img materialboxed"
                 src="<?php the_field('image', $pid); ?>"
                 data-caption="<?php the_field('side_image_caption', $pid) ?>"
                 alt="<?php the_field('side_image_caption', $pid) ?>">
        </div>
    </div>
<?php
    endif;

    if(get_field('add_more_paragraphs', $pid)):
        $paragraphs = get_field('more_paragraphs', $pid);

        foreach($paragraphs as $par):
?>
    <h5>
        <?php the_title($par->ID); ?>
    </h5>
    <p class="flow-text">
        <?php the_field('text_content', $par->ID) ?>
    </p>
<?php
        endforeach;
    endif;

    if(get_field('add_flashy_bitton', $pid)):
        $btn = get_field('flashy_button', $pid);
?>
    <div class="row">
        <div class="col s1">
            <!-- whitespace -->
        </div>
        <div class="col s10">
            <a class="waves-effect waves-light btn-large hsbc-flashy-btn red"
               href="<?php hsbc_get_btn_link_url($btn) ?>">
                <?php the_field('btn_text', $btn->ID) ?>
            </a>
        </div>
        <div class="col s1">
            <!-- whitespace -->
        </div>
    </div>
<?php
    endif;

    if(get_field('add_normal_buttons', $pid)):
?>
    <div class="row">
        <div class="col s12 center-align">
<?php
        $btns = get_field('normal_buttons', $pid);

        foreach ($btns as $btn):
?>
            <a class="waves-effect waves-light btn hsbc-btn blue"
               href="<?php hsbc_get_btn_link_url($btn) ?>">
                <?php the_field('btn_text', $btn->ID) ?>
            </a>
<?php
        endforeach;
?>
        </div>
    </div>
<?php
    endif;
?>
</div>