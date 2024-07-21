<?php
// Class to handle emojis
class Delicious_Recipes_Pro_Emojis {
    // Constructor
    public function __construct() {
        // Register actions
        add_action( 'delicious_recipes_single_after_content_end', array( $this, 'show_emoji_reaction_section' ), 60 );

        // Ajax actions
        add_action( 'wp_ajax_delicious_recipes_pro_add_reaction', array( $this, 'add_emoji_reaction' ) );
        add_action( 'wp_ajax_nopriv_delicious_recipes_pro_add_reaction', array( $this, 'add_emoji_reaction' ) );

		// Ajax fetch reactions
        add_action( 'wp_ajax_delicious_recipes_pro_fetch_reactions', array( $this, 'fetch_emoji_reaction' ) );
        add_action( 'wp_ajax_nopriv_delicious_recipes_pro_fetch_reactions', array( $this, 'fetch_emoji_reaction' ) );
    }

    // Register emojis
    public function get_emojis() {
        $defaults = array(
            'love'   => array(
                'id'    => 'love',
                'title' => esc_html__( 'Love' ,'delicious-recipes-pro'),
                'icon'  => $this->get_reaction_svg('love')
            ),
			'wow'   => array(
                'id'    => 'wow',
                'title' => esc_html__( 'Wow' ,'delicious-recipes-pro'),
                'icon'  => $this->get_reaction_svg('wow')
            ),
			'happy'  => array(
				'id'    => 'happy',
				'title' => esc_html__( 'Happy' , 'delicious-recipes-pro'),
				'icon'  => $this->get_reaction_svg('happy')
			),
            'sad'    => array(
                'id'    => 'sad',
                'title' => esc_html__( 'Sad','delicious-recipes-pro'),
                'icon'  => $this->get_reaction_svg('sad')
            ),
			'yay'    => array(
                'id'    => 'yay',
                'title' => esc_html__( 'Yay','delicious-recipes-pro'),
                'icon'  => $this->get_reaction_svg('yay')
            ),
			'rolf'    => array(
                'id'    => 'rolf',
                'title' => esc_html__( 'ROLF','delicious-recipes-pro'),
                'icon'  => $this->get_reaction_svg('rolf')
            ),
			'smiling'    => array(
                'id'    => 'smiling',
                'title' => esc_html__( 'Smiling','delicious-recipes-pro'),
                'icon'  => $this->get_reaction_svg('smiling')
            ),
			'sleepy' => array(
				'id'    => 'sleepy',
				'title' => esc_html__( 'Sleepy', 'delicious-recipes-pro' ),
				'icon'  => $this->get_reaction_svg('sleepy')
			),
			'angry'  => array(
				'id'    => 'angry',
				'title' => esc_html__( 'Angry' , 'delicious-recipes-pro'),
				'icon'  => $this->get_reaction_svg('angry')
			),
			'dead'   => array(
				'id'    => 'dead',
				'title' => esc_html__( 'Dead', 'delicious-recipes-pro' ),
				'icon'  => $this->get_reaction_svg('dead')
			),
			'wink'   => array(
				'id'    => 'wink',
				'title' => esc_html__( 'Wink', 'delicious-recipes-pro' ),
				'icon'  => $this->get_reaction_svg('wink')
			),
            'yummy'   => array(
				'id'    => 'yummy',
				'title' => esc_html__( 'Yummy', 'delicious-recipes-pro' ),
				'icon'  => $this->get_reaction_svg('yummy')
			),
        );
        return apply_filters( 'delicious_recipes_add_reaction', $defaults );
    }

