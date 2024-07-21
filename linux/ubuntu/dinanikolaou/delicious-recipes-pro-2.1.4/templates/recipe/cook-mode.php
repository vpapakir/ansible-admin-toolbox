<?php
/**
 * Recipe Cook Mode template.
 *
 * @since 1.2.1
 * @package Delicious_Recipes_Pro
 */

/**
 * Cookmode.
 *
 * @return void
 */
function cookmode() {
	?>
	<div class="wpdelicious-cook-mode-wrapper mt-0 mb-0 ml-auto">
		<input type="checkbox" name="cook-mode" id="cook-mode">
		<label for="cook-mode">
			<?php echo esc_html__( 'Cook Mode', 'delicious-recipes-pro' ); ?>
			<span class="switch"></span>
		</label>
		<span class="cook-mode-notification">
			<?php echo esc_html__( 'Cooking Mode', 'delicious-recipes-pro' ); ?>
			<strong><?php echo esc_html__( 'Disabled', 'delicious-recipes-pro' ); ?></strong>
		</span>
	</div>
	<?php
}
