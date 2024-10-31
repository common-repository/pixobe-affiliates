<?php

/**
 * Document style theme
 */
?>

<div id="pixobe-dynamic-content" class="flex-1">
	<div class="w-full metabox">
		<div class="metabox-header">
			<h2><?php esc_html_e( 'Preview', 'pixobe-affiliates' ); ?></h2>
		</div>
		<div class="metabox-content  pixobe-admin-preview">
			<?php require $plugin_constant->get_plugin_dir_path() . "views/$config->style/view-$config->style.php"; ?>
		</div>
	</div>
</div>

<div class="flex flex-col">
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
				<div id="stdbox-pros-action" class="action-list">
					<?php
					if ( ! empty( $config->pros ) ) {
						foreach ( $config->pros as $key => $pro ) {
							?>
							<div id="stdbox-pros-action-<?php echo esc_attr( $key ); ?>" class="action-list-item">
								<input type=" text" id="pros[]" name="pros[]" data-target="pros-view-text-<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $pro ); ?>" />
								<div class="button-group">
									<button type="button" id="pros-add" class="button button-link" data-parent="stdbox-pros" data-template="template-stdbox-pros" onclick="PAAdmin.add(event)"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> </button>
									<button type="button" id="pros-delete" class="button button-link button-trash" onclick="PAAdmin.delete(event)" data-target-action="stdbox-pros-action-<?php echo esc_attr( $key ); ?>" data-target-view="stdbox-pros-view-<?php echo esc_attr( $key ); ?>"><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
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

<template id="template-stdbox-pros-action">
	<div data-attrs='{"id":"stdbox-pros-action"}' class="action-list-item">
		<input type="text" id="pros[]" name="pros[]" data-attrs='{"data-target":"pros-view-text"}' value="" />
		<div class="button-group">
			<button type="button" id="pros-add" class="button button-link" 
			data-parent="stdbox-pros" 
			data-template="template-stdbox-pros" 
			onclick="PAAdmin.add(event)"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> </button>
			
			<button type="button" id="pros-delete"
			 class="button button-link button-trash"
			 onclick="PAAdmin.delete(event)"
			  data-attrs='{"data-target-action":"stdbox-pros-action", "data-target-view":"stdbox-pros-view"}'>
			  <?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</div>
</template>

<template id="template-stdbox-pros-view">
	<div class="product-document__feature__item pa-list-item" data-attrs='{"data-pa-target-id":"stdbox-pros-view"}'>
		<svg-icon icon="check-circle"></svg-icon>
		<span  data-attrs='{"data-pa-target-id":"pros-view-text"}'>
		</span>
	</div>
</template>
