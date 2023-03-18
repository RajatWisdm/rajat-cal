<?php
    

 class RajatCal {
    public $plugin;

    function __construct() {
        $this->plugin = plugin_basename( __FILE__ );
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

?>