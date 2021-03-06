<?php

// =============================================================================
// VIEWS/GLOBAL/_SLIDER-BELOW.PHP
// -----------------------------------------------------------------------------
// Slider output below the header.
// =============================================================================

if ( X_REVOLUTION_SLIDER_IS_ACTIVE ) :

  GLOBAL $post;

  if ( is_home() ) {
    $id = get_option( 'page_for_posts' );
  } elseif ( x_is_shop() ) {
    $id = woocommerce_get_page_id( 'shop' );
  } else {
    $id = $post->ID;
  }

  $slider_active = get_post_meta( $id, '_x_slider_below', true );
  $slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;

  if ( $slider != 'Deactivated' ) :

    $bg_video           = get_post_meta( $id, '_x_slider_below_bg_video', true );
    $bg_video_poster    = get_post_meta( $id, '_x_slider_below_bg_video_poster', true );
    $anchor             = get_post_meta( $id, '_x_slider_below_scroll_bottom_anchor_enable', true );
    $anchor_alignment   = get_post_meta( $id, '_x_slider_below_scroll_bottom_anchor_alignment', true );
    $anchor_color       = get_post_meta( $id, '_x_slider_below_scroll_bottom_anchor_color', true );
    $anchor_color_hover = get_post_meta( $id, '_x_slider_below_scroll_bottom_anchor_color_hover', true );

    ?>

    <div class="x-slider-container below<?php if ( $bg_video != '' ) { echo ' bg-video'; } ?>">

      <?php if ( $anchor == 'on' ) : ?>

        <style scoped>
          .x-slider-scroll-bottom.below       { color: <?php echo $anchor_color; ?>;       }
          .x-slider-scroll-bottom.below:hover { color: <?php echo $anchor_color_hover; ?>; }
        </style>

        <a href="#" class="x-slider-scroll-bottom below <?php echo $anchor_alignment; ?>">
          <i class="x-icon-angle-down" data-x-icon="&#xf107;"></i>
        </a>

      <?php endif; ?>

      <?php putRevSlider( $slider ); ?>

    </div>

    <?php if ( $bg_video != '' ) : ?>

      <script>
        jQuery(function() {
          var BV = new jQuery.BigVideo(); BV.init();
          if ( Modernizr && Modernizr.touchevents ) {
            BV.show('<?php echo $bg_video_poster; ?>');
          } else {
            BV.show('<?php echo $bg_video; ?>', { ambient : true });
          }
        });
      </script>

    <?php endif; ?>

  <?php endif;

endif;