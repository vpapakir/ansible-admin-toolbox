<?php
/**
 * Recipe main equipments template.
 * 
 * @package Delicious_Recipes_Pro
 */

global $post;
$img_size = apply_filters( 'recipe_equipment_img_size', 'full' );

$global_settings = delicious_recipes_get_global_settings();
$enable_disclosure = isset( $global_settings['enableDisclosureRecipeCard']['0'] ) && 'yes' === $global_settings['enableDisclosureRecipeCard']['0'] ? true : false;
$disclosure_content = isset( $global_settings['affiliateDisclosure'] ) && $global_settings['affiliateDisclosure'] ? $global_settings['affiliateDisclosure'] : '';
$recipe_meta     = get_post_meta( $post->ID, 'delicious_recipes_metadata', true );

if( empty( $recipe_meta ) ) {
    return;
}

$enable_equipments = isset( $global_settings['enableEquipments']['0'] ) && 'yes' === $global_settings['enableEquipments']['0'] ? true : false;
$equipments_lbl    = isset( $recipe_meta['equipmentsTitle'] ) && $recipe_meta['equipmentsTitle'] ? $recipe_meta['equipmentsTitle'] : __( 'Equipment', 'delicious-recipes-pro' );

$recipeEquipmentIds    = isset( $recipe_meta['recipeEquipmentIds'] ) && ! empty( $recipe_meta['recipeEquipmentIds'] ) ? $recipe_meta['recipeEquipmentIds'] : array();

if( ! empty( $recipeEquipmentIds ) && $enable_equipments ) : ?>
    <div class="dr-equipment-slider-wrapper">
        <div class="dr-es-section-title-wrap">
            <h3 class="dr-title"><?php echo esc_html( $equipments_lbl );?></h3>
        </div>

        <div class="dr-equipment-slider owl-carousel">
            <?php foreach( $recipeEquipmentIds as $key => $equipment ) : 
                $equipment_ID   = isset( $equipment['equipmentID'] ) && ! empty( $equipment['equipmentID'] ) ? $equipment['equipmentID'] : '';
                $equipment_post = get_post( absint( $equipment_ID ) );
                if( empty( $equipment_post ) ) { 
                    continue; 
                }

                // Get equipment metas.
                $equipment_meta = get_post_meta( $equipment_ID, 'delicious_recipes_equipment_metadata', true );
                $link           = isset( $equipment_meta['equipmentLink'] ) && $equipment_meta['equipmentLink'] ? $equipment_meta['equipmentLink'] : '';
                $label          = isset( $equipment_meta['equipmentLinkLabel'] ) && $equipment_meta['equipmentLinkLabel'] ? $equipment_meta['equipmentLinkLabel'] : __('Buy Now', 'delicious-recipes-pro');
                $no_follow      = isset( $equipment_meta['addRelNofollow']['0'] ) && 'yes' === $equipment_meta['addRelNofollow']['0'] ? 'nofollow' : '';
                $sponsored      = isset( $equipment_meta['addRelSponsored']['0'] ) && 'yes' === $equipment_meta['addRelSponsored']['0'] ? 'sponsored' : '';
                $new_tab        = isset( $equipment_meta['openInNewWindow']['0'] ) && 'yes' === $equipment_meta['openInNewWindow']['0'] ? '_blank' : '_self';
                $rel            = implode( ' ', array( $no_follow, $sponsored ) );
                ?>
                <div class="item">
                    <div class="dr-es-item-wrap">
                        <div class="dr-quipment-img-wrap">
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
                                    if( has_post_thumbnail( $equipment_ID ) ) { 
                                        echo get_the_post_thumbnail( $equipment_ID, $img_size ); 
                                    } else {
                                        delicious_recipes_get_fallback_svg( 'recipe-archive-grid' );
                                    }

                                if( $link ) {
                                    echo '</a>';
                                } ?>
                            </figure>
                        </div>
                        <div class="dr-equipment-title-wrap">
                            <h3 class="dr-equipment-title">
                                <?php if( $link ) { 
                                    echo sprintf(
                                        '<a href="%s" rel="%s" target="%s"/>',
                                        esc_url( $link ),
                                        trim( $rel ),
                                        $new_tab
                                    );
                                } 
                                    echo apply_filters( 'the_title', $equipment_post->post_title, $equipment_post->ID );

                                if( $link ) {
                                    echo '</a>';
                                } ?>
                            </h3>
                            <?php if( $link ) : 
                                echo sprintf(
                                    '<a href="%s" rel="%s" target="%s" class="dr-btn"/>',
                                    esc_url( $link ),
                                    trim( $rel ),
                                    $new_tab
                                );
                                    echo esc_html( $label ); ?> 
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14.193" height="9.647" viewBox="0 0 14.193 9.647">
                                            <g id="Group_4135" data-name="Group 4135" transform="translate(0.5 0.707)">
                                                <path id="Path_26348" data-name="Path 26348" d="M7820.11-1126.021l4.117,4.116-4.117,4.116" transform="translate(-7811.241 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1"/>
                                                <path id="Path_26365" data-name="Path 26365" d="M6555.283-354.415h-12.624" transform="translate(-6542.659 358.532)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1"/>
                                            </g>
                                        </svg>
                                    </i>
                                <?php echo '</a>'; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ( $enable_disclosure && $disclosure_content ) :
            $data = array(
                'disclosure_content' => $disclosure_content
            );
    
            delicious_recipes_pro_get_template( 'affiliate-disclosure.php', $data );
        endif; ?>
    </div>
<?php endif;
