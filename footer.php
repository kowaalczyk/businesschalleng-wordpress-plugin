<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link http://linkedin.com/in/kowaalczyk
 *
 * @package HSBC_Theme
 * @subpackage Main_Theme
 * @since 0.1
 * @version 0.1
 */

//getting custom global metadata (placeholder for sites without ACF Premium)
$hsbc_logo_data_post = get_page_by_path('hsbc-footer-data-post-do-not-delete', OBJECT, 'post');
$data_pid = $hsbc_logo_data_post->ID;

$hsbc_contact_email = get_field('hsbc_contact_email', $data_pid);
$hsbc_contact_address = get_field('hsbc_contact_address', $data_pid);

$hsbc_facebook_page_link = get_field('hsbc_facebook_page_link', $data_pid);
$hsbc_youtube_page_link = get_field('hsbc_youtube_page_link', $data_pid);
$hsbc_sknb_page_link = get_field('hsbc_sknb_page_link', $data_pid);
?>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">
                    High School Business Challenge
                </h5>
                <p class="grey-text text-lighten-4">
                    <a href="mailto:<?php echo $hsbc_contact_email ?>" class="grey-text text-lighten-3"><?php echo $hsbc_contact_email ?></a>
                    <br>
                <address>
                    <?php echo $hsbc_contact_address ?>
                </address>
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Follow us</h5>
                <ul>
                    <?php if ($hsbc_facebook_page_link): ?>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $hsbc_facebook_page_link ?>">Facebook</a></li>
                    <?php endif; ?>
                    <?php if ($hsbc_youtube_page_link): ?>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $hsbc_youtube_page_link ?>">YouTube</a></li>
                    <?php endif; ?>
                    <?php if ($hsbc_sknb_page_link): ?>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $hsbc_sknb_page_link ?>">SKN Biznesu</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © SKN Biznesu
            <span class="grey-text text-lighten-4 right">
                    Projekt i wykonanie strony: <a href="https://www.linkedin.com/in/kowaalczyk/" class="grey-text text-lighten-3">Krzysztof Kowalczyk</a>
            </span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>