    /**
     * Get reaction SVG
     */
    public function get_reaction_svg( $icon ){
        if( ! $icon ){
            return;
        }
        switch( $icon ){
            case 'love':
                return '
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_28_1087)"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                    <path d="M5.27455 6.11466C7.91553 5.42111 11.9953 8.10042 11.9953 8.10042C11.9953 8.10042 16.0751 5.42111 18.7161 6.11466C21.4384 6.82959 23.2088 10.3947 21.0079 14C18.5772 17.9818 11.9953 22 11.9953 22C11.9953 22 5.4257 17.9818 2.99496 14C0.794065 10.3947 2.55216 6.82959 5.27455 6.11466Z" fill="#F83939"/>
                    <path d="M29.2745 6.11466C31.9155 5.42111 35.9953 8.10042 35.9953 8.10042C35.9953 8.10042 40.0751 5.42111 42.7161 6.11466C45.4384 6.82959 47.2088 10.3947 45.0079 14C42.5772 17.9818 35.9953 22 35.9953 22C35.9953 22 29.4257 17.9818 26.995 14C24.7941 10.3947 26.5522 6.82959 29.2745 6.11466Z" fill="#F83939"/>
                    <path d="M12 28H36C36 34.6274 30.6274 40 24 40C17.3726 40 12 34.6274 12 28Z" fill="#171614"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M31.875 37C29.7596 38.8671 26.9808 40 23.9375 40C20.8941 40 18.1154 38.8671 16 37C18.1154 35.1329 20.8941 34 23.9375 34C26.9808 34 29.7596 35.1329 31.875 37Z" fill="#FF3636"/>
                    <defs>
                    <linearGradient id="paint0_linear_28_1087" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFA200"/>
                    <stop offset="1" stop-color="#FFBF00"/>
                    </linearGradient>
                    </defs>
                </svg>';
            break;
    
            case 'wow':
                return'<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_28_1116)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 9C14.3016 9 13.863 9.11393 13.3929 9.31478C13.0989 9.44034 12.8466 9.59551 12.6417 9.76696C12.2181 10.1214 11.5875 10.0653 11.2331 9.64169C10.8787 9.21811 10.9348 8.58743 11.3583 8.23304C11.7253 7.92597 12.1483 7.67158 12.6072 7.47556C13.3137 7.17375 14.0188 7 15 7C15.9812 7 16.6863 7.17375 17.3929 7.47556C17.8517 7.67158 18.2747 7.92597 18.6417 8.23304C19.0653 8.58743 19.1214 9.21811 18.767 9.64169C18.4126 10.0653 17.7819 10.1214 17.3583 9.76696C17.1534 9.59551 16.9011 9.44034 16.6072 9.31478C16.137 9.11393 15.6984 9 15 9Z" fill="#171614"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M33 9C32.4015 9 31.8526 9.1184 31.3929 9.31478C31.0989 9.44034 30.8466 9.59551 30.6417 9.76696C30.2181 10.1214 29.5875 10.0653 29.2331 9.64169C28.8787 9.21811 28.9348 8.58743 29.3583 8.23304C29.7253 7.92597 30.1483 7.67158 30.6072 7.47556C31.3242 7.16928 32.1414 7 33 7C33.8587 7 34.6759 7.16928 35.3929 7.47556C35.8517 7.67158 36.2747 7.92597 36.6417 8.23304C37.0653 8.58743 37.1214 9.21811 36.767 9.64169C36.4126 10.0653 35.7819 10.1214 35.3583 9.76696C35.1534 9.59551 34.9011 9.44034 34.6072 9.31478C34.1475 9.1184 33.5985 9 33 9Z" fill="#171614"/>
                <circle cx="15" cy="17" r="3" fill="#171614"/>
                <circle cx="16" cy="16" r="1" fill="white" fill-opacity="0.75"/>
                <circle cx="33" cy="17" r="3" fill="#171614"/>
                <circle cx="34" cy="16" r="1" fill="white" fill-opacity="0.75"/>
                <ellipse cx="24" cy="31" rx="8" ry="10" fill="#171614"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5231 34.564C18.5641 32.958 21.1389 32 23.9376 32C26.7822 32 29.3957 32.9898 31.4523 34.6438C30.2871 38.3648 27.3898 41 24 41C20.5862 41 17.6717 38.327 16.5231 34.564Z" fill="#FF3636"/>
                <defs>
                <linearGradient id="paint0_linear_28_1116" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
            </svg>';
            break;
    
            case 'sad':
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1182)"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                    <circle cx="15" cy="19.0001" r="3" fill="#171614"/>
                    <circle cx="16" cy="18.0001" r="1" fill="white" fill-opacity="0.75"/>
                    <circle cx="33" cy="19.0001" r="3" fill="#171614"/>
                    <circle cx="34" cy="18.0001" r="1" fill="white" fill-opacity="0.75"/>
                    <path d="M18 31C19.2771 29.1939 21.4873 28 24 28C26.5127 28 28.7229 29.1939 30 31" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_34_1182" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFA200"/>
                    <stop offset="1" stop-color="#FFBF00"/>
                    </linearGradient>
                    </defs>
                </svg>';
            break;
    
