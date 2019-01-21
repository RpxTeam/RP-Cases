<aside>
	<div class="grid">
		<?php $logo = get_field('logo', 'option'); ?>
		<?php if ($logo): ?>
		<div class="logo">
			<a href="<?php echo site_url(); ?>">
				<img src="<?php echo $logo['sizes']['medium']; ?>" alt="">
			</a>
		</div>
		<?php endif; ?>
		<?php $modulos = get_field('modulo'); ?>
		<?php if ($modulos): ?>
		<nav class="menu-modules">
			<ul>
				<?php
					$cont = 1; foreach ($modulos as $modulo):
					$title = $modulo['titulo'];
				?>
				<li>
					<a href="<?php echo '#modulo' . $cont; ?>" class="<?php if($cont == 1) { echo 'current'; }; ?>"><?php echo $modulo['titulo']; ?></a>
				</li>
				<?php $cont++; endforeach; ?>
			</ul>
		</nav>
		<?php endif; ?>
	</div>
</aside>