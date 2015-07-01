// Entry Meta
// =============================================================================

if ( ! function_exists( 'x_ethos_entry_meta' ) ) :
  function x_ethos_entry_meta() {

    //
    // Author.
    //

    $author = sprintf( ' %1$s %2$s</span>',
      __( 'by', '__x__' ),
      get_the_author()
    );


    //
    // Date.
    //

    $date = sprintf( '<span><time class="entry-date" datetime="%1$s">%2$s</time></span>',
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() )
    );


    //
    // Categories.
    //

    if ( get_post_type() == 'x-portfolio' ) {
      if ( has_term( '', 'portfolio-category', NULL ) ) {
        $categories        = get_the_terms( get_the_ID(), 'portfolio-category' );
        $separator         = ', ';
        $categories_output = '';
        foreach ( $categories as $category ) {
          $categories_output .= '<a href="'
                              . get_term_link( $category->slug, 'portfolio-category' )
                              . '" title="'
                              . esc_attr( sprintf( __( "View all posts in: &ldquo;%s&rdquo;", '__x__' ), $category->name ) )
                              . '"> '
                              . $category->name
                              . '</a>'
                              . $separator;
        }

        $categories_list = sprintf( '<span>%1$s %2$s',
          __( 'In', '__x__' ),
          trim( $categories_output, $separator )
        );
      } else {
        $categories_list = '';
      }
    } else {
      $categories        = get_the_category();
      $separator         = ', ';
      $categories_output = '';
      foreach ( $categories as $category ) {
        $categories_output .= '<a href="'
                            . get_category_link( $category->term_id )
                            . '" title="'
                            . esc_attr( sprintf( __( "View all posts in: &ldquo;%s&rdquo;", '__x__' ), $category->name ) )
                            . '"> '
                            . $category->name
                            . '</a>'
                            . $separator;
      }

      $categories_list = sprintf( '<span>%1$s %2$s',
        __( 'In', '__x__' ),
        trim( $categories_output, $separator )
      );
    }


    //
    // Comments link.
    //

    if ( comments_open() ) {

      $title  = apply_filters( 'x_entry_meta_comments_title', get_the_title() );
      $link   = apply_filters( 'x_entry_meta_comments_link', get_comments_link() );
      $number = apply_filters( 'x_entry_meta_comments_number', get_comments_number() );

      if ( $number == 0 ) {
        $text = __( 'Leave a Comment' , '__x__' );
      } else if ( $number == 1 ) {
        $text = $number . ' ' . __( 'Comment' , '__x__' );
      } else {
        $text = $number . ' ' . __( 'Comments' , '__x__' );
      }

      $comments = sprintf( '<span><a href="%1$s" title="%2$s" class="meta-comments">%3$s</a></span>',
        esc_url( $link ),
        esc_attr( sprintf( __( 'Leave a comment on: &ldquo;%s&rdquo;', '__x__' ), $title ) ),
        $text
      );

    } else {

      $comments = '';

    }
    
    //
    // Add Edit Link
    //

    $edit_url = sprintf( '<span><a href="%1$s" title="%2$s" class="meta-edit"><i class="x-icon x-icon-pencil"></i> %3$s</a></span>',
        esc_url( get_edit_post_link() ),
        esc_attr( __('Edit this post','__x__') ),
        __('Edit', '__x__')
    );


    //
    // Output.
    //

    if ( x_does_not_need_entry_meta() ) {
      return;
    } else {
      printf( '<p class="p-meta">%1$s%2$s%3$s%4$s</p>',
        $categories_list,
        $author,
        $date,
        $comments,
        $edit_url
      );
    }

  }
endif;