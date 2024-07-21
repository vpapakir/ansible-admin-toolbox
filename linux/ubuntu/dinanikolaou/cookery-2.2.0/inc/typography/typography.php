<?php
/**
 * Cookery Typography Related Functions
 *
 * @package Cookery
 */

include_once wp_normalize_path( dirname( __FILE__ ) . '/class-webfont-loader.php' );

if( ! function_exists( 'cookery_fonts_url' ) ):
/**
 * Returns Google Fonts Url
*/ 
function cookery_fonts_url(){
    $fonts_url           = '';
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );

    if( $child_theme_support == 'cook_recipe' ) {
        $primary_font       = get_theme_mod( 'primary_font_ch', 'Bitter' );
        $ig_primary_font    = cookery_is_google_font( $primary_font );    
        $secondary_font     = get_theme_mod( 'secondary_font_ch', 'Domine' );
        $ig_secondary_font  = cookery_is_google_font( $secondary_font );
    }elseif( $child_theme_support == 'spicy_recipe' ) {
        $primary_font       = get_theme_mod( 'primary_font_sr', 'DM Sans' );
        $ig_primary_font    = cookery_is_google_font( $primary_font );    
        $secondary_font     = get_theme_mod( 'secondary_font_sr', 'Domine' );
        $ig_secondary_font  = cookery_is_google_font( $secondary_font );
    }else{
        $primary_font       = get_theme_mod( 'primary_font', 'Questrial' );
        $ig_primary_font    = cookery_is_google_font( $primary_font );    
        $secondary_font     = get_theme_mod( 'secondary_font', 'Noto Serif' );
        $ig_secondary_font  = cookery_is_google_font( $secondary_font );    
    }

    $site_title_font    = get_theme_mod( 'site_title_font', array( 'font-family'=>'Noto Serif', 'variant'=>'regular' ) );
    $ig_site_title_font = cookery_is_google_font( $site_title_font['font-family'] );
    
    $h1_font    = get_theme_mod( 'h1_font', array( 'font-family'=>'Noto Serif', 'variant'=>'bold' ) );
    $ig_h1_font = cookery_is_google_font( $h1_font['font-family'] );
    $h2_font    = get_theme_mod( 'h2_font', array( 'font-family'=>'Noto Serif', 'variant'=>'bold' ) );
    $ig_h2_font = cookery_is_google_font( $h2_font['font-family'] ); 
    $h3_font    = get_theme_mod( 'h3_font', array( 'font-family'=>'Noto Serif', 'variant'=>'bold' ) );
    $ig_h3_font = cookery_is_google_font( $h3_font['font-family'] );
    $h4_font    = get_theme_mod( 'h4_font', array( 'font-family'=>'Noto Serif', 'variant'=>'bold' ) );
    $ig_h4_font = cookery_is_google_font( $h4_font['font-family'] );
    $h5_font    = get_theme_mod( 'h5_font', array( 'font-family'=>'Noto Serif', 'variant'=>'bold' ) );
    $ig_h5_font = cookery_is_google_font( $h5_font['font-family'] );
    $h6_font    = get_theme_mod( 'h6_font', array( 'font-family'=>'Noto Serif', 'variant'=>'bold' ) );
    $ig_h6_font = cookery_is_google_font( $h6_font['font-family'] );
            
    /* Translators: If there are characters in your language that are not
    * supported by respective fonts, translate this to 'off'. Do not translate
    * into your own language.
    */
    $primary    = _x( 'on', 'Primary Font: on or off', 'cookery' );
    $secondary  = _x( 'on', 'Secondary Font: on or off', 'cookery' );
    $site_title = _x( 'on', 'Site Title Font: on or off', 'cookery' );
    $h1         = _x( 'on', 'H1 Content Font: on or off', 'cookery' );
    $h2         = _x( 'on', 'H2 Content Font: on or off', 'cookery' );
    $h3         = _x( 'on', 'H3 Content Font: on or off', 'cookery' );
    $h4         = _x( 'on', 'H4 Content Font: on or off', 'cookery' );
    $h5         = _x( 'on', 'H5 Content Font: on or off', 'cookery' );
    $h6         = _x( 'on', 'H6 Content Font: on or off', 'cookery' );
    
    if ( 'off' !== $primary || 'off' !== $secondary || 'off' !== $site_title || 'off' !== $h1 || 'off' !== $h2 || 'off' !== $h3 || 'off' !== $h4 || 'off' !== $h5 || 'off' !== $h6 ) {
        
        $font_families = array();
     
        if ( 'off' !== $primary && $ig_primary_font ) {
            $primary_variant = cookery_check_varient( $primary_font, 'regular', true );
            if( $primary_variant ){
                $primary_var = ':' . $primary_variant;
            }else{
                $primary_var = '';    
            }            
            $font_families[] = $primary_font . $primary_var;
        }
         
        if ( 'off' !== $secondary && $ig_secondary_font ) {
            $secondary_variant = cookery_check_varient( $secondary_font, 'regular', true );
            if( $secondary_variant ){
                $secondary_var = ':' . $secondary_variant;    
            }else{
                $secondary_var = '';
            }
            $font_families[] = $secondary_font . $secondary_var;
        }
        
        if ( 'off' !== $site_title && $ig_site_title_font ) {
            
            if( ! empty( $site_title_font['variant'] ) ){
                $site_title_var = ':' . cookery_check_varient( $site_title_font['font-family'], $site_title_font['variant'] );    
            }else{
                $site_title_var = '';
            }
            $font_families[] = $site_title_font['font-family'] . $site_title_var;
        }
        
        if ( 'off' !== $h1 && $ig_h1_font ) {
            if( ! empty( $h1_font['variant'] ) ){
                $h1_var = ':' . cookery_check_varient( $h1_font['font-family'], $h1_font['variant'] );    
            }else{
                $h1_var = '';
            }
            $font_families[] = $h1_font['font-family'] . $h1_var;
        }
        
        if ( 'off' !== $h2 && $ig_h2_font ) {
            if( ! empty( $h2_font['variant'] ) ){
                $h2_var = ':' . cookery_check_varient( $h2_font['font-family'], $h2_font['variant'] );    
            }else{
                $h2_var = '';
            }
            $font_families[] = $h2_font['font-family'] . $h2_var;
        }
        
        if ( 'off' !== $h3 && $ig_h3_font ) {
            if( ! empty( $h3_font['variant'] ) ){
                $h3_var = ':' . cookery_check_varient( $h3_font['font-family'], $h3_font['variant'] );    
            }else{
                $h3_var = '';
            }
            $font_families[] = $h3_font['font-family'] . $h3_var;
        }
        
        if ( 'off' !== $h4 && $ig_h4_font ) {
            if( ! empty( $h4_font['variant'] ) ){
                $h4_var = ':' . cookery_check_varient( $h4_font['font-family'], $h4_font['variant'] );    
            }else{
                $h4_var = '';
            }
            $font_families[] = $h4_font['font-family'] . $h4_var;
        }
        
        if ( 'off' !== $h5 && $ig_h5_font ) {
            if( ! empty( $h5_font['variant'] ) ){
                $h5_var = ':' . cookery_check_varient( $h5_font['font-family'], $h5_font['variant'] );    
            }else{
                $h5_var = '';
            }
            $font_families[] = $h5_font['font-family'] . $h5_var;
        }
        
        if ( 'off' !== $h6 && $ig_h6_font ) {
            if( ! empty( $h6_font['variant'] ) ){
                $h6_var = ':' . cookery_check_varient( $h6_font['font-family'], $h6_font['variant'] );    
            }else{
                $h6_var = '';
            }
            $font_families[] = $h6_font['font-family'] . $h6_var;
        }
        
        $font_families = array_diff( array_unique( $font_families ), array('') );
        
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),            
        );
        
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    
    if( get_theme_mod( 'ed_localgoogle_fonts', false ) ) {
        $fonts_url = cookery_get_webfont_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
    }

    return esc_url( $fonts_url );
}
endif;

