<?php
/**
 * Header One
 * 
 * @package Cookery
 */
 
$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<?php cookery_mobile_header(); ?>
	
<header id="masthead" class="site-header style-one" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-top">
		<div class="container">
			<?php cookery_secondary_navigation(); ?>
			<?php if( cookery_social_links( false ) ) {
				echo '<div class="header-social">';
				cookery_social_links();
				echo '</div>';
			} ?>
		</div>
	</div>
	<div class="header-main">
		<div class="container">
			<?php cookery_site_branding(); ?>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<?php cookery_primary_navigation(); ?>
			<div class="header-right">
				<?php if( cookery_is_woocommerce_activated() && $ed_cart ) {
					echo '<div class="header-cart">';
					cookery_wc_cart_count();
					echo '</div>';
				} ?>
				<?php if( $ed_search ) cookery_header_search(); ?>
			</div>
		</div>
	</div>
	<?php cookery_sticky_header(); ?>
</header>