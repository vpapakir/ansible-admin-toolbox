<?php
/**
 * Ingredient Links.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ingredient Links page to display ingredient links.
 */
class Delicious_Recipes_Auto_Link_Ingredients {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_ingredient_links_menu' ), 20 );
	}

	/**
	 * Add menu for Ingredient Links
	 */
	public function add_ingredient_links_menu() {
		add_submenu_page(
			'delicious-recipes',
			__( 'Ingredients Link', 'delicious-recipes-pro' ),
			__( 'Ingredients Link', 'delicious-recipes-pro' ),
			'manage_options',
			'delicious_recipes_auto_link_ingredients',
			array( $this, 'display_ingredient_links_menu_page' ),
			20
		);
	}

	/**
	 * Callback page.
	 *
	 * @return void
	 */
	public function display_ingredient_links_menu_page() {
		echo '<div id="dr_auto_link_ingredients_screen_page"></div>';
	}
}

new Delicious_Recipes_Auto_Link_Ingredients();
