<?php
/**
 * Pagination Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_pagination( $wp_customize ) {
    
    /** Pagination Settings */
    $wp_customize->add_section(
        'pagination_settings',
        array(
            'title'    => __( 'Pagination Settings', 'cookery' ),
            'priority' => 65,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Pagination Type */
    $wp_customize->add_setting( 
        'pagination_type', 
        array(
            'default'           => 'numbered',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        'pagination_type',
        array(
            'type'    => 'radio',
            'section' => 'pagination_settings',
            'label'   => __( 'Pagination Type', 'cookery' ),
            'description' => __( 'Select pagination type.', 'cookery' ),
            'choices' => array(
				'default'         => __( 'Default (Next / Previous)', 'cookery' ),
                'numbered'        => __( 'Numbered (1 2 3 4...)', 'cookery' ),
                'load_more'       => __( 'AJAX (Load More Button)', 'cookery' ),
                'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'cookery' ),
			)
        )
    );
    
    /** Load More Label */
    $wp_customize->add_setting(
        'load_more_label',
        array(
            'default'           => __( 'Load More Posts', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'load_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Load More Label', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_loading_ac' 
		)		
	);
    
    /** Loading Label */
    $wp_customize->add_setting(
        'loading_label',
        array(
            'default'           => __( 'Loading...', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'loading_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Loading Label', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_loading_ac' 
		)		
	);
    
    /** No more Label */
    $wp_customize->add_setting(
        'no_more_label',
        array(
            'default'           => __( 'No More Post', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'no_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'No More Label', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_loading_ac' 
		)		
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_layout_pagination' );