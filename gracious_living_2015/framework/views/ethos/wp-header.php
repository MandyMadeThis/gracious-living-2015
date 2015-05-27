<?php

// =============================================================================
// VIEWS/ETHOS/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Ethos.
// =============================================================================

?>

<?php x_get_view( 'global', '_header' ); ?>

  <?php x_get_view( 'global', '_slider-above' ); ?>

  <header class="<?php x_masthead_class(); ?>" role="banner">
    <?php if ( is_home() || is_page( array( 5197, 10, 9250, 1085, 3092, 'Contact' ) ) ) { x_get_view( 'ethos', '_post', 'carousel' ); } ?>
    <?php x_get_view( 'global', '_topbar' ); ?>
    <?php x_get_view( 'global', '_navbar' ); ?>
    <?php x_get_view( 'ethos', '_breadcrumbs' ); ?>
  </header>

  <?php x_get_view( 'global', '_slider-below' ); ?>
  <?php x_get_view( 'ethos', '_landmark-header' ); ?>