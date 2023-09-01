<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());
global $post;
if (!empty($product_tabs)) { ?>

<div class="woocommerce-tabs">
	<?php foreach ($product_tabs as $key => $product_tab) { ?>


	<div class="woocommerce-tabs-row">
		<div class="woocommerce-tabs-title">
			<?php if ($product_tab['title'] == 'Додаткова інформація') { ?>
			Характеристики:
			<?php } else { ?>
			<?php echo $product_tab['title'] ?>
			<?php } ?>
		</div>
		<div class="woocommerce-tabs-text">
			<?php call_user_func($product_tab['callback'], $key); ?>
		</div>
	</div>
	<?php } ?>

	<?php if (have_rows('materialy_dlya_zavantazhennya')): ?>
	<div class="woocommerce-tabs-row">
		<div class="woocommerce-tabs-title">
		<?php if (get_locale() == 'uk') { ?>
			Матеріали для завантаження:
		<?php } else if (get_locale() == 'ru_RU') {  ?>
			Материалы для загрузки
		<?php } else if (get_locale() == 'en_US') { ?>
			Downloadable materials
		<?php } else if (get_locale() == 'pl_PL') {  ?>
			Materiały do pobrania
		<?php } ?>
		</div>
		<div class="woocommerce-tabs-text">
			<?php while (have_rows('materialy_dlya_zavantazhennya')):
						the_row(); ?>
			<div class="woocommerce-tabs-item">
				<a href="<?php the_sub_field('material_dlya_zavantazhennya'); ?>">
					<img src="<?php bloginfo('template_url') ?>/assets/img/document.png" alt="">
					<span>
						<?php the_sub_field('nazva_materialu'); ?>
					</span>
					<img src="<?php bloginfo('template_url') ?>/assets/img/download.png" alt="">
				</a>
			</div>


			<?php endwhile; ?>

		</div>
		<?php endif; ?>
	</div>
	<?php } ?>