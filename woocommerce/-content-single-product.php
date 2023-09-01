<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="product-single-top">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action('woocommerce_before_single_product_summary');
		?>

		<div class="summary entry-summary">
			<div class="entry-summary-inner">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action('woocommerce_single_product_summary');
				?>

			</div>


		</div>
	</div>

	<div class="product-single-top">

		<ul class="product-single-thumbs">
			<?php
			$attachment_t_id = get_post_thumbnail_id();
			echo '<li><a href="'. wp_get_attachment_url($attachment_t_id, 'full') .'">' . wp_get_attachment_image($attachment_t_id, 'prod-galary') . '</a></li>';

			$attachment_ids = $product->get_gallery_image_ids();
			if ($attachment_ids && $product->get_image_id()) {
				foreach ($attachment_ids as $attachment_id) {
					echo '<li><a href="'. wp_get_attachment_url($attachment_id, 'full') .'">' . wp_get_attachment_image($attachment_id, 'prod-galary') . '</a></li>';
				}
			}
			?>
		</ul>
		<div class="infobloky__wr">
			<?php if (have_rows('infobloky', 'option')): ?>
			<div class="infobloky">

				<?php while (have_rows('infobloky', 'option')):
					the_row(); ?>
				<div class="infobloky__item">
					<div class="infobloky__title">
						<?php if (get_locale() == 'uk') { ?>
						<?php the_sub_field('zagolovok', 'option'); ?>
						<?php } else if (get_locale() == 'ru_RU') { ?>
						<?php the_sub_field('zagolovok_ru', 'option'); ?>
						<?php } else if (get_locale() == 'en_US') { ?>
						<?php the_sub_field('zagolovok_en', 'option'); ?>
						<?php } else if (get_locale() == 'pl_PL') { ?>
						<?php the_sub_field('zagolovok_pl', 'option'); ?>
						<?php } ?>
					</div>
					<div class="infobloky__text">
						<?php if (get_locale() == 'uk') { ?>
						<?php the_sub_field('tekst', 'option'); ?>
						<?php } else if (get_locale() == 'ru_RU') { ?>
						<?php the_sub_field('tekst_ru', 'option'); ?>
						<?php } else if (get_locale() == 'en_US') { ?>
						<?php the_sub_field('tekst_en', 'option'); ?>
						<?php } else if (get_locale() == 'pl_PL') { ?>
						<?php the_sub_field('tekst_pl', 'option'); ?>
						<?php } ?>
					</div>
				</div>

				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>