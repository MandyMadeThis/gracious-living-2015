<?php

// =============================================================================
// VIEWS/GLOBAL/_NAVBAR.PHP
// -----------------------------------------------------------------------------
// Outputs the navbar.
// =============================================================================

$navbar_position = x_get_navbar_positioning();
$logo_nav_layout = x_get_logo_navigation_layout();
$is_one_page_nav = x_is_one_page_navigation();

?>

<?php if ( ( $navbar_position == 'static-top' || $navbar_position == 'fixed-top' || $is_one_page_nav ) && $logo_nav_layout == 'stacked' ) : ?>

  <div class="x-logobar">
    <div class="x-logobar-inner">
      <div class="x-container max width">
        <?php x_get_view( 'global', '_brand' ); ?>
      </div>
    </div>
  </div>

  <div class="x-navbar-wrap">
    <div class="<?php x_navbar_class(); ?>">
      <div class="x-navbar-inner">
        <div class="x-container max width">
          <?php x_get_view( 'global', '_nav', 'primary' ); ?>
        </div>
      </div>
      <div class="sign-up-form-wrapper">
        <div class="inner-sign-up-wrapper">
          <h4>Never miss a post</h4>
          <form method="post" id="x-subscribe-form-9512" class="x-subscribe-form x-subscribe-form-9512" data-x-email-confirm="Message" data-x-email-message="Thank you! You are now subscribed and will be updated when I post new content.">
            <input type="hidden" name="x_subscribe_form[id]" value="9512">
            <fieldset>
              <input type="text" name="x_subscribe_form[first-name]" id="x_subscribe_form_first_name" placeholder="First Name" required="">
            </fieldset>
            <fieldset>
              <input type="email" name="x_subscribe_form[email]" id="x_subscribe_form_email" placeholder="Email" required="">
            </fieldset>
            <fieldset>
              <input type="submit" name="x_subscribe_form[submit]" class="submit x-btn x-btn-flat x-btn-square" value="Sign Me Up!">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php else : ?>

  <div class="x-navbar-wrap">
    <div class="<?php x_navbar_class(); ?>">
      <div class="x-navbar-inner">
        <div class="x-container max width">
          <?php x_get_view( 'global', '_brand' ); ?>
          <?php x_get_view( 'global', '_nav', 'primary' ); ?>
        </div>
      </div>
      <div class="sign-up-form-wrapper">
        <div class="inner-sign-up-wrapper">
          <h4>Never miss a post</h4>
          <form method="post" id="x-subscribe-form-9512" class="x-subscribe-form x-subscribe-form-9512" data-x-email-confirm="Message" data-x-email-message="Thank you! You are now subscribed and will be updated when I post new content.">
            <input type="hidden" name="x_subscribe_form[id]" value="9512">
            <fieldset>
              <input type="text" name="x_subscribe_form[first-name]" id="x_subscribe_form_first_name" placeholder="First Name" required="">
            </fieldset>
            <fieldset>
              <input type="email" name="x_subscribe_form[email]" id="x_subscribe_form_email" placeholder="Email" required="">
            </fieldset>
            <fieldset>
              <input type="submit" name="x_subscribe_form[submit]" class="submit x-btn x-btn-flat x-btn-square" value="Sign Me Up!">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>