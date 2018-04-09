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
 * Hide admin bar to subscriber
 */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

/**
 * custom login logo
 */
function custom_loginlogo() {
	echo '<style type="text/css">
	h1 a {background-image: url('.get_bloginfo('template_directory').'/images/logo.png)!important; background-size: contain!important; width: 300px!important;}
	</style>';
}
add_action('login_head', 'custom_loginlogo');

/**
 * register new post type
 */
function create_post_type() {
	//fix single-place.php show "page not found"
	flush_rewrite_rules( false );

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

	register_taxonomy(
		'place-category',
		'place',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => 'place-category' ),
			'hierarchical' => true,
		)
	);
}
add_action('init', 'create_post_type');

/**
 * search by place-category
 */
function search_by_place_category($wp_query){
	if (is_search()) {
		$post_type = get_query_var('post_type');
		$place_category = isset($_GET['place_category']) ? $_GET['place_category'] : "";
		if($post_type !== "place" || $place_category==null)
			return $wp_query;

		$search_word = get_query_var('s');
    $wp_query->set('post_type', array($post_type));
    $wp_query->set(
			'tax_query', array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'place-category',
					'field' => 'slug',
					'terms' => array( $place_category )
				)
			)
		);
	}
	return $wp_query;
}
add_filter('pre_get_posts', 'search_by_place_category');

/**
 * Get all place category
 */
function get_place_categories($limit=8) {
	$terms = get_terms(array(
		'taxonomy' => 'place-category',
		'hide_empty' => false,
		'number' => $limit,
		'orderby' => 'count',
		'count' => true,
	));

	return $terms;
}

/**
 * Get all user
 */
function get_top_users() {
	$users = get_users(array(
	  'orderby'      => 'meta_value_num',
	  'order'        => 'DESC',
		'role'         => 'subscriber',
	  'number'       => '10',
	));

	return $users;
}

/**
 * Get
 */
function get_user_avatar($ID){
	$text = get_wp_user_avatar($ID);
	$pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/';
	preg_match($pattern, $text, $link);
	$link = $link[1];
	$link = urldecode($link);
	return $link;
}

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
	wp_enqueue_style( 'ekko-lightbox-style', get_theme_file_uri("/css/ekko-lightbox/ekko-lightbox.css") );
	wp_enqueue_style( 'fontawesome-style', get_theme_file_uri("/css/fontawesome-5.0.9/css/fontawesome-all.min.css") );
	wp_enqueue_style( 'beachvn-style', get_stylesheet_uri() );
	wp_enqueue_style( 'home-page-style', get_theme_file_uri("/css/main.css") );

	wp_enqueue_script( 'popper-script', get_theme_file_uri( '/js/popper-1.12.9.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap-script', get_theme_file_uri( '/js/bootstrap/bootstrap.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap-slider-script', get_theme_file_uri( '/js/bootstrap-slider/bootstrap-slider.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'ekko-lightbox-script', get_theme_file_uri( '/js/ekko-lightbox/ekko-lightbox.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'global-script', get_theme_file_uri( '/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_localize_script( 'global-script', 'post', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}
add_action( 'wp_enqueue_scripts', 'beachvn_scripts' );

/**
 * AJAX Function delete comment
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
 * AJAX Function review place
 */
add_action( 'wp_ajax_nopriv_new_review_place', 'new_review_place' );
add_action( 'wp_ajax_new_review_place', 'new_review_place' );
function new_review_place() {
	$author = wp_get_current_user();

	//delete if exist
	$comments=get_comments(array(
		'post_id' => $_POST['comment_post_ID'],
		'author_email' => $author->user_email,
	));
	foreach ($comments as $comment) {
		if (strpos($comment->comment_content, 'review:')===0){
			wp_delete_comment( $comment->comment_ID );
		}
	}

	$data = array(
		'comment_post_ID' => $_POST['comment_post_ID'],
    'comment_author' => $author->display_name,
    'comment_author_email' => $author->user_email,
    'comment_author_url' => $author->user_url,
    'comment_content' => $_POST['comment_content'],
    'comment_type' => '',
    'comment_parent' => 0,
    'user_id' => 1,
    'comment_author_IP' => '127.0.0.1',
    'comment_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
    'comment_date' => current_time('mysql'),
    'comment_approved' => 1,
	);
	wp_insert_comment($data);

	echo true;

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

/**
 * get review info
 */
function beachvn_get_review($post_id){
	$comments=get_comments(array(
		'post_id' => $post_id
	));

	$review = array(
		"space"	=> array(
											'name'	=> "Không gian",
											'point' => 10
										),
		"location"	=> array(
											'name'	=> "Vị trí",
											'point' => 10
										),
		"price"			=> array(
											'name'	=> "Giá cả",
											'point' => 10
										),
		"quality"		=> array(
											'name'	=> "Chất lượng",
											'point' => 10
										),
		"summary"		=> array(
											'name'	=> "Tổng",
											"comment_value"	=> 1,
											"comment_text"	=> "Rất tốt",
											"point" => 10,
											"comment_count" => 0,
											"great" => 0,
											"good" => 0,
											"average" => 0,
											"bad" => 0,
										)
	);

	$spaces = array();
	$locations = array();
	$prices = array();
	$qualitys = array();

	foreach ($comments as $comment) {
		if (strpos($comment->comment_content, 'review:')===0){
			$json=substr($comment->comment_content, 8);
			$data = json_decode($json);
			array_push($spaces, intval($data->pointSpace));
			array_push($locations, intval($data->pointLocation));
			array_push($prices, intval($data->pointPrice));
			array_push($qualitys, intval($data->pointQuality));

			$sum_temp = ($data->pointSpace + $data->pointLocation + $data->pointPrice + $data->pointQuality)/4;
			$sum_temp = round($sum_temp);
			if ($sum_temp >= 9) {
				$review['summary']['great']++;
			} elseif ($sum_temp >= 8) {
				$review['summary']['good']++;
			} elseif ($sum_temp >= 5) {
				$review['summary']['average']++;
			} else {
				$review['summary']['bad']++;
			}
		}
	}

	if (count($locations) > 0) {
		$review['space']['point'] = array_sum($spaces)/count($spaces);
		$review['location']['point'] = array_sum($locations)/count($locations);
		$review['price']['point'] = array_sum($prices)/count($prices);
		$review['quality']['point'] = array_sum($qualitys)/count($qualitys);

		//summary
		$review['summary']['comment_count'] = count($comments) - count($locations);
		$review['summary']['point'] = ($review['space']['point'] + $review['location']['point'] + $review['price']['point'] + $review['quality']['point'])/4;
		$review['summary']['point'] = round($review['summary']['point'], 1);

		if ($review['summary']['point'] >= 9) {
			$review['summary']['comment_value'] = 1;
			$review['summary']['comment_text'] = "Tuyệt vời";
		} elseif ($review['summary']['point'] >= 8) {
			$review['summary']['comment_value'] = 2;
			$review['summary']['comment_text'] = "Khá tốt";
		} elseif ($review['summary']['point'] >= 5) {
			$review['summary']['comment_value'] = 3;
			$review['summary']['comment_text'] = "Trung bình";
		} else {
			$review['summary']['comment_value'] = 4;
			$review['summary']['comment_text'] = "Kém";
		}
	}

	return $review;
}
