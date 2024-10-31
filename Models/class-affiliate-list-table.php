<?php
/*
 Custom Table class
 *
 * @link       https://github.com/pixobe/pixobe-affiliates
 * @since      1.0.0
 *
 * @package    PixobeAffiliates\Models
 */

namespace PixobeAffiliates\Models;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

use  PixobeAffiliates\Helpers\{Affiliate_List_DB_Helper,Form_Helpers};

class Affiliate_List_Table extends \WP_List_Table {


	/**
	 * Comments to be updated.
	 */
	private $page_size = 5;

	/**
	 * Comments to be updated.
	 */
	private $categories;

	/**
	 * Comments to be updated.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'singular' => __( 'link', 'pixobe-affiliates' ),
				'plural'   => __( 'l inks', 'pixobe-affiliates' ),
				'ajax'     => false,
			)
		);
	}

	/**
	 * Comments to be updated.
	 */
	public function no_items() {
		esc_html_e( 'No links found.', 'pixobe-affiliates' );
	}

	/**
	 * Comments to be updated.
	 */
	public function get_columns() {
		$columns = array(
			'cb'       => '<input type="checkbox" />',
			'name'     => __( 'Name', 'pixobe-affiliates' ),
			'id'       => __( 'Link Id', 'pixobe-affiliates' ),
			'style'    => __( 'Style', 'pixobe-affiliates' ),
			'category' => __( 'Category', 'pixobe-affiliates' ),
		);
		return $columns;
	}

	/**
	 * Comments to be updated.
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'name':
			case 'category':
			case 'id':
				return $item[ $column_name ];
			case 'style':
				return ucwords( str_replace( '-', ' ', $item['style'] ) );
			default:
				return print_r( $item, true ); // Show the whole array for troubleshooting purposes.
		}
	}

	/**
	 * Comments to be updated.
	 */
	public function prepare_items() {
		// call bulk action.
		$this->process_bulk_action();

		$per_page = $this->get_items_per_page( 'pixobeaffiliates_records_per_page', $this->page_size );

		$current_page = $this->get_pagenum();

		$order = Form_Helpers::santize_input( 'order', 'asc' );
		$order_by = Form_Helpers::santize_input( 'order', 'name' );

		// Query args.
		$args = array(
			'limit'   => $per_page,
			'offset'  => $per_page * ( $current_page - 1 ),
			'action'  => $this->current_action(),
			'order'   => $order,
			'orderby' => $order_by,
		);

		$this->categories = Affiliate_List_DB_Helper::get_categories();

		if ( isset( $_REQUEST['filterby'] ) ) {
			$filter_by = Form_Helpers::santize_input( 'filterby' );

			// after bulk edit the category may not be there, so reset.
			if ( in_array( $filter_by, $this->categories ) ) {
				$args['filter_by'] = sanitize_text_field( wp_unslash( $_REQUEST['filterby'] ) );
			}
		}

		$data = Affiliate_List_DB_Helper::get_records( $args );

		$total_items = Affiliate_List_DB_Helper::get_count( $args );

		$hidden   = array();
		$sortable = $this->get_sortable_columns();
		$columns  = $this->get_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );

		$this->set_pagination_args(
			array(
				'total_items' => $total_items, // total number of items.
				'per_page'    => $per_page, // items to show on a page.
			)
		);

		usort( $data, array( &$this, 'usort_reorder' ) );

		$this->items = $data;
	}

	/**
	 * Comments to be updated.
	 */
	public function get_bulk_actions() {
		$actions = array(
			'bulk-delete' => __( 'Delete', 'pixobe-affiliates' ),
		);
		return $actions;
	}


	/**
	 * Comments to be updated.
	 */
	public function process_bulk_action() {
		// current action.
		$action = $this->current_action();

		switch ( $action ) {
			case 'bulk-delete':
				$request_ids = isset( $_REQUEST['request_id'] ) ?
					wp_parse_id_list( wp_unslash( $_REQUEST['request_id'] ) ) : array();

				if ( empty( $request_ids ) ) {
					return;
				}

				Affiliate_List_DB_Helper::delete_records( $request_ids );

				// Delete from transient.
				foreach ( $request_ids as $id ) {
					Form_Helpers::delete_transient( $id );
				}
				break;

			case 'delete':
				$id = Form_Helpers::santize_input( 'id' );
				if ( empty( $id ) ) {
					return;
				}
				Affiliate_List_DB_Helper::delete_record( $id );
				Form_Helpers::delete_transient( $id );
				break;
		}
	}

	/**
	 * Comments to be updated.
	 */
	public function usort_reorder( $a, $b ) {
		$order    = Form_Helpers::santize_input( 'order', 'asc' );
		$orderby   = Form_Helpers::santize_input( 'orderby', 'name' );
		$result = strnatcmp( $a[ $orderby ], $b[ $orderby ] );
		return ( 'asc' == $order ) ? $result : -$result;
	}


	/**
	 * Comments to be updated.
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'name'      => array( 'name', false ),
			'id'        => array( 'id', false ),
			'style'     => array( 'style', false ),
			'category'  => array( 'category', false ),
			'clicks'    => array( 'clicks', false ),
			'usedin'    => array( 'usedin', false ),
			'shortcode' => array( 'shortcode', false ),
		);
		return $sortable_columns;
	}

	/**
	 * Comments to be updated.
	 */
	public function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="request_id[]" value="%d" />',
			$item['id']
		);
	}

	/**
	 * Comments to be updated.
	 */
	public function column_name( $item ) {
		$actions = array(
			'edit'   => sprintf( '<a href="?page=%s&action=%s&id=%s">Edit</a>', 'pixobe-affiliates-links', 'edit', $item['id'] ),
			'delete' => sprintf( '<a href="?page=%s&action=%s&id=%s">Trash</a>', 'pixobe-affiliates-links', 'delete', $item['id'] ),
		);
		return sprintf(
			'<a href="?page=%3$s&action=edit&id=%4$s" class="font-bold">%1$s</a> %2$s',
			$item['name'],
			$this->row_actions( $actions ),
			'pixobe-affiliates',
			$item['id']
		);
	}


	/**
	 * Comments to be updated.
	 */
	protected function extra_tablenav( $which ) {

		$categories = $this->categories;

		$filter_by = Form_Helpers::santize_input( 'filterby' );

		switch ( $which ) {
			case 'top':
				?>
				<select name="filterby" id="pa-filter-by">
					<option selected value="">All Links</option>
					<?php
					foreach ( $categories as $category ) {
						?>
						<option value="<?php esc_attr_e( $category ); ?>" 
						<?php
						if ( $category === $filter_by ) {
							?>
								selected <?php } ?>><?php esc_attr_e( $category ); ?></option>
						<?php
					}
					?>
				</select>
				<?php
				submit_button( esc_attr__( 'Filter', 'pixobe-affiliates' ), '', 'action', false );
				?>
				<?php
				break;
			case 'bottom':
				break;
		}
	}

}
