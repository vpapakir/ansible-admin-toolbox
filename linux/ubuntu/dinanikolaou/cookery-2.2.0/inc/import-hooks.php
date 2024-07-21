<?php
/**
 * Cookery Import Hooks.
 *
 * @package Cookery 
 */
 
/** Import content data*/
if ( ! function_exists( 'cookery_import_files' ) ) :
function cookery_import_files() {
    return array(
        array(
            'import_file_name'           => 'Default',
            'import_file_url'            => 'https://blossomthemesdemo.com/wp-content/uploads/demo-import/cookery/cookery-default.xml',
            'import_widget_file_url'     => 'https://blossomthemesdemo.com/wp-content/uploads/demo-import/cookery/cookery-widgets-default.wie',
            'import_customizer_file_url' => 'https://blossomthemesdemo.com/wp-content/uploads/demo-import/cookery/cookery-customizer-default.dat',
            'import_preview_image_url'   => get_template_directory_uri() . '/screenshot.png',
            'import_notice'              => __( 'Please wait for about 10 - 15 minutes. Do not close or refresh the page until the import is complete.', 'cookery' ),
            'preview_url'                => 'https://blossomthemes.com/theme-demo/?theme=cookery',
        )            
    );       
}
add_filter( 'pt-ocdi/import_files', 'cookery_import_files' );
endif;

/** Programmatically set the front page and menu */
if ( ! function_exists( 'cookery_after_import' ) ) :
function cookery_after_import( $selected_import ){
    
    //Set Menu
    $primary   = get_term_by( 'name', 'Primary', 'nav_menu' );
    $secondary = get_term_by( 'name', 'Secondary', 'nav_menu' );
    $footer    = get_term_by( 'name', 'Secondary', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations' , array( 
            'primary'   => $primary->term_id,
            'secondary' => $secondary->term_id,
            'footer'    => $footer->term_id,
        ) 
    );

}
add_action( 'pt-ocdi/after_import', 'cookery_after_import' );
endif;

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );