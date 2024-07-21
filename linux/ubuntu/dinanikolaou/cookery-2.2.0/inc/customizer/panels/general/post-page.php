<?php
/**
 * Post Page Settings
 *
 * @package Cookery
 */

function cookery_customize_register_general_post_page( $wp_customize ) {
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'cookery' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'cookery' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'cookery' ),
			)
		)
	);
        
    /** Blog Post Image Crop */
    $wp_customize->add_setting( 
        'ed_crop_blog', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_crop_blog',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Blog Post Image Crop', 'cookery' ),
                'description' => __( 'Enable to avoid automatic cropping of featured image in home, archive and search posts.', 'cookery' ),
            )
        )
    );
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'cookery' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'cookery' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 35,
            'sanitize_callback' => 'cookery_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'cookery' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'cookery' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 100,
					'step'	=> 5,
				)                 
			)
		)
	);

    $wp_customize->add_setting(
        'blog_main_title',
        array(
            'default'           => __( 'Latest Recipes', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field', 
        )
    );
    
    $wp_customize->add_control(
        'blog_main_title',
        array(
            'label'   => __( 'Blog Title', 'cookery' ),
            'section' => 'post_page_settings',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'blog_main_content',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field', 
        )
    );
    
    $wp_customize->add_control(
        'blog_main_content',
        array(
            'label'   => __( 'Blog Description', 'cookery' ),
            'section' => 'post_page_settings',
            'type'    => 'textarea',
        )
    );
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'cookery' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-readmore',
        'render_callback' => 'cookery_get_read_more',
    ) );

    $wp_customize->add_setting(
        'ed_post_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_post_like',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Like Button In Blog', 'cookery' ),
                'description' => __( 'Enable to show like button in blog.', 'cookery' ),
            )
        )
    );
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'cookery' ), '<hr/>' ),
			)
		)
    );
    
    /** Single Post Image Crop */
    $wp_customize->add_setting( 
        'ed_crop_single', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_crop_single',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Single Post Image Crop', 'cookery' ),
                'description' => __( 'Enable to avoid automatic cropping of featured image in single post.', 'cookery' ),
            )
        )
    );

    $wp_customize->add_setting(
        'ed_single_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_single_like',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Like Button In Single', 'cookery' ),
                'description' => __( 'Enable to show like button in Single Post.', 'cookery' ),
            )
        )
    );

    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Author Section', 'cookery' ),
                'description' => __( 'Enable to hide author section.', 'cookery' ),
			)
		)
	);

    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'cookery' ),
                'description' => __( 'Enable to show related posts in single page.', 'cookery' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You may also like...', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'cookery' ),
            'active_callback' => 'cookery_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.related-posts .title',
        'render_callback' => 'cookery_get_related_title',
    ) );
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting( 
        'related_taxonomy', 
        array(
            'default'           => 'cat',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Radio_Buttonset_Control(
			$wp_customize,
			'related_taxonomy',
			array(
				'section'	  => 'post_page_settings',
				'label'       => __( 'Related Post Taxonomy', 'cookery' ),
                'description' => __( 'Choose Categories/Tags to display related post based on in Single Post.', 'cookery' ),
				'choices'	  => array(
					'cat'   => __( 'Category', 'cookery' ),
                    'tag'   => __( 'Tags', 'cookery' ),
				),
                'active_callback' => 'cookery_post_page_ac'
			)
		)
	);
    
    $wp_customize->add_setting(
        'related_portfolio_title',
        array(
            'default'           => __( 'Related Projects', 'cookery' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_portfolio_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Portfolio Title', 'cookery' ),
        )
    );

    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_comments',
			array(
				'section'     => 'post_page_settings',
				'label'       => __( 'Show Comments', 'cookery' ),
                'description' => __( 'Enable to show Comments in Single Post/Page.', 'cookery' ),
			)
		)
    );
    
    /** Comments Below Post Content */
    $wp_customize->add_setting(
        'toggle_comments',
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'toggle_comments',
			array(
				'section'         => 'post_page_settings',
				'label'           => __( 'Comments Below Post Content', 'cookery' ),
				'description'     => __( 'Enable to show comment section right after post content. Refresh site for changes.', 'cookery' ),
				'active_callback' => 'cookery_post_page_ac'
			)
		)
	);
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_category',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Category', 'cookery' ),
                'description' => __( 'Enable to hide category.', 'cookery' ),
			)
		)
	);
    
    /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_post_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Post Author', 'cookery' ),
                'description' => __( 'Enable to hide post author.', 'cookery' ),
			)
		)
	);
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_post_date',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Posted Date', 'cookery' ),
                'description' => __( 'Enable to hide posted date.', 'cookery' ),
			)
		)
	);
    
    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Toggle_Control( 
			$wp_customize,
			'ed_featured_image',
			array(
				'section'         => 'post_page_settings',
				'label'	          => __( 'Show Featured Image', 'cookery' ),
                'description'     => __( 'Enable to show featured image in post detail (single post).', 'cookery' ),
                'active_callback' => 'cookery_post_page_ac'
			)
		)
	);

    $wp_customize->add_setting( 'author_signature',
        array(
            'default'           => '',
            'sanitize_callback' => 'cookery_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'author_signature',
            array(
                'label'         => esc_html__( 'Author Signature', 'cookery' ),
                'description'   => esc_html__( 'Select author signature image of your choice. Recommended size for this image is 250px by 250px. It will be displayed on end of the single posts.', 'cookery' ),
                'section'       => 'post_page_settings',
                'type'          => 'image',
            )
        )
    );

    /** Toggle Social Links*/
    $wp_customize->add_setting( 
        'ed_toggle_social', 
        array(
            'default'           => false,
            'sanitize_callback' => 'cookery_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Toggle_Control( 
            $wp_customize,
            'ed_toggle_social',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Enable Social Links', 'cookery' ),
                'description' => __( 'Enable to show social links below the author signature. Works only when author signature image is set and social links is enabled.', 'cookery' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'alignment_signature', 
        array(
            'default'           => 'center',
            'sanitize_callback' => 'cookery_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Cookery_Radio_Buttonset_Control(
            $wp_customize,
            'alignment_signature',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Author Signature Alignment', 'cookery' ),
                'description' => __( 'Choose author signature alignment.', 'cookery' ),
                'choices'     => array(
                    'left'    => __( 'Left', 'cookery' ),
                    'center'  => __( 'Center', 'cookery' ),
                    'right'   => __( 'Right', 'cookery' ),
                )
            )
        )
    );
    /** Posts(Blog) & Pages Settings Ends */
    
}
add_action( 'customize_register', 'cookery_customize_register_general_post_page' );