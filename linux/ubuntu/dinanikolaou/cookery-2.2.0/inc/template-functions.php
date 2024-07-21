<?php
/**
 * Cookery Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Cookery
 */

if( ! function_exists( 'cookery_doctype' ) ) :
/**
 * Doctype Declaration
*/
function cookery_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'cookery_doctype', 'cookery_doctype' );

if( ! function_exists( 'cookery_head' ) ) :
/**
 * Before wp_head 
*/
function cookery_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'cookery_before_wp_head', 'cookery_head' );

if( ! function_exists( 'cookery_page_start' ) ) :
/**
 * Page Start
*/
function cookery_page_start(){ ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content (Press Enter)', 'cookery' ); ?></a>
    <?php
}
endif;
add_action( 'cookery_before_header', 'cookery_page_start', 20 );

if( ! function_exists( 'cookery_notification_topbar' ) ) :
/**
 * Top Bar 
*/
function cookery_notification_topbar(){

    $ed_top_bar        = get_theme_mod( 'ed_top_bar', false );
    $top_bar_type      = get_theme_mod( 'top_bar_type', 'top_button_link' );
    $notification_text = get_theme_mod( 'notification_text', __( 'By continuing to use this site, you agree to the use of cookies.  ', 'cookery' ) );
    $btn_label         = get_theme_mod( 'notification_label', __( 'Find out more', 'cookery' ) );
    $btn_url           = get_theme_mod( 'notification_btn_url', '#' );
    $target            = get_theme_mod( 'ed_open_new_target', false ) ? ' target="_blank"' : '';
    $newsletter        = get_theme_mod( 'top_bar_newsletter' );

    if( $ed_top_bar ){ 
        if( $top_bar_type == 'top_button_link' && $notification_text ){ ?>
            <div class="sticky-t-bar active">
                <div class="sticky-bar-content">
                    <div class="container">
                        <?php  
                            echo wpautop( wp_kses_post( $notification_text ) );
                            if( $btn_label && $btn_url ){
                                echo '<a class="btn-readmore" href="' . esc_url( $btn_url ) . '"' . $target . '>' . esc_html( $btn_label ) . '</a>';
                            }  
                        ?> 
                    </div><!-- .container -->
                </div><!-- .sticky-t-content -->
                <button class="close"></button>
            </div><!-- .sticky-t-bar -->
            <?php 
        }elseif( is_btnw_activated() && $top_bar_type == 'top_newsletter' && $newsletter ){ ?>
            <div class="sticky-t-bar active">
                <div class="sticky-bar-content newsletter-enabled">
                    <?php echo do_shortcode( wp_kses_post( $newsletter ) ); ?>  
                </div>
                <button class="close"></button>    
            </div><!-- .sticky-t-bar -->
            <?php
        }
    }
}
endif;
add_action( 'cookery_header', 'cookery_notification_topbar', 15 );

if( ! function_exists( 'cookery_header' ) ) :
/**
 * Header Start
*/
function cookery_header(){ 
    $header_array = array( 'one', 'two', 'three', 'four', 'five', 'six' );
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'cookery_header', 'cookery_header', 20 );

if( ! function_exists( 'cookery_banner' ) ) :
/**
 * Banner Section 
*/
function cookery_banner(){
    $slider_layout = get_theme_mod( 'slider_layout', 'one' );
    if( is_front_page() || is_home() ) cookery_get_banner( $slider_layout );   
}
endif;
add_action( 'cookery_after_header', 'cookery_banner', 15 );

if( ! function_exists( 'cookery_newsletter_section' ) ) :
/**
 * Newsletter Section 
*/
function cookery_newsletter_section(){
    if( ( is_front_page() || is_home() ) && is_active_sidebar( 'newsletter' ) ){ ?>
        <section id="newsletter_section" class="newsletter-section">
            <div class="container">
                <?php dynamic_sidebar( 'newsletter' ); ?>
            </div>
        </section> <!-- .newsletter-section -->
    <?php
    }  
}
endif;
add_action( 'cookery_after_header', 'cookery_newsletter_section', 20 );

if( ! function_exists( 'cookery_promotional_section' ) ) :
/**
 * Promotional Section 
*/
function cookery_promotional_section(){
    if( ( is_front_page() || is_home() ) && is_active_sidebar( 'promo' ) ){ ?>
        <section id="promo_section" class="promo-section hide-element">
            <div class="container">
                <?php dynamic_sidebar( 'promo' ); ?>
            </div>
        </section> <!-- .promo-section -->
    <?php
    }  
}
endif;
add_action( 'cookery_after_header', 'cookery_promotional_section', 25 );

if( ! function_exists( 'cookery_about_section' ) ) :
/**
 * About Section 
*/
function cookery_about_section(){
    if( ( is_front_page() || is_home() ) && is_active_sidebar( 'about' ) ){ ?>
        <section id="about_section" class="about-section">
            <div class="section-grid">
                <?php dynamic_sidebar( 'about' ); ?>
            </div>
        </section><!-- .about-section -->
    <?php
    }
}
endif;
add_action( 'cookery_after_header', 'cookery_about_section', 30 );

