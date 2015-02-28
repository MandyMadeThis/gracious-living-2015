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

/* Custom Tiny MCE WYSIWYG */

// READ MORE: http://wesbos.com/custom-wordpress-tinymce-wysiwyg-classes/
function make_mce_awesome( $init ) {
$init['theme_advanced_blockformats'] = 'h1,h2,h3,h4,p,hr';
$init['theme_advanced_disable'] = 'underline,spellchecker,wp_help';
$init['theme_advanced_text_colors'] = '55C3BD,FBED21,7351A1,F26D23,AACC37,F05364,CCC,808080,404040';
$init['theme_advanced_buttons2_add'] = 'styleselect,hr';
$init['theme_advanced_styles'] = "Big Grey Title=bigGreyTitle,Grey Image Border=greyImageBorder";
return $init;
}

add_filter('tiny_mce_before_init', 'make_mce_awesome');