
<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ONEDER-CUSTOMTHEME
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <div class="menu-icon">
                <i class="fa fa-bars"></i>
            </div>
            <!-- </div> -->
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                ));
                ?>
            </nav>
        </div>
        <div class="sidebar-menu" id="sidebar-menu">
            <button class="close-btn" aria-label="Close menu" >&times;</button>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                ));
                ?>
        </div> 
    </header>
    <div id="content" class="site-content">

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var menuItems = document.querySelectorAll('.primary-menu .menu-item-has-children > a');

                menuItems.forEach(function(menuItem) {
                    menuItem.addEventListener('click', function(event) {
                        if (window.innerWidth <= 992) { // Adjust breakpoint if necessary
                            event.preventDefault();
                            var subMenu = this.nextElementSibling;
                            if (subMenu.style.display === 'block') {
                                subMenu.style.display = 'none';
                            } else {
                                subMenu.style.display = 'block';
                            }
                        }
                    });
                });
            });
        </script>

        <!-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const menuIcon = document.querySelector('.menu-icon');
                const navbar = document.querySelector('.main-navigation ul');
                
                menuIcon.addEventListener('click', function() {
                    navbar.classList.toggle('active');
                });

      
            });
        </script> -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.menu-icon');
    const sidebarMenu = document.getElementById('sidebar-menu');
    const closeBtn = sidebarMenu.querySelector('.close-btn');
 
    menuIcon.addEventListener('click', function() {
        sidebarMenu.classList.toggle('open');
    });
 
    closeBtn.addEventListener('click', function() {
        sidebarMenu.classList.remove('open');
    });
 
    // Close sidebar when clicking outside of it
    window.addEventListener('click', function(e) {
        if (!sidebarMenu.contains(e.target) && !menuIcon.contains(e.target)) {
            sidebarMenu.classList.remove('open');
        }
    });
});
</script>
