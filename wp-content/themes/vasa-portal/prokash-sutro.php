<?php
/**
 * Template Name: Prokash Sutro
 */
get_header(); ?>
<?php
// Overlay Posts Query (3)
$overlay_query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'category_name'  => 'প্রকাশসূত্র'
));
$overlay_ids = [];

if ($overlay_query->have_posts()) :
?>
<section class="prokash-overlay-news pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <?php while ($overlay_query->have_posts()) : $overlay_query->the_post();
                $overlay_ids[] = get_the_ID(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="overlay-single-news thumb-img">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                        <div class="overlay-info">
                            <p class="category"><a href="#">প্রকাশসূত্র</a></p>
                            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php
        // List Posts (4)
        $list_query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'category_name'  => 'প্রকাশসূত্র',
            'post__not_in'   => $overlay_ids
        ));
        $list_ids = [];

        if ($list_query->have_posts()) :
        ?>
        <div class="prokash-list">
            <div class="row g-4">
                <?php while ($list_query->have_posts()) : $list_query->the_post();
                    $list_ids[] = get_the_ID(); ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="single-list">
                            <div class="listt-thumb thumb-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                            </div>
                            <div class="thummb-content">
                                <div class="overlay-info">
                                    <p class="category"><a href="#">প্রকাশসূত্র</a></p>
                                    <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; wp_reset_postdata(); ?>

<!-- Banner Wrapper Start Here -->
<section class="banner-full-wrapper p-relative mb-120">
    <div class="minar-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner/minar.png);">
        <div class="container">
            <div class="banner-content-wrapper">
                <div class="banner-content text-center">
                    <h1 class="banner-title">
                        <a href="#">খবরের আপডেট পেতে চোখ রাখুন আমাদের ফেসবুক পেইজ</a>
                    </h1>
                    <div class="logo">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt="Logo">
                        </a>
                    </div>
                    <div class="facebook-link">
                        <a href="#"><i class="ri-facebook-fill"></i><span>www.facebook.com</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Wrapper End Here -->

<!-- Prokash Grid News Start -->
<?php
$exclude_ids = array_merge($overlay_ids, $list_ids);

$grid_query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'category_name'  => 'প্রকাশসূত্র',
    'post__not_in'   => $exclude_ids
));

if ($grid_query->have_posts()) :
?>
<section class="prokash-grid-news pb-120">
    <div class="container">
        <div class="row g-4" id="prokashsutro-grid-wrapper">
            <?php while ($grid_query->have_posts()) : $grid_query->the_post(); ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="grid-single single-news-wrapper" data-id="<?php the_ID(); ?>">
                        <div class="grid-thumb thumb-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        </div>
                        <div class="grid-content">
                            <p class="category"><a href="#">প্রকাশসূত্র</a></p>
                            <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="readmore-btn text-center">
            <a href="#" id="prokash-load-more" class="news-btn">আরও দেখুন</a>
        </div>
    </div>
</section>
<?php endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>