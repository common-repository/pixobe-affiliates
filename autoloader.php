<?php

spl_autoload_register( 'pixobeaffiliates_autoloader' );

/**
 * Autoloader function
 *
 * @class_name class_name name of the class.
 */
function pixobeaffiliates_autoloader( $class_name ) {
	if ( strpos( $class_name, 'PixobeAffiliates\\' ) === 0 ) { // Only do autoload for our plugin files.
		$class_file = str_replace(
			array(
				'\\',
				'PixobeAffiliates'
					. DIRECTORY_SEPARATOR,
			),
			array( DIRECTORY_SEPARATOR, '' ),
			$class_name
		) . '.php';

		$base_name = basename( $class_file );
		$class_file = str_replace( $base_name, 'class-' . str_replace( '_', '-', strtolower( $base_name ) ), $class_file );
		require_once plugin_dir_path( __FILE__ ) . $class_file;
	}
}
