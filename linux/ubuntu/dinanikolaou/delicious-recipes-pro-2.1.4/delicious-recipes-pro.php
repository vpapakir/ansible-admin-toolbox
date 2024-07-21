<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://wpdelicious.com/
 * @since             1.0.0
 * @package           WP Delicious Pro
 *
 * @wordpress-plugin
 * Plugin Name:       WP Delicious Pro
 * Plugin URI:        https://wpdelicious.com/pricing/
 * Description:       WP Delicious Pro includes tons of extra essential features to make it easier to publish and share your recipes for bloggers.
 * Version:           2.1.4
 * Author:            WP Delicious
 * Author URI:        https://wpdelicious.com/
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       delicious-recipes-pro
 * Domain Path:       /languages
 * Requires at least: 5.1
 * Requires PHP:      7.4
 * Tested up to :     6.6
 * Requires Plugins:  delicious-recipes
 */

use DR_PRO\Delicious_Recipes_Pro;

defined( 'ABSPATH' ) || exit;

// Include the autoloader.
require_once __DIR__ . '/vendor/autoload.php';

if ( ! defined( 'DELICIOUS_RECIPES_PRO_PLUGIN_FILE' ) ) {
	define( 'DELICIOUS_RECIPES_PRO_PLUGIN_FILE', __FILE__ );
}

defined( 'DELICIOUS_RECIPES_PRO_VERSION' ) || define( 'DELICIOUS_RECIPES_PRO_VERSION', '2.1.4' );

/**
 * Return the main instance of Delicious_Recipes_Pro.
 *
 * @since 1.0.0
 * @return Delicious_Recipes_Pro
 */
function DEL_RECIPE_PRO() {
	return Delicious_Recipes_Pro::instance();
}

DEL_RECIPE_PRO();
