<?php
/**
 * The main template file to display front page content
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vasa_Portal
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- News Top Wrapper Start Here -->
    <section class="news-main-content-wrapper">
        <div class="container">
            <div class="row">
                <?php
                $news_query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                ]);

                if ($news_query->have_posts()):
                    $i = 0;
                    while ($news_query->have_posts()):
                        $news_query->the_post();
                        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $date = get_the_date('j F Y'); // You can localize this for Bangla if needed
                        $title = get_the_title();
                        $permalink = get_permalink();


                        // Left big thumb
                        if ($i === 0):
                            ?>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="left-news-wrapper">
                                    <div class="big-thumb-news single-news-wrapper">
                                        <div class="thumb-img">
                                            <a href="<?= esc_url($permalink); ?>" aria-label="Big thumb news">
                                                <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="news-date">
                                            <a href="#"><i class="ri-time-line"></i>
                                                <span><?= esc_html(convert_date_to_bangla($date)); ?></span></a>
                                        </div>

                                        <h1 class="news-title"><a href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a>
                                        </h1>
                                    </div>
                                    <?php
                            // Left small list news
                        elseif ($i > 0 && $i <= 2):
                            ?>
                                    <div class="list-news single-news-wrapper">
                                        <div class="thumb-img">
                                            <a href="<?= esc_url($permalink); ?>" aria-label="Small thumb news">
                                                <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="content-wrapper">
                                            <div class="news-date">
                                                <a href="#"><i class="ri-time-line"></i>
                                                    <span><?= esc_html(convert_date_to_bangla($date)); ?></span></a>
                                            </div>
                                            <h3 class="news-title"><a
                                                    href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <?php
                            // Start right column
                        elseif ($i === 3):
                            ?>
                                </div> <!-- .left-news-wrapper -->
                            </div> <!-- .col -->

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="right-news-wrapper">
                                    <div class="right-card-news">
                                        <div class="card-news single-news-wrapper">
                                            <div class="thumb-img">
                                                <a href="<?= esc_url($permalink); ?>" aria-label="Small thumb news">
                                                    <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr($title); ?>">
                                                </a>
                                            </div>
                                            <div class="content-wrapper">
                                                <div class="news-date">
                                                    <a href="#"><i class="ri-time-line"></i>
                                                        <span><?= esc_html(convert_date_to_bangla($date)); ?></span></a>
                                                </div>
                                                <h3 class="news-title"><a
                                                        href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h3>
                                            </div>
                                        </div>
                                        <?php
                            // Right card-news 2
                        elseif ($i === 4):
                            ?>
                                        <div class="card-news single-news-wrapper">
                                            <div class="thumb-img">
                                                <a href="<?= esc_url($permalink); ?>" aria-label="Small thumb news">
                                                    <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr($title); ?>">
                                                </a>
                                            </div>
                                            <div class="content-wrapper">
                                                <div class="news-date">
                                                    <a href="#"><i class="ri-time-line"></i>
                                                        <span><?= esc_html(convert_date_to_bangla($date)); ?></span></a>
                                                </div>
                                                <h3 class="news-title"><a
                                                        href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h3>
                                            </div>
                                        </div>
                                    </div> <!-- .right-card-news -->
                                    <?php
                            // Right big thumb
                        elseif ($i === 5):
                            ?>
                                    <div class="big-thumb-news single-news-wrapper">
                                        <div class="thumb-img">
                                            <a href="<?= esc_url($permalink); ?>" aria-label="Big thumb news">
                                                <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="news-date">
                                            <a href="#"><i class="ri-time-line"></i>
                                                <span><?= esc_html(convert_date_to_bangla($date)); ?></span></a>
                                        </div>
                                        <h1 class="news-title"><a href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a>
                                        </h1>
                                    </div>
                                </div> <!-- .right-news-wrapper -->
                            </div> <!-- .col -->
                            <?php
                        endif;
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- News Top Wrapper End Here -->

    <!-- Nondon Park Section Start Here -->
    <section class="nondon-park-wrapper mt-120 mb-120">
        <div class="main-title-wrapper">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center">
                        <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                                fill="#08090B" />
                        </svg>
                        <h2>নন্দনপাঠ</h2>
                    </div>
                    <div class="read-more-btn">
                        <a href="/নন্দনপাঠ" class="read-btn" aria-label="Read more">
                            <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php
                $nondon_query = new WP_Query([
                    'category_name' => 'নন্দনপাঠ',
                    'posts_per_page' => 4,
                ]);

                if ($nondon_query->have_posts()):
                    $i = 0;
                    while ($nondon_query->have_posts()):
                        $nondon_query->the_post();
                        $title = get_the_title();
                        $link = get_permalink();
                        $thumb = get_the_post_thumbnail_url(null, 'full');
                        $author = get_the_author();
                        ?>

                        <?php if ($i === 0): ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                                <div class="nondon-park-left">
                                    <div class="learge-wrapper nondon-park-item">
                                        <div class="nondon-park-thumb thumb-img">
                                            <a href="<?php echo esc_url($link); ?>">
                                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="nondon-park-content">
                                            <div class="admin-info">
                                                <a href="#"><i class="ri-user-line"></i> by
                                                    <span><?php echo esc_html($author); ?></span></a>
                                            </div>
                                            <h1><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h1>
                                        </div>
                                    </div>

                                <?php elseif ($i === 2): ?>
                                </div> <!-- .nondon-park-left -->
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                                <div class="nondon-park-right">
                                <?php endif; ?>

                                <?php if ($i === 1 || $i === 2): ?>
                                    <div class="small-main-wrap">
                                        <div class="small-wrapper nondon-park-item">
                                            <div class="nondon-park-thumb thumb-img">
                                                <a href="<?php echo esc_url($link); ?>">
                                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                                </a>
                                            </div>
                                            <div class="nondon-park-content">
                                                <div class="admin-info">
                                                    <a href="#"><i class="ri-user-line"></i> by
                                                        <span><?php echo esc_html($author); ?></span></a>
                                                </div>
                                                <h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
                                            </div>
                                        </div>
                                    </div>

                                <?php elseif ($i === 3): ?>
                                    <div class="learge-wrapper nondon-park-item">
                                        <div class="nondon-park-thumb thumb-img">
                                            <a href="<?php echo esc_url($link); ?>">
                                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="nondon-park-content">
                                            <div class="admin-info">
                                                <a href="#"><i class="ri-user-line"></i> by
                                                    <span><?php echo esc_html($author); ?></span></a>
                                            </div>
                                            <h1><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h1>
                                        </div>
                                    </div>
                                </div> <!-- .nondon-park-right -->
                            </div> <!-- .col -->
                        <?php endif; ?>

                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Nondon Park Section End Here -->

    <!-- Banner Wrapper Start Here -->
    <section class="banner-full-wrapper p-relative mb-120">
        <div class="minar-img"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/banner/minar.png');">
            <div class="container">
                <div class="banner-content-wrapper">
                    <div class="banner-content text-center">
                        <h1 class="banner-title">
                            <a href="#">খবরের আপডেট পেতে চোখ রাখুন আমাদের ফেসবুক পেইজ</a>
                        </h1>
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class=""
                                aria-label="<?php bloginfo('name'); ?>">
                                <?php if (has_custom_logo()): ?>
                                    <?php the_custom_logo(); ?>
                                <?php else: ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/logo.png'); ?>"
                                        alt="<?php bloginfo('name'); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="facebook-link">
                            <a href="https://www.facebook.com/VASAMediaOfficial/" target="_blank"
                                aria-label="Facebook Link">
                                <i class="ri-facebook-fill"></i>
                                <span>www.facebook.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Wrapper End Here -->

    <!-- Jatio Section Start Here -->
    <section class="jatio-main-wrapper pb-120">
        <div class="main-title-wrapper">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center">
                        <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                                fill="#08090B" />
                        </svg>
                        <h2>জাতীয় </h2>
                    </div>

                    <div class="read-more-btn">
                        <a href="/জাতীয়" class="read-btn" aria-label="Read more">
                            <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="jation-content-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $jatio_query = new WP_Query([
                        'category_name' => 'জাতীয়',
                        'posts_per_page' => 4
                    ]);

                    if ($jatio_query->have_posts()):
                        $i = 0;
                        while ($jatio_query->have_posts()):
                            $jatio_query->the_post();
                            $title = get_the_title();
                            $link = get_permalink();
                            $thumb = get_the_post_thumbnail_url(null, 'full');
                            $author = get_the_author();
                            $date = get_the_date('d F Y');
                            $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
                            $date = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                                ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                                $date
                            );
                            ?>

                            <?php if ($i == 0): ?>
                                <div class="col-xl-8">
                                    <div class="first-left-news">
                                        <div class="single-news-wrapper">
                                            <div class="thumb-img">
                                                <a href="<?php echo esc_url($link); ?>" aria-label="Jatio News">
                                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                                </a>
                                            </div>
                                            <div class="content-wrapper">
                                                <h2 class="title">
                                                    <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php elseif ($i == 1): ?>
                                <div class="col-xl-4">
                                    <div class="first-right-news">
                                        <div class="single-news-wrapper">
                                            <div class="news-date">
                                                <a href="#"><i class="ri-time-line"></i>
                                                    <span><?php echo esc_html($date); ?></span></a>
                                            </div>
                                            <h2 class="title">
                                                <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                            </h2>
                                            <div class="thumb-img">
                                                <a href="<?php echo esc_url($link); ?>" aria-label="Jatio News">
                                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                                </a>
                                            </div>
                                            <div class="admin-info">
                                                <a href="#"><i class="ri-user-line"></i> by
                                                    <span><?php echo esc_html($author); ?></span></a>
                                            </div>
                                            <div class="text">
                                                <p><?php echo esc_html($excerpt); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php elseif ($i == 2 || $i == 3): ?>
                                <div class="col-xl-6">
                                    <div class="list-news single-news-wrapper d-flex">
                                        <div class="thumb-img">
                                            <a href="<?php echo esc_url($link); ?>" aria-label="Small thumb news">
                                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="content-wrapper">
                                            <div class="news-date">
                                                <a href="#"><i class="ri-time-line"></i>
                                                    <span><?php echo esc_html($date); ?></span></a>
                                            </div>
                                            <h3 class="news-title"><a
                                                    href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
                                            <p class="text"><?php echo esc_html($excerpt); ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php endif;
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Jatio Section End Here -->

    <!-- Prokash Sutro Start Here -->
    <?php
    // Query 5 posts from প্রকাশসূত্র category
    $args = array(
        'posts_per_page' => 5,
        'category_name' => 'প্রকাশসূত্র', // Change to your slug if different
        'post_status' => 'publish',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):

        // Get the first post
        $query->the_post();
        $video_embed = get_field('video'); // ACF oEmbed field
    
        ?>

        <section class="prokash-suttro-wrapper pt-120 pb-120">
            <div class="container">
                <div class="main-title-wrapper">
                    <div class="section-title d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center">
                            <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                                    fill="#08090B" />
                            </svg>
                            <h2><?php echo esc_html__('প্রকাশসূত্র', 'vasa-portal'); ?></h2>
                        </div>

                        <div class="read-more-btn">
                            <a href="/প্রকাশসূত্র" class="read-btn" aria-label="Read more">
                                <span><?php echo esc_html__('আরও দেখুন', 'vasa-portal'); ?></span> <i
                                    class="ri-arrow-right-s-line"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="news-wrapper">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6 col-md-12">
                            <div class="left-video-wrapper p-relative">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if ($video_embed) {
                                        // Show video embed if exists
                                        echo $video_embed;
                                    } else {
                                        // Fallback: show featured image
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                        if ($featured_img_url) {
                                            echo '<img src="' . esc_url($featured_img_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                                        }
                                        ?>
                                        <div class="video-fallback-meta mt-3">
                                            <div class="news-date mb-1">
                                                <i class="ri-time-line"></i>
                                                <span><?= esc_html(convert_date_to_bangla(get_the_date('j F Y'))); ?></span>
                                            </div>
                                            <h4 class="news-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?= esc_html(get_the_title()); ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </a>
                            </div>

                        </div>

                        <div class="col-xl-5 col-lg-6 col-md-12">
                            <div class="right-small-news-wrapper">

                                <?php
                                // Now loop remaining posts (max 4)
                                $count = 0;
                                while ($query->have_posts() && $count < 4):
                                    $query->the_post();
                                    $post_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                    $post_date = get_the_date('d F Y');
                                    $post_date = str_replace(
                                        ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                                        ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                                        $post_date
                                    );
                                    ?>
                                    <div class="single-news d-flex">
                                        <div class="news-img">
                                            <div class="thumb-img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ($post_thumb): ?>
                                                        <img src="<?php echo esc_url($post_thumb); ?>"
                                                            alt="<?php the_title_attribute(); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/prokash-sutro/default-img.png'); ?>"
                                                            alt="Default Image">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="news-content">
                                            <div class="news-date">
                                                <a href="#"><i class="ri-time-line"></i>
                                                    <span><?php echo esc_html($post_date); ?></span></a>
                                            </div>
                                            <h3 class="title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    endif;
    wp_reset_postdata();
    ?>


    <!-- Prokash Sutro Start Here -->

    <!-- sports Section Start Here -->
    <section class="sports-main-wrapper pt-120 pb-120">
        <div class="main-title-wrapper">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center">
                        <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                                fill="#08090B" />
                        </svg>
                        <h2>স্পোর্টস </h2>
                    </div>
                    <div class="read-more-btn">
                        <a href="/স্পোর্টস" class="read-btn" aria-label="Read more">
                            <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="sport-content-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $sports_query = new WP_Query([
                        'category_name' => 'স্পোর্টস',
                        'posts_per_page' => 3,
                    ]);

                    if ($sports_query->have_posts()):
                        $i = 0;
                        while ($sports_query->have_posts()):
                            $sports_query->the_post();
                            $title = get_the_title();
                            $link = get_permalink();
                            $thumb = get_the_post_thumbnail_url(null, 'full');
                            $author = get_the_author();
                            $excerpt = wp_trim_words(get_the_excerpt(), 30, '...');
                            $date = get_the_date('d F Y');
                            $date = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                                ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                                $date
                            );
                            ?>

                            <?php if ($i == 0 || $i == 1): ?>
                                <?php if ($i == 0): ?>
                                    <div class="col-xl-8 col-lg-8">
                                        <div class="left-sport-wrapper">
                                        <?php endif; ?>

                                        <div class="left-sport <?php echo ($i == 1) ? 'reversed-section' : ''; ?> d-flex">
                                            <div class="sport-img">
                                                <div class="thumb-img">
                                                    <a href="<?php echo esc_url($link); ?>" aria-label="Sport Image">
                                                        <img src="<?php echo esc_url($thumb); ?>"
                                                            alt="<?php echo esc_attr($title); ?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="sport-content <?php echo ($i == 1) ? 'reversed-content' : ''; ?>">
                                                <div class="admin-info">
                                                    <a href="#"><i class="ri-user-line"></i> by
                                                        <span><?php echo esc_html($author); ?></span></a>
                                                </div>
                                                <h2 class="news-title"><a
                                                        href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                                </h2>
                                                <p class="text"><?php echo esc_html($excerpt); ?></p>
                                            </div>
                                        </div>

                                        <?php if ($i == 1): ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php elseif ($i == 2): ?>
                                <div class="col-xl-4 col-lg-4">
                                    <div class="sport-right-wrapper single-news-wrapper">
                                        <div class="news-date">
                                            <a href="#"><i class="ri-time-line"></i> <span><?php echo esc_html($date); ?></span></a>
                                        </div>
                                        <h2 class="title">
                                            <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                        </h2>
                                        <div class="thumb-img">
                                            <a href="<?php echo esc_url($link); ?>" aria-label="Sport Image">
                                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="admin-info">
                                            <a href="#"><i class="ri-user-line"></i> by
                                                <span><?php echo esc_html($author); ?></span></a>
                                        </div>
                                        <div class="text">
                                            <p><?php echo esc_html($excerpt); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- sports Section End Here -->

    <!-- International News Start Here -->
    <section class="international-news-wrapper pb-120">
        <div class="main-title-wrapper">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center">
                        <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                                fill="#08090B" />
                        </svg>
                        <h2>আন্তর্জাতিক </h2>
                    </div>

                    <div class="read-more-btn">
                        <a href="/আন্তর্জাতিক" class="read-btn" aria-label="Read more">
                            <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="international-news">
            <div class="container">
                <?php
                $intl_query = new WP_Query([
                    'category_name' => 'আন্তর্জাতিক',
                    'posts_per_page' => 5,
                ]);

                if ($intl_query->have_posts()):
                    $i = 0;
                    while ($intl_query->have_posts()):
                        $intl_query->the_post();
                        $title = get_the_title();
                        $link = get_permalink();
                        $thumb = get_the_post_thumbnail_url(null, 'full');
                        $author = get_the_author();
                        $excerpt = wp_trim_words(get_the_excerpt(), 50, '...');
                        $date = get_the_date('d F Y');
                        $date = str_replace(
                            ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                            ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                            $date
                        );

                        if ($i == 0):
                            ?>
                            <!-- Big Featured News -->
                            <div class="big-thumb-wrapper d-flex">
                                <div class="international-big-thumb thumb-img">
                                    <a href="<?php echo esc_url($link); ?>">
                                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                    </a>
                                </div>
                                <div class="big-thumb-news">
                                    <div class="info">
                                        <div class="news-date">
                                            <a href="#"><i class="ri-time-line"></i> <span><?php echo esc_html($date); ?></span></a>
                                        </div>
                                        <div class="admin-info">
                                            <a href="#"><i class="ri-user-line"></i> by
                                                <span><?php echo esc_html($author); ?></span></a>
                                        </div>
                                    </div>
                                    <h1 class="title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                    </h1>
                                    <p class="text"><?php echo esc_html($excerpt); ?></p>
                                    <div class="read-more-btn">
                                        <a href="<?php echo esc_url($link); ?>" class="read-btn" aria-label="Read more">
                                            <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <?php else: ?>
                                <!-- Small Thumbnail News -->
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="international-sort-news">
                                        <div class="sort-thumb thumb-img">
                                            <a href="<?php echo esc_url($link); ?>">
                                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                                            </a>
                                        </div>
                                        <div class="thumb-news">
                                            <h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        $i++;
                    endwhile;
                    echo '</div>'; // close row
                    wp_reset_postdata();
                endif;
                ?>
                </div>
            </div>
    </section>

    <!-- International News Start Here -->


</main><!-- #main -->

<?php
get_footer();
