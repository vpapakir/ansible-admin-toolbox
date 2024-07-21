<?php
/**
 * The template for displaying recipe content in related recipes.
 *
 * This template can be overridden by copying it to yourtheme/delicious-recipes/related-recipes.php.
 *
 * HOWEVER, on occasion WP Delicious will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://wpdelicious.com/docs/template-structure/
 * @package Delicious_Recipes/Templates
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

global $recipe;
$img_size       = apply_filters( 'popular_list_img_size', 'thumbnail' );

if( $i % 3 == 1 ) echo '<div class="splide__slide">';
?>
    <div class="dr-related-recipe-item">
        <?php if( $thumbnail ): ?>
            <div class="dr-recipe-fig">
                <a href="<?php echo esc_url( $recipe->permalink ); ?>">
                    <?php if( $recipe->thumbnail ) : 
                        ?> <img src="<?php echo get_the_post_thumbnail_url( ); ?>" /> <?php
                        // the_post_thumbnail( $img_size ); 
                    else:
                        delicious_recipes_get_fallback_svg( 'thumbnail' );
                    endif; ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="dr-recipe-details">
            <div class="dr-recipe-title">
                <a href="<?php echo esc_url( $recipe->permalink ); ?>">
                    <?php echo esc_html( $recipe->name ); ?>
                </a>
            </div>
            <div class="dr-entry-meta">
                <?php if( $recipe->total_time ) : ?>
                    <span class="dr-time">
                        <svg class="icon">
                            <use xlink:href="<?php echo esc_url( plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ); ?>assets/images/sprite.svg#time"></use>
                        </svg>
                        <span class="dr-meta-title">
                            <?php 
                                echo esc_html( $recipe->total_time );
                            ?>
                        </span>
                    </span>
                <?php endif; ?>

                <?php if( $recipe->difficulty_level ) : ?>
                    <span class="dr-level">
                        <svg class="icon">
                            <use xlink:href="<?php echo esc_url( plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ); ?>assets/images/sprite.svg#difficulty"></use>
                        </svg>
                        <span class="dr-meta-title">
                            <?php echo esc_html( $recipe->difficulty_level ); ?>
                        </span>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
if( $i % 3 == 0 || $i == $count ) echo '</div>';

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */