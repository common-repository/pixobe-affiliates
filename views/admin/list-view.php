<?php

/**
 * Provide list view of the links
 *
 * @link       https://github.com/pixobe/pixobe-affiliates
 * @since      1.0.0
 *
 * @package    Pixobe_Affiliates
 * @subpackage Pixobe_Affiliates/admin/partials
 */

use PixobeAffiliates\Models\Affiliate_List_Table;
use PixobeAffiliates\Helpers\Plugin_Constants;
?>
<div class="wrap">

	<?php

	$current_action = null;

	if ( isset( $_GET['action'] ) ) {
		$current_action = sanitize_text_field( wp_unslash( $_GET['action'] ) );
	}

	if ( 'edit' === $current_action ) {
		$plugin_constant = Plugin_Constants::get_instance();
		require_once $plugin_constant->get_plugin_dir_path() . 'views/admin/create-update-link.php';
	} else {
		$plugin_constant = Plugin_Constants::get_instance();
		$data_table      = new Affiliate_List_Table();
		$data_table->prepare_items();
		?>
		<form id="affiliate-links-table" method="POST" onsubmit="onPixobeListFilter()" action="">
			<?php
				$data_table->display();
			?>
		</form>

	<?php } ?>
</div>
