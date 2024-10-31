<div id="pixobe-affiliate-view"> 
	<div id="minion-container" class="minion" style="border-color: <?php echo esc_attr( $config->border_color ); ?>;" data-target-id="box-large-container">
		<div class="minion-image">
			<img src="<?php echo esc_attr( $config->image ); ?>" alt="<?php echo esc_attr( $config->header ); ?>" data-target-id="header-image">
		</div>
		<div class="minion-content">
			<h2>
				<a href="<?php echo esc_url( $config->url ); ?>" target="<?php echo esc_attr( $config->link_target ); ?>" class="minion-content__header" rel="<?php echo esc_attr( $config->rel ); ?>" data-target-id="url">
					<?php echo esc_attr( $config->header ); ?>
				</a>
			</h2>
			<div class="minion-content__stars">
				<five-stars stars="<?php echo esc_attr( $config->stars ); ?>" data-target-id="stars"></five-stars>
			</div>
			<p class="minion-content__caption" data-target-id="caption">
				<?php echo esc_html( $config->caption ); ?>
			</p>
			<div class="minion-content__pros">
				<h3 class="minion-content__pros__header"><?php esc_attr_e( 'Pros', 'pixobe-affiliates' ); ?></h3>
				<div class="minion-content__pros__content">
					<ul data-list="minions-pros" role="list">
						<?php
						foreach ( $config->pros as $key => $pro ) {
							?>
							<li data-view-item="minions-pros" data-order="<?php echo esc_attr( $key ); ?>" role="listitem">
								<div class="icon"><app-icon icon="check"></app-icon></div>
								<span data-target-id="pro-view-text" data-order="<?php echo esc_attr( $key ); ?>"><?php echo esc_attr( $pro ); ?></span>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="minion-content__cons">
				<h3 class="minion-content__cons__header"><?php esc_html_e( 'Cons', 'pixobe-affiliates' ); ?></h3>
				<div class="minion-content__const_content">
					<ul data-list="minions-cons" role='list'>
						<?php
						foreach ( $config->cons as $key => $con ) {
							?>
							<li  data-view-item="minion-cons" data-order="<?php echo esc_attr( $key ); ?>" role='listitem'>
								<div class="icon"><app-icon icon="x"></app-icon></div>
								<div  data-target-id="cons-view-text" data-order="<?php echo esc_attr( $key ); ?>">
									<?php echo esc_html( $con ); ?></div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="pixobe-cta-button" style="background-color:<?php echo esc_attr( $config->button_bg_color ); ?>;color:<?php echo esc_attr( $config->button_color ); ?>">
				<a  href="<?php echo esc_url( $config->url ); ?>" 
					target="<?php echo esc_attr( $config->link_target ); ?>" 
					data-target-id="url" 
					rel="<?php echo esc_attr( $config->rel ); ?>">
					<div class="button-icon"><app-icon icon="cursor-click"></app-icon></div>
					<span data-target-id="button_label"> <?php echo esc_attr( $config->button_label ); ?></span>
				</a>
			</div>
			<div class="minion-content__disclaimer" data-target-id="disclaimerText"><?php echo esc_html( $config->disclaimer ); ?></div>
		</div>
	</div>
</div>