if( ! function_exists( 'cookery_content_start' ) ) :
/**
 * Content Start
 * 
*/
function cookery_content_start(){

    $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
    $newsletter    = get_theme_mod( 'newsletter_shortcode' );
    $single_recipe_layout = get_theme_mod( 'single_recipe_layout', 'one' );
    $single_post_layout = cookery_single_meta_layout();
    $enable_at_top = get_theme_mod( 'ed_top_newsletter', true );

    $background_image  = '';
    if( is_archive() ){
        if( is_category() ) {
            $taxid             = get_queried_object_id();
            $cat_image_id      = get_term_meta( $taxid, 'category-image-id', true );
            $get_thumb_id      = isset( $cat_image_id ) ? $cat_image_id : false;
            $get_thumb_image   = wp_get_attachment_image_src( $get_thumb_id, 'full' );
            if( $get_thumb_image ) $background_image  = ' style="background-image: url(' . esc_url( $get_thumb_image[0] ) . ');"';
            
        }elseif( is_delicious_recipe_activated() && ( is_post_type_archive( 'recipe' ) || is_tax( 'recipe-course' ) || is_tax( 'recipe-cuisine' ) || is_tax( 'recipe-cooking-method' ) || is_tax( 'recipe-key' ) || is_tax( 'recipe-tag' ) ) ){
            $taxid             = get_queried_object_id();
            $dr_taxonomy_metas = get_term_meta( $taxid, 'dr_taxonomy_metas', true );
            $get_thumb_id      = isset( $dr_taxonomy_metas['taxonomy_image'] ) ? $dr_taxonomy_metas['taxonomy_image'] : false;
            $get_thumb_image   = wp_get_attachment_image_src( $get_thumb_id, 'full' );
            if( $get_thumb_image ) $background_image  = ' style="background-image: url(' . esc_url( $get_thumb_image[0] ) . ');"';
        }
    }
    ?>

    <div id="content" class="site-content">
        <?php
        if( ! is_home() ) : 
            
            if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) && $ed_newsletter && $newsletter && $enable_at_top ){ ?>
                <div class="newsletter">
                    <?php echo do_shortcode( $newsletter ); ?>
                </div>
                <?php
            }
            if( ! cookery_is_elementor_activated_post() ){
            cookery_breadcrumb(); 
            }
            if( is_archive() || is_search() || ( is_page() && apply_filters( 'cookery_page_title', true ) ) || ( is_singular( 'post' ) && $single_post_layout == 'two' ) || ( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) && $single_recipe_layout != 'one' ) ) { ?>
                <header class="page-header<?php if( $background_image ) echo ' has-bg'; ?>" <?php echo $background_image; ?>>
                    <div class="container">
                        <?php        
                            
                            if( is_archive() && ! is_search() ){ 
                                if( is_author() ){
                                    $author_title = get_the_author();
                                    $author_description = get_the_author_meta( 'description' ); ?>
                                    <div class="author-block">
                                        <div class="author-img-wrap">
                                            <figure class="author-img"><?php cookery_gravatar( get_the_author_meta( 'ID' ), 280 ); ?></figure>
                                            <?php 
                                                echo '<h1 class="author-name">' . esc_html( $author_title ) . '</h1>';
                                                cookery_author_social();
                                            ?>      
                                        </div>
                                        <?php if( $author_description ) echo '<div class="author-desc">' . wp_kses_post( wpautop( $author_description ) ) . '</div>'; ?>
                                    </div>
                                    <?php 
                                }else{
                                    if( is_post_type_archive( 'recipe' ) ) {
                                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                                    }else{
                                        the_archive_title();
                                    }
                                    the_archive_description( '<div class="archive-description">', '</div>' );
                                }
                            }
                            
                            if( is_search() ){ 
                                echo '<span class="page-subtitle">' . esc_html__( 'Search Results for', 'cookery' ) . '</span>';
                                get_search_form();
                            }

                            if( is_page() ){
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            }
                            if( ! is_author() ) cookery_posts_per_page_count();
                        ?>
                        <?php if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) && $single_recipe_layout != 'one' ) {
                            cookery_recipe_single_header();        
                            cookery_recipe_single_thumbnail();
                        } ?>

                        <?php if( is_singular( 'post' ) && $single_post_layout == 'two' ) cookery_post_second_entry_header(); ?>
                    </div>
                </header>
            <?php }
        endif; ?>

        
        <div class="container">
        <?php
}
endif;
add_action( 'cookery_content', 'cookery_content_start' );

if( ! function_exists( 'cookery_page_header' ) ) :
/**
 * Home Page header
 * 
*/
function cookery_page_header(){ 
    $blog_main_title = get_theme_mod( 'blog_main_title', __( 'Latest Recipes', 'cookery' ) );
    $blog_main_content = get_theme_mod( 'blog_main_content' );

    if( $blog_main_title || $blog_main_content ) : 
    
        echo '<header class="page-header">';
            if( $blog_main_title ) echo '<h2 class="page-title">' . esc_html( $blog_main_title ) . '</h2>';
            if( $blog_main_content ) echo '<div class="page-content">' . wpautop( wp_kses_post( $blog_main_content ) ) . '</div>';
        echo '</header>';
    endif; 
    
}
endif;
add_action( 'cookery_before_posts_content', 'cookery_page_header', 10 );

