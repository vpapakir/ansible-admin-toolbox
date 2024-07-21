<?php
/**
 * Typography Body Settings
 *
 * @package Cookery
 */

function cookery_customize_register_typography_body( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'body_settings',
        array(
            'title'    => __( 'Body Settings', 'cookery' ),
            'priority' => 10,
            'panel'    => 'typography_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Questrial',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'           => __( 'Primary Font', 'cookery' ),
                'description'     => __( 'Primary font of the site.', 'cookery' ),
                'section'         => 'body_settings',
                'choices'         => cookery_get_all_fonts(),
                'active_callback' => 'cookery_fonts_callback',	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Noto Serif',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'           => __( 'Secondary Font', 'cookery' ),
                'description'     => __( 'Secondary font of the site.', 'cookery' ),
                'section'         => 'body_settings',
                'choices'         => cookery_get_all_fonts(),	
                'active_callback' => 'cookery_fonts_callback',
     		)
		)
	);  

    /** Primary Font Cooke Recipe child */
    $wp_customize->add_setting(
        'primary_font_ch',
        array(
            'default'           => 'Bitter',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'primary_font_ch',
            array(
                'label'           => __( 'Primary Font', 'cookery' ),
                'description'     => __( 'Primary font of the site.', 'cookery' ),
                'section'         => 'body_settings',
                'choices'         => cookery_get_all_fonts(),
                'active_callback' => 'cookery_fonts_callback',     
            )
        )
    );
    
    /** Secondary Font Child */
    $wp_customize->add_setting(
        'secondary_font_ch',
        array(
            'default'           => 'Domine',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'secondary_font_ch',
            array(
                'label'           => __( 'Secondary Font', 'cookery' ),
                'description'     => __( 'Secondary font of the site.', 'cookery' ),
                'section'         => 'body_settings',
                'choices'         => cookery_get_all_fonts(), 
                'active_callback' => 'cookery_fonts_callback',   
            )
        )
    );  
    
    /** Primary Font Spicy Recipe child */
    $wp_customize->add_setting(
        'primary_font_sr',
        array(
            'default'           => 'DM Sans',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'primary_font_sr',
            array(
                'label'           => __( 'Primary Font', 'cookery' ),
                'description'     => __( 'Primary font of the site.', 'cookery' ),
                'section'         => 'body_settings',
                'choices'         => cookery_get_all_fonts(),
                'active_callback' => 'cookery_fonts_callback',     
            )
        )
    );
    
    /** Secondary Font Child */
    $wp_customize->add_setting(
        'secondary_font_sr',
        array(
            'default'           => 'Domine',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'secondary_font_sr',
            array(
                'label'           => __( 'Secondary Font', 'cookery' ),
                'description'     => __( 'Secondary font of the site.', 'cookery' ),
                'section'         => 'body_settings',
                'choices'         => cookery_get_all_fonts(), 
                'active_callback' => 'cookery_fonts_callback',   
            )
        )
    ); 

    /** Tertiary Font */
    $wp_customize->add_setting(
        'tertiary_font',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Cookery_Select_Control(
            $wp_customize,
            'tertiary_font',
            array(
                'label'       => __( 'Tertiary Font', 'cookery' ),
                'description' => __( 'Tertiary font of the site. Please keep it blank to get the cursive font of the theme.', 'cookery' ),
                'section'     => 'body_settings',
                'choices'     => cookery_get_all_fonts(),    
            )
        )
    );  

    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'body_settings',
				'label'		  => __( 'Font Size', 'cookery' ),
				'description' => __( 'Change the font size of your site.', 'cookery' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);

	/** Note */
    $wp_customize->add_setting(
        'typography_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
			$wp_customize,
			'typography_text',
			array(
				'section'	  => 'body_settings',
                'description' => sprintf( __( 'To load google fonts from your own server instead from google\'s CDN enable the %1$sLocally Host Google Fonts%2$s option in Performance Settings.', 'cookery' ), '<span class="text-inner-link typography_text">', '</span>' ),
			)
		)
    );
}
add_action( 'customize_register', 'cookery_customize_register_typography_body' );