<?php
/**
 * Customizer Control: cookery-customizer-reset
 *
 * @package Cookery
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Cookery_Customizer_Reset_Control' ) ) {
	/**
	 * Migration control.
    */
	class Cookery_Customizer_Reset_Control extends Wp_Customize_Control {

		public $type = 'cookery-customizer-reset';
        
        public function enqueue() {
			wp_enqueue_style( 'jquery-confirm', get_template_directory_uri() . '/inc/css/jquery-confirm.min.css', array(), '3.3.4' );
            wp_enqueue_script( 'jquery-confirm', get_template_directory_uri() . '/inc/js/jquery-confirm.min.js', array( 'jquery' ), '3.3.4', true );
            wp_enqueue_style( 'cookery-customizer-reset', get_template_directory_uri() . '/inc/custom-controls/reset/customizer-reset.css', array(), COOKERY_THEME_VERSION );
            wp_enqueue_script( 'cookery-customizer-reset', get_template_directory_uri() . '/inc/custom-controls/reset/customizer-reset.js', array( 'jquery' ), COOKERY_THEME_VERSION, true );
            wp_localize_script( 'cookery-customizer-reset', 'Cookery_Reset', array(
				'title'   => __( 'ARE YOU SURE?', 'cookery' ),
                'content' => __( '<p>Pressing <strong>"Y"</strong> will remove all customizations ever made via customizer in this theme.</p><strong class="danger_info">!!! THIS ACTION IS IRREVERSIBLE !!!</strong><p>Please click <strong>"NO"</strong> or press <strong>"N"</strong> if you do not wish to do so.</p>', 'cookery' ),
				'nonce'   => wp_create_nonce( 'cookery-customizer-reset' )
			) );
		}
        
		public function render_content(){
            if( $this->label ){
                echo '<span class="customize-reset-title customize-control-title">';
                echo esc_html( $this->label );
                echo '</span>';
            }
    
    		if( $this->description ){
    			echo '<span class="customize-reset-description customize-control-description">';
    			echo wp_kses_post( $this->description );
    			echo '</span>';
    		}
            ?>
            <div id="customizer_reset_btn">
				<button type="button" class="button button-secondary" id="customizer_reset"><?php esc_html_e( 'Reset !!!', 'cookery' ); ?></button>	
			</div>
            <?php
        }
	}
}