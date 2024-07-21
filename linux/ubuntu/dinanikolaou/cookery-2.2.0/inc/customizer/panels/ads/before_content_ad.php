<?php
/**
 * Before Content AD Options
 *
 * @package Vilva_Pro
 */

function cookery_customize_register_ad_before_content( $wp_customize ) {    
    
    $wp_customize->add_section( 'before_content_ad_section', array(
        'title'       => __( 'Before Content AD Settings', 'cookery' ),
        'priority'    => 15,
        'panel'       => 'ad_settings'
    ) );
    
    /** Enable AD Below Post Title */
    $wp_customize->add_setting(
        'ed_before_content_ad_control',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_before_content_ad_control',
			array(
				'section'     => 'before_content_ad_section',
				'label'       => __( 'Enable AD Before Content', 'cookery' ),
                'description' => __( 'Enable AD Before Content in single post.', 'cookery' ),
			)
		)
	);
    /** Enable Before Content AD Code */
    $wp_customize->add_setting(
        'ed_before_content_ad_code_control',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_before_content_ad_code_control',
			array(
                'section'         => 'before_content_ad_section',
                'label'           => __( 'Enable Before Content AD Code', 'cookery' ),
                'active_callback' => 'cookery_before_content_ads'
			)
		)
	);
    
    /** Before Content AD Code */
    $wp_customize->add_setting(
        'before_content_ad_code_control',
        array(
            'default' => '',
        )
    );
        
    $wp_customize->add_control( 
        new WP_Customize_Code_Editor_Control(
            $wp_customize, 
            'before_content_ad_code_control',
    		array(
    			'section'	  => 'before_content_ad_section',
    			'label'		  => __( 'Before Content AD Code', 'cookery' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads before content in single post page.', 'cookery' ),
    			'code_type'   => 'javascript',
                'active_callback' => 'cookery_before_content_ads'     		
            )
        )		
    );
        
    /** Upload Before Content AD */
    $wp_customize->add_setting(
        'before_content_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'before_content_post_ad',
           array(
               'label'           => __( 'Upload Before Content AD', 'cookery' ),
               'section'         => 'before_content_ad_section',
               'width'           => 728,
               'height'          => 90,
               'active_callback' => 'cookery_before_content_ads'
           )
       )
    );
       
    /** Before Cotnent AD Link */
    $wp_customize->add_setting(
        'before_content_post_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'before_content_post_ad_link',
		array(
			'section'         => 'before_content_ad_section',
			'label'	          => __( 'Before Content AD Link', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_before_content_ads'
		)		
	);

    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_before_content_post',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'open_link_diff_tab_before_content_post',
            array(
                'section'         => 'before_content_ad_section',
                'label'           => __( 'Open Link in Different Tab', 'cookery' ),
                'active_callback' => 'cookery_before_content_ads'
            )
        )
    );
}
add_action( 'customize_register', 'cookery_customize_register_ad_before_content' );    