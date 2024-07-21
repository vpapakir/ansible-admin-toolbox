<?php
/**
 * The template for displaying recipe content in the single-recipe.php template
 *
 * This template can be overridden by copying it to yourtheme/delicious-recipes/content-single-recipe.php.
 *
 * HOWEVER, on occasion WP Delicious will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://wpdelicious.com/docs/template-structure/
 * @package Delicious_Recipes/Templates
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

global $recipe;
$single_recipe_layout = get_theme_mod( 'single_recipe_layout', 'one' );

/**
 * Hook: delicious_recipes_before_single_recipe.
 *
 * @hooked delicious_recipes_output_all_notices - 10
 */
do_action( 'delicious_recipes_before_single_recipe' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="recipe-<?php the_ID(); ?>" <?php post_class( array( 'single-recipe', 'dr-single-recipe' ), $recipe ); ?> data-id="<?php the_ID(); ?>">
	<?php
	if( $single_recipe_layout == 'five' ) cookery_recipe_single_header( false );
	if( $single_recipe_layout == 'one' ) {
		/**
		 * Hook - Recipe Single page header.
		 * 
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_get_single_header() - 10
		 */
		do_action( 'delicious_recipes_single_header' );
	
		/**
		 * Hook - Recipe single page before content.
		 * 
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_get_gallery() - 10
		 */
		do_action( 'delicious_recipes_single_before_content_start' );

	} ?>

	<div class="dr-entry-content">
		<?php 
			// recipe content.
			the_content();
		?>

		<?php
			/**
			 * Hook - Recipe single page before content.
			 * 
			 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_main_card() - 10
			 */
			do_action( 'delicious_recipes_single_after_the_content' );
		?>

	</div>

	<?php
		/**
		 * Hook - Recipe single page before content.
		 * 
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_powered_by() - 10
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_share() - 20
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_author_sign() - 30
		 * @hooked - Delicious_Recipes_Template_Hooks()->recipe_tags() - 40
		 */
		do_action( 'delicious_recipes_single_after_content_end' );
	?>
</div><!-- #recipe- -->

<?php 
	/**
	 * Hook - After single recipe block
	 */
	do_action( 'delicious_recipes_after_single_recipe' ); 
?>

<?php 
	/**
	 * Recipe schema hook
	 */
	do_action( 'wp_delicious_guided_recipe_schema' );
