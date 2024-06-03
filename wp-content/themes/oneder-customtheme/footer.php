<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ONEDER-CUSTOMTHEME
 */

?>

<footer id="colophon" class="site-footer">
		<div class="text-white pt-5 pb-5">

			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-4">
						<?php dynamic_sidebar('footer-widget-col-one'); ?>
					</div>

					<div class="col=sm-4 col-sm-2">
						<?php dynamic_sidebar('footer-widget-col-two'); ?>
					</div>

					<div class="col-sm-6 col-md-3">
						<?php dynamic_sidebar('footer-widget-col-three'); ?> 
					</div>

                    <div class="col-sm-6 col-md-3">
						<?php dynamic_sidebar('footer-widget-col-four'); ?> 
					</div>
				</div>
			</div>
		</div>

		<hr class= "footer-divider">

		<div class="container pt-2 pb-2">
		<div class="row d-flex align-items-center">
			<div class="col">
				<p>&copy: <?php bloginfo ('name');?> <?php echo date('Y;');?>/Created by <a href="" target ="_blank">Athena Rodrigues, Durgesh Prabhugaonkar</a>
			</div>
		</div>
    </footer>
	

    </div><!-- #page -->
    <?php wp_footer(); ?>
</body>
</html>