<?php
/**
 * Various shortcodes used in our themes.
 *
 * @link       https://pixelgrade.com
 * @since      1.2.2
 *
 * @package    PixelgradeCare
 * @subpackage PixelgradeCare/ThemeHelpers
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/*++++++++++++++++++++++++*/
/**
 * Load the Nova Menu logic.
 * https://pixelgrade.com/
 */

/**
 * Returns the main instance of Pixcare_Nova_Menu to prevent the need to use globals.
 *
 * @since  1.2.2
 * @return Pixcare_Nova_Menu
 */
function Pixcare_Nova_Menu() {
	// Only load if we have to
	if ( ! class_exists( 'Pixcare_Nova_Menu') ) {
		require_once( plugin_dir_path( __FILE__ ) . 'nova-menu/class-nova-menu.php' );
	}
	return Pixcare_Nova_Menu::instance();
}

// Load The Nova Menu
$pixcare_nova_menu_instance = Pixcare_Nova_Menu();
/*------------------------*/

/**
 * Add the Page shortcode used in heroes mainly
 *
 * @param array $atts
 *
 * @return string
 */
function pixcare_create_page_shortcode( $atts ) {
	$output = '';

	// Attributes
	extract( shortcode_atts(
			array(
				'id' => '',
			), $atts )
	);

	$post = get_the_ID();

	if ( ! empty( $id ) && intval( $id ) ) {
		$post = intval( $id );
	}

	if ( in_array( 'title', $atts ) || in_array( 'Title', $atts ) ) {
		$output .= get_the_title( $post );
	}

	return $output;
}
// we will register the shortcode with both lovercase and uppercase
add_shortcode( 'page', 'pixcare_create_page_shortcode' );
add_shortcode( 'Page', 'pixcare_create_page_shortcode' );
