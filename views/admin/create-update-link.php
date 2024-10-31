<?php

/***
 * This file has default form fields for all the styles
 */

use PixobeAffiliates\Helpers\{Default_Config,Plugin_Constants,Form_Helpers};
use PixobeAffiliates\Models\Admin_Home_Model;

$plugin_constant = Plugin_Constants::get_instance();
$style_options = Default_Config::get_style_list();

$home_model      = new Admin_Home_Model();
$config          = $home_model->create_config();
$admin_view_path = $home_model->get_style_admin_page( $config );

?>
	<h2><?php do_action( 'pa_notifications' ); ?></h2>
	
	<h1>
	  <?php
		if ( $home_model->get_id() ) {
			esc_html_e( 'Editing Link: ', 'pixobe-affiliates' );
			echo esc_html( $config->name );
		} else {
			esc_html_e( 'Create New Link', 'pixobe-affiliates' );
		}
		?>
	</h1>
	<div class="pixobe" id="paadmin">
		<form method="POST" action="" id="pixobe-affiliate-form">
			<input type="hidden" name="action" value="init" id="pixobe-formaction"/>
			<input type="hidden" value="<?php echo esc_attr( $config->id ); ?>" name="id" id="pa_id" />
			<div class="pixobe-admin-container gap-2">
				<div id="pacommon">
					<?php require_once $plugin_constant->get_plugin_dir_path() . 'views/admin/common-config.php'; ?>
				</div>  
				<div id="papreview">
					<div class="metabox w-full">
						<div class="metabox-header">
							<h2> <?php esc_html_e( 'Preview', 'pixobe-affiliates' ); ?></h2>
						</div>
						<div class="metabox-content">
							 <?php require_once Form_Helpers::get_view_path( $config->style ); ?>
						</div>
					</div>
				</div>  
				<div id="paconfig">
					 <?php require_once $admin_view_path; ?>
				</div>  
			</div>
		</form>
	</div>
