<?php
/**
 * Header Four
 *
 * @package Cookery
 */

$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<div class="mobile-header">
	<div class="container">
		<?php cookery_site_branding(); ?>
		<div class="mbl-header-right">
			<button class="toggle-btn">
				<span class="toggle-bar"></span>
				<span class="toggle-bar"></span>
				<span class="toggle-bar"></span>
			</button>
			<?php if( cookery_is_woocommerce_activated() && $ed_cart ) {
				echo '<div class="header-cart">';
				cookery_wc_cart_count();
				echo '</div>';
			} ?>
			<?php if( $ed_search ) { ?>
				<div class="header-search">
					<button class="search-toggle">
						<svg xmlns="http://www.w3.org/2000/svg" width="22.691" height="21.932" viewBox="0 0 22.691 21.932">
							<g id="Group_258" data-name="Group 258" transform="matrix(0.966, -0.259, 0.259, 0.966, -1515.787, 248.902)">
								<g id="Ellipse_9" data-name="Ellipse 9" transform="translate(1525.802 162.18) rotate(-30)" fill="none" stroke="#6a6a6a" stroke-width="2.5">
									<circle cx="7.531" cy="7.531" r="7.531" stroke="none"></circle>
									<circle cx="7.531" cy="7.531" r="6.281" fill="none"></circle>
								</g>
								<path id="Path_4339" data-name="Path 4339" d="M0,0V7" transform="translate(1540.052 170.724) rotate(-30)" fill="none" stroke="#6a6a6a" stroke-linecap="round" stroke-width="2.5"></path>
							</g>
						</svg>
					</button>
					<div class="header-search-wrap">
						<div class="header-search-inner">
						<?php get_search_form(); ?>
						<button class="close"></button>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="mobile-header-popup">
				<div class="mbl-header-inner">
					<div class="mbl-header-mid">
						<?php cookery_primary_navigation(); ?>
						<?php cookery_secondary_navigation(); ?>
					</div>
					<div class="mbl-header-bottom">
						<?php if( cookery_social_links( false ) ) {
							echo '<div class="header-social">';
							cookery_social_links();
							echo '</div>';
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<header id="masthead" class="site-header style-four" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-top">
		<div class="container">
			<div class="header-left">
				<?php cookery_secondary_navigation(); ?>
				<?php if( cookery_social_links( false ) ) {
					echo '<div class="header-social">';
					cookery_social_links();
					echo '</div>';
				} ?>
			</div>
			<div class="header-right">
				<?php if( $ed_search ) cookery_header_search(); ?>
			</div>
		</div>
	</div>
	<div class="header-main">
		<div class="container">
			<?php cookery_site_branding(); ?>
			<?php cookery_primary_navigation(); ?>
			<div class="header-right">
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