if ( ! function_exists( 'cookery_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function cookery_post_thumbnail() {
    $single_post_layout = cookery_single_meta_layout();
    if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) ) return false;
    if( is_singular( 'post' ) && $single_post_layout == 'two' ) return false;
    
    global $wp_query;
    $image_size     = 'thumbnail';
    $ed_featured    = get_theme_mod( 'ed_featured_image', true );
    $ed_crop_blog   = get_theme_mod( 'ed_crop_blog', false );
    $ed_crop_single = get_theme_mod( 'ed_crop_single', false );
    $sidebar        = cookery_sidebar();
    
    if( is_home() ){      
        $image_size = cookery_home_image_size();  
        if( has_post_thumbnail() ){                        
            echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '">';
            if( $ed_crop_blog ){
                the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
            }else{
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
            }
            echo '</a>';       
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) cookery_recipe_pinit();       
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) cookery_recipe_keywords();
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) do_action( 'delicious_recipes_wishlist_button');       
            echo '</figure>';
        }
    }elseif( is_archive() || is_search() ){
        if( has_post_thumbnail() ){
            echo '<figure  class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '">';
            if( $ed_crop_blog ){
                the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
            }else{
                the_post_thumbnail( 'cookery-blog-archive', array( 'itemprop' => 'image' ) );    
            }
            echo '</a>';
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) cookery_recipe_pinit();       
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) cookery_recipe_keywords();
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) do_action( 'delicious_recipes_wishlist_button');       
            echo '</figure>';
        }
    }elseif( is_singular() ){
        $image_size = ( $sidebar ) ? 'cookery-single' : 'cookery-single-two';
        if( is_single() ){
            if( $ed_featured && has_post_thumbnail() ){
                echo '<div class="post-thumbnail">';
                if( $ed_crop_single ){
                    the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
                }else{
                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                }
                echo '</div>';    
            }
        }else{
            if( has_post_thumbnail() ){
                echo '<div class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</div>';    
            }            
        }
    }
}
endif;
add_action( 'cookery_before_page_entry_content', 'cookery_post_thumbnail' );
add_action( 'cookery_before_post_entry_content', 'cookery_post_thumbnail', 10 );
add_action( 'cookery_before_single_entry_content', 'cookery_post_thumbnail', 10 );

if( ! function_exists( 'cookery_entry_header' ) ) :
/**
 * Entry Header
*/
function cookery_entry_header(){ 
    global $wp_query;
    $single_post_layout = cookery_single_meta_layout();
    $home_layout    = get_theme_mod( 'home_layout', 'three' );
    $home_array = array( 'one', 'two', 'three', 'four', 'seven', 'eight', 'nine' );
    if( is_singular( 'post' ) && $single_post_layout == 'two' ) return false;
    if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) ) return false; ?>
    
    <header class="entry-header">
		<?php 
            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) {
                cookery_recipe_category();
                the_title( '<h3 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                
                if( in_array( $home_layout, $home_array ) || ( $home_layout == 'five' || $home_layout == 'six' ) && $wp_query->current_post == 0 ) {
                    echo '<div class="entry-meta">';
                    cookery_posted_on();
                    cookery_comment_count();
                    cookery_recipe_rating();
                    echo '</div>';
                }

                echo '<div class="floated-meta">';
                cookery_social_share();
                cookery_like_count();
                echo '</div>';
            }else{

                cookery_category();

                if( is_singular() ) {
                    the_title( '<h1 class="entry-title">', '</h1>' );
                }else{
                    the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                }
            
                if( 'post' === get_post_type() ){
                    echo '<div class="entry-meta">';
                    cookery_posted_by();
                    cookery_posted_on();
                    cookery_comment_count();
                    echo '</div>';
                }

                if( ! is_single() ){
                    echo '<div class="floated-meta">';
                    cookery_social_share();
                    cookery_like_count();
                    echo '</div>';
                }
            }
		?>
	</header>         
    <?php    
}
endif;
add_action( 'cookery_post_entry_content', 'cookery_entry_header', 10 );
add_action( 'cookery_before_single_entry_content', 'cookery_entry_header', 5 );

if( ! function_exists( 'cookery_entry_content' ) ) :
/**
 * Entry Content
*/
function cookery_entry_content(){ 
    global $wp_query;
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); 
    $author_sign = get_theme_mod( 'author_signature', '' );
    $ed_toggle_social = get_theme_mod( 'ed_toggle_social', false ); 
    $alignment_signature = get_theme_mod( 'alignment_signature', 'center' );
    $home_layout    = get_theme_mod( 'home_layout', 'three' );

    if( ( is_front_page() || is_home() ) && ( $home_layout == 'five' || $home_layout == 'six' ) && $wp_query->current_post != 0 ) return false; ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt ){
                the_content();    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cookery' ),
    				'after'  => '</div>',
    			) );
            }else{
                the_excerpt();
            }

            if( is_singular( 'post' ) && $author_sign ) {
                echo '<div class="author-signature ' . esc_attr( $alignment_signature ) . '">';                          
                echo '<img src="' . esc_url( $author_sign ) . '" alt="' . esc_attr__( 'author-sign', 'cookery' ) . '">';
                if( $ed_toggle_social ) cookery_social_links();
                echo '</div>';
            }
		?>
	</div><!-- .entry-content -->
    <?php
}
endif;
add_action( 'cookery_page_entry_content', 'cookery_entry_content', 15 );
add_action( 'cookery_post_entry_content', 'cookery_entry_content', 15 );
add_action( 'cookery_single_entry_content', 'cookery_entry_content', 15 );

