<?php
if (post_password_required())
	return;
?>

<!-- Comment Section Start Form Here -->
<section class="comment-area">
	<div class="container small-container">
		<div class="comment-main-wrapper">
			<?php
			$comment_count = get_comments_number();
			if (have_comments()):
				?>
				<h4 class="title"><?php echo number_format_i18n($comment_count); ?>টি মন্তব্য</h4>

				<div id="comment-list" class="comment-list">
					<?php
					wp_list_comments([
						'style' => 'div',
						'callback' => 'custom_comment_callback',
						'end-callback' => 'end_custom_comment_callback',
						'type' => 'comment',
						'per_page' => 2,
						'reverse_top_level' => false,
						'max_depth' => 3,
					]);
					?>
				</div>

				<?php if ($comment_count > 2): ?>
					<button id="load-more-comments" data-postid="<?php echo get_the_ID(); ?>">
						আরও মন্তব্য দেখুন
					</button>
				<?php endif; ?>

			<?php endif; ?>

			<section class="contact-form pb-120">
				<div class="container small-container">
					<div class="form-main-wrapper">
						<h3 class="title">
							মন্তব্য করুন
						</h3>
						<?php
						$commenter = wp_get_current_commenter();
						$req = get_option('require_name_email');
						$aria_req = ($req ? "aria-required='true'" : '');

						$fields = [
							'author' => '
                    <div class="input-wrap d-flex">
                        <div class="single-input">
                            <label for="author">নাম</label>
                            <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />
                        </div>',

							'email' => '
                        <div class="single-input">
                            <label for="email">ই-মেইল</label>
                            <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />
                        </div>',

							'phone' => '
                        <div class="single-input">
                            <label for="phone">মোবাইল নাম্বার</label>
                            <input id="phone" name="phone" type="text" />
                        </div>
                    </div>',
						];

						$args = [
							'fields' => $fields,
							'comment_field' => '
                    <div class="text-area single-input">
                        <label for="comment">মন্তব্য লিখুন</label>
                        <textarea id="comment" name="comment" rows="5" aria-required="true"></textarea>
                    </div>',
							'comment_notes_after' => '',
							'title_reply' => '',
							'label_submit' => 'মন্তব্য পাঠান',
							'class_submit' => 'news-btn',
							'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
							'format' => 'html5',
						];

						comment_form($args);
						?>
					</div>
				</div>
			</section>


		</div>
	</div>
</section>
<!-- Relation Section Start Here -->
<section class="relation-wrapper pb-120">
    <div class="main-title-wrapper">
        <div class="container">
            <div class="section-title d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center">
                    <svg width="30" height="29" viewBox="0 0 30 29" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 0L15.9048 5.12733C16.6352 9.26634 19.8758 12.5069 24.0148 13.2373L29.1421 14.1421L24.0148 15.047C19.8758 15.7774 16.6352 19.0179 15.9048 23.1569L15 28.2843L14.0952 23.1569C13.3648 19.0179 10.1242 15.7774 5.9852 15.047L0.857865 14.1421L5.98519 13.2373C10.1242 12.5069 13.3648 9.26634 14.0952 5.12733L15 0Z"
                            fill="#08090B" />
                    </svg>
                    <h2>সম্পর্কিত</h2>
                </div>

                <div class="read-more-btn">
                    <a href="<?php echo esc_url( get_category_link( get_query_var('cat') ) ); ?>" class="read-btn" aria-label="Read more">
                        <span>আরও দেখুন</span> <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="relation-content-wrapper">
        <div class="container">
            <div class="row g-4">

                <?php
                // Get current post categories IDs
                $categories = wp_get_post_categories(get_the_ID());
                if ($categories) :
                    $related_query = new WP_Query([
                        'category__in' => $categories,
                        'post__not_in' => [get_the_ID()],
                        'posts_per_page' => 3,
                        'ignore_sticky_posts' => 1,
                    ]);

                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post(); ?>

                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                                <div class="single-relation">
                                    <div class="thumb-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('medium');
                                            } else { ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/single-details/relation-default.png" alt="<?php the_title_attribute(); ?>">
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="thumb-content">
                                        <p class="category">
                                            <?php
                                            $cats = get_the_category();
                                            if (!empty($cats)) {
                                                echo '<a href="' . esc_url(get_category_link($cats[0]->term_id)) . '">' . esc_html($cats[0]->name) . '</a>';
                                            }
                                            ?>
                                        </p>
                                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p class="no-related-posts">কোন সম্পর্কিত পোস্ট পাওয়া যায়নি।</p>
                    <?php
                    endif;
                endif;
                ?>

            </div>
        </div>
    </div>
</section>
<!-- Relation Section End Here -->

<!-- Comment Section End Form Here -->