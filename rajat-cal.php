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
        add_submenu_page( 'rg_cal', 'Add Plan', 'Add Plan', 'manage_options', 'add_plan', array( $this, 'add_page_markup' ) );
    }

    function admin_page_markup() {
        require_once plugin_dir_path( __FILE__ ) . 'templates/calendar.php';
    }

    function add_page_markup() {
        require_once plugin_dir_path( __FILE__ ) . 'templates/add-schedule.php';
    }
 }

 if ( class_exists( 'RajatCal' ) ){
    $cal = new RajatCal();

	// JQUERY CDN LINKING
	wp_register_style( 'jquery-datatable', 'https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css' );
	wp_enqueue_style('jquery-datatable');
	wp_register_script( 'jquery-datatable', 'https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js' );
	wp_enqueue_script('jquery-datatable');
	
	
	// BOOTSTRAP CDN LINKING
	wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' );
	wp_enqueue_style('bootstrap');
	wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' );
	wp_enqueue_script('bootstrap');

	// CUSTOM STYLE
	wp_register_style( 'wdm-custom-style', './public/css/rajat-cal-public.css' );
	wp_enqueue_style('wdm-custom-style');

    $cal->register();
 }