if( ! function_exists( 'cookery_entry_footer' ) ) :
/**
 * Entry Footer
*/
function cookery_entry_footer(){ 
    global $wp_query;
    $readmore       = get_theme_mod( 'read_more_text', __( 'Read More', 'cookery' ) );
    $home_layout    = get_theme_mod( 'home_layout', 'three' ); 
    $home_array = array( 'one', 'two', 'three', 'four', 'seven', 'eight', 'nine' ); 
    if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) ) return false; ?>
	<footer class="entry-footer">
		<?php

            if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) {
                if( in_array( $home_layout, $home_array ) || ( $home_layout == 'five' || $home_layout == 'six' ) && $wp_query->current_post == 0 ) cookery_posted_by();
                cookery_prep_time();
                cookery_difficulty_level();
                if( ( $home_layout == 'five' || $home_layout == 'six' ) && $wp_query->current_post != 0 ) cookery_recipe_rating();
            }

            if( is_singular( 'post' ) ){
                cookery_tag();
            }
                
            if( is_home() || is_archive() || is_search() ){
                if( !( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) ) {
                    echo '<a href="' . esc_url( get_the_permalink() ) . '" class="btn-readmore">' . esc_html( $readmore ) . '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"/><path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"/></g></svg></a>';
                }   
            }
            
            if( get_edit_post_link() ){
                edit_post_link(
                sprintf(
                	wp_kses(
                		/* translators: %s: Name of current post. Only visible to screen readers */
                		__( 'Edit <span class="screen-reader-text">%s</span>', 'cookery' ),
                		array(
                			'span' => array(
                				'class' => array(),
                			),
                		)
                	),
                	get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
                );
            }
		?>
	</footer><!-- .entry-footer -->
	<?php 
}
endif;
add_action( 'cookery_page_entry_content', 'cookery_entry_footer', 20 );
add_action( 'cookery_post_entry_content', 'cookery_entry_footer', 20 );
add_action( 'cookery_single_entry_content', 'cookery_entry_footer', 20 );

if( ! function_exists( 'cookery_navigation' ) ) :
/**
 * Navigation
*/
function cookery_navigation(){
    
    if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) ) return false;
    
    if( is_single() ){
        
        $next_post = get_next_post();
        $prev_post = get_previous_post();

        if( $prev_post || $next_post ) { ?>            
            <nav class="navigation post-navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'cookery' ); ?></h2>
    			<div class="nav-links">
    				<?php if( $prev_post ){ ?>
                        <div class="nav-previous">
                            <figure class="post-img">
                                <?php
                                $prev_img = get_post_thumbnail_id( $prev_post->ID );
                                if( $prev_img ){
                                    $prev_url = wp_get_attachment_image_url( $prev_img, 'thumbnail' );
                                    echo '<img src="' . esc_url( $prev_url ) . '" alt="' . the_title_attribute( 'echo=0', $prev_post ) . '">';                                        
                                }else{
                                    cookery_get_fallback_svg( 'thumbnail' );
                                }
                                ?>
                            </figure>
                            <div class="nav-block">
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
                                    <span class="post-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                                    <span class="meta-nav"><svg xmlns="http://www.w3.org/2000/svg" width="14.796" height="10.354" viewBox="0 0 14.796 10.354"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l4.117,4.116-4.117,4.116" transform="translate(-7811.241 1126.021)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"></path><path d="M6555.283-354.415h-12.624" transform="translate(-6542.659 358.532)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"></path></g></svg><?php esc_html_e( 'Previous Post', 'cookery' ); ?></span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if( $next_post ){ ?>
                        <div class="nav-next">
                            <figure class="post-img">
                                <?php
                                $next_img = get_post_thumbnail_id( $next_post->ID );
                                if( $next_img ){
                                    $next_url = wp_get_attachment_image_url( $next_img, 'thumbnail' );
                                    echo '<img src="' . esc_url( $next_url ) . '" alt="' . the_title_attribute( 'echo=0', $next_post ) . '">';                                        
                                }else{
                                    cookery_get_fallback_svg( 'thumbnail' );
                                }
                                ?>
                            </figure>
                            <div class="nav-block">
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
                                    <span class="post-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                                    <span class="meta-nav"><?php esc_html_e( 'Next Post', 'cookery' ); ?><svg xmlns="http://www.w3.org/2000/svg" width="14.796" height="10.354" viewBox="0 0 14.796 10.354"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l4.117,4.116-4.117,4.116" transform="translate(-7811.241 1126.021)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"></path><path d="M6555.283-354.415h-12.624" transform="translate(-6542.659 358.532)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"></path></g></svg></span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
    			</div>
    		</nav>        
            <?php
        }
    }else{
        $pagination = get_theme_mod( 'pagination_type', 'numbered' );
        
        switch( $pagination ){
            case 'default': // Default Pagination
            
            the_posts_navigation();
            
            break;
            
            case 'numbered': // Numbered Pagination
            
            the_posts_pagination( array(
                'prev_text'          => __( 'Prev', 'cookery' ) . '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689">
                                    <g transform="translate(17.729 11.628) rotate(180)">
                                        <path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none"
                                            stroke="#374757" stroke-linecap="round" stroke-width="1.5" />
                                        <path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#374757"
                                            stroke-linecap="round" stroke-width="1.5" />
                                    </g>
                                </svg>',
                'next_text'          => __( 'Next', 'cookery' ) . '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689"><g transform="translate(0.75 1.061)">
                                        <path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none"
                                            stroke="#374757" stroke-linecap="round" stroke-width="1.5" />
                                        <path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#374757"
                                            stroke-linecap="round" stroke-width="1.5" />
                                    </g>
                                </svg>',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cookery' ) . ' </span>',
            ) );
            
            break;
            
            case 'load_more': // Load More Button
            case 'infinite_scroll': // Auto Infinite Scroll
            
            echo '<div class="pagination-nav"></div>';
            
            break;
            
            default:
            
            the_posts_navigation();
            
            break;
        }        
    }
}
endif;
add_action( 'cookery_after_post_content', 'cookery_navigation', 15 );
add_action( 'cookery_after_posts_content', 'cookery_navigation' );

