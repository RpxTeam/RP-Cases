<?php
/*
 * Template Name: Programas
 */
$url = get_template_directory_uri() ."/assets/img/";
get_header();
if(has_post_thumbnail()) {
	$bg = thumbnail_bg('full');
} else {
	$bg = $url . 'bg-title.jpg';
}
if(have_posts()):?>
<main id="programas" class="page">
    <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('template-parts/content', 'aside'); ?>
        <div id="content">
            <?php get_template_part( 'template-parts/content', 'menu' ); ?>
            <div class="title" data-bg="<?php echo $bg; ?>">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <?php $programas = get_field('arquivos'); ?>
            <?php if ($programas): ?>
            <div id="arquivos">
                <?php foreach ($programas as $arquivo): ?>
                <div class="arquivo">
                    <div class="image" data-bg="<?php echo $arquivo['imagem']['url']; ?>"></div>
                    <div class="text">
                        <?php echo $arquivo['descricao']; ?>
                        <?php $downloads = $arquivo['downloads']; ?>
                        <?php if($downloads): ?>
                        <div class="downloads">
                            <?php foreach($downloads as $download): ?>
                                <a href="<?php echo $download['arquivo']['url']; ?>" download><?php echo $download['nome']; ?> <img src="<?php echo $url; ?>icon-download.png" alt=""></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="copyright">
                <p>Copyright @ <?php echo date('Y'); ?> | ATVOS | Todos os direitos reservados. All rights reserved.</p>
            </div>
        </div>
    <?php endwhile; ?>
</main>
<?php
endif;
get_footer(); ?>