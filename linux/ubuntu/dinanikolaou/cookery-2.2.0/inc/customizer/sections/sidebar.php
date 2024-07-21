<?php
/**
 * Sidebar Settings
 *
 * @package Cookery
 */
 
function cookery_customize_register_sidebar( $wp_customize ) {
    
    $wp_customize->add_section( 'sidebar_settings', array(
        'title'       => __( 'Sidebar Settings', 'cookery' ),
        'priority'    => 65,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Add custom sidebars. You need to save the changes and reload the customizer to use the sidebars in the dropdowns below.
You can add content to the sidebars in Appearance->Widgets.', 'cookery' ),
    ) );
    
    /** Custom Sidebars */
    $wp_customize->add_setting( 
        new Cookery_Repeater_Setting( 
            $wp_customize, 
            'sidebar', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Cookery_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Cookery_Control_Repeater(
			$wp_customize,
			'sidebar',
			array(
				'section' => 'sidebar_settings',				
				'label'	  => __( 'Add Sidebars', 'cookery' ),
                'fields'  => array(
                    'name' => array(
                        'type'         => 'text',
                        'label'        => __( 'Name', 'cookery' ),
                        'description'  => __( 'Example: Homepage Sidebar', 'cookery' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'sidebar', 'cookery' ),
                    'field' => 'name'
                )                                              
			)
		)
	);
    
    /** Home Page */
    $wp_customize->add_setting(
		'home_page_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'home_page_sidebar',
    		array(
                'label'	      => __( 'Home Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the home page.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true ),	
     		)
		)
	);
    
    /** Single Page */
    $wp_customize->add_setting(
		'single_page_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'single_page_sidebar',
    		array(
                'label'	      => __( 'Single Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true ),	
     		)
		)
	);
    
    /** Single Post */
    $wp_customize->add_setting(
		'single_post_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'single_post_sidebar',
    		array(
                'label'	      => __( 'Single Post Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true ),	
     		)
		)
	);
    
    /** Archive Page */
    $wp_customize->add_setting(
		'archive_page_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'archive_page_sidebar',
    		array(
                'label'	      => __( 'Archive Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true ),	
     		)
		)
	);
    
    /** Category Archive Page */
    $wp_customize->add_setting(
		'cat_archive_page_sidebar',
		array(
			'default'			=> 'default-sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'cat_archive_page_sidebar',
    		array(
                'label'	      => __( 'Category Archive Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the category archives.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true, true ),	
     		)
		)
	);
    
    /** Tag Archive Page */
    $wp_customize->add_setting(
		'tag_archive_page_sidebar',
		array(
			'default'			=> 'default-sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'tag_archive_page_sidebar',
    		array(
                'label'	      => __( 'Tag Archive Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the tag archives.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true, true ),	
     		)
		)
	);
    
    /** Date Archive Page */
    $wp_customize->add_setting(
		'date_archive_page_sidebar',
		array(
			'default'			=> 'default-sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'date_archive_page_sidebar',
    		array(
                'label'	      => __( 'Date Archive Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the date archives.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true, true ),	
     		)
		)
	);
    
    /** Author Archive Page */
    $wp_customize->add_setting(
		'author_archive_page_sidebar',
		array(
			'default'			=> 'default-sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'author_archive_page_sidebar',
    		array(
                'label'	      => __( 'Author Archive Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the author archives.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true, true ),	
     		)
		)
	);
    
    /** Search Page */
    $wp_customize->add_setting(
		'search_page_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'cookery_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Cookery_Select_Control(
    		$wp_customize,
    		'search_page_sidebar',
    		array(
                'label'	      => __( 'Search Page Sidebar', 'cookery' ),
                'description' => __( 'Select a sidebar for the search results.', 'cookery' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => cookery_get_dynamnic_sidebar( false, true ),	
     		)
		)
	);  
    /** Sidebar Settings Ends */
}
add_action( 'customize_register', 'cookery_customize_register_sidebar' );