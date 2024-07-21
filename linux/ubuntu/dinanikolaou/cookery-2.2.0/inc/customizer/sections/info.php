<?php
/**
 * Information Links
 *
 * @package Cookery
 */

function cookery_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info', 
        array(
            'title'    => __( 'Information Links', 'cookery' ),
            'priority' => 5,
		)
    );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<ul>';
	$theme_info .= sprintf( __( '<li>View demo: %1$sClick here.%2$s</li>', 'cookery' ),  '<a href="' . esc_url( 'https://blossomthemes.com/theme-demo/?theme=cookery' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>View documentation: %1$sClick here.%2$s</li>', 'cookery' ),  '<a href="' . esc_url( 'https://docs.blossomthemes.com/cookery/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Theme info: %1$sClick here.%2$s</li>', 'cookery' ),  '<a href="' . esc_url( 'https://blossomthemes.com/wordpress-themes/cookery/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Support ticket: %1$sClick here.%2$s</li>', 'cookery' ),  '<a href="' . esc_url( 'https://blossomthemes.com/support-ticket/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>More WordPress Themes: %1$sClick here.%2$s</li>', 'cookery' ),  '<a href="' . esc_url( 'https://blossomthemes.com/feminine-wordpress-themes/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</ul>';

	$wp_customize->add_control( new Cookery_Note_Control( $wp_customize,
        'theme_info_theme',
            array(
                'label'       => __( 'Important Links' , 'cookery' ),
                'section'     => 'theme_info',
                'description' => $theme_info
    		)
        )
    );

}
add_action( 'customize_register', 'cookery_customizer_theme_info' );