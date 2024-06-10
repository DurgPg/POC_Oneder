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
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>