<?php

/**
 * Simple Link View Settings
 */
?>

<div class="flex flex-col">
	<div class="metabox">
		<div class="metabox-header">
			<h2><?php esc_html_e( 'Display Settings', 'pixobe-affiliates' ); ?></h2>
		</div>
		<div class="metabox-content">
			<p>
				<label for="url"><?php esc_html_e( 'Affiliate Link', 'pixobe-affiliates' ); ?></label>
				<input type="text" id="form-url" name="url" data-target="url" data-target-attr="href" value="<?php echo esc_attr( $config->url ); ?>" />
			</p>
			<p>
				<label for="header"><?php esc_html_e( 'Header', 'pixobe-affiliates' ); ?></label>
				<input type="text" id="form-header" name="header" data-target="url" value="<?php echo esc_attr( $config->header ); ?>" />
			</p>
		</div>
	</div>
</div>
