<?php
/**
 * The main template file Cozymart Revo
 *
 * Cozymart revo
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
    <!-- banner-->
    <div class="container">
        <div class="row ">
			<?php
			$page_id      = 420;
			$post         = get_post( $page_id, OBJECT, 'raw' );
			$post_title   = $post->post_title;
			$post_content = apply_filters( 'the_content', $post->post_content );
			$thumbnail    = get_the_post_thumbnail( $page_id, 'banner-thumb' );
			echo "$post_content";
			edit_post_link( 'EDIT DISINI', '', '', $page_id, 'button' );
			?>
        </div>
    </div>
    <!--end banner-->
    <!--Content-->
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
				<?php if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						echo "<div class='text-center margin-top2'> <h1 class='title'>" . get_the_title() . "</h1></div>";
						echo "<div class=\"content margin-top2\">" . get_the_content()
						     . "</div>";

					endwhile;
				endif;
				?>
            </div>
            <div class="sidebar col-lg-4 margin-top2">
                <?php get_sidebar()?>
            </div>
        </div>
    </div>
    </div>
<?php get_footer() ?>