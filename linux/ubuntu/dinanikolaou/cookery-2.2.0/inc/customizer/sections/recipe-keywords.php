<?php
/**
 * Sales Funnel Links
 *
 * @package Cookery
 */

function cookery_customizer_recipe_keyword_section( $wp_customize ) {
	
    $wp_customize->add_section( 'recipe_keyword', 
        array(
            'title'    => __( 'Recipe Keywords', 'cookery' ),
            'priority' => 5,
		)
    );

	/** Important Links */
	$wp_customize->add_setting( 'recipe_keyword_promo',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    $recipe_keyword = '<a href="' . esc_url( 'https://wpdelicious.com/keyword-research-for-food-bloggers/?utm_source=pro_theme&utm_medium=customizer&utm_campaign=sale_funnel_promo' ) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/keyword-research-banner.jpg' . '"/></a>';
    $recipe_keyword .= __( '<h2> 60,000+ Recipe Keywords</h2>', 'cookery' );
    $recipe_keyword .= __( '<p>Skyrocket your food blogs SEO with well-researched Recipe Keywords</p>', 'cookery' );
    $recipe_keyword .= '<ul>';
	$recipe_keyword .= __( '<li>60,000+ keywords</li>', 'cookery' );
	$recipe_keyword .= __( '<li>Short and Long-tail Keywords</li>', 'cookery' );
	$recipe_keyword .= __( '<li>Sorted by Recipe Type</li>', 'cookery' );
    $recipe_keyword .= '</ul><br/>';
    $recipe_keyword .= sprintf( __( '<button style="padding: 20px 50px; background-color: orange; border:none;" >%1$sLearn More%2$s</button>', 'cookery' ),  '<a href="' . esc_url( 'https://wpdelicious.com/keyword-research-for-food-bloggers/?utm_source=pro_theme&utm_medium=customizer&utm_campaign=sale_funnel_promo' ) . '" target="_blank" style="text-transform: uppercase; color: #fff !important; text-decoration: none; font-weight: bold;">', '</a>' );

	$wp_customize->add_control( new Cookery_Note_Control( $wp_customize,
        'recipe_keyword_promo',
            array(
                'section'     => 'recipe_keyword',
                'description' => $recipe_keyword
            )
        )
    );

}
add_action( 'customize_register', 'cookery_customizer_recipe_keyword_section' );