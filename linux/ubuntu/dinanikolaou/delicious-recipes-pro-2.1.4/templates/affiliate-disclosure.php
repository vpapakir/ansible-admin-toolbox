<?php
/**
 * The template for displaying affiliate disclosure content.
 *
 * This template can be overridden by copying it to yourtheme/delicious-recipes-pro/affiliate-disclosure.php.
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

?>
    <div class="dr-affiliate-disclosure">
        <?php echo wp_kses_post( $disclosure_content ); ?>
    </div>
<?php
