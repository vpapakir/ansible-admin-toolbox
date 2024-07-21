<?php
/**
 * Cookery Social Sharing
 * 
 * @see http://wordpress.org/plugins/opengraph
 * @package Cookery
 */

if( get_theme_mod( 'ed_og_tags', true ) ){
    //disable jetpack's opengraph functionality.
    add_filter( 'jetpack_enable_opengraph', '__return_false' );
    add_filter( 'jetpack_enable_open_graph', '__return_false' );
}

if( ! function_exists( 'cookery_opengraph_add_prefix' ) ) :
/**
 * Add Open Graph XML prefix to <html> element.
 *
 * @uses apply_filters calls 'opengraph_prefixes' filter on RDFa prefix array
 */
function cookery_opengraph_add_prefix( $output ) {
	$prefixes = array(
		'og' => 'http://ogp.me/ns#',
	);
	$prefixes = apply_filters( 'cookery_opengraph_prefixes', $prefixes );

	$prefix_str = '';
	foreach ( $prefixes as $k => $v ) {
		$prefix_str .= $k . ': ' . $v . ' ';
	}
	$prefix_str = trim( $prefix_str );

	if ( preg_match( '/(prefix\s*=\s*[\"|\'])/i', $output ) ) {
		$output = preg_replace( '/(prefix\s*=\s*[\"|\'])/i', '${1}' . $prefix_str, $output );
	} else {
		$output .= ' prefix="' . $prefix_str . '"';
	}

	return $output;
}
endif;
add_filter( 'language_attributes', 'cookery_opengraph_add_prefix' );

/**
 * Register filters for default Open Graph metadata.
 */
function cookery_opengraph_default_metadata() {	
    if( get_theme_mod( 'ed_og_tags', true ) ){
        // additional prefixes
    	add_filter( 'cookery_opengraph_prefixes', 'cookery_opengraph_additional_prefixes' );
        
        // core metadata attributes
    	add_filter( 'cookery_opengraph_title', 'cookery_opengraph_default_title', 5 );
    	add_filter( 'cookery_opengraph_type', 'cookery_opengraph_default_type', 5 );
    	add_filter( 'cookery_opengraph_image', 'cookery_opengraph_default_image', 5 );
    	add_filter( 'cookery_opengraph_url', 'cookery_opengraph_default_url', 5 );
    
    	add_filter( 'cookery_opengraph_description', 'cookery_opengraph_default_description', 5 );
    	add_filter( 'cookery_opengraph_locale', 'cookery_opengraph_default_locale', 5 );
    	add_filter( 'cookery_opengraph_site_name', 'cookery_opengraph_default_sitename', 5 );
    
    	// additional profile metadata
    	add_filter( 'cookery_opengraph_metadata', 'cookery_opengraph_profile_metadata' );
    
    	// additional article metadata
    	add_filter( 'cookery_opengraph_metadata', 'cookery_opengraph_article_metadata' );
    
    	// twitter card metadata
    	add_filter( 'cookery_twitter_card', 'cookery_twitter_default_card', 5 );
    	add_filter( 'cookery_twitter_creator', 'cookery_twitter_default_creator', 5 );    
    }
}
add_action( 'wp', 'cookery_opengraph_default_metadata' );

if( ! function_exists( 'cookery_opengraph_additional_prefixes' ) ) :
/**
 * Add additional prefix namespaces that are supported by the opengraph plugin.
 */
