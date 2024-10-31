<?php

namespace PixobeAffiliates\Helpers;

/**
 * Helper class to load data from custom database
 */
class Plugin_Constants {


	/**
	 *
	 */
	private static $instance;

	private const PLUGIN_NAME = 'PixobeAffiliates';
	private const PLUGIN_SLUG = 'pixobe-affiliates';
	private const VERSION     = '1.0.2';
	private const ICON_DATA   = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjE0MjQgMkgxMS42MDc1QzExLjEzMzkgMiAxMC43NSAyLjM4MzkyIDEwLjc1IDIuODU3NTVWNC4zOTI0MkMxMC43NSA0Ljg2NjA1IDExLjEzMzkgNS4yNSAxMS42MDc1IDUuMjVIMTMuMTQyNEMxMy42MTYxIDUuMjUgMTQgNC44NjYwNSAxNCA0LjM5MjQyVjIuODU3NTVDMTQgMi4zODM5MiAxMy42MTYxIDIgMTMuMTQyNCAyWiIgZmlsbD0iIzQxNDA0MiIvPgo8cGF0aCBkPSJNNy4xMzE3IDUuMzQxNDdIOC40Nzk1MkM5LjAzNzI1IDUuMzczMTcgOS41Njc4IDUuNTkyOSA5Ljk4NDYgNS45NjQ4NUwxMC4wMzUxIDYuMDIxMDJDMTAuNDA5IDYuNDM2NiAxMC42MjkgNi45Njc4NSAxMC42NTg1IDcuNTI2MVY4Ljg2ODNDMTAuNjU4NSA5LjEwMjEzIDEwLjc1MTQgOS4zMjY0IDEwLjkxNjcgOS40OTE3NUMxMS4wODIxIDkuNjU3MSAxMS4zMDY0IDkuNzUgMTEuNTQwMiA5Ljc1SDEzLjExODNDMTMuMzUyMSA5Ljc1IDEzLjU3NjQgOS42NTcxIDEzLjc0MTcgOS40OTE3NUMxMy45MDcxIDkuMzI2NCAxNCA5LjEwMjEzIDE0IDguODY4M1Y3LjI5MDIyQzE0IDcuMDU2MzcgMTMuOTA3MSA2LjgzMjEyIDEzLjc0MTcgNi42NjY3N0MxMy41NzY0IDYuNTAxNDIgMTMuMzUyMSA2LjQwODUzIDEzLjExODMgNi40MDg1M0gxMS43NzYxQzExLjIxNzggNi4zNzkwNSAxMC42ODY2IDYuMTU5MDIgMTAuMjcxIDUuNzg1MTVMMTAuMjE0OSA1LjczNDZDOS44NDIxNSA1LjMxODI3IDkuNjIyMyA0Ljc4NzQ3IDkuNTkxNDggNC4yMjk1MlYyLjg4MTdDOS41OTE0OCAyLjY0Nzg3IDkuNDk4NiAyLjQyMzYgOS4zMzMyNSAyLjI1ODI1QzkuMTY3ODcgMi4wOTI5IDguOTQzNjIgMiA4LjcwOTc3IDJINy4xMzE3QzYuODk3ODUgMiA2LjY3MzYgMi4wOTI5IDYuNTA4MjUgMi4yNTgyNUM2LjM0MjkgMi40MjM2IDYuMjUgMi42NDc4NyA2LjI1IDIuODgxN1Y0LjQ1OThDNi4yNSA0LjY5MzYyIDYuMzQyOSA0LjkxNzg4IDYuNTA4MjUgNS4wODMyM0M2LjY3MzYgNS4yNDg1OCA2Ljg5Nzg1IDUuMzQxNDcgNy4xMzE3IDUuMzQxNDdaIiBmaWxsPSIjNDE0MDQyIi8+CjxwYXRoIGQ9Ik00LjM5MjQ0IDEwLjc1SDIuODU3NTZDMi4zODM5NCAxMC43NSAyIDExLjEzMzkgMiAxMS42MDc2VjEzLjE0MjVDMiAxMy42MTYxIDIuMzgzOTQgMTQgMi44NTc1NiAxNEg0LjM5MjQ0QzQuODY2MDYgMTQgNS4yNSAxMy42MTYxIDUuMjUgMTMuMTQyNVYxMS42MDc2QzUuMjUgMTEuMTMzOSA0Ljg2NjA2IDEwLjc1IDQuMzkyNDQgMTAuNzVaIiBmaWxsPSIjNDE0MDQyIi8+CjxwYXRoIGQ9Ik00LjM5NDk0IDIuMTI1SDIuODYwMDZDMi4zODY0NCAyLjEyNSAyLjAwMjUgMi41MDg5NSAyLjAwMjUgMi45ODI1N1Y0LjUxNzQ1QzIuMDAyNSA0Ljk5MTA4IDIuMzg2NDQgNS4zNzUgMi44NjAwNiA1LjM3NUg0LjM5NDk0QzQuODY4NTYgNS4zNzUgNS4yNTI1IDQuOTkxMDggNS4yNTI1IDQuNTE3NDVWMi45ODI1N0M1LjI1MjUgMi41MDg5NSA0Ljg2ODU2IDIuMTI1IDQuMzk0OTQgMi4xMjVaIiBmaWxsPSIjNDE0MDQyIi8+CjxwYXRoIGQ9Ik0xMi44OTQ5IDEwLjYyNUgxMS4zNjAxQzEwLjg4NjQgMTAuNjI1IDEwLjUwMjUgMTEuMDA4OSAxMC41MDI1IDExLjQ4MjZWMTMuMDE3NUMxMC41MDI1IDEzLjQ5MTEgMTAuODg2NCAxMy44NzUgMTEuMzYwMSAxMy44NzVIMTIuODk0OUMxMy4zNjg2IDEzLjg3NSAxMy43NTI1IDEzLjQ5MTEgMTMuNzUyNSAxMy4wMTc1VjExLjQ4MjZDMTMuNzUyNSAxMS4wMDg5IDEzLjM2ODYgMTAuNjI1IDEyLjg5NDkgMTAuNjI1WiIgZmlsbD0iIzQxNDA0MiIvPgo8cGF0aCBkPSJNOS41MDI1IDhDOS41MDI1IDguODk3NDYgOC43NzQ5NiA5LjYyNSA3Ljg3NzUgOS42MjVDNi45ODAwNCA5LjYyNSA2LjI1MjUgOC44OTc0NiA2LjI1MjUgOEM2LjI1MjUgNy4xMDI1NCA2Ljk4MDA0IDYuMzc1IDcuODc3NSA2LjM3NUM4Ljc3NDk2IDYuMzc1IDkuNTAyNSA3LjEwMjU0IDkuNTAyNSA4WiIgZmlsbD0iIzQxNDA0MiIvPgo8cGF0aCBkPSJNOC44NjgzIDEwLjY1ODVINy41MjYwN0M2Ljk2Nzg1IDEwLjYyOSA2LjQzNjYgMTAuNDA5IDYuMDIxIDEwLjAzNTJMNS45NjQ4NSA5Ljk4NDZDNS41ODk3NyA5LjU2NTMyIDUuMzY5NzcgOS4wMzAxNSA1LjM0MTQ3IDguNDY4M1Y3LjEyMDQ3QzUuMzM4NyA2Ljg5MzM3IDUuMjQ4NCA2LjY3NjEgNS4wODkzNyA2LjUxMzkyQzQuOTMwMzUgNi4zNTE3NyA0LjcxNDg3IDYuMjU3MjIgNC40ODc4NSA2LjI1SDIuODgxN0MyLjY0Nzg1IDYuMjUgMi40MjM2IDYuMzQyOSAyLjI1ODI1IDYuNTA4MjVDMi4wOTI5IDYuNjczNiAyIDYuODk3ODUgMiA3LjEzMTdWOC43MDk3N0MyIDguOTQzNjIgMi4wOTI5IDkuMTY3ODcgMi4yNTgyNSA5LjMzMzI1QzIuNDIzNiA5LjQ5ODYgMi42NDc4NSA5LjU5MTQ3IDIuODgxNyA5LjU5MTQ3SDQuMjI5NTJDNC43ODcyNSA5LjYyMzE3IDUuMzE3OCA5Ljg0MjkgNS43MzQ2IDEwLjIxNDhMNS43ODUxNSAxMC4yNzFDNi4xNTkwMiAxMC42ODY2IDYuMzc5MDUgMTEuMjE3OSA2LjQwODUgMTEuNzc2MVYxMy4xMTgzQzYuNDA4NSAxMy4yMzQ1IDYuNDMxNSAxMy4zNDk3IDYuNDc2MTUgMTMuNDU3QzYuNTIwODIgMTMuNTY0MyA2LjU4NjI3IDEzLjY2MTggNi42Njg3NSAxMy43NDM3QzYuNzUxMiAxMy44MjU3IDYuODQ5MDcgMTMuODkwNSA2Ljk1NjcgMTMuOTM0NUM3LjA2NDMyIDEzLjk3ODQgNy4xNzk1NyAxNC4wMDA3IDcuMjk1ODIgMTRIOC44NjgzQzkuMTAyMTMgMTQgOS4zMjY0IDEzLjkwNzEgOS40OTE3NSAxMy43NDE4QzkuNjU3MSAxMy41NzY0IDkuNzUgMTMuMzUyMSA5Ljc1IDEzLjExODNWMTEuNTQwMkM5Ljc1IDExLjMwNjQgOS42NTcxIDExLjA4MjEgOS40OTE3NSAxMC45MTY3QzkuMzI2NCAxMC43NTE0IDkuMTAyMTMgMTAuNjU4NSA4Ljg2ODMgMTAuNjU4NVoiIGZpbGw9IiM0MTQwNDIiLz4KPC9zdmc+Cg==';

