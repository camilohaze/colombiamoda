<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('quidus_site_favicon') != '' ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('quidus_site_favicon')); ?>" />
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
    <script>
        window.onload = function()
        {
            jQuery('#menu-menu-principal > .current-menu-item > button').click();
            jQuery('#menu-menu-principal > .current-menu-parent > button').click();
        }
    </script>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="logo">
		<img class="logo-img">
	</div>
	<div class="social">
		
	</div>
</header>
<div class="bg-content">
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'quidus' ); ?></a>

		<div class="main-content">
			<div id="sidebar" class="sidebar">
				<?php get_sidebar(); ?>
			</div><!-- .sidebar -->

			<div id="content" class="site-content">
