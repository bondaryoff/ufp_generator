<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ufp_generator
 */

get_header();
?>
<div class="blog">

	<div class="container">
		<div class="breadcrunbs">
			<ul>
				<li><a
						href="<?php bloginfo('url') ?>"><?php if (get_locale() == 'uk') { ?>Головна<?php } else if (get_locale() == 'ru_RU') { ?>Главная<?php } else if (get_locale() == 'en_US') { ?>Home<?php } else if (get_locale() == 'pl_PL') { ?>Główna<?php } ?></a>
				</li>
				<b>/</b>
				<li><span>
						<?php single_cat_title(); ?>
					</span></li>
			</ul>
		</div>
		<div class="tech__h1">
			<h1>
				<?php single_cat_title(); ?>
			</h1>
		</div>
		<div class="blog__grid">
			<?php if (have_posts()) { ?>
			<?php while (have_posts()) {
					the_post(); ?>
			<a href="<?php the_permalink() ?>" class="blog__item">
				<div class="blog__img">
					<?php the_post_thumbnail('blog'); ?>
				</div>
				<h2>
					<?php the_title(); ?>
				</h2>
			</a>

			<?php } ?>
			<?php } else { ?>
			<?php } ?>
		</div>


	</div>
</div>


<?php
get_footer();