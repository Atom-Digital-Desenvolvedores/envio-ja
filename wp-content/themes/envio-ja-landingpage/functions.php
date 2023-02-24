<?php

	// Removendo suporte de conteúdo default e thumbnail
	function remove_editor_page(){
		remove_post_type_support( 'page', 'editor' );
		remove_post_type_support( 'page', 'thumbnail' );
	}
	add_action( 'admin_init', 'remove_editor_page' );

	// adicionando suporte a svg
	function wp_check_filetype_and_ext_callback($filetype_ext_data, $file, $filename, $mimes) {
		if ( substr($filename, -4) === '.svg' ) {
			$filetype_ext_data['ext'] = 'svg';
			$filetype_ext_data['type'] = 'image/svg+xml';
		}
		return $filetype_ext_data;
	}
	add_filter('wp_check_filetype_and_ext', 'wp_check_filetype_and_ext_callback', 100, 4 );

	function add_svg_to_upload_mimes( $upload_mimes ) {
		$upload_mimes['svg'] = 'image/svg+xml';
		$upload_mimes['svgz'] = 'image/svg+xml';
		return $upload_mimes;
	}
	add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );


	// Removendo página de comentários default do wordpress
	function remove_comments_wordpress() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_init', 'remove_comments_wordpress');


	// Registrando menus do wordpress
	function meus_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Menu do cabeçalho' ),
				'footer-menu' => __( 'Menu do rodapé' )
	    	)
		);
	}
	add_action( 'init', 'meus_menus' );

	/**
	 * Register Custom Navigation Walker
	 */
	function register_navwalker(){
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	}
	add_action( 'after_setup_theme', 'register_navwalker' );

	// Função para ordernar categorias
	function cmp_orde_menu_top($a, $b){
		// return strcmp($a->categoria_ordem_valor, $b->categoria_ordem_valor);
		$a = $a->categoria_ordem_valor;
		$b = $b->categoria_ordem_valor;

		if ($a == $b) {
			return 0;
		}
		return ($a < $b) ? -1 : 1;
	}


	// Função para recuperar a categoria principal
	function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
		$return = array();

		if (class_exists('WPSEO_Primary_Term')){
			// Show Primary category by Yoast if it is enabled & set
			$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
			$primary_term = get_term($wpseo_primary_term->get_primary_term());

			if (!is_wp_error($primary_term)){
				$return['primary_category'] = $primary_term;
			}
		}

		if (empty($return['primary_category']) || $return_all_categories){
			$categories_list = get_the_terms($post_id, $term);

			if (empty($return['primary_category']) && !empty($categories_list)){
				$return['primary_category'] = $categories_list[0];  //get the first category
			}
			if ($return_all_categories){
				$return['all_categories'] = array();

				if (!empty($categories_list)){
					foreach($categories_list as &$category){
						$return['all_categories'][] = $category->term_id;
					}
				}
			}
		}

		return $return;
	}


	// Função para colocar imagem no html com o recorte e o atributo title
	function getImageThumb($attachID, $size = null) {
		$imageFull = wp_get_attachment_image_src($attachID, $size);
		if ($imageFull !== NULL && $imageFull !== FALSE) {
			$postItem = get_post($attachID);
			$imageFull = '<img src="'.$imageFull[0].'" class="attachment-full size-full" alt="'.$postItem->post_title.'" title="'.$postItem->post_title.'" />';
		}else{
			$imageFull = "";
		}
		echo $imageFull;
	}


	foreach (glob(get_template_directory().'/includes/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta includes

	foreach (glob(get_template_directory().'/cpt/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta cpt
	foreach (glob(get_template_directory().'/fields/archives/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta Archives dentro de fields
	foreach (glob(get_template_directory().'/fields/archives/gerais/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta gerais dentro de archives
	foreach (glob(get_template_directory().'/fields/archives/contatos/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta contatos dentro de archives
	foreach (glob(get_template_directory().'/fields/pages/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta Archives dentro de fields
	foreach (glob(get_template_directory().'/fields/sidebar/widgets/*.php') as $filename) {
		include $filename;
	} // Incluindo os arquivos da pasta Widgets dentro de sidebar



	remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

?>