<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ufp_generator
 */

?>

<!-- // TODO Add menus to footer  -->
<!-- // TODO Add Contacts  -->

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="footer__logo">
				<img src="<?php bloginfo( 'template_url' ) ?>/assets/img/logo-monochrom.png" alt="">
			</div>

		</div>
	</div>
</footer>

<!-- <footer class="footer">
	<div class="container">
		<div class="row">
			<div class="footer__logo">
				<picture>
					<source srcset="<?php bloginfo('template_url') ?>/assets/img/logo__white.webp" type="image/webp"><img
						src="<?php bloginfo('template_url') ?>/assets/img/logo__white.png" alt="">
				</picture>
				<div class="copywrite">© UFP project
					<?php echo get_the_date('Y') ?>
				</div>
			</div>
			<div class="footer__cats">
				<?php wp_nav_menu(array('theme_location' => 'menu-3', 'menu_class' => 'nav-menu')); ?>
			</div>
			<div class="footer__menu">
				<?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_class' => 'nav-menu')); ?>
			</div>
			<div class="footer__contacts">
				<ul>
					<li>
						<?php if (have_rows('telefony', 30)): ?>
							<?php while (have_rows('telefony', 30)):
								the_row(); ?>
								<?php if (get_sub_field('pokazaty_v_futeri')) { ?>
									<a href="<?php the_sub_field('telefon'); ?>">
										<span>
											<picture>
												<source srcset="<?php bloginfo('template_url') ?>/assets/img/icon-phone__white.webp"
													type="image/webp"><img src="<?php bloginfo('template_url') ?>/assets/img/icon-phone__white.png"
													alt="">
											</picture>
										</span>
										<?php the_sub_field('telefon'); ?>
									</a>
								<?php } ?>
							<?php endwhile; ?>
						<?php endif; ?>

					</li>
					<li>
						<?php if (have_rows('emejly', 30)): ?>
							<?php while (have_rows('emejly', 30)):
								the_row(); ?>
								<?php if (get_sub_field('pokazaty_v_futeri')) { ?>
									<a href="<?php the_sub_field('emejl'); ?>">
										<span>
											<picture>
												<source srcset="<?php bloginfo('template_url') ?>/assets/img/icon-email__white.webp"
													type="image/webp"><img src="<?php bloginfo('template_url') ?>/assets/img/icon-email__white.png"
													alt="">
											</picture>
										</span>
										<?php the_sub_field('emejl'); ?>
									</a>
								<?php } ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer> -->

<!-- 
<div style="display:none">
	<div id="order-coll" class="popup">
		<?php if (get_locale() == 'uk') { ?>
			<?php echo do_shortcode('[contact-form-7 id="161" title="Замовити дзвінок ua"]'); ?>
		<?php } else if (get_locale() == 'ru_RU') { ?>
			<?php echo do_shortcode('[contact-form-7 id="244" title="Замовити дзвінок ru"]'); ?>
		<?php } else if (get_locale() == 'en_US') { ?>
			<?php echo do_shortcode('[contact-form-7 id="415" title="Замовити дзвінок en"]'); ?>
		<?php } else if (get_locale() == 'pl_PL') { ?>
			<?php echo do_shortcode('[contact-form-7 id="416" title="Замовити дзвінок pl"]'); ?>
		<?php } ?>
	</div>
</div> -->



<script src="https://code.jquery.com/jquery-3.6.4.min.js?_v=20230316091001"
	integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script type="text/javascript"
	src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js?_v=20230316091001"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/app.min.js"></script>
<link rel="stylesheet" type="text/css"
	href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css?_v=20230316091001" />

<?php wp_footer(); ?>

</body>

</html>