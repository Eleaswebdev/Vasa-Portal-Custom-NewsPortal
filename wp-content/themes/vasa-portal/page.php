<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vasa_Portal
 */

get_header();
?>

	<main id="primary" class="site-main  mb-80 mt-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 m-auto">
					<div class="login-form-wrapper shadow-lg">
						<div class="login-form-header text-center">
							<h2><?php the_title(); ?></h2>
						</div>
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<div class="page-content">
									<?php the_content(); ?>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<p><?php esc_html_e('Sorry, no content found.', 'vasa-portal'); ?></p>
						<?php endif; ?>

					</div>
				</div>

			</div>
		</div>



	</main><!-- #main -->

<?php

get_footer();
