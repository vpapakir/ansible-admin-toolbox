<?php
/**
 * Cookery Custom functions and definitions
 *
 * @package Cookery
 */

/**
 * Show/Hide Admin Bar in frontend.
*/
if( ! get_theme_mod( 'ed_adminbar', true ) ) add_filter( 'show_admin_bar', '__return_false' );

if ( ! function_exists( 'cookery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cookery_setup() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cookery, use a find and replace
	 * to change 'cookery' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cookery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'cookery' ),
        'secondary' => esc_html__( 'Secondary', 'cookery' ),
        'footer'    => esc_html__( 'Footer', 'cookery' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cookery_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 
        'custom-logo', 
        array( 
            'header-text' => array( 'site-title', 'site-description' ) 
        )
    );
    
    /**
     * Add support for custom header.
    */
    add_theme_support( 
        'custom-header', 
        apply_filters( 
            'cookery_custom_header_args', 
            array(
                'default-image' => '',
                'video'         => true,
                'width'         => 1920,
                'height'        => 760,
                'flex-height'   => true,
                'flex-width'    => true,
                'header-text'   => false
            ) 
        ) 
    );

    // Register default headers.
    register_default_headers( array(
        'default-banner' => array(
            'url'           => '%s/images/static-banner-with-search.jpg',
            'thumbnail_url' => '%s/images/static-banner-with-search.jpg',
            'description'   => esc_html_x( 'Default Banner', 'header image description', 'cookery' ),
        ),
    ) );

    /**
     * Add support for Delicious Recipes Plugin.
    */
    add_theme_support('delicious_recipes');
 
    /**
     * Add Custom Images sizes.
    */    
    add_image_size( 'cookery-schema', 600, 60, true );
    add_image_size( 'cookery-slider', 480, 640 , true );
    add_image_size( 'cookery-slider-full', 1920, 640, true );
    add_image_size( 'cookery-featured-recipe', 384, 512, true );
    add_image_size( 'cookery-blog', 286, 382, true );
    add_image_size( 'cookery-blog-classic-lg', 768, 1024, true );
    add_image_size( 'cookery-blog-list-lg', 768, 768, true );
    add_image_size( 'cookery-blog-list-square', 307, 307, true );
    add_image_size( 'cookery-blog-grid', 358, 478, true );
    add_image_size( 'cookery-blog-grid-full', 568, 756, true );
    add_image_size( 'cookery-blog-large', 1214, 1214, true );
    add_image_size( 'cookery-blog-archive', 307, 410, true );
    add_image_size( 'cookery-blog-single-two', 509, 572, true );
    add_image_size( 'cookery-promo', 366, 231, true );
    add_image_size( 'cookery-single', 768, 500, true );
    add_image_size( 'cookery-single-two', 1220, 600, true );
    add_image_size( 'cookery-related', 384, 512, true );
    
    // Add theme support for Responsive Videos.
    add_theme_support( 'jetpack-responsive-videos' );

    // Add excerpt support for pages
    add_post_type_support( 'page', 'excerpt' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );
        
    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     *
     */
    add_editor_style( array(
            'css' . $build . '/editor-style' . $suffix . '.css',
            cookery_fonts_url()
        )
    );

    // Add support for block editor styles.
    add_theme_support( 'wp-block-styles' );

    // Remove widget block.
    remove_theme_support( 'widgets-block-editor' );
}
endif;
add_action( 'after_setup_theme', 'cookery_setup' );

