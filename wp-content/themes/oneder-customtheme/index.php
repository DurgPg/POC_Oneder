<?php get_header(); ?>

<div class="hero-section" style="background-image: url('<?php echo get_theme_mod('hero_background_image'); ?>');">
    <?php if (get_theme_mod('hero_text')) : ?>
        <h1><?php echo get_theme_mod('hero_text'); ?></h1>
    <?php endif; ?>
    <?php if (get_theme_mod('show_get_in_touch_button')) : ?>
        <a href="#contact" class="button">Get In Touch</a>
    <?php endif; ?>
</div>

<!-------------------------------------- ABOUT US  ----------------------------------------->

<div id="about-section" class="about-section">
    <div class="section-title">
        <?php if (get_theme_mod('about_title')) : ?>
            <h2><?php echo get_theme_mod('about_title'); ?></h2>
        <?php endif; ?>
    </div>

    <div class="about-content" id="about-content">
        <div class="about-image">
            <img src="<?php echo get_theme_mod('about_image'); ?>" alt="About Image">
        </div>
        <div class="about-text">
            <p><?php echo wp_kses_post(wpautop(get_theme_mod('about_text', __('Your customizable about section text goes here.', 'oneder')))); ?></p>
            <?php if (get_theme_mod('about_button_text')) : ?>
                <a href="#contact" class="button"><?php echo esc_html(get_theme_mod('about_button_text')); ?></a>
            <?php endif; ?>

            <!-- <?php if (get_theme_mod('show_get_in_touch_button')) : ?>
                    <a href="#contact" class="button">Get In Touch</a>
                <?php endif; ?> -->
        </div>
    </div>
</div>


<!-------------------------------------- TEAM SECTION  ----------------------------------------->



<section class="team-section" id="team">
    <div class="container">
        <h2 class="section-title"><?php _e('Our Team', 'oneder'); ?></h2>
        <p class="section-description"><?php _e('Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.', 'oneder'); ?></p>
        <div class="team-members">
            <?php
            $args = array(
                'post_type' => 'team_member',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'title'
            );
            $team_query = new WP_Query($args);
            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $position = get_field('position');
                    $facebook_url = get_field('facebook_url');
                    $twitter_url = get_field('twitter_url');
                    $linkedin_url = get_field('linkedin_url');
                    $instagram_url = get_field('instagram_url');
            ?>
                    <div class="team-member">
                        <div class="team-member-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php endif; ?>
                            <div class="team-member-socials">
                                <?php if ($facebook_url) : ?>
                                    <a href="<?php echo esc_url($facebook_url); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if ($twitter_url) : ?>
                                    <a href="<?php echo esc_url($twitter_url); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if ($linkedin_url) : ?>
                                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                                <?php endif; ?>
                                <?php if ($instagram_url) : ?>
                                    <a href="<?php echo esc_url($instagram_url); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h3 class="team-member-name"><?php the_title(); ?></h3>
                            <?php if ($position) : ?>
                                <p class="team-member-position"><?php echo esc_html($position); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                _e('No team members found.', 'oneder');
            endif;
            ?>
        </div>
    </div>
</section>
<hr>


<!-------------------------------------- PORTFOLIO  ----------------------------------------->


<div id="portfolio" class="portfolio-section">
    <h2>Portfolio</h2>
    <div id="filters" class="filters text-center button-group col-md-7">
        <button class="btn btn-primary active" id="filter-button" data-filter="*">All</button>
        <?php
        $categories = get_terms('portfolio_type');
        if (!is_wp_error($categories) && !empty($categories)) {
            foreach ($categories as $category) {
                echo '<button class="btn btn-primary" id="filter-button" data-filter="type-' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
            }
        } else {
            echo '<p>No categories found.</p>';
        }
        ?>
    </div>
    <div class="portfolio-items">
        <?php
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
            // 'tax_query' => array(
            //     'relation' => 'OR',
            //     array(
            //         'taxonomy' => 'portfolio_type',
            //         'field' => 'slug',
            //         'terms' => 'web',
            //     ),
            //     array(
            //         'taxonomy' => 'portfolio_type',
            //         'field' => 'slug',
            //         'terms' => 'design',
            //     ),
            //     array(
            //         'taxonomy' => 'portfolio_type',
            //         'field' => 'slug',
            //         'terms' => 'brand',
            //     ),

            // ),
        );
        $portfolio_query = new WP_Query($args);
        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                $portfolio_type = get_the_terms(get_the_ID(), 'portfolio_type');
                $portfolio_classes = '';
                if (!is_wp_error($portfolio_type) && !empty($portfolio_type)) {
                    foreach ($portfolio_type as $type) {
                        $portfolio_classes .= 'type-' . esc_attr($type->slug) . '';
                    }
                }
        ?>
                <div class="portfolio-item <?php echo trim($portfolio_classes); ?>">
                    <img class="portfolio-image" src="<?php
                                                        the_post_thumbnail_url('full');
                                                        ?>" alt="<?php the_title(); ?>" />
                    <div class="portfolio-overlay">
                        <a href="#" target="_blank"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>

                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No portfolio items found.</p>';
        endif;
        ?>
    </div>
