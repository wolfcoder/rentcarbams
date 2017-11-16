<?php
/**
 * The template for displaying the footer
 *
 * Contains start hr and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    WordPress
 * @subpackage cozymart_revo
 * @since      1.0
 * @version    1.2
 */

?>

<!--footer-->
<footer id="website">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
				<?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
            <div class="col-md-4">
				<?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
            <div class=" col-md-4
            " >
			<?php dynamic_sidebar( 'footer-3' ); ?>
        </div>
    </div>
    <hr>
    <p class="text-center">&copy; Copyright <?php bloginfo( 'name' ); ?>
        Company. All Rights Reserved. <br/> template by <a
                href="http://bambangsetyawan.com" target="_blank">wordpress
            template</a></p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
