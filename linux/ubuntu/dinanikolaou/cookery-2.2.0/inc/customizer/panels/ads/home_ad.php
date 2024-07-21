<?php
/**
 * Home AD Options
 *
 * @package Cookery
 */

function cookery_customize_register_ad_home( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_home_settings', array(
        'title'    => __( 'Home(Blog) AD Settings', 'cookery' ),
        'priority' => 15,
        'panel'    => 'ad_settings',
    ) );
    
    /** Enable Home AD */
    $wp_customize->add_setting(
        'ed_home_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_home_ad',
			array(
				'section'     => 'ad_home_settings',
				'label'       => __( 'Enable Home AD', 'cookery' ),
                'description' => __( 'Enable Home AD for blog home page.', 'cookery' ),
			)
		)
	);
    
    /** Enable Home AD Code */
    $wp_customize->add_setting(
        'ed_home_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_home_ad_code',
			array(
				'section' => 'ad_home_settings',
				'label'   => __( 'Enable Home AD Code', 'cookery' ),
			)
		)
	);
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_home',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_home',
			array(
				'section'         => 'ad_home_settings',
				'label'           => __( 'Open Link in Different Tab', 'cookery' ),
                'active_callback' => 'cookery_home_ad_ac'
			)
		)
	);
    
    /** Start displaying the home AD after nth post. */
    $wp_customize->add_setting( 
        'after_n_post', 
        array(
            'default'           => 2,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'after_n_post',
			array(
				'section' => 'ad_home_settings',
				'label'	  => __( 'Display the home AD after every n post.', 'cookery' ),
				'choices' => array(
					'min' 	=> 2,
					'max' 	=> 8,
					'step'	=> 2,
				)                 
			)
		)
	);
    
    /** Repeat the ad for n times. */
    $wp_customize->add_setting( 
        'repeat_n_times', 
        array(
            'default'           => 3,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'repeat_n_times',
			array(
				'section' => 'ad_home_settings',
				'label'	  => __( 'Repeat the home AD for n times.', 'cookery' ),
				'choices' => array(
					'min'  => 1,
					'max'  => 3,
					'step' => 1,
				),
                'active_callback' => 'cookery_home_ad_ac'                 
			)
		)
	);
    
    /** HR */
    $wp_customize->add_setting(
        'home_ad_hr',
        array(
            'default'   => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    
    $wp_customize->add_control( 
        new Cookery_Note_Control(
            $wp_customize, 
            'home_ad_hr',
    		array(
    			'section'	  => 'ad_home_settings',    			
                'description' => '<hr/>',
            )
        )		
    );
    /** HR */
    
    /** Home AD Code */
    $wp_customize->add_setting(
        'home_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_code'
        )
    );
        
    $wp_customize->add_control( 
        new WP_Customize_Code_Editor_Control(
            $wp_customize, 
            'home_ad_code',
    		array(
    			'section'	  => 'ad_home_settings',
    			'label'		  => __( 'Home AD Code', 'cookery' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads in the Home Page.', 'cookery' ),
    			'code_type'   => 'javascript',
                'active_callback' => 'cookery_home_ad_ac'     		
            )
        )		
    );
    
    /** Upload Home AD One */
    $wp_customize->add_setting(
        'home_ad_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_one',
           array(
               'label'           => __( 'Upload Home AD One', 'cookery' ),
               'section'         => 'ad_home_settings',
               'width'           => 810,
               'height'          => 190,
               'active_callback' => 'cookery_home_ad_ac'
           )
       )
    );
       
    /** Home AD One Link */
    $wp_customize->add_setting(
        'home_ad_one_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'home_ad_one_link',
		array(
			'section'         => 'ad_home_settings',
			'label'	          => __( 'Home AD One Link', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_home_ad_ac'
		)		
	);
    
    /** Upload Home AD Two */
    $wp_customize->add_setting(
        'home_ad_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_two',
           array(
               'label'           => __( 'Upload Home AD Two', 'cookery' ),
               'section'         => 'ad_home_settings',
               'width'           => 810,
               'height'          => 190,
               'active_callback' => 'cookery_home_ad_ac'
           )
       )
    );
       
    /** Home AD Two Link */
    $wp_customize->add_setting(
        'home_ad_two_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'home_ad_two_link',
		array(
			'section'         => 'ad_home_settings',
			'label'	          => __( 'Home AD Two Link', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_home_ad_ac'
		)		
	);
    
    /** Upload Home AD Three */
    $wp_customize->add_setting(
        'home_ad_three',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_three',
           array(
               'label'           => __( 'Upload Home AD Three', 'cookery' ),
               'section'         => 'ad_home_settings',
               'width'           => 810,
               'height'          => 190,
               'active_callback' => 'cookery_home_ad_ac'
           )
       )
    );
       
    /** Home AD Three Link */
    $wp_customize->add_setting(
        'home_ad_three_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'home_ad_three_link',
		array(
			'section'         => 'ad_home_settings',
			'label'	          => __( 'Home AD Three Link', 'cookery' ),
			'type'            => 'text',
            'active_callback' => 'cookery_home_ad_ac'
		)		
	);

    /** Upload Home AD Three */
    $wp_customize->add_setting(
        'home_ad_four',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_four',
           array(
               'label'           => __( 'Upload Home AD Four', 'cookery' ),
               'section'         => 'ad_home_settings',
               'width'           => 810,
               'height'          => 190,
               'active_callback' => 'cookery_home_ad_ac'
           )
       )
    );
    
    /** Home AD Three Link */
    $wp_customize->add_setting(
        'home_ad_four_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
       'home_ad_four_link',
        array(
            'section'         => 'ad_home_settings',
            'label'           => __( 'Home AD Four Link', 'cookery' ),
            'type'            => 'text',
            'active_callback' => 'cookery_home_ad_ac'
        )       
    );
        
}
add_action( 'customize_register', 'cookery_customize_register_ad_home' );    

/**
 * Active Callback
*/
function cookery_home_ad_ac( $control ){
    
    $ed_code    = $control->manager->get_setting( 'ed_home_ad_code' )->value();    
    $control_id = $control->id;
    
    if ( $control_id == 'home_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'repeat_n_times' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_home' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_one' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_one_link' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_two' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_two_link' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_three' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_three_link' && $ed_code == false ) return true;   
    if ( $control_id == 'home_ad_four' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_four_link' && $ed_code == false ) return true;    
    
    return false;
}