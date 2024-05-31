<section class="hero-section" style="background-image: url('<?php echo get_theme_mod('oneder_hero_image'); ?>');">
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <?php if (get_theme_mod('oneder_hero_button_text')): ?>
            <a href="#contact" class="button"><?php echo get_theme_mod('oneder_hero_button_text'); ?></a>
        <?php endif; ?>
    </div>
</section>

<section class="about-section" id="about">
    <img src="<?php echo get_theme_mod('oneder_about_image'); ?>" alt="About Image">
    <div>
        <h2><?php echo get_theme_mod('oneder_about_heading', __('About Oneder', 'oneder')); ?></h2>
        <p><?php echo wpautop(get_theme_mod('oneder_about_text', __('Your customizable about section text goes here.', 'oneder'))); ?></p>
    </div>
</section>