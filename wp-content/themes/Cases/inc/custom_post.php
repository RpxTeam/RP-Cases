<?php
/**************************************
 * Registro De Custom Post
 **************************************/
add_action( 'init' , 'create_post_type' );
function create_post_type() {
	register_post_type( 'arquivos',
		array(
			'labels' => array(
				'name'			=> __( 'Arquivos', 'textdomain' ),
				'singular_name' => __( 'Arquivo', 'textdomain' )
			),
			'public'		=> true,
			'menu_position' => 4,
			'has_archive'	 => true,
			'menu_icon'	 => 'dashicons-media-text',
			'supports'       => array('title')
		)
	);
}

// function remove_menus(){
  
//   //remove_menu_page( 'edit.php' );                   //Posts
//   remove_menu_page( 'edit.php?post_type=page' );                   //Pages
//   remove_menu_page( 'edit-comments.php' );          //Comments
//   //remove_menu_page( 'themes.php' );                 //Appearance
//   //remove_menu_page( 'plugins.php' );                //Plugins
//   //remove_menu_page( 'options-general.php' );        //Settings
  
// }
// add_action( 'admin_menu', 'remove_menus' );

function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Case';
    $submenu['edit.php'][5][0] = 'Cases';
    $submenu['edit.php'][10][0] = 'Adicionar Case';
    $submenu['edit.php'][16][0] = 'Tags';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Cases';
    $labels->singular_name = 'Case';
    $labels->add_new = 'Adicionar Case';
    $labels->add_new_item = 'Adicionar Case';
    $labels->edit_item = 'Editar Case';
    $labels->new_item = 'Case';
    $labels->view_item = 'Ver Case';
    $labels->search_items = 'Buscar Cases';
    $labels->not_found = 'Nenhuma Case encontrado';
    $labels->not_found_in_trash = 'Nenhuma Case encontrado no Lixo';
    $labels->all_items = 'Todas os Cases';
    $labels->menu_name = 'Cases';
    $labels->name_admin_bar = 'Case';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );