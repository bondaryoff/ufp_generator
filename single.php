<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ufp_generator
 */

get_header();
?>
<div class="blog-single">
	<?php $cat = get_the_category(); ?>

	<div class="container">
		<div class="breadcrunbs">
			<ul>
				<li><a href="<?php bloginfo('url') ?>"><?php if (get_locale() == 'uk') { ?>Головна<?php } else if (get_locale() == 'ru_RU') { ?>Главная<?php } else if (get_locale() == 'en_US') { ?>Home<?php } else if (get_locale() == 'pl_PL') { ?>Główna<?php } ?></a>
				</li>
				<b>/</b>
				<li>
					<a href="<?php echo get_category_link($cat[0]->term_id) ?>">
						<?php echo $cat[0]->name; ?>
					</a>
				</li>
				<b>/</b>
				<li>
					<span>
						<?php the_title(); ?>
					</span>
				</li>
			</ul>
		</div>
		<h1>
			<?php the_title(); ?>
		</h1>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>


	<?php
	get_footer();