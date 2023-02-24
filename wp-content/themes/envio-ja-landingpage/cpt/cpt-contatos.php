<?php

	// Está função registra o posttype contatos
	function registrar_cpt_contatos(){

		// Contatos
		register_post_type('contatos',
			array(
				'labels' 			 => array(
					'name' 			 => __('Contatos'),
					'singular_name'  => __('contato')
				),
				'public' 			 => true,
				'has_archive' 		 => true,
				'query_var'          => true,
				'menu_icon' 		 => 'dashicons-phone',
				'supports' 			 => array('title'),
				'map_meta_cap'       => true,
				'capabilities' => array(
					'edit_posts'             => 'cpt_contatos_edit_posts', // Permissão para: Controla se os objetos deste tipo de postagem podem ser editados.
					'edit_others_posts'      => 'cpt_contatos_edit_others_posts', // Permissão para: Controla se os objetos desse tipo pertencentes a outros usuários podem ser editados. Se o tipo de postagem não suportar um autor, isso se comportará como edit_posts.
					'publish_posts'          => 'cpt_contatos_publish_posts', // Permissão para: Controla a publicação de objetos desse tipo de postagem.
					'delete_posts'           => 'cpt_contatos_delete_posts', // Permissão para: Controla se os objetos desse tipo de postagem podem ser excluídos.
					'read_private_posts'     => 'cpt_contatos_read_private_posts', // Permissão para: Controla se os objetos privados podem ser lidos.

					// 'read'                   => 'cpt_contatos_read', // Permissão para: Controla se os objetos deste tipo de postagem podem ser lidos.
					'delete_private_posts'   => 'cpt_contatos_delete_private_posts', // Permissão para: Controla se os objetos privados podem ser excluídos.
					'delete_published_posts' => 'cpt_contatos_delete_published_posts', // Permissão para: Controla se os objetos publicados podem ser excluídos.
					'delete_others_posts'    => 'cpt_contatos_delete_others_posts', // Permissão para: Controla se os objetos pertencentes a outros usuários podem ser excluídos. Se o tipo de postagem não suportar um autor, isso se comportará como delete_posts.
					'edit_private_posts'     => 'cpt_contatos_edit_private_posts', // Permissão para: Controla se os objetos privados podem ser editados.
					'edit_published_posts'   => 'cpt_contatos_edit_published_posts', // Permissão para: Controla se os objetos publicados podem ser editados.
				),
			)
		);
	}

	add_action('init', 'registrar_cpt_contatos');


	register_activation_hook( __FILE__, function () {

	    // Call function plugin_main_functions(),
	    // The function where the custom post type is registered
	    registrar_cpt_contatos();

	    $role = get_role('administrator');

		$role->add_cap( 'cpt_contatos_edit_posts' );
		$role->add_cap( 'cpt_contatos_edit_others_posts' );
		$role->add_cap( 'cpt_contatos_publish_posts' );
		$role->add_cap( 'cpt_contatos_delete_posts' );
		$role->add_cap( 'cpt_contatos_read_private_posts' );
		$role->add_cap( 'cpt_contatos_delete_private_posts' );
		$role->add_cap( 'cpt_contatos_delete_published_posts' );
		$role->add_cap( 'cpt_contatos_delete_others_posts' );
		$role->add_cap( 'cpt_contatos_edit_private_posts' );
		$role->add_cap( 'cpt_contatos_edit_published_posts' );

    	flush_rewrite_rules();

	} );


	$role = get_role('administrator');

		$role->add_cap( 'cpt_contatos_edit_posts' );
		$role->add_cap( 'cpt_contatos_edit_others_posts' );
		$role->add_cap( 'cpt_contatos_publish_posts' );
		$role->add_cap( 'cpt_contatos_delete_posts' );
		$role->add_cap( 'cpt_contatos_read_private_posts' );
		$role->add_cap( 'cpt_contatos_delete_private_posts' );
		$role->add_cap( 'cpt_contatos_delete_published_posts' );
		$role->add_cap( 'cpt_contatos_delete_others_posts' );
		$role->add_cap( 'cpt_contatos_edit_private_posts' );
		$role->add_cap( 'cpt_contatos_edit_published_posts' );

    	flush_rewrite_rules();


?>