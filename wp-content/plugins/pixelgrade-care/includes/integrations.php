<?php
/**
 * Load various logic for specific integrations.
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load Customify compatibility file.
 */
require plugin_dir_path( __FILE__ ) . '/integrations/customify.php';

/**
 * Load Envato Hosted compatibility file.
 */
require plugin_dir_path( __FILE__ ) . '/integrations/envato-hosted.php';

/**
 * Load Lonely Mode compatibility file.
 */
require plugin_dir_path( __FILE__ ) . '/integrations/lonely-mode.php';

/**
 * Load Backstage compatibility file.
 */
require plugin_dir_path( __FILE__ ) . '/integrations/backstage.php';

/**
 * Load WooCommerce compatibility file.
 */
require plugin_dir_path( __FILE__ ) . '/integrations/woocommerce.php';
