<?php
/**
 * The template for displaying WooCommerce pages.
 *
 * This template can be overridden by copying it to ufp_generator/woocommerce.php.
 *
 * @package ufp_generator
 */

get_header(); ?>

<!-- <div class="pPixel" data-show="true">
	<div class="pPixel__img" data-img="<?php bloginfo('template_url');?>/notes/ppixel/Single-product.jpg"
		data-position="50% 0px" data-height="15000px" data-opacity=".5">
	</div>
</div> -->

<?php if (!is_single()) { ?>

<div class="container">
	<div class="breadcrunbs">
		<ul>
			<li><a
					href="<?php bloginfo('url') ?>"><?php if (get_locale() == 'uk') { ?>Головна<?php } else if (get_locale() == 'ru_RU') {?>Главная<?php } else if (get_locale() == 'en_US') { ?>Home<?php } ?></a>
			</li>
			<b>/</b>
			<!-- <li><a
					href="/rezervuary/"><?php if (get_locale() == 'uk') { ?>Резервуари<?php } else if (get_locale() == 'ru_RU') {?>Резервуары<?php } else if (get_locale() == 'en_US') { ?>Tanks<?php } else if (get_locale() == 'pl_PL') { ?>Zbiorniki<?php } ?></a>
			</li> -->
			<b>/</b>
			<li><span>
					<?php the_title(); ?>
				</span></li>
		</ul>
	</div>
	<main id="shop">
		<?php woocommerce_content(); ?>
	</main>
	<a href="" class="btn-red">Отримати консультацію</a>
</div>

<?php } else { ?>

	<div class="container">
	<div class="breadcrunbs">
		<ul>
			<li><a
					href="<?php bloginfo('url') ?>"><?php if (get_locale() == 'uk') { ?>Головна<?php } else if (get_locale() == 'ru_RU') {?>Главная<?php } else if (get_locale() == 'en_US') { ?>Home<?php }  ?></a>
			</li>
			<b>/</b>
			<!-- <li><a
					href="/rezervuary/"><?php if (get_locale() == 'uk') { ?>Резервуари<?php } else if (get_locale() == 'ru_RU') {?>Резервуары<?php } else if (get_locale() == 'en_US') { ?>Tanks<?php } else if (get_locale() == 'pl_PL') { ?>Zbiorniki<?php } ?></a>
			</li> -->
			<b>/</b>
			<li><span>
					<?php the_title(); ?>
				</span></li>
		</ul>
	</div>
	<main id="shop-single">
		<?php woocommerce_content(); ?>
	</main>
</div>


<?php } ?>

<?php get_footer(); ?>


//TODO: Add button  
//TODO: Add text  
//TODO: Add price  
//TODO: Add options  
//TODO: remove tab title  