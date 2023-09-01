<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="price-block">
	<?php if (get_locale() == 'uk') { ?>
	<b>Ціна* :</b>
	<?php } else if (get_locale() == 'ru_RU') { ?>
	<b>Цена* :</b>
	<?php } else if (get_locale() == 'en_US') { ?>
	<b>Price* :</b>
	<?php } else if (get_locale() == 'pl_PL') { ?>
	<b>Cena* :</b>
	<?php } ?>
	<p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>">
		<?php if (get_locale() == 'uk') { ?>
			<?php echo "Від " . $product->get_price_html(); ?></p>
		<?php } else if (get_locale() == 'ru_RU') { ?>
			<?php echo "От " . $product->get_price_html(); ?></p>
		<?php } else if (get_locale() == 'en_US') { ?>
			<?php echo "from " . $product->get_price_html(); ?></p>
		<?php } else if (get_locale() == 'pl_PL') { ?>
			<?php echo "Od " . $product->get_price_html(); ?></p>
		<?php } ?>
</div>

<div class="price-descr">
	<?php if (get_locale() == 'uk') { ?>
	<?php if (get_field('tekst_pid_czinoyu','option')): ?>
	<?php echo get_field('tekst_pid_czinoyu','option'); ?>
	<?php endif; ?>

	<?php } else if (get_locale() == 'ru_RU') { ?>
	<?php if (get_field('tekst_pid_czinoyu_ru','option')): ?>
	<?php echo get_field('tekst_pid_czinoyu_ru','option'); ?>
	<?php endif; ?>

	<?php } else if (get_locale() == 'en_US') { ?>
	<?php if (get_field('tekst_pid_czinoyu_en','option')): ?>
	<?php echo get_field('tekst_pid_czinoyu_en','option'); ?>
	<?php endif; ?>

	<?php } else if (get_locale() == 'pl_PL') { ?>
	<?php if (get_field('tekst_pid_czinoyu_pl','option')): ?>
	<?php echo get_field('tekst_pid_czinoyu_pl','option'); ?>
	<?php endif; ?>

	<?php } ?>
</div>
<?php if (get_locale() == 'uk') { ?>
<a href="#calculation" class="btn btn-coll">Отримати розрахунок</a>
<a href="#order" class="btn2 btn-coll">Замовити</a>
<?php } else if (get_locale() == 'ru_RU') { ?>
<a href="#calculation" class="btn btn-coll">Получить расчет</a>
<a href="#order" class="btn2 btn-coll">Заказать</a>
<?php } else if (get_locale() == 'en_US') { ?>
<a href="#calculation" class="btn btn-coll">Get a quote</a>
<a href="#order" class="btn2 btn-coll">To order</a>
<?php } else if (get_locale() == 'pl_PL') { ?>
<a href="#calculation" class="btn btn-coll">Otrzymać wycenę</a>
<a href="#order" class="btn2 btn-coll">Zamówić</a>
<?php } ?>