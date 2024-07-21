<?php 
/**
* Cookery Metabox for Sidebar Layout
*
* @package Cookery
*
*/ 

function cookery_add_sidebar_layout_box(){
    $post_id   = isset( $_GET['post'] ) ? $_GET['post'] : '';
    $shop_id   = get_option( 'woocommerce_shop_page_id' );
    $template  = get_post_meta( $post_id, '_wp_page_template', true );
    $templates = array( 'templates/contact.php', 'templates/blossom-portfolio.php' ); //@todo change the template accordingly if it's a raratheme's theme.
    
    /**
     * Remove sidebar metabox in specific page template.
    */
    if( ! in_array( $template, $templates ) && ( $shop_id != $post_id ) ){
        add_meta_box( 
            'cookery_sidebar_layout',
            __( 'Sidebar Layout', 'cookery' ),
            'cookery_sidebar_layout_callback', 
            'page',
            'normal',
            'high'
        );
    }
    
    //for post
    add_meta_box( 
        'cookery_sidebar_layout',
        __( 'Sidebar Layout', 'cookery' ),
        'cookery_sidebar_layout_callback', 
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'cookery_add_sidebar_layout_box' );

$cookery_sidebar_layout = array(    
    'default-sidebar'=> array(
    	 'value'     => 'default-sidebar',
    	 'label'     => __( 'Default Sidebar', 'cookery' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/default-sidebar.png'
   	),
    'no-sidebar'     => array(
    	 'value'     => 'no-sidebar',
    	 'label'     => __( 'Full Width', 'cookery' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/full-width.png'
   	),  
    'centered'     => array(
    	 'value'     => 'centered',
    	 'label'     => __( 'Full Width Centered', 'cookery' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/full-width-centered.png'
   	),
    'left-sidebar' => array(
         'value'     => 'left-sidebar',
    	 'label'     => __( 'Left Sidebar', 'cookery' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'         
    ),
    'right-sidebar' => array(
         'value'     => 'right-sidebar',
    	 'label'     => __( 'Right Sidebar', 'cookery' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'         
     )    
);

function cookery_sidebar_layout_callback(){
    global $post , $cookery_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'cookery_nonce' );
    $sidebars = cookery_get_dynamnic_sidebar( false, true, true );
    $sidebar  = get_post_meta( $post->ID, '_cookery_sidebar', true ); ?>     
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'cookery' ); ?></em></td>
        </tr>    
        <tr>
            <td>
                <?php  
                    foreach( $cookery_sidebar_layout as $field ){  
                        $layout = get_post_meta( $post->ID, '_cookery_sidebar_layout', true ); ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="cookery_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />                               
                            </label>
                        </div>
                        <?php 
                    } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td colspan="3"><em class="f13"><?php esc_html_e( 'Choose Sidebar', 'cookery' ); ?></em></td>
        </tr>        
        <tr>
            <td>
                <select name="cookery_sidebar">
                <?php 
                    foreach( $sidebars as $k => $v ){ ?>
                        <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $sidebar, $k ); if( empty( $sidebar ) && $k == 'default-sidebar' ){ echo "selected='selected'";}?> ><?php echo esc_html( $v ); ?></option>
                    <?php }
                ?>
                </select>
            </td>    
        </tr>        
        <tr>
            <td><em class="f13"><?php printf( esc_html__( 'You can set up the sidebar content from %s', 'cookery' ), '<a href="'. esc_url( admin_url( 'widgets.php' ) ) .'">here</a>' ); ?></em></td>
        </tr>
    </table>
 <?php 
}

function cookery_save_sidebar_layout( $post_id ){
    global $cookery_sidebar_layout;

    // Verify the nonce before proceeding.
    if( !isset( $_POST[ 'cookery_nonce' ] ) || !wp_verify_nonce( $_POST[ 'cookery_nonce' ], basename( __FILE__ ) ) )
        return;
    
    // Stop WP from clearing custom fields on autosave
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;

    if( 'page' == $_POST['post_type'] ){  
        if( ! current_user_can( 'edit_page', $post_id ) ) return $post_id;  
    }elseif( ! current_user_can( 'edit_post', $post_id ) ){  
        return $post_id;  
    }
    
    // Make sure that it is set.
	if( ! isset( $_POST['cookery_sidebar'] ) ){
		return;
	}
    
    $layout = isset( $_POST['cookery_sidebar_layout'] ) ? sanitize_key( $_POST['cookery_sidebar_layout'] ) : 'default-sidebar';

    if( array_key_exists( $layout, $cookery_sidebar_layout ) ){
        update_post_meta( $post_id, '_cookery_sidebar_layout', $layout );
    }else{
        delete_post_meta( $post_id, '_cookery_sidebar_layout' );
    }
     
    // Sanitize user input.
	$sidebar = sanitize_text_field( $_POST['cookery_sidebar'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_cookery_sidebar', $sidebar );      
}
add_action( 'save_post' , 'cookery_save_sidebar_layout' );