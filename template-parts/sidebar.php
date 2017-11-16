<?php
/**
 * Created by PhpStorm.
 * User: BBG
 * Date: 7/24/2017
 * Time: 3:33 PM
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'sidebar-1' ); ?>
