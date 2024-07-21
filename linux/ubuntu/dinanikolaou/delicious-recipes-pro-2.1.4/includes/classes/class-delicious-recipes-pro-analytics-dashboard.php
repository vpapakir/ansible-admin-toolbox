<?php 
/**
 * Analytics Dashboard.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Analytics Dashboard page to display important plugin links and changelogs.
 */
class Delicious_Recipes_Pro_Analytics_Dashboard {

	/**
     * Constructor
     */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'add_analytics_dashboard_menu' ), 99 );
	}

	/** 
	 * Add menu for Analytics Dashboard
	*/
	public function add_analytics_dashboard_menu(){
		add_submenu_page( 
			'delicious-recipes', 
			__( "Analytics Dashboard", 'delicious-recipes-pro' ), 
			__( "Analytics Dashboard", 'delicious-recipes-pro' ), 
			'manage_options', 
			'delicious_recipes_analytics_dashboard', 
			array( $this, 'display_analytics_dashboard_menu_page' ),
			0
		);
	}

	/**
	 * Callback page.
	 *
	 * @return void
	 */
	public function display_analytics_dashboard_menu_page(){
		echo '<div id="dr_analytics_dashboard" data-rest-nonce="'.wp_create_nonce( "wp_rest" ).'"></div>';
	}

}
new Delicious_Recipes_Pro_Analytics_Dashboard();
