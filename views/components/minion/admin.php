<?php
/**
 *  Minion Style theme
 *
 *  @since 1.0.0
 *  @package <views>
 */

?>

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
				<input type="text" placeholder="" id="stars" name="stars" data-target="stars" data-target-attr="stars"
				 value="<?php echo esc_attr( $config->stars ); ?>" />
			</p>

			<div>
				<label for="pros"><?php esc_html_e( 'Pros', 'pixobe-affiliates' ); ?></label>
				<div  class="action-list" data-list="pros">
					<?php
					if ( ! empty( $config->pros ) ) {
						foreach ( $config->pros as $key => $pro ) {
							?>
							<div data-list-item="minions-pros" class="action-list-item" data-order="<?php echo esc_attr( $key ); ?>">
								<input type=" text" id="pros[]" name="pros[]" data-target="pros-view-text"  data-order="<?php echo esc_attr( $key ); ?>"
								value="<?php echo esc_attr( $pro ); ?>" />
								<div class="btn-group">
									<button type="button" class="button button-link" data-action="add" ><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> </button>
									<button type="button" class="button button-link button-trash"  data-action="delete" ><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
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
				<div data-list="cons" class="action-list">
					<?php
					foreach ( $config->cons as $key => $con ) {
						?>
						<div data-list-item="minion-cons" class="action-list-item" data-order="<?php echo esc_attr( $key ); ?>">
							<input type=" text" id="cons[]" name="cons[]" data-target="cons-view-text" value="<?php echo esc_attr( $con ); ?>" data-order="<?php echo esc_attr( $key ); ?>"/>
							<div class="btn-group">
								<button type="button" class="button button-link" data-action="add">Add </button>
								<button type="button" class="button button-link button-trash"  data-action="delete">Delete</button>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<p>
				<label for='button_label'><?php esc_html_e( 'Button Label', 'pixobe-affiliates' ); ?></label>
				<input type="text" id="button_label" name="button_label" required data-target="button_label" value="<?php echo esc_attr( $config->button_label ); ?>" />
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

<template data-form-template="minions-pros">
	<div data-list-item="minions-pros"  class="action-list-item" data-order="">
		<input type="text" id="pros[]" name="pros[]" data-target="pro-view-text" data-order="" value="" />
		<div class="button-group">
			<button type="button"   class="button button-link"  data-action="add" ><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?> </button>
			<button type="button"   class="button button-link button-trash" data-action="delete" ><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</div>
</template>

<template data-view-template="minions-pros">
	<li data-view-item="minions-pros" data-order="">
		<div class="list-item-icon"><app-icon icon="check"></app-icon></div>
		<span data-target-id="pro-view-text" data-order=""></span>
	</li>
</template>

<template data-form-template="minion-cons">
	<div data-list-item="minion-cons" class="action-list-item"  data-order="">
		<input type="text" id="cons[]" name="cons[]"  value="" data-target="cons-view-text" data-order=""/>
		<div class="button-group" data-action="">
			<button type="button"  class="button button-link"  data-action="add"><?php esc_html_e( 'Add', 'pixobe-affiliates' ); ?></button>
			<button type="button"  class="button button-link button-trash" data-action="delete"><?php esc_html_e( 'Remove', 'pixobe-affiliates' ); ?></button>
		</div>
	</div>
</template>

<template data-view-template="minion-cons">
<li  data-view-item="minion-cons" data-order="">
	<div class="list-item-icon"><app-icon icon="x"></app-icon></div>
	<div  data-target-id="cons-view-text" data-order=""></div>
</li>
</template>
