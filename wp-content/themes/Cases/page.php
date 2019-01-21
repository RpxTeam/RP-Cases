<?php
/**
 * @package Breno_Franca
 */

get_header();
if(have_posts()): ?>
<main id="page" class="page">
	<?php while(have_posts()): the_post(); ?>
		<?php get_template_part('template-parts/content', 'aside'); ?>
		<?php get_template_part('template-parts/content', 'main'); ?>
	<?php endwhile; ?>
</main>
<?php
endif;
get_footer();
?>