if( ! function_exists( 'cookery_get_google_fonts' ) ) :
/**
 * Get Google Fonts
*/
function cookery_get_google_fonts(){
    $fonts = include wp_normalize_path( get_template_directory() . '/inc/custom-controls/typography/google-fonts.php' );
    $google_fonts = array();
    
    if ( is_array( $fonts ) ) {
		foreach ( $fonts['items'] as $font ) {
            $google_fonts[ $font['family'] ] = array(
				'variants' => $font['variants'],
			);
		}
	}    
    return $google_fonts;
}
endif;

if( ! function_exists( 'cookery_get_websafe_font' ) ) :
/**
 * Function listing WebSafe Fonts and its attributes
*/
function cookery_get_websafe_font(){
    $standard_fonts = array(
		'georgia-serif' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => 'Georgia, serif',
		),
        'palatino-serif' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Palatino Linotype", "Book Antiqua", Palatino, serif',
		),
        'times-serif' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Times New Roman", Times, serif',
		),
        'arial-helvetica' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => 'Arial, Helvetica, sans-serif',
		),
        'arial-gadget' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Arial Black", Gadget, sans-serif',
		),
		'comic-cursive' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Comic Sans MS", cursive, sans-serif',
		),
		'impact-charcoal'  => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => 'Impact, Charcoal, sans-serif',
		),
        'lucida' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		),
        'tahoma-geneva' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => 'Tahoma, Geneva, sans-serif',
		),
		'trebuchet-helvetica' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Trebuchet MS", Helvetica, sans-serif',
		),
		'verdana-geneva'  => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => 'Verdana, Geneva, sans-serif',
		),
        'courier' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Courier New", Courier, monospace',
		),
        'lucida-monaco' => array(
			'variants' => array( 'regular', 'italic', '700', '700italic' ),
			'fonts' => '"Lucida Console", Monaco, monospace',
		)
	);
    
    return apply_filters( 'cookery_standard_fonts', $standard_fonts );
}
endif;

