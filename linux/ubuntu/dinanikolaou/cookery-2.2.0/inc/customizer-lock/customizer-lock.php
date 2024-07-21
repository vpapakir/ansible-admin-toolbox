<?php
/**
 * Cookery Customizer Lock Class
 * 
 * @package Cookery
 */
class Cookery_Customizer_Lock {

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Cookery_Customizer_Lock();
        }

        return self::$instance;
    }

    public function __construct() {
        if( $this->meets_requirements() ) $this->init_hooks();

        // Allow 3rd party to remove hooks.
		do_action( 'cookery_customizer_lock_unhook', $this );

    }

    /**
    * Check if all conditions met.
    *
    * @return bool True if requirements are met, otherwise false.
    */
    private function meets_requirements() {
        if( !$this->cookery_version_update() ) return false;
        $license_key      = get_option( 'cookery_license_key' );
        $activate_license = get_option( 'cookery_license_key_status' );
        $statuses         = array( 'invalid', 'inactive', 'expired', 'disabled', 'site_inactive','item_name_mismatch' );
        if( empty( $license_key ) || in_array( $activate_license, $statuses ) ) {
            if( !( $this->cookery_gets_current_date_after_update() > 30 ) && ( ( $activate_license === 'item_name_mismatch' ) || ( $activate_license === 'site_inactive' ) || ( $activate_license === 'invalid' )) ){
                return false;
            }
            return true;
        }else{
            return false;
        }
    }


    public function init_hooks(){
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) ,9999);
        add_action( 'customize_preview_init', array( $this, 'enqueue_preview' ) );
    }

    public function cookery_version_update() {
        $theme = wp_get_theme();
        $current_version = $theme->get('Version');
    
        if (version_compare($current_version, '2.1.8', '>')) {
            return true;
        }else{
            return false;
        }
    }

    public function cookery_gets_modified_version_date(){
        $theme = wp_get_theme();
        $style_css_path = $theme->get_stylesheet_directory() . '/style.css';
        if (file_exists($style_css_path)) {
            $last_modified_time = filemtime($style_css_path);
            return date('Y-m-d H:i:s', $last_modified_time);
        }
    }

    public function cookery_gets_current_date_after_update(){
        if( $this->cookery_version_update() ){
           
           $current_date = $this-> cookery_gets_modified_version_date();

            // QA to check if its done today
            // $timestamp = current_time('timestamp') - ( 31 * DAY_IN_SECONDS );
            // $current_date = date('Y-m-d H:i:s', $timestamp);

            if( $current_date ){
                $update_timestamp = strtotime($current_date);
                $current_timestamp = current_time('timestamp');
                $date_after_update = floor(($current_timestamp - $update_timestamp) / (DAY_IN_SECONDS));

                return $date_after_update;
            }
        }else{
            return false;
        }
    }
    
    public function enqueue() {
        $updater_data = get_option( 'cookery_license_details', [] );

        wp_enqueue_script( 
            'customizer-lock-js', 
            get_template_directory_uri() . '/inc/customizer-lock/customizer-lock.js', 
            array( 'jquery' ),
            null,
            true
        );

        wp_localize_script(
            'customizer-lock-js',
            'customizerRestriction',
            array(
                'url'          => esc_url( admin_url() . "admin.php?page=cookery-dashboard#license" ),
                'account_url'  => esc_url('https://blossomthemes.com/my-account/?utm_source=cookery&utm_medium=customizer&utm_campaign=account'),
                'updater'      => $updater_data,
                'theme_ver'    => $this->cookery_version_update(),
                'updated_date' => $this->cookery_gets_current_date_after_update()
            )
        );
        wp_enqueue_style( 
            'customizer-lock-css',
            get_template_directory_uri() . '/inc/customizer-lock/customizer-lock.css' 
        );
    }

    public function enqueue_preview() {
        wp_enqueue_style( 
            'customizer-preview-css',
            get_template_directory_uri() . '/inc/customizer-lock/customizer-preview.css' 
        );
    }
}


// Instantiate the class
$customizer_lock = Cookery_Customizer_Lock::getInstance();