function cookery_opengraph_additional_prefixes( $prefixes ) {
	if ( is_author() ) {
		$prefixes['profile'] = 'http://ogp.me/ns/profile#';
	}
	if ( is_singular() ) {
		$prefixes['article'] = 'http://ogp.me/ns/article#';
	}

	return $prefixes;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_title' ) ) :
/**
 * Default title property, using the page title.
 */
function cookery_opengraph_default_title( $title ) {
	if ( $title ) {
		return $title;
	}

	if ( is_singular() ) {
		$title = get_the_title( get_queried_object_id() );
	} else if ( is_author() ) {
		$author = get_queried_object();
		$title = $author->display_name;
	} else if ( is_category() && single_cat_title( '', false ) ) {
		$title = single_cat_title( '', false );
	} else if ( is_tag() && single_tag_title( '', false ) ) {
		$title = single_tag_title( '', false );
	} else if ( is_archive() && get_post_format() ) {
		$title = get_post_format_string( get_post_format() );
	} else if ( is_archive() && function_exists( 'get_the_archive_title' ) && get_the_archive_title() ) { // new in version 4.1 to get all other archive titles
		$title = get_the_archive_title();
	}

	return $title;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_type' ) ) :
/**
 * Default type property.
 */
function cookery_opengraph_default_type( $type ) {
	if ( empty( $type ) ) {
		if ( is_singular( array( 'post', 'page' ) ) ) {
			$type = 'article';
		} else if ( is_author() ) {
			$type = 'profile';
		} else {
			$type = 'website';
		}
	}

	return $type;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_image' ) ) :
/**
 * Default image property, using the post-thumbnail and any attached images.
 */
function cookery_opengraph_default_image( $image ) {
	if ( $image ) {
		return $image;
	}

	// As of July 2014, Facebook seems to only let you select from the first 3 images
	$max_images = apply_filters( 'cookery_opengraph_max_images', 3 );

	if ( is_singular() ) {
		$id = get_queried_object_id();
		$image_ids = array();

		// list post thumbnail first if this post has one
		if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $id ) ) {
			$image_ids[] = get_post_thumbnail_id( $id );
		}

		// then list any image attachments
		$attachments = get_children(
			array(
				'post_parent' => $id,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => 'ASC',
				'orderby' => 'menu_order ID',
			)
		);

		foreach ( $attachments as $attachment ) {
			if ( ! in_array( $attachment->ID, $image_ids ) ) {
				$image_ids[] = $attachment->ID;
				if ( sizeof( $image_ids ) >= $max_images ) {
					break;
				}
			}
		}

		// get URLs for each image
		$image = array();
		foreach ( $image_ids as $id ) {
			$thumbnail = wp_get_attachment_image_src( $id, 'full' );
			if ( $thumbnail ) {
				$image[] = $thumbnail[0];
			}
		}
	} elseif ( is_attachment() && wp_attachment_is_image() ) {
		$id = get_queried_object_id();
		$image = array( wp_get_attachment_url( $id ) );
	}

	if ( empty( $image ) ) {
		$image = array();

		// add site icon
		if ( function_exists( 'get_site_icon_url' ) && has_site_icon() ) {
			$image[] = get_site_icon_url( 512 );
		}

		// add header images
		if ( function_exists( 'get_uploaded_header_images' ) ) {
			if ( is_random_header_image() ) {
				foreach ( get_uploaded_header_images() as $header_image ) {
					$image[] = $header_image['url'];

					if ( sizeof( $image ) >= $max_images ) {
						break;
					}
				}
			} elseif ( get_header_image() ) {
				$image[] = get_header_image();
			}
		}
	}

	return $image;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_url' ) ) :
/**
 * Default url property, using the permalink for the page.
 */
function cookery_opengraph_default_url( $url ) {
	if ( empty( $url ) ) {
		if ( is_singular() ) {
			$url = get_permalink();
		} else if ( is_author() ) {
			$url = get_author_posts_url( get_queried_object_id() );
		}
	}

	return $url;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_description' ) ) :
/**
 * Default description property, using the excerpt or content for posts, or the
 * bloginfo description.
 */
function cookery_opengraph_default_description( $description ) {
	if ( $description ) {
		return $description;
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		if ( ! empty( $post->post_excerpt ) ) {
			$description = $post->post_excerpt;
		} else {
			$description = $post->post_content;
		}
	} else if ( is_author() ) {
		$id = get_queried_object_id();
		$description = get_user_meta( $id, 'description', true );
	} else if ( is_category() && category_description() ) {
		$description = category_description();
	} else if ( is_tag() && tag_description() ) {
		$description = tag_description();
	} else if ( is_archive() && function_exists( 'get_the_archive_description' ) && get_the_archive_description() ) { // new in version 4.1 to get all other archive descriptions
		$description = get_the_archive_description();
	} else {
		$description = get_bloginfo( 'description' );
	}

	// strip description to first 55 words.
	$description = strip_tags( strip_shortcodes( $description ) );
	$description = cookery_opengraph_trim_text( $description );

	return $description;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_locale' ) ) :
/**
 * Default locale property, using the WordPress locale.
 */
function cookery_opengraph_default_locale( $locale ) {
	if ( empty( $locale ) ) {
		$locale = get_locale();
	}

	return $locale;
}
endif;

if( ! function_exists( 'cookery_opengraph_default_sitename' ) ) :
/**
 * Default site_name property, using the bloginfo name.
 */
function cookery_opengraph_default_sitename( $name ) {
	if ( empty( $name ) ) {
		$name = get_bloginfo( 'name' );
	}

	return $name;
}
endif;

if( ! function_exists( 'cookery_opengraph_profile_metadata' ) ) :
/**
 * Include profile metadata for author pages.
 *
 * @link http://ogp.me/#type_profile
 */
function cookery_opengraph_profile_metadata( $metadata ) {
	if ( is_author() ) {
		$id = get_queried_object_id();
		$metadata['profile:first_name'] = get_the_author_meta( 'first_name', $id );
		$metadata['profile:last_name']  = get_the_author_meta( 'last_name', $id );
		$metadata['profile:username']   = get_the_author_meta( 'nicename', $id );
	}

	return $metadata;
}
endif;

if( ! function_exists( 'cookery_opengraph_article_metadata' ) ) :
/**
 * Include article metadata for posts and pages.
 *
 * @link http://ogp.me/#type_article
 */
function cookery_opengraph_article_metadata( $metadata ) {
	if ( ! is_singular() ) {
		return $metadata;
	}

	$post = get_queried_object();
	$author = $post->post_author;

	// check if page/post has tags
	$tags = wp_get_object_terms( $post->ID, 'post_tag' );
	if ( $tags && is_array( $tags ) ) {
		foreach ( $tags as $tag ) {
			$metadata['article:tag'][] = $tag->name;
		}
	}

	// check if page/post has categories
	$categories = wp_get_object_terms( $post->ID, 'category' );
	if ( $categories && is_array( $categories ) ) {
		$metadata['article:section'][] = current( $categories )->name;
	}

	$metadata['article:published_time'] = get_the_time( 'c', $post->ID );
	$metadata['article:modified_time'] = get_the_modified_time( 'c', $post->ID );
	$metadata['article:author'][] = get_author_posts_url( $author );

	return $metadata;
}
endif;

if( ! function_exists( 'cookery_twitter_default_card' ) ) :
/**
 * Default twitter-card type.
 */
function cookery_twitter_default_card( $card ) {
	if ( $card ) {
		return $card;
	}

	$card = 'summary';
	$images = apply_filters( 'cookery_opengraph_image', null );

	if ( is_singular() && count( $images ) >= 1 ) {
		$card = 'summary_large_image';
	}

	return $card;
}
endif;

if( ! function_exists( 'cookery_twitter_default_creator' ) ) :
/**
 * Default twitter-card creator.
 */
function cookery_twitter_default_creator( $creator ) {
	if ( $creator || ! is_singular() ) {
		return $creator;
	}

	$post = get_queried_object();
	$author = $post->post_author;
	$socials = get_user_meta( $author, '_cookery_user_social_icons', true );
    $twitter = ( isset( $socials['twitter'] ) && ! empty( $socials['twitter'] ) ) ? $socials['twitter'] : false;

	if ( ! $twitter ) {
		return $creator;
	}

	// check if twitter-account matches "http://twitter.com/username"
	if ( preg_match( '/^http:\/\/twitter\.com\/(#!\/)?(\w+)/i', $twitter, $matches ) ) {
		$creator = '@' . $matches[2];
	} elseif ( preg_match( '/^@?(\w+)$/i', $twitter, $matches ) ) { // check if twitter-account matches "(@)username"
		$creator = '@' . $matches[1];
	}

	return $creator;
}
endif;

if( ! function_exists( 'cookery_opengraph_metadata' ) ) :
/**
 * Get the Open Graph metadata for the current page.
 *
 * @uses apply_filters() Calls 'cookery_opengraph_{$name}' for each property name
 * @uses apply_filters() Calls 'cookery_twitter_{$name}' for each property name
 * @uses apply_filters() Calls 'cookery_opengraph_metadata' before returning metadata array
 */
function cookery_opengraph_metadata() {
	$metadata = array();

	 // defualt properties defined at http://ogp.me/
	$properties = array(
		// required
		'title',
		'type',
		'image',
		'url',

		// optional
		'audio',
		'description',
		'determiner',
		'locale',
		'site_name',
		'video',
	);

	foreach ( $properties as $property ) {
		$filter = 'cookery_opengraph_' . $property;
		$metadata[ "og:$property" ] = apply_filters( $filter, '' );
	}

	$twitter_properties = array( 'card', 'creator' );

	foreach ( $twitter_properties as $property ) {
		$filter = 'cookery_twitter_' . $property;
		$metadata[ "twitter:$property" ] = apply_filters( $filter, '' );
	}

	return apply_filters( 'cookery_opengraph_metadata', $metadata );
}
endif;

if( ! function_exists( 'cookery_opengraph_site_icon_image_sizes' ) ) :
/**
 * Add 512x512 icon size
 *
 * @param  array $sizes sizes available for the site icon
 * @return array        updated list of icons
 */
function cookery_opengraph_site_icon_image_sizes( $sizes ) {
	$sizes[] = 512;

	return array_unique( $sizes );
}
endif;
add_filter( 'site_icon_image_sizes', 'cookery_opengraph_site_icon_image_sizes' );

if( ! function_exists( 'cookery_opengraph_trim_text' ) ) :
/**
 * Helper function to trim text using the same default values for length and
 * 'more' text as wp_trim_excerpt.
 */
function cookery_opengraph_trim_text( $text ) {
	$excerpt_length = apply_filters( 'excerpt_length', 35 );
	$excerpt_more = apply_filters( 'excerpt_more', ' [...]' );

	return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
endif;

if( ! function_exists( 'cookery_opengraph_meta_tags' ) ) :
/**
 * Output Open Graph <meta> tags in the page header.
 */
function cookery_opengraph_meta_tags() {
	if( get_theme_mod( 'ed_og_tags', true ) ){
        $metadata = cookery_opengraph_metadata();
    	foreach ( $metadata as $key => $value ) {
    		if ( empty( $key ) || empty( $value ) ) {
    			continue;
    		}
    		$value = (array) $value;
    
    		foreach ( $value as $v ) {			
    			// use "name" attribute for Twitter Cards
    			if ( stripos( $key, 'twitter:' ) === 0 ) {
    				printf( '<meta name="%1$s" content="%2$s" />' . PHP_EOL,
    				esc_attr( $key ), esc_attr( $v ) );
    			} else { // use "property" attribute for Open Graph
    				printf( '<meta property="%1$s" content="%2$s" />' . PHP_EOL,
    				esc_attr( $key ), esc_attr( $v ) );
    			}			
    		}
    	}
    }
}
endif;
add_action( 'wp_head', 'cookery_opengraph_meta_tags' );

if( ! function_exists( 'cookery_get_social_share' ) ) :
/**
 * Get list of social sharing icons
 * http://www.sharelinkgenerator.com/
 * 
*/
function cookery_get_social_share( $share ){
    global $post;
    
    switch( $share ){
        case 'facebook':
        echo '<li><a href="' . esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow noopener" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>';        
        break;
        
        case 'twitter':
        echo '<li><a href="' . esc_url( 'https://twitter.com/intent/tweet?text=' . get_the_title( $post->ID ) ) . '&nbsp;' . get_the_permalink( $post->ID ) . '" rel="nofollow noopener" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>';        
        break;
        
        case 'linkedin':
        echo '<li><a href="' . esc_url( 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow noopener" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>';        
        break;
        
        case 'pinterest':
        echo '<li><a href="' . esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink( $post->ID ) . '&description=' . get_the_title( $post->ID )  ) . '" rel="nofollow noopener" target="_blank" data-pin-do="none" data-pin-custom="true"><i class="fab fa-pinterest" aria-hidden="true"></i></a></li>';        
        break;
        
        case 'email':
        echo '<li><a href="' . esc_url( 'mailto:?Subject=' . get_the_title( $post->ID ) . '&Body=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow noopener" target="_blank"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>';
        break;
        
        case 'reddit':
        echo '<li><a href="' . esc_url( 'http://www.reddit.com/submit?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow noopener" target="_blank"><i class="fab fa-reddit" aria-hidden="true"></i></a></li>';
        break;
        
        case 'tumblr':
        echo '<li><a href="' . esc_url ( 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-tumblr" aria-hidden="true"></i></a></li>';      
        break; 

        case 'digg':
        echo '<li><a href="' . esc_url ( 'http://digg.com/submit?url=' . get_the_permalink( $post->ID ) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-digg" aria-hidden="true"></i></a></li>';              
        break;

        case 'weibo':
        echo '<li><a href="' . esc_url ( 'https://service.weibo.com/share/share.php?url=' . get_the_permalink( $post->ID ) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-weibo" aria-hidden="true"></i></a></li>';
        break;

        case 'xing':
        echo '<li><a href="' . esc_url ( 'https://www.xing.com/app/user?op=share&url=' . get_the_permalink( $post->ID ) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-xing" aria-hidden="true"></i></a></li>';
        break;

        case 'vk':
        echo '<li><a href="' . esc_url ( 'http://vk.com/share.php?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-vk" aria-hidden="true"></i></a></li>';
        break; 

        case 'pocket':
        echo '<li><a href="' . esc_url ( 'https://getpocket.com/edit?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-get-pocket" aria-hidden="true"></i></a></li>';
		break;
		
		case 'whatsapp':
		echo '<li><a href="' . esc_url ( 'https://wa.me/?text=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). '" rel="nofollow noopener" target="_blank" data-action="share/whatsapp/share" ><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>';		
		break; 

		case 'telegram':
		echo '<li> <a href="' . esc_url ( 'https://telegram.me/share/url?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). '" rel="nofollow noopener" target="_blank"><i class="fab fa-telegram-plane" aria-hidden="true"></i></a></li>';
		break;   
    }
}
endif;

if( ! function_exists( 'cookery_social_share' ) ) :
/**
 * Prints Social Sharing
 * @todo Use this function in appropriate place
*/
function cookery_social_share(){ 
    $ed_sharing   = get_theme_mod( 'ed_social_sharing', true );
    $social_share = get_theme_mod( 'social_share', array( 'facebook', 'twitter', 'pinterest', 'linkedin' ) );
    
    if( $ed_sharing && $social_share ){ ?>
    <div class="post-share">
		<ul class="social-networks">
			<?php
                foreach( $social_share as $share ){
                    cookery_get_social_share( $share );
                }
            ?>
		</ul>
		<a href="Javascript:void(0);" class="meta-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.358" height="17.345" viewBox="0 0 17.358 17.345">
                <path
                    d="M157.37,340.59a2.208,2.208,0,0,1-.486-.054,2.15,2.15,0,0,1-1.71-2.092,1.171,1.171,0,0,0-.814-1.236c-1.823-.966-3.705-1.987-5.587-3.011a.77.77,0,0,0-.443-.128.845.845,0,0,0-.669.326,3.028,3.028,0,0,1-3.308.5,3.18,3.18,0,0,1-1.853-3.052,2.944,2.944,0,0,1,1.859-2.637,2.985,2.985,0,0,1,1.294-.3,2.934,2.934,0,0,1,2.058.837.8.8,0,0,0,.622.275.841.841,0,0,0,.5-.165c1.917-1.038,3.9-2.1,5.879-3.162a.8.8,0,0,0,.449-.954,2.193,2.193,0,0,1,2.063-2.237l.141-.005c.076,0,.151,0,.226.011a2.214,2.214,0,0,1-.2,4.419l-.118,0a2.061,2.061,0,0,1-1.217-.46.752.752,0,0,0-.521-.2.783.783,0,0,0-.458.147c-1.958,1.057-3.969,2.142-5.983,3.222a.739.739,0,0,0-.417.847c0,.183,0,.445,0,.708,0,.19-.005.38,0,.57a.809.809,0,0,0,.284.6l.04.035,6.181,3.338a.754.754,0,0,0,.364.1.767.767,0,0,0,.491-.193,2.16,2.16,0,0,1,2.766.042,2.216,2.216,0,0,1-1.428,3.91Zm.01-3.611a1.4,1.4,0,0,0-.043,2.8h0a1.422,1.422,0,0,0,1.442-1.373,1.4,1.4,0,0,0-1.4-1.426Zm-11.751-7.248a2.3,2.3,0,1,0,.006,0Zm11.743-5.42a1.515,1.515,0,1,0,.027,0Z"
                    transform="translate(-142.37 -323.37)" fill="#374757" stroke="#374757" stroke-width="0.25" />
            </svg>
        </a>
	</div>
    <?php
    }
}
endif;