<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vasa_Portal
 */

get_header();
?>

<main id="primary" class="site-main">
	<!-- Single Details Section Start From here  -->
	<section class="single-details">
		<div class="container small-container">

			<?php if (have_posts()):
				while (have_posts()):
					the_post(); ?>

					<!-- Main Thumbnail -->
					<div class="main-thumb thumb-img">
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail('full'); ?>
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/single-details/main-thumb.png"
									alt="<?php the_title(); ?>">
							<?php endif; ?>
						</a>
					</div>

					<!-- Author & Date Info -->
					<div class="user-info d-flex">
						<div class="left-user-info d-flex">
							<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
								<i class="ri-user-line"></i>
								<span><?php the_author(); ?></span>
							</a>
							 <div class="news-date mb-1">
								<i class="ri-time-line"></i>
								<span><?= esc_html(convert_date_to_bangla(get_the_date('j F Y'))); ?></span>
							</div>
						</div>
						<p><?php echo get_post_meta(get_the_ID(), 'photo_credit', true); // Optional custom field ?></p>
					</div>

					<!-- Post Content -->
					<div class="text-wrapper">
						<?php the_content(); ?>
					</div>

					<!-- Subject (Categories) and Social Share -->
					<div class="end-info d-flex">
						<div class="subject-wrapper">
							<div class="icon-wrap">
								<!-- SVG Icon kept as-is -->
								<!-- Add SVG icon here -->
								<span>বিষয়ঃ </span>
							</div>
							<h4 class="main-sub">
								<?php the_category(', '); ?>
							</h4>
						</div>
						<div class="share-wrapper">
							<a href="#"><i class="ri-share-forward-line"></i></a>
							<span>শেয়ার করুনঃ</span>
							<div class="social-icon-wrapper">
								<ul>
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
											target="_blank" aria-label="Facebook"><i class="ri-facebook-fill"></i></a></li>
									<li><a href="https://www.instagram.com/" aria-label="Instagram"><i
												class="ri-instagram-line"></i></a></li>
									<li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"
											target="_blank" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a></li>
									<li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"
											target="_blank" aria-label="Twitter"><i class="ri-twitter-x-line"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

				<?php endwhile; endif; ?>

		</div>
	</section>
	<!-- Single Details Section End Here -->
	<?php 
	// Comments section
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
	?>

</main><!-- #main -->

<?php

get_footer();