if( ! function_exists( 'cookery_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cookery_content_width() {
	
    $GLOBALS['content_width'] = apply_filters( 'cookery_content_width', 814 );
}
endif;
add_action( 'after_setup_theme', 'cookery_content_width', 0 );

if( ! function_exists( 'cookery_template_redirect_content_width' ) ) :
/**
* Adjust content_width value according to template.
*
* @return void
*/
function cookery_template_redirect_content_width(){
	$sidebar = cookery_sidebar();
    if( $sidebar ){	   
        
        $GLOBALS['content_width'] = 814;      
	}else{
        if( is_singular() ){
            if( cookery_sidebar( true ) === 'full-width centered' ){
                $GLOBALS['content_width'] = 814;
            }else{
                $GLOBALS['content_width'] = 1218;               
            }                
        }else{
            $GLOBALS['content_width'] = 1218;
        }
	}
}
endif;
add_action( 'template_redirect', 'cookery_template_redirect_content_width' );

if( ! function_exists( 'cookery_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function cookery_scripts() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    $ed_googlefont_local = get_theme_mod( 'ed_googlefont_local', false );
    
    if( cookery_is_woocommerce_activated() )
    wp_enqueue_style( 'cookery-woocommerce', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', array(), COOKERY_THEME_VERSION );
    
    if ( get_theme_mod( 'ed_localgoogle_fonts', false ) && ! is_customize_preview() && ! is_admin() && get_theme_mod( 'ed_preload_local_fonts', false ) ) {
        cookery_preload_local_fonts( cookery_fonts_url() );
    }
    wp_enqueue_style( 'cookery-google-fonts', cookery_fonts_url(), array(), null );

    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.3.4' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css' . $build . '/animate' . $suffix . '.css', array(), '3.5.2' );
    wp_enqueue_style( 'cookery', get_stylesheet_uri(), array(), COOKERY_THEME_VERSION );
    
    if( cookery_is_elementor_activated() ){
        wp_enqueue_style( 'cookery-elementor', get_template_directory_uri(). '/css' . $build . '/elementor' . $suffix . '.css', array(), COOKERY_THEME_VERSION );
    }
    
    wp_enqueue_style( 'cookery-gutenberg', get_template_directory_uri(). '/css' . $build . '/gutenberg' . $suffix . '.css', array(), COOKERY_THEME_VERSION );
    
    if( get_theme_mod( 'ed_lazy_load', false ) || get_theme_mod( 'ed_lazy_load_cimage', false ) || get_theme_mod( 'ed_lazyload_gravatar', false ) ) {
        wp_enqueue_script( 'layzr', get_template_directory_uri() . '/js' . $build . '/layzr' . $suffix . '.js', array('jquery'), '2.0.4', true );
    }
        
    //Fancy Box
    if( get_theme_mod( 'ed_lightbox', false ) ){
        wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css' . $build . '/jquery.fancybox' . $suffix . '.css', array(), '3.5.7' );
        wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js' . $build . '/jquery.fancybox' . $suffix . '.js', array('jquery'), '3.5.7', true );
    }
    
    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '6.1.1', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery', 'all' ), '6.1.1', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.3.4', true );
    wp_enqueue_script( 'owlcarousel2-a11ylayer', get_template_directory_uri() . '/js' . $build . '/owlcarousel2-a11ylayer' . $suffix . '.js', array( 'jquery', 'owl-carousel' ), '0.2.1', true );
	wp_enqueue_script( 'cookery', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery', 'masonry' ), COOKERY_THEME_VERSION, true );
    
    $array = array( 
        'rtl'           => is_rtl(),
        'auto'          => (bool) get_theme_mod( 'slider_auto', true ),
        'loop'          => (bool) get_theme_mod( 'slider_loop', true ),
        'animation'     => esc_attr( get_theme_mod( 'slider_animation' ) ),
        'speed'         => absint( get_theme_mod( 'slider_speed', 5000 ) ),
        'h_layout'      => esc_attr( get_theme_mod( 'header_layout', 'one' ) ),
        'lightbox'      => (bool) get_theme_mod( 'ed_lightbox', false ),
        'drop_cap'      => (bool) get_theme_mod( 'ed_drop_cap', false ),
        'sticky'        => (bool) get_theme_mod( 'ed_sticky_header', false ),
        'sticky_widget' => (bool) get_theme_mod( 'ed_last_widget_sticky', false ),
        'ri_carousel'   => (bool) get_theme_mod( 'recipe_index_carousel_enable', false ),
    );
    
    wp_localize_script( 'cookery', 'cookery_data', $array );
    
    $pagination = get_theme_mod( 'pagination_type', 'numbered' );
    $loadmore   = get_theme_mod( 'load_more_label', __( 'Load More Posts', 'cookery' ) );
    $loading    = get_theme_mod( 'loading_label', __( 'Loading...', 'cookery' ) );
    $nomore     = get_theme_mod( 'no_more_label', __( 'No More Post', 'cookery' ) );
    $home_layout = get_theme_mod( 'home_layout', 'three' );
       
    // Add parameters for the JS
    global $wp_query;
    $max = $wp_query->max_num_pages;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    
    wp_enqueue_script( 'cookery-ajax', get_template_directory_uri() . '/js' . $build . '/ajax' . $suffix . '.js', array('jquery'), COOKERY_THEME_VERSION, true );
    
    wp_localize_script( 
        'cookery-ajax', 
        'cookery_ajax',
        array(
            'url'        => admin_url( 'admin-ajax.php' ),
            'startPage'  => $paged,
            'maxPages'   => $max,
            'nextLink'   => next_posts( $max, false ),
            'autoLoad'   => $pagination,
            'loadmore'   => $loadmore,
            'loading'    => $loading,
            'nomore'     => $nomore,
            'plugin_url' => plugins_url(),
            's_layout'   => get_theme_mod( 'static_search_layout', 'one' ),
            'homepage_layout' => $home_layout,              
        )
    );
    
    if ( is_jetpack_activated( true ) ) {
        wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' );            
    }
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'cookery_scripts' );

if( ! function_exists( 'cookery_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function cookery_admin_scripts( $hook ){
    wp_enqueue_style( 'cookery-admin', get_template_directory_uri() . '/inc/css/admin.css', '', COOKERY_THEME_VERSION );
    if( $hook == 'post-new.php' || $hook == 'post.php' || $hook == 'user-new.php' || $hook == 'user-edit.php' || $hook == 'profile.php' ){
        wp_enqueue_script( 'cookery-admin', get_template_directory_uri() . '/inc/js/admin.js', array( 'jquery', 'jquery-ui-sortable' ), COOKERY_THEME_VERSION, false );
    }
}
endif; 
add_action( 'admin_enqueue_scripts', 'cookery_admin_scripts' );

if( ! function_exists( 'cookery_block_editor_styles' ) ) :
/**
 * Enqueue editor styles for Gutenberg
 */
function cookery_block_editor_styles() {
    // Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    
    // Block styles.
    wp_enqueue_style( 'cookery-block-editor-style', get_template_directory_uri() . '/css' . $build . '/editor-block' . $suffix . '.css' );

    wp_add_inline_style( 'cookery-block-editor-style', cookery_gutenberg_inline_style() );

    // Add custom fonts.
    wp_enqueue_style( 'cookery-google-fonts', cookery_fonts_url(), array(), null );
}
endif;
add_action( 'enqueue_block_editor_assets', 'cookery_block_editor_styles' );

if( ! function_exists( 'cookery_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cookery_body_classes( $classes ) {
	$bg_pattern = get_theme_mod( 'bg_pattern', 'nobg' );
    $bg         = get_theme_mod( 'body_bg', 'image' );
    $editor_options = get_option( 'classic-editor-replace' );
    $allow_users_options = get_option( 'classic-editor-allow-users' );
    $sticky_widget = get_theme_mod( 'ed_last_widget_sticky', false );
    $single_layout = cookery_single_meta_layout();

    //adds a class to body when last widget sticky is enabled
    if( $sticky_widget ) {
        $classes[] = 'last-widget-sticky';
    }
    
    // Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // Adds a class of custom-background-image to sites with a custom background image.
	if( $bg == 'pattern' && $bg_pattern != 'nobg' ){
		$classes[] = 'custom-background-image custom-background';
	}
    
    if( $bg == 'image' && get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if ( is_singular() && ( !is_classic_editor_activated() || ( is_classic_editor_activated() && $editor_options == 'block' ) || ( is_classic_editor_activated() && $allow_users_options == 'allow' && has_blocks() ) ) ) {
        $classes[] = 'cookery-has-blocks';
    }

    if( is_home() ) {
        $classes[] = cookery_add_home_class();
    }

    if( is_delicious_recipe_activated() ){
        if( is_singular( DELICIOUS_RECIPE_POST_TYPE ) ) {
            $classes[] = 'single-recipe-' . get_theme_mod( 'single_recipe_layout', 'one' );
        }else{
            $classes[] = 'delicious-recipe-activated';
        }
    }

    if( is_singular( 'post' ) ) {
        $classes[] = 'single-post-' . $single_layout;
    }
    
    if( is_archive() || is_search() ) {
        $classes[] = 'list-with-all-tall-img';
    }

    $classes[] = cookery_sidebar( true );

    $classes[] = 'cookery-theme';
    
	return $classes;
}
endif;
add_filter( 'body_class', 'cookery_body_classes' );

if( ! function_exists( 'cookery_post_classes' ) ) :
/**
 * Add custom classes to the array of post classes.
*/
function cookery_post_classes( $classes ){
    
    $classes[] = 'latest_post';
    
    return $classes;
}
endif;
add_filter( 'post_class', 'cookery_post_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cookery_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cookery_pingback_header' );

if( ! function_exists( 'cookery_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function cookery_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'cookery' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'cookery' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'cookery' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'cookery' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'cookery' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'cookery' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'cookery_change_comment_form_default_fields' );

if( ! function_exists( 'cookery_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function cookery_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'cookery' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'cookery' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'cookery_change_comment_form_defaults' );

if ( ! function_exists( 'cookery_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function cookery_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip; ';
}

endif;
add_filter( 'excerpt_more', 'cookery_excerpt_more' );

if ( ! function_exists( 'cookery_excerpt_length' ) ) :
/**
 * Changes the default 35 character in excerpt 
*/
function cookery_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'excerpt_length', 35 );
    return is_admin() ? $length : absint( $excerpt_length );    
}
endif;
add_filter( 'excerpt_length', 'cookery_excerpt_length', 999 );

if( ! function_exists( 'cookery_exclude_cat' ) ) :
/**
 * Exclude post with Category from blog and archive page. 
*/
function cookery_exclude_cat( $query ){

    $ed_banner        = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $slider_type      = get_theme_mod( 'slider_type', 'latest_posts' );
    $slider_cat       = get_theme_mod( 'slider_cat' );
    $posts_per_page   = get_theme_mod( 'no_of_slides', 3 );
    $repetitive_posts = get_theme_mod( 'include_repetitive_posts', false );
    
    if( ! is_admin() && $query->is_main_query() && $query->is_home() && ( $ed_banner == 'slider_banner' ) && ! $repetitive_posts ){
        if( $slider_type === 'cat' && $slider_cat  ){            
 			$query->set( 'category__not_in', array( $slider_cat ) );    		
        }elseif( $slider_type == 'latest_posts' ){
            $args = array(
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => $posts_per_page,
                'ignore_sticky_posts' => true
            );
            $latest = get_posts( $args );
            $excludes = array();
            foreach( $latest as $l ){
                array_push( $excludes, $l->ID );
            }
            $query->set( 'post__not_in', $excludes );
        }  
    }      
}
endif;
add_filter( 'pre_get_posts', 'cookery_exclude_cat' );

if( ! function_exists( 'cookery_get_the_archive_title' ) ) :
/**
 * Filter Archive Title
*/
function cookery_get_the_archive_title( $title ){
    
    $ed_prefix = get_theme_mod( 'ed_prefix_archive', true );
    if( is_post_type_archive( 'product' ) ){
        $title = '<h1 class="page-title">' . get_the_title( get_option( 'woocommerce_shop_page_id' ) ) . '</h1>';
    }else{
        if( is_category() ){
            if( $ed_prefix ) {
                $title = '<h1 class="page-title">' . esc_html( single_cat_title( '', false ) ) . '</h1>';
            }else{
                $title = '<span class="page-subtitle">'. esc_html__( 'Category', 'cookery' ) . '</span><h1 class="page-title">' . esc_html( single_cat_title( '', false ) ) . '</h1>';
            }
        }
        elseif( is_tag() ){
            if( $ed_prefix ) {
                $title = '<h1 class="page-title">' . esc_html( single_tag_title( '', false ) ) . '</h1>';
            }else{
                $title = '<span class="page-subtitle">'. esc_html__( 'Tagged In', 'cookery' ) . '</span><h1 class="page-title">' . esc_html( single_tag_title( '', false ) ) . '</h1>';
            }
        }elseif( is_year() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'cookery' ) ) . '</h1>';                   
            }else{
                $title = '<span class="page-subtitle">'. esc_html__( 'Year', 'cookery' ) . '</span><h1 class="page-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'cookery' ) ) . '</h1>';
            }
        }elseif( is_month() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cookery' ) ) . '</h1>';                                   
            }else{
                $title = '<span class="page-subtitle">'. esc_html__( 'Month', 'cookery' ) . '</span><h1 class="page-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cookery' ) ) . '</h1>';
            }
        }elseif( is_day() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'cookery' ) ) . '</h1>';                                   
            }else{
                $title = '<span class="page-subtitle">'. esc_html__( 'Day', 'cookery' ) . '</span><h1 class="page-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'cookery' ) ) .  '</h1>';
            }
        }elseif( is_post_type_archive() ) {
            if( $ed_prefix ){
                $title = '<h1 class="page-title">'  . post_type_archive_title( '', false ) . '</h1>';                            
            }else{
                $title = '<span class="page-subtitle">'. esc_html__( 'Archives', 'cookery' ) . '</span><h1 class="page-title">'  . post_type_archive_title( '', false ) . '</h1>';
            }
        }elseif( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . single_term_title( '', false ) . '</h1>';                                   
            }else{
                $title = '<span class="page-subtitle">' . $tax->labels->singular_name . '</span><h1 class="page-title">' . single_term_title( '', false ) . '</h1>';
            }
        }
    }  
    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'cookery_get_the_archive_title' );