if( ! function_exists( 'cookery_get_ad_before_content' ) ) :
/**
 * Get AD before single content
*/
function cookery_get_ad_before_content(){
    $ed_ad      = get_theme_mod( 'ed_before_content_ad_control' ); //from customizer
    $ad_img     = get_theme_mod( 'before_content_post_ad' ); //from customizer
    $ad_link    = get_theme_mod( 'before_content_post_ad_link' ); //from customizer
    $target     = get_theme_mod( 'open_link_diff_tab_before_content_post', true ) ? 'target="_blank"' : '';
    $ed_ad_code = get_theme_mod( 'ed_before_content_ad_code_control' );
    $ad_code    = get_theme_mod( 'before_content_ad_code_control' ); 
        
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_ad && ( is_single() && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) ) 
    cookery_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
    
if( ! function_exists( 'cookery_get_ad_after_content' ) ) :
/**
 * Get AD after single content
*/
function cookery_get_ad_after_content(){
    $ed_ad      = get_theme_mod( 'ed_after_content_ad_control' ); //from customizer
    $ad_img     = get_theme_mod( 'after_content_post_ad' ); //from customizer
    $ad_link    = get_theme_mod( 'after_content_post_ad_link' ); //from customizer
    $target     = get_theme_mod( 'open_link_diff_tab_after_content_post', true ) ? 'target="_blank"' : '';
    $ed_ad_code = get_theme_mod( 'ed_after_content_ad_code_control' );
    $ad_code    = get_theme_mod( 'after_content_ad_code_control' ); 
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_ad && ( is_single() && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) ) 
    cookery_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;

add_action( 'cookery_after_post_content', 'cookery_get_ad_after_content', 5 );

if( ! function_exists( 'cookery_author' ) ) :
/**
 * Author Section
*/
function cookery_author(){ 
    
    if( is_delicious_recipe_activated() && is_singular( DELICIOUS_RECIPE_POST_TYPE ) ) return false;
    
    $ed_author    = get_theme_mod( 'ed_author', false );
    $author_title = get_the_author();
    if( ! $ed_author && get_the_author_meta( 'description' ) ){ ?>
    <div class="author-block">
		<div class="author-img-wrap">
            <figure class="author-img"><?php echo cookery_gravatar( get_the_author_meta( 'ID' ), 280 ); ?></figure>
            <?php 
                if( $author_title ) echo '<h2 class="author-name">' . esc_html( $author_title ) . '</h2>'; 
                cookery_author_social();    
            ?>
        </div>
		<div class="author-desc">
			<?php 
                echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) );
            ?>		
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'cookery_after_post_content', 'cookery_author', 25 );

if( ! function_exists( 'cookery_newsletter' ) ) :
/**
 * Newsletter
*/
function cookery_newsletter(){ 
    $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
    $newsletter    = get_theme_mod( 'newsletter_shortcode' );
    $enable_at_bottom = get_theme_mod( 'ed_bottom_newsletter', true );
    if( $ed_newsletter && $newsletter && $enable_at_bottom ){ ?>
        <div class="newsletter">
            <?php echo do_shortcode( $newsletter ); ?>
        </div>
        <?php
    }
}
endif;
add_action( 'cookery_after_post_content', 'cookery_newsletter', 30 );

if( ! function_exists( 'cookery_related_posts' ) ) :
/**
 * Related Posts 
*/
function cookery_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );
    
    if( $ed_related_post ){
        cookery_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'cookery_after_post_content', 'cookery_related_posts', 35 );

if( ! function_exists( 'cookery_latest_posts' ) ) :
/**
 * Latest Posts
*/
function cookery_latest_posts(){ 
    cookery_get_posts_list( 'latest' );
}
endif;
add_action( 'cookery_latest_posts', 'cookery_latest_posts' );

