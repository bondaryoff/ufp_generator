<?php
/**
 *
 * Template Name: Головна
 * // NOTE: Template Name: Головна
 *
 */
;?>
<!-- <div class="pPixel" data-show="true">
	<div class="pPixel__img" data-img="<?php bloginfo('template_url');?>/notes/ppixel/Home.jpg" data-position="50% 0px"
		data-height="15000px" data-opacity=".5">
	</div>
</div> -->
<?php get_header();?>
<main class="homepage">

	<!-- // TODO Add single slider mode  -->
	<!-- START PROMO -->
	<div class="promo" id="promo">
		<div class="container">
			<div class="promo__slider">
				<?php $slajder = get_field('slajder');?>
				<?php foreach ($slajder as $slajde) {?>
				<section class="promo__box">
					<div class="promo__grid">
						<div class="promo__infowr">
							<div class="promo__info">
								<h1><?php echo $slajde['promo_zagolovok']; ?> <span><?php echo $slajde['promo_zprice']; ?></span></h1>
								<div class="promo__description">
									<?php echo $slajde['promo_subzagolovok']; ?>
								</div>
								<div class="promo__btn">
									<a href="<?php echo $slajde['promo_btn_link']; ?>"
										class="btn"><?php echo $slajde['promo_btn_text']; ?></a>
								</div>
							</div>
						</div>

						<div class="promo__imgwr">
							<div class="promo__img">
								<img src="<?php echo $slajde['promo_zobrazhennya']; ?>" alt="">
							</div>
						</div>
					</div>
				</section>
				<?php }?>
			</div>
		</div>
	</div>
	<!-- END PROMO -->

	<!-- START ABOUT -->
	<div class="about" id="about">
		<div class="container">
			<div class="row">
				<div class="about__info">

					<?php if (get_field('about_zagolovok')): ?>
					<h2><?php echo get_field('about_zagolovok'); ?></h2>
					<?php endif;?>

					<?php if (get_field('about_tekst_1')): ?>
					<div class="about__text1">
						<?php echo get_field('about_tekst_1'); ?>
					</div>
					<?php endif;?>

					<?php if (get_field('about_tekst_2')): ?>
					<div class="about__text2">
						<?php echo get_field('about_tekst_2'); ?>
					</div>
					<?php endif;?>

				</div>
				<div class="about__img">

					<?php if (get_field('about_zobrazhennya')): ?>
					<img src="<?php print_r(get_field('about_zobrazhennya')['sizes']['about-img']);?>" alt="">
					<?php endif;?>

				</div>


			</div>
		</div>
	</div>
	<!-- END ABOUT -->

	<!-- START SERVICES -->
	<div class="services" id="services">
		<div class="container">
			<div class="row">
				<?php if (get_field('cervice_zagolovok')): ?>
				<h2><?php echo get_field('cervice_zagolovok'); ?></h2>
				<?php endif;?>
				<div class="services__box">
					<div class="services__grid">
						<?php $cervice = get_field('cervice');?>
						<?php if ($cervice) {?>
						<?php foreach ($cervice as $cervice) {?>

						<div class="services__item">
							<div class="services__img">
								<img src="<?php echo $cervice['ikonka']; ?>" alt="<?php echo $cervice['zagolovok']; ?>">

							</div>
							<div class="services__text">
								<h3><?php echo $cervice['zagolovok']; ?></h3>
								<?php echo $cervice['tekst']; ?>
							</div>
						</div>

						<?php }?>
						<?php }?>
					</div>

					<?php if (get_field('cervice_tekst_knopky')): ?>
					<a href="<?php echo get_field('cervice_posylannya'); ?>"
						class="btn"><?php echo get_field('cervice_tekst_knopky'); ?></a>
					<?php endif;?>

				</div>
			</div>
		</div>
	</div>
	<!-- END SERVICES -->

	<!-- START R-PROJECTS -->
	<div class="r-projects">
		<div class="container">

			<?php if (get_field('proj_zagolovok')): ?>
			<h2><?php echo get_field('proj_zagolovok'); ?></h2>
			<?php endif;?>

			<?php if (get_field('proj_opys')): ?>
			<div class="r-projects__description">
				<?php echo get_field('proj_opys'); ?>
			</div>
			<?php endif;?>


			<?php $args  = ['posts_per_page' => 2, 'post_type' => 'projects'];?>
			<?php $query = new WP_Query($args);?>

			<?php if ($query->have_posts()): ?>
			<?php while ($query->have_posts()): $query->the_post();?>
			<div class="r-projects__item">

				<div class="r-projects__info">
					<h3><?php the_title();?></h3>

					<div class="r-projects__content">
						<?php the_content();?>
					</div>

					<a href="" class="btn">Дізнатися більше</a>
				</div>

				<?php if (get_field('golovne_zobrazhennya')): ?>
				<div class="r-projects__img">
					<img src="<?php echo get_field('golovne_zobrazhennya')['sizes']['project-img']; ?>" alt="">
				</div>
				<?php endif;?>

			</div>

			<?php endwhile;?>
			<?php endif;?>
		</div>
	</div>
	<!-- END R-PROJECTS -->

</main>
<?php get_footer();?>