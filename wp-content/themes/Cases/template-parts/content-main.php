<?php
$url = get_template_directory_uri() ."/assets/img/";
$modulos = get_field('modulo');
if(has_post_thumbnail()) {
	$bg = thumbnail_bg('full');
} else {
	$bg = $url . 'bg-title.jpg';
}
?>
<?php  ?>
<div id="content">
	<?php get_template_part( 'template-parts/content', 'menu' ); ?>
	<div class="title" data-bg="<?php echo $bg; ?>">
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
	<?php if ($modulos): ?>
	<div id="modules">
		<?php $count = 1; foreach ($modulos as $modulo): ?>
			<div id="<?php echo 'modulo' . $count; ?>" class="module">
				<div class="content">
					<?php $arquivos = $modulo['arquivos']; ?>
					<div class="title <?php if($arquivos) { echo 'btn-download'; } ?>">
					<?php $title = $modulo['titulo']; ?>
					<?php if ($title): ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
					<?php if ($arquivos): ?>
						<?php foreach ($arquivos as $arquivo): ?>
						<div class="download">
							<div class="arquivos">
								<a href="<?php echo $arquivo['arquivo']['url']; ?>" download>Download <img src="<?php echo $url; ?>icon-download.png" alt=""></a>
							</div>
						</div>
						<?php endforeach; ?>
					<?php endif; ?>
					</div>
					<?php $especificacoes = $modulo['especificacao'] ?>
					<?php if ($especificacoes): ?>
					<div class="especificacoes">
						<ul>
							<?php $cont = 1; foreach ($especificacoes as $especificacao): ?>
							<li>
								<a href="#" data-filter="tab<?php echo $cont; ?>">
									<?php echo $especificacao['nome']; ?>
									<span class="icon"></span>
								</a>
							</li>
							<?php $cont++; endforeach; ?>
						</ul>
						<div class="especificacao">
							<?php $espec = 1; foreach ($especificacoes as $especificacao): ?>
							<div class="item tab<?php echo $espec; ?>">
								<span class="fechar">x</span>
								<?php echo $especificacao['descricao']; ?>
							</div>
							<?php $espec++; endforeach; ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ($modulo['conteudo']): ?>
						<?php echo $modulo['conteudo']; ?>
					<?php endif; ?>
					<?php $images = $modulo['imagens']; ?>
					<?php if ($images): ?>
					<div class="images">
						<?php foreach ($images as $image): ?>
							<div class="image">
								<img src="<?php echo $image['imagem']['sizes']['large']; ?>" alt="">
							</div>	
						<?php endforeach ?>
					</div>			
					<?php endif ?>
				</div>
			</div>
		<?php $count++; endforeach; ?>
	</div>
	<?php endif; ?>
	<div class="copyright">
		<p>Copyright @ <?php echo date('Y'); ?> | RPerformance Group | Todos os direitos reservados. All rights reserved.</p>
	</div>
</div>