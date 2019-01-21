<?php
	$args = array(
		'post_type' => 'page'
	);
	$pages = new WP_Query($args);
	if($pages->have_posts()):
?>
<header>
	<div id="btns-mobile">
		<?php $logo = get_field('logo', 'option'); ?>
		<?php if ($logo): ?>
		<div class="logo">
			<a href="<?php echo site_url(); ?>">
				<img src="<?php echo $logo['sizes']['medium']; ?>" alt="">
			</a>
		</div>
		<?php endif; ?>
		<a href="#" class="btn-menu">
			<span></span>
			<span></span>
			<span></span>
		</a>
	</div>
	<nav id="first-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</nav>
	<?php $modulos = get_field('modulo'); ?>
	<?php if ($modulos): ?>
	<nav id="second-menu" class="menu-modules">
		<div class="placeholder">
			<p><?php echo $modulos[0]['titulo'] ?></p>
		</div>
		<ul>
			<?php
				$cont = 1; foreach ($modulos as $modulo):
				$title = $modulo['titulo'];
			?>
			<li>
				<a href="<?php echo '#' . link_page($title); ?>" class="<?php if($cont == 1) { echo 'current'; }; ?>"><?php echo $modulo['titulo']; ?></a>
			</li>
			<?php $cont++; endforeach; ?>
		</ul>
	</nav>
	<?php endif; ?>
</header>
<?php wp_reset_query(); endif; ?>