if( ! function_exists( 'cookery_remove_archive_description' ) ) :
/**
 * filter the_archive_description & get_the_archive_description to show post type archive
 * @param  string $description original description
 * @return string post type description if on post type archive
 */
function cookery_remove_archive_description( $description ){
    $ed_shop_archive_description = get_theme_mod( 'ed_shop_archive_description', false );
    $shop_archive_description    = get_theme_mod( 'shop_archive_description' );
    if( is_post_type_archive( 'product' ) ) {
        if( ! $ed_shop_archive_description ){
            $description = '';
        }else{
            if( $shop_archive_description ) $description = $shop_archive_description;
        }
    }
    return wpautop( wp_kses_post( $description ) );
}
endif;
add_filter( 'get_the_archive_description', 'cookery_remove_archive_description' );

if( ! function_exists( 'cookery_post_like_cb' ) ) :
/**
 * Ajax Callback for post like
*/
function cookery_post_like_cb(){
    $post_id = intval( $_POST['id'] );    
    $likes   = ( $count = get_post_meta( $post_id, '_cookery_post_like', true ) ) ? $count : 0;
    $ip_list = ( $ip = get_post_meta( $post_id, '_cookery_post_like_ip', true ) ) ? $ip : array();
    
    if( cookery_likes_can( $post_id ) ){
        $likes     = $likes + 1;
        $ip_list[] = cookery_get_real_ip_address();
        
        update_post_meta( $post_id, '_cookery_post_like', $likes );
        update_post_meta( $post_id, '_cookery_post_like_ip', $ip_list );

        echo '<span class="favourite liked"><span class="liked-icon"><svg xmlns="http://www.w3.org/2000/svg" width="17.928" height="17.058" viewBox="0 0 17.928 17.058"><path d="M24.445,20A4.434,4.434,0,0,0,20,24.445c0,5,5.038,6.3,8.445,11.223,3.26-4.889,8.482-6.408,8.482-11.223a4.453,4.453,0,0,0-8.482-1.889A4.39,4.39,0,0,0,24.445,20Z" transform="translate(-19.5 -19.5)" fill="none" stroke="#db0c18" stroke-width="1"></path></svg></span><span class="fav-count">' . absint( $likes ) . '</span></span>';
    }

    wp_die(); // this is required to terminate immediately and return a proper response               
}
endif;
add_action( 'wp_ajax_cookery_post_like', 'cookery_post_like_cb' );
add_action( 'wp_ajax_nopriv_cookery_post_like', 'cookery_post_like_cb' );

