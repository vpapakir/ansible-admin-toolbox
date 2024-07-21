<?php
/**
 * Static CTA Layout Settings
 *
 * @package Cookery
 */

function cookery_customize_register_layout_static_cta( $wp_customize ) {
    
    /** Static CTA Layout Settings */
    $wp_customize->add_section(
        'static_cta_layout_settings',
        array(
            'title'    => __( 'Static Banner CTA Layout', 'cookery' ),
            'priority' => 30,
            'panel'    => 'layout_settings',
        )
    );
    
    $wp_customize->add_setting( 
        'static_cta_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Image_Control(
			$wp_customize,
			'static_cta_layout',
			array(
				'section'	  => 'static_cta_layout_settings',
				'label'		  => __( 'CTA Banner Layout', 'cookery' ),
				'description' => __( 'Choose the layout of the static cta banner for your site.', 'cookery' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/static_banner/cta1.jpg',
					'two'   => get_template_directory_uri() . '/images/static_banner/cta2.jpg',
                    'three' => get_template_directory_uri() . '/images/static_banner/cta3.jpg',
				)
			)
		)
	);

    $wp_customize->add_setting( 
        'static_cta_one_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'static_cta_one_color', 
            array(
                'label'       => __( 'Text Color', 'cookery' ),
                'description' => __( 'Change color of the title and description for this layout.', 'cookery' ),
                'section'     => 'static_cta_layout_settings',
                'active_callback' => 'cookery_static_cta_callback',
            )
        )
    );
    
    $wp_customize->add_setting(
        'static_banner_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'static_banner_layout_text',
            array(
                'section'     => 'static_cta_layout_settings',
                'description' => sprintf( __( '%1$sClick here%2$s to configure static cta banner settings.', 'cookery' ), '<span class="text-inner-link static_banner_layout_text">', '</span>' ),
            )
        )
    );
}
add_action( 'customize_register', 'cookery_customize_register_layout_static_cta' );