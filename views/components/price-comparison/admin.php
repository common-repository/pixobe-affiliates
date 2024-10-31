<?php

/***
 *  Admin File.
 *
 * @package pixobe-affilites/views/price-comparison
 */


?>

<ul class="flex flex-col gap-2" data-list="table" role="list">
	<?php
	$total_items = count( $config->plan );
	for ( $i = 0; $i < $total_items; $i++ ) {
		?>
		<li role="listitem">
			  <div class="metabox">
					<div class="metabox-header">
						<h2><?php esc_html_e( 'Price Table', 'pixobe-affiliates' ); ?></h2>
					</div>
					<div class="metabox-content">
						<p>
							<label for="plan"><?php esc_html_e( 'Plan', 'pixobe-affiliates' ); ?></label>
							<input type="text" id="plan" name="plan[]" data-target="plan" value="<?php echo esc_attr( $config->plan[ $i ] ); ?>"/>
						</p>
						<p>
							<label for="price"><?php esc_html_e( 'Price', 'pixobe-affiliates' ); ?></label>
							<input type="text" name="price[]" data-target="price" value="<?php echo esc_attr( $config->price[ $i ] ); ?>"/>
						</p>
						<p>
							<label for="price_extended"><?php esc_html_e( 'Price Extended', 'pixobe-affiliates' ); ?></label>
							<input type="text" name="price_extended[]" data-target="price_extended" value="<?php echo esc_attr( $config->price_extended[ $i ] ); ?>"/>
						</p>
						<div>
							<label for="features"><?php esc_html_e( 'Features', 'pixobe-affiliates' ); ?></label>
							<ul data-list="features" role="list"   data-order="<?php echo esc_attr( $i ); ?>">
								<?php
								if ( ! empty( $config->features[ $i ] ) ) {
									foreach ( $config->features[ $i ] as $key => $pro ) {
										?>
											<li role="listitem">
												<input type="text" id="features[<?php echo esc_attr( $i ); ?>][]" name="features[<?php echo esc_attr( $i ); ?>][]" 
												data-target="pro-view-text" data-twodimen="features"
												value="<?php echo esc_attr( $pro ); ?>" />
												<div class="btn-group">
													<button type="button"  class="button button-link" data-action="add"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?></button>
													<button type="button"  class="button button-link button-trash" data-action="delete"><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
												</div>
											</li>
										<?php
									}
								}
								?>
							</ul>
						</div>
						
						<p>
							<label for="button_label"><?php esc_html_e( 'Button Label', 'pixobe-affiliates' ); ?></label>
							<input type="text" name="button_label[]" data-target="button_label" value="<?php echo esc_attr( $config->button_label[ $i ] ); ?>"/>
						</p>
						<p>
							<label for="button_link"><?php esc_html_e( 'Link', 'pixobe-affiliates' ); ?></label>
							<input type="text" name="button_link[]" data-target="url" data-target-attr="href" value="<?php echo esc_attr( $config->url[ $i ] ); ?>"/>
						</p>
						<div class="grid grid-cols-2 gap-2 my-1">
						<div>
							<label for="theme_color"><?php esc_html_e( 'Theme', 'pixobe-affiliates' ); ?></label>
							<input type="color" id="theme_color" name="theme_color[]" 
							data-target-multiple='["header","cta_button"]' data-target-attr="style" data-target-prop="background-color"
							value="<?php echo esc_attr( $config->theme_color[ $i ] ); ?>"/>
						</div>
						<div>
							<label for="theme_text_color"><?php esc_html_e( 'Text', 'pixobe-affiliates' ); ?></label>
							<input type="color" id="theme_text_color" name="theme_text_color[]"
							data-target-multiple='["header","cta_button"]' data-target-attr="style" data-target-prop="color"
							value="<?php echo esc_attr( $config->theme_text_color[ $i ] ); ?>"/>
						</div>
						</div>
					</div>
				</div>
		</li>
		<?php
	}
	?>
</ul>

<template data-form-template="features">
	<li role="listitem">
		<input type="text" name="features[][]"  data-target="pro-view-text" value="" data-twodimen="features"/>
		<div class="btn-group">
			<button type="button"  class="button button-link" data-action="add"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?></button>
			<button type="button"  class="button button-link button-trash" data-action="delete"><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</li>
</template>

<template data-view-template="features">
	<li data-view-item="features" data-order=""  role="listitem">
		<div class="icon"><app-icon icon="check"></app-icon></div>
		<span data-target-id="pro-view-text" data-order=""></span>
	</li>
</template>