            case 'yay':
                return'<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1204)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path d="M30 30C28.7229 31.8061 26.5127 33 24 33C21.4873 33 19.2771 31.8061 18 30" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M12 18C12.5321 17.398 13.4531 17 14.5 17C15.5469 17 16.4679 17.398 17 18" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M31 18C31.5321 17.398 32.4531 17 33.5 17C34.5469 17 35.4679 17.398 36 18" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <g filter="url(#filter0_f_34_1204)">
                <circle cx="11" cy="25" r="3" fill="#FF3636"/>
                </g>
                <g filter="url(#filter1_f_34_1204)">
                <circle cx="37" cy="25" r="3" fill="#FF3636"/>
                </g>
                <defs>
                <filter id="filter0_f_34_1204" x="2" y="16" width="18" height="18" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="3" result="effect1_foregroundBlur_34_1204"/>
                </filter>
                <filter id="filter1_f_34_1204" x="28" y="16" width="18" height="18" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="3" result="effect1_foregroundBlur_34_1204"/>
                </filter>
                <linearGradient id="paint0_linear_34_1204" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;
    
            case 'rolf' :
                return'<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="23.9999" cy="24" r="22" transform="rotate(-30 23.9999 24)" fill="url(#paint0_linear_34_1224)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6454 3.2616C8.71743 10.0109 6.48345 21.6605 11.8756 31C17.2677 40.3395 28.4737 44.2296 38.2827 40.7384C37.2785 41.5933 36.1829 42.3696 34.9999 43.0526C24.4775 49.1277 11.0225 45.5224 4.94739 35C-1.12774 24.4776 2.47751 11.0226 12.9999 4.94745C14.1829 4.26445 15.403 3.70381 16.6454 3.2616Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6454 3.2616C8.71743 10.0109 6.48345 21.6605 11.8756 31C17.2677 40.3395 28.4737 44.2296 38.2827 40.7384C37.2785 41.5933 36.1829 42.3696 34.9999 43.0526C24.4775 49.1277 11.0225 45.5224 4.94739 35C-1.12774 24.4776 2.47751 11.0226 12.9999 4.94745C14.1829 4.26445 15.403 3.70381 16.6454 3.2616Z" fill="black" fill-opacity="0.03"/>
                <path d="M11.2416 27.9019C11.2416 27.9019 11.9497 26.6693 14.2057 25.0359C15.1546 24.3488 16.8038 23.5359 16.8038 23.5359L9.6076 23.0718" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M33.7582 14.9019C33.7582 14.9019 32.3367 14.8989 29.7941 16.0359C28.7246 16.5142 27.196 17.5359 27.196 17.5359L30.3922 11.0718" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.6077 33.4641L36.3923 21.4641C39.706 27.2036 37.7395 34.5427 32 37.8564C26.2605 41.1701 18.9214 39.2036 15.6077 33.4641Z" fill="#171614"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M37.3199 31.3209C36.4214 33.9955 34.5814 36.366 31.9458 37.8877C29.3102 39.4094 26.3373 39.8176 23.5718 39.2584C24.4702 36.5837 26.3102 34.2132 28.9458 32.6915C31.5814 31.1699 34.5543 30.7616 37.3199 31.3209Z" fill="#FF3636"/>
                <defs>
                <linearGradient id="paint0_linear_34_1224" x1="36.0999" y1="3.65001" x2="11.3499" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;
    
