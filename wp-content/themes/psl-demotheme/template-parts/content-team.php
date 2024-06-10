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