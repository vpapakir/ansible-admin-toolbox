<?php
/**
 * Blossomthemes Email Newsletter Functions.
 *
 * @package Cookery
 */

if( ! function_exists( 'cookery_add_inner_div' ) ) :
    function cookery_add_inner_div(){
        return true;
    }
endif;
add_filter( 'bt_newsletter_widget_inner_wrap_display', 'cookery_add_inner_div' );

if( ! function_exists( 'cookery_start_inner_div' ) ) :
    function cookery_start_inner_div(){
        echo '<div class="container">';
    }
endif;
add_action( 'bt_newsletter_widget_inner_wrap_start', 'cookery_start_inner_div' );

if( ! function_exists( 'cookery_end_inner_div' ) ) :
    function cookery_end_inner_div(){
        echo '</div>';
    }
endif;
add_action( 'bt_newsletter_widget_inner_wrap_close', 'cookery_end_inner_div' );

if( ! function_exists( 'cookery_shortcode_add_inner_div' ) ) :
    function cookery_shortcode_add_inner_div(){
        return true;
    }
endif;
add_filter( 'bt_newsletter_shortcode_inner_wrap_display', 'cookery_shortcode_add_inner_div' );

if( ! function_exists( 'cookery_shortcode_start_inner_div' ) ) :
    function cookery_shortcode_start_inner_div(){
        echo '<div class="container">';
    }
endif;
add_action( 'bt_newsletter_shortcode_inner_wrap_start', 'cookery_shortcode_start_inner_div' );

if( ! function_exists( 'cookery_shortcode_end_inner_div' ) ) :
    function cookery_shortcode_end_inner_div(){
        echo '</div>';
    }
endif;
add_action( 'bt_newsletter_shortcode_inner_wrap_close', 'cookery_shortcode_end_inner_div' );