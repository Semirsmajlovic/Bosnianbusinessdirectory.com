<?php
/**
 * Handle the plugin's behavior when Customify is present.
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add customer data to Style Manager cloud request data.
 *
 * @param array $request_data
 *
 * @return array
 */
function pixcare_add_customer_data_to_customify_cloud_request_data( $request_data ) {
	// Get the connected pixelgrade user id
	$connection_user = PixelgradeCare_Admin::get_theme_activation_user();
	if ( empty( $connection_user ) || empty( $connection_user->ID ) ) {
		return $request_data;
	}

	$user_id = get_user_meta( $connection_user->ID, 'pixcare_user_ID', true );
	if ( empty( $user_id ) ) {
		// not authenticated
		return $request_data;
	}

	if ( empty( $request_data['customer_data'] ) ) {
		$request_data['customer_data'] = array();
	}
	$request_data['customer_data']['id'] = absint( $user_id );

	return $request_data;
}
add_filter( 'customify_pixelgrade_cloud_request_data', 'pixcare_add_customer_data_to_customify_cloud_request_data', 10, 1 );
add_filter( 'pixelgrade_cloud_request_data', 'pixcare_add_customer_data_to_customify_cloud_request_data', 10, 1 );

/**
 * Add site data to Style Manager cloud request data.
 *
 * @param array $site_data
 *
 * @return array
 */
function pixcare_add_site_data_to_customify_cloud_request_data( $site_data ) {
	if ( empty( $site_data['wp'] ) ) {
		$site_data['wp'] = array();
	}

	$site_data['wp']['language'] = get_bloginfo('language');
	$site_data['wp']['rtl'] = is_rtl();

	return $site_data;
}
add_filter( 'customify_style_manager_get_site_data', 'pixcare_add_site_data_to_customify_cloud_request_data', 10, 1 );

function pixcare_add_cloud_stats_endpoint( $config ) {
	if ( empty( $config['cloud']['stats'] ) ) {
		$config['cloud']['stats'] = array(
			'method' => 'POST',
			'url' => PIXELGRADE_CLOUD__API_BASE . 'wp-json/pixcloud/v1/front/stats',
		);
	}

	return  $config;
}
add_filter( 'customify_style_manager_external_api_endpoints', 'pixcare_add_cloud_stats_endpoint', 10, 1 );

/**
 * Send Color Palettes data when updating if a custom color palette is in use (on Customizer settings save - Publish).
 *
 * @param bool $custom_palette
 */
function pixcare_send_cloud_stats( $custom_palette ) {
	if ( class_exists( 'Customify_Cloud_Api' ) && ! empty( Customify_Cloud_Api::$externalApiEndpoints['cloud']['stats'] ) ) {
		$cloud_api = new Customify_Cloud_Api();
		$cloud_api->send_stats();
		return;
	}
}
add_action( 'customify_style_manager_updated_custom_palette_in_use', 'pixcare_send_cloud_stats', 10, 1 );

// Since we have the notifications system in Pixelgrade Care (starting with v1.5.0), we don't want older versions of Customify (2.3.3 or older) to double the notifications.
add_filter( 'customify_get_remote_notifications', '__return_empty_array', 100, 1 );
// Also disable all the hooks that the notifications in Customify use.
function pixcare_disable_customify_notifications() {
	if ( class_exists( 'Pixcloud_Admin_Notifications_Manager' ) ) {
		$instance = Pixcloud_Admin_Notifications_Manager::instance(
			array(
				'plugin_name'       => 'Customify',
				'text_domain'       => 'customify',
				'version'           => '',
			)
		);

		if ( ! empty( $instance ) ) {
			remove_action( 'admin_init', array( $instance, 'maybe_load_remote_notifications' ) );
			remove_action( 'admin_notices', array( $instance, 'display_notices' ) );
			remove_action( 'admin_enqueue_scripts', array( $instance, 'enqueue_scripts' ) );
			remove_action( 'wp_ajax_' . 'pixcloud_anm' . '_dismiss_admin_notice', array( $instance, 'dismiss_notice' ) );
			remove_filter( 'customify_pixelgrade_cloud_request_data', array( $instance, 'add_data_to_request' ), 10 );
		}

	}
}
add_action( 'admin_init', 'pixcare_disable_customify_notifications', 5 );
