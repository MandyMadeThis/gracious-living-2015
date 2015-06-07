<?php
// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================
add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Additional Functions
// =============================================================================

//allow SVGs to be uploaded in media uploader
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

// Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

//Add a signup form under header
function add_custom_content_after_header(){ ?>
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
<?php }

add_action('x_before_view_ethos__landmark-header', 'add_custom_content_after_header');
