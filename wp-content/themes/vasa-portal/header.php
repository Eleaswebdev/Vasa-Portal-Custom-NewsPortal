<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vasa_Portal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'vasa-portal' ); ?></a>

    <!-- Header Area Start Here -->
    <header>
        <div class="header-main-area">
            <div class="container">
                <div class="header-top-area">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                           <div class="news-date">
                                <div class="calender-icon"><i class="ri-calendar-event-line"></i></div>
                                <div class="calender-date">
                                    <span><?php echo get_bangla_day_date(); ?></span>
                                    <span><?php echo get_bangla_calendar_date(); ?></span>
                                    <span><?php echo get_hijri_date(); ?></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="logo-area text-center">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="<?php bloginfo('name'); ?>">
                                    <?php if (has_custom_logo()) : ?>
                                        <?php the_custom_logo(); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>

                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="header-social-share">
                                <p>ফলো করুনঃ</p>
                                <div class="social-icon-wrapper">
                                    <ul>
                                        <li><a target="_blank" href="https://www.facebook.com/VASAMediaOfficial/" aria-label="Facebook Icon"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li><a target="_blank" href="https://www.youtube.com/channel/UCCGE1nf9TYytDLAvyMUbT5Q" aria-label="Yotutube Icon"><i class="ri-youtube-line"></i></a>
                                        </li>
                                        <li><a href="#" aria-label="Linkdin Icon"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                        <li class="active" aria-label="Twiter Icon"><a target="_blank" href="https://x.com/VASAMedia"><i
                                                    class="ri-twitter-x-line"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <!-- Desktop Menu -->
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-6 d-none d-lg-block">
                        <div class="main-menu">
                            <nav class="mobile-menu-active">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'header',
                                    'menu_class'     => '',
                                    'container'      => false,
                                    'fallback_cb'    => false,
                                    'items_wrap'     => '<ul>%3$s</ul>', // only output <ul> and <li> items, no extra container
                                ) );
                                ?>
                            </nav>
                        </div>
                    </div>

                    <!-- Hamburger Button for Mobile/Tablet -->
                    <div class="col-auto d-block d-lg-none">
                        <button class="menu-hamburger" aria-label="Open menu">
                            <span></span><span></span><span></span>
                        </button>
                    </div>
                 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                    <div class="header-search">
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="search" name="s" placeholder="খুজুন" value="<?php echo get_search_query(); ?>" />
                            <input type="hidden" name="post_type" value="post" />
                            <button type="submit"><i class="ri-search-line"></i></button>
                        </form>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End Here -->

    <!-- Offcanvas Sidebar Start -->
    <div class="offcanvas-menu">
        <div class="offcanvas-backdrop"></div>
        <div class="offcanvas-panel">

            <div class="offcanvas-content-wrapper">
                <div class="offcanvas-custom-header">
                    <div class="offcanvas-logo">
                        <a href="#" aria-label="offcanvas logo">
                            <img src="assets/img/logo/logo.png" alt="Offcanvas Logo">
                        </a>
                    </div>
                    <div class="news-date d-flex">
                        <div class="calender-icon"><i class="ri-calendar-event-line"></i></div>
                        <div class="calender-date">
                            <span>শনিবার ০৫ জুলাই ২০২৫,</span>
                            <span>২১ আষাঢ় ১৪৩২, </span>
                            <span>০৯ মহররম ১৪৪৭</span>
                        </div>
                    </div>
                </div>
            </div>
            <button class="offcanvas-close" aria-label="Close menu">&times;</button>
            <nav class="offca-menu"></nav> <!-- Menu will be cloned here -->
        </div>
    </div>
    <!-- Offcanvas Sidebar Start -->
<!-- Breadcrumb Area Start Here -->
<?php if (!is_front_page())
    custom_breadcrumb(); ?>