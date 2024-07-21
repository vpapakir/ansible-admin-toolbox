<?php
/**
 * Cookery Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Cookery
 */

function cookery_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'cookery' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'cookery' ),
        ),
        'newsletter' => array(
            'name'        => __( 'Newsletter Section', 'cookery' ),
            'id'          => 'newsletter', 
            'description' => __( 'Add "Blossom: BlossomThemes Email Newsletter" widget for newsletter section.', 'cookery' ),
        ),
        'promo' => array(
            'name'        => __( 'Promotional Section', 'cookery' ),
            'id'          => 'promo', 
            'description' => __( 'Add "Blossom: Image Text" widget for promotional section. The recommended image size for this section is 366px by 231px.', 'cookery' ),
        ),
        'about' => array(
            'name'        => __( 'About Section', 'cookery' ),
            'id'          => 'about', 
            'description' => __( 'Add "Blossom: Featured Page Widget" for about section. The recommended image size for this section is 952px by 708px.', 'cookery' ),
        ),
        'cta' => array(
            'name'        => __( 'Call To Action Section', 'cookery' ),
            'id'          => 'cta', 
            'description' => __( 'Add "Blossom: Call To Action" widget for call to action section.', 'cookery' ),
        ),
        'client' => array(
            'name'        => __( 'Client Section', 'cookery' ),
            'id'          => 'client', 
            'description' => __( 'Add "Blossom: Client Logo Widget" for client section. The recommended logo size is 330x190px. Please upload logo of atleast width 330px to avoid cropping.', 'cookery' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'cookery' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'cookery' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'cookery' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'cookery' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'cookery' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'cookery' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'cookery' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'cookery' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
            'name'          => esc_html( $sidebar['name'] ),
            'id'            => esc_attr( $sidebar['id'] ),
            'description'   => esc_html( $sidebar['description'] ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title" itemprop="name">',
            'after_title'   => '</h2>',
        ) );
    }
    
    /** Dynamic sidebars */
    $dynamic_sidebars = cookery_get_dynamnic_sidebar();
    
    foreach( $dynamic_sidebars as $k => $v ){
        if( ! empty( $v ) ){
            register_sidebar( array(
                'name'          => esc_attr( $v ),
                'id'            => esc_attr( $k ),
                'description'   => '',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'cookery_widgets_init' );