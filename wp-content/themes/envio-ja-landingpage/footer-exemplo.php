<?php
	$id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID;

	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
?>

	<footer>
		<div class="container">
			<h3 class="title-footer"><?php echo get_post_meta( $id_home, 'wsg_footer_site_titulo', true ); ?></h3>
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
					<p class="txt-footer"><?php echo get_post_meta( $id_home, 'wsg_footer_site_texto', true ); ?></p>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					<ul>
						<?php
							$menu_name = 'footer-menu';
							$locations = get_nav_menu_locations();
							$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
							$primaryNav = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
							wp_nav_menu( array(
								'menu'            => 'footer-menu',
								'theme_location'  => 'footer-menu',
								'container'       => '',
								'menu_class'      => 'menu',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'items_wrap'      => '%3$s',
								'depth'           => 3,
							) );
						?>
					</ul>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<ul class="footer-contato">
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
							<li>
								<span class="flaticon-<?php echo $wsg_telefone_icone; ?>"></span>
								<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
									<?php echo $wsg_telefone_nmr; ?>
								</a>
							</li>
						<?php } ?>

						<?php
							$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
							foreach ( (array) $wsg_emails as $key => $email ) {
						?>
							<li>
								<span class="flaticon-mail-1"></span>
								<a href="mailto:<?php echo $email; ?>" target="_blank">
									<?php echo $email; ?>
								</a>
							</li>
						<?php } ?>

						<li>
							<span class="flaticon-placeholder-1"></span>
							<a href="<?php echo wpautop(get_post_meta( $id_endereco, 'wsg_endereco_link', true )); ?>">
								<?php echo wpautop(get_post_meta( $id_endereco, 'wsg_endereco', true )); ?>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="social-icons">
					<ul>
						<?php
							$arrayQuery = array(
								'post_type'         => array( 'redes_sociais' ),
								'orderby'           => 'menu_order',
								'order'             => 'ASC',
								'posts_per_page'    => '-1',
							);
							$query = new WP_Query($arrayQuery);
							while ( $query->have_posts() ) {
								$query->the_post();
						?>
							<li>
								<a href="<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_link', true ); ?>">
									<span class="flaticon-<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_titulo', true ); ?>"></span>
								</a>
							</li>
						<?php } wp_reset_query(); ?>
					</ul>
				</div>

				<div class="copy">
					<p>2023 © Todos os direitos reservados.</p>
				</div>

				<div class="dev">
					<p>Desenvolvido por: </p>
					<figure>
						<a href="https://atomdigital.com.br/" target="_blank">
							<img src="<?php bloginfo('template_url'); ?>/img/icone-atom.svg" alt="">
						</a>
					</figure>
				</div>
			</div>

		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


	<?php wp_footer(); ?>

</body>
</html>