<?php
/**
 * Displays mobil for front page
 *
 * @package    WordPress
 * @subpackage Rencar bams
 * @since      1.0
 * @version    1.0
 */

?>
<div class="col-lg-3 padding-top-30">
    <div class="card">
        <a href="  <?php the_permalink() ?> ">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'product-thumb', array(
					'class' => 'card-img-top',
					'alt'   => get_the_title(),
				) );
			} else {
				echo "tolong kasih thumbnail nya ya";
			}; ?>
        </a>
        <div class="card-body">
            <h3 class="card-title"><?php the_title() ?></h3>
            <p class="card-text">
				<?php
				global $more;
				$more_backup = $more;
				$more        = 0;
				the_content( '' );
				$more = $more_backup; ?>
            </p>
        </div>
        <div id="footer-product" class="card-footer">
            <div class="input-group">
                <a target="_parent" class="input-group-addon block-hover" href="<?php the_permalink(); ?>">
                    <span class="oi oi-info link-white"></span>
                </a>
                <input type="text" class="form-control wa_car_value" placeholder="Chat WA disini">
                <span class="input-group-addon wa_chat" data-title="<?php the_title(); ?>">
                    <span class="socicon socicon-whatsapp link-white "></span>
                </span>
            </div>
        </div>
    </div>
</div>
<!--edit_post_link( 'EDIT DISINI', '', '', $page_id, 'button' );-->