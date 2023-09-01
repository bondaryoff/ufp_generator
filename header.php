<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ufp_generator
 */

;?>

<!doctype html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/style.min.css">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>

	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="header__logo">

						<!-- // TODO add logo to customize  -->
						<a href="<?php bloginfo('url');?>">
							<picture>
								<source type="image/webp" srcset="<?php bloginfo('template_url');?>/assets/img/logo.webp 1x,
													<?php bloginfo('template_url');?>/assets/img/logo@2X.webp 2x">
								<img alt="" src="<?php bloginfo('template_url');?>/assets/img/logo.png 1x,
											<?php bloginfo('template_url');?>/assets/img/logo.png 2x">
							</picture>
						</a>
					</div>
					<!-- // TODO: Integrane contacts to wordpress  -->
					<div class="header__contacts header__contacts--email">
						<a href="mailto:kupin.ufp@gmail.com">kupin.ufp@gmail.com</a>
						<a href="mailto:director.ufp@gmail.com">director.ufp@gmail.com</a>
					</div>
					<div class="header__contacts header__contacts--phone">
						<a href="tel:044-496-28-20">044-496-28-20</a>
						<a href="tel:+38 067 344-12-67">+38 067 344-12-67</a>
					</div>
					<div class="header__btn">

						<!-- //TODO: Add translate for button text -->
						<?php if (pll_current_language() == 'uk') {?>
						<a href="" class="btn btn--coll">Замовити дзвінок</a>
						<?php } else if (pll_current_language() == 'ru') {?>
						<a href="" class="btn btn--coll">Замовити дзвінок</a>
						<?php } else if (pll_current_language() == 'en') {?>
						<a href="" class="btn btn--coll">Замовити дзвінок</a>
						<?php }?>

					</div>
				</div>
			</div>
		</div>

		<!--  -->

		<div class="header__bottom">
			<div class="container">
				<div class="row">

					<nav class="header__nav">
						<?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_class' => 'nav-menu'));?>
					</nav>

					<div class="header__lang">
						<ul>
							<?php pll_the_languages();?>
						</ul>
					</div>
				</div>



				<!-- <div class="header__menuBtn" id="mobile-menu-btn" style="display:none">
					<span></span>
					<span></span>
					<span></span>
				</div> -->
			</div>
		</div>

	</header>