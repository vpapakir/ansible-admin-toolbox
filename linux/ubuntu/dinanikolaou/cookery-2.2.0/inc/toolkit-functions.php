<?php
/**
 * Toolkit Filters
 *
 * @package Cookery
 */

if( ! function_exists( 'cookery_default_image_text_size' ) ) :
    function cookery_default_image_text_size(){
        return 'cookery-promo';
    }
endif;
add_filter( 'bttk_it_img_size', 'cookery_default_image_text_size' );

if( ! function_exists( 'cookery_author_image' ) ) :
    function cookery_author_image(){
       return 'full';
    }
endif;
add_filter( 'author_bio_img_size', 'cookery_author_image' );

if( ! function_exists( 'cookery_featured_page_alignment' ) ) :
    function cookery_featured_page_alignment(){
        
        $array = array(
            'right'     => __( 'Right', 'cookery' ),
            'left'      => __( 'Left', 'cookery' ),
        );

        return $array;
    }
endif;
add_filter( 'blossomthemes_cta_button_alignment', 'cookery_featured_page_alignment' );

if( ! function_exists( 'cookery_defer_js_files' ) ) :
    function cookery_defer_js_files(){
        $defer_js = get_theme_mod( 'ed_defer', false );

        return ( $defer_js ) ? false : true;
    }
endif;
add_filter( 'bttk_public_assets_enqueue', 'cookery_defer_js_files' );
add_filter( 'btif_public_assets_enqueue', 'cookery_defer_js_files' );
add_filter( 'bten_public_assets_enqueue', 'cookery_defer_js_files' );

