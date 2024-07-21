<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cookery
 */

$sidebar = cookery_sidebar();
$home_layout    = get_theme_mod( 'home_layout', 'three' );
$home_sticky_array = array( 'five', 'six' );

if ( ! $sidebar || ( is_home() && in_array( $home_layout, $home_sticky_array ) ) ){
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