if( ! function_exists( 'cookery_check_varient' ) ) :
/**
 * Checks for matched varients in google fonts for typography fields
*/
function cookery_check_varient( $font_family = 'serif', $font_variants = 'regular', $body = false ){
    $variant = '';
    $var     = array();
    $google_fonts  = cookery_get_google_fonts(); //Google Fonts
    $websafe_fonts = cookery_get_websafe_font(); //Standard Web Safe Fonts
    
    if( array_key_exists( $font_family, $google_fonts ) ){
        $variants = $google_fonts[ $font_family ][ 'variants' ];
        if( in_array( $font_variants, $variants ) ){
            if( $body ){ //LOAD ALL VARIANTS FOR BODY FONT
                foreach( $variants as $v ){
                    $var[] = $v;
                }
                $variant = implode( ',', $var );
            }else{                
                $variant = $font_variants;
            }
        }else{
            $variant = 'regular';
        }        
    }else{ //Standard Web Safe Fonts
        if( array_key_exists( $font_family, $websafe_fonts ) ){
            $variants = $websafe_fonts[ $font_family ][ 'variants' ];
            if( in_array( $font_variants, $variants ) ){
                if( $body ){ //LOAD ALL VARIANTS FOR BODY FONT
                    foreach( $variants as $v ){
                        $var[] = $v;
                    }
                    $variant = implode( ',', $var );
                }else{  
                    $variant = $font_variants;
                }
            }else{
                $variant = 'regular';
            }    
        }
    }
    return $variant;
}
endif;

/**
 * Returns font weight and font style to use in dynamic styles.
*/
function cookery_get_css_variant( $font_variant ){
    $v_array = array(
		'100'       => array(
            'weight'    => '100',
            'style'     => 'normal'
            ),
		'100italic' => array(
            'weight'    => '100',
            'style'     => 'italic'
            ),
		'200'       => array(
            'weight'    => '200',
            'style'     => 'normal'
            ),
		'200italic' => array(
            'weight'    => '200',
            'style'     => 'italic'
            ),
		'300'       => array(
            'weight'    => '300',
            'style'     => 'normal'
            ),
		'300italic' => array(
            'weight'    => '300',
            'style'     => 'italic'
            ),
		'regular'   => array(
            'weight'    => '400',
            'style'     => 'normal'
            ),
		'italic'    => array(
            'weight'    => '400',
            'style'     => 'italic'
            ),
		'500'       => array(
            'weight'    => '500',
            'style'     => 'normal'
            ),
		'500italic' => array(
            'weight'    => '500',
            'style'     => 'italic'
            ),
		'600'       => array(
            'weight'    => '600',
            'style'     => 'normal'
            ),
		'600italic' => array(
            'weight'    => '600',
            'style'     => 'italic'
            ),
		'700'       => array(
            'weight'    => '700',
            'style'     => 'normal'
            ),
		'700italic' => array(
            'weight'    => '700',
            'style'     => 'italic'
            ),
		'800'       => array(
            'weight'    => '800',
            'style'     => 'normal'
            ),
		'800italic' => array(
            'weight'    => '800',
            'style'     => 'italic'
            ),
		'900'       => array(
            'weight'    => '900',
            'style'     => 'normal'
            ),
		'900italic' => array(
            'weight'    => '900',
            'style'     => 'italic'
            ),
	);
    
    if( array_key_exists( $font_variant, $v_array ) ){
        return $v_array[ $font_variant ];
    }
}

