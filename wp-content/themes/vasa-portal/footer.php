<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vasa_Portal
 */

?>

    <!-- footer Area Start Here -->
    <footer>
        <div class="footer-main-wrapper pt-120">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-logo-wrapper">
                            <div class="footer-logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="<?php bloginfo('name'); ?>">
                                    <?php if (has_custom_logo()) : ?>
                                        <?php the_custom_logo(); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <p>VASA Media: ডিজিটাল মাধ্যমে সৃজনশীলতা, <br>সংবাদ এবং উদ্ভাবনের জন্য আপনার বিশ্বস্ত সঙ্গী।
                            </p>
                            <div class="footer-social">
                                <div class="social-icon-wrapper">
                                    <ul>
                                        <li><a href="#" aria-label="Facebook Icon"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li><a href="#" aria-label="Insta Icon"><i class="ri-instagram-line"></i></a>
                                        </li>
                                        <li><a href="#" aria-label="Linkdin Icon"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                        <li class="active" aria-label="Twiter Icon"><a href="#"><i
                                                    class="ri-twitter-x-line"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-single">
                            <div class="single-title">
                                <h3>মেনু </h3>
                            </div>
                            <div class="single-content">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer',
                                    'menu_class'     => 'footer-menu',
                                    'container'      => false,       // Remove the wrapping <div>
                                    'fallback_cb'    => false,       // Don't fall back to wp_page_menu()
                                ) );
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-single">
                            <div class="single-title">
                                <h3>যোগাযোগ </h3>
                            </div>
                            <div class="single-content">
                                <div class="footer-contact">
                                    <ul>
                                        <li><a href="#"><i class="ri-map-pin-line"></i> <span>ঝিনাইদহ সদর,
                                                    ঝিনাইদহ-৭৩০০</span></a></li>
                                        <li><a href="tel:+8801799608070"><i class="ri-phone-line"></i>
                                                <span>+8801799-608070</span></a></li>
                                        <li><a href="mailto:admin@vasamedia.info"><i class="ri-mail-line"></i>
                                                <span>admin@vasamedia.info</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-single">
                            <div class="single-title">
                                <h3>সাবস্ক্রাইব করুন </h3>
                            </div>
                            <div class="single-content">
                                 
                                <div class="subscribe-form">
                                    <?php echo do_shortcode('[mc4wp_form id="184"]'); ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-section text-center">
                <p>ভাষা মিডিয়া কর্তৃক সর্বস্বত্ব সংরক্ষিত</p>
            </div>
        </div>
    </footer>
    <!-- footer Area End Here -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
