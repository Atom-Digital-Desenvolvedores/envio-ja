<?php
	// get_header();

	$id_page = get_the_ID();
?>

	<section class="at-video" id="home">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
					<div class="at-video_box">
						<header>
							<h2 class="at-title-main"><?php echo get_post_meta( $id_page, 'wsg_banner_titulo', true ); ?></h2>
						</header>
						<p class="p-big"><?php echo get_post_meta( $id_page, 'wsg_banner_texto', true ); ?></p>

						<a class="btn-main_page" href="<?php echo get_post_meta( $id_page, 'wsg_banner_btn_link', true ); ?>"><?php echo get_post_meta( $id_page, 'wsg_banner_btn_texto', true ); ?></a>
					</div>
				</div>
				<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
					<video width="100%" height="auto" controls>
						<source src="<?php echo get_post_meta( $id_page, 'wsg_banner_items_video', true ); ?>" type="video/mp4">
					</video>
				</div>
			</div>
		</div>
	</section>

	<section class="at-service" id="service">
		<div class="container">
			<header>
				<h2><?php echo get_post_meta( $id_page, 'wsg_vantagens_titulo', true ); ?></h2>
			</header>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="at-service_box">
						<ul>
							<?php
								$wsg_vantagens_lista = get_post_meta( $id_page, 'wsg_vantagens_lista', true );
								foreach ($wsg_vantagens_lista as $key => $value) {
							?>
								<li><?php echo $value; ?></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="at-how-Itworks" id="como-funciona">
		<div class="container">
			<header>
				<h2 class="at-title-main"><?php echo get_post_meta( $id_page, 'wsg_funciona_titulo', true ); ?></h2>
				<p class="p-big"><?php echo get_post_meta( $id_page, 'wsg_funciona_texto', true ); ?></p>
			</header>
			<div class="swiper at-how-Itworks_carousel">
				<div class="swiper-wrapper">
					<?php
						$funciona_items = get_post_meta( $id_page, 'funciona_items', true );
						foreach ($funciona_items as $key => $entry) {
					?>
						<div class="swiper-slide">
							<div class="at-how-Itworks_item">
								<figure>
									<?php
										getImageThumb($entry['wsg_funciona_items_img_id'], '100x100');
									?>
								</figure>
								<p><?php echo $entry['wsg_funciona_items_titulo']; ?></p>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

			<div class="at-how-Itworks_center">
				<a class="btn-main_page" href="<?php echo get_post_meta( $id_page, 'wsg_funciona_btn_link', true ); ?>"><?php echo get_post_meta( $id_page, 'wsg_funciona_btn_texto', true ); ?></a>
			</div>
		</div>
	</section>

	<section class="at-about" id="quem-somos">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="at-about_box">
						<figure>
							<?php
								$wsg_sobre_img_id = get_post_meta( $id_page, 'wsg_sobre_img_id', true );
								getImageThumb($wsg_sobre_img_id, '420x280');
							?>
						</figure>
					</div>
				</div>

				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="at-about_box">
						<h2 class="at-title-main"><?php echo get_post_meta( $id_page, 'wsg_sobre_titulo', true ); ?></h2>
						<p class="p-big"><?php echo get_post_meta( $id_page, 'wsg_sobre_texto', true ); ?></p>

						<a class="btn-main_page" href="<?php echo get_post_meta( $id_page, 'wsg_sobre_btn_link', true ); ?>"><?php echo get_post_meta( $id_page, 'wsg_sobre_btn_texto', true ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="at-faq" id="duvidas">
		<div class="container">
			<header>
				<h2 class="at-title-main"><?php echo get_post_meta( $id_page, 'wsg_faq_titulo', true ); ?></h2>
			</header>
			<div class="accordion" id="accordionFaq">
				<?php
					$faq_items = get_post_meta( $id_page, 'faq_items', true );
					$counter = 0;
					foreach ($faq_items as $key => $entry) {
						$counter++;
				?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading-<?php echo $counter; ?>">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $counter; ?>">
								<?php echo $entry['wsg_faq_items_pergunta']; ?>
							</button>
						</h2>
						<div id="collapse-<?php echo $counter; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $counter; ?>" data-bs-parent="#accordionFaq">
							<div class="accordion-body">
								<?php echo wpautop($entry['wsg_faq_items_resposta']); ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="at-cta">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="at-cta_box">
						<p class="p-big"><?php echo get_post_meta( $id_page, 'wsg_call_to_action_titulo', true ); ?></p>
					</div>
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="at-cta_box">
						<a class="btn-main_page" href="<?php echo get_post_meta( $id_page, 'wsg_call_to_action_btn_link', true ); ?>"><?php echo get_post_meta( $id_page, 'wsg_call_to_action_btn_texto', true ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="at-registration" id="cadastre">
		<div class="container">
			<header>
				<h2 class="at-title-main"><?php echo get_post_meta( $id_page, 'wsg_contato_titulo', true ); ?></h2>
				<p class="p-big"><?php echo get_post_meta( $id_page, 'wsg_contato_texto', true ); ?></p>
			</header>

			<form action="<?php echo bloginfo('url'); ?>/contato/" method="post" class="send-form">

				<input type="hidden" name="subject_email" value="Enviado pelo site">
				<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label>E-mail <span>*</span></label>
					<input type="hidden" name="label-send-data-email" value="Email">
					<input required type="email" name="send-data-email">
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label>Nome <span>*</span></label>
					<input type="hidden" name="label-send-data-name" value="Nome">
					<input required type="text" name="send-data-name">
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label>Cpf <span>*</span></label>
					<input type="hidden" name="label-send-data-cpf" value="CPF">
					<input required type="text" name="send-data-cpf" class="inputcpf">
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label>WhatsApp <span>*</span></label>
					<input type="hidden" name="label-send-data-whatsapp" value="Whatsapp">
					<input required type="text" name="send-data-whatsapp" class="inputphone">
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label>Endereço <span>*</span></label>
					<input type="hidden" name="label-send-data-address" value="Endereço">
					<input required type="text" name="send-data-address">
				</div>

				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<label>Cidade <span>*</span></label>
						<input type="hidden" name="label-send-data-city" value="Cidade">
						<input required type="text" name="send-data-city">
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<label>Estado <span>*</span></label>
						<input type="hidden" name="label-send-data-estado" value="Estado">
						<input required type="text" name="send-data-estado">
					</div>
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<label>Cep <span>*</span></label>
					<input type="hidden" name="label-send-data-cep" value="CEP">
					<input required type="text" name="send-data-cep">
				</div>

				<?php if (strlen($wsg_contato_widget) > 0) { ?>
					<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
				<?php } ?>

				<button class="btn-main_page btn-form" type="submit">Enviar</button>
			</form>
			<script>
				$(document).ready(function () {
					$('.send-form').submit(function (event) {
						var formData = $(this).serialize();

						$.ajax({
							type: "POST",
							url: "<?php bloginfo( 'template_url' ); ?>/send-mail.php",
							data: formData,
							dataType: "json",
							encode: true,
						}).done(function (data) {
							$('.btn-form').html("Enviando..");
							console.log(data);
							alert("Mensagem Enviada");
							location.reload();
						});

						event.preventDefault();
					});
				});
			</script>
		</div>
	</section>


<?php //get_footer(); ?>