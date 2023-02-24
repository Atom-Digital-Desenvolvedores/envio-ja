<?php

	// get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;

	$arrayGET = $_GET;
	$allArgs = array();
	$resultadoBusca = "";

	if ( isset($_GET['buscar']) ) {
		$resultadoBusca = $_GET['buscar'];
	}

	if(empty($allArgs)){
		$allArgs = '';
	}
?>

	<section class="main-servico">
        <div class="container">
            <div class="banner-servicos">
                <p><?php echo get_post_meta( $id_page, 'wsg_servicos_01_titulo', true ) ?></p>

                <a href="#servico-in" class="btn-anco">
                    <span></span>
                </a>
            </div>

            <?php
				$arrayQuery = array(
					'post_type'			=> array( 'servicos192' ),
					'orderby' 			=> 'menu_order',
					'order' 			=> 'ASC',
					'posts_per_page'	=> '-1',
					's'					=> $resultadoBusca,
					'tax_query'			=> array(
						'relation' => 'AND',
						array($allArgs)
					),
				);
				$query = new WP_Query($arrayQuery);
				if ( $query->have_posts() ) {
			?>
            <div class="row" id="servico-in">
	            <?php
					while ( $query->have_posts() ) {
						$query->the_post();

						$servicoID = get_the_ID();
				?>
	                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
	                    <div class="servico-box">
	                        <h2><?php the_title(); ?></h2>
	                        <?php echo get_post_meta( $servicoID, 'wsg_servico_item_resumo', true ) ?>
	                    </div>
	                </div>
				<?php }wp_reset_query(); ?>
            </div>
            <?php } else{ ?>
				<div>
					<h2>Não encontramos nada.</h2>
					<a href="<?php bloginfo('url') ?>/servicos">Ver todos</a>
				</div>
			<?php } ?>
        </div>
    </section>

<?php get_footer(); ?>