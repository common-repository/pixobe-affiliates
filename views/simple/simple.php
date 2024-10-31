<?php

/**
 * Simple Link View Settings
 */
?>
<div id="pixobe-dynamic-content">
	<div class="w-full metabox">
		<div class="metabox-header">
			<h2><?php esc_html_e( 'Preview', 'pixobe-affiliates' ); ?></h2>
		</div>
		<div class="metabox-content">
			<p>
				This is a <?php require $plugin_constant->get_plugin_dir_path() . "views/$config->style/view-$config->style.php"; ?>,created using PixobeAffiliates plugin and this is how it appears in blogs and pages. You can add same shortcode and display the
				link as many times as you want. Changing the settings here will automatically update the content in all your blogs and posts without you manually updating everywhere the link is used.
			</p>
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
				<input type="text" id="form-url" name="url" data-target="url" data-target-attr="href" value="<?php echo esc_attr( $config->url ); ?>" />
			</p>
			<p>
				<label for="header"><?php esc_html_e( 'Header', 'pixobe-affiliates' ); ?></label>
				<input type="text" id="form-header" name="header" data-target="url" value="<?php echo esc_attr( $config->header ); ?>" />
			</p>
		</div>
	</div>
</div>
