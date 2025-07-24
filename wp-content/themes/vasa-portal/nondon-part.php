<?php
/**
 * Template Name: Nondon Part
 * Template part for displaying content in a non-don post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vasa_Portal
 */
get_header(); ?>

<!-- Nondonpath Banner Area Start Here -->
<section class="nondonpath-banner">
    <div class="container">
        <div class="row">

            <!-- Left Sidebar (উপন্যাস) -->
            <div class="col-xl-3 col-lg-3">
                <div class="left-content">
                    <?php
                    $left_query = new WP_Query(array(
                        'post_type' => 'nandonpath',
                        'posts_per_page' => 2,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'nondonpart_category',
                                'field' => 'name',
                                'terms' => 'উপন্যাস',
                            )
                        ),
                    ));
                    if ($left_query->have_posts()):
                        while ($left_query->have_posts()):
                            $left_query->the_post(); ?>
                            <div class="left-single">
                                <div class="single-thumb thumb-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                                <div class="single-news text-center">
                                    <p class="subtitle">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'nondonpart_category');
                                        if ($terms && !is_wp_error($terms)) {
                                            echo '<a href="' . get_term_link($terms[0]) . '">' . $terms[0]->name . '</a>';
                                        }
                                        ?>
                                    </p>
                                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

            <!-- Center Banner (শিল্প ও সাহিত্য) -->
            <div class="col-xl-6 col-lg-6">
                <div class="banner-big-thumb-wrapper text-center">
                    <?php
                    $center_query = new WP_Query(array(
                        'post_type' => 'nandonpath',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'nondonpart_category',
                                'field' => 'name',
                                'terms' => 'শিল্প ও সাহিত্য',
                            )
                        ),
                    ));
                    if ($center_query->have_posts()):
                        $center_query->the_post(); ?>
                        <div class="big-thumb-img thumb-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                        </div>
                        <div class="big-thumb-content">
                            <div class="info-wrapper">
                                <div class="thumb-info">
                                    <a href="#"><i class="ri-user-line"></i> by <span><?php the_author(); ?></span></a>
                                </div>
                                <div class="categoryy">
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'nondonpart_category');
                                    if ($terms && !is_wp_error($terms)) {
                                        echo '<a href="' . get_term_link($terms[0]) . '">' . $terms[0]->name . '</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                        </div>
                        <?php wp_reset_postdata(); endif; ?>
                </div>
            </div>

            <!-- Right Sidebar (প্রবন্ধ) -->
            <div class="col-xl-3 col-lg-3">
                <div class="right-content">
                    <?php
                    $right_query = new WP_Query(array(
                        'post_type' => 'nandonpath',
                        'posts_per_page' => 4,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'nondonpart_category',
                                'field' => 'name',
                                'terms' => 'প্রবন্ধ',
                            )
                        ),
                    ));
                    if ($right_query->have_posts()):
                        while ($right_query->have_posts()):
                            $right_query->the_post(); ?>
                            <div class="single-list-news">
                                <div class="list-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                </div>
                                <div class="list-content">
                                    <p class="subtitle">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'nondonpart_category');
                                        if ($terms && !is_wp_error($terms)) {
                                            echo '<a href="' . get_term_link($terms[0]) . '">' . $terms[0]->name . '</a>';
                                        }
                                        ?>
                                    </p>
                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Nondonpath Banner Area End Here -->


