<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vasa_Portal
 */

?>

<section class="no-results not-found pb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e('কিছুই পাওয়া যায়নি', 'vasa-portal'); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php
					if (is_home() && current_user_can('publish_posts')):

						printf(
							'<p>' . wp_kses(
								/* translators: 1: link to WP admin new post page. */
								__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vasa-portal'),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							) . '</p>',
							esc_url(admin_url('post-new.php'))
						);

					elseif (is_search()):
						?>

						<p><?php esc_html_e('দুঃখিত, আপনার অনুসন্ধানের সাথে কোনো ফলাফল মেলেনি। অনুগ্রহ করে অন্য কীওয়ার্ড দিয়ে আবার চেষ্টা করুন।', 'vasa-portal'); ?>
						</p>
						<?php
						get_search_form();

					else:
						?>

						<p><?php esc_html_e('দুঃখিত, আমরা যা খুঁজছি তা খুঁজে পাচ্ছি না। হয়তো অনুসন্ধান করতে সাহায্য করতে পারে।', 'vasa-portal'); ?>
						</p>
						<?php
						get_search_form();

					endif;
					?>
				</div><!-- .page-content -->
			</div>
		</div>

	</div>

</section><!-- .no-results -->