if( ! function_exists( 'cookery_banner_like_cb' ) ) :
/**
 * Ajax Callback for post like
*/
function cookery_banner_like_cb(){
    $post_id = intval( $_POST['id'] );    
    $likes   = ( $count = get_post_meta( $post_id, '_cookery_post_like', true ) ) ? $count : 0;
    $ip_list = ( $ip = get_post_meta( $post_id, '_cookery_post_like_ip', true ) ) ? $ip : array();
    
    if( cookery_likes_can( $post_id ) ){
        $likes     = $likes + 1;
        $ip_list[] = cookery_get_real_ip_address();
        
        update_post_meta( $post_id, '_cookery_post_like', $likes );
        update_post_meta( $post_id, '_cookery_post_like_ip', $ip_list );

        echo '<span class="favourite liked"><span class="liked-icon"><svg xmlns="http://www.w3.org/2000/svg" width="17.928" height="17.058" viewBox="0 0 17.928 17.058"><path d="M24.445,20A4.434,4.434,0,0,0,20,24.445c0,5,5.038,6.3,8.445,11.223,3.26-4.889,8.482-6.408,8.482-11.223a4.453,4.453,0,0,0-8.482-1.889A4.39,4.39,0,0,0,24.445,20Z" transform="translate(-19.5 -19.5)" fill="none" stroke="#db0c18" stroke-width="1"></path></svg></span><span class="fav-count">' . absint( $likes ) . '</span></span>';
    }

    wp_die(); // this is required to terminate immediately and return a proper response               
}
endif;
add_action( 'wp_ajax_cookery_banner_like', 'cookery_banner_like_cb' );
add_action( 'wp_ajax_nopriv_cookery_banner_like', 'cookery_banner_like_cb' );

if( ! function_exists( 'cookery_allowed_social_protocols' ) ) :
/**
 * List of allowed social protocols in HTML attributes.
 * @param  array $protocols Array of allowed protocols.
 * @return array
 */
function cookery_allowed_social_protocols( $protocols ) {
    $social_protocols = array(
        'skype'
    );
    return array_merge( $protocols, $social_protocols );    
}
endif;
add_filter( 'kses_allowed_protocols' , 'cookery_allowed_social_protocols' );

