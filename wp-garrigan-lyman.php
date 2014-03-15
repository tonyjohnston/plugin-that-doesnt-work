<?php
/**
 * WP Garrigan Lyman
 *
 * The foundational starting point for GLG functionality within Wordpress
 *
 * @package   WP_Garrigan_Lyman
 * @author    tonyjohnston <tony.johnston@glg.com>
 * @license   GPL-2.0+
 * @link      http://www.glg.com
 * @copyright 2014 tonyjohnston
 *
 * @wordpress-plugin
 * Plugin Name:       WP Garrigan Lyman
 * Plugin URI:        http://www.glg.com
 * Description:       The foundational starting point for GLG functionality within Wordpress
 * Version:           1.0
 * Author:            tonyjohnston
 * Author URI:        http://www.johnstony.com
 * Text Domain:       wp-garrigan-lyman
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: http://github.com/tonyjohnston/wp-garrigan-lyman
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-wp-garrigan-lyman.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'WP_Garrigan_Lyman', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Garrigan_Lyman', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WP_Garrigan_Lyman', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wp-garrigan-lyman-admin.php' );
        require_once( plugin_dir_path( __FILE__ ) . 'includes/Custom-Meta-Boxes/custom-meta-boxes.php' );
	add_action( 'plugins_loaded', array( 'WP_Garrigan_Lyman_Admin', 'get_instance' ) );

}
