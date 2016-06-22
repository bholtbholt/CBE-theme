<?php
/**
 * _S functions and definitions
 *
 * @package _S
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'CBE_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function CBE_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _S, use a find and replace
	 * to change 'CBE' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'CBE', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'CBE' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'CBE_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // CBE_setup
add_action( 'after_setup_theme', 'CBE_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function CBE_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'CBE' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'CBE_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function CBE_scripts() {
	wp_enqueue_style( 'CBE-style', get_stylesheet_uri() );

	wp_enqueue_script( 'CBE-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'CBE-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'CBE_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
	* Get all child pages
	*/

function my_get_page_children( $page_id, $orderby, $post_type = 'page' ) {
  // Set up the objects needed
  $custom_wp_query = new WP_Query();
  $all_wp_pages    = $custom_wp_query->query( array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => $orderby, 'order' => 'ASC' ) );

  // Filter through all pages and find specified page's children
  $page_children = get_page_children( $page_id, $all_wp_pages );

  return $page_children;
}

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

// Read more link
function new_excerpt_more( $more ) {
	return '<a class="action" href="'. get_permalink( get_the_ID() ) . '"> <span class="glyphicon glyphicon-chevron-right"></span></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// Check for subpages
function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) )
        return false;            // we're at the page or at a sub page

    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }

    return false;  // we arn't at the page, and the page is not an ancestor
}


// Get Related News
function get_related_author_posts() {
    global $authordata, $post;

    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
    if ($authors_posts) {
	    $output = '<div class="sidebar"><h5>Related News</h5><ul>';
	    foreach ( $authors_posts as $authors_post ) {
	      $output .= '<a href="' . get_permalink( $authors_post->ID ) . '"><li>' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '<span class="glyphicon glyphicon-chevron-right pull-right action"></span></li></a>';
	    }
	    $output .= '</ul></div>';
	    return $output;
	  }
}


// List authors
function CBE_list_authors($args = '') {
	global $wpdb;

	$defaults = array(
		'orderby' => 'name', 'order' => 'ASC', 'number' => '',
		'exclude_admin' => true, 'hide_empty' => true,
		'echo' => true
	);

	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );

	$return = '';

	$query_args = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number' ) );
	$query_args['fields'] = 'ids';
	$authors = get_users( $query_args );

	$author_count = array();
	foreach ( (array) $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author") as $row )
		$author_count[$row->post_author] = $row->count;

	foreach ( $authors as $author_id ) {
		$author = get_userdata( $author_id );

		if ( $exclude_admin && 'admin' == $author->display_name )
			continue;

		$posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;

		if ( !$posts && $hide_empty )
			continue;

		$link = '';
		$name = $author->display_name;
		$link = '<a href="' . get_author_posts_url( $author->ID, $author->user_nicename ) . '" title="' . esc_attr( sprintf(__("Posts by %s"), $author->display_name) ) . '"><li>' . $name . '<span class="glyphicon glyphicon-chevron-right pull-right action"></span></li></a>';

		$return .= $link;
	}

	$return = rtrim($return, ', ');

	if ( !$echo )
		return $return;

	echo $return;
}


// Archive.php only displays posts when showing tags
function CBE_archive_posts( $query ) {
  if( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set('post_type', array('post'));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'CBE_archive_posts' );