if( ! function_exists( 'cookery_migrate_free_option' ) ) :
/**
 * Function to migrate free theme option to pro theme
*/
function cookery_migrate_free_option(){    
    $fresh = get_option( '_cookery_fresh_install' ); //flag to check if it is first switch
    
    if( ! $fresh ){        
        $options = get_option( 'theme_mods_cookery-lite' ); //@todo Need to change this to free theme's theme mode
        
        if( $options ){
            //migrate free theme option to pro
            foreach( $options as $option => $value ){
                if( $option !== 'sidebars_widgets' ){
                    set_theme_mod( $option, $value );
                }    
            }           
        }        
        update_option( '_cookery_fresh_install', true );  
    }
}
endif;
add_action( 'after_switch_theme', 'cookery_migrate_free_option' );

if( ! function_exists( 'cookery_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function cookery_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'cookery-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = cookery_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( cookery_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => esc_url( get_permalink( $post->ID ) )
            ),
            "headline"  => esc_html( get_the_title( $post->ID ) ),
            "datePublished" => esc_html( get_the_time( DATE_ISO8601, $post->ID ) ),
            "dateModified"  => esc_html( get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ) ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => cookery_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( $custom_logo_id ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => esc_html( get_bloginfo( 'name' ) ),
                "description" => wp_kses_post( get_bloginfo( 'description' ) ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">';
        if ( version_compare( PHP_VERSION, '5.4.0' , '>=' ) ) {
            echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
        } else {
            echo wp_json_encode( $args );
        }
        echo '</script>';
    }
}
endif;
add_action( 'wp_head', 'cookery_single_post_schema' );

if( ! function_exists( 'cookery_get_comment_author_link' ) ) :
/**
 * Filter to modify comment author link
 * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
 */
function cookery_get_comment_author_link( $return, $author, $comment_ID ){
    $comment = get_comment( $comment_ID );
    $url     = get_comment_author_url( $comment );
    $author  = get_comment_author( $comment );
 
    if ( empty( $url ) || 'http://' == $url )
        $return = '<span itemprop="name">'. esc_html( $author ) .'</span>';
    else
        $return = '<span itemprop="name"><a href=' . esc_url( $url ) . ' rel="external nofollow noopener" class="url" itemprop="url">' . esc_html( $author ) . '</a></span>';

    return $return;
}
endif;
add_filter( 'get_comment_author_link', 'cookery_get_comment_author_link', 10, 3 );

if( ! function_exists( 'cookery_filter_post_gallery' ) ) :
/**
 * Filter the output of the gallery. 
*/ 
function cookery_filter_post_gallery( $output, $attr, $instance ){
    global $post, $wp_locale;

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
    	'order'      => 'ASC',
    	'orderby'    => 'menu_order ID',
    	'id'         => $post ? $post->ID : 0,
    	'itemtag'    => $html5 ? 'figure'     : 'dl',
    	'icontag'    => $html5 ? 'div'        : 'dt',
    	'captiontag' => $html5 ? 'figcaption' : 'dd',
    	'columns'    => 3,
    	'size'       => 'thumbnail',
    	'include'    => '',
    	'exclude'    => '',
    	'link'       => ''
    ), $attr, 'gallery' );
    
    $id = intval( $atts['id'] );
    
    if ( ! empty( $atts['include'] ) ) {
    	$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    
    	$attachments = array();
    	foreach ( $_attachments as $key => $val ) {
    		$attachments[$val->ID] = $_attachments[$key];
    	}
    } elseif ( ! empty( $atts['exclude'] ) ) {
    	$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
    	$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }
    
    if ( empty( $attachments ) ) {
    	return '';
    }
    
    if ( is_feed() ) {
    	$output = "\n";
    	foreach ( $attachments as $att_id => $attachment ) {
    		$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    	}
    	return $output;
    }
    
    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    	$itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    	$captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
    	$icontag = 'dt';
    }
    
    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    
    $selector = "gallery-{$instance}";
    
    $gallery_style = '';
    
    /**
     * Filter whether to print default gallery styles.
     *
     * @since 3.1.0
     *
     * @param bool $print Whether to print default gallery styles.
     *                    Defaults to false if the theme supports HTML5 galleries.
     *                    Otherwise, defaults to true.
     */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
    	$gallery_style = "
    	<style type='text/css'>
    		#{$selector} {
    			margin: auto;
    		}
    		#{$selector} .gallery-item {
    			float: {$float};
    			margin-top: 10px;
    			text-align: center;
    			width: {$itemwidth}%;
    		}
    		#{$selector} img {
    			border: 2px solid #cfcfcf;
    		}
    		#{$selector} .gallery-caption {
    			margin-left: 0;
    		}
    		/* see gallery_shortcode() in wp-includes/media.php */
    	</style>\n\t\t";
    }
    
    $size_class = sanitize_html_class( $atts['size'] );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    
    /**
     * Filter the default gallery shortcode CSS styles.
     *
     * @since 2.5.0
     *
     * @param string $gallery_style Default CSS styles and opening HTML div container
     *                              for the gallery shortcode output.
     */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
    
    $i = 0; 
    foreach ( $attachments as $id => $attachment ) {
            
    	$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
    	if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
    		//$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr ); // for attachment url 
            $image_output = "<a href='" . wp_get_attachment_url( $id ) . "' data-fancybox='group{$columns}' data-caption='" . esc_attr( $attachment->post_excerpt ) . "'>";
            $image_output .= wp_get_attachment_image( $id, $atts['size'], false, $attr );
            $image_output .= "</a>";
    	} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
    		$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
    	} else {
    		$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr ); //for attachment page
    	}
    	$image_meta  = wp_get_attachment_metadata( $id );
    
    	$orientation = '';
    	if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
    		$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
    	}
    	$output .= "<{$itemtag} class='gallery-item'>";
    	$output .= "
    		<{$icontag} class='gallery-icon {$orientation}'>
    			$image_output
    		</{$icontag}>";
    	if ( $captiontag && trim($attachment->post_excerpt) ) {
    		$output .= "
    			<{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
    			" . wptexturize($attachment->post_excerpt) . "
    			</{$captiontag}>";
    	}
    	$output .= "</{$itemtag}>";
    	if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
    		$output .= '<br style="clear: both" />';
    	}
    }
    
    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
    	$output .= "
    		<br style='clear: both' />";
    }
    
    $output .= "
    	</div>\n";
    
    return $output;
}
endif;
if( class_exists( 'Jetpack' ) ){
    if( !Jetpack::is_module_active( 'carousel' ) ){
        add_filter( 'post_gallery', 'cookery_filter_post_gallery', 10, 3 );
    }
}else{
    add_filter( 'post_gallery', 'cookery_filter_post_gallery', 10, 3 );
}