<!-- Nondon Park Section Start Here -->
<?php
$args = array(
    'post_type' => 'nandonpath',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
      'tax_query' => array(
                array(
                    'taxonomy' => 'nondonpart_category',
                    'field' => 'name',
                    'terms' => 'সাহিত্য ও সংস্কৃতি',
                )
            ),
);

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
<section class="nondon-park-wrapper mt-120 mb-120">
    <div class="main-title-wrapper">
        <div class="container">
            <div class="section-title d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center">
                    <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z" fill="#08090B" />
                    </svg>
                    <h2>নন্দনপাঠ</h2>
                </div>
                <div class="read-more-btn">
                    <a href="#" class="read-btn" aria-label="Read more"><span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            while ($query->have_posts()) : $query->the_post();
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $author = get_the_author();
                $title = get_the_title();
                $permalink = get_permalink();

                if ($i === 0) : // First Large Left ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                        <div class="nondon-park-left">
                            <div class="learge-wrapper nondon-park-item">
                                <div class="nondon-park-thumb thumb-img">
                                    <a href="<?= esc_url($permalink); ?>"><img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr($title); ?>"></a>
                                </div>
                                <div class="nondon-park-content">
                                    <div class="admin-info">
                                        <a href="#"><i class="ri-user-line"></i> by <span><?= esc_html($author); ?></span></a>
                                    </div>
                                    <h1><a href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h1>
                                </div>
                            </div>
            <?php elseif ($i === 1) : // Small under Left ?>
                            <div class="small-main-wrap">
                                <div class="small-wrapper nondon-park-item">
                                    <div class="nondon-park-thumb thumb-img">
                                        <a href="<?= esc_url($permalink); ?>"><img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr($title); ?>"></a>
                                    </div>
                                    <div class="nondon-park-content">
                                        <div class="admin-info">
                                            <a href="#"><i class="ri-user-line"></i> by <span><?= esc_html($author); ?></span></a>
                                        </div>
                                        <h3><a href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php elseif ($i === 2) : // Small top Right ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                        <div class="nondon-park-right">
                            <div class="small-main-wrap">
                                <div class="small-wrapper nondon-park-item">
                                    <div class="nondon-park-thumb thumb-img">
                                        <a href="<?= esc_url($permalink); ?>"><img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr($title); ?>"></a>
                                    </div>
                                    <div class="nondon-park-content">
                                        <div class="admin-info">
                                            <a href="#"><i class="ri-user-line"></i> by <span><?= esc_html($author); ?></span></a>
                                        </div>
                                        <h3><a href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h3>
                                    </div>
                                </div>
                            </div>
            <?php elseif ($i === 3) : // Large bottom Right ?>
                            <div class="learge-wrapper nondon-park-item">
                                <div class="nondon-park-thumb thumb-img">
                                    <a href="<?= esc_url($permalink); ?>"><img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr($title); ?>"></a>
                                </div>
                                <div class="nondon-park-content">
                                    <div class="admin-info">
                                        <a href="#"><i class="ri-user-line"></i> by <span><?= esc_html($author); ?></span></a>
                                    </div>
                                    <h1><a href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h1>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endif; $i++; endwhile; ?>
        </div>
    </div>
</section>
<?php endif; wp_reset_postdata(); ?>

<!-- Nondon Park Section End Here -->

<!-- Upponass Section Start Here -->
<?php
// Get the first 2 post IDs already shown above (used in top section)
$excluded_ids = get_posts([
    'post_type' => 'nandonpath',
    'posts_per_page' => 2,
    'tax_query' => [[
        'taxonomy' => 'nondonpart_category',
        'field'    => 'name',
        'terms'    => 'উপন্যাস',
    ]],
    'fields' => 'ids'
]);
 // Debugging line to check excluded IDs

// Query the rest of the "উপন্যাস" posts (excluding first 2)
$novel_posts = new WP_Query([
    'post_type' => 'nandonpath',
    'posts_per_page' => 6, // Adjust to your layout
    'post__not_in' => $excluded_ids,
    'tax_query' => [[
        'taxonomy' => 'nondonpart_category',
        'field'    => 'name',
        'terms'    => 'উপন্যাস',
    ]]
]);

?>

