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
    <!--mobil matic 62-->
    <div class="container">
        <div class="row content62">
			<?php
			$cat_id   = 62;
			$cat      = get_the_category( $cat_id );
			$cat_name = get_the_category_by_ID( $cat_id );
			$cat_desc = category_description( $cat_id );
			echo "<div class=\" text-center padding-top-30\"> <h2 class=\"display-3 text-center\"> $cat_name </h2>
             <p class=\"lead text-center\"> $cat_desc  </p></div> ";
			?>

			<?php
			// the query to set the posts per page to 4
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' )
				: 1;
			$args  = array(
				'cat'            => 62,
				'posts_per_page' => 4,
				'paged'          => $paged,
				'orderby'        => 'title',
				'order'          => 'ASC'
			);
			query_posts( $args );
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content' );
				}
			} else {
				echo "Maaf mobil kami sedang jalan semua...";
			}
			wp_reset_postdata();
			?>

        </div>
        <div class='padding-top-30 col-lg-12 text-center '>
			<?php global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) {
				echo " <div class=\"btn btn-secondary load-mobil  bd-toggle-animated-progress button$cat_id\"  data-toggle=\"button\" 
	             id=\"button$cat_id\"  data-current=\"1\" data-cat=\"$cat_id\" data-max-num-pages=\"$wp_query->max_num_pages \" 
                  aria-pressed=\"false\" autocomplete=\"on\"> klik untuk pilihan mobil rentcar lainnya </div>";

			} else {
				echo "<span class=\"display none\">" . paginate_links()
				     . "</span>";
			}
			?>
        </div>
    </div>
    <!--end mobil matic 62-->
    <!--mobil manual 63-->
    <div class="flex-nowrap gray">
        <div class="container  padding-top-30 padding-bottom-30 ">
            <div class="row content63">
				<?php
				$cat_id   = 63;
				$cat      = get_the_category( $cat_id );
				$cat_name = get_the_category_by_ID( $cat_id );
				$cat_desc = category_description( $cat_id );
				echo "<div class=\" text-center padding-top-30\"> <h2 class=\"display-3 text-center\"> $cat_name </h2>
             <p class=\"lead text-center\"> $cat_desc  </p></div> ";
				?>

				<?php
				// the query to set the posts per page to 4
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' )
					: 1;
				$args  = array(
					'cat'            => 63,
					'posts_per_page' => 4,
					'paged'          => $paged,
					'orderby'        => 'modified',
					'order'          => 'ASC'
				);
				query_posts( $args );
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content',
							get_post_format() );
					}
				} else {
					echo "Maaf mobil kami sedang jalan semua...";
				}
				wp_reset_postdata();
				?>

            </div>
            <div class='padding-top-30 col-lg-12 text-center '>
				<?php global $wp_query;
				if ( $wp_query->max_num_pages > 1 ) {
					echo " <div class=\"btn btn-secondary load-mobil  bd-toggle-animated-progress button$cat_id\"  data-toggle=\"button\" 
	             id=\"button$cat_id\" data-current=\"1\" data-cat=\"$cat_id\" data-max-num-pages=\"$wp_query->max_num_pages \" 
                  aria-pressed=\"false\" autocomplete=\"on\"> klik untuk pilihan mobil rentcar lainnya </div>";

				} else {
					echo "<span class=\"display none current-page\">"
					     . paginate_links() . "</span>";
				}
				?>
            </div>
        </div>
    </div>
    <!--end mobil manual 63-->
    <!--mobil besar 64-->
    <div class="container">
        <div class="row content64">
			<?php
			$cat_id   = 64;
			$cat      = get_the_category( $cat_id );
			$cat_name = get_the_category_by_ID( $cat_id );
			$cat_desc = category_description( $cat_id );
			echo "<div class=\" text-center padding-top-30\"> <h2 class=\"display-3 text-center\"> $cat_name </h2>
             <p class=\"lead text-center\"> $cat_desc  </p></div> ";
			?>

			<?php
			// the query to set the posts per page to 4
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' )
				: 1;
			$args  = array(
				'cat'            => 64,
				'posts_per_page' => 4,
				'paged'          => $paged,
				'orderby'        => 'title',
				'order'          => 'ASC'
			);
			query_posts( $args );
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content',
						get_post_format() );
				}
			} else {
				echo "Maaf mobil kami sedang jalan semua...";
			}
			wp_reset_postdata();
			?>

        </div>
        <div class='padding-top-30 col-lg-12 text-center '>
			<?php global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) {
				echo " <div class=\"btn btn-secondary load-mobil  bd-toggle-animated-progress button$cat_id\"  data-toggle=\"button\" 
	             id=\"button$cat_id\"  data-current=\"1\" data-cat=\"$cat_id\" data-max-num-pages=\"$wp_query->max_num_pages \" 
                  aria-pressed=\"false\" autocomplete=\"on\"> klik untuk pilihan mobil rentcar lainnya </div>";
			} else {
				echo "<span class=\"display none\">" . paginate_links()
				     . "</span>";
			}
			?>
        </div>
    </div>
    <!--end mobil besar 64-->
    <!-- testimony-->

    <div class="flex-nowrap testimoni jarallax"
         style="background-image: url(  <?php echo get_bloginfo( 'template_directory' ) ?>/assets/images/bg-1622x1080.jpg"
         ); ">

    <div class="container">
        <div class="row ">
			<?php
			$cat_id   = 65;
			$cat      = get_the_category( $cat_id );
			$cat_name = get_the_category_by_ID( $cat_id );
			$cat_desc = category_description( $cat_id );
			echo "<div class=\" text-center col-lg-12 padding-top-30\"> <h2 class=\"display-3\"> $cat_name </h2>
             <p class=\"lead\"> $cat_desc  </p></div> ";
			?>
        </div>
        <div class="testimoni-content margin-top2">
            <div class="testimony-item row margin-bottom2">
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <img class="rounded-circle user-pict" src="<?php echo get_bloginfo( 'template_directory' ) ?>/assets/images/face1.jpg"
                         media-simple="true">
                </div>
                <div class="col-lg-6">
                    <blockquote class="blockquote">
                        <p class="mb-0">Minggu lalu kami sekeluarga rental avanza matic buat liburan sekeluarga,
                            benar-benar memuaskan mobilnya juga bagus dan bersih wangi serta terawat
                            Recommended banget deh ...next time kalau ke Bali lagi, saya mau pakai jasa rental ini lagi.</p>
                        <footer class="blockquote-footer">Jessi
                            <cite title="Source Title">Australian</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="testimony-item row margin-bottom2">
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <img class="rounded-circle user-pict" src="<?php echo get_bloginfo( 'template_directory' ) ?>/assets/images/face3.jpg"
                         media-simple="true">
                </div>
                <div class="col-lg-6">
                    <blockquote class="blockquote">
                        <p class="mb-0">kemarin tanggal 10 - 14 Agustus 2017, saya dan teman - teman berlibur ke Bali
                            puassss banget...
                            Dapet mobil (elf) yang nyaman, Supir yang ramah dan bisa memberikan info seputar tempat wisata yang cukup bagus dan terbaru di Bali
                            Jika ke Bali dan ingin sewa mobil hubungi website ini saja . VERY VERY RECOMENDED!!!!!!</p>
                        <footer class="blockquote-footer">Juliet
                            <cite title="Source Title">Traveller</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!--end testimony-->
<?php get_footer() ?>