if( ! function_exists( 'cookery_google_analytics' ) ) :
/**
 * Add Google Analytics Code in Head Tag.
 */
function cookery_google_analytics() {
    $google_analytics = get_theme_mod( 'google_analytics' );
    if( $google_analytics ) echo $google_analytics;
}
endif;
add_action( 'wp_head', 'cookery_google_analytics' );

if( ! function_exists( 'cookery_redirect_on_activation' ) ) :
/**
 * Redirect to Getting Started page on theme activation
*/
function cookery_redirect_on_activation() {
    global $pagenow;
    if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
        wp_redirect( admin_url( "themes.php?page=cookery-dashboard" ) );
    }

    if( isset( $_GET['cookery_review_notice'] ) && $_GET['cookery_review_notice'] == '1' ){
        update_option( 'cookery_review_notice', true );
    }

    if( isset( $_GET['cookery_review_transient'] ) && $_GET['cookery_review_transient'] == '1' ){
        if( get_transient( 'cookery_review_transient' ) == false ) set_transient( 'cookery_review_transient', true, MONTH_IN_SECONDS );
    }
}
endif;
add_action( 'admin_init', 'cookery_redirect_on_activation' );

if( ! function_exists( 'cookery_ajax_search' ) ) :
/**
 * Callback for AJAX Search results
*/ 
function cookery_ajax_search() {
    
    $search     = $_REQUEST['q'];
    $s_layout   = $_REQUEST['s_layout'];   
    
    $final_results = get_posts( array( 
        's'              => $search, 
        'posts_per_page' => ( $s_layout == 'two' ) ? 10 : 6,
        'post_type'      => ( is_delicious_recipe_activated() ) ? DELICIOUS_RECIPE_POST_TYPE : 'post',
        )
    );

    if( $final_results && $s_layout == 'two' ){ ?>
        <ul class="search-result-list">
        <?php foreach( $final_results as $val ){ ?>
            <li>
                <div class="result-title-wrap">
                    <div class="result-title">
                        <a href="<?php the_permalink( $val->ID ); ?>"><?php echo esc_html( $val->post_title ); ?></a>
                    </div>
                </div>
            </li>
        <?php } ?>              
        </ul>
        <?php
        echo '<div class="result-wrap-count"><div class="result-count"><span>' . absint( count( $final_results ) ) . __( ' Results', 'cookery' ).'</span></div></div>';
        echo '</div>';
        wp_reset_postdata();
    }elseif( $final_results && $s_layout == 'one' ){ ?>
        <ul class="search-result-list">
        <?php foreach( $final_results as $val ){ ?>
            <li>
                <?php if( has_post_thumbnail( $val->ID ) ) : ?>
                    <figure class="result-img">
                        <a href="<?php the_permalink( $val->ID ); ?>">
                            <?php echo get_the_post_thumbnail( $val->ID, 'thumbnail', array( 'image' => 'itemprop' ) ); ?>
                        </a>
                    </figure>
                <?php endif; ?>
                <div class="result-title-wrap">
                    <div class="result-title">
                        <a href="<?php the_permalink( $val->ID ); ?>"><?php echo esc_html( $val->post_title ); ?></a>
                    </div>
                    <?php if( is_delicious_recipe_activated() ) {
                        echo '<div class="result-meta">';
                        $recipe_post  = get_post( $val->ID );
                        $recipe = delicious_recipes_get_recipe( $recipe_post );

                        if( $recipe->total_time ) : ?>
                            <span class="cook-time">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="29.99" height="29.99"
                                    viewBox="0 0 29.99 29.99">
                                    <defs>
                                        <filter id="a" x="0" y="0" width="29.99" height="29.99" filterUnits="userSpaceOnUse">
                                            <feOffset dy="3" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="3" result="b" />
                                            <feFlood flood-color="#e84e3b" flood-opacity="0.259" />
                                            <feComposite operator="in" in2="b" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>
                                    <g transform="translate(7.682 4.259)">
                                        <g transform="translate(2.146)">
                                            <path
                                                d="M76.621,3.152l-.885-.885a.428.428,0,1,0-.606.606l.885.885a.428.428,0,0,0,.606-.606Zm8.593-.885a.428.428,0,0,0-.606,0L83.584,3.291a.428.428,0,1,0,.606.606l1.025-1.024a.428.428,0,0,0,0-.606ZM77.7,12.243a.432.432,0,0,0-.575.192L76.363,14a.428.428,0,0,0,.766.383l.767-1.562a.429.429,0,0,0-.192-.575ZM81.028,0H79.316a.428.428,0,1,0,0,.856h.428V2.17a.428.428,0,1,0,.856,0V.856h.428a.428.428,0,1,0,0-.856Zm2.185,12.435a.428.428,0,0,0-.766.383l.767,1.562A.428.428,0,0,0,83.981,14Z"
                                                transform="translate(-75.005)" fill="#e84e3b" />
                                        </g>
                                        <g transform="translate(0.005 0.024)">
                                            <g transform="translate(1.313 1.717)">
                                                <g transform="matrix(1, 0, 0, 1, -9, -6)" filter="url(#a)">
                                                    <path d="M52,72.99a6,6,0,1,1,6-6A6,6,0,0,1,52,72.99Z" transform="translate(-37 -55)"
                                                        fill="#e84e3b" />
                                                </g>
                                            </g>
                                            <g transform="translate(3.026 3.43)">
                                                <path d="M110.287,129.564a4.282,4.282,0,1,1,4.282-4.282A4.287,4.287,0,0,1,110.287,129.564Z"
                                                    transform="translate(-106.005 -121)" fill="#fff" />
                                            </g>
                                            <g transform="translate(0)">
                                                <path
                                                    d="M.758,1.585a2.568,2.568,0,0,0,0,3.633.428.428,0,0,0,.606,0L4.391,2.19a.428.428,0,0,0,0-.606,2.63,2.63,0,0,0-3.633,0Zm13.111,0a2.63,2.63,0,0,0-3.633,0,.428.428,0,0,0,0,.606l3.028,3.028a.428.428,0,0,0,.606,0,2.568,2.568,0,0,0,0-3.633Z"
                                                    transform="translate(-0.005 -0.857)" fill="#e84e3b" />
                                            </g>
                                            <g transform="translate(5.167 5.143)">
                                                <path
                                                    d="M181.434,185.71a.428.428,0,0,1-.3-.731l1.587-1.587v-1.964a.428.428,0,1,1,.856,0v2.141a.428.428,0,0,1-.125.3l-1.713,1.713A.427.427,0,0,1,181.434,185.71Z"
                                                    transform="translate(-181.006 -181)" fill="#e84e3b" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="meta-text"><?php echo esc_html( $recipe->total_time ); ?></span>
                            </span>
                        <?php endif;
                        if( $recipe->difficulty_level ) : ?>
                            <span class="cook-difficulty">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.728" height="32.25"
                                    viewBox="0 0 28.728 32.25">
                                    <defs>
                                        <filter id="a" x="0" y="0" width="28.728" height="32.25" filterUnits="userSpaceOnUse">
                                            <feOffset dy="3" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="3" result="b" />
                                            <feFlood flood-color="#e84e3b" flood-opacity="0.259" />
                                            <feComposite operator="in" in2="b" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>
                                    <g transform="translate(-54.168 6)">
                                        <g transform="matrix(1, 0, 0, 1, 54.17, -6)" filter="url(#a)">
                                            <path
                                                d="M65.32,12.962A10.057,10.057,0,0,1,63.6,10.524a5.527,5.527,0,0,1-.327-3.181A6.861,6.861,0,0,1,64.636,4.4a2.835,2.835,0,0,0,.713,2.081,4.946,4.946,0,0,1,1.13-4.1A8.5,8.5,0,0,1,70.106,0,2.93,2.93,0,0,0,69.6,2.795,11.653,11.653,0,0,0,70.938,5.44a5.905,5.905,0,0,1,1.011,2.735A9.561,9.561,0,0,0,72.692,6.6a3.113,3.113,0,0,0,.119-1.724,4.421,4.421,0,0,1,.981,2.14,9,9,0,0,1,.03,2.527,6.32,6.32,0,0,1-.862,2.646,4.964,4.964,0,0,1-2.586,1.932A5.879,5.879,0,0,1,65.32,12.962Z"
                                                transform="translate(-54.17 6)" fill="#e84e3b" />
                                        </g>
                                        <path
                                            d="M152.924,223.524a2.926,2.926,0,0,0,3.508-4.162c0-.03-.03-.03-.03-.059a3,3,0,0,1-.743,2.616,2.777,2.777,0,0,0-.268-2.259c-.357-.684-.862-1.308-1.249-1.962a3.16,3.16,0,0,1-.505-2.23,3.92,3.92,0,0,0-1.427,2.2,3.98,3.98,0,0,0,.3,2.616,1.954,1.954,0,0,1-.8-1.427,3.061,3.061,0,0,0-.743,2.051A3.028,3.028,0,0,0,152.924,223.524Z"
                                            transform="translate(-85.345 -210.391)" fill="#fff" />
                                    </g>
                                </svg>
                                <span class="meta-text"><?php echo esc_html( ucfirst( $recipe->difficulty_level ) ); ?></span>
                            </span>
                        <?php endif;
                        echo '</div>';
                    } ?>
                </div>
            </li>
        <?php } ?>              
        </ul>
        <?php
        echo '<div class="result-wrap-count"><div class="result-count"><span>' . absint( count( $final_results ) ) . __( ' Results', 'cookery' ).'</span></div></div>';
        echo '</div>';
        wp_reset_postdata();
    }else{
        echo '<div class="no-results">' . __( 'No results found.', 'cookery' ) . '</div>';
    }        
    
    wp_die(); // this is required to terminate immediately and return a proper response            
}
endif;
add_action( 'wp_ajax_cookery_search', 'cookery_ajax_search' );
add_action( 'wp_ajax_nopriv_cookery_search', 'cookery_ajax_search' );