/**
 * Function to check if it's a google font
*/
function cookery_is_google_font( $font ){
    $return = false;
    $websafe_fonts = cookery_get_websafe_font();
    if( $font ){
        if( array_key_exists( $font, $websafe_fonts ) ){
            //Web Safe Font
            $return = false;
        }else{
            //Google Font
            $return = true;
        }
    }
    return $return; 
}

/**
 * Function to get valid font, weight and style
*/
function cookery_get_fonts( $font_family, $font_variant ){
    
    $fonts = array();
    $websafe_fonts = cookery_get_websafe_font(); //Web Safe Font
    
    if( $font_family ){
        if( cookery_is_google_font( $font_family ) ){
            $fonts['font'] = esc_attr( $font_family ); //Google Font
            if( $font_variant ){
                $weight_style    = cookery_get_css_variant( cookery_check_varient( $font_family, $font_variant ) );
                $fonts['weight'] = $weight_style['weight'];
                $fonts['style']  = $weight_style['style'];
            }else{
                $fonts['weight'] = '400';
                $fonts['style']  = 'normal';
            }
        }else{
            if( array_key_exists( $font_family, $websafe_fonts ) ){
                $fonts['font'] = $websafe_fonts[ $font_family ]['fonts']; //Web Safe Font
                if( $font_variant ){
                    $weight_style    = cookery_get_css_variant( cookery_check_varient( $font_family, $font_variant ) );
                    $fonts['weight'] = $weight_style['weight'];
                    $fonts['style']  = $weight_style['style'];
                }else{
                    $fonts['weight'] = '400';
                    $fonts['style']  = 'normal';
                }
            }
        }   
    }else{
        $fonts['font']   = '"Times New Roman", Times, serif';
        $fonts['weight'] = '400';
        $fonts['style']  = 'normal';
    }
    
    return $fonts;
}

if( ! function_exists( 'cookery_get_all_fonts' ) ) :
/**
 * Return Web safe font and google font without variants
*/
function cookery_get_all_fonts(){
    $google = array();        
    $standard = apply_filters( 'cookery_standard_font', array(
		'georgia-serif'       => __( 'Georgia', 'cookery' ),
        'palatino-serif'      => __( 'Palatino Linotype, Book Antiqua, Palatino', 'cookery' ),
        'times-serif'         => __( 'Times New Roman, Times', 'cookery' ),
        'arial-helvetica'     => __( 'Arial, Helvetica', 'cookery' ),
        'arial-gadget'        => __( 'Arial Black, Gadget', 'cookery' ),
		'comic-cursive'       => __( 'Comic Sans MS, cursive', 'cookery' ),
		'impact-charcoal'     => __( 'Impact, Charcoal', 'cookery' ),
        'lucida'              => __( 'Lucida Sans Unicode, Lucida Grande', 'cookery' ),
        'tahoma-geneva'       => __( 'Tahoma, Geneva', 'cookery' ),
		'trebuchet-helvetica' => __( 'Trebuchet MS, Helvetica', 'cookery' ),
		'verdana-geneva'      => __( 'Verdana, Geneva', 'cookery' ),
        'courier'             => __( 'Courier New, Courier', 'cookery' ),
        'lucida-monaco'       => __( 'Lucida Console, Monaco', 'cookery' ),
	) );
    
    $fonts = include wp_normalize_path( get_template_directory() . '/inc/custom-controls/typography/google-fonts.php' );
    
    foreach( $fonts['items'] as $font ){
        $google[$font['family']] = $font['family'];
    }
    $all_fonts = array_merge( $standard, $google );
    return $all_fonts; 
}
endif;