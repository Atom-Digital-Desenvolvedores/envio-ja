<?php

	// get_header();

	// $id_page = get_the_ID();

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

	<section class="trabalhos trabalhos-interna">
        <div class="container">
            <h2 class="title-01">Trabalhos</h2>
            <?php
				$arrayQuery = array(
					'post_type'			=> array( 'cases192' ),
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
            <div class="row">
            	<?php
					while ( $query->have_posts() ) {
						$query->the_post();

						$caseID = get_the_ID();
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
				<?php }wp_reset_query(); ?>
            </div>
            <?php } else{ ?>
				<div>
					<h2>Não encontramos nada.</h2>
					<a href="<?php bloginfo('url') ?>/trabalhos">Ver todos</a>
				</div>
			<?php } ?>
        </div>
    </section>

<?php get_footer(); ?>