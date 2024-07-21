<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cookery
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <?php 
            //AD before single content
            cookery_get_ad_before_content();
        ?>

		<main id="main" class="site-main">

    		<?php
    		while ( have_posts() ) : the_post();

    			get_template_part( 'template-parts/content', 'single' );

    		endwhile; // End of the loop.
    		?>

		</main><!-- #main -->
        
        <?php
        /**
         * @hooked cookery_get_ad_after_content - 5
         * @hooked cookery_navigation           - 15
         * @hooked cookery_author               - 25
         * @hooked cookery_newsletter           - 30
         * @hooked cookery_related_posts        - 35
         * @hooked cookery_comment              - 45
        */
        do_action( 'cookery_after_post_content' );
        ?>
        
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();