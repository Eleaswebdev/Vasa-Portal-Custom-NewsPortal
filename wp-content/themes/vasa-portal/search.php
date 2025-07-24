<?php get_header(); ?>

<div class="full-width-news-wrapper pb-120">
    <div class="container">
        <div class="full-news-wrapper" id="search-full-news">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'search'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p>কোনো ফলাফল পাওয়া যায়নি।</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
