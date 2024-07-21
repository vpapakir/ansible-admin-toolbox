<?php
/**
 * Active Callback
 * 
 * @package Cookery
*/

/**
 * Active Callback for Top Bar.
*/
function cookery_topbar( $control ){
    
    $ed_top_bar   = $control->manager->get_setting( 'ed_top_bar' )->value();
    $top_bar_type = $control->manager->get_setting( 'top_bar_type' )->value();
    $control_id   = $control->id;
    
    if ( $control_id == 'top_bar_type' && $ed_top_bar ) return true;
    if ( $control_id == 'notification_text' && $ed_top_bar && $top_bar_type == 'top_button_link' ) return true;
    if ( $control_id == 'notification_label' && $ed_top_bar && $top_bar_type == 'top_button_link' ) return true;
    if ( $control_id == 'notification_btn_url' && $ed_top_bar && $top_bar_type == 'top_button_link' ) return true;
    if ( $control_id == 'ed_open_new_target' && $ed_top_bar && $top_bar_type == 'top_button_link' ) return true;
    if ( $control_id == 'topbar_color' && $ed_top_bar && $top_bar_type == 'top_button_link' ) return true;
    if ( $control_id == 'topbar_font_color' && $ed_top_bar && $top_bar_type == 'top_button_link' ) return true;
    if ( $control_id == 'top_bar_newsletter' && $ed_top_bar && $top_bar_type == 'top_newsletter' ) return true;
    if ( $control_id == 'header_newsletter_note' && $ed_top_bar && $top_bar_type == 'top_newsletter' ) return true;

    return false;
}

