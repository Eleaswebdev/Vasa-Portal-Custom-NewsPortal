<?php
/**
 * Vasa Portal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vasa_Portal
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vasa_portal_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Vasa Portal, use a find and replace
		* to change 'vasa-portal' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vasa-portal', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
	array(
		'header'   => esc_html__( 'Main Menu(Header)', 'vasa-portal' ),
		'footer'   => esc_html__( 'Footer Menu', 'vasa-portal' ),
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
			'vasa_portal_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'vasa_portal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vasa_portal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vasa_portal_content_width', 640 );
}
add_action( 'after_setup_theme', 'vasa_portal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vasa_portal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vasa-portal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vasa-portal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vasa_portal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vasa_portal_scripts() {
	wp_enqueue_style( 'vasa-portal-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vasa-portal-style', 'rtl', 'replace' );

    wp_enqueue_style( "bootstrap-css", get_template_directory_uri()."/assets/css/bootstrap.min.css");
	wp_enqueue_style( "swiper-css", get_template_directory_uri()."/assets/css/swiper.min.css");
	wp_enqueue_style( "remixicon-css", get_template_directory_uri()."/assets/css/remixicon.css");
	wp_enqueue_style( "main-css", get_template_directory_uri()."/assets/scss/main.css");
	wp_enqueue_style( "simple-lightbox-css", get_template_directory_uri()."/assets/css/simple-lightbox.min.css");

	wp_enqueue_script( 'vasa-portal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'simple-lightbox-js', get_template_directory_uri() . '/assets/js/simple-lightbox.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/js/vendor/jquery3.7.1.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    // wp_localize_script('main-js', 'ajax_object', [
    //     'ajax_url' => admin_url('admin-ajax.php'),
    //     'nonce'    => wp_create_nonce('ajax_nonce'),
    //     'exclude'  => [],
    // ]);

    wp_enqueue_script(
        'ajax-loadmore',
        get_template_directory_uri() . '/assets/js/ajax.js',
        ['jquery'],
        '1.0',
        true
    );

    wp_localize_script('ajax-loadmore', 'ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('news_nonce'),
    ]);

    if ( is_single() && comments_open() ) {
        wp_enqueue_script( 'custom-comment-loader', get_template_directory_uri() . '/assets/js/load-comments.js', ['jquery'], null, true );
        wp_localize_script( 'custom-comment-loader', 'commentData', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('load_more_comments'),
        ]);
    }
}
add_action( 'wp_enqueue_scripts', 'vasa_portal_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add custom post type: কমিউনিটির কণ্ঠস্বর
function register_community_voice_post_type() {
    $labels = array(
        'name'                  => 'কমিউনিটির কণ্ঠস্বর',
        'singular_name'         => 'কমিউনিটির কণ্ঠস্বর',
        'menu_name'             => 'কমিউনিটির কণ্ঠস্বর',
        'name_admin_bar'        => 'কমিউনিটির কণ্ঠস্বর',
        'add_new'               => 'নতুন যোগ করুন',
        'add_new_item'          => 'নতুন কণ্ঠস্বর যোগ করুন',
        'new_item'              => 'নতুন কণ্ঠস্বর',
        'edit_item'             => 'কণ্ঠস্বর সম্পাদনা করুন',
        'view_item'             => 'কণ্ঠস্বর দেখুন',
        'all_items'             => 'সকল কণ্ঠস্বর',
        'search_items'          => 'অনুসন্ধান কণ্ঠস্বর',
        'not_found'             => 'কোনো কণ্ঠস্বর পাওয়া যায়নি',
        'not_found_in_trash'    => 'ট্র্যাশে কোনো কণ্ঠস্বর নেই',
        'featured_image'        => 'বৈশিষ্ট্যযুক্ত ছবি',
        'set_featured_image'    => 'বৈশিষ্ট্যযুক্ত ছবি নির্ধারণ করুন',
        'remove_featured_image' => 'বৈশিষ্ট্যযুক্ত ছবি সরান',
        'use_featured_image'    => 'বৈশিষ্ট্যযুক্ত ছবি ব্যবহার করুন',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'community-voice'),
        'menu_icon'          => 'dashicons-microphone', // Change icon if needed
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true, // for Gutenberg support
    );

    register_post_type('community_voice', $args);
}
add_action('init', 'register_community_voice_post_type');


function get_bangla_day_date() {
    $bangla_days = ['রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার','শনিবার'];
    $bangla_months = ['জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর'];
    $eng_to_bng_digits = ['0'=>'০','1'=>'১','2'=>'২','3'=>'৩','4'=>'৪','5'=>'৫','6'=>'৬','7'=>'৭','8'=>'৮','9'=>'৯'];

    $day_index = date('w');
    $day_name = $bangla_days[$day_index];
    $day = strtr(date('d'), $eng_to_bng_digits);
    $month = $bangla_months[date('n') - 1];
    $year = strtr(date('Y'), $eng_to_bng_digits);

    return "{$day_name} {$day} {$month} {$year}";
}

function get_bangla_calendar_date() {
    // Approximate calculation (you can enhance this)
    $bangla_months = ["বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ", "পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র"];
    $eng_to_bng_digits = ['0'=>'০','1'=>'১','2'=>'২','3'=>'৩','4'=>'৪','5'=>'৫','6'=>'৬','7'=>'৭','8'=>'৮','9'=>'৯'];

    $timestamp = time();
    $bd_timezone = new DateTimeZone('Asia/Dhaka');
    $date = new DateTime("now", $bd_timezone);
    $month_index = intval($date->format('n')) - 1;

    // Shift calendar by approx. mid-April
    $year = $date->format('Y');
    $b_year = intval($year) - 593;
    if ((int)$date->format('m') < 4 || ((int)$date->format('m') == 4 && (int)$date->format('d') < 14)) {
        $b_year--;
    }

    $b_day = strtr($date->format('d'), $eng_to_bng_digits);
    $b_month = $bangla_months[$month_index % 12];
    $b_year = strtr($b_year, $eng_to_bng_digits);

    return "{$b_day} {$b_month} {$b_year}";
}

function get_hijri_date() {
    // Map English digits to Bangla
    $eng_to_bng_digits = ['0'=>'০','1'=>'১','2'=>'২','3'=>'৩','4'=>'৪','5'=>'৫','6'=>'৬','7'=>'৭','8'=>'৮','9'=>'৯'];

    // Hijri month names in Bangla
    $hijri_months_bn = [
        1 => 'মহররম',
        2 => 'সফর',
        3 => 'রবিউল আউয়াল',
        4 => 'রবিউস সানি',
        5 => 'জমাদিউল আউয়াল',
        6 => 'জমাদিউস সানি',
        7 => 'রজব',
        8 => 'শাবান',
        9 => 'রমজান',
        10 => 'শাওয়াল',
        11 => 'জ্বিলকদ',
        12 => 'জ্বিলহজ'
    ];

    // Create a formatter for Islamic date using PHP Intl
    $formatter = new IntlDateFormatter(
        'en_US@calendar=islamic',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        'Asia/Dhaka',
        IntlDateFormatter::TRADITIONAL,
        'dd-MM-yyyy'
    );

    $hijri_date = $formatter->format(time()); // Example: 09-01-1447
    list($day, $month, $year) = explode('-', $hijri_date);

    // Convert to Bangla
    $day_bn = strtr($day, $eng_to_bng_digits);
    $year_bn = strtr($year, $eng_to_bng_digits);
    $month_bn = $hijri_months_bn[intval($month)];

    return "{$day_bn} {$month_bn} {$year_bn}";
}

// Register Custom Post Type: নন্দনপাঠ
function register_nandonpath_post_type() {
    $labels = array(
        'name'               => 'নন্দনপাঠ',
        'singular_name'      => 'নন্দনপাঠ',
        'menu_name'          => 'নন্দনপাঠ',
        'name_admin_bar'     => 'নন্দনপাঠ',
        'add_new'            => 'নতুন যুক্ত করুন',
        'add_new_item'       => 'নতুন নন্দনপাঠ যুক্ত করুন',
        'new_item'           => 'নতুন নন্দনপাঠ',
        'edit_item'          => 'নন্দনপাঠ সম্পাদনা করুন',
        'view_item'          => 'নন্দনপাঠ দেখুন',
        'all_items'          => 'সকল নন্দনপাঠ',
        'search_items'       => 'নন্দনপাঠ অনুসন্ধান',
        'not_found'          => 'কোনো নন্দনপাঠ পাওয়া যায়নি',
        'not_found_in_trash' => 'ট্র্যাশে কোনো নন্দনপাঠ নেই',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-book',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'nandonpath' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments' ),
    );

    register_post_type( 'nandonpath', $args );
}
add_action( 'init', 'register_nandonpath_post_type' );


// Register Custom Taxonomy: Nondon Part Categories
function register_nondonpart_categories_taxonomy() {
    $labels = array(
        'name'              => 'Nondon Part Categories',
        'singular_name'     => 'Nondon Part Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Nondon Part Categories',
    );

    $args = array(
        'hierarchical'      => true, // behaves like default "category"
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'nondon-part-category' ),
        'show_in_rest'      => true, // Gutenberg support
    );

    register_taxonomy( 'nondonpart_category', array( 'nandonpath' ), $args );
}
add_action( 'init', 'register_nondonpart_categories_taxonomy' );


// custom breadcrumb
function custom_breadcrumb() {
    if (is_front_page()) return;

    echo '<section class="breadcrumb-area">';
    echo '<div class="container">';
    echo '<nav aria-label="breadcrumb">';
    echo '<div class="breadcump-title"><h1>' . wp_get_document_title() . '</h1></div>';
    echo '<ol class="breadcrumb">';

    // Home Link
    echo '<li class="breadcrumb-item"><a href="' . home_url() . '"><i class="ri-home-4-line"></i> প্রচ্ছদ</a></li>';

    // Add separator
    $separator = '<li class="breadcrumb-item"><i class="ri-arrow-right-s-line"></i></li>';

    // Breadcrumb logic
    if (is_single()) {
        $post_type = get_post_type();
        if ($post_type !== 'post') {
            $post_type_obj = get_post_type_object($post_type);
            echo $separator;
            echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link($post_type) . '">' . esc_html($post_type_obj->labels->singular_name) . '</a></li>';
        } else {
            $category = get_the_category();
            if ($category) {
                echo $separator;
                echo '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id) . '">' . esc_html($category[0]->name) . '</a></li>';
            }
        }
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    } elseif (is_page()) {
        global $post;
        if ($post->post_parent) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ($parent_id) {
                $page = get_page($parent_id);
                $parents[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $parents = array_reverse($parents);
            foreach ($parents as $parent) {
                echo $separator . $parent;
            }
        }
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    } elseif (is_category()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . single_cat_title('', false) . '</li>';
    } elseif (is_tag()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . single_tag_title('', false) . '</li>';
    } elseif (is_author()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_author() . '</li>';
    } elseif (is_search()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">Search: ' . get_search_query() . '</li>';
    } elseif (is_post_type_archive()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
    } elseif (is_archive()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_archive_title() . '</li>';
    } elseif (is_404()) {
        echo $separator;
        echo '<li class="breadcrumb-item active" aria-current="page">404 - Page Not Found</li>';
    }

    echo '</ol>';
    echo '</nav>';
    echo '</div>';
    echo '</section>';
}

function convert_date_to_bangla($date) {
    $eng = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $bng = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
            '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

    return str_replace($eng, $bng, $date);
}




// Jatio news load more handler
function handle_load_more_jatio_posts() {
    check_ajax_referer('news_nonce', 'nonce');

    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $exclude = isset($_POST['exclude']) ? array_map('intval', explode(',', sanitize_text_field($_POST['exclude']))) : [];

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 8,
        'paged'          => $paged,
        'category_name'  => 'জাতীয়',
        'post__not_in'   => $exclude,
    ];

    $query = new WP_Query($args);
    $posts_html = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ob_start(); ?>
            <div class="list-news single-news-wrapper d-flex">
                <div class="thumb-img">
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>
                <div class="content-wrapper">
                    <p class="category"><a href="#">জাতীয়</a></p>
                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
            </div>
            <?php
            $posts_html[] = ob_get_clean();
        }
    }

    wp_reset_postdata();

    wp_send_json_success(['posts' => $posts_html]);
}
add_action('wp_ajax_load_more_jatio_posts', 'handle_load_more_jatio_posts');
add_action('wp_ajax_nopriv_load_more_jatio_posts', 'handle_load_more_jatio_posts');


// Load more handler for International news
add_action('wp_ajax_load_more_international', 'load_more_international');
add_action('wp_ajax_nopriv_load_more_international', 'load_more_international');

function load_more_international() {
    check_ajax_referer('news_nonce', 'nonce');

    $paged   = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $exclude = isset($_POST['exclude']) ? array_map('intval', explode(',', $_POST['exclude'])) : [];

    $args = [
        'posts_per_page' => 5,
        'paged'          => $paged,
        'category_name'  => 'আন্তর্জাতিক',
        'post__not_in'   => $exclude,
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        ob_start();
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="big-thumb-wrapper d-flex">
                <div class="international-big-thumb thumb-img">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                </div>
                <div class="big-thumb-news">
                    <div class="info">
                        <div class="news-date">
                            <a href="#"><i class="ri-time-line"></i> <span><?php echo get_the_date('d F Y'); ?></span></a>
                        </div>
                        <div class="admin-info">
                            <a href="#"><i class="ri-user-line"></i> by <span><?php the_author(); ?></span></a>
                        </div>
                    </div>
                    <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <p class="text"><?php the_excerpt(); ?></p>
                    <div class="read-more-btn">
                        <a href="<?php the_permalink(); ?>" class="read-btn"><span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div>
            </div>
        <?php endwhile;
        wp_send_json_success(ob_get_clean());
    else :
        wp_send_json_error('no_more_posts');
    endif;
}


function ajax_loadmore_prokashsutro() {
    check_ajax_referer('news_nonce', 'nonce');

    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $exclude = isset($_POST['exclude']) ? array_map('intval', $_POST['exclude']) : [];

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 12,
        'paged'          => $paged,
        'category_name'  => 'প্রকাশসূত্র',
        'post__not_in'   => $exclude
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="grid-single single-news-wrapper">
                    <div class="grid-thumb thumb-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                    <div class="grid-content">
                        <p class="category"><a href="#">প্রকাশসূত্র</a></p>
                        <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_loadmore_prokashsutro', 'ajax_loadmore_prokashsutro');
add_action('wp_ajax_nopriv_loadmore_prokashsutro', 'ajax_loadmore_prokashsutro');

function vasa_load_more_sports_posts() {
    check_ajax_referer('news_nonce', 'nonce');

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $exclude = isset($_POST['exclude']) ? array_map('intval', $_POST['exclude']) : [];

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $page,
        'category_name'  => 'স্পোর্টস',
        'post__not_in'   => $exclude,
        'post_status'    => 'publish',
    );

    $query = new WP_Query($args);
    $html = '';
    $new_exclude = $exclude;

    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            ob_start(); ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="sport-grid-single">
                    <div class="single-news-wrapper">
                        <div class="news-date">
                            <a href="#"><i class="ri-time-line"></i> <span><?php echo get_the_date(); ?></span></a>
                        </div>
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="thumb-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        </div>
                        <div class="admin-info">
                            <a href="#"><i class="ri-user-line"></i> by <span><?php the_author(); ?></span></a>
                        </div>
                        <div class="text">
                            <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $html .= ob_get_clean();
            $new_exclude[] = get_the_ID();
        endwhile;
        wp_reset_postdata();

        $max_pages = $query->max_num_pages;
        $has_more = $page < $max_pages;

        wp_send_json_success([
            'html'     => $html,
            'exclude'  => $new_exclude,
            'has_more' => $has_more
        ]);
    }

    wp_send_json_error();
}
add_action('wp_ajax_load_more_sports_posts', 'vasa_load_more_sports_posts');
add_action('wp_ajax_nopriv_load_more_sports_posts', 'vasa_load_more_sports_posts');


// Custom comment template
function custom_comment_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $avatar = get_avatar_url( $comment, ['size' => 60] );
    $author = get_comment_author();
    $time = human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) . ' আগে';
    $text = get_comment_text();

    $reply_link = get_comment_reply_link( array_merge( $args, array(
        'reply_text' => '<span>উত্তর দিন</span>',
        'depth'      => $depth,
        'max_depth'  => $args['max_depth']
    ) ) );

    $reply_class = $comment->comment_parent ? 'single-comment-wrapper comment-replay' : 'single-comment-wrapper';
    $user_image_class = $comment->comment_parent ? 'user-image thumb-img' : 'user-image';

    echo '<div class="' . esc_attr( $reply_class ) . '">';
        echo '<div class="' . esc_attr( $user_image_class ) . '">';
            echo '<a href="#">';
                echo '<img src="' . esc_url( $avatar ) . '" alt="' . esc_attr( $author ) . '">';
            echo '</a>';
        echo '</div>';
        echo '<div class="user-comment">';
            echo '<div class="info d-flex">';
                echo '<h4 class="name">' . esc_html( $author ) . '</h4>';
                echo '<p class="duration">' . esc_html( $time ) . '</p>';
            echo '</div>';
            echo '<p class="text">' . esc_html( $text ) . '</p>';
            echo '<div class="read-more-btn">';
                echo $reply_link;
            echo '</div>';
        echo '</div>';
    echo '</div>';

    // Open container for nested replies if needed
    if ( 'div' === $args['style'] && $depth < $args['max_depth'] ) {
        echo '<div class="children">';
    }
}

function end_custom_comment_callback( $comment, $args, $depth ) {
    // Close nested replies container if opened
    if ( 'div' === $args['style'] && $depth < $args['max_depth'] ) {
        echo '</div>'; // close .children
    }
    echo ''; // Close main comment wrapper is already closed in callback above
}


// Load more commeents
add_action('wp_ajax_load_more_comments', 'load_more_comments_callback');
add_action('wp_ajax_nopriv_load_more_comments', 'load_more_comments_callback');

function load_more_comments_callback() {
    check_ajax_referer('load_more_comments', 'nonce');

    $post_id = intval($_POST['post_id']);
    $paged   = intval($_POST['paged']);

    $comments = get_comments([
        'post_id' => $post_id,
        'status'  => 'approve',
        'number'  => 2,
        'paged'   => $paged,
    ]);

    if (empty($comments)) {
        wp_send_json_error();
    }

    ob_start();
    wp_list_comments([
        'style'    => 'div',
        'callback' => 'custom_comment_callback',
    ], $comments);

    wp_send_json_success(ob_get_clean());
}

// Archive load more
add_action('wp_ajax_load_more_archive_posts', 'load_more_archive_posts_callback');
add_action('wp_ajax_nopriv_load_more_archive_posts', 'load_more_archive_posts_callback');

function load_more_archive_posts_callback() {
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $archive_id = isset($_POST['archive_id']) ? intval($_POST['archive_id']) : 0;
    $archive_type = isset($_POST['archive_type']) ? sanitize_text_field($_POST['archive_type']) : 'post';

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 12,
        'paged'          => $paged,
    ];

    // Detect archive type
    if (is_category() || isset($_GET['cat'])) {
        $args['cat'] = $archive_id;
    } elseif (is_tag() || isset($_GET['tag_id'])) {
        $args['tag_id'] = $archive_id;
    } elseif (is_author() || isset($_GET['author'])) {
        $args['author'] = $archive_id;
    } elseif (isset($_GET['year'])) {
        $args['year'] = intval($_GET['year']);
        if (isset($_GET['monthnum'])) {
            $args['monthnum'] = intval($_GET['monthnum']);
        }
        if (isset($_GET['day'])) {
            $args['day'] = intval($_GET['day']);
        }
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="grid-single single-news-wrapper" data-id="<?php the_ID(); ?>">
                    <div class="grid-thumb thumb-img">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    </div>
                    <div class="grid-content">
                        <p class="category"><?php the_category(', '); ?></p>
                        <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;

    wp_reset_postdata();
    wp_die();
}
