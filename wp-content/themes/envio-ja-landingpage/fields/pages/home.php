<?php

	add_action( 'cmb2_admin_init', 'metaboxes_home' );

	function metaboxes_home() {

		// Método de especificação de página
		$homePage = get_page_by_path( 'home', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($homePage && $homePage->ID != $post_id){
			return;
		}

		// Metabox Banner
		$banner = new_cmb2_box( array(
			'id'            => 'banners',
			'title'         => __( 'Banner' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$banner->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_banner_titulo',
			'type'       => 'text',
		) );
		$banner->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_banner_texto',
			'type'       => 'wysiwyg',
		) );
		$banner->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_banner_btn_link',
			'type'       => 'text',
		) );
		$banner->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_banner_btn_texto',
			'type'       => 'text',
		) );
		$banner->add_field( array(
			'name'       => __( 'Vídeo do banner' ),
			// 'desc'       => __( 'Tamanho recomendado <strong>1920x650</strong>' ),
			'id'         => 'wsg_banner_items_video',
			'type' => 'file',
			// 'preview_size' => array( 1920/5, 650/5 ),
			'query_args' => array( 'type' => 'video' ),
		) );


		// Metabox Vantagens
		$vantagens = new_cmb2_box( array(
			'id'            => 'vantagens',
			'title'         => __( 'Vantagens' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$vantagens->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_vantagens_titulo',
			'type'       => 'text',
		) );
		$vantagens->add_field( array(
			'name'       => __( 'Lista de itens da seção' ),
			'id'         => 'wsg_vantagens_lista',
			'type'       => 'text',
			'repeatable' => true
		) );


		// Metabox Como funciona
		$funciona = new_cmb2_box( array(
			'id'            => 'funciona',
			'title'         => __( 'Como funciona' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$funciona->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_funciona_titulo',
			'type'       => 'text',
		) );
		$funciona->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_funciona_texto',
			'type'       => 'wysiwyg',
		) );
		$funciona_items = $funciona->add_field( array(
			'id'            => 'funciona_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$funciona->add_group_field( $funciona_items, array(
			'name'       => __( 'Imagem do item' ),
			'desc'       => __( 'Tamanho recomendado <strong>100x100</strong>' ),
			'id'         => 'wsg_funciona_items_img',
			'type' => 'file',
			'preview_size' => array( 100/1, 100/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$funciona->add_group_field( $funciona_items, array(
			'name'       => __( 'Título do item' ),
			'id'         => 'wsg_funciona_items_titulo',
			'type' => 'text',
		) );
		$funciona->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_funciona_btn_link',
			'type'       => 'text',
		) );
		$funciona->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_funciona_btn_texto',
			'type'       => 'text',
		) );


		// Metabox Sobre
		$sobre = new_cmb2_box( array(
			'id'            => 'sobre',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$sobre->add_field( array(
			'name'       => __( 'Imagem da seção' ),
			'desc'       => __( 'Tamanho recomendado <strong>420x280</strong>' ),
			'id'         => 'wsg_sobre_img',
			'type' => 'file',
			'preview_size' => array( 420/1, 280/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$sobre->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_titulo',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_sobre_texto',
			'type'       => 'wysiwyg',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_sobre_btn_link',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_sobre_btn_texto',
			'type'       => 'text',
		) );

		// Metabox Perguntas frequentes
		$faq = new_cmb2_box( array(
			'id'            => 'faq',
			'title'         => __( 'Perguntas frequentes' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$faq->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_faq_titulo',
			'type'       => 'text',
		) );
		$faq_items = $faq->add_field( array(
			'id'            => 'faq_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$faq->add_group_field( $faq_items, array(
			'name'       => __( 'Pergunta' ),
			'id'         => 'wsg_faq_items_pergunta',
			'type' => 'text',
		) );
		$faq->add_group_field( $faq_items, array(
			'name'       => __( 'Resposta' ),
			'id'         => 'wsg_faq_items_resposta',
			'type' => 'wysiwyg',
		) );

		// Metabox Chamada para ação
		$call_to_action = new_cmb2_box( array(
			'id'            => 'call_to_action',
			'title'         => __( 'Chamada para ação' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_call_to_action_titulo',
			'type'       => 'text',
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_call_to_action_btn_link',
			'type'       => 'text',
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_call_to_action_btn_texto',
			'type'       => 'text',
		) );

		// Metabox Contato
		$contato = new_cmb2_box( array(
			'id'            => 'contato',
			'title'         => __( 'Contato' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$contato->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_contato_titulo',
			'type'       => 'text',
		) );
		$contato->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_contato_texto',
			'type'       => 'wysiwyg',
		) );

		// Metabox contato_recaptcha
		$contato_recaptcha = new_cmb2_box( array(
			'id'            => 'contato_recaptcha',
			'title'         => __( 'Recaptcha' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Configurações do ReCaptcha' ),
			'desc'			=> __( 'Essas configurações não são obrigatórias, porém recomendadas para evitar ataques.' ),
			'id'			=> 'wsg_contato_recaptcha_titulo',
			'type'			=> 'title',
		) );

		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Secret Key' ),
			'id'			=> 'wsg_contato_secret_key',
			'type'			=> 'textarea',
		) );
		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Código WidGet - (Site Key)' ),
			'id'			=> 'wsg_contato_widget',
			'type'			=> 'textarea',
		) );


		// Metabox Rodapé
		$footer_site = new_cmb2_box( array(
			'id'            => 'footer_site',
			'title'         => __( 'Rodapé' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$footer_site->add_field( array(
			'name'       => __( 'Copyright' ),
			'id'         => 'wsg_footer_site_titulo',
			'type'       => 'wysiwyg',
		) );

	}

?>