<?php
/**
 * Header Five
 *
 * @package Cookery
 */

$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<?php cookery_mobile_header(); ?>

<header id="masthead" class="site-header style-five" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-main">
		<div class="container">
			<div class="header-left">
                <button class="toggle-btn">
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
				</button>
				<div class="header-bottom">
					<div class="header-bottom-inner">
						<div class="container">
							<button class="close"></button>
							<div class="header-left">
								<?php cookery_primary_navigation(); ?>
								<?php if( cookery_social_links( false ) ) {
									echo '<div class="header-social">';
									cookery_social_links();
									echo '</div>';
								} ?>
							</div>
							<div class="header-right">
								<?php cookery_secondary_navigation(); ?>
							</div>
						</div>
					</div>
				</div>
            </div>
			<?php cookery_site_branding(); ?>
			<div class="header-right">
				<?php if( $ed_search ) cookery_header_search(); ?>
				<?php if( cookery_is_woocommerce_activated() && $ed_cart ) {
					echo '<div class="header-cart">';
					cookery_wc_cart_count();
					echo '</div>';
				} ?>
			</div>
		</div>
	</div>
	<?php cookery_sticky_header(); ?>
</header>