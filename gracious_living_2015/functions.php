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

// Add Events to RSS Feed
function add_events_to_rss_feed( $args ) {
  if ( isset( $args['feed'] ) && !isset( $args['post_type'] ) )
    $args['post_type'] = array('post', 'tribe_events');
  return $args;
}
 
add_filter( 'request', 'add_events_to_rss_feed' );


// Add Tribe Event Namespace
add_action( 'rss2_ns', 'events_rss2_namespace' );
 
function events_rss2_namespace() {
    echo 'xmlns:ev="http://purl.org/rss/2.0/modules/event/"'."\n";
}
 
// Add Event Dates to RSS Feed
add_action('rss_item','tribe_rss_feed_add_eventdate');
add_action('rss2_item','tribe_rss_feed_add_eventdate');
add_action('commentsrss2_item','tribe_rss_feed_add_eventdate');
 
function tribe_rss_feed_add_eventdate() {
  if ( ! tribe_is_event() ) return;
  ?>
  <ev:tribe_event_meta xmlns:ev="Event">
  <?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>
 
    <ev:startdate><?php echo tribe_get_start_date(); ?></ev:startdate>
    <ev:enddate><?php echo tribe_get_end_date(); ?></ev:enddate>
 
  <?php } else { ?>
 
    <ev:startdate><?php echo tribe_get_start_date(); ?></ev:startdate>
 
  <?php } ?>
  </ev:tribe_event_meta>
 
<?php }

// Tell The Events Calendar not to interfere with the RSS post order when events are included.
add_action( 'pre_get_posts', 'custom_teardown_tribe_order_filter', 60 );
 
function custom_teardown_tribe_order_filter() {
 if ( is_feed() ) remove_filter( 'posts_orderby', array( 'Tribe__Events__Query', 'posts_orderby' ), 10, 2 );
}

//set a short excerpt length
function custom_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



