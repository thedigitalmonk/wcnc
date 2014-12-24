<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wcnc
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<div class="overlay"></div>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div id="site-navigation" class="container menu-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               MENU
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">WCNC.in</a>
        </div>

            <?php 

        	   /**
        		* Displays a navigation menu
        		* @param array $args Arguments
        		*/
        		$args = array(
        			'theme_location' => 'primary',
        			'menu' => '',
        			'container' => 'div',
        			'container_class' => 'navbar-collapse navbar-right navbar-ex1-collapse',
        			'container_id' => '',
        			'menu_class' => 'nav navbar-nav',
        			'menu_id' => '',
        			'echo' => true,
        			'fallback_cb' => 'wp_page_menu',
        			'before' => '',
        			'after' => '',
        			'link_before' => '',
        			'link_after' => '',
        			'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
        			'depth' => 0,
        			'walker' => ''
        		);
        	
        		wp_nav_menu( $args );

            ?>
    </div>
    <!-- /.container -->
</nav>

	<div id="content" class="site-content container">

        <div class="row">
    
