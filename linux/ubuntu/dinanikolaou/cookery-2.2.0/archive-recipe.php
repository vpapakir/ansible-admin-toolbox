<?php
/**
 * The Template for displaying recipe archives.
 *
 * This template can be overridden by copying it to yourtheme/delicious-recipe/archive-recipe.php.
 *
 * HOWEVER, on occasion WP Delicious will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://wpdelicious.com/docs/template-structure/
 * @package     Delicious_Recipes/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<?php
		/**
		 * delicious_recipes_before_main_content hook.
		 * 
		 */
		do_action( 'delicious_recipes_before_main_content' );
	?>

    <?php
        /**
         * Hook - Recipe Archive page header.
         * 
         * @hooked - Delicious_Recipes_Template_Hooks()->recipe_archive_header() - 10
         */
        do_action( 'delicious_recipes_archive_header' );
    ?>

	<?php
        /**
		 * Hook: delicious_recipes_before_archive_recipe.
		 *
		 *  @hooked - Delicious_Recipes_Template_Hooks()->recipe_archive_wrap_start() - 10
		 */
		do_action( 'delicious_recipes_before_archive_recipe' );
    ?>

		<?php 
			$position = 1;
			$view_type = delicious_recipes_get_archive_layout();
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: delicious_recipe_archive_loop.
				 */
				do_action( 'delicious_recipe_archive_loop' );

				$data = array(
					'position'  => $position
				);

				delicious_recipes_get_template( 'recipes-' . $view_type . '.php', $data );

				$position++;

			} // end of the loop. 
		?>

	<?php
        /**
		 * Hook - After archive recipe block
		 * 
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_archive_pagination() - 10
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_archive_wrap_end() - 20
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_all_categories() - 30
     	 * @hooked - Delicious_Recipes_Template_Hooks()->recipes_by_ingredients() - 40
		 */
		do_action( 'delicious_recipes_after_archive_recipe' ); 
    ?>

	<?php
		/**
		 * delicious_recipes_after_main_content hook.
		 *
		 * @hooked 
		 */
		do_action( 'delicious_recipes_after_main_content' );
	?>

	<?php
		/**
		 * delicious_recipes_sidebar hook.
		 *
		 * @hooked delicious_recipes_get_sidebar - 10
		 */
		do_action( 'delicious_recipes_sidebar' );
	?>

<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
