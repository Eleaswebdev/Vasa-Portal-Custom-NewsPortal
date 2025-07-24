<?php
/**
 * Template Name: About
 * Description: About page template for Vasa Portal theme.
 */
get_header(); ?>
<!-- About Us Main Wrapper Start  -->
 <!-- Video Wrapper Start Here -->
<section class="about-video-wrapper pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <div class="main-video-wrapper">
                    <?php $video = get_field('about_video'); ?>
                    <?php echo $video; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Wrapper End Here -->
<section class="about-us pb-5">
    <div class="container">
        <div class="aboutus-section-title text-center">
            <div class="title-wrapper">
                <?php if (get_field('sub_title')) : ?>
                    <p><?php the_field('sub_title'); ?></p>
                <?php endif; ?>
                
                <?php if (get_field('main_title')) : ?>
                    <h1 class="main-title"><?php the_field('main_title'); ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <div class="about-us-content-wrapper">
            <div class="row g-4">
                <div class="col-xl-6 col-lg-6">
                    <div class="left-img">
                        <?php 
                        $image = get_field('left_image');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="text-wrapper">
                        <?php if (get_field('right_description')) : ?>
                            <?php the_field('right_description'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Main Wrapper End -->



<?php get_footer(); ?>