<?php if ($novel_posts->have_posts()) : ?>
<section class="uponnas-wrapper pb-120">
    <div class="main-title-wrapper">
        <div class="container">
            <div class="section-title d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center">
                    <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z" fill="#08090B" />
                    </svg>
                    <h2>উপন্যাস</h2>
                </div>
                <div class="read-more-btn">
                    <a href="<?php echo get_term_link(get_term_by('name', 'উপন্যাস', 'nondonpart_category')); ?>" class="read-btn"><span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="uponas-content-wrapper">
        <div class="container">
            <div class="row">
                <?php $count = 0; while ($novel_posts->have_posts()) : $novel_posts->the_post(); ?>
                    <?php
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $author = get_the_author();
                    $categories = wp_get_post_terms(get_the_ID(), 'nondonpart_category');
                    $cat_name = !empty($categories) ? $categories[0]->name : '';
                    ?>

                    <?php if ($count == 0) : ?>
                        <div class="col-xl-6 col-lg-4">
                            <div class="left-content-wrapper">
                    <?php endif; ?>

                    <?php if ($count < 2): ?>
                        <div class="left-single-content <?php echo $count == 0 ? 'first-child' : 'last-child'; ?>">
                            <div class="thumb-img">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>"></a>
                            </div>
                            <div class="overlay-single-content">
                                <p class="category"><a href="#"><?php echo esc_html($cat_name); ?></a></p>
                                <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($count == 1) echo '</div></div>'; ?>

                    <?php if ($count >= 2 && $count < 4): ?>
                        <?php if ($count == 2): ?>
                            <div class="col-xl-3 col-lg-4">
                                <div class="middle-wrapper">
                        <?php endif; ?>
                        <div class="single-content">
                            <div class="thumb-img">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>"></a>
                            </div>
                            <div class="single-content-wrap">
                                <p class="category"><a href="#"><?php echo esc_html($cat_name); ?></a></p>
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </div>
                        </div>
                        <?php if ($count == 3) echo '</div></div>'; ?>
                    <?php endif; ?>

                    <?php if ($count >= 4 && $count < 6): ?>
                        <?php if ($count == 4): ?>
                            <div class="col-xl-3 col-lg-4">
                                <div class="right-wrapper">
                        <?php endif; ?>
                        <div class="single-content">
                            <div class="thumb-img">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>"></a>
                            </div>
                            <div class="single-content-wrap">
                                <p class="category"><a href="#"><?php echo esc_html($cat_name); ?></a></p>
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </div>
                        </div>
                        <?php if ($count == 5) echo '</div></div>'; ?>
                    <?php endif; ?>

                <?php $count++; endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Upponass Section End Here -->

<!-- Prokash Sutro Start Here -->
<section class="sritycharon-wrapper pt-120 pb-120"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/srityr-charon/srity-charon-bg.png');">
    <div class="container">
        <div class="main-title-wrapper">
            <div class="section-title d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center">
                    <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                            fill="#08090B" />
                    </svg>
                    <h2>স্মৃতিচারণ</h2>
                </div>
                <div class="read-more-btn">
                    <?php
                    $term = get_term_by('slug', 'smriticharon', 'nondonpart_category'); // use slug of স্মৃতিচারণ term
                    if ($term) :
                        $term_link = get_term_link($term);
                    ?>
                        <a href="<?php echo esc_url($term_link); ?>" class="read-btn" aria-label="Read more">
                            <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="sritycharon-content">
            <div class="row gy-4">
                <?php
                $args = [
                    'post_type' => 'nandonpath',
                    'posts_per_page' => 4,
                    'tax_query' => [
                        [
                            'taxonomy' => 'nondonpart_category',
                            'field'    => 'name',
                            'terms'    => 'স্মৃতিচারণ',  // make sure slug matches exactly
                        ],
                    ],
                ];

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-srity">
                                <p class="category">
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'nondonpart_category');
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        $term = reset($terms);
                                        echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                    }
                                    ?>
                                </p>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="img-wrapper thumb-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('medium');
                                        } else { ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-thumb.jpg" alt="default image">
                                        <?php }
                                        ?>
                                    </a>
                                </div>
                                <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Prokash Sutro Start Here -->

<?php
get_footer();