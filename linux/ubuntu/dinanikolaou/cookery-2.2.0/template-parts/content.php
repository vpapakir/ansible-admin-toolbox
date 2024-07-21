<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cookery
 */

global $wp_query;
$home_layout    = get_theme_mod( 'home_layout', 'three' );
$home_sticky_array = array( 'five', 'six' );
$posts_to_show = get_option( 'posts_per_page' );
$posts_to_show -= 1;

if( in_array( $home_layout, $home_sticky_array ) && $wp_query->current_post == 0 ) {
    echo '<div class="single-item">';
}

if( in_array( $home_layout, $home_sticky_array ) && $wp_query->current_post == 1 ) {
    echo '<div class="multi-item">';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
    <?php 
        /**
         * @hooked cookery_post_thumbnail - 10
        */
        do_action( 'cookery_before_post_entry_content' );
        
        if( ! is_single() ) echo '<div class="content-wrap">';
        /**
         * @hooked cookery_entry_header  - 10 
         * @hooked cookery_entry_content - 15
         * @hooked cookery_entry_footer  - 20
        */
        do_action( 'cookery_post_entry_content' );
        
        if( ! is_single() ) echo '</div>';
    ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php 

if( in_array( $home_layout, $home_sticky_array ) && $wp_query->current_post == 0 ) {
    echo '</div>';
}

if( in_array( $home_layout, $home_sticky_array ) && ( $wp_query->current_post == $posts_to_show ) ) {
    echo '</div>';
}