if ( ! function_exists( 'cookery_get_fontawesome_ajax' ) ) :
/**
 * Return an array of all icons.
 */
function cookery_get_fontawesome_ajax() {
    // Bail if the nonce doesn't check out
    if ( ! isset( $_POST['cookery_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['cookery_customize_nonce'] ), 'cookery_customize_nonce' ) ) {
        wp_die();
    }

    // Do another nonce check
    check_ajax_referer( 'cookery_customize_nonce', 'cookery_customize_nonce' );

    // Bail if user can't edit theme options
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die();
    }

    // Get all of our fonts
    $fonts = cookery_get_fontawesome_list();
    
    ob_start();
    if( $fonts ){ ?>
        <ul class="font-group">
            <?php 
                foreach( $fonts as $font ){
                    echo '<li data-font="' . esc_attr( $font ) . '"><i class="' . esc_attr( $font ) . '"></i></li>';                        
                }
            ?>
        </ul>
        <?php
    }
    echo ob_get_clean();

    // Exit
    wp_die();
}
endif;
add_action( 'wp_ajax_cookery_get_fontawesome_ajax', 'cookery_get_fontawesome_ajax' );

if ( ! function_exists( 'cookery_dynamic_mce_css' ) ) :
/**
 * Add Editor Style 
 * Add Link Color Option in Editor Style (MCE CSS)
 */
function cookery_dynamic_mce_css( $mce_css ){
    $mce_css .= ', ' . add_query_arg( array( 'action' => 'cookery_dynamic_mce_css', '_nonce' => wp_create_nonce( 'cookery_dynamic_mce_nonce', __FILE__ ) ), admin_url( 'admin-ajax.php' ) );
    return $mce_css;
}
endif;
add_filter( 'mce_css', 'cookery_dynamic_mce_css' );
 
if ( ! function_exists( 'cookery_dynamic_mce_css_ajax_callback' ) ) : 
/**
 * Ajax Callback
 */
function cookery_dynamic_mce_css_ajax_callback(){
 
    /* Check nonce for security */
    $nonce = isset( $_REQUEST['_nonce'] ) ? $_REQUEST['_nonce'] : '';
    if( ! wp_verify_nonce( $nonce, 'cookery_dynamic_mce_nonce' ) ){
        die(); // don't print anything
    }
 
    /* Get Link Color */
    $primary_font    = get_theme_mod( 'primary_font', 'Questrial' );
    $primary_fonts   = cookery_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Noto Serif' );
    $secondary_fonts = cookery_get_fonts( $secondary_font, 'regular' );
    $tertiary_font   = get_theme_mod( 'tertiary_font', '' );
    $tertiary_fonts  = cookery_get_fonts( $tertiary_font, '' );

    $primary_color    = get_theme_mod( 'primary_color', '#2db68d' ); 
    $secondary_color  = get_theme_mod( 'secondary_color', '#e84e3b' ); 

    $rgb = cookery_hex2rgb( cookery_sanitize_hex_color( $primary_color ) );
    $rgb2 = cookery_hex2rgb( cookery_sanitize_hex_color( $secondary_color ) );
 
    /* Set File Type and Print the CSS Declaration */
    header( 'Content-type: text/css' );
    echo ':root .mce-content-body {
        --primary-color: ' . cookery_sanitize_hex_color( $primary_color ) . ';
        --primary-color-rgb: ' . sprintf( '%1$s, %2$s, %3$s', $rgb[0], $rgb[1], $rgb[2] ) . ';
        --secondary-color: ' . cookery_sanitize_hex_color( $secondary_color ) . ';
        --secondary-color-rgb: ' . sprintf('%1$s, %2$s, %3$s', $rgb2[0], $rgb2[1], $rgb2[2] ) . ';
        --primary-font: ' . esc_html( $primary_fonts['font'] ) . ';
        --secondary-font: ' . esc_html( $secondary_fonts['font'] ) . ';
        --cursive-font: ' . esc_html( $tertiary_fonts['font'] ) . ';
    }
    
    .mce-content-body blockquote::before, 
    .mce-content-body q::before {
        content: "";
        background-image: url(\'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" width="64" height="40.062" viewBox="0 0 64 40.062"><path d="M68.871,47.073A12.886,12.886,0,0,0,56.71,36.191c1.494-5.547,5.121-7.752,9.53-9.032a.515.515,0,0,0,.356-.569l-.711-4.409s-.071-.356-.64-.284C50.024,23.6,39.712,35.2,41.632,49.277,43.41,59.021,51.02,62.79,58.061,61.794a12.968,12.968,0,0,0,10.81-14.722ZM20.3,36.191c1.422-5.547,5.192-7.752,9.53-9.032a.515.515,0,0,0,.356-.569l-.64-4.409s-.071-.356-.64-.284C13.682,23.532,3.441,35.124,5.219,49.206c1.849,9.815,9.53,13.584,16.5,12.588A12.865,12.865,0,0,0,32.458,47.073,12.693,12.693,0,0,0,20.3,36.191Z" transform="translate(-5.018 -21.887)" fill="' . cookery_hash_to_percent23( cookery_sanitize_hex_color( $primary_color ) ) . '"/></svg>\');
    }';
    die(); // end ajax process.
}
endif;
add_action( 'wp_ajax_cookery_dynamic_mce_css', 'cookery_dynamic_mce_css_ajax_callback' );
add_action( 'wp_ajax_no_priv_cookery_dynamic_mce_css', 'cookery_dynamic_mce_css_ajax_callback' );

if ( ! function_exists( 'cookery_check_hide_title' ) ) {
    /**
     * Check hide title.
     *
     * @param bool $val default value.
     *
     * @return bool
     */
    function cookery_check_hide_title( $val ) {
        if ( cookery_is_elementor_activated() && cookery_is_elementor_activated_post() ) {
            $current_doc = \Elementor\Plugin::instance()->documents->get( get_the_ID() );
            if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
                $val = false;
            }
        }
        return $val;
    }
}
add_filter( 'cookery_page_title', 'cookery_check_hide_title' );