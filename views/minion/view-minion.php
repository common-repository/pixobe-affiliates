<div>
	<div id="minion-container" class="minion" style="border-color: <?php echo esc_attr( $config->border_color ); ?>;" data-pa-target-id="box-large-container">
		<div class="minion-image">
			<img src="<?php echo esc_attr( $config->image ); ?>" alt="<?php echo esc_attr( $config->header ); ?>" data-pa-target-id="header-image">
		</div>
		<div class="minion-content">
			<h2>
				<a href="<?php echo esc_url( $config->url ); ?>" target="<?php echo esc_attr( $config->link_target ); ?>"
				 class="minion-content__header" rel="<?php echo esc_attr( $config->rel ); ?>" data-pa-target-id="url">
					<?php echo esc_attr( $config->header ); ?>
				</a>
			</h2>
			<div class="minion-content__stars">
				<five-stars stars="<?php echo esc_attr( $config->stars ); ?>" data-pa-target-id="stars"></five-stars>
			</div>
			<p class="minion-content__caption" data-pa-target-id="caption">
				<?php echo esc_html( $config->caption ); ?>
			</p>
			<div class="minion-content__pros">
				<h3 class="minion-content__pros__header"><?php esc_attr_e( 'Pros', 'pixobe-affiliates' ); ?></h3>
				<div class="minion-content__pros__content">
					<ul data-pa-target-id="minions-pros-view" class="minion-content__pros__list">
						<?php
						foreach ( $config->pros as $key => $pro ) {
							?>
							<li class="minion-content__pros__list__item" data-pa-target-id="minions-pros-view-<?php echo esc_attr( $key ); ?>">
								<div class="minion-content__pros__list__item_icon">
									<svg-icon icon="check"></svg-icon>
								</div>
								<div class="first-letter:capitalize" data-pa-target-id="pros-view-text-<?php echo esc_attr( $key ); ?>">
									<?php echo esc_html( $pro ); ?>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="minion-content__cons">
				<h3 class="minion-content__cons__header"><?php esc_html_e( 'Cons', 'pixobe-affiliates' ); ?></h3>
				<div class="minion-content__const_content">
					<ul data-pa-target-id="minions-cons-view" class="minion-content__cons__list">
						<?php
						foreach ( $config->cons as $key => $con ) {
							?>
							<li class="minion-content__cons__list__item" data-pa-target-id="minions-cons-view-<?php echo esc_attr( $key ); ?>">
								<div class="minion-content__cons__list__item_icon">
									<svg-icon icon="x"></svg-icon>
								</div>
								<div class="first-letter:capitalize" data-pa-target-id="cons-view-text-<?php echo esc_attr( $key ); ?>">
									<?php echo esc_html( $con ); ?></div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div>
				<a href="<?php echo esc_attr( $config->button_url ); ?>" target="<?php echo esc_attr( $config->link_target ); ?>" 
				rel="<?php echo esc_attr( $config->rel ); ?>" class="minion-content__cta_btn" 
				style="background-color:<?php echo esc_attr( $config->button_bg_color ); ?>;color:<?php echo esc_attr( $config->button_color ); ?>" data-pa-target-id="actionButton">
					<?php echo esc_html( $config->button_label ); ?>
				</a>
			</div>
			<div class="minion-content__disclaimer" data-pa-target-id="disclaimerText"><?php echo esc_html( $config->disclaimer ); ?></div>
		</div>
	</div>
</div>
