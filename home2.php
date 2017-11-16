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
    <section class="header3 cid-qsmmNpqQy6 mbr-parallax-background"
             id="header3-4" data-rv-view="172">
        <div class="mbr-overlay"
             style="opacity: 0.2; background-color: rgb(0, 0, 0);">
        </div>
        <div class="container">
            <div class="media-container-row">
				<?php
				$page_id   = 420;
				$page_data = get_post( $page_id, OBJECT, 'raw' );
				// Get content parts -> Fetch post content
				$content_parts
					       = get_extended( $page_data->post_content )['main'];
				$thumbnail = get_the_post_thumbnail( $page_id, 'banner-thumb' );
				echo "<div class=\"mbr-figure\" style=\"width: 100%;\">  $thumbnail </div>";
				// echo ' <div class="mbr-figure" style="width: 100%;">' . $thumbnail . '</div>';
				echo "<div class=\"media-content\">
                    <h1 class=\"mbr-section-title mbr-white pb-3 mbr-fonts-style display-1\"> 
                        $page_data->post_title 
                    </h1> 
                    <div class=\"mbr-section-text mbr-white pb-3 \">
                        <p class=\"mbr-text mbr-fonts-style display-5\">
                             $content_parts
                         </p>
                    </div>
                  ";

				echo '<div class="mbr-section-btn"><a class="btn btn-md btn-secondary display-4 brand-background" href="'
				     . get_permalink( 420 ) . '">READ MORE</a>' .
				     ' <a class="btn btn-md btn-white-outline display-4" href="https://api.whatsapp.com/send?phone=6281933116787&text=rentcarindo">Chat via WA</a>
                </div>';

				edit_post_link( 'EDIT DISINI', '', '', $page_id, 'button' );
				?>

            </div>

        </div>
        </div>

    </section>
    <!-- end banner-->
    <!-- daftar mobil-->
    <section class="features16 cid-qsmnPGpZd7" id="features16-5"
             data-rv-view="175">
        <div class="container align-center">
			<?php
			$cat_id   = 59;
			$cat      = get_the_category( $cat_id );
			$cat_name = get_the_category_by_ID( $cat_id );
			$cat_desc = category_description( $cat_id );
			echo " <h2 class=\"pb-3 mbr-fonts-style mbr-section-title display-2\"> $cat_name </h2>
             <h3 class=\"pb-5 mbr-section-subtitle mbr-fonts-style mbr-light display-5\"> $cat_desc  </h3> ";
			?>

            <div class="row media-row">
				<?php
				query_posts( 'cat=59' );
				if ( have_posts() ) {
					//$thumb_product = the_post_thumbnail('product-thumb',array());
					while ( have_posts() ) {
						the_post();
						echo "<div class=\"team-item col-lg-3 col-md-6\">
<div class=\"item-image\"> ";
						echo '<a href=" ' . get_permalink() . ' ">';

						if ( has_post_thumbnail() ) {

							the_post_thumbnail( 'home-thumb', array(
								'class'        => 'img-responsive',
								'alt'          => get_the_title(),
								'media-simple' => 'true'
							) );
						} else {
							echo "tolong kasih thumbnail nya ya";
						}
						echo ' </a></div> 
  <div class="item-caption py-3"> 
  <div class="item-name px-2"> <h3 class="mbr-fonts-style display-5">';
						echo get_the_title();
						echo ' </h3> </div> 
 <div class="item-role px-2"> <p>';
						global $more;
						$more_backup = $more;
						$more = 0;
						echo the_content('');
						$more = $more_backup;
						echo '</p><a
                            class="nav-link link text-white display-4 btn-secondary"
                            href="https://api.whatsapp.com/send?phone=6281933116787&text=rentcarindo"><span
                                class="socicon socicon-whatsapp mbr-iconfont mbr-iconfont-btn"></span>&nbsp;Chat WhatsApp</a></div>';
						edit_post_link( 'EDIT DISINI', '', '', $page_id, 'button' );
						echo '</div></div> ';

					}

				} else {
					echo "dont have post";
				}

				wp_reset_postdata();
				?>
            </div>
        </div>
    </section>
    <!--end daftar mobil-->
