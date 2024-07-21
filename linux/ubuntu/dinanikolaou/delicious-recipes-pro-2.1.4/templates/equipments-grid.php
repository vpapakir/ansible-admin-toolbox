<?php
/**
 * The template for displaying equipment content in archive.
 *
 * This template can be overridden by copying it to yourtheme/delicious-recipes-pro/equipments-grid.php.
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

global $post;
$img_size = apply_filters( 'recipe_equipment_img_size', 'full' );

// Get equipment metas.
$equipment_meta = get_post_meta( $post->ID, 'delicious_recipes_equipment_metadata', true );
$link           = isset( $equipment_meta['equipmentLink'] ) && $equipment_meta['equipmentLink'] ? $equipment_meta['equipmentLink'] : '';
$label          = isset( $equipment_meta['equipmentLinkLabel'] ) && $equipment_meta['equipmentLinkLabel'] ? $equipment_meta['equipmentLinkLabel'] : __('Buy Now', 'delicious-recipes-pro');
$no_follow      = isset( $equipment_meta['addRelNofollow']['0'] ) && 'yes' === $equipment_meta['addRelNofollow']['0'] ? 'nofollow' : '';
$sponsored      = isset( $equipment_meta['addRelSponsored']['0'] ) && 'yes' === $equipment_meta['addRelSponsored']['0'] ? 'sponsored' : '';
$new_tab        = isset( $equipment_meta['openInNewWindow']['0'] ) && 'yes' === $equipment_meta['openInNewWindow']['0'] ? '_blank' : '_self';
$rel            = implode( ' ', array( $no_follow, $sponsored ) );

?>
<div class="dr-equipment-single-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <div class="dr-equipment-img-wrap">
        <?php
            if ( delicious_recipes_pro_is_equipment_featured( $post->ID ) ) {
                ?>
                    <span class="dr-featured-tag-wrapper">
                        <span><?php esc_html_e( "Featured", 'delicious-recipes-pro' ); ?></span>
                    </span>
                <?php
            }
        ?>
        <figure class="dr-img">
            <?php if( $link ) { 
                echo sprintf(
                    '<a href="%s" rel="%s" target="%s"/>',
                    esc_url( $link ),
                    trim( $rel ),
                    $new_tab
                );
            } 
                // post thumbnail
                if( has_post_thumbnail() ) {
                    the_post_thumbnail( $img_size ); 
                } else {
                    delicious_recipes_get_fallback_svg( 'recipe-archive-grid' );
                }

            if( $link ) {
                echo '</a>';
            } ?>
        </figure>
    </div>

    <div class="dr-equipment-content-wrapper">
        <div class="dr-equipment-title-wrap">
            <h2 class="dr-title" itemprop="name">
                <?php if( $link ) { 
                    echo sprintf(
                        '<a itemprop="url" href="%s" rel="%s" target="%s"/>',
                        esc_url( $link ),
                        trim( $rel ),
                        $new_tab
                    );
                } 
                    the_title();

                if( $link ) {
                    echo '</a>';
                } ?>
            </h2>
            
            <?php if( isset( $position ) && ! empty( $position ) ) : ?>
                <meta itemprop="position" content="<?php echo $position; ?>"/>
            <?php endif; ?>
        </div>

        <div class="dr-equipment-content">
            <?php the_content(); ?>
        </div>
        
        <?php if( $link ) : ?>
            <div class="dr-equipment-btn-wrap">
                <?php
                    echo sprintf(
                        '<a href="%s" rel="%s" target="%s" class="dr-btn btn-primary dr-buy-now-btn"/>',
                        esc_url( $link ),
                        trim( $rel ),
                        $new_tab
                    );
                ?>
                    <?php echo esc_html( $label ); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14.193" height="9.647"
                        viewBox="0 0 14.193 9.647">
                        <g id="Group_4135" data-name="Group 4135" transform="translate(0.5 0.707)">
                            <path id="Path_26348" data-name="Path 26348"
                                d="M7820.11-1126.021l4.117,4.116-4.117,4.116"
                                transform="translate(-7811.241 1126.021)" fill="none" stroke="#fff"
                                stroke-linecap="round" stroke-width="1" />
                            <path id="Path_26365" data-name="Path 26365" d="M6555.283-354.415h-12.624"
                                transform="translate(-6542.659 358.532)" fill="none" stroke="#fff"
                                stroke-linecap="round" stroke-width="1" />
                        </g>
                    </svg>
                <?php echo '</a>'; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
