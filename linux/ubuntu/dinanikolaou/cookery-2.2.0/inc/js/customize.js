jQuery(document).ready(function($) {

    wp.customize.section( 'sidebar-widgets-newsletter' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-newsletter' ).priority( '15' );
    wp.customize.section( 'sidebar-widgets-promo' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-promo' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-about' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-about' ).priority( '25' );
    wp.customize.section( 'sidebar-widgets-cta' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-cta' ).priority( '55' );
    wp.customize.section( 'sidebar-widgets-client' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-client' ).priority( '75' );     

    //Scroll to front page section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    }); 

    $('#sub-accordion-section-body_settings').on( 'click', '.typography_text', function(e){
        e.preventDefault();
        wp.customize.control( 'ed_localgoogle_fonts' ).focus();        
    });

    $('#sub-accordion-section-performance_settings').on( 'click', '.ed_localgoogle_fonts', function(e){
        e.preventDefault();
        wp.customize.control( 'typography_text' ).focus();        
    }); 

    $('#sub-accordion-section-slider_layout_settings').on( 'click', '.slider_banner_layout_text', function(e){
        e.preventDefault();
        wp.customize.control( 'ed_banner_section' ).focus();        
    });

    $('#sub-accordion-section-static_cta_layout_settings').on( 'click', '.static_banner_layout_text', function(e){
        e.preventDefault();
        wp.customize.control( 'ed_banner_section' ).focus();        
    });

    $('#sub-accordion-section-static_newsletter_layout_settings').on( 'click', '.static_newsletter_banner_layout_text', function(e){
        e.preventDefault();
        wp.customize.control( 'ed_banner_section' ).focus();        
    });
    
    $('#sub-accordion-section-static_search_layout_settings').on( 'click', '.static_search_banner_layout_text', function(e){
        e.preventDefault();
        wp.customize.control( 'ed_banner_section' ).focus();        
    });

    $('#sub-accordion-section-header_image').on( 'click', '.slider_banner_text', function(e){
        e.preventDefault();
        wp.customize.control( 'slider_layout' ).focus();        
    });

    $('#sub-accordion-section-header_image').on( 'click', '.cta_static_banner_text', function(e){
        e.preventDefault();
        wp.customize.control( 'static_cta_layout' ).focus();        
    });
    
    $('#sub-accordion-section-header_image').on( 'click', '.newsletter_static_banner_text', function(e){
        e.preventDefault();
        wp.customize.control( 'static_newsletter_layout' ).focus();        
    });

    $('#sub-accordion-section-header_image').on( 'click', '.search_static_banner_text', function(e){
        e.preventDefault();
        wp.customize.control( 'static_search_layout' ).focus();        
    });

    $('#sub-accordion-section-child_support_settings').on( 'click', '.h-layout', function(e){
        e.preventDefault();
        wp.customize.control( 'header_layout' ).focus();        
    });

    $('#sub-accordion-section-child_support_settings').on( 'click', '.s-layout', function(e){
        e.preventDefault();
        wp.customize.control( 'slider_layout' ).focus();        
    });

    $( 'input[name=cookery-flush-local-fonts-button]' ).on( 'click', function( e ) {
        var data = {
            wp_customize: 'on',
            action: 'cookery_flush_fonts_folder',
            nonce: cookery_cdata.flushFonts
        };  
        $( 'input[name=cookery-flush-local-fonts-button]' ).attr('disabled', 'disabled');

        $.post( ajaxurl, data, function ( response ) {
            if ( response && response.success ) {
                $( 'input[name=cookery-flush-local-fonts-button]' ).val( 'Successfully Flushed' );
            } else {
                $( 'input[name=cookery-flush-local-fonts-button]' ).val( 'Failed, Reload Page and Try Again' );
            }
        });
    });

});

function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        
        case 'accordion-section-sidebar-widgets-newsletter':
        preview_section_id = "newsletter_section";
        break;

        case 'accordion-section-sidebar-widgets-promo':
        preview_section_id = "promo_section";
        break;

        case 'accordion-section-sidebar-widgets-about':
        preview_section_id = "about_section";
        break;
        
        case 'accordion-section-sidebar-widgets-cta':
        preview_section_id = "cta_section";
        break;

        case 'accordion-section-video_section':
        preview_section_id = "video_section";
        break;

        case 'accordion-section-featured_recipe_settings':
        preview_section_id = "featured_recipe_section";
        break;

        case 'accordion-section-browse_category_settings':
        preview_section_id = "browse_category_section";
        break;

        case 'accordion-section-recipe_index_settings':
        preview_section_id = "recipe_index_section";
        break;   
        
        case 'accordion-section-sidebar-widgets-client':
        preview_section_id = "client_section";
        break;

        case 'accordion-section-newsletter_section':
        preview_section_id = "footer_newsletter_section";
        break;

        case 'accordion-section-sidebar-widgets-instagram':
        preview_section_id = "instagram_section";
        break;
        
        case 'accordion-section-front_sort':
        preview_section_id = "banner_section";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}