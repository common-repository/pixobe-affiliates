<?php
/**
 * Default config
 */

namespace PixobeAffiliates\Helpers;

/**
 *  Default config
 */
class Default_Config {

	private const DEFAULT_STYLE = 'simple';

	private const COMMON_CONFIG = array(
		'id'         => '',
		'name'       => '',
		'url'        => '',
		'category'   => '',
		'style'      => '',
		'rel'        => 'nofollow sponsored',
		'link_target' => '_blank',
	);

	private const STYLE_LIST = array(
		'simple'   => 'Simple',
		'document' => 'Document',
		'minion'   => 'Minion',
		'price-comparison' => 'Price Comparison',
	);

	private const CONFIG = array(
		'document' => array(
			'style'              => 'document',
			'url'                => 'https://pixobe.com',
			'link_target'         => '_blank',
			'price'              => '29',
			'header'             => 'Affiliate Marketing For Dummies',
			'caption'            => 'Get Your Piece of the Hottest Business Online Today! ',
			'pros'               => array( 'Paper back', 'Electronic version', 'In stock' ),
			'button_label'        => 'HURRY UP',
			'currency'           => '$',
			'units'              => 'unlimited',
			'disclaimer' => null,
		),
		'simple'   => array(
			'style'  => 'simple',
			'url'    => 'https://pixobe.com',
			'header' => 'Simple Affiliate Link',
		),
		'minion'   => array(
			'style'              => 'minion',
			'header'             => 'Nitendo Switch Lite',
			'image'              => 'https://www.nintendo.com/sg/top/img/hello/chara_pc.png',
			'stars'              => '4.5',
			'pros'               => array( 'Games load in a snap', 'Feels good in hand', 'Extremely flexible' ),
			'cons'               => array( 'Expensive First-Party Games', 'No Backwards Compatibility' ),
			'button_label'        => 'Watch Now',
			'url'                => 'https://amzn.to/3JE7JiF',
			'button_color'        => '#A10000',
			'border_color'        => '#115695',
			'button_bg_color'      => '#F4DD4B',
			'button_url'          => 'https://amzn.to/3JE7JiF',
			'caption'            => 'Its easy to take your favourite games with you.',
			'disclaimer' => 'As an Amazon Associate I earn from qualifying purchases.',
		),
		'price-comparison'   => array(
			'style'  => 'price-comparison',
			'plan' => array( 'Basic', 'Standard', 'Premium' ),
			'price' => array( 'FREE', '20$', '80$' ),
			'price_extended' => array( 'For Ever', 'Per Month', 'Per Month' ),
			'button_label' => array( 'SELECT', 'SELECT', 'SELECT' ),
			'url' => array( '#', '#', '#' ),
			'theme_color' => array( '#3D3D3D', '#4ade80', '#fbbf24' ),
			'theme_text_color' => array( '#cacaca', '#ffffff', '#ffffff' ),
			'features' => array(
				array( '100 EMAILS/MONTH', '1 GB STORAGE' ),
				array( '100k EMAILS/MONTH', '10 GB STORAGE', 'Tech Support' ),
				array( 'Unlimited Emails/Month', 'Unlimited', 'Tech Support' ),
			),
		),
	);


	/**
	 * TODO.
	 */
	public static function get_default_config( $config_style ): array {
		if ( is_null( $config_style ) ) {
			$config_style = self::DEFAULT_STYLE;
		}
		return array_merge( self::COMMON_CONFIG, self::CONFIG[ $config_style ] );
	}

	/**
	 * Current style list.
	 */
	public static function get_style_list(): array {
		return self::STYLE_LIST;
	}

	/**
	 * Default style to be selected on add new page.
	 */
	public static function get_default_style(): string {
		return self::DEFAULT_STYLE;
	}
}
