<div class="posts-section" style="background-image: url('<?php echo get_theme_mod('hero_background_image'); ?>');">
    <h1 class="post-title">
        <?php the_title(); ?>
    </h1>
    <div class="post-meta">
        <span class="date"><?php echo get_the_date(); ?></span>
        <span class="mx-2">•</span>
        <span class="author">POSTED BY <a href="#"><?php the_author(); ?></a></span>
        IN
        <span class="category"><a href="#"><?php the_category(', '); ?></a></span>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="content-area">
                <div class="post-thumbnail">

                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>

                </div>
                <div class="post-content">
                    <?php the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'oneder-customtheme'),
                        'after'  => '</div>',
                    )) ?>
                </div>
                <div class="categories-tags">
                    Categories:
                    <?php the_category(','); ?>
                    Tags:
                    <?php the_tags('<span class="tag-links">', ',', '</span>'); ?>
                </div>
            </div>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </div>