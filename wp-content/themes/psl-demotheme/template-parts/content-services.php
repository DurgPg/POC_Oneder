<section class="services-section" id="services">
    <div class="container">
        <h2 class="section-title"><?php _e('Our Services', 'oneder'); ?></h2>
        <div class="services">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1,
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