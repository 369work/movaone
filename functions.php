<?php
/**
 * Movaone functions and definitions
 * @package Movaone
*/

defined('ABSPATH') || exit;

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
	while (@ob_end_flush());
});

//define the Image path
if (! defined('THEME_IMAGES')) {
	// imagePath
	define('THEME_IMAGES', get_template_directory_uri() . '/assets/images/');
}

//define Movaone version
if (! defined('THEME_VERSION')) {
	// Replace the version number of the theme on each release.
	$version = wp_get_theme()->get('Version');
	define('THEME_VERSION', $version);
}

function movaone_language_setup()
{
	load_theme_textdomain('movaone', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'movaone_language_setup');


//add css and js
function movaone_add_script()
{
	wp_enqueue_style('movaone-style', get_stylesheet_uri(), array(), THEME_VERSION);
	wp_enqueue_style('movaone-original', get_template_directory_uri() . '/assets/css/movaone.css', array(), THEME_VERSION);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('movaone-script', get_template_directory_uri() . '/assets/js/movaone.js', array('jquery'), THEME_VERSION, true);

}
add_action('wp_enqueue_scripts', 'movaone_add_script');


/**
 * Register widget area.
 */
function movaone_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'movaone'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'movaone'),
		'before_widget' => '<div class="widget-item">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	//Registration of Related Post Widget
	register_widget('movaone_recent_posts');
}
add_action('widgets_init', 'movaone_widgets_init');


function movaone_general_register()
{
	// Navigation Menus
	register_nav_menus(array(
		'primary' => esc_html__('Primary Menu', 'movaone'),
		'footer' => esc_html__('Footer Menu', 'movaone'),

	));

	// Add Feature image support & automatic feed
	add_theme_support('post-thumbnails');

	//add support for title tag
	add_theme_support('title-tag');

	// Add support for full and wide align images.
	add_theme_support('align-wide');
	add_theme_support('appearance-tools');


	add_theme_support('automatic-feed-links');

	// Add support for responsive embeds.
	add_theme_support('responsive-embeds');

	// add support for block styles
	add_theme_support('wp-block-styles');

	//custom logo
	add_theme_support('custom-logo', array(
		'height'      => 60,
		'width'       => 60,
		'flex-height' => true,
	));

	//custom background
	add_theme_support('custom-background', array(
		'default-color'          => '#333',
		'default-image'          =>  THEME_IMAGES .'back-default.webp',
		'default-repeat'         => 'none',
		'default-position-x'     => 'center',
		'default-attachment'     => 'fixed',
		'default-size'           => 'cover',
	));

	//custom header image
	$args = array(
		'default-image' =>  '',
		'default-background-color' => '#333',
		'default-text-color' => '#fefefe',
		'width'         => '100%',
		'height'        => 76,
		'flex-width'         => true,
		'flex-height'        => true,
		'description'	=> __('No image', 'movaone'),
	);
	add_theme_support('custom-header', $args);


	//the post formats
	add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));

	// The content width
	if (! isset($content_width))
		$GLOBALS['content_width'] = 1400;

	//html5 and gallery
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

	// Add support for admin styles
	add_theme_support('editor-styles');
	add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));

}
add_action('after_setup_theme', 'movaone_general_register');

// custom logo display
function movaone_logo() {
	if (has_custom_logo()) {
		the_custom_logo();
	}
}


// title tag separator
function movaone_document_title_separator($separator)
{
	$separator = '|';
	return $separator;
}
add_filter('document_title_separator', 'movaone_document_title_separator');

// CTA button link
function movaone_cta_link() {
	$cta_link = get_theme_mod('cta_button_link', '#main');
	if (!strstr($cta_link, 'http') || !strstr($cta_link, 'https')) {
		$cta_link = home_url($cta_link);
	} else {
		$cta_link = esc_url($cta_link);
	}
	return $cta_link;
}

// custom excerpt length
function movaone_excerpt($length)
{
	if (is_admin()) {
		return $length;
	}
	return 55;
}
add_filter('excerpt_length', 'movaone_excerpt');

///include necessary files
require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/widget/recent_posts.php';
require get_template_directory() . '/inc/theme-options.php';

// create a template
function movaone_create_aside_page() {
	// Check if the page already exists
	$page = get_page_by_path('aside');
	if ($page) {
		return;
	}

		//Page Content
	$page_content =
		<<<HTML
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Smart WEB Design</h1>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"20px","style":{"layout":{"selfStretch":"fixed","flexSize":"20px"}}} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph -->
<p>Movaone is a WordPress theme designed to be optimized for display on mobile devices such as smartphones.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Since the site is displayed on a mobile basis on a PC, pages load quickly, which helps reduce the bounce rate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The left content of the PC page is this page. Please rewrite it freely. The heading can be beautifully decorated by starting with H1.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>On PC, this area will always be displayed on the left.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
HTML;

// Create post object
$aside_page = array(
'post_title' => 'Top page left content (please do not delete)',
'post_name' => 'aside',
'post_content' => $page_content,
'post_status' => 'publish',
'post_type' => 'page',
);

// Insert the post into the database
wp_insert_post($aside_page);
}
add_action('after_setup_theme', 'movaone_create_aside_page');