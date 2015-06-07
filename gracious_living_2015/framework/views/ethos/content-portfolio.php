<?php

// =============================================================================
// VIEWS/ETHOS/CONTENT-PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Portfolio post output for Ethos.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <div class="x-container max width">
      <div class="entry-featured">
        <?php x_portfolio_item_featured_content(); ?>
      </div>

      <?php if ( is_singular() ) : ?>

        <?php x_get_view( 'global', '_content', 'the-content' ); ?>
        <div class="entry-extra">
          <?php x_portfolio_item_tags(); ?>
          <?php x_portfolio_item_project_link(); ?>
          <?php x_portfolio_item_social(); ?>
        </div>

      <?php endif; ?>

    </div>
  </div>
</article>