<?php

/**
 *  Minion Style theme
 *
 * @since 1.0.0
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

<div class="flex flex-col gap-2">
	<div class="metabox">
		<div class="metabox-header">
			<h2><?php esc_html_e( 'Display Settings', 'pixobe-affiliates' ); ?></h2>
		</div>
		<div class="metabox-content">
			<p>
				<label for='url'><?php esc_html_e( 'Affiliate Link', 'pixobe-affiliates' ); ?> </label>
				<input type="text" id="url" name="url" required data-target="url" data-target-attr="href" value="<?php echo esc_attr( $config->url ); ?>" />
			</p>
			<p>
				<label for='header'><?php esc_html_e( 'Header', 'pixobe-affiliates' ); ?></label>
				<input type="text" placeholder="" id="header" name="header" required data-target="url" value="<?php echo esc_attr( $config->header ); ?>" />
			</p>
			<p>
				<label for='image'><?php esc_html_e( 'Image URL', 'pixobe-affiliates' ); ?></label>
				<input type="text" placeholder="Logo Image" id="image" name="image" required data-target="header-image" data-target-attr="src" value="<?php echo esc_attr( $config->image ); ?>" />
			</p>
			<p>
				<label for='caption'><?php esc_html_e( 'Caption', 'pixobe-affiliates' ); ?></label>
				<textarea placeholder="" id="caption" name="caption" required data-target="caption"><?php echo esc_attr( $config->caption ); ?></textarea>
			</p>
			<p>
				<label for='stars'><?php esc_html_e( 'Stars', 'pixobe-affiliates' ); ?></label>
				<input type="text" placeholder="" id="stars" name="stars" data-target="stars" data-target-attr="stars" value="<?php echo esc_attr( $config->stars ); ?>" />
			</p>

			<div>
				<label for="pros"><?php esc_html_e( 'Pros', 'pixobe-affiliates' ); ?></label>
				<div id="minions-pros-action" class="action-list">
					<?php
					if ( ! empty( $config->pros ) ) {
						foreach ( $config->pros as $key => $pro ) {
							?>
							<div id="minions-pros-action-<?php echo esc_attr( $key ); ?>" class="action-list-item">
								<input type=" text" id="pros[]" name="pros[]" data-target="pros-view-text-<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $pro ); ?>" />
								<div class="button-group">
									<button type="button" id="pros-add" class="button button-link" data-parent="minions-pros" data-template="template-minions-pros" onclick="PAAdmin.add(event)"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> </button>
									<button type="button" id="pros-delete" class="button button-link button-trash" onclick="PAAdmin.delete(event)" data-target-action="minions-pros-action-<?php echo esc_attr( $key ); ?>" data-target-view="minions-pros-view-<?php echo esc_attr( $key ); ?>"><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>

			<div>
				<label for="cons"><?php esc_html_e( 'Cons', 'pixobe-affiliates' ); ?></label>
				<div id="minions-cons-action" class="action-list">
					<?php foreach ( $config->cons as $key => $con ) { ?>
						<div id="minions-cons-action-<?php echo esc_attr( $key ); ?>" class="action-list-item">
							<input type=" text" id="cons[]" name="cons[]" data-target="cons-view-text-<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $con ); ?>" />
							<div class="button-group">
								<button type="button" id="cons-add" class="button button-link" data-parent="minions-cons" data-template="template-minions-cons" onclick="PAAdmin.add(event)">Add </button>
								<button type="button" id="cons-delete" class="button button-link button-trash" onclick="PAAdmin.delete(event)" data-target-action="minions-cons-action-<?php echo esc_attr( $key ); ?>" data-target-view="minions-cons-view-<?php echo esc_attr( $key ); ?>">Delete</button>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>

			<p>
				<label for='button_label'><?php esc_html_e( 'Button Label', 'pixobe-affiliates' ); ?></label>
				<input type="text" id="button_label" name="button_label" required data-target="actionButton" value="<?php echo esc_attr( $config->button_label ); ?>" />
			</p>

			<p>
				<label for='buttonLink'><?php esc_html_e( 'Button Link', 'pixobe-affiliates' ); ?></label>
				<input type="text" id="buttonLink" name="button_url" required data-target="actionButton" data-target-attr="href" value="<?php echo esc_attr( $config->button_url ); ?>" />
			</p>

			<p>
				<label for='disclaimerText'><?php esc_html_e( 'Disclaimer', 'pixobe-affiliates' ); ?></label>
				<input type="text" name="disclaimer" data-target="disclaimerText" value="<?php echo esc_attr( $config->disclaimer ); ?>" />
			</p>
		</div>
	</div>
	<div class="metabox blurred">
		<div class="metabox-header">
			<h2><?php esc_html_e( 'Color Palette', 'pixobe-affiliates' ); ?></h2>
		</div>
		<div class="metabox-content" >
			<div class="grid grid-cols-2 gap-2">
				<p>
					<label for='button_bg_color'><?php esc_html_e( 'Button Background', 'pixobe-affiliates' ); ?>
					</label>
						<input type="color" id="button_bg_color" name="button_bg_color" title="Background Color"
						required data-target="actionButton" data-target-attr="style" data-target-prop="backgroundColor"
						value="<?php echo esc_attr( $config->button_bg_color ); ?>" />
				</p>
				<p>
					<label for='button_color'><?php esc_html_e( 'Button Text', 'pixobe-affiliates' ); ?></label>
					<input type="color" id="button_color" name="button_color" required data-target="actionButton"
					 value="<?php echo esc_attr( $config->button_color ); ?>" data-target-attr="style" data-target-prop="color" />
				</p>
			</div>
			<div>
				<label for='border_color'><?php esc_html_e( 'Border Colors', 'pixobe-affiliates' ); ?></label>
				<input type="color" id="border_color" name="border_color" data-target="box-large-container" 
				value="<?php echo esc_attr( $config->border_color ); ?>" data-target-attr="style"
				 data-target-prop="border-color" />
			</div>
		</div>
	</div>
</div>

<template id="template-minions-pros-action">
	<div data-attrs='{"id":"minions-pros-action"}' class="action-list-item">
		<input type="text" id="pros[]" name="pros[]" data-attrs='{"data-target":"pros-view-text"}' value="" />
		<div class="button-group">
			<button type="button" id="pros-add" class="button button-link" data-parent="minions-pros" data-template="template-minions-pros" onclick="PAAdmin.add(event)"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> </button>
			<button type="button" id="pros-delete" class="button button-link button-trash" onclick="PAAdmin.delete(event)" data-attrs='{"data-target-action":"minions-pros-action", "data-target-view":"minions-pros-view"}'><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</div>
</template>

<template id="template-minions-pros-view">
	<li class="minion-content__pros__list__item"  data-attrs='{"data-pa-target-id":"minions-pros-view"}'>
		<div class="minion-content__pros__list__item_icon">
			<svg-icon icon="check"></svg-icon>
		</div>
		<div class="first-letter:capitalize"  data-attrs='{"data-pa-target-id":"pros-view-text"}'>	</div>
	</li>
</template>

<template id="template-minions-cons-action">
	<div data-attrs='{"id":"minions-cons-action"}' class="action-list-item">
		<input type="text" id="cons[]" name="cons[]" data-attrs='{"data-target":"cons-view-text"}' value="" />
		<div class="button-group">
			<button type="button" id="cons-add" class="button button-link" data-parent="minions-cons" 
			data-template="template-minions-cons" onclick="PAAdmin.add(event)"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> 
		</button>
			<button type="button" id="cons-delete" class="button button-link button-trash" onclick="PAAdmin.delete(event)" 
			data-attrs='{"data-target-action":"minions-cons-action", "data-target-view":"minions-cons-view"}'>
			<?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</div>
</template>

<template id="template-minions-cons-view">
	<li class="minion-content__cons__list__item" data-attrs='{"data-pa-target-id":"minions-cons-view"}'>
		<div class="minion-content__cons__list__item_icon">
			<svg-icon icon="x"></svg-icon>
		</div>
		<div class="first-letter:capitalize" data-attrs='{"data-pa-target-id":"cons-view-text"}'></div>
	</li>
</template>
