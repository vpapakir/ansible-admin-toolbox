<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cookery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
        /**
         * Post Thumbnail
         * 
         * @hooked cookery_post_thumbnail
        */
        do_action( 'cookery_before_page_entry_content' );
    
        /**
         * Entry Content
         * 
         * @hooked cookery_entry_content - 15
         * @hooked cookery_entry_footer  - 20
        */
        do_action( 'cookery_page_entry_content' );    
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
