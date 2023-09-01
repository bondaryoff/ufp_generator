<?php
/**
 * ufp_generator functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ufp_generator
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ufp_generator_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ufp_generator, use a find and replace
	 * to change 'ufp_generator' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('ufp_generator', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	add_image_size('about-img', 570, 780, true);
	add_image_size('project-thumbnails', 370, 425, true);
	add_image_size('project-img', 570, 665, true);
	add_image_size('partner-logo', 370, 0, true);
	// add_image_size('promo-img', 700, 775, true);
	// add_image_size('prod-galary', 340, 250, true);
	// add_image_size('objects-img', 700, 340, true);
	// add_image_size('blog', 440, 370, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'ufp_generator'),
			'menu-3' => esc_html__('Footer1', 'ufp_generator'),
			'menu-2' => esc_html__('Footer2', 'ufp_generator'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ufp_generator_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'ufp_generator_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ufp_generator_content_width() {
	$GLOBALS['content_width'] = apply_filters('ufp_generator_content_width', 640);
}
add_action('after_setup_theme', 'ufp_generator_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ufp_generator_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ufp_generator'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ufp_generator'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar 2', 'ufp_generator'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Add widgets here.', 'ufp_generator'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ufp_generator_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ufp_generator_scripts() {
	wp_enqueue_style('ufp_generator-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('ufp_generator-style', 'rtl', 'replace');

	wp_enqueue_script('ufp_generator-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ufp_generator_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add WooCommerce support
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
	add_theme_support('woocommerce');
	// add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}

// Change currency label
add_filter('woocommerce_currency_symbol', 'change_currency_symbol', 10, 2);
function change_currency_symbol($currency_symbol, $currency) {
	switch ($currency) {
	case 'UAH':
		$currency_symbol = ' Грн';
		break;
	}
	return $currency_symbol;
}

// add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// add_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Remove the 'Add to Cart' button from the product listings on the shop page.
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Remove the price from the product listings on the shop page.
// remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


add_action('wp_enqueue_scripts', 'custom_dequeue_woocommerce_styles');
function custom_dequeue_woocommerce_styles() {
	if (function_exists('is_shop') && is_shop()) {
	wp_dequeue_style('woocommerce-general');
	wp_dequeue_style('woocommerce-layout');
	wp_dequeue_style('woocommerce-smallscreen');
	}
}

// add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

	if (function_exists('acf_add_options_page')) {

		acf_add_options_page(
			array(
				'page_title' => 'Налаштування теми',
				'menu_title' => 'Налаштування теми',
				'menu_slug'  => 'theme-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			));
		// acf_add_options_sub_page(
		// 	array(
		// 		'page_title'  => 'Налаштування шапки ',
		// 		'menu_title'  => 'Шапка',
		// 		'menu_slug'   => 'header-settings',
		// 		'parent_slug' => 'theme-settings',
		// 	));

	}
}

// if( function_exists('acf_add_options_page') ) {
// acf_add_options_page(array(
// 	'page_title' => 'Налаштування теми',
// 	'menu_title' => 'Налаштування теми',
// 'menu_slug'     => 'theme-general-settings',
// 'capability'    => 'edit_posts',
// 'redirect'      => false
// ));
// acf_add_options_sub_page(array(
// 'page_title'    => 'Theme Header Settings',
// 'menu_title'    => 'Header',
// 'parent_slug'   => 'theme-general-settings',
// ));
// acf_add_options_sub_page(array(
// 'page_title'    => 'Theme Footer Settings',
// 'menu_title'    => 'Footer',
// 'parent_slug'   => 'theme-general-settings',
// ));
// }

// add_filter( 'wcapf_translation', 'custom_wcapf_translation', 10, 2 );

// function custom_wcapf_translation( $translation, $text_domain ) {
//     if ( $text_domain === 'woocommerce-ajax-filters' ) {
//         $translation['Unselect all'] = 'Очистити фільтр';
//     }
//     return $translation;
// }

// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 40);

// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);

// function my_acf_init() {
// 	acf_update_setting('google_api_key', 'AIzaSyAqn_--LrDNTF6w9Dz5WOLUsyLVIZ6FqOc');
// }
// add_action('acf/init', 'my_acf_init');

add_filter('wpcf7_autop_or_not', '__return_false');

// add_action( 'after_setup_theme', 'jmt_theme_setup' );
// function jmt_theme_setup() {
// add_image_size( 'related-thumb', 340, 250, true );
// }

// add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
// 	return array(
// 			'width' => 340,
// 			'height' => 250,
// 			'crop' => 1,
// 	);
// } );

// Set default sort order for products on shop page to sort by date
// add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_catalog_ordering_args' );
// function custom_catalog_ordering_args( $args ) {
//     $orderby_value = isset( $_GET['orderby'] ) ? $_GET['orderby'] : apply_filters( 'woocommerce_default_catalog_orderby', 'date' );

//     if ( 'date' == $orderby_value ) {
//         $args['orderby'] = 'date';
//         $args['order'] = 'DESC';
//     }

//     return $args;
// }


// Відкриття обгортки
add_action('woocommerce_before_shop_loop_item_title', function(){
  echo '<div class="img-wrapper">';
}, 9); // 9, щоб виконати це перед стандартним кодом

// Закриття обгортки
add_action('woocommerce_before_shop_loop_item_title', function(){
  echo '</div>';
}, 11); // 11, щоб виконати це після стандартного коду



add_action( 'woocommerce_single_product_summary', 'add_custom_text_after_title', 6 );

function add_custom_text_after_title() {
    echo '<div class="single-product__price">(від 20 до 2500 кВт)</div>
		<div class="single-product__info">Вартість та умови доставки уточнюйте у нашого менеджера.</div>
		<div class="single-product__btn"><a href="" class="btn">Замовити</a></div>';
}


// Додаємо новий таб
add_filter( 'woocommerce_product_tabs', 'add_custom_tab' );
function add_custom_tab( $tabs ) {
    $tabs['custom_tab'] = array(
        'title'    => __( 'Характеристики', 'woocommerce' ),
        'priority' => 50,
        'callback' => 'custom_tab_content'
    );
    return $tabs;
}

// Зміст нового табу
function custom_tab_content() {
    echo '<table style="border-collapse: collapse; width: 100%; height: 192px;">
		<tbody>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Модель</td>
		<td style="width: 25%; height: 24px;">СМ-123</td>
		<td style="width: 25%; height: 24px;">СМ-124</td>
		<td style="width: 25%; height: 24px;">СМ-125</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Резервна потужність, кВА (кВт)</td>
		<td style="width: 25%; height: 24px;">165</td>
		<td style="width: 25%; height: 24px;">165</td>
		<td style="width: 25%; height: 24px;">165</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Загальна потужність, кВА (кВт)</td>
		<td style="width: 25%; height: 24px;">120</td>
		<td style="width: 25%; height: 24px;">120</td>
		<td style="width: 25%; height: 24px;">120</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Кількість фаз</td>
		<td style="width: 25%; height: 24px;">3</td>
		<td style="width: 25%; height: 24px;">3</td>
		<td style="width: 25%; height: 24px;">3</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Коефіцієнт потужності</td>
		<td style="width: 25%; height: 24px;">0,8</td>
		<td style="width: 25%; height: 24px;">0,8</td>
		<td style="width: 25%; height: 24px;">0,8</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">(Д х Ш х В), мм</td>
		<td style="width: 25%; height: 24px;">1100 x 3320 x 1600</td>
		<td style="width: 25%; height: 24px;">1100 x 3320 x 1600</td>
		<td style="width: 25%; height: 24px;">1100 x 3320 x 1600</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Вага, кг</td>
		<td style="width: 25%; height: 24px;">1778</td>
		<td style="width: 25%; height: 24px;">1778</td>
		<td style="width: 25%; height: 24px;">1778</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 25%; height: 24px;">Обсяг бака, л</td>
		<td style="width: 25%; height: 24px;">260</td>
		<td style="width: 25%; height: 24px;">260</td>
		<td style="width: 25%; height: 24px;">260</td>
		</tr>
		</tbody>
		</table>
		<strong>Сфера застосування: </strong>
		
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
		
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
		
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
		
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.';
}
