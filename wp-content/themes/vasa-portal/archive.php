<?php get_header(); ?>

<?php
$archive_title = get_the_archive_title();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$grid_query = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => 12,
	'paged' => $paged,
	'category_name' => is_category() ? get_query_var('category_name') : '',
	'tag' => is_tag() ? get_query_var('tag') : '',
	'author' => is_author() ? get_queried_object_id() : '',
	'year' => get_query_var('year'),
	'monthnum' => get_query_var('monthnum'),
	'day' => get_query_var('day'),
));
?>

<?php if ($grid_query->have_posts()): ?>
	<section class="prokash-grid-news pb-120">
		<div class="container">
			
			<div class="row g-4" id="archive-grid-wrapper">
				<?php while ($grid_query->have_posts()):
					$grid_query->the_post(); ?>
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
						<div class="grid-single single-news-wrapper" data-id="<?php the_ID(); ?>">
							<div class="grid-thumb thumb-img">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							</div>
							<div class="grid-content">
								<p class="category"><?php the_category(', '); ?></p>
								<h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

			<?php if ($grid_query->found_posts > 12): ?>
				<div class="readmore-btn text-center">
					<a href="#" id="archive-load-more" class="news-btn" data-page="2"
						data-archive="<?php echo esc_attr(get_queried_object_id()); ?>"
						data-archivetype="<?php echo esc_attr(get_post_type()); ?>"
						data-url="<?php echo admin_url('admin-ajax.php'); ?>">আরও দেখুন</a>
				</div>
			<?php endif; ?>

		</div>
	</section>
<?php endif;
wp_reset_postdata(); ?>

<?php get_footer(); ?>