<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage cozymart_revo
 * @since 1.0
 * @version 1.0
 */
?>

<!DOCTYPE html>
<html lang="<?php get_bloginfo( 'language'); ?>">
<head>
    <meta charset="<?php get_bloginfo( 'charset'); ?>">
    <title><?php echo get_bloginfo( 'name'); ?></title>
    <meta name="description" content="<?php echo get_bloginfo( 'description'); ?>">
	<?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!--    <script>-->
<!--        function receiveData( data ) {-->
<!--            // Do something with the data here.-->
<!--            // For demonstration purposes, we'll simply log it.-->
<!--            console.log( data );-->
<!--        }-->
<!--    </script>-->
<!--    <script src="http://localhost/rentcarindo/wp-json/?_jsonp=receiveData"></script>-->
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand text-uppercase" href="<?php echo get_site_url(); ?>">
        <img id="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-rentcarindo-183x140.png" alt="rentcarindo" title="rentcarindo"  class="logo d-inline-block">
	    <h1><?php echo get_bloginfo( 'name'); ?></h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <span class="navbar-text mr-auto"></span>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo get_site_url();?>">Home  </a>
            </li>
	        <?php
	            $menus = wp_get_nav_menu_items('primary');
	        foreach ( $menus as $item ) {
		        $link  = $item->url;
		        $title = $item->title;
		        echo "<li class=\"nav-item\"><a href=\"$link\" class=\"nav-link\"> $title</a></li>";
	        }
	        ?>
            <li class="nav-item">
                <a class="nav-link btn btn-success" href="https://api.whatsapp.com/send?phone=6281933116787&text=rentcarindo"><span class="socicon socicon-whatsapp"></span> Kontak WhatsApp</a>
            </li>
        </ul>
    </div>
</nav>