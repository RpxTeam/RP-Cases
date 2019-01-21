<?php
/*
 * TELA DE LOGIN
*/
// ALTERANDO LOGOTIPO DO ADMIN
add_action( 'login_enqueue_scripts', 'admin_login_logo' );
function admin_login_logo() {
	require get_template_directory() . '/inc/custom-admin/login.php';
}

add_action( 'login_head', 'untame_fadein',30); 
function untame_fadein() {
	echo "<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>";
	echo "<script src='https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>";
	echo '<script type="text/javascript">// <![CDATA[
		jQuery(document).ready(function($) {
			var SPMaskBehavior = function (val) {
				return val.replace(/\D/g, "").length === 11 ? "(00) 00000-0000" : "(00) 0000-00009";
			},
			spOptions = {
				onKeyPress: function(val, e, field, options) {
					field.mask(SPMaskBehavior.apply({}, arguments), options);
				}
			};
	
			$("#telefone").mask(SPMaskBehavior, spOptions);
			$("#login").css("display", "none");
			$("#login").fadeIn(3500);
			$(".login").prepend("<div id=left></div>");
			// $("p.submit").append("<div class=block></div>");
			$(".block").click(function(){
				var telefone = $(this).parent().parent().parent().find("#telefone").val();
				if ( telefone.length > 0) {
					console.log("Menor");
				} else {
					console.log("Maior");
				}
			});
			$("[data-modal]").click(function(e){
				e.preventDefault();
				$("#modal").fadeIn();
			});
			$(".login").prepend("<div id=modal><div class=mask></div><div class=content><div class=fechar>x</div><div class=overflow><p><strong>RESPEITE SEMPRE AS INFORMAÇÕES DO NOSSO TERRITÓRIO</strong></p><p>É obrigatório que você respeite as informações que reunimos neste material. Tudo o que está aqui foi pensado para garantir a correta utilização da identidade da nossa marca e você também é responsável por isso.</p><p>Também não é permitido repassar ou divulgar as informações que encontrar aqui para pessoas que não estejam envolvidas diretamente com a nossa marca. Este conteúdo tem uso restrito e foi construído a partir da nossa estratégia de marca.</p><p>Importante: o uso indevido da marca e de qualquer conteúdo deste material, sem autorização da Atvos, poderá resultar em implicações legais.</p></div></div>")
			$(".fechar, .mask").click(function(e){
				e.preventDefault();
				$("#modal").fadeOut();
			});
			$(".integrante input").click(function(){
				var valor = $(this).val();
				if(valor == "Integrante") {
					$(".escritorio").fadeIn();
					$(".extras").hide();
				} else {
					$(".extras").fadeIn();
					$(".escritorio").hide();
				}
			});
			$("#user_login").parent().parent().addClass("user_name");
			$("#nome").parent().parent().addClass("fullname");
			$("#user_email").keydown(function(){
				valor = $(this).val();
				valornovo = this.value.replace(/[^a-z0-9\s]/gi, "").replace(/[_\s]/g, "");
				$("#user_login").val(valor);
			});
	});
	// ]]></script>';
}

// ALTERANDO LINK DO ADMIN
add_filter( 'login_headerurl', 'admin_link_logo' );
function admin_link_logo() {
	return home_url();
}

/*
 * PAINEL ADMINISTRATIVO
*/
// ALTERANDO MENSAGEM RODAPÉ ADMIN
add_filter('admin_footer_text', 'copyright_admin');
function copyright_admin() {
	echo 'Criado por <a href="http://www.jota3w.com.br/"><img style="height: 40px;" src="'. get_template_directory_uri() .'/inc/custom-admin/images/logo.png" alt=""></a>.';
}

require get_template_directory() . '/inc/custom-admin/css-painel.php';

// REMOVENDO ITENS DA DASHBOARD
 
add_action( 'admin_menu', 'custom_remove_menus' );
 
function custom_remove_menus() {

	// Removendo a página das Categorias
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );

	// Removendo a página das Tags
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );

	// Removendo a edição de posts - funcionalidade de blog
	//remove_menu_page( 'edit.php' );

	// Removendo o menu de acesso aos comentários
	//remove_menu_page( 'edit-comments.php' );

	// Removendo o menu de Ferramentas
	//remove_menu_page( 'tools.php' );

	// Removendo o gestor de Links
	//remove_menu_page( 'link-manager.php' ); 

	// Removendo o gestor de Temas
	//remove_menu_page( 'themes.php' );

	// Removendo o gestor de Plugins
	//remove_menu_page( 'plugins.php' );
}

//REMOVENDO WIDGETS DA DASHBOARD
add_action('wp_dashboard_setup', 'admin_remove_dashboard_widgets' );
function admin_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// Remove o widget "Links de entrada" (Incomming links)
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);        
	// remove o widget "Plugins"
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);        
	// remove o widget "Rascunhos recentes" (Recent drafts)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// remove o widget "QuickPress"
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);

	// remove o widget "Agora" (Right now)
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// remove o widget "Blog do WordPress" (Primary)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	// remove o widget "Outras notícias do WordPress" (Secondary)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

add_action('wp_dashboard_setup', 'admin_custom_dashboard_widgets');

function admin_custom_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', '<a href="#"><img src="'. get_template_directory_uri() .'/inc/custom-admin/images/logo.png" alt="" style="height: 35px;"></a> | Suporte', 'admin_custom_dashboard_help');
}

function admin_custom_dashboard_help() {
    echo 'Se você tiver qualquer dúvida ou precisar de ajuda, por favor, entre em contato conosco através do e-mail de Suporte em <a href="mailto:contato@rperformancegroup.com">contato</a>. <br> Ou se preferia, envie um e-mail para "contato@rperformancegroup.com"';
}

//CORES PERSONALIZADAS NOS POSTS
add_action('admin_footer','wpmidia_posts_status_color');
function wpmidia_posts_status_color(){ ?>
	<style>
		.status-draft{background: #FCE3F2 !important;}
		.status-pending{background: #87C5D6 !important;}
		.status-publish{/* Nenhum background. Manter as cores alternadas */}
		.status-future{background: #C6EBF5 !important;}
		.status-private{background:#F2D46F !important;}
	</style>
<?php }