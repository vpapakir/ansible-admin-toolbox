/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * 
 * It controls the pseudo code as well
 */
function cookery_colors_live_update( thememod, selector, property ) {

	wp.customize( thememod, function( value ) {
		value.bind( function( newval ) {

			if ( jQuery( 'style#' + thememod ).length ) {
				jQuery( 'style#' + thememod ).html( selector + '{' + property + ':' + newval + ';}' );
			} else {
				jQuery( 'head' ).append( '<style id="' + thememod + '">' + selector + '{' + property + ':' + newval + '}</style>' );
				setTimeout(function() {
					jQuery( 'style#' + thememod ).not( ':last' ).remove();
				}, 1000);
			}
		} );
	} );
}

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	wp.customize( 'primary_color', function( value ) {
		value.bind( function( to ) {
			$('head').append('<style>:root{--primary-color:'+to+';}</style>');
		} );
	} );

	wp.customize( 'secondary_color', function( value ) {
		value.bind( function( to ) {
			$('head').append('<style>:root{--secondary-color:'+to+';}</style>');
		} );
	} );

	/**
	 * Site Title Color
	 */
	cookery_colors_live_update( 'site_title_color', '.site-title a', 'color' );

	//Site Width Logo
	wp.customize( 'logo_width', function( value ) {
		value.bind( function( to ) {
			$( '.custom-logo-link img' ).css( 'width',to + 'px' );
		} );
	} );
} )( jQuery );
