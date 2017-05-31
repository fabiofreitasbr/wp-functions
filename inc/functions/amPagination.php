<?php

function km_dp_get_the_posts_pagination( $args = array() ) {
	$navigation = '';

	$query = $GLOBALS['wp_query'];
	if ( isset( $args['date_query'] ) && ( $args['date_query'] instanceof WP_Query ) ) {
		$query = $args['date_query'];
	}

	// Don't print empty markup if there's only one page.
	if ( $query->max_num_pages > 1 ) {
		$args = wp_parse_args( $args, array(
				'mid_size'           => 1,
				'prev_text'          => _x( 'Previous', 'previous set of posts' ),
				'next_text'          => _x( 'Next', 'next set of posts' ),
				'screen_reader_text' => __( 'Posts navigation' ),

				// Date pagination arguments
				'date_format'        => '',
				'date_query'         => '',
			) );

		// Make sure we get a string back. Plain is the next best thing.
		if ( isset( $args['type'] ) && 'array' == $args['type'] ) {
			$args['type'] = 'plain';
		}

		// Set up paginated links.
		$links = km_dp_paginate_links( $args );

		if ( $links ) {
			$navigation = _navigation_markup( $links, 'pagination', $args['screen_reader_text'] );
		}
	}

	return $navigation;
}

function km_dp_the_posts_pagination( $args = array() ) {
	echo km_dp_get_the_posts_pagination( $args );
}

function km_dp_paginate_links( $args = array() ) {
	global $wp_query, $wp_rewrite;

	// Setting up default values based on the current URL.
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$url_parts    = explode( '?', $pagenum_link );

	$query = $wp_query;
	if ( isset( $args['date_query'] ) && ( $args['date_query'] instanceof WP_Query ) ) {
		$query = $args['date_query'];
	}

	// Get max pages and current page out of the current query, if available.
	$total   = isset( $query->max_num_pages ) ? $query->max_num_pages : 1;
	$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

	// Append the format placeholder to the base URL.
	$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

	// URL base depends on permalink settings.
	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	$defaults = array(
		'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
		'format'             => $format, // ?page=%#% : %#% is replaced by the page number
		'total'              => $total,
		'current'            => $current,
		'show_all'           => false,
		'prev_next'          => true,
		'prev_text'          => __( '&laquo; Previous' ),
		'next_text'          => __( 'Next &raquo;' ),
		'end_size'           => 1,
		'mid_size'           => 2,
		'type'               => 'plain',
		'add_args'           => array(), // array of query args to add
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => '',

		// Date pagination arguments
		'date_format'        => '',
		'date_query'         => '',

	);

	$args = wp_parse_args( $args, $defaults );

	if ( ! is_array( $args['add_args'] ) ) {
		$args['add_args'] = array();
	}

	// Merge additional query vars found in the original URL into 'add_args' array.
	if ( isset( $url_parts[1] ) ) {
		// Find the format argument.
		$format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
		$format_query = isset( $format[1] ) ? $format[1] : '';
		wp_parse_str( $format_query, $format_args );

		// Find the query args of the requested URL.
		wp_parse_str( $url_parts[1], $url_query_args );

		// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
		foreach ( $format_args as $format_arg => $format_arg_value ) {
			unset( $url_query_args[ $format_arg ] );
		}

		$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
	}

	// Who knows what else people pass in $args
	$total = (int) $args['total'];
	if ( $total < 2 ) {
		return;
	}
	$current  = (int) $args['current'];
	$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
	if ( $end_size < 1 ) {
		$end_size = 1;
	}
	$mid_size = (int) $args['mid_size'];
	if ( $mid_size < 0 ) {
		$mid_size = 2;
	}
	$add_args    = $args['add_args'];
	$r           = '';
	$page_links  = array();
	$dots        = false;

	// Date parameters
	$date_format = trim( (string) $args['date_format'] );
	$date_type   = $query->get( 'date_pagination_type' );
	$dates       = $query->get( 'date_pagination_dates' );
	$dates       = is_array( $dates ) ? $dates : array();
	$dates       = ( count( $dates ) === $total ) ? $dates : array();

	$use_dates = false;
	if ( $date_format && !empty( $dates ) && km_dp_date_pagination_is_valid_type( $date_type ) ) {
		$use_dates = true;
	}

	if ( $args['prev_next'] && $current && 1 < $current ) {
		$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
		$link = str_replace( '%#%', $current - 1, $link );
		if ( $add_args ) {
			$link = add_query_arg( $add_args, $link );
		}
		$link .= $args['add_fragment'];

		/**
		 * Filters the paginated links for the given archive pages.
		 *
		 * @since 3.0.0
		 *
		 * @param string  $link The paginated link URL.
		 */
		$page_links[] = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
	}
	for ( $n = 1; $n <= $total; $n++ ) {
		$text = number_format_i18n( $n );
		if ( $use_dates && isset( $dates[ $n - 1 ] ) ) {
			$text = mysql2date( $date_format, $dates[ $n - 1 ] . ' 00:00:00' );
		}

		if ( $n == $current ) {
			$page_links[] = "<span class='page-numbers current'>" . $args['before_page_number'] . $text . $args['after_page_number'] . "</span>";
			$dots = true;
		} else {
			if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) {
				$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
				$link = str_replace( '%#%', $n, $link );
				if ( $add_args ) {
					$link = add_query_arg( $add_args, $link );
				}
				$link .= $args['add_fragment'];

				/** This filter is documented in wp-includes/general-template.php */
				$page_links[] = "<a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . $text . $args['after_page_number'] . "</a>";
				$dots = true;
			} elseif ( $dots && ! $args['show_all'] ) {
				$page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
				$dots = false;
			}
		}
	}
	if ( $args['prev_next'] && $current && $current < $total ) {
		$link = str_replace( '%_%', $args['format'], $args['base'] );
		$link = str_replace( '%#%', $current + 1, $link );
		if ( $add_args ) {
			$link = add_query_arg( $add_args, $link );
		}
		$link .= $args['add_fragment'];

		/** This filter is documented in wp-includes/general-template.php */
		$page_links[] = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
	}
	switch ( $args['type'] ) {
	case 'array' :
		return $page_links;

	case 'list' :
		$r .= "<ul class='page-numbers'>\n\t<li>";
		$r .= join( "</li>\n\t<li>", $page_links );
		$r .= "</li>\n</ul>\n";
		break;

	default :
		$r = join( "\n", $page_links );
		break;
	}
	return $r;
}