	/**
	 *  Default constructor
	 */
	public function __construct() {
		$this->main_plugin_file_path = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'pixobe-affiliates'
			. DIRECTORY_SEPARATOR . 'pixobe-affiliates.php';
		$this->plugin_dir_path       = plugin_dir_path( $this->main_plugin_file_path );
		$this->plugin_dir_url        = plugin_dir_url( $this->main_plugin_file_path );
		$this->plugin_dir_name        = plugin_basename( dirname( $this->main_plugin_file_path ) );
		$this->plugin_base_name       = plugin_basename( $this->main_plugin_file_path );
	}

	/**
	 * get instance
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}
		return self::$instance;
	}


	/**
	 * Get version.
	 */
	public function get_version() {
		return self::VERSION;
	}

	/**
	 * Get version.
	 */
	public function get_plugin_slug() {
		return self::PLUGIN_SLUG;
	}

	/**
	 * Get version.
	 */
	public function get_plugin_name() {
		return self::PLUGIN_NAME;
	}

	/**
	 * Get version.
	 */
	public function get_menu_icon() {
		return self::ICON_DATA;
	}


	/**
	 * Get version.
	 */
	public function get_main_plugin_file_path() {
		return $this->main_plugin_file_path;
	}

	/**
	 * Get version.
	 */
	public function get_plugin_dir_path() {
		return $this->plugin_dir_path;
	}

	/**
	 * Get version.
	 */
	public function get_plugin_dir_url() {
		return $this->plugin_dir_url;
	}

	/**
	 * Get version.
	 */
	public function get_plugin_dirname() {
		return $this->plugin_dir_name;
	}

	/**
	 * Get version.
	 */
	public function get_plugin_basename() {
		return $this->plugin_base_name;
	}

}
