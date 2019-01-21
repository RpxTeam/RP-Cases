<?php
/*
 * Template Name: Modulo
 */
$url = get_template_directory_uri() ."/assets/img/";
get_header();
if (have_posts()):?>
<main id="modules" class="page <?php if(is_page('home')) echo 'home'; ?>">
	<?php while(have_posts()): the_post(); ?>
		<?php get_template_part('template-parts/content', 'aside'); ?>
		<?php get_template_part('template-parts/content', 'main'); ?>
	<?php endwhile; ?>
</main>
<?php endif;
get_footer(); ?>