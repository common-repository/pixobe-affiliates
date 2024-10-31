<div>
	<div id="product-document">
		<h2 class="product-document__header" data-pa-target-id="header"><?php echo esc_attr( $config->header ); ?></h2>
		<p class="product-document__caption" data-pa-target-id="caption"><?php echo esc_attr( $config->caption ); ?></p>
		
		<div class="product-document__hightlight">
			<sup class="super" data-pa-target-id="currency"><?php echo esc_attr( $config->currency ); ?></sup>
			<span data-pa-target-id="price"><?php echo esc_attr( $config->price ); ?></span>
			<sup class="super">/ <span data-pa-target-id="units"> <?php echo esc_attr( $config->units ); ?></span></sup>
			<div class="zebra"></div>
		</div>
		
		<div class="product-document__features" data-pa-target-id="stdbox-pros-view">
			<?php
			if ( ! empty( $config->pros ) ) {
				foreach ( $config->pros as $key => $pro ) {
					?>
					<div class="product-document__feature__item pa-list-item" data-pa-target-id="stdbox-pros-view-<?php echo esc_attr( $key ); ?>">
						<svg-icon icon="check-circle"></svg-icon>
						<span  data-pa-target-id="pros-view-text-<?php echo esc_attr( $key ); ?>">
							<?php echo esc_attr( $pro ); ?>
						</span>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div class="button-get-plan">
			<a  href="<?php echo esc_url( $config->url ); ?>" target="<?php echo esc_attr( $config->link_target ); ?>" 
				data-pa-target-id="url" rel="<?php echo esc_attr( $config->rel ); ?>" id="product-document-anchor">
				<div class="svg-icon">
					<icon-shoppint-cart></icon-shoppint-cart> 
				</div>
				<span data-pa-target-id="button_label"> <?php echo esc_attr( $config->button_label ); ?></span>
			</a>
		</div>
		<div>
			<div class="product-document__disclaimer" data-pa-target-id="disclaimer">
				<?php echo esc_attr( $config->disclaimer ); ?>
			</div>
		</div>
	</div>
</div>