</div>


<!-------------------------------------- SERVICES  ----------------------------------------->


<section class="services-section" id="services">
    <div class="container">
        <h2 class="section-title"><?php _e('Our Services', 'oneder'); ?></h2>
        <div class="services">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                // 'order' => 'ASC',
                // 'orderby' => 'title'
            );
            $service_query = new WP_Query($args);
            if ($service_query->have_posts()) :
                while ($service_query->have_posts()) : $service_query->the_post();
                    $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
            ?>
                    <div class="service-item">
                        <div class="service-item-icon">
                            <?php if ($service_icon) : ?>
                                <i class="<?php echo esc_attr($service_icon); ?>"></i>
                            <?php endif; ?>
                        </div>
                        <div class="service-item-info">
                            <h3 class="service-name"><?php the_title(); ?></h3>
                            <div class="service-description"><?php the_content(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="learn-more"><?php _e('Learn More', 'textdomain'); ?></a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                _e('No services found.', 'oneder');
            endif;
            ?>
        </div>
    </div>
</section>


<!-------------------------------------- FAQ  ----------------------------------------->


<section class="faq-section" id="faq">
    <div class="container">
        <h2 class="section-title"><?php _e('Frequently Asked Questions', 'oneder'); ?></h2>
        <div class="faq">
            <div class="faq-info">
                <h3 class="faq-question">Can I accept both Paypal and Stripe?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">Where are you from?</h3>
                <div class="faq-answer">Voluptatum nobis obcaecati perferendis dolor totam unde dolores quod maxime corporis officia et. Distinctio assumenda minima maiores.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">What available is refund period?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">What is your opening time?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">Can I accept both Paypal and Stripe?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">What available is refund period?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">Can I accept both Paypal and Stripe?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
            <div class="faq-info">
                <h3 class="faq-question">What available is refund period?</h3>
                <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</div>
            </div>
        </div>
    </div>
</section>


<!-------------------------------------- BLOGS  ----------------------------------------->


<section class="blog-section" id="blog">
    <div class="container">
        <h2 class="section-title"><?php _e('Our Blog', 'your-theme-textdomain'); ?></h2>
        <div class="blog-posts">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="blog-post">
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="post-meta">
                        <span class="author">By <?php the_author(); ?></span>
                        <span class="mx-2">•</span>
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <span class="mx-2">•</span>
                        <span class="category"><?php the_category(', '); ?></span>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="continue-reading">Continue Reading...</a>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filters .btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                filterButtons.forEach(btn =>
                    btn.classList.remove('active'));
                this.classList.add('active');

                portfolioItems.forEach(item => {
                    if (filter === '*') {
                        item.style.display = 'block';
                    } else {
                        if (item.classList.contains(filter)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
</script>

<!-------------------------------------- TESTIMONIALS  ----------------------------------------->


<div id="testimonial" class="container">
    <h1>Testimonials</h1>
    <!-- <?php sp_testimonial( 41 );?> -->
    <?php sp_testimonial( 9 );?>

</div>

<!-------------------------------------- CONTACT US ------------------------------------------->

<div id="contact-us" class="container">
    <h2>Contact Us</h2>
    <h3>Contact Form</h3>


    <?php echo do_shortcode('[wpforms id="23"]'); ?>
</div>

<?php get_footer(); ?>