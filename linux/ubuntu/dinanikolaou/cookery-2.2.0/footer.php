<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cookery
 */
    
    /**
     * After Content
     * 
     * @hooked cookery_content_end               - 20
     * @hooked cookery_cta_section               - 25
     * @hooked cookery_video_section             - 30
     * @hooked cookery_featured_recipe_section   - 35
     * @hooked cookery_browse_category_section   - 40
     * @hooked cookery_recipe_index_section      - 42
     * @hooked cookery_client_section            - 45
     * @hooked cookery_footer_newsletter_section - 50
     * @hooked cookery_instagram_section         - 55
    */
    do_action( 'cookery_before_footer' );
    
    /**
     * Footer
     * 
     * @hooked cookery_footer_start  - 20
     * @hooked cookery_footer_top    - 30
     * @hooked cookery_footer_bottom - 40
     * @hooked cookery_footer_disclaimer - 45
     * @hooked cookery_footer_end    - 50
    */
    do_action( 'cookery_footer' );
    
    /**
     * After Footer
     * 
     * @hooked cookery_page_end    - 20
    */
    do_action( 'cookery_after_footer' );

    wp_footer(); ?>

</body>
</html>
