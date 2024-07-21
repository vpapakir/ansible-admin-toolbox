<?php
/**
 * Cookery Custom Control
 * 
 * @package Cookery
*/

if( ! function_exists( 'cookery_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function cookery_register_custom_controls( $wp_customize ){    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/multicheck/class-multicheck-control.php';
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-radio-buttonset-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_template_directory() . '/inc/custom-controls/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/custom-controls/sortable/class-sortable-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';    
    require_once get_template_directory() . '/inc/custom-controls/typography/class-fonts.php';
    require_once get_template_directory() . '/inc/custom-controls/typography/class-typography-control.php';
    require_once get_template_directory() . '/inc/custom-controls/reset/class-customizer-reset-control.php';
            
    // Register the control type.
    $wp_customize->register_control_type( 'Cookery_MultiCheck_Control' );
    $wp_customize->register_control_type( 'Cookery_Radio_Buttonset_Control' );
    $wp_customize->register_control_type( 'Cookery_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Cookery_Select_Control' );
    $wp_customize->register_control_type( 'Cookery_Slider_Control' );
    $wp_customize->register_control_type( 'Cookery_Sortable_Control' );
    $wp_customize->register_control_type( 'Cookery_Toggle_Control' );
    $wp_customize->register_control_type( 'Cookery_Typography_Control' );
}
endif;
add_action( 'customize_register', 'cookery_register_custom_controls' );

/**
 * Reset Theme Options
*/                                                                                    
require get_template_directory() . '/inc/custom-controls/reset/customizer-reset.php';