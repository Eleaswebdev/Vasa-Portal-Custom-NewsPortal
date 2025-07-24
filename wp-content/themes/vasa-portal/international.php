<?php
/**
 * Template Name: International
 */
get_header(); ?>

<!-- International News Start Here -->
<?php
$featured_args = [
    'posts_per_page' => 1,
    'category_name'  => 'আন্তর্জাতিক',
];
$featured_query = new WP_Query($featured_args);
$featured_ids = [];

if ($featured_query->have_posts()) :
    while ($featured_query->have_posts()) : $featured_query->the_post();
        $featured_ids[] = get_the_ID();
        ?>
        <!-- Section: international-news-wrapper -->
        <section class="international-news-wrapper pb-120">
            <div class="international-news">
                <div class="container">
                    <div class="big-thumb-wrapper d-flex">
                        <div class="international-big-thumb thumb-img">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                        <div class="big-thumb-news">
                            <div class="info">
                                <div class="news-date">
                                        <a href="#"><i class="ri-time-line"></i> <span><?= esc_html( convert_date_to_bangla(get_the_date('j F Y')) ); ?></span></a>
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
        <?php
    endwhile;
endif;
wp_reset_postdata();
?>

<!-- Sort News Columns -->
<div class="row">
    <?php
    $sort_args = [
        'posts_per_page' => 4,
        'category_name'  => 'আন্তর্জাতিক',
        'post__not_in'   => $featured_ids,
    ];
    $sort_query = new WP_Query($sort_args);
    $sort_ids = [];

    if ($sort_query->have_posts()) :
        while ($sort_query->have_posts()) : $sort_query->the_post();
            $sort_ids[] = get_the_ID(); ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="international-sort-news">
                    <div class="sort-thumb thumb-img">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    </div>
                    <div class="thumb-news">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>
</div></div></section>

<!-- International News Start Here -->

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


<div class="full-width-news-wrapper pb-120">
    <div class="container">
        <div class="full-news-wrapper" id="international-full-news">
            <?php
            $full_args = [
                'posts_per_page' => 5,
                'category_name'  => 'আন্তর্জাতিক',
                'post__not_in'   => array_merge($featured_ids, $sort_ids),
                'paged'          => 1,
            ];
            $full_query = new WP_Query($full_args);

            if ($full_query->have_posts()) :
                while ($full_query->have_posts()) : $full_query->the_post(); ?>
                    <div class="big-thumb-wrapper d-flex">
                        <div class="international-big-thumb thumb-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                        </div>
                        <div class="big-thumb-news">
                            <div class="info">
                                <div class="news-date">
                                        <a href="#"><i class="ri-time-line"></i> <span><?= esc_html( convert_date_to_bangla(get_the_date('j F Y')) ); ?></span></a>
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
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="readmore-btn text-center">
            <a href="#" id="load-more-news" class="news-btn" data-paged="2" data-exclude="<?php echo implode(',', array_merge($featured_ids, $sort_ids)); ?>">আরও দেখুন</a>
        </div>
    </div>
</div>



<?php get_footer(); ?>