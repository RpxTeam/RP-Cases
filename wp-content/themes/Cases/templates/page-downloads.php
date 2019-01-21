<?php
/*
 * Template Name: Downloads
 */
get_header();
$url = get_template_directory_uri() ."/assets/img/";
$args = array(
	'post_type' => 'arquivos'
);
$query = new WP_Query($args);
if ($query->have_posts()): ?>
<main id="downloads" class="page">
	<?php while($query->have_posts()): $query->the_post(); ?>
		<?php get_template_part('template-parts/content', 'aside'); ?>
	<div id="content">
		<?php get_template_part( 'template-parts/content', 'menu' ); ?>
		<div class="title" data-bg="<?php echo $url; ?>bg-title.jpg">
			<h1>
				<?php the_title(); ?>
			</h1>
		</div>
		<?php $descricao = get_field('descricao'); ?>
		<?php if ($descricao): ?>
		<div id="description">
			<p><?php echo $descricao; ?></p>
		</div>
		<?php endif; ?>
		<?php $downloads = get_field('arquivo'); ?>
		<?php if ($downloads): ?>
		<div class="downloads">
			<?php foreach ($downloads as $download): ?>
			<div class="download">
				<?php if($download['imagem']){
						$icon = $download['imagem']['url'];
					} else {
						$icon = $url . 'logo.png';
					}
				?>
				<?php if ($download['nome']): ?>
					<h3><?php echo $download['nome']; ?></h3>
				<?php endif; ?>
				<div class="icone" data-bg="<?php echo $icon; ?>"></div>
				<div class="text">
					<?php if ($download['descricao']): ?>
						<p><?php echo $download['descricao']; ?></p>
					<?php endif; ?>
					<?php if($download['arquivo']): ?>
						<a href="<?php echo $download['arquivo']['url']; ?>" download>
							Download
							<img src="<?php echo $url; ?>icon-download.png" alt="">
						</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	<?php endwhile; ?>
</main>
<?php endif;
get_footer(); ?>