<?php
	add_action( 'cmb2_admin_init', 'cmb2_metaboxes_gerais_SMTP' );

	function cmb2_metaboxes_gerais_SMTP() {

		$id_smtp = get_page_by_path( 'configuracoes-de-smtp', OBJECT, 'gerais' );

		$post_id;
		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($id_smtp && $id_smtp->ID != $post_id){
			return;
		}

		$SMTPconfig = new_cmb2_box( array(
			'id'            => 'SMTPconfig',
			'title'         => "Configurações da SMTP",
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		));

		$SMTPconfig->add_field( array(
			'name'        => 'Assunto email',
			'desc'        => 'Assunto do email.',
			'id'          => 'smtp_assunto',
			'type'        => 'text',
		));

		$SMTPconfig->add_field( array(
			'name'        => 'Servidor SMTP',
			'desc'        => 'Ex do Gmail: smtp.gmail.com',
			'id'          => 'smtp_server',
			'type'        => 'text',
		));
		$SMTPconfig->add_field( array(
			'name'        => 'Porta SMTP',
			'desc'        => 'Porta SMTP.',
			'id'          => 'smtp_porta',
			'type'        => 'text',
		));
		$SMTPconfig->add_field( array(
			'name'        => 'Segurança SMTP',
			'desc'        => 'Tipo de segurança utilizada pelo SMTP.',
			'id'          => 'smtp_seguranca',
			'type'        => 'radio',
			'show_option_none' => false,
			'options'          => array(
				'none' => __( 'None', 'cmb2' ),
				'ssl' => __( 'SSL', 'cmb2' ),
				'tls'   => __( 'TLS', 'cmb2' ),
			),
		));
		$SMTPconfig->add_field( array(
			'name'        => 'Email SMTP',
			'desc'        => 'Email SMTP.',
			'id'          => 'smtp_email',
			'type'        => 'text',
		));
		$SMTPconfig->add_field( array(
			'name'        => 'Senha SMTP',
			'desc'        => 'Senha SMTP.',
			'id'          => 'smtp_senha',
			'type'        => 'text',
			'after'        => '<script>
								var senha = document.querySelector(\'#smtp_senha\');
								senha.type = \'password\';
							</script>',
		));


		$SMTPconfig->add_field( array(
			'name'        => 'From email',
			'desc'        => 'From email.',
			'id'          => 'smtp_from_email',
			'type'        => 'text',
		));
		$SMTPconfig->add_field( array(
			'name'        => 'From Name',
			'desc'        => 'From Name.',
			'id'          => 'smtp_from_name',
			'type'        => 'text',
		));

		// $SMTPconfig->add_field( array(
		// 	'name'        => 'Destinatário email',
		// 	'desc'        => 'Destinatário do email.',
		// 	'id'          => 'smtp_destinatario',
		// 	'type'        => 'text',
		// ));
		// $SMTPconfig->add_field( array(
		// 	'name'        => 'Nome do destinatário do email',
		// 	'desc'        => 'Nome do destinatário do email.',
		// 	'id'          => 'smtp_destinatario_nome',
		// 	'type'        => 'text',
		// ));
	}


	
?>