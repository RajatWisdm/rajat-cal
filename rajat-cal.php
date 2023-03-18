<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://github.com/RajatWisdm/
 * @since             1.0.0
 * @package           Rajat_Cal
 *
 * @wordpress-plugin
 * Plugin Name:       Rajat Calendar
 * Plugin URI:        https://https://github.com/RajatWisdm/rajat-cal
 * Description:       This is a wordpress plugin that allows wordpress admin to schedule posts
 * Version:           1.0.0
 * Author:            Rajat Ganguly
 * Author URI:        https://https://github.com/RajatWisdm/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rajat-cal
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RAJAT_CAL_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

 require plugin_dir_path( __FILE__ ) . 'includes/class-rajat-cal.php';

class RajatCal {
    public $plugin;

    function __construct() {
        $this->plugin = plugin_basename( __FILE__ );
    }

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-rajat-cal-activator.php
	 */
	function activate_rajat_cal() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-rajat-cal-activator.php';
		Rajat_Cal_Activator::activate();
	}

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-rajat-cal-deactivator.php
	 */
	function deactivate_rajat_cal() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-rajat-cal-deactivator.php';
		Rajat_Cal_Deactivator::deactivate();
	}

    function register() {
        // ADDING SETTINGS PAGE
        add_action( 'admin_menu', [ $this, 'add_admin_pages' ] );

        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=plugin_one">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    function add_admin_pages() {
        add_menu_page( 'Rajat Calender', 'Rajat Calender', 'manage_options', 'rg_cal', array( $this, 'admin_page_markup' ), 'dashicons-calendar-alt', 100 );
    }

    function admin_page_markup() {
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
    }
 }

 if ( class_exists( 'RajatCal' ) ){
    $cal = new RajatCal();
    $cal->register();
 }