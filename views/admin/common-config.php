<?php

/**
 *
 * This includes common fields for all configuration
 *
 * @package views/admin
 */

?>

<div class="flex flex-col gap-2">
<?php if ( $config->id ) { ?>
	<div class="metabox">
		<div class="metabox-header">
			<h2> <?php esc_html_e( 'Shortcode', 'pixobe-affiliates' ); ?></h2>
		</div>
		<div class="metabox-content">
			<div class="pt-2">
				<code>[pixobe_affiliates id="<?php echo esc_attr( $config->id ); ?>"]</code>
			</div>
		</div>
	</div>
<?php } ?>
<div class="metabox">
	<div class="metabox-header">
		<h2> <?php esc_html_e( 'General', 'pixobe-affiliates' ); ?></h2>
	</div>
	<div class="metabox-content">
		<p>
			<label for="name"><?php esc_html_e( 'Style', 'pixobe-affiliates' ); ?></label>
			<select name="style" id="pixobe-style-select" onchange="PAAdmin.onStyleChange(event)" required>
				<?php foreach ( $style_options as $value => $label ) { ?>
					<option value="<?php echo esc_attr( $value ); ?>" 
						<?php
						if ( $config->style === $value ) {
							?>
								selected <?php } ?>>
						<?php echo esc_attr( $label ); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="name"><?php esc_html_e( 'Name', 'pixobe-affiliates' ); ?></label>
			<input type="text" id="name" name="name" required value="<?php echo esc_attr( $config->name ); ?>" size="100" />
		</p>
		<p>
			<label for="category"><?php esc_html_e( 'Category', 'pixobe-affiliates' ); ?></label>
			<input type="text" id="category" name="category" value="<?php echo esc_attr( $config->category ); ?>" required size="50" />
		</p>
		<button type="submit" class="button button-primary" name="action" value="create-update" id="paform-action"><?php esc_html_e( 'Save', 'pixobe-affiliates' ); ?></button>
	</div>
</div>
<div class="metabox">
	<div class="metabox-header">
		<h2> <?php esc_html_e( 'Link Settings', 'pixobe-affiliates' ); ?></h2>
	</div>
	<div class="metabox-content">
		<p>
			<label for="rel"><?php esc_html_e( 'Rel', 'pixobe-affiliates' ); ?></label>
			<input type="text" name="rel" value="<?php echo esc_attr( $config->rel ); ?>" data-target="url" data-target-attr="rel" />
		</p>
		<p>
			<label for="link_target"><?php esc_html_e( 'Open this link in new window?', 'pixobe-affiliates' ); ?></label>
			<select name="link_target" data-target="url" data-target-attr="target">
				<option value="_blank" 
				<?php
				if ( '_blank' === $config->link_target ) {
					?>
					selected <?php } ?> selected><?php esc_html_e( 'Yes', 'pixobe-affiliates' ); ?></option>
				<option value="_self" 
				<?php
				if ( '_self' === $config->link_target ) {
					?>
					selected <?php } ?>><?php esc_html_e( 'No', 'pixobe-affiliates' ); ?></option>
			</select>
		</p>
	</div>
</div>
<div class="metabox blurred">
	<div class="metabox-header">
		<h2> <?php esc_html_e( 'Report', 'pixobe-affiliates' ); ?></h2>
	</div>
	<div class="metabox-content">
		<div class="alert box-border mt-2">
			<div>
				<svg-icon icon="info"></svg-icon>
				<div>
					<h3 class="font-bold"><?php esc_html_e( 'Used In', 'pixobe-affiliates' ); ?></h3>
					<div class="text-xs">3 posts/pages.</div>
				</div>
			</div>
			<div class="flex-none">
				<button class="button button-secondary" type="button"><?php esc_html_e( 'Check', 'pixobe-affiliates' ); ?></button>
			</div>
		</div>
		<div class="alert box-border mt-2">
			<div>
				<svg-icon icon="info"></svg-icon>
				<div>
					<h3 class="font-bold"><?php esc_html_e( 'Clicks', 'pixobe-affiliates' ); ?></h3>
					<div class="text-xs">10 times overall.</div>
				</div>
			</div>
			<div class="flex-none">
				<button class="button button-secondary" type="button"><?php esc_html_e( 'Check', 'pixobe-affiliates' ); ?></button>
			</div>
		</div>
	</div>
</div>

</div>
