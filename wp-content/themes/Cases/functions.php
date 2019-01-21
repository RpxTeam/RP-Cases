<?php

@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );

function cwp_remove_version() {
return '';
}

add_filter('the_generator', 'cwp_remove_version');
if (!defined('ABSPATH')) exit;
function base_theme_url() {
    ?>
    <script type="text/javascript">
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        var base_url_theme = "<?php echo get_template_directory_uri(); ?>";
        var baseurl = "<?php echo site_url(); ?>";
    </script>
    <?php
}

add_action( 'wp_head', 'base_theme_url' );

add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Customização Login Formulário
 */
// require get_template_directory() . '/inc/form_login.php';

/**
 * Customização do Admin
 */

require get_template_directory() . '/inc/custom-admin/custom-admin.php';

/**
 * Marca
 */
require get_template_directory() . '/inc/marca.php';

/**
 * Customizer
 */
require get_template_directory() . '/inc/customize.php';

/**
 * Registro de Sidebar
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Registro de Custom Posts
 */
require get_template_directory() . '/inc/custom_post.php';

/**
 * Background com Thumbnail
 * Usar <?php thumbnail_bg( 'full' ); ?>
 */
function thumbnail_bg ( $tamanho = 'thumbnail' ) {
  global $post;
  $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size, false, '' );
  return $get_post_thumbnail[0];
}

/**
 * Carregar Pressets
 */
function theme_setup(){
	load_theme_textdomain( 'theme', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
}

/**
 * Registrando Menus
 * Usar <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
 */
function register_theme_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_theme_menus' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/libs/slick-slider/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/libs/slick-slider/slick-theme.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/libs/font-awesome.min.css' );
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/libs/slick-slider/slick.min.js', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/libs/parallax/parallax.min.js', true );
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Pagination
 * Usar <?php wp_pagination();?>
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Breadcrumbs
 * Usar <?php wp_custom_breadcrumbs(); ?>
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Theme Options
 * Usar <?php $options = get_option( $option_name ); ?>
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'	=> 'Opções do Tema',
		'menu_title'	=> 'Opções do Tema',
		'menu_slug'		=> 'theme-options',
		'capatibility'	=> 'edit_posts',
		'parent_slug'	=> '',
		'position'		=> false,
		'icon_url'		=> false,
		));
}


/**
 * Limitando Excerpt
 */
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

/**
 * Limitando Title
 */
function title_limite($maximo) {
	$title = get_the_title();
	if ( strlen($title) > $maximo ) {
		$continua = '...';
	}
	$title = mb_substr( $title, 0, $maximo, 'UTF-8' );
	echo $title.$continua;
}

/**
 * Tradução
 */
function traducao($portugues, $ingles, $espanhol) {
	if (get_locale() == 'pt_BR') {
		echo $portugues;
	} elseif(get_locale() == 'en_US') {
		echo $ingles;
	} elseif(get_locale() == 'es_ES') {
		echo $espanhol;
	}
}


function translate_return($portugues, $ingles, $espanhol) {
	if (get_locale() == 'pt_BR') {
		return $portugues;
	} elseif(get_locale() == 'en_US') {
		return $ingles;
	} elseif(get_locale() == 'es_ES') {
		return $espanhol;
	}
}


/**
 * Modelos de data
 */
function date_post($tipo = 'normal') {
	$date = get_the_date();
	if ($tipo == 'extenso') {
		$arrayData = explode("/",$date); $dia = $arrayData[0]; $mes = $arrayData[1]; $ano = $arrayData[2];
		switch ($mes) {
			case '01': $mesExt = translate_return('Janeiro', 'January', 'Enero'); break;
			case '02': $mesExt = translate_return('Fevereiro', 'February', 'Febrero'); break;
			case '03': $mesExt = translate_return('Março', 'March', 'Marzo'); break;
			case '04': $mesExt = translate_return('Abril', 'April', 'Abril'); break;
			case '05': $mesExt = translate_return('Maio', 'May', 'Mayo'); break;
			case '06': $mesExt = translate_return('Junho', 'June', 'Junio'); break;
			case '07': $mesExt = translate_return('Julho', 'July', 'Julio'); break;
			case '08': $mesExt = translate_return('Agosto', 'August', 'Agosto'); break;
			case '09': $mesExt = translate_return('Setembro', 'September', 'Septiembre'); break;
			case '10': $mesExt = translate_return('Outubro', 'October', 'Octubre'); break;
			case '11': $mesExt = translate_return('Novembro', 'November', 'Noviembre'); break;
			case '12': $mesExt = translate_return('Dezembro', 'December', 'Diciembre'); break;
		}
		if (get_locale() == 'pt_BR') {
			echo "$dia de $mesExt de $ano";
		} elseif(get_locale() == 'es_ES') {
			echo "$dia de $mesExt de $ano";
		} else {
			echo "$mesExt $dia, $ano";
		}
	} else {
		$arrayData = explode("/",$date); $dia = $arrayData[0]; $mes = $arrayData[1]; $ano = $arrayData[2];
		if (get_locale() == 'pt_BR') {
			echo "$dia/$mes/$ano";
		} elseif(get_locale() == 'es_ES') {
			echo "$dia/$mes/$ano";
		} else {
			echo "$mes/$dia/$ano";
		}
	}
}


/**
 * Função de link
 */
$string="olá à mim! ñ";
function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}


function link_page($text = '') {
	$link = strtolower($text);
	$link = str_replace(' ', '-', $link);
	$string="olá à mim! ñ";
	return tirarAcentos($link);
}


/**
 * Validação do Comentário
 */
// function comment_validation_init() {
// 	if(is_single() && comments_open() ) {
// 		<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
// 		<script type="text/javascript">
// 			jQuery(document).ready(function($) {
// 				$('#commentform').validate({

// 					rules: {
// 					  author: {
// 						required: true,
// 						minlength: 2
// 					  },

// 					  email: {
// 						required: true,
// 						email: true
// 					  },

// 					  comment: {
// 						required: true,
// 						minlength: 20
// 					  }
// 					},

// 					messages: {
// 						author: "Por favor preencha o campo corretamente",
// 						email: "Por favor preencha o campo corretamente.",
// 						comment: {
// 							required: "Por favor preencha o campo corretamente",
// 							minlength: "Mínimo 20 caracteres"
// 						}
// 					},

// 					errorElement: "div",
// 						errorPlacement: function(error, element) {
// 							element.after(error);
// 						}

// 				});
// 			});
// 		</script>
// 	<?php
// 	}
// }
// add_action('wp_footer', 'comment_validation_init');


function my_login_redirect( $redirect_to, $request, $user ) {
	//o trecho abaixo verifica se existe algum usuário a ser checado
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
	//checa se o usuário é admin. Se positivo, leva o admin para o painel de administração.
		if ( in_array( 'administrator', $user->roles ) ) {
		//se for qualquer outro tipo de usuário, leva para a home do site.
			return $redirect_to;
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

// add_action('wp_head','redirect_admin');
// function redirect_admin(){
// 	if(is_admin() and current_user_can('editor')){
// 		wp_redirect(site_url());
// 		die; // You have to die here
// 	} else {
// 		wp_redirect(site_url());
// 	}
// }

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	if (current_user_can('editor') || current_user_can('administrator')) {
		show_admin_bar(true);
	} else {
		show_admin_bar(false);
	}
}

function verifica_login()
{
  if( ! is_user_logged_in() )
  wp_redirect( get_bloginfo('siteurl').'/login' );
}
 
add_action( 'get_header', 'verifica_login' );