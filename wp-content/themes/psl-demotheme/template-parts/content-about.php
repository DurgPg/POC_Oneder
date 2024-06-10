<section id="about-section" class="about-section">
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
        </div>
    </div>
</section>