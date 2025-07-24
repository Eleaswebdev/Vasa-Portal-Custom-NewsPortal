<?php
/**
 * Template Name: Sports
 */
get_header(); ?>
<?php
$sports_top_args = array(
    'posts_per_page' => 3,
    'category_name'  => 'স্পোর্টস',
    'post_status'    => 'publish',
);
$top_sports_query = new WP_Query($sports_top_args);
$exclude_ids = wp_list_pluck($top_sports_query->posts, 'ID');
?>

<section class="sports-main-wrapper pb-120">
    <div class="sport-content-wrapper">
        <div class="container">
            <div class="row">
                <?php if ($top_sports_query->have_posts()) :
                    $count = 0;
                    while ($top_sports_query->have_posts()) : $top_sports_query->the_post(); ?>
                        <div class="col-xl-4 col-lg-4">
                            <div class="single-news-wrapper d-flex flex-column h-100">
                                <div class="thumb-img mb-3">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                </div>
                                <div class="admin-info mb-1">
                                    <a href="#"><i class="ri-user-line"></i> by <span><?php the_author(); ?></span></a>
                                </div>
                                <h2 class="news-title mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                            </div>
                        </div>
                    <?php $count++;
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Banner Wrapper Start Here -->
<section class="banner-full-wrapper p-relative mb-120">
    <div class="minar-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/banner/minar.png');">
        <div class="container">
            <div class="banner-content-wrapper">
                <div class="banner-content text-center">
                    <h1 class="banner-title">
                        <a href="#">খবরের আপডেট পেতে চোখ রাখুন আমাদের ফেসবুক পেইজ</a>
                    </h1>
                    <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="" aria-label="<?php bloginfo('name'); ?>">
                                <?php if (has_custom_logo()) : ?>
                                    <?php the_custom_logo(); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                                <?php endif; ?>
                        </a>
                    </div>
                    <div class="facebook-link">
                        <a href="https://www.facebook.com/VASAMediaOfficial/" target="_blank" aria-label="Facebook Link">
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
<section class="sport-grid-wrapper pb-80" id="sports-grid-wrapper" data-page="1" data-exclude='<?php echo json_encode($exclude_ids); ?>'>
    <div class="container">
        <div class="row g-4" id="sports-grid-posts">
            <!-- Initial posts load via PHP -->
            <?php
            $grid_args = array(
                'posts_per_page' => 6,
                'paged'          => 1,
                'post__not_in'   => $exclude_ids,
                'category_name'  => 'স্পোর্টস',
                'post_status'    => 'publish'
            );
            $grid_query = new WP_Query($grid_args);
            if ($grid_query->have_posts()) :
                while ($grid_query->have_posts()) : $grid_query->the_post();
                    $exclude_ids[] = get_the_ID(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="sport-grid-single first-right-news">
                            <div class="single-news-wrapper">
                                <div class="news-date">
                                        <a href="#"><i class="ri-time-line"></i> <span><?= esc_html( convert_date_to_bangla(get_the_date('j F Y')) ); ?></span></a>
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
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div class="readmore-btn text-center mt-4">
            <button class="news-btn" id="load-more-sports">আরও দেখুন</button>
        </div>
    </div>
</section>

<?php get_footer(); ?>