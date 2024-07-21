<?php
/**
 * Delicious Recipes Functions.
 *
 * @package Cookery
 */

if( ! function_exists( 'cookery_recipe_keywords' ) ) :
/**
 * Recipe Keys.
 */
function cookery_recipe_keywords(){
    global $recipe;
    if ( ! empty( $recipe->recipe_keys ) ) : ?>
        <span class="dr-category">
            <?php
            foreach( $recipe->recipe_keys as $recipe_key ) {
                $key              = get_term_by( 'name', $recipe_key, 'recipe-key' );
                $recipe_key_metas = get_term_meta( $key->term_id, 'dr_taxonomy_metas', true );
                $key_svg          = isset( $recipe_key_metas['taxonomy_svg'] ) ? $recipe_key_metas['taxonomy_svg'] : ''; 
                ?>
                <a href="<?php echo esc_url( get_term_link( $key, 'recipe-key' ) ); ?>" title="<?php echo esc_attr( $recipe_key ); ?>">
                    <?php delicious_recipes_get_tax_icon( $key ); ?>
                    <span class="cat-name"><?php echo esc_html( $recipe_key ); ?></span>
                </a>
            <?php } ?>
        </span>
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_prep_time' ) ) :
/**
 * Prep Time.
 */
function cookery_prep_time(){
    global $recipe;
    if( $recipe->total_time ) : ?>
        <span class="cook-time">
            <svg class="icon">
                <use xlink:href="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ?>assets/images/sprite.svg#time"></use>
            </svg>
            <span class="meta-text"><?php echo esc_html( $recipe->total_time ); ?></span>
        </span>
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_difficulty_level' ) ) :
/**
 * Difficulty Level.
 */
function cookery_difficulty_level(){
    global $recipe;
    if( $recipe->difficulty_level ) : ?>
        <span class="cook-difficulty">
            <svg class="icon">
                <use xlink:href="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ?>assets/images/sprite.svg#difficulty"></use>
            </svg>
            <span class="meta-text"><?php echo esc_html( ucfirst( $recipe->difficulty_level ) ); ?></span>
        </span>
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_recipe_category' ) ) :
/**
 * Difficulty Level.
 */
function cookery_recipe_category(){
    global $recipe;
    if ( ! empty( $recipe->ID ) ) : ?>
        <span class="post-cat">
            <?php the_terms( $recipe->ID, 'recipe-course', '', '', '' ); ?>
        </span>
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_recipe_rating' ) ) :
/**
 * Rating
 */
function cookery_recipe_rating(){
    global $recipe;
    if ( $recipe->rating ): ?>
        <span class="post-rating">
            <svg class="icon">
                <use xlink:href="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ?>assets/images/sprite.svg#rating"></use>
            </svg>
            <span class="meta-text"><?php echo esc_html( $recipe->rating ); ?></span>
        </span>
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_recipe_pinit' ) ) :
/**
 * Pin it
 */
function cookery_recipe_pinit(){
    global $recipe;
    ?>
    <span class="post-pinit-button">
        <a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>/&media=<?php echo esc_url( $recipe->thumbnail ); ?>&description=So%20delicious!" data-pin-custom="true">
            <img src="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ?>/assets/images/pinit-sm.png" alt="pinit">
        </a>
    </span>
    <?php
}
endif;

if( ! function_exists( 'cookery_get_category_list' ) ) :
/**
 * Category List.
 */
function cookery_get_category_list( $cat_id, $sec_title, $sec_btn_label, $all_fliter, $number_posts ){
    
    $ri_carousel  = get_theme_mod( 'recipe_index_carousel_enable', false );

    $args = $category_list_tax = array();
    if( $cat_id ) {
        $category_list_tax = get_term( $cat_id );
    }

    if( $category_list_tax ) {
        $args = array(
            'post_type'           => DELICIOUS_RECIPE_POST_TYPE,
            'posts_per_page'      => $number_posts,
            'ignore_sticky_posts' => true,
            'tax_query'           => array(
                array(
                    'taxonomy'        => $category_list_tax->taxonomy,
                    'field'           => 'term_id',
                    'terms'           => $category_list_tax->term_id,
                )
            ),
        );

        if( $all_fliter == 'views' ) {
            $args['orderby']    = 'meta_value_num';
            $args['meta_key']   = '_delicious_recipes_view_count';   
        }elseif( $all_fliter == 'comments_count' ){
            $args['orderby']    = 'comment_count';
        }elseif( $all_fliter == 'published_date' ){
            $args['orderby']    = 'date';
        }
    }

    $qry = new WP_Query( $args );

    if( $qry->have_posts() ) {?>
        <div class="section-block">
            <?php if( $sec_title || ( $sec_btn_label && $cat_id ) ) : ?>
                <div class="block-title-wrap">
                    <?php if( $sec_title ) echo '<h3 class="block-title">' . esc_html( $sec_title ) . '</h3>'; ?>
                    <?php if( $sec_btn_label && $cat_id ) : ?>
                        <div class="button-wrap">
                            <a href="<?php echo esc_url( get_term_link( absint( $cat_id ), '' ) ); ?>" class="btn-readmore">
                                <?php echo esc_html( $sec_btn_label ); ?>
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
            <div class="block-content-wrap">
                <ul class="cat-post-list<?php if( $ri_carousel && $number_posts > 4 ) echo ' owl-carousel'; ?>">
                    <?php while( $qry->have_posts() ) { $qry->the_post(); ?>
                        <li>
                            <figure class="block-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if( has_post_thumbnail() ) : 
                                        the_post_thumbnail( 'cookery-featured-recipe' ); 
                                    else:
                                        cookery_get_fallback_svg( 'cookery-featured-recipe' );
                                    endif; ?>
                                </a>
                                <?php cookery_recipe_keywords();
                                do_action( 'delicious_recipes_wishlist_button'); ?>
                            </figure>
                            <h4 class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="item-meta">
                                <?php
                                cookery_prep_time();
                                cookery_difficulty_level();
                                ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php 
    }
}
endif;

if( ! function_exists( 'cookery_recipes_single_after_content_end' ) ) :
/**
 * Recipes Single After Content End
 */
function cookery_recipes_single_after_content_end() {

    $author_sign = get_theme_mod( 'author_signature', '' );
    $ed_toggle_social = get_theme_mod( 'ed_toggle_social', false ); 
    $alignment_signature = get_theme_mod( 'alignment_signature', 'center' );

    if( DELICIOUS_RECIPE_POST_TYPE == get_post_type() && $author_sign ) {
        echo '<div class="author-signature ' . esc_attr( $alignment_signature ) . '">';                          
        echo '<img src="' . esc_url( $author_sign ) . '" alt="' . esc_attr__( 'author-sign', 'cookery' ) . '">';
        if( $ed_toggle_social ) cookery_social_links();
        echo '</div>';
    }
}
endif;
add_action( 'delicious_recipes_single_after_content_end', 'cookery_recipes_single_after_content_end', 25 );

if( ! function_exists( 'cookery_recipes_autoload_selector' ) ) :
/**
 * Recipes Autoload Selector.
 */
function cookery_recipes_autoload_selector() {
    return '.site-content > .container';
}
endif;
add_filter( 'wp_delicious_autoload_selector', 'cookery_recipes_autoload_selector' );

if( ! function_exists( 'cookery_recipes_autoload_append_selector' ) ) :
/**
 * Recipes Autoload Append Selector.
 */
function cookery_recipes_autoload_append_selector() {
    return '.content-area';
}
endif;
add_filter( 'wp_delicious_autoload_append_selector', 'cookery_recipes_autoload_append_selector' );