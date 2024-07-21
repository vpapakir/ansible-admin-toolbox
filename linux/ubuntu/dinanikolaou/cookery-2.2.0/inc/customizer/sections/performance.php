<?php
/**
 * Performance Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_performance( $wp_customize ) {
    
    /** Performance Settings */
    $wp_customize->add_section(
        'performance_settings',
        array(
            'title'      => __( 'Performance Settings', 'cookery' ),
            'priority'   => 80,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Lazy Load */
    $wp_customize->add_setting(
        'ed_lazy_load',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load', 'cookery' ),
				'description'	=> __( 'Enable lazy loading of featured images.', 'cookery' ),
			)
		)
	);
    
    /** Lazy Load Content Images */
    $wp_customize->add_setting(
        'ed_lazy_load_cimage',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load_cimage',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load Content Images', 'cookery' ),
				'description'	=> __( 'Enable lazy loading of images inside page/post content.', 'cookery' ),
			)
		)
	);
    
    /** Lazy Load Gravatar */
    $wp_customize->add_setting(
        'ed_lazyload_gravatar',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_lazyload_gravatar',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load Gravatar', 'cookery' ),
				'description'	=> __( 'Enable lazy loading of gravatar image.', 'cookery' ),
			)
		)
	);
    
    /** Defer JavaScript */
    $wp_customize->add_setting(
        'ed_defer',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_defer',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Defer JavaScript', 'cookery' ),
				'description'	=> __( 'Adds "defer" attribute to sript tags to improve page download speed.', 'cookery' ),
			)
		)
	);
    
    /** Remove ver parameters */
    $wp_customize->add_setting(
        'ed_ver',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_ver',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Remove ver parameters', 'cookery' ),
				'description'	=> __( 'Enable to remove "ver" parameter from CSS and JS file calls.', 'cookery' ),
			)
		)
	);
    
    /** Locally Host Google Fonts */
    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'performance_settings',
                'label'         => __( 'Load Google Fonts Locally', 'cookery' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'cookery' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'performance_settings',
                'label'         => __( 'Preload Local Fonts', 'cookery' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'cookery' ),
                'active_callback' => 'cookery_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'cookery' ); ?></span>
        
        <input type="button" class="button button-primary cookery-flush-local-fonts-button" name="cookery-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'cookery' ); ?>" />
    <?php
    $cookery_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'cookery' ),
            'section'       => 'performance_settings',
            'description'   => $cookery_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'cookery_ed_localgoogle_fonts'
        )
    );
    
}
add_action( 'customize_register', 'cookery_customize_register_general_performance' );