<?php
/**
 * Movaone functions and definitions
 *
 * @package Movaone
 */

defined( 'ABSPATH' ) || exit;


// define the Image path.
if ( ! defined( 'THEME_IMAGES' ) ) {
	// imagePath.
	define( 'THEME_IMAGES', get_template_directory_uri() . '/assets/images/' );
}

// define Movaone version.
if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$version = wp_get_theme()->get( 'Version' );
	define( 'THEME_VERSION', $version );
}

/**
 * Load theme textdomain for translations.
 */
function movaone_language_setup() {
	load_theme_textdomain( 'movaone', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'movaone_language_setup' );


/**
 * Add css and js.
 */
function movaone_add_script() {
	wp_enqueue_style( 'movaone-style', get_stylesheet_uri(), array(), THEME_VERSION );
	wp_enqueue_style( 'movaone-original', get_template_directory_uri() . '/assets/css/movaone.css', array(), THEME_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'movaone-script', get_template_directory_uri() . '/assets/js/movaone.js', array( 'jquery' ), THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'movaone_add_script' );


/**
 * Register widget area.
 */
function movaone_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'movaone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'movaone' ),
			'before_widget' => '<div class="widget-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Registration of Related Post Widget.
	register_widget( 'movaone_recent_posts' );
}
add_action( 'widgets_init', 'movaone_widgets_init' );


/**
 * Register general theme supports and navigation menus.
 */
function movaone_general_register() {
	// Navigation Menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'movaone' ),
			'footer'  => esc_html__( 'Footer Menu', 'movaone' ),

		)
	);

	// Add Feature image support & automatic feed.
	add_theme_support( 'post-thumbnails' );

	// add support for title tag.
	add_theme_support( 'title-tag' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	add_theme_support( 'appearance-tools' );

	add_theme_support( 'automatic-feed-links' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 60,
			'flex-height' => true,
		)
	);

	// custom background.
	add_theme_support(
		'custom-background',
		array(
			'default-color'      => 'f8f8f7',
			'default-image'      => '',
			'default-repeat'     => 'no-repeat',
			'default-position-x' => 'center',
			'default-attachment' => 'scroll',
			'default-size'       => 'auto',
		)
	);

	// custom header image.
	$args = array(
		'default-image'            => '',
		'default-background-color' => '#1e2a3a',
		'default-text-color'       => '#fefefe',
		'width'                    => '100%',
		'height'                   => 76,
		'flex-width'               => true,
		'flex-height'              => true,
		'description'              => __( 'No image', 'movaone' ),
	);
	add_theme_support( 'custom-header', $args );

	// the post formats.
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

	// The content width.
	if ( ! isset( $content_width ) ) {
		$GLOBALS['content_width'] = 1400;
	}

	// html5 and gallery.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	// Add support for admin styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'movaone_general_register' );

/**
 * Custom logo display.
 */
function movaone_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
	}
}


/**
 * Title tag separator.
 *
 * @param string $separator Separator.
 * @return string
 */
function movaone_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}
add_filter( 'document_title_separator', 'movaone_document_title_separator' );

/**
 * CTA button link.
 *
 * @return string
 */
function movaone_cta_link() {
	$cta_link = get_theme_mod( 'cta_button_link', '#main' );
	if ( ! strstr( $cta_link, 'http' ) || ! strstr( $cta_link, 'https' ) ) {
		$cta_link = home_url( $cta_link );
	} else {
		$cta_link = esc_url( $cta_link );
	}
	return $cta_link;
}

/**
 * Custom excerpt length.
 *
 * @param int $length Excerpt length.
 * @return int
 */
function movaone_excerpt( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 55;
}
add_filter( 'excerpt_length', 'movaone_excerpt' );

// include necessary files.
require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/widget/recent_posts.php';
require get_template_directory() . '/inc/theme-options.php';

/**
 * Register the Left Panel widget area.
 *
 * Until 3.2 the left panel read a page with the slug "aside", and the theme
 * created that page on every request when it was missing. Writing to the
 * database from a theme on every page load broke the WordPress.org theme
 * preview, so the panel is now a regular widget area.
 *
 * @since 3.3
 */
function movaone_register_aside_area() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Left Panel', 'movaone' ),
			'id'            => 'movaone-aside',
			'description'   => esc_html__( 'Shown in the fixed left panel on desktop and at the top of the page on mobile. When empty, the site title and tagline are shown.', 'movaone' ),
			'before_widget' => '<div id="%1$s" class="aside__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="aside__widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'movaone_register_aside_area' );

/**
 * Offer a sample Left Panel on fresh sites.
 *
 * Starter content only appears on a fresh site, in the Customizer preview,
 * and is saved only when the owner publishes it. Nothing is written to the
 * database by the theme itself.
 *
 * @since 3.3
 */
function movaone_starter_content() {
	$intro = sprintf(
		'<h1>%1$s<br><span class="text-cyan">%2$s</span><br>%3$s</h1><p>%4$s</p><p>%5$s</p>',
		esc_html__( 'Smart', 'movaone' ),
		esc_html__( 'WEB', 'movaone' ),
		esc_html__( 'Design', 'movaone' ),
		esc_html__( 'Movaone is a WordPress theme designed to be optimized for display on mobile devices such as smartphones.', 'movaone' ),
		esc_html__( 'This text is a Text widget in the Left Panel widget area. Replace it from Appearance > Widgets.', 'movaone' )
	);

	add_theme_support(
		'starter-content',
		array(
			'widgets' => array(
				'movaone-aside' => array(
					'movaone_intro' => array(
						'text',
						array(
							'title'  => '',
							'text'   => $intro,
							'filter' => true,
							'visual' => true,
						),
					),
				),
			),
		)
	);
}
add_action( 'after_setup_theme', 'movaone_starter_content' );

/**
 * Output the content of the left panel.
 *
 * Shown in this order, so the panel is never empty:
 * 1. the Left Panel widget area
 * 2. the page with the slug "aside", for sites set up before 3.3 (read only)
 * 3. the site title and tagline
 *
 * @since 3.3
 */
function movaone_aside_content() {
	if ( is_active_sidebar( 'movaone-aside' ) ) {
		dynamic_sidebar( 'movaone-aside' );
		return;
	}

	$legacy_page = get_page_by_path( 'aside' );

	if ( $legacy_page instanceof WP_Post && 'publish' === $legacy_page->post_status ) {
		echo wp_kses_post( apply_filters( 'the_content', $legacy_page->post_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return;
	}

	$description = get_bloginfo( 'description', 'display' );
	?>
	<p class="aside__site-title"><?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?></p>
	<?php if ( $description ) : ?>
		<p class="aside__site-description"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>
	<?php
}

