<?php
/**
 * Rest API: Delicious_Recipes_Pro_REST_Ingredients_Image_Controller class
 *
 * @package WP Delicious API Core
 * @subpackage API Core
 * @since 1.6.1
 */

/**
 * Core base controller for managing and interacting with Ingredients Image via the REST API.
 *
 * @since 1.6.1
 */
class Delicious_Recipes_Pro_REST_Ingredients_Image_Controller {

	/**
	 * The namespace of this controller's route.
	 *
	 * @var string
	 */
	protected $namespace = 'deliciousrecipe/v1';

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/ingredients-image',
			array(
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_ingredients_image' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
				),
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'post_ingredients_image' ),
					'permission_callback' => array( $this, 'update_settings_permissions_check' ),
				),
			)
		);
	}

	/**
	 * Check permissions for the posts.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! current_user_can( 'read' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot view the post resource.', 'delicious-recipes-pro' ), array( 'status' => $this->authorization_status_code() ) );
		}
		return true;
	}

	/**
	 * Check permissions for the settings update.
	 *
	 * @param WP_REST_Request $request Current request.
	 */
	public function update_settings_permissions_check( $request ) {
		// Check manage_options prevlages.
		if ( ! current_user_can( 'manage_options' ) ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot update the site settings.', 'delicious-recipes-pro' ), array( 'status' => $this->authorization_status_code() ) );
		}
		return true;
	}

	/**
	 * Sets Authorization Status Code.
	 *
	 * @return $status
	 */
	public function authorization_status_code() {
		$status = 401;

		if ( is_user_logged_in() ) {
			$status = 403;
		}

		return $status;
	}

	/**
	 * Get all the ingredients image for ingredients.
	 */
	public function get_ingredients_image() {
		$icons_path = plugin_dir_url( DELICIOUS_RECIPES_PRO_PLUGIN_FILE ) . 'assets/images/ingredients-png/';
		$items      = array(
			array( 'almond', array( 'almond', 'almonds', 'raw almond', 'roasted almond' ) ),
			array( 'apple', array( 'apple', 'apples', 'green apple', 'red apple' ) ),
			array( 'avocado', array( 'avocado', 'avocados', 'ripe avocado', 'fresh avocado' ) ),
			array( 'basil', array( 'basil', 'fresh basil', 'basil leaves', 'dried basil' ) ),
			array( 'bacon', array( 'bacon', 'bacon strips', 'crispy bacon', 'cooked bacon' ) ),
			array( 'banana', array( 'banana', 'bananas', 'ripe banana', 'fresh banana' ) ),
			array( 'black olive', array( 'black olive', 'black olives', 'sliced black olive', 'whole black olive' ) ),
			array( 'brown rice', array( 'brown rice', 'cooked brown rice', 'organic brown rice', 'steamed brown rice' ) ),
			array( 'brown sugar', array( 'brown sugar', 'dark brown sugar', 'light brown sugar', 'packed brown sugar' ) ),
			array( 'butter', array( 'butter', 'unsalted butter', 'salted butter', 'melted butter' ) ),
			array( 'cabbage', array( 'cabbage', 'green cabbage', 'red cabbage', 'shredded cabbage' ) ),
			array( 'capsicum', array( 'capsicum', 'bell pepper', 'green capsicum', 'red capsicum' ) ),
			array( 'carrot', array( 'carrot', 'carrots', 'baby carrot', 'shredded carrot' ) ),
			array( 'chedder cheese', array( 'cheddar cheese', 'sharp cheddar cheese', 'mild cheddar cheese', 'aged cheddar cheese' ) ),
			array( 'cheese', array( 'cheese', 'sliced cheese', 'grated cheese', 'shredded cheese' ) ),
			array( 'chicken', array( 'chicken', 'chicken breast', 'cooked chicken', 'grilled chicken' ) ),
			array( 'coconut', array( 'coconut', 'coconut meat', 'shredded coconut', 'desiccated coconut' ) ),
			array( 'corn', array( 'corn', 'sweet corn', 'corn kernels', 'fresh corn' ) ),
			array( 'egg white', array( 'egg white', 'egg whites', 'raw egg white', 'cooked egg white' ) ),
			array( 'egg yolk', array( 'egg yolk', 'egg yolks', 'raw egg yolk', 'cooked egg yolk' ) ),
			array( 'eggs', array( 'eggs', 'whole eggs', 'fresh eggs', 'organic eggs' ) ),
			array( 'fish', array( 'fish', 'fresh fish', 'grilled fish', 'cooked fish' ) ),
			array( 'flour', array( 'flour', 'all-purpose flour', 'whole wheat flour', 'gluten-free flour' ) ),
			array( 'garlic', array( 'garlic', 'clove of garlic', 'garlic clove', 'garlic cloves' ) ),
			array( 'honey', array( 'honey', 'raw honey', 'organic honey', 'natural honey' ) ),
			array( 'kale', array( 'kale', 'fresh kale', 'kale leaves', 'organic kale' ) ),
			array( 'lamb meat', array( 'lamb meat', 'lamb', 'cooked lamb meat', 'grilled lamb meat' ) ),
			array( 'lemon', array( 'lemon', 'lemons', 'lemon zest', 'lemon juice' ) ),
			array( 'lentils', array( 'lentils', 'red lentils', 'green lentils', 'cooked lentils' ) ),
			array( 'lettuce', array( 'lettuce', 'romaine lettuce', 'iceberg lettuce', 'fresh lettuce' ) ),
			array( 'maple syrup', array( 'maple syrup', 'pure maple syrup', 'organic maple syrup', 'grade A maple syrup' ) ),
			array( 'milk', array( 'milk', 'whole milk', 'skim milk', 'organic milk' ) ),
			array( 'mushrooms', array( 'mushrooms', 'sliced mushrooms', 'fresh mushrooms', 'button mushrooms' ) ),
			array( 'noodles', array( 'noodles', 'egg noodles', 'rice noodles', 'cooked noodles' ) ),
			array( 'oats', array( 'oats', 'rolled oats', 'steel-cut oats', 'quick oats' ) ),
			array( 'paneer', array( 'paneer', 'fresh paneer', 'cubed paneer', 'grilled paneer' ) ),
			array( 'potato', array( 'potato', 'potatoes', 'russet potato', 'mashed potato' ) ),
			array( 'radish', array( 'radish', 'radishes', 'red radish', 'sliced radish' ) ),
			array( 'red wine vinegar', array( 'red wine vinegar', 'aged red wine vinegar', 'organic red wine vinegar', 'premium red wine vinegar' ) ),
			array( 'rice', array( 'rice', 'white rice', 'steamed rice', 'cooked rice' ) ),
			array( 'salad', array( 'salad', 'mixed salad', 'green salad', 'fresh salad' ) ),
			array( 'salmon', array( 'salmon', 'fresh salmon', 'grilled salmon', 'smoked salmon' ) ),
			array( 'sauce', array( 'sauce', 'tomato sauce', 'hot sauce', 'barbecue sauce' ) ),
			array( 'sausage', array( 'sausage', 'sausages', 'pork sausage', 'cooked sausage' ) ),
			array( 'sprouts', array( 'sprouts', 'bean sprouts', 'fresh sprouts', 'alfalfa sprouts' ) ),
			array( 'tofu', array( 'tofu', 'firm tofu', 'silken tofu', 'fresh tofu' ) ),
			array( 'turkey', array( 'turkey', 'turkey breast', 'roasted turkey', 'cooked turkey' ) ),
			array( 'vinegar', array( 'vinegar', 'white vinegar', 'apple cider vinegar', 'balsamic vinegar' ) ),
			array( 'water', array( 'water', 'bottled water', 'filtered water', 'mineral water' ) ),
			array( 'yoghurt', array( 'yoghurt', 'yogurt', 'curd', 'Greek yogurt', 'strained yogurt' ) ),
			array( 'yeast', array( 'yeast', 'baker\'s yeast', 'brewer\'s yeast', 'active dry yeast', 'instant yeast' ) ),
			array( 'white-wine', array( 'white wine', 'Chardonnay', 'Sauvignon Blanc', 'Pinot Grigio', 'Riesling' ) ),
			array( 'tomato', array( 'tomato', 'tomatoes', 'cherry tomato', 'plum tomato', 'vine-ripened tomato' ) ),
			array( 'sugar', array( 'sugar', 'granulated sugar', 'brown sugar', 'powdered sugar', 'cane sugar' ) ),
			array( 'strawberry', array( 'strawberry', 'strawberries', 'wild strawberry', 'frozen strawberry', 'strawberry jam' ) ),
			array( 'spinach', array( 'spinach', 'baby spinach', 'spinach leaves', 'fresh spinach', 'frozen spinach' ) ),
			array( 'soy sauce', array( 'soy sauce', 'soy', 'soya sauce', 'tamari sauce', 'shoyu' ) ),
			array( 'shrimp', array( 'shrimp', 'prawn', 'shrimp cocktail', 'jumbo shrimp', 'breaded shrimp' ) ),
			array( 'sausage', array( 'sausage', 'sausages', 'pork sausage', 'Italian sausage', 'bratwurst' ) ),
			array( 'salt', array( 'salt', 'sea salt', 'table salt', 'kosher salt', 'Himalayan salt' ) ),
			array( 'salami', array( 'salami', 'Italian salami', 'pepperoni salami', 'Genoa salami', 'hard salami' ) ),
			array( 'rosemary', array( 'rosemary', 'fresh rosemary', 'dried rosemary', 'rosemary sprigs', 'ground rosemary' ) ),
			array( 'red-wine', array( 'red wine', 'Cabernet Sauvignon', 'Merlot', 'Shiraz', 'Zinfandel' ) ),
			array( 'red beans', array( 'red beans', 'kidney beans', 'pinto beans', 'red kidney beans', 'canned beans' ) ),
			array( 'quinoa', array( 'quinoa', 'white quinoa', 'red quinoa', 'black quinoa', 'tricolor quinoa' ) ),
			array( 'potatoes', array( 'potatoes', 'potato', 'russet potatoes', 'Yukon Gold potatoes', 'sweet potatoes' ) ),
			array( 'pork', array( 'pork', 'pork chops', 'pork loin', 'pork ribs', 'pulled pork' ) ),
			array( 'pomegranates', array( 'pomegranates', 'pomegranate', 'fresh pomegranate', 'pomegranate seeds', 'pomegranate juice' ) ),
			array( 'pineapple', array( 'pineapple', 'fresh pineapple', 'pineapple chunks', 'pineapple slices', 'canned pineapple' ) ),
			array( 'pepperoni', array( 'pepperoni', 'Italian pepperoni', 'spicy pepperoni', 'mini pepperoni', 'sliced pepperoni' ) ),
			array( 'pepper', array( 'pepper', 'black pepper', 'bell pepper', 'green pepper', 'red pepper' ) ),
			array( 'peanuts', array( 'peanuts', 'peanut', 'roasted peanuts', 'salted peanuts', 'peanut butter' ) ),
			array( 'pasta', array( 'pasta', 'noodles', 'spaghetti', 'penne', 'fettuccine' ) ),
			array( 'paprika', array( 'paprika', 'smoked paprika', 'sweet paprika', 'Hungarian paprika', 'hot paprika' ) ),
			array( 'oregano', array( 'oregano', 'dried oregano', 'fresh oregano', 'Mediterranean oregano', 'Mexican oregano' ) ),
			array( 'onion', array( 'onion', 'onions', 'yellow onion', 'red onion', 'sweet onion' ) ),
			array( 'oil', array( 'oil', 'olive oil', 'cooking oil', 'vegetable oil', 'canola oil' ) ),
			array( 'nutmeg', array( 'nutmeg', 'ground nutmeg', 'whole nutmeg', 'fresh nutmeg', 'grated nutmeg' ) ),
			array( 'mustard', array( 'mustard', 'Dijon mustard', 'yellow mustard', 'whole grain mustard', 'spicy mustard' ) ),
			array( 'molasses', array( 'molasses', 'blackstrap molasses', 'sorghum molasses', 'light molasses', 'unsulphured molasses' ) ),
			array( 'mayonnaise', array( 'mayonnaise', 'mayo', 'light mayonnaise', 'olive oil mayo', 'vegan mayo' ) ),
			array( 'mangoes', array( 'mangoes', 'mango', 'ripe mango', 'frozen mango', 'diced mango' ) ),
			array( 'lamb', array( 'lamb', 'lamb chops', 'ground lamb', 'lamb shoulder', 'rack of lamb' ) ),
			array( 'kidney-beans', array( 'kidney beans', 'red kidney beans', 'canned kidney beans', 'dry kidney beans', 'rajma' ) ),
			array( 'ketchup', array( 'ketchup', 'tomato ketchup', 'catsup', 'organic ketchup', 'spicy ketchup' ) ),
			array( 'honey', array( 'honey', 'raw honey', 'organic honey', 'wildflower honey', 'manuka honey' ) ),
			array( 'green-peas', array( 'green peas', 'peas', 'frozen peas', 'sweet peas', 'split peas' ) ),
			array( 'green-beans', array( 'green beans', 'string beans', 'snap beans', 'haricot verts', 'French beans' ) ),
			array( 'grapes', array( 'grapes', 'red grapes', 'green grapes', 'seedless grapes', 'wine grapes' ) ),
			array( 'ghee', array( 'ghee', 'clarified butter', 'Indian ghee', 'homemade ghee', 'grass-fed ghee' ) ),
			array( 'garlic-powder', array( 'garlic powder', 'powdered garlic', 'granulated garlic', 'garlic seasoning', 'garlic salt' ) ),
			array( 'cumin', array( 'cumin', 'ground cumin', 'whole cumin seeds', 'toasted cumin', 'cumin powder' ) ),
			array( 'cucumber', array( 'cucumber', 'cucumbers', 'English cucumber', 'Persian cucumber', 'pickling cucumber' ) ),
			array( 'crab', array( 'crab', 'crab meat', 'blue crab', 'king crab', 'snow crab' ) ),
			array( 'cocoapowder', array( 'cocoa powder', 'unsweetened cocoa powder', 'Dutch-processed cocoa', 'raw cacao powder', 'chocolate powder' ) ),
			array( 'cinnamon', array( 'cinnamon', 'ground cinnamon', 'Ceylon cinnamon', 'cinnamon sticks', 'Vietnamese cinnamon' ) ),
			array( 'chocolate', array( 'chocolate', 'dark chocolate', 'milk chocolate', 'chocolate chips', 'chocolate bars' ) ),
			array( 'chickpeas', array( 'chickpeas', 'garbanzo beans', 'chana', 'canned chickpeas', 'dried chickpeas' ) ),
			array( 'chicken-breast', array( 'chicken breast', 'boneless chicken breast', 'skinless chicken breast', 'chicken fillet', 'grilled chicken breast' ) ),
			array( 'cauliflower', array( 'cauliflower', 'cauliflower florets', 'frozen cauliflower', 'purple cauliflower', 'roasted cauliflower' ) ),
			array( 'broccoli', array( 'broccoli', 'broccoli florets', 'frozen broccoli', 'broccolini', 'steamed broccoli' ) ),
			array( 'bread', array( 'bread', 'whole wheat bread', 'white bread', 'multigrain bread', 'sourdough bread' ) ),
			array( 'blueberry', array( 'blueberry', 'blueberries', 'wild blueberry', 'frozen blueberry', 'dried blueberry' ) ),
			array( 'beef', array( 'beef', 'ground beef', 'beef chuck', 'beef ribs', 'beef tenderloin' ) ),
			array( 'baking-soda', array( 'baking soda', 'sodium bicarbonate', 'bicarbonate of soda', 'baking powder', 'bread soda' ) ),
			array( 'baking-powder', array( 'baking powder', 'double-acting baking powder', 'aluminum-free baking powder', 'gluten-free baking powder', 'baking soda and cream of tartar' ) ),
			array( 'bacon', array( 'bacon', 'smoked bacon', 'Canadian bacon', 'pancetta', 'turkey bacon' ) ),
		);

		function create_image_array( $icons_path, $name, $keywords ) {
			return array(
				'image'    => array(
					'imageId'   => '',
					'imageAlt'  => $name,
					'imageLink' => $icons_path . str_replace( ' ', '-', $name ) . '.png',
				),
				'keywords' => $keywords,
			);
		}

		$default_image_array = array_map(
			function ( $item ) use ( $icons_path ) {
				return create_image_array( $icons_path, $item[0], $item[1] );
			},
			$items
		);

		$existing_ingredients_image = get_option( 'ingredients_image_option' );

		if ( ! get_option( 'ingredients_image_update_count' ) ) {
			update_option( 'ingredients_image_update_count', 0 );
		}
		if ( $existing_ingredients_image && get_option( 'ingredients_image_update_count' ) < 1 ) {
			update_option( 'ingredients_image_update_count', 1 );
			foreach ( $items as $item ) {
				$found = false;
				foreach ( $existing_ingredients_image as $index => $existing_item ) {
					if ( $item[0] === strtolower( $existing_item['image']['imageAlt'] ) ) {
						$found                                = true;
						$existing_ingredients_image[ $index ] = create_image_array( $icons_path, $item[0], $item[1] );
					}
				}
				if ( ! $found ) {
					$existing_ingredients_image[] = create_image_array( $icons_path, $item[0], $item[1] );
				}
			}
			update_option( 'ingredients_image_option', $existing_ingredients_image );
		}

		if ( ! $existing_ingredients_image ) {
			update_option( 'ingredients_image_option', $default_image_array );
			$existing_ingredients_image = $default_image_array;
		}
		wp_send_json_success( $existing_ingredients_image );
	}

	/**
	 * Grabs and posts data from ingredients image tab in global settings
	 *
	 * @param string $request WP_REST_Request Current request.
	 */
	public function post_ingredients_image( $request ) {
		$formdata      = $request->get_json_params();
		$decoded_array = json_decode( $formdata, true );
		update_option( 'ingredients_image_option', $decoded_array );
		wp_send_json_success( $decoded_array );
	}
}

/**
 * Register the Ingredients Image REST API routes.
 */
function delicious_recipes_register_ingredients_image_routes() {
	$controller = new Delicious_Recipes_Pro_REST_Ingredients_Image_Controller();
	$controller->register_routes();
}

add_action( 'rest_api_init', 'delicious_recipes_register_ingredients_image_routes' );
