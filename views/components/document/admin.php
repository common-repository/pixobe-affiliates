<?php

/**
 * Document style theme
 */
?>

<div id="pixobe-affiliate-form"> 
	<div class="flex flex-col gap-2">
		<div class="metabox">
			<div class="metabox-header">
				<h2><?php esc_html_e( 'Display Settings', 'pixobe-affiliates' ); ?></h2>
			</div>
			<div class="metabox-content">
				<p>
					<label for="url"><?php esc_html_e( 'Affiliate Link', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="url" name="url" data-target="url" data-target-attr="href" value="<?php echo esc_attr( $config->url ); ?>" />
				</p>
				<p>
					<label for="header"><?php esc_html_e( 'Header', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="header" name="header" data-target="header" value="<?php echo esc_attr( $config->header ); ?>" />
				</p>
				<p>
					<label for="caption"><?php esc_html_e( 'Caption', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="caption" name="caption" data-target="caption" value="<?php echo esc_attr( $config->caption ); ?>" />
				</p>
				<p>
					<label for="currency"><?php esc_html_e( 'Currency', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="currency" name="currency" data-target="currency" value="<?php echo esc_attr( $config->currency ); ?>" />
				</p>
				<p>
					<label for="price"><?php esc_html_e( 'Price', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="price" name="price" data-target="price" value="<?php echo esc_attr( $config->price ); ?>" />
				</p>
				<p>
					<label for="units"><?php esc_html_e( 'Units', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="units" name="units" data-target="units" value="<?php echo esc_attr( $config->units ); ?>" />
				</p>

				<div>
					<label for="pros"><?php esc_html_e( 'Pros', 'pixobe-affiliates' ); ?></label>
					<ul data-list="pros" role="list">
						<?php
						if ( ! empty( $config->pros ) ) {
							foreach ( $config->pros as $key => $pro ) {
								?>
								<li role="listitem">
									<input type="text" id="pros[]" name="pros[]" data-target="pro-view-text" value="<?php echo esc_attr( $pro ); ?>" />
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
					<input type="text" id="button_label" name="button_label" data-target="button_label" value="<?php echo esc_attr( $config->button_label ); ?>" />
				</p>
				<p>
					<label for="disclaimer"><?php esc_html_e( 'Disclaimer', 'pixobe-affiliates' ); ?></label>
					<input type="text" id="disclaimer" name="disclaimer" data-target="disclaimer" value="<?php echo esc_textarea( $config->disclaimer ); ?>" />
				</p>
			</div>
		</div>
	</div>
</div>

<template data-form-template="pros">
	<li role="listitem">
		<input type="text" id="pros[]" name="pros[]" data-target="pro-view-text" value="" />
		<div class="btn-group">
			<button type="button"  class="button button-link" data-action="add"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?></button>
			<button type="button"  class="button button-link button-trash" data-action="delete"><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</li>
</template>

<template data-view-template="pros">
	<li role="listitem">
		<div class="icon"><app-icon icon="check-circle"></app-icon></div>
		<span data-target-id="pro-view-text" data-order=""></span>
	</li>
</template>
