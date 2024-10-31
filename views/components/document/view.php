<div id="pixobe-affiliate-view"> 
	<div id="product-document">
		<h2 class="product-document__header" data-target-id="header"><?php echo esc_attr( $config->header ); ?></h2>
		<p class="product-document__caption" data-target-id="caption"><?php echo esc_attr( $config->caption ); ?></p>
		
		<div class="product-document__hightlight">
			<sup class="super" data-target-id="currency"><?php echo esc_attr( $config->currency ); ?></sup>
			<span data-target-id="price"><?php echo esc_attr( $config->price ); ?></span>
			<sup class="super">/ <span data-target-id="units"> <?php echo esc_attr( $config->units ); ?></span></sup>
			<div class="zebra"></div>
		</div>
		
		<div class="product-document__features" >
			<ul data-list="pros" role='list'>
			<?php
			if ( ! empty( $config->pros ) ) {
				foreach ( $config->pros as $key => $pro ) {
					?>
					<li role='listitem'>
						 <div class="icon"><app-icon icon="check-circle"></app-icon></div>
						 <span data-target-id="pro-view-text"><?php echo esc_attr( $pro ); ?></span>
					</li>
					<?php
				}
			}
			?>
			</ul>
		</div>
		<div class="pixobe-cta-button">
			<a  href="<?php echo esc_url( $config->url ); ?>" 
				target="<?php echo esc_attr( $config->link_target ); ?>" 
				data-target-id="url" 
				rel="<?php echo esc_attr( $config->rel ); ?>">
				<div class="button-icon"><app-icon icon="shopping-cart"></app-icon></div>
				<span data-target-id="button_label"> <?php echo esc_attr( $config->button_label ); ?></span>
			</a>
		</div>
		<div>
			<div class="product-document__disclaimer" data-target-id="disclaimer">
				<?php echo esc_attr( $config->disclaimer ); ?>
			</div>
		</div>
	</div>
</div>
