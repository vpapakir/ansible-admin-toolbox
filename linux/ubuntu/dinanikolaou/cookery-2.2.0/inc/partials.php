<?php
/**
 * Cookery Customizer Partials
 *
 * @package Cookery
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cookery_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cookery_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'cookery_get_slider_readmore' ) ) :
/**
 * Slider Read More
*/
function cookery_get_slider_readmore(){
    return esc_html( get_theme_mod( 'slider_readmore', __( 'Continue Reading', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_banner_title' ) ) :
/**
 * Banner Title
*/
function cookery_get_banner_title(){
    return esc_html( get_theme_mod( 'banner_title', __( 'Hey there, Welcome. I’m Rebbeca Alvarado', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_banner_sub_title' ) ) :
/**
 * Banner Subtitle
*/
function cookery_get_banner_sub_title(){
    return wp_kses_post( wpautop( get_theme_mod( 'banner_subtitle', __( 'A certified Holistic Nutritionist, yoga-lover, girl\'s mom, and founder of Blossom Cookery. It’s nice to meet you.. It’s the perfect base for your favorite salad toppings.', 'cookery' ) ) ) );
}
endif;

if( ! function_exists( 'cookery_get_banner_button_one' ) ) :
/**
 * Banner One
*/
function cookery_get_banner_button_one(){
    return esc_html( get_theme_mod( 'button_one', __( 'Get started', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_banner_button_two' ) ) :
/**
 * Banner Two
*/
function cookery_get_banner_button_two(){
    return esc_html( get_theme_mod( 'button_two', __( 'Know More', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_video_title' ) ) :
/**
 * Video Title
*/
function cookery_get_video_title(){
    return esc_html( get_theme_mod( 'video_title', __( 'Watch This', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_video_subtitle' ) ) :
/**
 * Video Subtitle
*/
function cookery_get_video_subtitle(){
    return esc_html( get_theme_mod( 'video_subtitle' ) );
}
endif;

if( ! function_exists( 'cookery_get_video_content' ) ) :
/**
 * Video Content
*/
function cookery_get_video_content(){
    return wp_kses_post( wpautop( get_theme_mod( 'video_content' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_video_readmore' ) ) :
/**
 * Video Readmore
*/
function cookery_get_video_readmore(){
    return esc_html( get_theme_mod( 'video_readmore' ) );
}
endif;

if( ! function_exists( 'cookery_get_video_subscribe_text' ) ) :
/**
 * Video Subscribe Text
*/
function cookery_get_video_subscribe_text(){
    return esc_html( get_theme_mod( 'video_subscribe_text' ) );
}
endif;

if( ! function_exists( 'cookery_get_feature_recipe_title' ) ) :
/**
 * Featured Recipe Title
*/
function cookery_get_feature_recipe_title(){
    return esc_html( get_theme_mod( 'feature_recipe_title', __( 'Featured Recipes', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_feature_recipe_subtitle' ) ) :
/**
 * Featured Recipe Content
*/
function cookery_get_feature_recipe_subtitle(){
    return wp_kses_post( wpautop( get_theme_mod( 'feature_recipe_subtitle' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_browse_category_title' ) ) :
/**
 * Browse Recipes Title
*/
function cookery_get_browse_category_title(){
    return esc_html( get_theme_mod( 'browse_category_title', __( 'Browse Recipes By Category', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_browse_category_subtitle' ) ) :
/**
 * Browse Recipes Content
*/
function cookery_get_browse_category_subtitle(){
    return wp_kses_post( wpautop( get_theme_mod( 'browse_category_subtitle' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_recipe_index_title' ) ) :
/**
 * Recipe Index Title
*/
function cookery_get_recipe_index_title(){
    return esc_html( get_theme_mod( 'recipe_index_title', __( 'Recipe Index', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_recipe_index_content' ) ) :
/**
 * Recipe Index Content
*/
function cookery_get_recipe_index_content(){
    return wp_kses_post( wpautop( get_theme_mod( 'recipe_index_content' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_feature_recipe_title' ) ) :
/**
 * Featured Recipe Title
*/
function cookery_get_feature_recipe_title(){
    return esc_html( get_theme_mod( 'feature_recipe_title', __( 'Featured Recipes', 'cookery' ) ) );
}
endif;

if( ! function_exists( 'cookery_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function cookery_get_read_more(){
    return get_theme_mod( 'read_more_text', __( 'Read More', 'cookery' ) );    
}
endif;

if( ! function_exists( 'cookery_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function cookery_get_related_title(){
    return get_theme_mod( 'related_post_title', __( 'You may also like...', 'cookery' ) );
}
endif;

if( ! function_exists( 'cookery_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function cookery_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( cookery_apply_theme_shortcode( $copyright ) );
    }else{
        esc_html_e( '&copy; Copyright ', 'cookery' );
        echo date_i18n( esc_html__( 'Y', 'cookery' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'cookery' );
    }
    echo '</span>'; 
}
endif;

if( ! function_exists( 'cookery_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function cookery_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link', false );
    if( ! $ed_author_link ){
        esc_html_e( ' Cookery | Developed By ', 'cookery' );
        echo '<span class="author-link"><a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Blossom Themes', 'cookery' ) . '</a></span>.';
    }
}
endif;

if( ! function_exists( 'cookery_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function cookery_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link', false );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s Powered by %2$s%3$s. ', 'cookery' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'cookery' ) ) .'" target="_blank">WordPress</a>', '</span>' );
}
endif;