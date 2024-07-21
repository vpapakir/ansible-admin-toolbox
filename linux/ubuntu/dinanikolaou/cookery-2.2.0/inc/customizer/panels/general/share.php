<?php
/**
 * Social Sharing Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_sharing( $wp_customize ) {
	
    /** Social Sharing */
    $wp_customize->add_section(
        'social_sharing',
        array(
            'title'    => __( 'Social Sharing', 'cookery' ),
            'priority' => 40,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_social_sharing',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_social_sharing',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Social Sharing Buttons', 'cookery' ),
                'description' => __( 'Enable or disable social sharing buttons on archive and single posts.', 'cookery' ),
			)
		)
	);
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_og_tags',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_og_tags',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Open Graph Meta Tags', 'cookery' ),
                'description' => __( 'Disable this option if you\'re using Jetpack, Yoast or other plugin to maintain Open Graph meta tags.', 'cookery' ),
			)
		)
	);
    
    /** Social Sharing Buttons */
    $wp_customize->add_setting(
		'social_share', 
		array(
			'default' => array( 'facebook', 'twitter', 'pinterest', 'linkedin' ),
			'sanitize_callback' => 'cookery_sanitize_sortable',						
		)
	);

	$wp_customize->add_control(
		new Cookery_Sortable_Control(
			$wp_customize,
			'social_share',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Social Sharing Buttons', 'cookery' ),
				'description' => __( 'Sort or toggle social sharing buttons.', 'cookery' ),
				'choices'     => array(
            		'facebook'  => __( 'Facebook', 'cookery' ),
            		'twitter'   => __( 'Twitter', 'cookery' ),
                    'pinterest' => __( 'Pinterest', 'cookery' ),
            		'linkedin'  => __( 'Linkedin', 'cookery' ),            		
            		'email'     => __( 'Email', 'cookery' ),
            		'reddit'    => __( 'Reddit', 'cookery' ),
                    'tumblr'    => __( 'Tumblr', 'cookery' ),
                    'digg'      => __( 'Digg', 'cookery' ),
                    'weibo'     => __( 'Weibo', 'cookery' ),
                    'xing'      => __( 'Xing', 'cookery' ),
                    'vk'        => __( 'VK', 'cookery' ),
					'pocket'    => __( 'GetPocket', 'cookery' ), 
					'whatsapp'  => __( 'Whatsapp', 'cookery' ),
            		'telegram'  => __( 'Telegram', 'cookery' ),           
            	),
			)
		)
	);
    
}
add_action( 'customize_register', 'cookery_customize_register_general_sharing' );