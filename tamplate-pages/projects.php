<?php
/**
 * Template Name: Реалізовані проекти
 * //NOTE: Реалізовані проекти
 *
 */
;?>
<!-- <div class="pPixel" data-show="true">
	<div class="pPixel__img" data-img="<?php bloginfo('template_url');?>/notes/ppixel/Projects.jpg"
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


		<!-- START PROJECTS -->
		<div class="projects">
			<div class="container">

				<?php if (get_field('proj_zagolovok')): ?>
				<h2><?php echo get_field('proj_zagolovok'); ?></h2>
				<?php endif;?>

				<?php if (get_field('proj_opys')): ?>
				<div class="projects__description">
					<?php echo get_field('proj_opys'); ?>
				</div>
				<?php endif;?>


				<?php $args  = ['post_type' => 'projects'];?>
				<?php $query = new WP_Query($args);?>

				<?php if ($query->have_posts()): ?>
				<?php while ($query->have_posts()): $query->the_post();?>
				<div class="projects__item">

					<?php if (get_field('golovne_zobrazhennya')): ?>
					<div class="projects__img">
						<img src="<?php echo get_field('golovne_zobrazhennya')['sizes']['project-thumbnails']; ?>" alt="">
					</div>
					<?php endif;?>

					<div class="projects__info">
						<div class="projects__box">

							<h3><?php the_title();?></h3>
							<div class="projects__content">
								<?php the_content();?>
							</div>

						</div>
					</div>
				</div>

				<?php endwhile;?>
				<?php endif;?>

      <!-- // TODO add pagination  -->

      <a href="" class="btn">Замовити консультацію</a>
			</div>
		</div>
		<!-- END PROJECTS -->



	</div>
</div>
<?php get_footer();?>