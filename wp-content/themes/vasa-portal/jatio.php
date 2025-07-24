<?php
/**
 * Template Name: Jatio
 */
get_header(); ?>

<!-- Jatio Section Start Here -->
<?php
// Top 4 posts from জাতীয়
$top_query = new WP_Query([
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'category_name'  => 'জাতীয়',
]);
$top_ids = [];

if ($top_query->have_posts()): ?>
<section class="jatio-main-wrapper pb-120">
    <div class="jation-content-wrapper">
        <div class="container">
            <div class="row">
                <?php
                $i = 0;
                while ($top_query->have_posts()): $top_query->the_post();
                    $top_ids[] = get_the_ID();
                    $i++;
                    if ($i === 1): ?>
                        <div class="col-xl-8">
                            <div class="first-left-news">
                                <div class="single-news-wrapper">
                                    <div class="thumb-img">
                                        <a href="<?php the_permalink(); ?>" aria-label="Jatio News">
                                            <?php the_post_thumbnail('full'); ?>
                                        </a>
                                    </div>
                                    <div class="content-wrapper">
                                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($i === 2): ?>
                        <div class="col-xl-4">
                            <div class="first-right-news">
                                <div class="single-news-wrapper">
                                    <div class="news-date">
                                        <a href="#"><i class="ri-time-line"></i> <span><?= esc_html( convert_date_to_bangla(get_the_date('j F Y')) ); ?></span></a>
                                    </div>
                                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="thumb-img">
                                        <a href="<?php the_permalink(); ?>" aria-label="Jatio News"><?php the_post_thumbnail('full'); ?></a>
                                    </div>
                                    <div class="admin-info">
                                        <a href="#"><i class="ri-user-line"></i> by <span><?php the_author(); ?></span></a>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-xl-6">
                            <div class="list-news single-news-wrapper d-flex">
                                <div class="thumb-img">
                                    <a href="<?php the_permalink(); ?>" aria-label="Small thumb news">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                </div>
                                <div class="content-wrapper">
                                    <div class="news-date">
                                        <a href="#"><i class="ri-time-line"></i> <span><?= esc_html( convert_date_to_bangla(get_the_date('j F Y')) ); ?></span></a>
                                    </div>
                                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); endif; ?>


<!-- Jatio Section End Here -->

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

<!-- List News Section Start Here -->
<!-- List News Section Start Here -->
<div class="jatio-list-wrapper pb-120">
    <div class="container">
        <div class="row" id="jatio-posts-list">
            <div class="col-xl-6 col-lg-6 col-md-12" id="jatio-posts-left">
                <?php
                // Initial posts query
                $exclude_ids = isset($top_ids) ? $top_ids : [];
                $args = [
                    'post_type'      => 'post',
                    'posts_per_page' => 8,
                    'paged'          => 1,
                    'category_name'  => 'জাতীয়',
                    'post__not_in'   => $exclude_ids,
                ];
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    $posts = [];
                    while ($query->have_posts()) : $query->the_post();
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
                        $posts[] = ob_get_clean();
                    endwhile;

                    // Split posts evenly into left and right columns
                    $half = ceil(count($posts) / 2);
                    $left_posts = array_slice($posts, 0, $half);
                    $right_posts = array_slice($posts, $half);

                    // Output left posts
                    foreach ($left_posts as $post_html) {
                        echo $post_html;
                    }
                else :
                    echo '<p>কোনও পোস্ট পাওয়া যায়নি।</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12" id="jatio-posts-right">
                <?php
                // Output right posts
                if (!empty($right_posts)) {
                    foreach ($right_posts as $post_html) {
                        echo $post_html;
                    }
                }
                ?>
            </div>
        </div>

        <div class="readmore-btn text-center">
            <a href="#" id="load-more-jatio"
               class="news-btn"
               data-paged="2"
               data-exclude="<?php echo esc_attr(implode(',', $exclude_ids)); ?>">
               আরও দেখুন
            </a>
        </div>
    </div>
</div>

<!-- List News Section End Here -->

<!-- List News Section End Here -->



<!-- List News Section End Here -->
<?php get_footer(); ?>