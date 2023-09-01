<?php
/**
 * Template Name: Наші постачальники
 * //NOTE: Наші постачальники
 *
 */
;?>
<!-- <div class="pPixel" data-show="true">
	<div class="pPixel__img" data-img="<?php bloginfo('template_url');?>/notes/ppixel/Partners.jpg"
		data-position="50% 0px" data-height="15000px" data-opacity=".5">
	</div>
</div> -->
<?php get_header();?>
<div class="contacts">
	<div class="container">

		<?php
if (function_exists('yoast_breadcrumb')) {
  yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
}
?>


		<!-- START PARTNERS -->
		<div class="partners">
			<div class="container">
				<?php $postachalnyky = get_field('postachalnyky'); ?>
				<?php foreach ($postachalnyky as $postachalnyky) { ?>
				<div class="partners__item">
					<div class="partners__logo">
						<img src="<?php echo $postachalnyky['zobrazhennya']['sizes']['partner-logo']; ?>" alt="">
						
					</div>
					<div class="partners__text">
						<?php echo $postachalnyky['opys']; ?>
					</div>

				</div>
				<?php } ?>

				<a href="/shop/" class="btn">Перейти до генераторів</a>
			</div>
		</div>
		<!-- END PARTNERS -->



	</div>
</div>
<?php get_footer();?>