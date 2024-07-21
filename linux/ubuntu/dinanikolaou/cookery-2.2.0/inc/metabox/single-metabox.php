<?php 
/**
* Metabox for Single Layouts
*
* @package Cookery
*
*/ 

function cookery_add_single_layout_box(){ 

    //for post
    add_meta_box( 
        'cookery_single_layout',
        __( 'Single Layout', 'cookery' ),
        'cookery_single_layout_callback', 
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'cookery_add_single_layout_box' );

$cookery_single_layout = array(    
    'default'=> array(
         'value'     => 'default',
         'label'     => __( 'Default Layout', 'cookery' ),
         'thumbnail' => get_template_directory_uri() . '/images/single/default.jpg'
    ),
    'layout-one'=> array(
         'value'     => 'one',
         'label'     => __( 'Layout One', 'cookery' ),
         'thumbnail' => get_template_directory_uri() . '/images/single/one.jpg'
    ),
    'layout-two'     => array(
         'value'     => 'two',
         'label'     => __( 'Layout Two', 'cookery' ),
         'thumbnail' => get_template_directory_uri() . '/images/single/two.jpg'
    ),   
);

function cookery_single_layout_callback(){
    global $post , $cookery_single_layout;
    wp_nonce_field( basename( __FILE__ ), 'cookery_single_nonce' ); ?>     
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Layouts', 'cookery' ); ?></em></td>
        </tr>    
        <tr>    
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Set to blank so that the layouts works as per customizer settings.', 'cookery' ); ?></em></td>
        </tr>    
        <tr>
            <td>
                <?php  
                    foreach( $cookery_single_layout as $field ){  
                        $layout = get_post_meta( $post->ID, '_cookery_single_layout', true ); ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="cookery_single_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default' ); }?>/>
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php esc_attr_e( 'thumbnail', 'cookery' ); ?>" />                               
                            </label>
                        </div>
                        <?php 
                    } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>
 <?php 
}

function cookery_save_single_layout( $post_id ){
    global $cookery_single_layout , $post;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'cookery_single_nonce' ] ) || !wp_verify_nonce( $_POST[ 'cookery_single_nonce' ], basename( __FILE__ ) ) )
        return;
    
    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;

    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    foreach( $cookery_single_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, '_cookery_single_layout', true ); 
        $new = sanitize_text_field( $_POST['cookery_single_layout'] );
        if( $new && $new != $old ) {  
            update_post_meta( $post_id, '_cookery_single_layout', $new );  
        }elseif( '' == $new && $old ) {  
            delete_post_meta( $post_id, '_cookery_single_layout', $old );  
        } 
    } // end foreach
          
}
add_action( 'save_post' , 'cookery_save_single_layout' );