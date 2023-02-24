<?php

	// get_header();

	$id_page = get_the_ID();
?>

	<section class="banner-main">
		<div class="container">
			<?php
				$wsg_banner_items_video = get_post_meta( $id_page, 'wsg_banner_items_video', true );
				if (!empty($wsg_banner_items_video)) {
			?>
				<video width="100%" height="auto" autoplay muted controls>
					<source src="<?php echo $wsg_banner_items_video; ?>" type="video/mp4">
				</video>
			<?php } ?>
		</div>
	</section>

	<section class="trabalhos">
		<div class="container">
			<h2 class="title-01"><?php echo get_post_meta( $id_page, 'wsg_cases_titulo', true ); ?></h2>
			<?php
				$wsg_cases_na_home = get_post_meta( $id_page, 'wsg_cases_na_home', true );
				if (!empty($wsg_cases_na_home)) {
			?>
				<div class="row">
					<?php
						foreach ($wsg_cases_na_home as $key => $caseID) {
					?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="trabalho-box">
								<a href="<?php echo get_the_permalink( $caseID ); ?>">
									<figure>
										<?php
											$wsg_case_item_img_id = get_post_meta( $caseID, 'wsg_case_item_img_id', true );
											getImageThumb($wsg_case_item_img_id, '416x312');
										?>
									</figure>
									<h3><?php echo get_the_title( $caseID ); ?> <span>></span></h3>
									<h4><?php echo get_post_meta( $caseID, 'wsg_case_item_subtitulo', true ); ?></h4>
							   </a>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<section class="sobre scroll" id="sobre">
		<div class="container">
			<div class="title-sobre">
				<h2><?php echo get_post_meta( $id_page, 'wsg_sobre_titulo',true ); ?></h2>
				<div class="line-sobre"></div>
			</div>
			<div class="txt-sobre">
				<?php echo wpautop( get_post_meta( $id_page, 'wsg_sobre_texto',true ) ); ?>
			</div>
			<div class="equipe">
				<div class="row">
					<?php
						$wsg_equipe_na_home = get_post_meta( $id_page, 'wsg_equipe_na_home', true );
						if (!empty($wsg_equipe_na_home)) {
							foreach ($wsg_equipe_na_home as $key => $equipeID) {
					?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="equipe-box">
								<figure>
									<?php
										$wsg_equipe_item_img_id = get_post_meta( $equipeID, 'wsg_equipe_item_img_id', true );
										getImageThumb($wsg_equipe_item_img_id, '190x190');
									?>
								</figure>
								<div class="equipe-box-conteudo">
									<h3><?php echo get_the_title($equipeID); ?></h3>
									<h4><?php echo get_post_meta( $equipeID, 'wsg_equipe_item_cargo', true ); ?></h4>
									<?php echo wpautop(get_post_meta( $equipeID, 'wsg_equipe_item_resumo', true )); ?>

									<span class="equipe-email">
										<?php echo get_post_meta( $equipeID, 'wsg_equipe_item_email', true ); ?>
									</span>

									<div class="equipe-social-midia">
										<?php
											$equipe_redes_sociais = get_post_meta( $equipeID, 'equipe_redes_sociais', true );
											foreach ($equipe_redes_sociais as $key => $entry) {
										?>
											<a href="<?php echo $entry['wsg_equipe_redes_sociais_link']; ?>"><span class="flaticon-<?php echo $entry['wsg_equipe_redes_sociais_icone']; ?>"></span></a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</section>

	<section class="contato" id="contato">
		<div class="container">
			<h2 class="title-01"><?php echo get_post_meta( $id_page, 'wsg_contato_titulo',true ); ?></h2>

			<div class="row">
				<?php
					$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
					$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
					$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
				?>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<h3>Endereço</h3>
					<p><?php echo wpautop(get_post_meta( $id_endereco, 'wsg_endereco', true )); ?></p>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<h3>Telefone</h3>
					<?php
						$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );

						foreach ( (array) $entries as $key => $entry ) {

							if ( isset( $entry['wsg_telefone_nmr'] ) ) {
								$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
							}
							if ( isset( $entry['wsg_telefone_link'] ) ) {
								$wsg_telefone_link = $entry['wsg_telefone_link'];
							}
							if ( isset( $entry['wsg_telefone_icone'] ) ) {
								$wsg_telefone_icone = $entry['wsg_telefone_icone'];
							}
					?>
						<p>
							<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
								<?php echo $wsg_telefone_nmr; ?>
							</a>
						</p>
					<?php } ?>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<h3>E-mail</h3>
					<?php
						$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
						foreach ( (array) $wsg_emails as $key => $email ) {
					?>
						<p>
							<a href="mailto:<?php echo $email; ?>" target="_blank">
								<?php echo $email; ?>
							</a>
						</p>
					<?php } ?>
				</div>
			</div>

			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<?php echo get_post_meta( $id_page, 'wsg_contato_iframe',true ); ?>
				</div>

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<form class="row form-contato">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Nome</label>
							<input type="text" name="name" id="name">
					   </div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Telefone</label>
							<input type="tel" name="telefone" id="telefone">
					   </div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<label>E-mail</label>
							<input type="email" name="email" id="email">
					   </div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Assunto</label>
							<input type="text" name="assunto" id="assunto">
					   </div>

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<label>Mensagem</label>
							<textarea name="mensagem" id="mensagem" required></textarea>
					   </div>

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<button>Enviar</button>
					   </div>

					</form>
				</div>
			</div>
		</div>
	</section>

<?php //get_footer(); ?>