            case 'smiling' :
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1245)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path d="M30 30C28.7229 31.8061 26.5127 33 24 33C21.4873 33 19.2771 31.8061 18 30" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M12 18C12.5321 17.398 13.4531 17 14.5 17C15.5469 17 16.4679 17.398 17 18" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M31 18C31.5321 17.398 32.4531 17 33.5 17C34.5469 17 35.4679 17.398 36 18" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <g filter="url(#filter0_f_34_1245)">
                <circle cx="11" cy="25" r="3" fill="#FF3636" fill-opacity="0.5"/>
                </g>
                <g filter="url(#filter1_f_34_1245)">
                <circle cx="37" cy="25" r="3" fill="#FF3636" fill-opacity="0.5"/>
                </g>
                <path d="M4.29218 30.0788C6.14087 29.602 8.99671 31.444 8.99671 31.444C8.99671 31.444 11.8525 29.602 13.7012 30.0788C15.6069 30.5703 16.8462 33.0214 15.3056 35.5C13.604 38.2375 8.99671 41 8.99671 41C8.99671 41 4.39799 38.2375 2.69647 35.5C1.15585 33.0214 2.38651 30.5703 4.29218 30.0788Z" fill="#F83939"/>
                <path d="M34.2922 2.07883C36.1409 1.60201 38.9967 3.44404 38.9967 3.44404C38.9967 3.44404 41.8525 1.60201 43.7012 2.07883C45.6069 2.57034 46.8462 5.02137 45.3056 7.5C43.604 10.2375 38.9967 13 38.9967 13C38.9967 13 34.398 10.2375 32.6965 7.5C31.1558 5.02137 32.3865 2.57034 34.2922 2.07883Z" fill="#F83939"/>
                <path d="M3.59632 6.21982C4.78207 5.54309 7.09917 6.30913 7.09917 6.30913C7.09917 6.30913 8.72282 4.48717 10.0881 4.48036C11.4954 4.47334 12.8118 5.96605 12.2154 7.99209C11.5567 10.2297 8.89791 13.0221 8.89791 13.0221C8.89791 13.0221 5.20505 11.9316 3.5158 10.3231C1.9863 8.86674 2.37403 6.9174 3.59632 6.21982Z" fill="#F83939"/>
                <defs>
                <filter id="filter0_f_34_1245" x="2" y="16" width="18" height="18" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="3" result="effect1_foregroundBlur_34_1245"/>
                </filter>
                <filter id="filter1_f_34_1245" x="28" y="16" width="18" height="18" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="3" result="effect1_foregroundBlur_34_1245"/>
                </filter>
                <linearGradient id="paint0_linear_34_1245" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;
                
            case 'happy':
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1151)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <circle cx="15" cy="19.0001" r="3" fill="#171614"/>
                <circle cx="16" cy="18.0001" r="1" fill="white" fill-opacity="0.75"/>
                <circle cx="33" cy="19.0001" r="3" fill="#171614"/>
                <circle cx="34" cy="18.0001" r="1" fill="white" fill-opacity="0.75"/>
                <path d="M12 28H36C36 34.6274 30.6274 40 24 40C17.3726 40 12 34.6274 12 28Z" fill="#171614"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M31.8749 37C29.7595 38.8671 26.9808 40 23.9375 40C20.8941 40 18.1154 38.8671 16 37C18.1154 35.1329 20.8941 34 23.9375 34C26.9808 34 29.7595 35.1329 31.8749 37Z" fill="#FF3636"/>
                <defs>
                <linearGradient id="paint0_linear_34_1151" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;
    
            case 'sleepy' :
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1291)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path d="M36 17C35.4679 17.602 34.5469 18 33.5 18C32.4531 18 31.5321 17.602 31 17" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M17 17C16.4679 17.602 15.5469 18 14.5 18C13.4531 18 12.5321 17.602 12 17" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M36 36L12 36C12 29.3726 17.3726 24 24 24C30.6274 24 36 29.3726 36 36Z" fill="#171614"/>
                <path d="M34 36L14 36C14 33.7909 15.7909 32 18 32L30 32C32.2091 32 34 33.7909 34 36Z" fill="#F83939"/>
                <path d="M41 3H45L41 7H45" stroke="#0AA32C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M34 9H37L34 12H37" stroke="#0AA32C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <defs>
                <linearGradient id="paint0_linear_34_1291" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;
    
            case 'angry' :
                return'<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1336)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <circle cx="16" cy="21" r="2" fill="#171614"/>
                <circle cx="32" cy="21" r="2" fill="#171614"/>
                <path d="M35.99 17L29.0001 21.0356" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M18.99 21.0356L12.0001 17" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M18 32H30" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <defs>
                <linearGradient id="paint0_linear_34_1336" x1="24" y1="2" x2="24" y2="46" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FF4D00"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;	
            
            case 'dead' :
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1363)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path d="M18 34H30" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13 17L19 23" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M29 17L35 23" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19 17L13 23" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M35 17L29 23" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M23 34H31V38C31 40.2091 29.2091 42 27 42C24.7909 42 23 40.2091 23 38V34Z" fill="#FF3636"/>
                <defs>
                <linearGradient id="paint0_linear_34_1363" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;	
    
            case 'wink' :
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_34_1392)"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <circle cx="15" cy="19.0001" r="3" fill="#171614"/>
                <circle cx="16" cy="18.0001" r="1" fill="white" fill-opacity="0.75"/>
                <path d="M36 21C36 21 34.7705 20.2866 32 20C30.8346 19.8794 29 20 29 20L35 16" stroke="#171614" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 28H36C36 34.6274 30.6274 40 24 40C17.3726 40 12 34.6274 12 28Z" fill="#171614"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M31.8749 37C29.7595 38.8671 26.9808 40 23.9375 40C20.8941 40 18.1154 38.8671 16 37C18.1154 35.1329 20.8941 34 23.9375 34C26.9808 34 29.7595 35.1329 31.8749 37Z" fill="#FF3636"/>
                <defs>
                <linearGradient id="paint0_linear_34_1392" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;

            case 'yummy' :
                return '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="22" fill="url(#paint0_linear_116_82)"/>
                <path d="M23.3159 32.1166L15.9872 29.9472L14.9714 25.7671C14.6293 24.359 15.3229 22.9043 16.6324 22.2837V22.2837C18.7662 21.2725 21.1897 22.9707 21.3313 25.3277C21.3568 25.7526 21.3955 26.157 21.4513 26.5194C21.8154 28.8853 23.3159 32.1166 23.3159 32.1166Z" fill="#FF3636"/>
                <path d="M19.5885 31.6417C19.5885 31.6417 18.6572 30.4775 18.1915 27.9163C17.7258 25.3551 17.7258 24.6566 17.7258 24.6566" stroke="#E33232" stroke-linecap="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28 2.36275C17.7595 4.24378 10 13.2157 10 24C10 34.7843 17.7595 43.7562 28 45.6372C26.7029 45.8755 25.366 46 24 46C11.8497 46 2 36.1503 2 24C2 11.8497 11.8497 2 24 2C25.366 2 26.7029 2.12449 28 2.36275Z" fill="black" fill-opacity="0.03"/>
                <path d="M12 18C12.5321 17.398 13.4531 17 14.5 17C15.5469 17 16.4679 17.398 17 18" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M31 18C31.5321 17.398 32.4531 17 33.5 17C34.5469 17 35.4679 17.398 36 18" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <path d="M34 27C31 32 27.0263 33 24.5 33C21.9737 33 17 32 14 27" stroke="#171614" stroke-width="2" stroke-linecap="round"/>
                <defs>
                <linearGradient id="paint0_linear_116_82" x1="36.1" y1="3.65" x2="11.35" y2="43.25" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFA200"/>
                <stop offset="1" stop-color="#FFBF00"/>
                </linearGradient>
                </defs>
                </svg>';
            break;
        }
    }

    public function get_reaction_by_id( $id ) {
        $reactions = $this->get_emojis();
        foreach ( $reactions as $reaction ) {
            if ( $reaction['id'] == $id ) {
                return $reaction;
            }
        }
        return false;
    }

    public function get_reaction_count( $post_id, $reaction_id ) {
        $reactions = get_post_meta( $post_id, 'delicious_recipes_reactions', true );
        $count = 0;
        if ( isset( $reactions[ $reaction_id ] ) && ! empty( $reactions[ $reaction_id ] ) ) {
            $count = count( $reactions[ $reaction_id ] );
        }
        return $count;
    }

    // get if a user reacted to a post
    public function get_user_reaction( $post_id ) {
        if( ! $post_id ) {
            return false;
        }
        $current_user = get_current_user_id();
        if ( ! empty( $current_user ) ) {
            $user_ip = $current_user;
        } else {
            $user_ip = $this->get_user_ip();
        }

        $reactions       = get_post_meta( $post_id, 'delicious_recipes_reactions', true );
        $response        = array();
		if ( is_array( $reactions ) ) {
			foreach ( $reactions as $reaction_id => $reaction_users ) {
				if ( in_array( $user_ip, $reaction_users ) ) {
					$response[] = $reaction_id;
				}
			}
		}

        return $response;
    }

    /**
     * Get reaction section
     */
    public function show_emoji_reaction_section () {
        $global_settings  = delicious_recipes_get_global_settings();
        $enable_reactions = isset( $global_settings['emojiReactions']['0'] ) && 'yes' === $global_settings['emojiReactions']['0'] ? true : false;
        if( ! $enable_reactions ) {
            return;
        }
        $reaction_alignment     = isset( $global_settings['emojiLocation'] ) ? $global_settings['emojiLocation'] : 'center';
        $reaction_title         = isset( $global_settings['emojiSectionTitle'] ) ? $global_settings['emojiSectionTitle'] : __("What's Your Reaction", "delicious-recipes-pro");
        $emojiReactionsList     = isset( $global_settings["emojiReactionsList"] ) ? $global_settings["emojiReactionsList"] : array();
        $icon_size              = isset( $global_settings['emojiIconSize'] ) ? $global_settings['emojiIconSize'] : 48;
        $current_user_reactions = $this->get_user_reaction( get_the_ID() );
        ?>
            <aside class="dr-reaction-section <?php echo esc_attr( $reaction_alignment ) ; ?>">
                <h3 class="dr-reaction-section-title"><?php echo esc_html( $reaction_title ); ?></h3>
                <div class="dr-reaction-section-content">
                    <div id="dr-reaction-<?php echo esc_attr( get_the_ID() ); ?>" class="dr-reactions dr-reaction-wrap" data-reaction_uid="<?php echo esc_attr( get_the_ID() ); ?>">
                        <?php 
                            foreach ( $emojiReactionsList as $reaction ) {
                                if ( isset( $reaction['enable']['0'] ) && 'yes' === $reaction['enable']['0'] ) { 
                                    $reaction_id    = isset( $reaction['id'] ) ? $reaction['id'] : '';
                                    $emoji_reaction = $this->get_reaction_by_id( $reaction['id'] );
                                    $reaction_icon  = isset( $emoji_reaction['icon'] ) ? $emoji_reaction['icon'] : '';
                                    $reaction_title = isset( $emoji_reaction['title'] ) ? $emoji_reaction['title'] : '';
                                    $reaction_count = $this->get_reaction_count( get_the_ID(), $reaction_id );
                                    $active         = in_array( $reaction_id, $current_user_reactions ) ? 'active' : '';
                                    ?>
                                    <div style="cursor: pointer;" class="dr-reaction <?php echo esc_attr( $active ); ?> loading" data-reaction="<?php echo esc_attr( $reaction_id ); ?>" data-reaction_uid="<?php echo esc_attr( get_the_ID() ); ?>">
                                        <span class="dr-reaction-content">
                                            <div class="dr-reaction-icon" style="--icon-size:<?php echo absint( $icon_size )?>px"><?php echo $reaction_icon; ?></div>
                                            <span class="dr-reaction-title"><?php echo esc_html( $reaction_title ); ?></span>
                                        </span>
                                        <span class="total-wrap">
                                            <span class="dr-reaction-count">
                                                <?php echo esc_html( $reaction_count ); ?>
                                            </span>
                                        </span>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <input type="hidden" name="delicious_recipes_reaction_nonce" value="<?php echo wp_create_nonce( 'delicious_recipes_reaction_nonce' ); ?>">
                </div>
            </aside>
        <?php
    }

    /**
     * Get user IPs
     */
    public function get_user_ip() {
        if ( getenv( 'HTTP_CLIENT_IP' ) ) {
            $user_ip = getenv( 'HTTP_CLIENT_IP' );
        } elseif ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
            $user_ip = getenv( 'HTTP_X_FORWARDED_FOR' );
        } elseif ( getenv( 'HTTP_X_FORWARDED' ) ) {
            $user_ip = getenv( 'HTTP_X_FORWARDED' );
        } elseif ( getenv( 'HTTP_FORWARDED_FOR' ) ) {
            $user_ip = getenv( 'HTTP_FORWARDED_FOR' );
        } elseif ( getenv( 'HTTP_FORWARDED' ) ) {
            $user_ip = getenv( 'HTTP_FORWARDED' );
        } else {
            $user_ip = $_SERVER['REMOTE_ADDR'];
        }
        if ( ! filter_var( $user_ip, FILTER_VALIDATE_IP ) ) {
            return '127.0.0.1';
        } else {
            return $this->mask_anonymise_ip( $user_ip );
        }
    }

    /**
     * Mask an IP address to avoid leaking the last digits
     */
    public function mask_anonymise_ip( $user_ip ) {
        if ( strpos( $user_ip, "." ) == true ) {
            return preg_replace( '~[0-9]+$~', 'x', $user_ip );
        } else {
            return preg_replace( '~[0-9]*:[0-9]+$~', 'xxxx:xxxx', $user_ip );
        }
    }

    /**
     * Add reaction ajax action
     */
    public function add_emoji_reaction() {
        $nonce = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
        if ( ! wp_verify_nonce( $nonce, 'delicious_recipes_reaction_nonce' ) ) {
            wp_send_json_error( array(
                'message' => __( 'Invalid nonce', 'delicious-recipes-pro' ),
            ) );
        }

        if ( empty( $_POST['reaction_id'] ) || empty( $_POST['reaction_uid'] ) || empty( $_POST['push'] ) ) {
            wp_send_json_error( array(
                'message' => __( 'Invalid or Empty parameters', 'delicious-recipes-pro' ),
            ) );
        }

        $current_user = get_current_user_id();
        if ( ! empty( $current_user ) ) {
            $user_ip = $current_user;
        } else {
            $user_ip = $this->get_user_ip();
        }

        $reaction_id     = isset( $_POST['reaction_id'] ) ? esc_attr( $_POST['reaction_id'] ) : '';
        $reaction_uid    = isset( $_POST['reaction_uid'] ) ? esc_attr( $_POST['reaction_uid'] ) : '';
        $push            = isset( $_POST['push'] ) ? esc_attr( $_POST['push'] ) : '';
        $reactions       = get_post_meta( $reaction_uid, 'delicious_recipes_reactions', true );
        $reactions       = ! is_array( $reactions ) ? array() : $reactions;
        $global_settings = delicious_recipes_get_global_settings();
        $unique_reaction = isset( $global_settings['enableUniqueReactions']['0'] ) && 'yes' === $global_settings['enableUniqueReactions']['0'] ? true : false;

        if ( empty( $reactions[ $reaction_id ] ) || ! is_array( $reactions[ $reaction_id ] ) ) {
            $reactions[ $reaction_id ] = array();
        }

        if( $unique_reaction ) {
            foreach ( $reactions as $reaction_key => $reaction_value ) {
                if ( $reaction_key != $reaction_id ) {
                    $reactions[ $reaction_key ] = array_diff( $reaction_value, array( $user_ip ) );
                }
            }
        } 

        if ( $push > 0 ) {
            $reactions[ $reaction_id ][] = $user_ip;
            $reactions[ $reaction_id ]   = array_unique( $reactions[ $reaction_id ] );
        } else {
            if ( ( $key = array_search( $user_ip, $reactions[ $reaction_id ] ) ) !== false ) {
                unset( $reactions[ $reaction_id ][ $key ] );
            }
        }

        update_post_meta( $reaction_uid, 'delicious_recipes_reactions', $reactions );
        wp_send_json_success( array(
            'message' => __( 'Reaction added successfully', 'delicious-recipes-pro' ),
            'total'   => count( $reactions[ $reaction_id ] ),
            'unique'  => $unique_reaction,
        ) );
    }

	/**
	 * Callback action to AJAX "delicious_recipes_pro_fetch_reactions".
	 *
	 * @return void
	 */
	public function fetch_emoji_reaction() {
		if ( !isset( $_POST['ids'] ) || !is_array( $_POST['ids'] ) ) {
			wp_send_json_error();
		}

		$ids = $_POST['ids'];
		$reactions = array();
		foreach( $ids as $id ) {
			$reactions[ $id ] = get_post_meta( $id, 'delicious_recipes_reactions', true );
		}

		wp_send_json_success( array( 'recipes' => $reactions ) );
	}
}

// initilize the class
$Delicious_Recipes_Pro_Emojis = new Delicious_Recipes_Pro_Emojis();