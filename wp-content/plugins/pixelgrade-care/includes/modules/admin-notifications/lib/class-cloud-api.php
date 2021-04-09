<?php
/**
 * This is the class that handles the communication with the cloud.
 *
 * @see         https://pixelgrade.com
 * @author      Pixelgrade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Pixcloud_Cloud_Api' ) ) {

	class Pixcloud_Cloud_Api {

		/**
		 * External REST API endpoints used for communicating with the Pixelgrade Cloud.
		 * @var array
		 * @access public
		 */
		public static $externalApiEndpoints;

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->init();
		}

		/**
		 * Initialize this module.
		 */
		public function init() {
			// Make sure our constants are in place, if not already defined.
			defined( 'PIXELGRADE_CLOUD__API_BASE' ) || define( 'PIXELGRADE_CLOUD__API_BASE', 'https://cloud.pixelgrade.com/' );

			// Save the external API endpoints in a easy to get property.
			self::$externalApiEndpoints = apply_filters( 'pixelgrade_cloud_external_api_endpoints', array(
				'cloud' => array(
					'getDesignAssets' => array(
						'method' => 'GET',
						'url'    => PIXELGRADE_CLOUD__API_BASE . 'wp-json/pixcloud/v1/front/design_assets',
					),
					'getAsset'        => array(
						'method' => 'GET',
						'url'    => PIXELGRADE_CLOUD__API_BASE . 'wp-json/pixcloud/v1/front/asset',
					),
					'stats'           => array(
						'method' => 'POST',
						'url'    => PIXELGRADE_CLOUD__API_BASE . 'wp-json/pixcloud/v1/front/stats',
					),
				),
			) );
		}

		/**
		 * Fetch all the design assets data from the Pixelgrade Cloud.
		 *
		 * @return array|false
		 */
		public function fetch_design_assets() {
			$request_data = $this->get_request_data();

			$request_args = array(
				'method'    => self::$externalApiEndpoints['cloud']['getDesignAssets']['method'],
				'timeout'   => 5,
				'blocking'  => true,
				'body'      => $request_data,
				'sslverify' => false,
			);

			// Increase timeout if the target URL is a development one so we can account for slow local (development) installations.
			if ( self::is_development_url( self::$externalApiEndpoints['cloud']['getDesignAssets']['url'] ) ) {
				$request_args['timeout'] = 10;
			}

			// Get the design assets from the cloud.
			$response = wp_remote_request( self::$externalApiEndpoints['cloud']['getDesignAssets']['url'], $request_args );
			// Bail in case of decode error or failure to retrieve data.
			// We will return the data already available.
			if ( is_wp_error( $response ) ) {
				return false;
			}
			$response_data = json_decode( wp_remote_retrieve_body( $response ), true );
			// Bail in case of decode error or failure to retrieve data.
			// We will return the data already available.
			if ( null === $response_data || empty( $response_data['data'] ) || empty( $response_data['code'] ) || 'success' !== $response_data['code'] ) {
				return false;
			}

			return apply_filters( 'pixelgrade_cloud_fetch_design_assets', $response_data['data'] );
		}

		/**
		 * Fetch a certain asset data from the Pixelgrade Cloud.
		 *
		 * @param string $type The asset type.
		 *
		 * @return array|false
		 */
		public function fetch_asset( $type ) {
			$request_data = $this->get_request_data( array(
				'type' => $type,
			) );

			$request_args = array(
				'method'    => self::$externalApiEndpoints['cloud']['getAsset']['method'],
				'timeout'   => 5,
				'blocking'  => true,
				'body'      => $request_data,
				'sslverify' => false,
			);

			// Increase timeout if the target URL is a development one so we can account for slow local (development) installations.
			if ( self::is_development_url( self::$externalApiEndpoints['cloud']['getAsset']['url'] ) ) {
				$request_args['timeout'] = 10;
			}

			// Get the design assets from the cloud.
			$response = wp_remote_request( self::$externalApiEndpoints['cloud']['getAsset']['url'], $request_args );
			// Bail in case of decode error or failure to retrieve data.
			// We will return the data already available.
			if ( is_wp_error( $response ) ) {
				return false;
			}
			$response_data = json_decode( wp_remote_retrieve_body( $response ), true );
			// Bail in case of decode error or failure to retrieve data.
			// We will return the data already available.
			if ( null === $response_data || empty( $response_data['data'] ) || empty( $response_data['code'] ) || 'success' !== $response_data['code'] ) {
				return false;
			}

			return apply_filters( "pixelgrade_cloud_fetch_{$type}", $response_data['data'] );
		}

		protected function get_request_data( $data = array() ) {
			$request_data = array(
				'site_url'    => home_url( '/' ),
				// We are only interested in data needed to identify the theme and eventually deliver only design assets suitable for it.
				'theme_data'  => $this->get_active_theme_data(),
				// We are only interested in data needed to identify the plugin version and eventually deliver design assets suitable for it.
				'site_data'   => $this->get_site_data(),
				// Extra post statuses besides `publish`.
				'post_status' => array(),
			);

			// Handle development and testing constants.
			if ( defined( 'SM_FETCH_DRAFT_ASSETS' ) && true === SM_FETCH_DRAFT_ASSETS ) {
				$request_data['post_status'][] = 'draft';
			}
			if ( defined( 'SM_FETCH_PRIVATE_ASSETS' ) && true === SM_FETCH_PRIVATE_ASSETS ) {
				$request_data['post_status'][] = 'private';
			}
			if ( defined( 'SM_FETCH_FUTURE_ASSETS' ) && true === SM_FETCH_FUTURE_ASSETS ) {
				$request_data['post_status'][] = 'future';
			}

			$request_data = array_merge( $request_data, $data );

			// Allow others to filter the data we send.
			$request_data = apply_filters( 'pixelgrade_cloud_request_data', $request_data, $this );

			return $request_data;
		}

		/**
		 * Get the active theme data.
		 *
		 * @return array
		 */
		public function get_active_theme_data() {
			$theme_data = array();

			$slug = basename( get_template_directory() );

			$theme_data['slug'] = $slug;

			// Get the current theme style.css data.
			$current_theme = wp_get_theme( get_template() );
			if ( ! empty( $current_theme ) && ! is_wp_error( $current_theme ) ) {
				$theme_data['name']       = $current_theme->get( 'Name' );
				$theme_data['themeuri']   = $current_theme->get( 'ThemeURI' );
				$theme_data['version']    = $current_theme->get( 'Version' );
				$theme_data['textdomain'] = $current_theme->get( 'TextDomain' );
			}

			// Maybe get the WUpdates theme info if it's a theme delivered from WUpdates.
			$wupdates_identification = Pixcloud_Admin_Notifications::get_wupdates_identification_data();
			if ( ! empty( $wupdates_identification ) ) {
				$theme_data['wupdates'] = $wupdates_identification;
			}

			return apply_filters( 'pixelgrade_cloud_get_theme_data', $theme_data );
		}

		/**
		 * Get the site data.
		 *
		 * @return array
		 */
		public function get_site_data() {
			$site_data = array(
				'url'    => home_url( '/' ),
				'is_ssl' => is_ssl(),
			);

			$site_data['wp'] = array(
				'version' => get_bloginfo( 'version' ),
			);

			return apply_filters( 'pixelgrade_cloud_get_site_data', $site_data );
		}

		/**
		 * Send stats to the Pixelgrade Cloud.
		 *
		 * @param array $request_data The data to be sent.
		 * @param bool  $blocking     Optional. Whether this should be a blocking request. Defaults to false.
		 *
		 * @return array|false
		 */
		public function send_stats( $request_data = array(), $blocking = false ) {
			if ( empty( $request_data ) ) {
				// This is what we send by default.
				$request_data = array(
					'site_url'   => home_url( '/' ),
					// We are only interested in data needed to identify the theme and eventually deliver only design assets suitable for it.
					'theme_data' => $this->get_active_theme_data(),
					// We are only interested in data needed to identify the plugin version and eventually deliver design assets suitable for it.
					'site_data'  => $this->get_site_data(),
				);
			}

			/**
			 * Filters request data sent to the cloud.
			 *
			 * @param array  $request_data
			 * @param object $this @todo This argument is no longer needed and should be removed when Pixelgrade Care doesn't rely on it.
			 */
			$request_data = apply_filters( 'pixelgrade_cloud_request_data', $request_data, $this );

			$request_args = array(
				'method'    => self::$externalApiEndpoints['cloud']['stats']['method'],
				'timeout'   => 5,
				'blocking'  => $blocking,
				'body'      => $request_data,
				'sslverify' => false,
			);

			// Make the request and return the response.
			return wp_remote_request( self::$externalApiEndpoints['cloud']['stats']['url'], $request_args );
		}

		public static function is_development_url( $url ) {
			$stoppers = array(
				'^10.0.',
				'^127.0.',
				'^localhost',
				'^192.168.',
				':8080$',
				':8888$',
				'.example$',
				'.invalid$',
				'.localhost',
				'~',
				'.myftpupload.com$',
				'.myraidbox.de$',
				'.cafe24.com$',
				'.no-ip.org$',
				'.pressdns.com$',
				'.home.pl$',
				'.xip.io$',
				'.tw1.ru$',
				'.pantheonsite.io$',
				'.wpengine.com$',
				'.accessdomain.com$',
				'.atwebpages.com$',
				'.testpagejack.com$',
				'.hosting-test.net$',
				'webhostbox.net',
				'amazonaws.com',
				'ovh.net$',
				'.rhcloud.com$',
				'tempurl.com$',
				'x10host.com$',
				'^www.test.',
				'^test.',
				'^dev.',
				'^staging.',
				'no.web.ip',
				'^[^\.]*$', //this removes urls not containing any dot in it like "stest" or "localhost"
				'^[[:digit:]]+\.[[:digit:]]+\.[[:digit:]]+\.[[:digit:]]+', //this removes urls starting with an IPv4
				'^[[:alnum:]-]+\.dev', //this removes any url with the .dev domain - i.e test.dev, pixelgrade.dev/test
				'^[[:alnum:]-]+\.local', //this removes any url with the .local domain - i.e test.local, pixelgrade.local/test
				'^[[:alnum:]-]+\.test', //this removes any url with the .local domain - i.e test.local, pixelgrade.local/test
				'^[[:alnum:]-]+\.invalid', //this removes any url with the .local domain - i.e test.local, pixelgrade.local/test
				'^[[:alnum:]-]+\.localhost', //this removes any url with the .local domain - i.e test.local, pixelgrade.local/test
				'^[[:alnum:]-]+\.example', //this removes any url with the .local domain - i.e test.local, pixelgrade.local/test
			);

			foreach ( $stoppers as $regex ) {
				if ( preg_match( '#' . $regex .'#i', $url ) ) {
					return true;
				}
			}

			return false;
		}
	}
}