/**
 * Active Callback for Banner Slider
*/
function cookery_banner_ac( $control ){
    $banner        = $control->manager->get_setting( 'ed_banner_section' )->value();
    $slider_type   = $control->manager->get_setting( 'slider_type' )->value();
    $slider_layout = $control->manager->get_setting( 'slider_layout' )->value();
    $static_cta_layout = $control->manager->get_setting( 'static_cta_layout' )->value();
    $static_newsletter_layout = $control->manager->get_setting( 'static_newsletter_layout' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'header_image' && ( $banner == 'static_banner' || $banner == 'static_nl_banner' || $banner == 'static_search_banner' ) ) return true;
    if ( $control_id == 'header_video' && ( $banner == 'static_banner' || $banner == 'static_nl_banner' || $banner == 'static_search_banner' ) ) return true;
    if ( $control_id == 'external_header_video' && ( $banner == 'static_banner' || $banner == 'static_nl_banner' || $banner == 'static_search_banner' ) ) return true;
    if ( $control_id == 'static_banner_bg' && ( $banner == 'static_banner' || ( $banner == 'static_nl_banner' && $static_newsletter_layout != 'two' ) ) ) return true;
    if ( $control_id == 'banner_title' && ( $banner == 'static_banner' || $banner == 'static_search_banner' ) ) return true;
    if ( $control_id == 'banner_subtitle' && ( $banner == 'static_banner' || $banner == 'static_search_banner' ) ) return true;
    if ( $control_id == 'button_one' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'button_one_url' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'button_one_tab_new' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'button_two' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'button_two_url' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'button_two_tab_new' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'cta_banner_alignment' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_newsletter' && $banner == 'static_nl_banner' ) return true;
    if ( $control_id == 'static_newsletter_banner_thumb' && $banner == 'static_nl_banner'  && $static_newsletter_layout == 'two' ) return true;
    
    if ( $control_id == 'slider_type' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'include_repetitive_posts' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'cat' ) ) return true;
    if ( $control_id == 'slider_show_date' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'cat' ) ) return true;
    if ( $control_id == 'slider_auto' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_loop' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_caption' && $banner == 'slider_banner' ) return true;          
    if ( $control_id == 'slider_readmore' && $banner == 'slider_banner' && ( $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four' ) ) return true;    
    if ( $control_id == 'slider_cat' && $banner == 'slider_banner' && $slider_type == 'cat' ) return true;
    if ( $control_id == 'slider_cat_course' && $banner == 'slider_banner' && $slider_type == 'cat_course' ) return true;
    if ( $control_id == 'slider_cat_cuisine' && $banner == 'slider_banner' && $slider_type == 'cat_cuisine' ) return true;
    if ( $control_id == 'slider_cat_cookmethod' && $banner == 'slider_banner' && $slider_type == 'cat_cookmethod' ) return true;
    if ( $control_id == 'slider_cat_recipekey' && $banner == 'slider_banner' && $slider_type == 'cat_recipekey' ) return true;
    if ( $control_id == 'no_of_slides' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'latest_recipes' ) ) return true;
    if ( $control_id == 'slider_pages' && $banner == 'slider_banner' && $slider_type == 'pages' ) return true;
    if ( $control_id == 'slider_custom' && $banner == 'slider_banner' && $slider_type == 'custom' ) return true;
    if ( $control_id == 'slider_full_image' && $banner == 'slider_banner' && $slider_layout == 'one' ) return true;
    if ( $control_id == 'slider_animation' && $banner == 'slider_banner' && ( $slider_layout == 'one' || $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four' || $slider_layout == 'seven' ) ) return true;
    if ( $control_id == 'slider_speed' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'banner_hr' && $banner == 'slider_banner' ) return true; 

    if ( $control_id == 'cta_static_banner_text' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'newsletter_static_banner_text' && $banner == 'static_nl_banner' ) return true;
    if ( $control_id == 'search_static_banner_text' && $banner == 'static_search_banner' ) return true;
    if ( $control_id == 'slider_banner_text' && $banner == 'slider_banner' ) return true;
    
    return false;
}

/**
 * Active Callback for Body Background
*/
function cookery_body_bg_choice( $control ){
    
    $body_bg    = $control->manager->get_setting( 'body_bg' )->value();
    $control_id = $control->id;
         
    if ( $control_id == 'background_image' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_preset' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_position' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_size' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_repeat' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_attachment' && $body_bg == 'image' ) return true;
    if ( $control_id == 'bg_pattern' && $body_bg == 'pattern' ) return true;
    
    return false;
}

/**
 * Active Callback for social link in contact page
*/
function cookery_contact_social_ac( $control ){
    
    $ed_social = $control->manager->get_setting( 'ed_contact_social' )->value();
    
    if ( $ed_social == true ) return true;
    
    return false;
}

/**
 * Active Callback for affilitate code
*/
function cookery_affiliate_shop_ac( $control ){
    
    $ed_affiliate = $control->manager->get_setting( 'woo_affiliate' )->value();
    $control_id   = $control->id;
    
    if ( $control_id == 'product_cat' && $ed_affiliate == 'woocommerce' ) return true;
    if ( $control_id == 'woocommerce_recommend_bottom' && $ed_affiliate == 'woocommerce' ) return true;
    if ( $control_id == 'affiliate_code' && $ed_affiliate == 'affiliate' ) return true;
    
    return false;
}

/**
 * Active Callback for post/page
*/
function cookery_post_page_ac( $control ){
    
    $ed_related    = $control->manager->get_setting( 'ed_related' )->value();
    $ed_comment    = $control->manager->get_setting( 'ed_comments' )->value();
    $single_layout = $control->manager->get_setting( 'single_post_layout' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'related_post_title' && $ed_related == true ) return true;
    if ( $control_id == 'related_taxonomy' && $ed_related == true ) return true;
    if ( $control_id == 'toggle_comments' && $ed_comment == true ) return true;
    if ( $control_id == 'ed_featured_image' && ( $single_layout == 'one' || $single_layout == 'two' ) ) return true;
    
    return false;
}

/**
 * Active Callback for pagination
*/
function cookery_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}

/**
 * Active Callback for Shop page description
*/
function cookery_shop_description_ac( $control ){
    $ed_shop_archive_desc = $control->manager->get_setting( 'ed_shop_archive_description' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'shop_archive_description' && $ed_shop_archive_desc == true && cookery_is_woocommerce_activated() ) return true;
    
    return false;
}

/**
 * Active Callback for Browse Category
*/
function cookery_browse_category_ac( $control ){
    $browse_category_enable = $control->manager->get_setting( 'browse_category_enable' )->value();
    $browse_category_type = $control->manager->get_setting( 'browse_category_type' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'browse_category_title' && $browse_category_enable ) return true;
    if ( $control_id == 'browse_category_subtitle' && $browse_category_enable ) return true;
    if ( $control_id == 'browse_category_type' && $browse_category_enable ) return true;
    if ( $control_id == 'show_counts' && $browse_category_enable ) return true;
    if ( $control_id == 'browse_cat_course' && $browse_category_enable && $browse_category_type == 'recipe-course' ) return true;
    if ( $control_id == 'browse_cat_cuisine' && $browse_category_enable && $browse_category_type == 'recipe-cuisine' ) return true;
    if ( $control_id == 'browse_cat_cookmethod' && $browse_category_enable && $browse_category_type == 'recipe-cooking-method' ) return true;
    
    return false;
}


/**
 * Active Callback for static Cta
*/
function cookery_static_cta_callback( $control ){
    $static_cta_layout = $control->manager->get_setting( 'static_cta_layout' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'static_cta_one_color' && $static_cta_layout == 'one' ) return true;
    
    return false;
}

/**
 * Active Callback for homepage featured recipe
*/
function cookery_featured_recipe_ac( $control ){
    $featured_recipe_enable = $control->manager->get_setting( 'featured_recipe_enable' )->value();
    
    if ( $featured_recipe_enable ) return true;
    
    return false;
}

/**
 * Active Callback for homepage recipe index
*/
function cookery_recipe_index_ac( $control ){
    $recipe_index_enable = $control->manager->get_setting( 'recipe_index_enable' )->value();
    
    if ( $recipe_index_enable ) return true;
    
    return false;
}

/**
 * Active Callback for video section
*/
function cookery_video_ac( $control ){
    
    $ed_video_section   = $control->manager->get_setting( 'ed_video_section' )->value();
    
    if ( $ed_video_section ) return true;
    
    return false;
}

/**
 * Active Callback for ads before content
*/
function cookery_before_content_ads( $control ){
    $ed_ad      = $control->manager->get_setting( 'ed_before_content_ad_control' )->value();
    $ed_code    = $control->manager->get_setting( 'ed_before_content_ad_code_control' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'ed_before_content_ad_code_control' && $ed_ad == true ) return true;
    if ( $control_id == 'before_content_ad_code_control' && ( $ed_ad && $ed_code ) ) return true;
    if ( $control_id == 'open_link_diff_tab_before_content_post' && ( $ed_ad && !$ed_code) ) return true;
    if ( $control_id == 'before_content_post_ad' && ( $ed_ad && !$ed_code) ) return true;
    if ( $control_id == 'before_content_post_ad_link' && ( $ed_ad && !$ed_code) ) return true;
    
    return false;
}


/**
 * Active Callback for ads after content
*/
function cookery_after_content_ads( $control ){
    
    $ed_ad      = $control->manager->get_setting( 'ed_after_content_ad_control' )->value();
    $ed_code    = $control->manager->get_setting( 'ed_after_content_ad_code_control' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'ed_after_content_ad_code_control' && $ed_ad == true ) return true;
    if ( $control_id == 'after_content_ad_code_control' && ( $ed_ad && $ed_code ) ) return true;
    if ( $control_id == 'open_link_diff_tab_after_content_post' && ( $ed_ad && !$ed_code) ) return true;
    if ( $control_id == 'after_content_post_ad' && ( $ed_ad && !$ed_code) ) return true;
    if ( $control_id == 'after_content_post_ad_link' && ( $ed_ad && !$ed_code) ) return true;
    
    return false;
}

/**
 * Active Callback for color callback
*/
function cookery_colors_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_color' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'secondary_color' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_color_ch' && $child_theme_support == 'cook_recipe' ) return true;
    if ( $control_id == 'secondary_color_ch' && $child_theme_support == 'cook_recipe' ) return true;
    if ( $control_id == 'primary_color_sr' && $child_theme_support == 'spicy_recipe' ) return true;
    if ( $control_id == 'secondary_color_sr' && $child_theme_support == 'spicy_recipe' ) return true;
        
    return false;
}

/**
 * Active Callback for font callback
*/
function cookery_fonts_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'secondary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_font_ch' && $child_theme_support == 'cook_recipe' ) return true;
    if ( $control_id == 'secondary_font_ch' && $child_theme_support == 'cook_recipe' ) return true;
    if ( $control_id == 'primary_font_sr' && $child_theme_support == 'spicy_recipe' ) return true;
    if ( $control_id == 'secondary_font_sr' && $child_theme_support == 'spicy_recipe' ) return true;
        
    return false;
}

/**
 * Active Callback for local fonts
*/
function cookery_ed_localgoogle_fonts(){
    $ed_localgoogle_fonts = get_theme_mod( 'ed_localgoogle_fonts' , false );

    if( $ed_localgoogle_fonts ) return true;
    
    return false; 
}

/**
 * Active Callback for instagram
*/
function cookery_instagram_ac( $control ){
    
    $ed_insta   = $control->manager->get_setting( 'ed_instagram' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'instagram_shortcode' && $ed_insta ) return true;
    
    return false;
}