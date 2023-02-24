<?php

	include('../../../wp-load.php');

	$slugContatoEmailId = get_page_by_path( 'configuracoes-de-e-mail', OBJECT, 'gerais' )->ID;

	$idContato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;
	$wq_contato_secret_key = get_post_meta($idContato, 'wq_contato_secret_key', true);

	$id_smtp = get_page_by_path( 'configuracoes-de-smtp', OBJECT, 'gerais' )->ID;

	if (isset($_POST['g-recaptcha-response'])) {
		$captcha = $_POST['g-recaptcha-response'];
	} else {
		$captcha = false;
	}

	if (!$captcha) {
		//Do something with error
	} else {
		$secret   = $wq_contato_secret_key;
		$response = file_get_contents(
			"https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
		);
		// use json_decode to extract json response
		$response = json_decode($response);

		if ($response->success === false) {
			//Do something with error
		}
	}

	//... The Captcha is valid you can continue with the rest of your code
	//... Add code to filter access using $response . score
	if ($response->success==true && $response->score <= 0.5) {
		//Do something to denied access
	}

	$url_redirect   = (isset($_REQUEST['url_redirect'])) ? $_REQUEST['url_redirect'] : NULL;
	$assunto        = $_REQUEST['subject_email'];
	$mensagem       = "<html><body>\n\r";
	$mensagem      .= "<font face=\"Verdana, Geneva, sans-serif\"><h1>".$_REQUEST['title_email']."</h1>";

	$parans = array();
	foreach ($_REQUEST as $key => $value) {
		$mensagem .= "\n\r";
		if (strpos($key, 'send-data-') === 0) {
			$label = $_REQUEST['label-'.$key];
			$mensagem .= "<p><b>".$label.": </b>" . $value . "</p>";
		}
	}

	$mensagem      .= "</font></body></html>";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer();

	// $swpsmtp_options = get_option('swpsmtp_options');

    // require_once( ABSPATH . WPINC . '/class-phpmailer.php' );
    $mail = new PHPMailer();

	$charset = get_bloginfo('charset');
	$mail->CharSet = $charset;

	$from_name = "Contato";
    $from_email = "naoresponder@modelossites.com.br";

	$mail->IsSMTP();

	/* If using smtp auth, set the username & password */
	// if ('yes' == $swpsmtp_options['smtp_settings']['autentication']) {
        $mail->SMTPAuth = true;
        $mail->Username = "naoresponder@modelossites.com.br";
        $mail->Password = "6cTCv6!MLfz7R";
    // }

	/* Set the SMTPSecure value, if set to none, leave this blank */
	// if ($swpsmtp_options['smtp_settings']['type_encryption'] !== 'none') {
        $mail->SMTPSecure = 'none';
    // }

	/* PHPMailer 5.2.10 introduced this option. However, this might cause issues if the server is advertising TLS with an invalid certificate. */
	$mail->SMTPAutoTLS = false;

	/* Set the other options */
	$mail->Host = 'mail.modelossites.com.br';
    $mail->Port = '587';
    $mail->SetFrom($from_email, $from_name);
    $mail->isHTML(true);
    $mail->Subject = $assunto;

	$mail->MsgHTML($mensagem);


	$addaddress_smtprecipients_send_mail = get_post_meta($slugContatoEmailId, 'addaddress_smtprecipients_send_mail', true);
    foreach ($addaddress_smtprecipients_send_mail as $key => $email) {
        $mail->AddAddress($email);
    }

    $addcc_smtprecipients_send_mail = get_post_meta($slugContatoEmailId, 'addcc_smtprecipients_send_mail', true);
    if ($addcc_smtprecipients_send_mail !== NULL && is_array($addcc_smtprecipients_send_mail) && count($addcc_smtprecipients_send_mail) > 0) {
        foreach ($addcc_smtprecipients_send_mail as $key => $email) {
            $mail->addCC($email);
        }
    }

    $addbcc_smtprecipients_send_mail = get_post_meta($slugContatoEmailId, 'addbcc_smtprecipients_send_mail', true);
    if ($addbcc_smtprecipients_send_mail !== NULL && is_array($addbcc_smtprecipients_send_mail) && count($addbcc_smtprecipients_send_mail) > 0) {
        foreach ($addbcc_smtprecipients_send_mail as $key => $email) {
            $mail->addBCC($email);
        }
    }
    $mail->AddAddress('thiago@atomdigital.com.br');

	// $mail->AddAddress(get_post_meta( $idContatoPage, 'mail_contato', true ));
    $mail->SMTPDebug = 0;

    if ( isset($_FILES['send-data-file']) && $_FILES['send-data-file']['error'] == UPLOAD_ERR_OK ) {

        $mail->addAttachment($_FILES['send-data-file']['tmp_name'], $_FILES['send-data-file']['name']);
    }

    /* Send mail and return result */
    if (!$mail->Send()){
        $errors = $mail->ErrorInfo;
    }

    $mail->ClearAddresses();
    $mail->ClearAllRecipients();

	$data = [];

    if (!empty($errors)) {
    	$data["success"] = false;
        $data["title"]   = "Falha no envio";
        $data["message"] = "Erro ao enviar sua mensagem, tente novamente mais tarde.";
    } else {
        $data["success"] = true;
        $data["title"]   = "Enviado com sucesso";
        $data["message"] = "Mensagem enviada com sucesso.";
    }

	echo json_encode($data);

?>