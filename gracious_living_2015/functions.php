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

// Add category body class
function add_category_to_single($classes) {
  if (is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = $category->category_nicename;
    }
  }
  // return the $classes array
  return $classes;
}

add_filter('body_class','add_category_to_single');

//filter categories on blog index 
function blog_index_categories( $query ) {
 if ( $query->is_home() && $query->is_main_query() ) {
 $query->set( 'cat', '798, 435, 812, 795, 457, 439, 845');
 }
}
add_action( 'pre_get_posts', 'blog_index_categories' );


//set a short excerpt length
function custom_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



