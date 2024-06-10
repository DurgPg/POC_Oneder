<?php
 
get_header();
 
?>
 
<?php if (have_posts()) :
    while (have_posts()) :
        the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
 
        get_template_part('template-parts/content', 'article');
 
 
    endwhile;
endif; // End of the loop.
    ?>
 
 
    <div class="col-md-4">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <aside id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </aside>
        <?php endif; ?>
    </div>
    </div>
    </div>
        </article>
 
 
        <?php
        // get_sidebar();
        get_footer();
 
        ?>