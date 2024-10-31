<?php
/**
 *  View file for comparison table.
 *
 * @package Views
 */

use PixobeAffiliates\Helpers\{Assets_Helper,Plugin_Constants};

$asset_helper = Assets_Helper::get_instance();
?>
<div id="pixobe-affiliate-view"> 
	<ul id="price-comparision-table" role="list" data-list="table"> 
		<?php
		$total_items = count( $config->plan );
		for ( $i = 0; $i < $total_items; $i++ ) {
			?>
			<li id="price-comparison" role="listitem">
				<div>
					<h2 
						data-target-id="header"
						style="
						color:<?php echo esc_html( $config->theme_text_color[ $i ] ); ?>;
						background-color:<?php echo esc_html( $config->theme_color[ $i ] ); ?>;
						-webkit-mask-image: url(<?php echo esc_url( $asset_helper->get_image_url() . 'card-bg-1.svg' ); ?>);
						mask-image: url(<?php echo esc_url( $asset_helper->get_image_url() . 'card-bg-1.svg' ); ?>);">
						<div class="plan" data-target-id="plan"><?php echo esc_html( $config->plan[ $i ] ); ?></div>
						<div class="price" data-target-id="price"><?php echo esc_html( $config->price[ $i ] ); ?></div>
						<div class="price-extended" data-target-id="price_extended"><?php echo esc_html( $config->price_extended[ $i ] ); ?></div>
					</h2>
					
					<ul data-list="features" role="list" data-order="<?php echo esc_attr( $i ); ?>">
						<?php foreach ( $config->features[ $i ] as $key => $feature ) { ?>
							<li role="listitem">
								<div class="icon"><app-icon icon="check"></app-icon></div>
								<span data-target-id="pro-view-text"><?php echo esc_html( $feature ); ?></span>
							</li>
						<?php } ?>
					</ul>

					<div class="pixobe-cta-button" 
						data-target-id="cta_button"
						style="background-color:<?php echo esc_attr( $config->theme_color[ $i ] ); ?>;
									color:<?php echo esc_attr( $config->theme_text_color[ $i ] ); ?>">
						<a  href="<?php echo esc_url( $config->url[ $i ] ); ?>" 
							target="<?php echo esc_attr( $config->link_target ); ?>" 
							data-target-id="url" 
							rel="<?php echo esc_attr( $config->rel ); ?>">
							<span data-target-id="button_label"> <?php echo esc_attr( $config->button_label[ $i ] ); ?></span>
						</a>
					</div>
				</div>
			</li>
						<?php
		}
		?>
	</ul>
</div>
