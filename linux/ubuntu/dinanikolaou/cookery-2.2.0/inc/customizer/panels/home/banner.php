<?php
/**
 * Banner Settings
 *
 * @package Cookery
 */

function cookery_customize_register_banner( $wp_customize ){
    
    $wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'cookery' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'cookery_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'cookery_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'cookery_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'cookery' ),
                'description' => __( 'Choose banner as static image/video or as a slider.', 'cookery' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'        => __( 'Disable Banner Section', 'cookery' ),
                    'static_banner'    => __( 'Static/Video CTA Banner', 'cookery' ),
                    'static_nl_banner' => __( 'Static/Video Newsletter Banner', 'cookery' ),
                    'static_search_banner' => __( 'Static/Video Search Banner', 'cookery' ),
                    'slider_banner'    => __( 'Banner as Slider', 'cookery' ),
                ),
                'priority' => 5	
     		)            
		)
    );

    $wp_customize->add_setting(
        'static_banner_bg',
        array(
            'default'           => get_template_directory_uri() . '/images/static-banner-bg.jpg',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'static_banner_bg',
           array(
               'label'           => __( 'Banner Background', 'cookery' ),
               'description'     => __( 'Choose the background image for static banner section. Please use square image for layouts two and three.', 'cookery' ),
               'section'         => 'header_image',
               'active_callback' => 'cookery_banner_ac'
           )
       )
    );

    $wp_customize->add_setting(
        'static_newsletter_banner_thumb',
        array(
            'default'           => '',
            'sanitize_callback' => '',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'static_newsletter_banner_thumb',
           array(
               'label'           => __( 'Banner Thumb', 'cookery' ),
               'description'     => __( 'Choose the thumbnail image for static banner section.', 'cookery' ),
               'section'         => 'header_image',
               'width'           => 156,
               'height'          => 231,
               'active_callback' => 'cookery_banner_ac'
           )
       )
    );
    
    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => __( 'Hey there, Welcome. I’m Rebbeca Alvarado', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => __( 'Title', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'cookery_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.site-banner .banner-caption h2.item-title',
        'render_callback' => 'cookery_get_banner_title',
    ) );
    
    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default'           => __( 'A certified Holistic Nutritionist, yoga-lover, girl\'s mom, and founder of Blossom Cookery. It’s nice to meet you.. It’s the perfect base for your favorite salad toppings.', 'cookery' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label'           => __( 'Sub Title', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'textarea',
            'active_callback' => 'cookery_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector' => '.site-banner .banner-caption .item-desc',
        'render_callback' => 'cookery_get_banner_sub_title',
    ) );
    
    /** Banner Label */
    $wp_customize->add_setting(
        'button_one',
        array(
            'default'           => __( 'Get started', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'button_one',
        array(
            'label'           => __( 'Button One Label', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'cookery_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'button_one', array(
        'selector' => '.site-banner .banner-caption a.btn-one',
        'render_callback' => 'cookery_get_banner_button_one',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'button_one_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'button_one_url',
        array(
            'label'           => __( 'Banner One Link', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'cookery_banner_ac'
        )
    );
    
    $wp_customize->add_setting(
        'button_one_tab_new',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'button_one_tab_new',
            array(
                'section'       => 'header_image',
                'label'         => __( 'Button One Open in New tab', 'cookery' ),
                'description'   => __( 'Enable to open button one link in new window.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );

    $wp_customize->add_setting(
        'button_two',
        array(
            'default'           => __( 'Know More', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'button_two',
        array(
            'label'           => __( 'Button Two Label', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'cookery_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'button_two', array(
        'selector' => '.site-banner .banner-caption a.btn-two',
        'render_callback' => 'cookery_get_banner_button_two',
    ) );

    $wp_customize->add_setting(
        'button_two_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'button_two_url',
        array(
            'label'           => __( 'Banner Two Link', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'cookery_banner_ac'
        )
    );

    $wp_customize->add_setting(
        'button_two_tab_new',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'button_two_tab_new',
            array(
                'section'       => 'header_image',
                'label'         => __( 'Button One Open in New tab', 'cookery' ),
                'description'   => __( 'Enable to open button one link in new window.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );

    $wp_customize->add_setting( 
        'cta_banner_alignment', 
        array(
            'default'           => 'right',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Radio_Buttonset_Control(
            $wp_customize,
            'cta_banner_alignment',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Image Alignment', 'cookery' ),
                'description' => __( 'Choose the position of image for cta banner.', 'cookery' ),
                'choices'     => array(
                    'left'      => __( 'Left', 'cookery' ),
                    'right'     => __( 'Right', 'cookery' ),
                ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );
    
    /** Banner Newsletter */
    $wp_customize->add_setting(
        'banner_newsletter',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'banner_newsletter',
        array(
            'label'           => __( 'Banner Newsletter', 'cookery' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'cookery_banner_ac'
        )
    );
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'cookery' ),
    			'section' => 'header_image',
    			'choices' => cookery_slider_options(),
                'active_callback' => 'cookery_banner_ac'	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'cookery' ),
    			'section'         => 'header_image',
    			'choices'         => cookery_get_categories(),
                'active_callback' => 'cookery_banner_ac'	
     		)
		)
	);
    
    if ( is_delicious_recipe_activated() ) {

        $wp_customize->add_setting(
            'slider_cat_course',
            array(
                'default'           => '',
                'sanitize_callback' => 'cookery_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Cookery_Select_Control(
                $wp_customize,
                'slider_cat_course',
                array(
                    'label'           => __( 'Slider Recipe Course', 'cookery' ),
                    'section'         => 'header_image',
                    'choices'         => cookery_get_categories( true, 'recipe-course' ),
                    'active_callback' => 'cookery_banner_ac', 
                )
            )
        );

        $wp_customize->add_setting(
            'slider_cat_cuisine',
            array(
                'default'           => '',
                'sanitize_callback' => 'cookery_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Cookery_Select_Control(
                $wp_customize,
                'slider_cat_cuisine',
                array(
                    'label'           => __( 'Slider Recipe Cuisine', 'cookery' ),
                    'section'         => 'header_image',
                    'choices'         => cookery_get_categories( true, 'recipe-cuisine' ),
                    'active_callback' => 'cookery_banner_ac', 
                )
            )
        );

        $wp_customize->add_setting(
            'slider_cat_cookmethod',
            array(
                'default'           => '',
                'sanitize_callback' => 'cookery_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Cookery_Select_Control(
                $wp_customize,
                'slider_cat_cookmethod',
                array(
                    'label'           => __( 'Slider Recipe Cooking Method', 'cookery' ),
                    'section'         => 'header_image',
                    'choices'         => cookery_get_categories( true, 'recipe-cooking-method' ),
                    'active_callback' => 'cookery_banner_ac', 
                )
            )
        );

        $wp_customize->add_setting(
            'slider_cat_recipekey',
            array(
                'default'           => '',
                'sanitize_callback' => 'cookery_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Cookery_Select_Control(
                $wp_customize,
                'slider_cat_recipekey',
                array(
                    'label'           => __( 'Slider Recipe Key', 'cookery' ),
                    'section'         => 'header_image',
                    'choices'         => cookery_get_categories( true, 'recipe-key', false, true ),
                    'active_callback' => 'cookery_banner_ac', 
                )
            )
        );
    }
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 6,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'no_of_slides',
			array(
				'section'     => 'header_image',
                'label'       => __( 'Number of Slides', 'cookery' ),
                'description' => __( 'Choose the number of slides you want to display', 'cookery' ),
                'choices'	  => array(
					'min' 	=> 1,
					'max' 	=> 20,
					'step'	=> 1,
				),
                'active_callback' => 'cookery_banner_ac'                 
			)
		)
	);
        
    /** Slider Pages */
    $wp_customize->add_setting( 
        new Cookery_Repeater_Setting( 
            $wp_customize, 
            'slider_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Cookery_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Control_Repeater(
			$wp_customize,
			'slider_pages',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Slider Pages ', 'cookery' ),
				'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for slider', 'cookery' ),
                        'choices' => cookery_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'cookery' ),
                    'field' => 'page'
                ),
                'active_callback' => 'cookery_banner_ac'                        
			)
		)
	);
    
    /** Add Slides */
    $wp_customize->add_setting( 
        new Cookery_Repeater_Setting( 
            $wp_customize, 
            'slider_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Cookery_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Control_Repeater(
			$wp_customize,
			'slider_custom',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Add Sliders', 'cookery' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'cookery' ),                
                    ),
                    'title'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Title', 'cookery' ),
                    ),
                    'subtitle'   => array(
                        'type'  => 'text',
                        'label' => __( 'Subtitle', 'cookery' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'cookery' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'Slide', 'cookery' ),
                    'field' => 'title'
                ),
                'active_callback' => 'cookery_banner_ac'                                              
			)
		)
	);
    
    /** HR */
    $wp_customize->add_setting(
        'banner_hr',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
			$wp_customize,
			'banner_hr',
			array(
				'section'	  => 'header_image',
				'description' => '<hr/>',
                'active_callback' => 'cookery_banner_ac'
			)
		)
    );
    
    /** Include Repetitive Posts */
    $wp_customize->add_setting(
        'include_repetitive_posts',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'include_repetitive_posts',
			array(
				'section'         => 'header_image',
				'label'           => __( 'Include Repetitive Posts', 'cookery' ),
				'description'     => __( 'Enable to add posts included in slider in blog page too.', 'cookery' ),
				'active_callback' => 'cookery_banner_ac'
			)
		)
    );
    
    $wp_customize->add_setting(
        'slider_show_date',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'slider_show_date',
            array(
                'section'         => 'header_image',
                'label'           => __( 'Show Date', 'cookery' ),
                'description'     => __( 'Enable to show posted date on slider.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Auto', 'cookery' ),
                'description' => __( 'Enable slider auto transition.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'slider_loop',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Loop', 'cookery' ),
                'description' => __( 'Enable slider loop.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
			)
		)
	);
    
    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'slider_caption',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Caption', 'cookery' ),
                'description' => __( 'Enable slider caption.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
			)
		)
	);
    
    /** Full Image */
    $wp_customize->add_setting(
        'slider_full_image',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'slider_full_image',
			array(
				'section'         => 'header_image',
				'label'           => __( 'Full Image', 'cookery' ),
                'description'     => __( 'Enable to use full size image in slider.', 'cookery' ),
                'active_callback' => 'cookery_banner_ac'
			)
		)
	);
    
    /** Slider Animation */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'cookery' ),
                'section'     => 'header_image',
    			'choices'     => array(
                    'bounceOut'      => __( 'Bounce Out', 'cookery' ),
                    'bounceOutLeft'  => __( 'Bounce Out Left', 'cookery' ),
                    'bounceOutRight' => __( 'Bounce Out Right', 'cookery' ),
                    'bounceOutUp'    => __( 'Bounce Out Up', 'cookery' ),
                    'bounceOutDown'  => __( 'Bounce Out Down', 'cookery' ),
                    'fadeOut'        => __( 'Fade Out', 'cookery' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'cookery' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'cookery' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'cookery' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'cookery' ),
                    'flipOutX'       => __( 'Flip OutX', 'cookery' ),
                    'flipOutY'       => __( 'Flip OutY', 'cookery' ),
                    'hinge'          => __( 'Hinge', 'cookery' ),
                    'pulse'          => __( 'Pulse', 'cookery' ),
                    'rollOut'        => __( 'Roll Out', 'cookery' ),
                    'rotateOut'      => __( 'Rotate Out', 'cookery' ),
                    'rubberBand'     => __( 'Rubber Band', 'cookery' ),
                    'shake'          => __( 'Shake', 'cookery' ),
                    ''               => __( 'Slide', 'cookery' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'cookery' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'cookery' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'cookery' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'cookery' ),
                    'swing'          => __( 'Swing', 'cookery' ),
                    'tada'           => __( 'Tada', 'cookery' ),
                    'zoomOut'        => __( 'Zoom Out', 'cookery' ),
                    'zoomOutLeft'    => __( 'Zoom Out Left', 'cookery' ),
                    'zoomOutRight'   => __( 'Zoom Out Right', 'cookery' ),
                    'zoomOutUp'      => __( 'Zoom Out Up', 'cookery' ),
                    'zoomOutDown'    => __( 'Zoom Out Down', 'cookery' ),                    
                ),
                'active_callback' => 'cookery_banner_ac'                                	
     		)
		)
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default'           => 5000,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Slider_Control( 
            $wp_customize,
            'slider_speed',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Slider Speed', 'cookery' ),
                'description' => __( 'Controls the speed of slider in miliseconds.', 'cookery' ),
                'choices'     => array(
                    'min'  => 1000,
                    'max'  => 20000,
                    'step' => 500,
                ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );
    
    /** Read More Text */
    $wp_customize->add_setting(
        'slider_readmore',
        array(
            'default'           => __( 'Continue Reading', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'slider_readmore',
        array(
            'type'            => 'text',
            'section'         => 'header_image',
            'label'           => __( 'Slider Read More', 'cookery' ),
            'active_callback' => 'cookery_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'slider_readmore', array(
        'selector' => '.banner .banner-text a.btn-more',
        'render_callback' => 'cookery_get_slider_readmore',
    ) );

    $wp_customize->add_setting(
        'cta_static_banner_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'cta_static_banner_text',
            array(
                'section'     => 'header_image',
                'description' => sprintf( __( '%1$sClick here%2$s to select the layout of static cta banner.', 'cookery' ), '<span class="text-inner-link cta_static_banner_text">', '</span>' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );

    $wp_customize->add_setting(
        'newsletter_static_banner_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'newsletter_static_banner_text',
            array(
                'section'     => 'header_image',
                'description' => sprintf( __( '%1$sClick here%2$s to select the layout of static newsletter banner.', 'cookery' ), '<span class="text-inner-link newsletter_static_banner_text">', '</span>' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );

    $wp_customize->add_setting(
        'search_static_banner_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'search_static_banner_text',
            array(
                'section'     => 'header_image',
                'description' => sprintf( __( '%1$sClick here%2$s to select the layout of static search banner.', 'cookery' ), '<span class="text-inner-link search_static_banner_text">', '</span>' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );

    $wp_customize->add_setting(
        'slider_banner_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
            $wp_customize,
            'slider_banner_text',
            array(
                'section'     => 'header_image',
                'description' => sprintf( __( '%1$sClick here%2$s to select the layout of slider banner.', 'cookery' ), '<span class="text-inner-link slider_banner_text">', '</span>' ),
                'active_callback' => 'cookery_banner_ac'
            )
        )
    );    
}
add_action( 'customize_register', 'cookery_customize_register_banner' );

if ( ! function_exists( 'cookery_slider_options' ) ) :
    /**
     * @return array Content type options
     */
    function cookery_slider_options() {
        $slider_options = array(
            'latest_posts' => __( 'Latest Posts', 'cookery' ),
            'cat'          => __( 'Category', 'cookery' ),
            'pages'        => __( 'Pages', 'cookery' ),
            'custom'       => __( 'Custom', 'cookery' ),
        );
        if ( is_delicious_recipe_activated() ) {
            $slider_options = array_merge( $slider_options, array( 'latest_recipes' => __( 'Latest Recipes', 'cookery' ), 'cat_course' => __( 'Recipe Course', 'cookery' ), 'cat_cuisine' => __( 'Recipe Cuisine', 'cookery' ), 'cat_cookmethod' => __( 'Recipe Cooking Method', 'cookery' ), 'cat_recipekey' => __( 'Recipe Key', 'cookery' ) ) );
        }
        $output = apply_filters( 'cookery_slider_options', $slider_options );
        return $output;
    }
endif;