<!-- Testimony -->
    <section class="testimonials4 cid-qsmoE76fHP mbr-parallax-background" id="testimonials4-8" data-rv-view="187">
        <div class="container">
            <h2 class="pb-3 mbr-fonts-style mbr-white align-center display-2">
                TESTIMONI DARI PENGGUNA JASA RENTARINDO
            </h2>
            <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                terimakasih kepada pelanggan rentcarindo bali yang telah menggunakan mobil kami untuk di sewa selama di bali
            </h3>
            <div class="col-md-10 testimonials-container">



                <div class="testimonials-item">
                    <div class="user row">
                        <div class="col-lg-3 col-md-4">
                            <div class="user_image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/face3.jpg" media-simple="true">
                            </div>
                        </div>
                        <div class="testimonials-caption col-lg-9 col-md-8">
                            <div class="user_text ">
                                <p class="mbr-fonts-style align-left display-7">
                                    <em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae nostrum, quos voluptas fugiat blanditiis, temporibus expedita cumque doloribus ea, officiis consequuntur repellat minus ad veritatis? Facere similique accusamus, accusantium sunt!"</em>
                                </p>
                            </div>
                            <div class="user_name mbr-bold mbr-fonts-style align-left pt-3 display-7">
                                Helen
                            </div>
                            <div class="user_desk mbr-light mbr-fonts-style align-left pt-2 display-7">
                                DESIGNER
                            </div>
                        </div>
                    </div>
                </div><div class="testimonials-item">
                    <div class="user row">
                        <div class="col-lg-3 col-md-4">
                            <div class="user_image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/face1.jpg" media-simple="true">
                            </div>
                        </div>
                        <div class="testimonials-caption col-lg-9 col-md-8">
                            <div class="user_text">
                                <p class="mbr-fonts-style align-left display-7">
                                    <em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae nostrum, quos voluptas fugiat blanditiis, temporibus expedita cumque doloribus ea, officiis consequuntur repellat minus ad veritatis? Facere similique accusamus, accusantium sunt!"</em>
                                </p>
                            </div>
                            <div class="user_name mbr-bold mbr-fonts-style align-left pt-3 display-7">
                                Linda
                            </div>
                            <div class="user_desk mbr-light mbr-fonts-style align-left pt-2 display-7">
                                DEVELOPER
                            </div>
                        </div>
                    </div>
                </div></div>
        </div>
    </section>
<!--end testimony-->
<!--sosmed-->
    <section class="cid-qsmqmzN1Wp" id="social-buttons2-c" data-rv-view="195">

        <div class="container">
            <div class="media-container-row">
                <div class="col-md-8 align-center">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        SHARE IS CARE</h2>
                    <div class="social-list pl-0 mb-0">
                        <a href="https://twitter.com/rentcarindo" target="_blank">
                            <span class="px-2 socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                        <a href="https://www.facebook.com/rentcarindo/" target="_blank">
                            <span class="px-2 socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                        <a href="https://www.instagram.com/rentcarindo/" target="_blank">
                            <span class="px-2 socicon-instagram socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>

                        <a href="https://plus.google.com/u/4/114050671284157866928" target="_blank">
                            <span class="px-2 socicon-googleplus socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
<!--end sosmed-->
<!--start blog-->
    <section class="features18 popup-btn-cards cid-qsmojUMMsy" id="features18-7" data-rv-view="198">
        <div class="container">
	        <?php
	        $cat_id   = 60;
	        $cat      = get_the_category( $cat_id );
	        $cat_name = get_the_category_by_ID( $cat_id );
	        $cat_desc = category_description( $cat_id );
	        echo " <h2 class=\"mbr-section-title pb-3 align-center mbr-fonts-style display-2\"> $cat_name </h2>
              <h3 class=\"mbr-section-subtitle display-5 align-center mbr-fonts-style mbr-light\"> $cat_desc  </h3> ";
	        ?>
            <div class="media-container-row pt-5">
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper ">
                        <div class="card-img">
                            <div class="mbr-overlay"></div>
                            <div class="mbr-section-btn text-center">
                                <a href="https://mobirise.com" class="btn btn-primary display-4">
                                    Learn More
                                </a>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/010.jpg" alt="Mobirise" media-simple="true">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                No Coding
                            </h4>
                            <p class="mbr-text mbr-fonts-style align-left display-7">
                                Mobirise is an easy website builder - just drop site elements to your page, add content and style it to look the way you like.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <div class="mbr-overlay"></div>
                            <div class="mbr-section-btn text-center">
                                <a href="https://mobirise.com" class="btn btn-primary display-4">
                                    Learn More
                                </a>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/02.jpg" alt="Mobirise" media-simple="true">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                Mobile Friendly
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                All sites you make with Mobirise are mobile-friendly. You don't have to create a special mobile version of your site.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <div class="mbr-overlay"></div>
                            <div class="mbr-section-btn text-center">
                                <a href="https://mobirise.com" class="btn btn-primary display-4">
                                    Learn More
                                </a>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/03.jpg" alt="Mobirise" media-simple="true">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                Unique Styles
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Mobirise offers many site blocks in several themes, and though these blocks are pre-made, they are flexible.
                            </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
<!--end blog-->
<?php get_footer() ?>