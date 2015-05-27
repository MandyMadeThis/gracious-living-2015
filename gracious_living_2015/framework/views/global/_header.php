<?php

// =============================================================================
// VIEWS/GLOBAL/_HEADER.PHP
// -----------------------------------------------------------------------------
// Declares the DOCTYPE for the site and include the <head>.
// =============================================================================

?>

<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title(''); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php do_action( 'x_before_site_begin' ); ?>

  <div id="top" class="site">

  <?php do_action( 'x_after_site_begin' ); ?>