if( ! function_exists( 'cookery_comment' ) ) :
/**
 * Comments Template 
*/
function cookery_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( get_theme_mod( 'ed_comments', true ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'cookery_after_post_content', 'cookery_comment', cookery_comment_toggle() );
add_action( 'cookery_after_page_content', 'cookery_comment' );

if( ! function_exists( 'cookery_content_end' ) ) :
/**
 * Content End
*/
function cookery_content_end(){ ?>      
        </div>
    </div><!-- .site-content -->
    <?php
}
endif;
add_action( 'cookery_before_footer', 'cookery_content_end', 20 );

if( ! function_exists( 'cookery_cta_section' ) ) :
/**
 * CTA Section 
*/
function cookery_cta_section(){
    if( ( is_front_page() || is_home() ) && is_active_sidebar( 'cta' ) ){ ?>
        <section id="cta_section" class="cta-section">
            <?php dynamic_sidebar( 'cta' ); ?>
        </section> <!-- .cta-section -->
    <?php
    }  
}
endif;
add_action( 'cookery_before_footer', 'cookery_cta_section', 25 );

if( ! function_exists( 'cookery_video_section' ) ) :
/**
 * Video Section 
*/
function cookery_video_section(){
    $ed_video_section     = get_theme_mod( 'ed_video_section', true );
    $video_title          = get_theme_mod( 'video_title', __( 'Watch This', 'cookery' ) );
    $video_subtitle       = get_theme_mod( 'video_subtitle' );
    $video_content        = get_theme_mod( 'video_content' );
    $video_readmore       = get_theme_mod( 'video_readmore' );
    $video_readmore_url   = get_theme_mod( 'video_readmore_url' );
    $video_url            = get_theme_mod( 'video_section_url' );
    $video_subscribe      = get_theme_mod( 'video_subscribe_text' );
    $video_subscribe_url  = get_theme_mod( 'video_subscribe_url' );

    if( ( is_front_page() || is_home() ) && $ed_video_section && $video_url ) : ?>
        <section id="video_section" class="video-section">
            <div class="container">
                <div class="section-grid">
                    <?php if( $video_title ) : ?>
                        <header class="section-header">
                            <?php echo '<h2 class="section-title">' . esc_html( $video_title ) . '</h2>'; ?>
                        </header>
                    <?php endif; ?>
                    <div class="section-block">
                        <?php if( $video_subtitle || $video_content || ( $video_readmore && $video_readmore_url ) ) : ?>
                            <div class="section-content-wrap">
                                <?php if( $video_subtitle ) echo '<h3 class="block-title">' . esc_html( $video_subtitle ) . '</h3>'; ?>
                                <?php if( $video_content ) echo '<div class="section-content">' . wp_kses_post( wpautop( $video_content ) ) . '</div>'; ?>
                                <?php if( $video_readmore && $video_readmore_url ) : ?>
                                    <div class="button-wrap">
                                        <a href="<?php echo esc_url( $video_readmore_url ); ?>" class="btn-readmore">
                                            <?php echo esc_html( $video_readmore ); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689">
                                                <g transform="translate(0.75 1.061)">
                                                    <path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none"
                                                        stroke="#232323" stroke-linecap="round" stroke-width="1.5" />
                                                    <path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323"
                                                        stroke-linecap="round" stroke-width="1.5" />
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="block-img">
                           <?php echo htmlspecialchars_decode( stripslashes( $video_url ) ); ?>
                        </div>
                        <?php if( $video_subscribe && $video_subscribe_url ) : ?>
                            <div class="button-sub-wrap">
                                <a href="<?php echo esc_url( $video_subscribe_url ); ?>" class="btn-sub">
                                    <i class="fab fa-youtube"></i>
                                    <?php echo esc_html( $video_subscribe ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section> <!-- .video-section -->
    <?php
    endif;
}
endif;
add_action( 'cookery_before_footer', 'cookery_video_section', 30 );

if( ! function_exists( 'cookery_featured_recipe_section' ) ) :
/**
 * Featured Recipe Section 
*/
function cookery_featured_recipe_section(){
    
    $fr_enable     = get_theme_mod( 'featured_recipe_enable', true );

    if( $fr_enable && is_delicious_recipe_activated() && ( is_front_page() || is_home() ) ) :

        $fr_title     = get_theme_mod( 'feature_recipe_title', __( 'Featured Recipes', 'cookery' ) );
        $fr_content   = get_theme_mod( 'feature_recipe_subtitle' );
        $number_posts   = get_theme_mod( 'feature_recipe_post', 5 );
        $fr_layout   = get_theme_mod( 'featured_recipe_layout', 'one' );
        $array_title = array();

        $args = array(
            'post_type'           => DELICIOUS_RECIPE_POST_TYPE,
            'posts_per_page'      => $number_posts,
            'ignore_sticky_posts' => true,
            'meta_query'     => array(
                array(
                    'key'   => 'wp_delicious_featured_recipe',
                    'value' => 'yes'
                )
            ),
        );

        $qry = new WP_Query( $args );

        if( $qry->have_posts() ) : ?>
            <section id="featured_recipe_section" class="featured-recipe-section style-<?php echo esc_attr( $fr_layout ); ?>"<?php if( $fr_layout == 'five' ) echo ' data-slider-id="1"';?>>
                <?php if( $fr_title || $fr_content ) : ?>
                    <header class="section-header">
                        <div class="container">
                            <?php if( $fr_title ) echo '<h2 class="section-title">' . esc_html( $fr_title ) . '</h2>';
                            if( $fr_content ) echo '<div class="section-desc">' . wp_kses_post( wpautop( $fr_content ) ) . '</div>'; ?>
                        </div>
                    </header>
                <?php endif; ?>
                <?php if( $fr_layout == 'three' || $fr_layout == 'five' ) echo '<div class="container">'; ?>
                <div class="section-grid owl-carousel">
                    <?php while( $qry->have_posts() ) { $qry->the_post(); ?>
                        <div class="section-block">
                            <div class="block-img">
                                <?php if( has_post_thumbnail() ) : 
                                    the_post_thumbnail( 'cookery-featured-recipe' ); 
                                else:
                                    cookery_get_fallback_svg( 'cookery-featured-recipe' );
                                endif; ?>
                            </div>
                            <div class="block-content">
                                <?php 
                                the_title( '<h3 class="block-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                                echo '<div class="block-meta">';
                                cookery_recipe_keywords();
                                cookery_prep_time();
                                cookery_difficulty_level();
                                echo '</div>';
                                if( $fr_layout == 'five' ){
                                    $array_title[] = esc_html( get_the_title() );
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if( $fr_layout == 'five' ) : ?>
                    <div class="owl-thumbs" data-slider-id="1">
                        <?php foreach( $array_title as $a_title ) {
                            echo '<button class="owl-thumb-item">' . esc_html( $a_title ) . '</button>';
                        } ?>
                    </div>
                <?php endif; ?>
                <?php if( $fr_layout == 'three' || $fr_layout == 'five' ) echo '</div>'; ?>
            </section> <!-- .video-section -->
        <?php
        endif;
    endif;
}
endif;
add_action( 'cookery_before_footer', 'cookery_featured_recipe_section', 35 );

if( ! function_exists( 'cookery_browse_category_section' ) ) :
/**
 * Browse Category Section 
*/
function cookery_browse_category_section(){

    $bc_enable     = get_theme_mod( 'browse_category_enable', true );

    if( $bc_enable && is_delicious_recipe_activated() && ( is_front_page() || is_home() ) ) :

        $bc_title     = get_theme_mod( 'browse_category_title', __( 'Browse Recipes By Category', 'cookery' ) );
        $bc_content   = get_theme_mod( 'browse_category_subtitle' );
        $show_counts  = get_theme_mod( 'show_counts', false );

        $have_taxonomy    = get_theme_mod( 'browse_category_type', 'recipe-course' );
        $have_categories  = '';
        
        if( $have_taxonomy == 'recipe-course' ){
            $have_categories     = get_theme_mod( 'browse_cat_course' );
        }elseif( $have_taxonomy == 'recipe-cuisine' ){
            $have_categories     = get_theme_mod( 'browse_cat_cuisine' );
        }elseif( $have_taxonomy == 'recipe-cooking-method' ){
            $have_categories     = get_theme_mod( 'browse_cat_cookmethod' );
        }

        if( $have_categories ) : ?>
            <section id="browse_category_section" class="browse-category-section">
                <div class="container">
                    <div class="browse-category-wrap">
                        <?php if( $bc_title || $bc_content ) : ?>
                            <header class="section-header">
                                <?php if( $bc_title ) echo '<h2 class="section-title">' . esc_html( $bc_title ) . '</h2>';
                                if( $bc_content ) echo '<div class="section-desc">' . wp_kses_post( wpautop( $bc_content ) ) . '</div>'; ?>
                            </header>
                        <?php endif; ?>
                        <div class="category-list">
                            <ul>
                                <?php foreach ( $have_categories as $value ) {
                
                                    $category = get_term( $value, $have_taxonomy );
                                    
                                    if( empty( $category ) && is_wp_error( $category ) ) {
                                        return;
                                    }

                                    $recipe_key_metas = get_term_meta( $category->term_id, 'dr_taxonomy_metas', true );
                                    $key_image        = isset( $recipe_key_metas['taxonomy_image'] ) ? $recipe_key_metas['taxonomy_image'] : false;

                                    ?>
                                    <li>
                                        <?php $image_thumb = wp_get_attachment_image_url( $key_image, 'cookery-blog-list-square', '', array( "alt" => "recipe-course" ) ); ?>

                                        <a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>" style="background-image:url('<?php echo esc_url( $image_thumb ); ?>')">

                                            <div class="cat-title-wrap">
                                                <span class="title"><?php echo esc_html( $category->name ); ?></span>
                                                <?php if( $show_counts ) { ?>
                                                    <span class="dr-cat-count"><?php echo esc_html( $category->count ); ?></span>
                                                <?php } ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section> <!-- .video-section -->
        <?php endif;
    endif;
}
endif;
add_action( 'cookery_before_footer', 'cookery_browse_category_section', 40 );

if( ! function_exists( 'cookery_recipe_index_section' ) ) :
/**
 * Recipe Index Section 
*/
function cookery_recipe_index_section(){
    
    $ri_enable     = get_theme_mod( 'recipe_index_enable', true );

    if( $ri_enable && is_delicious_recipe_activated() && ( is_front_page() || is_home() ) ) :

        $ri_title     = get_theme_mod( 'recipe_index_title', __( 'Recipe Index', 'cookery' ) );
        $ri_content   = get_theme_mod( 'recipe_index_content' );
        $recipe_indexes   = get_theme_mod( 'recipe_indexes_list' );

        if( isset( $recipe_indexes ) && $recipe_indexes ) : ?>
            <section id="recipe_index_section" class="recipe-index-section">
                <div class="container">
                    <div class="browse-category-wrap">
                        <?php if( $ri_title || $ri_content ) : ?>
                            <header class="section-header">
                                <?php if( $ri_title ) echo '<h2 class="section-title">' . esc_html( $ri_title ) . '</h2>';
                                if( $ri_content ) echo '<div class="section-desc">' . wp_kses_post( wpautop( $ri_content ) ) . '</div>'; ?>
                            </header>
                        <?php endif; ?>
                        <div class="section-grid">
                            <?php foreach ( $recipe_indexes as $recipe_index ) {
                                cookery_get_category_list( $recipe_index['cat_id'], $recipe_index['title'], $recipe_index['btn_label'], $recipe_index['based_on'], $recipe_index['number_posts'] );
                            } ?>
                        </div>
                    </div>
                </div>
            </section> <!-- .video-section -->
        <?php
        endif;
    endif;
}
endif;
add_action( 'cookery_before_footer', 'cookery_recipe_index_section', 42 );

if( ! function_exists( 'cookery_client_section' ) ) :
/**
 * Client Section 
*/
function cookery_client_section(){
    if( ( is_front_page() || is_home() ) && is_active_sidebar( 'client' ) ){ ?>
        <section id="client_section" class="client-section">
            <div class="container">
                <?php dynamic_sidebar( 'client' ); ?>
            </div>
        </section> <!-- .client-section -->
    <?php
    }  
}
endif;
add_action( 'cookery_before_footer', 'cookery_client_section', 45 );

if( ! function_exists( 'cookery_footer_newsletter_section' ) ) :
/**
 * Footer Newsletter Section 
*/
function cookery_footer_newsletter_section(){
    $ed_newsletter = get_theme_mod( 'ed_newsletter_section', false );
    $newsletter    = get_theme_mod( 'newsletter_section_shortcode' );
    if( !is_single() && $ed_newsletter && $newsletter ){ ?>
        <section id="footer_newsletter_section" class="footer-newsletter-section">
            <?php echo do_shortcode( wp_kses_post( $newsletter ) ); ?>
        </section> <!-- .client-section -->
    <?php
    }  
}
endif;
add_action( 'cookery_before_footer', 'cookery_footer_newsletter_section', 50 );

if( ! function_exists( 'cookery_instagram_section' ) ) :
/**
 * Instagram Section
*/
function cookery_instagram_section(){ 

    $ed_instagram = get_theme_mod( 'ed_instagram', false );
    $insta_code   = get_theme_mod('instagram_shortcode', '[instagram-feed]' );
    if( $ed_instagram ){
        echo '<div id="instagram_section" class="instagram-section">' . do_shortcode( $insta_code ) . '</div>';
    }
    
}
endif;
add_action( 'cookery_before_footer', 'cookery_instagram_section', 55 );

if( ! function_exists( 'cookery_footer_start' ) ) :
/**
 * Footer Start
*/
function cookery_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'cookery_footer', 'cookery_footer_start', 20 );

if( ! function_exists( 'cookery_footer_top' ) ) :
/**
 * Footer Top
*/
function cookery_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }
                 
    if( $active_sidebars ){ ?>
        <div class="footer-top">
    		<div class="container">
    			<div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                <?php foreach( $active_sidebars as $active ){ ?>
    				<div class="col">
    				   <?php dynamic_sidebar( $active ); ?>	
    				</div>
                <?php } ?>
                </div>
    		</div>
    	</div>
        <?php 
    }   
}
endif;
add_action( 'cookery_footer', 'cookery_footer_top', 30 );

if( ! function_exists( 'cookery_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function cookery_footer_bottom(){ ?>
    <div class="footer-bottom">
		<div class="container">
			<div class="site-info">            
            <?php
                cookery_get_footer_copyright();
                cookery_ed_author_link();
                cookery_ed_wp_link();
                if( function_exists( 'the_privacy_policy_link' ) ){
                    the_privacy_policy_link();
                }
            ?>               
            </div>
            <div class="footer-menu">
                <?php cookery_footer_navigation(); ?>
            </div>
            <button class="back-to-top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M6.101 359.293L25.9 379.092c4.686 4.686 12.284 4.686 16.971 0L224 198.393l181.13 180.698c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 132.908c-4.686-4.686-12.284-4.686-16.971 0L6.101 342.322c-4.687 4.687-4.687 12.285 0 16.971z"></path>
                </svg>
            </button><!-- .back-to-top -->
		</div>
	</div>
    <?php
}
endif;
add_action( 'cookery_footer', 'cookery_footer_bottom', 40 );

if( ! function_exists( 'cookery_footer_disclaimer' ) ) :
/**
 * Footer Bottom
*/
function cookery_footer_disclaimer(){ 
    $footer_disclaimer = get_theme_mod( 'footer_disclaimer' ); 
    if( $footer_disclaimer ) : ?>
        <div class="footer-disclaimer">
            <div class="container">
                <?php echo wp_kses_post( wpautop( $footer_disclaimer ) ); ?>
            </div>
        </div>
        <?php
    endif;
}
endif;
add_action( 'cookery_footer', 'cookery_footer_disclaimer', 45 );

if( ! function_exists( 'cookery_footer_end' ) ) :
/**
 * Footer End 
*/
function cookery_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'cookery_footer', 'cookery_footer_end', 50 );

if( ! function_exists( 'cookery_page_end' ) ) :
/**
 * Page End
*/
function cookery_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'cookery_after_footer', 'cookery_page_end', 20 );