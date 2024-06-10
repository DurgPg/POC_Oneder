
<?php

use function Elementor\echo_select_your_structure_title;

get_header(); ?>

<div class="hero-section" style="background-image: url('<?php echo get_theme_mod('hero_background_image'); ?>');">
    <?php if (get_theme_mod('hero_text')) : ?>
        <h1><?php echo get_theme_mod('hero_text'); ?></h1>
    <?php endif; ?>
    <?php if (get_theme_mod('show_get_in_touch_button')) : ?>
        <a href="#contact" class="button">Get In Touch</a>
    <?php endif; ?>
</div>


<?php
get_template_part('template-parts/content', 'about');
get_template_part('template-parts/content', 'team');
get_template_part('template-parts/content', 'portfolio');
get_template_part('template-parts/content', 'services');
get_template_part('template-parts/content', 'testimonials');
get_template_part('template-parts/content', 'pricing');
get_template_part('template-parts/content', 'faq');
get_template_part('template-parts/content', 'blog');
get_template_part('template-parts/content', 'contact');
?>



<!-- ----------------------------------------------------------------------------------------- -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('#menu-header-menu a');

        function removeActiveClasses() {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
        }

        function addActiveClass(id) {
            const link = document.querySelector(`#menu-header-menu a[href="#${id}"]`);
            if (link) {
                link.classList.add('active');
            }
        }

        function onScroll() {
            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - sectionHeight / 3) {
                    currentSection = section.getAttribute('id');
                }
            });

            removeActiveClasses();
            addActiveClass(currentSection);
        }

        window.addEventListener('scroll', onScroll);

        // Handle initial load
        onScroll();

        // Smooth scrolling and active link update on click
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);

                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop,
                        behavior: 'smooth'
                    });

                    removeActiveClasses();
                    addActiveClass(targetId);
                }
            });
        });
    });
</script>


<?php get_footer(); ?>