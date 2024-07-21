/*! .isOnScreen() returns bool */
jQuery.fn.isOnScreen = function(){
	
	var win = jQuery(window);
	
	var viewport = {
		top : win.scrollTop(),
		left : win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();
	
	var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
	
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	
};

jQuery(document).ready(function($) {
    
    if (typeof cookery_ajax !== 'undefined') {
        
        //Start Ajax Pagination
        
        var pageNum = parseInt(cookery_ajax.startPage) + 1;
        var max = parseInt(cookery_ajax.maxPages);
        var nextLink = cookery_ajax.nextLink;
        var autoLoad = cookery_ajax.autoLoad;
        var layout_home = cookery_ajax.homepage_layout;
        var div_class = '';

        if( $('body').hasClass('home') && layout_home == 'five' || layout_home == 'six' ){
            div_class = 'multi-item';
        }else{
            div_class = 'site-main';
        }
        
        if ( autoLoad == 'load_more' ) {
            // Insert the "Load More Posts" link.
            $('.pagination-nav')
                .before('<div class="pagination_holder" style="display: none;"></div>')                
                .after('<div id="load-posts"><a href="javascript:void(0);"><i class="fas fa-sync-alt"></i>' + cookery_ajax.loadmore + '</a></div>');
            if (pageNum == max+1) {
                $('#load-posts a').html('<i class="fas fa-ban"></i>'+cookery_ajax.nomore).addClass('disabled');
            }
            $('#load-posts a').click(function() {
                if(pageNum <= max && !$(this).hasClass('loading')) {
                    $(this).html('<i class="fas fa-sync-alt fa-spinner"></i>'+cookery_ajax.loading).addClass('loading');

                    $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                        // Update page number and nextLink.
                        pageNum++;
                        var new_url = nextLink;
                        nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum);
                        
                        //Temporary hold the post from pagination and append it to #main
                        var load_html = $('.pagination_holder').html(); 
                        $('.pagination_holder').html('');
                                                        
                        if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                            // Make jQuery object from HTML string
                            var $moreBlocks = $( load_html ).filter('article.latest_post');                        
                            // Append new blocks to container
                            $('.'+div_class).append( $moreBlocks ).imagesLoaded(function(){
                                // Have Masonry position new blocks
                                $('.'+div_class).masonry( 'appended', $moreBlocks );
                            });
                        }else{
                            $('.'+div_class+ ' article:last').after(load_html); // just simply append content without massonry
                        }
                        
                                                
                        var $this = $('.site-main').find('.entry-content').find('div');
                        if( $this.hasClass('tiled-gallery') ){
                            $.getScript(cookery_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                        }
                        
                        if(pageNum <= max) {
                            $('#load-posts a').html('<i class="fas fa-sync-alt"></i>'+cookery_ajax.loadmore).removeClass('loading');
                        } else {
                            $('#load-posts a').html('<i class="fas fa-ban"></i>'+cookery_ajax.nomore).addClass('disabled').removeClass('loading');
                        }
                    });
                    
                } else {
                    // no more posts
                }

                return false;
            });
            $('.pagination-nav').remove();
        }else if( autoLoad == 'infinite_scroll' ) {
            // autoload
            
            // Placeholder
            $('.pagination-nav').before('<div class="pagination_holder" style="display: none;"></div>');
                
            var loading_posts = false;
            var last_post = false;
            
            if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
            
            $(window).scroll(function() {
                if (!loading_posts && !last_post) {
                    var lastPostVisible = $('.latest_post').last().isOnScreen();
                    if (lastPostVisible) {
                        if(pageNum <= max) {
                            loading_posts = true;
                            
                            $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                                // Update page number and nextLink.
                                pageNum++;
                                var new_url = nextLink;
                                
                                loading_posts = false;
                                nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum); 
                                
                                //Temporary hold the post from pagination and append it to #main
                                var load_html = $('.pagination_holder').html(); 
                                $('.pagination_holder').html('');                                 
                                
                                if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                                    // Make jQuery object from HTML string
                                    var $moreBlocks = $( load_html ).filter('article.latest_post');                        
                                    // Append new blocks to container
                                    $('.'+div_class).append( $moreBlocks ).imagesLoaded(function(){
                                        // Have Masonry position new blocks
                                        $('.'+div_class).masonry( 'appended', $moreBlocks );
                                    });
                                }else{
                                    $('.'+div_class+ ' article:last').after(load_html); // just simply append content without massonry
                                }
                                
                                var $this = $('.site-main').find('.entry-content').find('div');
                                if( $this.hasClass('tiled-gallery') ){
                                    $.getScript(cookery_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                                }                                
                            });
                            
                        } else {
                            // no more posts
                            last_post = true;
                        }
                    }
                }
            });
            
            }
            
        $('.pagination-nav').remove();    
        } 
        // End Ajax Pagination
        
        // @todo REMOVE THIS CODE IF NOT NEEDED. Ajax for Add to Cart
        $('body').on( 'click', '.btn-simple', function(){    	
            $(this).addClass('adding-cart');
            var product_id = $(this).attr('id');
            $.ajax ({
                url     : cookery_ajax.url,  
                type    : 'post',
                data    : 'action=cookery_add_cart_single&product_id=' + product_id,    
                success : function(results){
                    $('#'+product_id).replaceWith(results);
                }
            }).done(function(){
                var cart = $('#cart-'+product_id).val();
                $('.cart .number').html(cart);    	   
            });
        });
        
        /** Ajax call for post like */
        $('body').on( 'click', '.cookery_ajax_like', function(){
            var $container = $(this); 
            id = $container.attr('id').split('-').pop(); 
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[1];
            
            if( loadAgain === 'like' ) {
                $.ajax({
                    type :'post',
                    url  : cookery_ajax.url, 
                    data : {  'action' : 'cookery_post_like', 'id' : id },
                    beforeSend: function() {
                        $container.addClass('loading');
                    },
                    success: function( data ) {
                        if( data ) {
                            $('#like-'+id).html( data ); 
                        }                    
                    }
                }).done(function() {
                    $container.removeClass('loading');
                });
            }      
        });

        /** Ajax call for banner search */
        var last_query = '';
        var search_xhr = null;
        
        loadSearchResults = function(query, $container){
            var search_query = query;
            if (!$container.hasClass('search-result-wrap')) {
                $container = $container.find('.search-result-wrap');
            }
            if (search_query == last_query) {
                var $results_container = $container.closest('.advance-search-wrap').find('.search-result-wrap');
                if (!$results_container.is(':empty')) {
                    $results_container.show().closest('.advance-search-wrap').addClass('ajax-search-box-open');
                    return false;
                }
            }
            last_query = search_query;
            
            if (search_xhr) {
                search_xhr.abort();
            }
            
            search_xhr = jQuery.ajax({
                url: cookery_ajax.url, 
                data: {  'action' : 'cookery_search', 'q' : search_query, 's_layout' : cookery_ajax.s_layout },
                beforeSend: function() {
                    $container.addClass('loading');
                },
                success: function(data) {
                    $container.html(data).show().closest('.advance-search-wrap').addClass('ajax-search-box-open');
                }
            }).done(function() {
                $container.removeClass('loading');
            });
        };
        
        $('.advance-search-wrap').each(function() {
            var $this = $(this);
            // add search results box
            $this.addClass('ajax-search').append('<div class="search-result-wrap"></div>')
                 .find('.search-field').on('input propertychange', function() { // IE<9 support with 'onpropertychange'
                    // if ($(window).width() > 865) {
                        var s = jQuery(this).val();                    
                        if (s.length > 2) { 
                            fnDelay(function() {
                                loadSearchResults(s, $this);
                            }, 400);
                        } else {
                            $this.removeClass('ajax-search-box-open').find('.search-result-wrap').hide();
                        }
                    // }
                 }).focus(function() {
                    var $cont = $this.find('.search-result-wrap');
                    if ( !$cont.is(':empty') && $(this).val().length > 2 ) {
                        $this.addClass('ajax-search-box-open');                        
                        $cont.show();
                    }
                 });
              $this.find('.search-result-wrap').hide();
        }).click(function(e) { // $('.search-form').click
            e.stopPropagation();
        });

        $(document).on('keydown', '.ajax-search-box-open', function(e){
            var $this = $(this),
                focused = $this.find(':focus');

            switch(e.which) {
                case 38: // up
                    if ( focused.is("input") ) {
                        $this.find('li:last a').focus();
                    } else {
                        if (focused.closest('li').prev('li').length) {
                            focused.closest('li').prev('li').find('a:first').focus();
                        } else {
                            $this.find('input.search-field').focus();
                        }
                    }
                break;
                case 40: // down
                    if ( focused.is("input") ) {
                        $this.find('li:first a').focus();
                    } else {
                        if (focused.closest('li').next('li').length) {
                            focused.closest('li').next('li').find('a:first').focus();
                        } else {
                            $this.find('input.search-field').focus();
                        }
                    }
                break;
                default: return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action
        });
        //End Banner Ajax Search
    }    
});

var fnDelay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();