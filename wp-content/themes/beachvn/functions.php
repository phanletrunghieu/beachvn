<?php

function theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('beachvn');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * register new post type
 */
function create_post_type() {
	//fix single-place.php show "page not found"
	flush_rewrite_rules( false );

	register_taxonomy(
		'place-category',
		'place',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => 'place-category' ),
			'hierarchical' => true,
		)
	);

	register_post_type( 'place',
    array(
      'labels' => array(
        'name' => __( 'Places' ),
        'singular_name' => __( 'Place' )
      ),
      'public' => true,
      'has_archive' => true,
			'rewrite' => array('slug' => 'places'),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
    )
  );
}
add_action('init', 'create_post_type');

/**
 * Register custom fonts.
 */
function beachvn_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function beachvn_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'beachvn-fonts', beachvn_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'bootstrap-style', get_theme_file_uri("/css/bootstrap/bootstrap.min.css") );
	wp_enqueue_style( 'bootstrap-slider-style', get_theme_file_uri("/css/bootstrap-slider/bootstrap-slider.min.css") );
	wp_enqueue_style( 'fontawesome-style', get_theme_file_uri("/css/fontawesome-5.0.9/css/fontawesome-all.min.css") );
	wp_enqueue_style( 'beachvn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'popper-script', get_theme_file_uri( '/js/popper-1.12.9.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap-script', get_theme_file_uri( '/js/bootstrap/bootstrap.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap-slider-script', get_theme_file_uri( '/js/bootstrap-slider/bootstrap-slider.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'global-script', get_theme_file_uri( '/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_localize_script( 'global-script', 'post', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}
add_action( 'wp_enqueue_scripts', 'beachvn_scripts' );

/**
 * AJAX Function
 */
add_action( 'wp_ajax_nopriv_delete_comment', 'delete_comment' );
add_action( 'wp_ajax_delete_comment', 'delete_comment' );
function delete_comment() {
	$comment_ID = $_POST['comment_ID'];
	if ($_POST['comment_ID']) {
		$comment = get_comment($comment_ID);
		if($comment->comment_author_email !== wp_get_current_user()->user_email){
			echo false;
			return;
		}

		wp_delete_comment( $comment_ID );
		echo true;
	}
	die();
}

/**
 * return comment_ID when post ajax
 */
function comment_ajax($comment_ID, $comment_status){
	$comment = get_comment($comment_ID);
	echo json_encode($comment);
	exit();
}
add_action('comment_post', 'comment_ajax', 25, 2);

/**
 * register an API key
 */
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAN-NyYOsKJK4bDUi4a-HlKEWAJVEvu1GM');
}
add_action('acf/init', 'my_acf_init');
