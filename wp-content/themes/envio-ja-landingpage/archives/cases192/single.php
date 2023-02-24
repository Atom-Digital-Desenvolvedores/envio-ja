
	<section class="trabalhos-interna">
        <div class="container">
            <div class="title-interna-main">
                <h2><?php the_title(); ?></h2>
                <h3><?php echo get_post_meta( get_the_ID(), 'wsg_case_item_subtitulo', true ); ?></h3>
            </div>

            <?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_case_interna_conteudo', true )); ?>

            <div class="video-trabalhos-interna">
                <?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_case_interna_iframe', true )); ?>
            </div>

            <div class="row">
				<?php
					$case_interna_items = get_post_meta( get_the_ID(), 'case_interna_items', true );
					foreach ($case_interna_items as $key => $entry) {
				?>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
	                    <h4><?php echo $entry['wsg_case_interna_items_titulo']; ?></h4>
	                    <?php echo wpautop($entry['wsg_case_interna_items_texto']); ?>
	                </div>
	            <?php } ?>
            </div>
        </div>
    </section>
