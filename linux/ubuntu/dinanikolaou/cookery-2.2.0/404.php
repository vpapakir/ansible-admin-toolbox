<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Cookery
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404 not-found">
                <figure class="error-img">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/error404-img.jpg' ); ?>" alt="<?php esc_attr_e( 'error image', 'cookery' ); ?>">
                </figure>
                <div class="error-content-wrap">
                    <div class="page-content">
                        <h2><?php esc_html_e( '404 Error', 'cookery' ); ?></h2>
                        <span class="error-txt"><?php esc_html_e( 'Page Not found.', 'cookery' ); ?></span>
                        <p><?php esc_html_e( 'The page you\'re looking for may have been moved, deleted, or possibly never existed.', 'cookery' ); ?></p>
                        <a class="btn-readmore" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689">
                                <g transform="translate(17.729 11.628) rotate(180)">
                                    <path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none"
                                        stroke="#ffffff" stroke-linecap="round" stroke-width="1.5" />
                                    <path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#ffffff"
                                        stroke-linecap="round" stroke-width="1.5" />
                                </g>
                            </svg>
                            <?php esc_html_e( 'Go Back to Homepage', 'cookery' ); ?>
                        </a>
                    </div><!-- .page-content -->
                    <div class="error-404-search">
                        <p><i><?php esc_html_e( 'Or try again...', 'cookery' ); ?></i></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </section><!-- .error-404 -->
        </main><!-- #main -->
        <?php
        /**
         * @see cookery_latest_posts
        */
        do_action( 'cookery_latest_posts' ); ?>
    </div><!-- #primary -->
    
<?php    
get_footer();