if( ! function_exists( 'cookery_featured_page_widget_filter' ) ) :
/**
 * Filter for Featured page widget
*/
function cookery_featured_page_widget_filter( $html, $args, $instance ){ 
    $read_more         = !empty( $instance['readmore'] ) ? $instance['readmore'] : __( 'Read More', 'cookery' );      
    $show_feat_img     = !empty( $instance['show_feat_img'] ) ? $instance['show_feat_img'] : '' ;  
    $show_page_content = !empty( $instance['show_page_content'] ) ? $instance['show_page_content'] : '' ;        
    $show_readmore     = !empty( $instance['show_readmore'] ) ? $instance['show_readmore'] : '' ;        
    $page_list         = !empty( $instance['page_list'] ) ? $instance['page_list'] : 1 ;
    $image_alignment   = !empty( $instance['image_alignment'] ) ? $instance['image_alignment'] : 'left' ;
    if( !isset( $page_list ) || $page_list == '' ) return;
    
    $post_no = get_post( $page_list ); 
    
    $target = 'target="_blank"';
    if( isset($instance['target']) && $instance['target']!='' ) {
        $target = 'target="_self"';
    }
    
    if( $post_no ){
        setup_postdata( $post_no );
        ob_start(); ?>
        <div class="widget-featured-holder <?php echo esc_attr($image_alignment);?>">
                <?php
                if( ( has_post_thumbnail( $post_no ) ) && $show_feat_img ){ ?>
                <div class="img-holder">
                    <a <?php echo $target;?> href="<?php the_permalink( $post_no ); ?>">
                        <?php 
                        $featured_img_size = apply_filters( 'featured_img_size', 'full' );
                        if( has_post_thumbnail( $post_no ) ) echo get_the_post_thumbnail( $post_no, $featured_img_size ); ?>
                    </a>
                </div>
                <?php } ?>
                <div class="text-holder">
                    <?php 
                    echo is_page_template( 'templates/about.php' ) ? '<h1 class="widget-title">' : $args['before_title']; //Done for SEO
                    echo esc_html( $post_no->post_title );
                    echo is_page_template( 'templates/about.php' ) ? '</h1>' : $args['after_title'];
                    ?>
                    <div class="featured_page_content">
                        <?php 
                        if( isset( $show_page_content ) && $show_page_content!='' ){
                            echo apply_filters( 'the_content', $post_no->post_content );                                
                        }else{
                            echo apply_filters( 'the_excerpt', get_the_excerpt( $post_no ) );                                
                        }
                        
                        if( isset( $show_readmore ) && $show_readmore!='' ){ ?>
                            <a href="<?php the_permalink( $post_no ); ?>" <?php echo $target;?> class="btn-readmore"><?php echo esc_html( $read_more );?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>                    
        </div>                    
        <?php    
        $html = ob_get_clean();
        wp_reset_postdata();
        return $html;
    }
}
endif;
add_filter( 'blossom_featured_page_widget_filter', 'cookery_featured_page_widget_filter', 10, 3 );

if( ! function_exists( 'cookery_cta_widget_filter' ) ) :
/**
 * Filter for CTA widget
*/
function cookery_cta_widget_filter( $html, $args, $instance ){ 
        
    $title            = ! empty( $instance['title'] ) ? $instance['title'] : '' ;        
    $content          = ! empty( $instance['content'] ) ? $instance['content'] : '';
    $button_alignment = ! empty( $instance['button_alignment'] ) ? $instance['button_alignment'] : '';
    $button_number    = ! empty( $instance['button_number'] ) ? $instance['button_number'] : '1';
    $button1_text     = ! empty( $instance['button1_text'] ) ? $instance['button1_text'] : '' ;
    $button2_text     = ! empty( $instance['button2_text'] ) ? $instance['button2_text'] : '' ;
    $button1_url      = ! empty( $instance['button1_url'] ) ? $instance['button1_url'] : '' ;
    $button2_url      = ! empty( $instance['button2_url'] ) ? $instance['button2_url'] : '' ;

    $bgcolor          = apply_filters('bttk_bg_color','#fff');
    $widget_bg_color  = ! empty($instance['widget-bg-color']) ? esc_attr($instance['widget-bg-color']) : $bgcolor;
    $widget_bg_image  = !empty($instance['widget-bg-image']) ? esc_attr($instance['widget-bg-image']) : '';

    $target = 'target="_self"';
    if( isset($instance['target']) && $instance['target']!='' ){
        $target = 'target="_blank"';
    }

    // echo $args['before_widget'];
    ob_start();
    $image_source = '';

    $size = apply_filters('bttk_cta_img_size','full');
    if( $widget_bg_image ){
        /** Added to work for demo content compatible */   
        $attachment_id = $widget_bg_image;
        $cta_img_size = apply_filters('cta_img_size','full');

        if ( !filter_var( $widget_bg_image, FILTER_VALIDATE_URL ) === false ) {
            $attachment_id = bttk_get_attachment_id( $widget_bg_image );
        }

        $image_url   = wp_get_attachment_image_url( $attachment_id, $cta_img_size );
        $image_source   = wp_get_attachment_image( $attachment_id, $cta_img_size );
    }

    $ctaclass = ' text';
    $bg = ' style="background:' . sanitize_hex_color( $widget_bg_color ) . '"';

    ?>        
    <div class="<?php echo esc_attr( $button_alignment . $ctaclass ); ?>"<?php echo $bg;?>>
        <div class="container">
            <?php if( $image_source ) echo '<div class="cta-img-holder">' . $image_source . '</div>'; ?>
            <div class="blossomtheme-cta-container">
                <?php
                if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance ) . $args['after_title']; ?>
                <div class="text-holder">
                    <?php if( $content ) echo wpautop( wp_kses_post( $content ) ); ?>
                    <div class="button-wrap">
                        <?php
                            if( $button_number == '1' )
                            {
                                if( isset( $button1_text ) && $button1_url !='' ) echo '<a '.$target. 'href="' . esc_url( $button1_url ) . '" class="btn-cta btn-1">' . esc_html( $button1_text ) . '</a>';
                            }
                            if( $button_number == '2' )
                            {
                                if( isset( $button1_text ) && $button1_url !='' ) echo '<a '.$target. ' href="' . esc_url( $button1_url ) . '" class="btn-cta btn-1">' . esc_html( $button1_text ) . '</a>';
                                if( isset( $button2_text ) && $button2_url !='' ) echo '<a '.$target. '  href="' . esc_url( $button2_url ) . '" class="btn-cta btn-2">' . esc_html( $button2_text ) . '</a>';
                            }
                        ?>
                    </div>
                </div>
            </div> 
        </div>        
    </div>        
    <?php 
    $html = ob_get_clean();
    wp_reset_postdata();
    return $html;
}
endif;
add_filter( 'blossom_cta_widget_filter', 'cookery_cta_widget_filter', 10, 3 );