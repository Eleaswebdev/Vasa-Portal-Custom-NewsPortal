<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vasa_Portal
 */

?>

<div class="big-thumb-wrapper d-flex">
    <div class="international-big-thumb thumb-img">
        <a href="<?php the_permalink(); ?>">
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('large');
            } else {
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/default-thumb.jpg" alt="No Image">';
            }
            ?>
        </a>
    </div>
    <div class="big-thumb-news">
        <div class="info">
            <div class="news-date">
                <a href="#"><i class="ri-time-line"></i>
                    <span><?= esc_html( convert_date_to_bangla(get_the_date('j F Y')) ); ?></span>
                </a>
            </div>
            <div class="admin-info">
                <a href="#"><i class="ri-user-line"></i> by 
                    <span><?php the_author(); ?></span>
                </a>
            </div>
        </div>
        <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <p class="text"><?php the_excerpt(); ?></p>
        <div class="read-more-btn">
            <a href="<?php the_permalink(); ?>" class="read-btn">
                <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
            </a>
        </div>
    </div>
</div>


