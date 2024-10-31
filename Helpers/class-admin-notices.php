<?php
/**
 * Helper class to load data from custom database
 */

namespace PixobeAffiliates\Helpers;

trait  Admin_Notices {

	/**
	 *  Notification message.
	 */
	public function show_success_notification() { ?>
		<div class="notice notice-success is-dismissible">
				<p><?php esc_html_e( 'New record added!', 'pixobe-affiliate' ); ?></p>
		</div>
		<?php
	}

	/**
	 *  Notification message.
	 */
	public function show_success_update_notification() {
		?>
		<div class="notice notice-success is-dismissible">
				<p><?php esc_html_e( 'Record updated!', 'pixobe-affiliate' ); ?></p>
		</div>
		<?php
	}

	/**
	 *  Notification message.
	 */
	public function show_duplicate_error_message() {
		?>
		<div class="notice notice-error is-dismissible">
				<p><?php esc_html_e( 'A record already exists with same name, please choose a different name', 'pixobe-affiliate' ); ?></p>
		</div>
		<?php
	}

	/**
	 *  Notification message.
	 */
	public function show_general_error_message() {
		?>
		<div class="notice notice-error is-dismissible">
				<p><?php esc_html_e( 'Something failed, unable to update the record', 'pixobe-affiliate' ); ?></p>
		</div>
		<?php
	}

	/**
	 *  Notification message.
	 */
	public function template_not_found_message() {
		?>
			<div class="notice notice-error is-dismissible">
				<p><?php esc_html_e( 'Template-Not-Found', 'pixobe-affiliates' ); ?></p>
			</div>
		<?php
	}

}
