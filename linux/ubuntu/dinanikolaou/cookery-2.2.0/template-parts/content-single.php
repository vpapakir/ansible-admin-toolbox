<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cookery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
        /**
         * @hooked cookery_entry_header - 5
         * @hooked cookery_post_thumbnail - 10
        */
        do_action( 'cookery_before_single_entry_content' );
        
        echo '<div class="content-wrap">';

        cookery_single_article_meta();
        
        /** 
         * @hooked cookery_entry_content - 15
         * @hooked cookery_entry_footer  - 20
        */
        do_action( 'cookery_single_entry_content' );
        
        echo '</div>';
        
    ?>
</article><!-- #post-<?php the_ID(); ?> -->