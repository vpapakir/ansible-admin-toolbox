<?php
/**
 * Miscellaneous Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_misc( $wp_customize ) {
    
    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'cookery' ),
            'priority' => 95,
            'panel'    => 'general_settings',
        )
    );
    
    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_adminbar',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_adminbar',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Admin Bar', 'cookery' ),
				'description'	=> __( 'Disable to hide Admin Bar in frontend when logged in.', 'cookery' ),
			)
		)
	);

    /** Shop Section */
        $wp_customize->add_setting( 
            'ed_shopping_cart', 
            array(
                'default'           => true,
                'sanitize_callback' => 'cookery_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Cookery_Toggle_Control( 
                $wp_customize,
                'ed_shopping_cart',
                array(
                    'section'     => 'shop_settings',
                    'label'       => __( 'Shopping Cart', 'cookery' ),
                    'description' => __( 'Enable to show Shopping cart in the header.', 'cookery' ),
                    'active_callback' => 'cookery_is_woocommerce_activated'
                )
            )
        );
    
    /** Lightbox */
    $wp_customize->add_setting(
        'ed_lightbox',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_lightbox',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Lightbox', 'cookery' ),
				'description'	=> __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'cookery' ),
			)
		)
	);
    
    /** Header Search */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Header Search', 'cookery' ),
				'description'	=> __( 'Enable to display search form in header.', 'cookery' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_header',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_sticky_header',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Sticky Header', 'cookery' ),
				'description'	=> __( 'Enable to stick header at top.', 'cookery' ),
			)
		)
	);
    
    /** Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Last Widget Sticky', 'cookery' ),
				'description'	=> __( 'Enable to stick last widget in sidebar.', 'cookery' ),
			)
		)
	);
    
    /** Drop Cap */
    $wp_customize->add_setting(
        'ed_drop_cap',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_drop_cap',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Drop Cap', 'cookery' ),
				'description'	=> __( 'Enable to show first letter of word in post/page content in drop cap.', 'cookery' ),
			)
		)
	);
        
    /** Shop Page Description */
    $wp_customize->add_setting( 
        'ed_shop_archive_description', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_shop_archive_description',
            array(
                'section'         => 'shop_settings',
                'label'           => __( 'Shop Page Description', 'cookery' ),
                'description'     => __( 'Enable to show Shop Page Description.', 'cookery' ),
                'active_callback' => 'cookery_is_woocommerce_activated'
            )
        )
    );
    
    /** $shop_archive_description */
    $wp_customize->add_setting( 
        'shop_archive_description', 
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        ) 
    );
    
    $wp_customize->add_control(
        'shop_archive_description',
        array(
            'section'         => 'shop_settings',
            'label'           => __( 'Description For Shop Page', 'cookery' ),
            'description'     => __( 'Write new description for Shop Page to overwrite the default description.', 'cookery' ),
            'type'            => 'textarea',
            'active_callback' => 'cookery_shop_description_ac'
        )
    );

    $wp_customize->add_setting( 
        'ed_portfolio_crop', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_portfolio_crop',
            array(
                'section'     => 'misc_settings',
                'label'       => __( 'Portfolio Image Crop', 'cookery' ),
                'description' => __( 'Enable to avoid automatic cropping of featured image in portfolio template.', 'cookery' ),
            )
        )
    );
}
add_action( 'customize_register', 'cookery_customize_register_general_misc' );