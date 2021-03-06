<?php
/**
 * Document for class Fonto_Option
 *
 * PHP Version 5.6
 *
 * @category Class
 * @package Fonto
 * @author   Pixelgrade <contact@pixelgrade.com>
 * @license  GPL v2.0 (or later) see LICENCE file or http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://pixelgrade.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to manage options
 *
 * @category include
 * @package  Fonto
 * @author   Pixelgrade <contact@pixelgrade.com>
 * @license  GPL v2.0 (or later) see LICENCE file or http://www.gnu.org/licenses/gpl-2.0.html
 * @version  Release: .1
 * @link     https://pixelgrade.com
 * @since    Class available since Release .1
 */
class Fonto_Option {
	/**
	 * The single instance of Fonto_Option
	 * @var    Fonto_Option
	 * @access  private
	 * @since    1.0.0
	 */
	private static $_instance = null;

	/**
	 * Constructor function
	 *
	 * @param  Object $parent Main Fonto instance.
	 */
	public function __construct( $parent ) {
		$this->parent = $parent;
	}

	/**
	 * Get the prefixed version input $name suitable for storing in WP options
	 * Idempotent: if $optionName is already prefixed, it is not prefixed again, it is returned without change
	 *
	 * @param  string $name option name to prefix.
	 *
	 * @return string
	 */
	public function prefix( $name ) {
		$optionNamePrefix = $this->token();
		if ( strpos( $name, $optionNamePrefix ) === 0 ) { // 0 but not false
			return $name; // already prefixed
		}

		return $optionNamePrefix . $name;
	}

	/**
	 * Get the token.
	 * @access  public
	 * @since   1.0.0
	 * @return  string
	 */
	public function token() {
		return $this->parent->_token;
	}

	/**
	 * A wrapper function delegating to WP get_option() but it prefixes the input $optionName
	 * to enforce "scoping" the options in the WP options table thereby avoiding name conflicts
	 *
	 * @param string $optionName Option to get.
	 * @param string $default default value to return if the option is not set.
	 *
	 * @return string the value from delegated call to get_option(), or optional default value
	 * if option is not set.
	 */
	public function get_option( $optionName, $default = null ) {
		$prefixedOptionName = $this->prefix( $optionName );
		$retVal             = get_option( $prefixedOptionName );
		if ( ! $retVal && $default ) {
			$retVal = $default;
		}

		return $retVal;
	}

	/**
	 * A wrapper function delegating to WP add_option() but it prefixes the input $optionName
	 * to enforce "scoping" the options in the WP options table thereby avoiding name conflicts.
	 *
	 * @param  string $optionName Defined in settings.php and set as keys of $this->optionMetaData.
	 * @param  mixed $value the new value.
	 *
	 * @return null from delegated call to delete_option()
	 */
	public function add_option( $optionName, $value ) {
		$prefixedOptionName = $this->prefix( $optionName );

		return add_option( $prefixedOptionName, $value );
	}

	/**
	 * A wrapper function delegating to WP add_option() but it prefixes the input $optionName
	 * to enforce "scoping" the options in the WP options table thereby avoiding name conflicts
	 *
	 * @param string $optionName Name of option.
	 * @param mixed $value The new value.
	 *
	 * @return null from delegated call to delete_option()
	 */
	public function update_option( $optionName, $value ) {
		$prefixedOptionName = $this->prefix( $optionName );

		return update_option( $prefixedOptionName, $value );
	}

	/**
	 * Get the version string in the options. This is useful if you install upgrade and
	 * need to check if an older version was installed to see if you need to do certain
	 * upgrade housekeeping (e.g. changes to DB schema).
	 * @return null
	 */
	public function get_version_saved() {

		return $this->get_option( '_version' );
	}

	/**
	 * Main Fonto_Option Instance
	 *
	 * Ensures only one instance of Fonto_Option is loaded or can be loaded.
	 *
	 * @since  1.0.0
	 * @static
	 * @see    Fonto()
	 *
	 * @param  Object $parent Main Fonto instance.
	 *
	 * @return Fonto_Option instance
	 */
	public static function instance( $parent ) {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $parent );
		}

		return self::$_instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {

		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Cheatin&#8217; huh?' ) ), esc_html( $this->parent->_version ) );
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {

		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Cheatin&#8217; huh?' ) ), esc_html( $this->parent->_version ) );
	} // End __wakeup()


}
