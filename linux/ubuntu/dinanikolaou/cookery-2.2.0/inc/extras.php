<?php
/**
 * Cookery Standalone Functions.
 *
 * @package Cookery
 */

if ( ! function_exists( 'cookery_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function cookery_posted_on() {
    $ed_post_date   = get_theme_mod( 'ed_post_date', false );

    if( $ed_post_date ) return false;
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		if( $ed_updated_post_date && ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';		  
		}else{
            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
		}        
	}else{
	   $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    $posted_on = sprintf( '%1$s', '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
	
	echo '<span class="posted-on"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="31" viewBox="0 0 33 31"><defs><filter id="Rectangle_1344" x="0" y="0" width="33" height="31" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="blur"/><feFlood flood-color="#e84e3b" flood-opacity="0.102"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g id="Group_5559" data-name="Group 5559" transform="translate(-534.481 -811)"><g transform="matrix(1, 0, 0, 1, 534.48, 811)" filter="url(#Rectangle_1344)"><rect id="Rectangle_1344-2" data-name="Rectangle 1344" width="15" height="13" transform="translate(9 6)" fill="#fff"/></g><path id="Path_30675" data-name="Path 30675" d="M5.84,23.3a2.279,2.279,0,0,1-2.277-2.277V10.1A2.279,2.279,0,0,1,5.84,7.821H7.206V6.455a.455.455,0,0,1,.911,0V7.821h6.375V6.455a.455.455,0,0,1,.911,0V7.821h1.366A2.28,2.28,0,0,1,19.044,10.1V21.026A2.279,2.279,0,0,1,16.767,23.3ZM4.474,21.026A1.367,1.367,0,0,0,5.84,22.392H16.767a1.368,1.368,0,0,0,1.366-1.366V12.374H4.474ZM5.84,8.732A1.367,1.367,0,0,0,4.474,10.1v1.366h13.66V10.1a1.368,1.368,0,0,0-1.366-1.366Z" transform="translate(539.437 808)" fill="#abadb4"/><g id="Group_5542" data-name="Group 5542" transform="translate(547.149 822.506)"><path id="Path_30676" data-name="Path 30676" d="M1036.473-439.908a.828.828,0,0,1,.831.814.832.832,0,0,1-.833.838.831.831,0,0,1-.825-.822A.826.826,0,0,1,1036.473-439.908Z" transform="translate(-1035.646 439.908)" fill="#374757"/><path id="Path_30677" data-name="Path 30677" d="M1105.926-439.908a.826.826,0,0,1,.831.826.832.832,0,0,1-.821.826.831.831,0,0,1-.836-.823A.827.827,0,0,1,1105.926-439.908Z" transform="translate(-1099.534 439.908)" fill="#374757"/><path id="Path_30678" data-name="Path 30678" d="M1071.255-439.909a.821.821,0,0,1,.81.844.825.825,0,0,1-.847.809.825.825,0,0,1-.8-.851A.821.821,0,0,1,1071.255-439.909Z" transform="translate(-1067.628 439.909)" fill="#374757"/><path id="Path_30679" data-name="Path 30679" d="M1036.473-439.908a.828.828,0,0,1,.831.814.832.832,0,0,1-.833.838.831.831,0,0,1-.825-.822A.826.826,0,0,1,1036.473-439.908Z" transform="translate(-1035.646 443.397)" fill="#374757"/><path id="Path_30680" data-name="Path 30680" d="M1105.926-439.908a.826.826,0,0,1,.831.826.832.832,0,0,1-.821.826.831.831,0,0,1-.836-.823A.827.827,0,0,1,1105.926-439.908Z" transform="translate(-1099.534 443.397)" fill="#374757"/><path id="Path_30681" data-name="Path 30681" d="M1071.255-439.909a.821.821,0,0,1,.81.844.825.825,0,0,1-.847.809.825.825,0,0,1-.8-.851A.821.821,0,0,1,1071.255-439.909Z" transform="translate(-1067.628 443.397)" fill="#374757"/></g></g></svg>' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'cookery_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function cookery_posted_by() {

    $ed_post_author = get_theme_mod( 'ed_post_author', false );
    if( $ed_post_author ) return false;

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( '%s', 'post author', 'cookery' ),
		'<span itemprop="name"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><img class="avatar" src="' . esc_url( get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 40 ) ) ) . '" alt="' . esc_attr( get_the_author() ) . '" /> <b class="fn">' . esc_html( get_the_author() ) . '</b></a></span>' 
    );
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if( ! function_exists( 'cookery_comment_count' ) ) :
/**
 * Comment Count
*/
function cookery_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35.556"
                                            height="36.263" viewBox="0 0 35.556 36.263">
                <defs>
                    <filter id="a" x="0" y="0" width="35.556" height="36.263" filterUnits="userSpaceOnUse">
                        <feOffset dy="3" input="SourceAlpha" />
                        <feGaussianBlur stdDeviation="3" result="b" />
                        <feFlood flood-color="#e84e3b" flood-opacity="0.102" />
                        <feComposite operator="in" in2="b" />
                        <feComposite in="SourceGraphic" />
                    </filter>
                </defs>
                <g transform="translate(-867.5 -4569.5)">
                    <g transform="matrix(1, 0, 0, 1, 867.5, 4569.5)" filter="url(#a)">
                        <path
                            d="M14.191,128H2.365A2.574,2.574,0,0,0,0,130.365v7.1a2.316,2.316,0,0,0,2.365,2.365H3.548v4.73l4.73-4.73h5.913a2.638,2.638,0,0,0,2.365-2.365v-7.1A2.574,2.574,0,0,0,14.191,128Z"
                            transform="translate(9.5 -121.5)" fill="#fff" stroke="rgba(55,71,87,0.42)"
                            stroke-width="1" />
                    </g>
                    <path
                        d="M1036.824-439.908a1.181,1.181,0,0,1,1.185,1.161,1.186,1.186,0,0,1-1.187,1.2,1.184,1.184,0,0,1-1.176-1.172A1.177,1.177,0,0,1,1036.824-439.908Z"
                        transform="translate(-155.676 5020.165)" fill="#374757" />
                    <path
                        d="M1106.277-439.908a1.178,1.178,0,0,1,1.185,1.178,1.186,1.186,0,0,1-1.171,1.178,1.184,1.184,0,0,1-1.193-1.173A1.179,1.179,0,0,1,1106.277-439.908Z"
                        transform="translate(-217.195 5020.165)" fill="#374757" />
                    <path
                        d="M1071.613-439.909a1.171,1.171,0,0,1,1.155,1.2,1.177,1.177,0,0,1-1.207,1.153,1.177,1.177,0,0,1-1.146-1.214A1.171,1.171,0,0,1,1071.613-439.909Z"
                        transform="translate(-186.473 5020.166)" fill="#374757" />
                </g>
            </svg>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cookery' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}    
}
endif;

if ( ! function_exists( 'cookery_category' ) ) :
/**
 * Prints categories
 */
function cookery_category(){
    $ed_cat_single  = get_theme_mod( 'ed_category', false );
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() && ! $ed_cat_single ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' ', 'cookery' ) );
		if ( $categories_list ) {
			echo '<span class="post-cat" itemprop="about">' . $categories_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'cookery_tag' ) ) :
/**
 * Prints tags
 */
function cookery_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ' ' );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'cookery' ) . '</div>', '<span>', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'cookery_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function cookery_get_posts_list( $status ){
    global $post;
    
    $args = array(
        'post_type'           => 'post',
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['post_type']      = ( is_delicious_recipe_activated() ) ? DELICIOUS_RECIPE_POST_TYPE : 'post';
        $args['posts_per_page'] = 3;
        $title                  = __( 'You Might Also Enjoy This...', 'cookery' );
        $class                  = 'additional-post';
        $image_size             = 'cookery-related';
        break;
        
        case 'related':
        $args['post_type']      = ( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE === get_post_type() ) ? DELICIOUS_RECIPE_POST_TYPE : 'post';
        $args['posts_per_page'] = 3;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_title', __( 'You may also like...', 'cookery' ) );
        $class                  = 'additional-post';
        $image_size             = 'cookery-related';
        if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE === get_post_type() ) {
            $cats = get_the_terms( $post->ID, 'recipe-course' );
            if( !$cats ) return false;       
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['tax_query']    = array( array( 'taxonomy' => 'recipe-course', 'terms' => $c ) );
        }else{
            $related_tax            = get_theme_mod( 'related_taxonomy', 'cat' );
            if( $related_tax == 'cat' ){
                $cats = get_the_category( $post->ID );        
                if( $cats ){
                    $c = array();
                    foreach( $cats as $cat ){
                        $c[] = $cat->term_id; 
                    }
                    $args['category__in'] = $c;
                }
            }elseif( $related_tax == 'tag' ){
                $tags = get_the_tags( $post->ID );
                if( $tags ){
                    $t = array();
                    foreach( $tags as $tag ){
                        $t[] = $tag->term_id;
                    }
                    $args['tag__in'] = $t;  
                }
            }
        }
        break;        
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>">
    		<?php 
            if( $title ) echo '<h3 class="title">' . esc_html( $title ) . '</h3>'; ?>
            <section class="section-grid">        
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <article class="post">
                    <figure class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                }else{ 
                                    cookery_get_fallback_svg( $image_size );//fallback
                                }
                            ?>
                        </a>
                        <?php if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) {cookery_recipe_pinit();
                            cookery_recipe_keywords();
                            do_action( 'delicious_recipes_wishlist_button');
                        } ?>
                    </figure>
                    <div class="content-wrap">
                        <?php if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) { ?>
                            <header class="entry-header">
                            	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                            </header>
                            <footer class="item-footer">
                                <?php cookery_prep_time(); ?>
                                <?php cookery_difficulty_level(); ?>
                            </footer>
                        <?php }else{
                            echo '<header class="entry-header">';
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                                if( 'post'  == get_post_type() ) {
                                    echo '<div class="entry-meta">';
                                    cookery_posted_on();
                                    echo '</div>';
                                }
                            echo '</header>';
                        } ?>
                    </div>
                </article>
                <?php } ?> 
            </section>   		
    	</div>
        <?php
        wp_reset_postdata();
    }
}
endif;

if( ! function_exists( 'cookery_site_branding' ) ) :
/**
 * Site Branding
*/
function cookery_site_branding( $mobile = false ){
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );

    if( has_custom_logo() || $site_title || $site_description || $header_text ) :
        if( has_custom_logo() && ( $site_title || $site_description ) && $header_text ) {
            $branding_class = ' has-image-text';
        }else{
            $branding_class = '';
        }?>
        <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization">  
            <div class="site-logo">
                <?php 
                if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                    the_custom_logo();
                }  ?>
            </div>

            <?php 
            if( $site_title || $site_description ) :
                echo '<div class="site-title-wrap">';
                if( is_front_page() && !$mobile ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php }
                
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description" itemprop="description"><?php echo $description; ?></p>
                <?php }
                echo '</div>';
            endif; ?>
        </div>    
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_social_links' ) ) :
/**
 * Social Links 
*/
function cookery_social_links( $echo = true ){ 

    $social_links = get_theme_mod( 'social_links', '' );
    $ed_social    = get_theme_mod( 'ed_social_links', false ); 
    
    if( $ed_social && $social_links && $echo ){ ?>
    <ul class="social-networks">
    	<?php 
        foreach( $social_links as $link ){
    	   if( $link['link'] ){ ?>
            <li>
                <a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
                    <i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
                </a>
            </li>    	   
            <?php
            } 
        } 
        ?>
	</ul>
    <?php    
    }elseif( $ed_social && $social_links ){
        return true;
    }else{
        return false;
    }
    ?>
    <?php                                
}
endif;

if( ! function_exists( 'cookery_header_search' ) ) :
/**
 * Form 
*/
function cookery_header_search(){ 
    $header_layout = get_theme_mod( 'header_layout', 'one' ); ?>

    <div class="header-search">
        <?php if( $header_layout != 'four' ) : ?>
            <button class="search-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.691" height="21.932" viewBox="0 0 22.691 21.932">
                    <g id="Group_258" data-name="Group 258" transform="matrix(0.966, -0.259, 0.259, 0.966, -1515.787, 248.902)">
                        <g id="Ellipse_9" data-name="Ellipse 9" transform="translate(1525.802 162.18) rotate(-30)" fill="none" stroke="#6a6a6a" stroke-width="2.5">
                            <circle cx="7.531" cy="7.531" r="7.531" stroke="none"></circle>
                            <circle cx="7.531" cy="7.531" r="6.281" fill="none"></circle>
                        </g>
                        <path id="Path_4339" data-name="Path 4339" d="M0,0V7" transform="translate(1540.052 170.724) rotate(-30)" fill="none" stroke="#6a6a6a" stroke-linecap="round" stroke-width="2.5"></path>
                    </g>
                </svg>
            </button>
            <div class="header-search-wrap">
                <div class="header-search-inner">
        <?php endif; ?>
                <?php get_search_form(); ?>
        <?php if( $header_layout != 'four' ) : ?>
                <button class="close"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php
}
endif;

if( ! function_exists( 'cookery_mobile_header' ) ) :
/**
 * Mobile Header
*/
function cookery_mobile_header(){ 
    $header_layout = get_theme_mod( 'header_layout', 'one' );
    $header_array = array( 'one', 'two', 'three', 'five' ); 
    $ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
    $ed_search = get_theme_mod( 'ed_header_search', true );?>
    <div class="mobile-header">
        <div class="container">
            <?php cookery_site_branding( true ); ?>
            <div class="mbl-header-right">
                <button class="toggle-btn">
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                </button>
                <?php if( cookery_is_woocommerce_activated() && $ed_cart ) {
                    echo '<div class="header-cart">';
                    cookery_wc_cart_count();
                    echo '</div>';
                } ?>
                <?php if( $ed_search ) cookery_header_search(); ?>
                <div class="mobile-header-popup">
                    <div class="mbl-header-inner">
                        <div class="mbl-header-mid">
                            <?php cookery_primary_navigation(); ?>
                            <?php if( in_array( $header_layout, $header_array ) ) cookery_secondary_navigation(); ?>
                        </div>
                        <div class="mbl-header-bottom">
                            <?php if( cookery_social_links( false ) ) {
                                echo '<div class="header-social">';
                                cookery_social_links();
                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
endif;

if( ! function_exists( 'cookery_primary_navigation' ) ) :
/**
 * Primary Navigation.
*/
function cookery_primary_navigation(){ 
    $header_layout = get_theme_mod( 'header_layout', 'one' ); ?>
    
    <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <?php if( $header_layout != 'five' && has_nav_menu( 'primary' ) ) : ?>
            <button class="toggle-btn">
                <span class="toggle-text">Menu</span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
        <?php endif; ?>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'cookery_primary_menu_fallback',
            ) );
        ?>
    </nav><!-- #site-navigation -->
    <?php
}
endif;

if( ! function_exists( 'cookery_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function cookery_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'cookery' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'cookery_secondary_navigation' ) ) :
/**
 * Secondary Navigation
*/
function cookery_secondary_navigation(){ 
    $header_layout = get_theme_mod( 'header_layout', 'one' );
    ?>
	<nav id="secondary-nav" class="secondary-menu">
        <?php if( $header_layout != 'five' && has_nav_menu( 'secondary' ) ) : ?>
            <button class="toggle-btn">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
        <?php endif; ?>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary',
				'menu_id'        => 'secondary-menu',
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'cookery_secondary_menu_fallback',
			) );
		?>
	</nav>
    <?php
}
endif;

if( ! function_exists( 'cookery_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function cookery_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'cookery' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'cookery_footer_navigation' ) ) :
/**
 * footer Navigation
*/
function cookery_footer_navigation(){ ?>
    <nav class="footer-navigation">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class'     => 'nav-menu',
                'menu_id'        => 'footer-menu',
                'fallback_cb'    => 'cookery_footer_menu_fallback',
            ) );
        ?>
    </nav>
    <?php
}
endif;

if( ! function_exists( 'cookery_footer_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function cookery_footer_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="footer-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'cookery' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'cookery_sticky_header' ) ) :
/**
 * Fallback for secondary menu
*/
function cookery_sticky_header(){ 
    $sticky_header = get_theme_mod( 'ed_sticky_header', false );
    if( $sticky_header ) : ?>
        <div class="sticky-header">
            <div class="container">
                <?php cookery_site_branding( true ); ?>
                <?php cookery_sticky_navigation(); ?>
            </div>
        </div>
    <?php 
    endif;
}
endif;

if( ! function_exists( 'cookery_sticky_navigation' ) ) :
/**
 * Sticky Navigation
*/
function cookery_sticky_navigation(){ 
    if( current_user_can( 'manage_options' ) || has_nav_menu( 'primary' ) ) { ?>
        <nav id="sticky-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <button class="toggle-btn">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'fallback_cb'    => 'cookery_primary_menu_fallback',
                ) );
            ?>
        </nav><!-- #site-navigation -->
    <?php
    }
}
endif;

if( ! function_exists( 'cookery_posts_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function cookery_posts_per_page_count(){
    $pagination = get_theme_mod( 'pagination_type','numbered' );
    global $wp_query;
    if( is_archive() || is_search() && $wp_query->found_posts > 0 ) {
        if( $pagination != 'infinite_scroll' && $pagination != 'load_more' ) :
            $posts_per_page = get_option( 'posts_per_page' );
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $start_post_number = 0;
            $end_post_number   = 0;

            if( $wp_query->found_posts > 0 && !( cookery_is_woocommerce_activated() && is_shop() ) ):                
                $start_post_number = 1;
                if( $wp_query->found_posts < $posts_per_page  ) {
                    $end_post_number = $wp_query->found_posts;
                }else{
                    $end_post_number = $posts_per_page;
                }

                if( $paged > 1 ){
                    $start_post_number = $posts_per_page * ( $paged - 1 ) + 1;
                    if( $wp_query->found_posts < ( $posts_per_page * $paged )  ) {
                        $end_post_number = $wp_query->found_posts;
                    }else{
                        $end_post_number = $paged * $posts_per_page;
                    }
                }

                printf( esc_html__( '%1$s Showing:  %2$s - %3$s of %4$s Articles %5$s', 'cookery' ), '<span class="showing-results">', absint( $start_post_number ), absint( $end_post_number ), esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
            endif;
        else :
            printf( esc_html__( '%1$s Showing: %2$s Articles %3$s', 'cookery' ), '<span class="showing-results">', esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
        endif;
    }
}
endif; 

if( ! function_exists( 'cookery_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function cookery_breadcrumb(){ 
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'home_text', __( 'Home', 'cookery' ) ); // text for the 'Home' link
    $delimiter  = '<span class="separator">/</span>';
    $before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', true ) ){
        $depth = 1;
        echo '<div id="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <div class="container">
                <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
        
        if( is_home() ){ 
            $depth = 2;                       
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;            
        }elseif( is_category() ){  
            $depth = 2;          
            $thisCat = get_category( get_query_var( 'cat' ), false );            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;  
            }            
            if( $thisCat->parent != 0 ){
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );
                foreach( $parent_categories as $parent_term ){
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url  = get_term_link( $parent_obj->term_id );
                        $term_name = $parent_obj->name;
                        echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;       
        }elseif( cookery_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();            
            if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( cookery_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            $depth = 2;
            if( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ){
                return;
            }
            $_name    = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = ( wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0 )  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
            if( ! $_name ){
                $product_post_type = get_post_type_object( 'product' );
                $_name             = $product_post_type->labels->singular_name;
            }
            echo $before . '<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_tag() ){ 
            $depth          = 2;
            $queried_object = get_queried_object();
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />'. $after;
        }elseif( is_author() ){  
            global $author;
            $depth    = 2;
            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;     
        }elseif( is_search() ){ 
            $depth       = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before . '<a itemprop="item" href="'. esc_url( $request_uri ) . '"><span itemprop="name">' . sprintf( __( 'Search Results for "%s"', 'cookery' ), esc_html( get_search_query() ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_day() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'cookery' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'cookery' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'cookery' ) ), get_the_time( __( 'm', 'cookery' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'cookery' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'cookery' ) ), get_the_time( __( 'm', 'cookery' ) ), get_the_time( __( 'd', 'cookery' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'd', 'cookery' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_month() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'cookery' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'cookery' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'cookery' ) ), get_the_time( __( 'm', 'cookery' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'cookery' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_year() ){ 
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'cookery' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'cookery' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;  
        }elseif( is_single() && !is_attachment() ){   
            $depth = 2;         
            if( cookery_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;                    
                }           
                if( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ){
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
            }elseif( get_post_type() != 'post' ){                
                $post_type = get_post_type_object( get_post_type() );                
                if( $post_type->has_archive == true ){// For CPT Archive Link                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                   $depth++;    
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
            }else{ //For Post                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';  
                    $depth++; 
                }
                
                if( $cat_object ){ //Getting category hierarchy if any        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object ){
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term         = $key;
                            $potential_parent = $object->term_id;
                        }
                    }                    
                    $cat  = $cat_object[$use_term];              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );
                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url  = get_term_link( $cat_obj->term_id );
                            $term_name = $cat_obj->name;
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                }
                echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;   
            }        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){ //For Custom Post Archive
            $depth     = 2;
            $post_type = get_post_type_object( get_post_type() );
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                echo $before . sprintf( __('Page %s', 'cookery'), get_query_var('paged') ) . $after; //@todo need to check this
            }else{
                echo $before . '<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
            }    
        }elseif( is_attachment() ){ 
            $depth = 2;           
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && !$post->post_parent ){            
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && $post->post_parent ){            
            $depth       = 2;
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while( $parent_id ){
                $current_page  = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id     = $current_page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            echo $before . '<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" /></span>' . $after;
        }elseif( is_404() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html__( '404 Error - Page Not Found', 'cookery' ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
        }
        
        if( get_query_var('paged') ) printf( __( ' (Page %s)', 'cookery' ), get_query_var('paged') );
        
        echo '</div></div><!-- .crumbs -->';
        
    }                
}
endif;

if( ! function_exists( 'cookery_get_banner' ) ) :
/**
 * Prints Banner Section
 * 
*/
function cookery_get_banner( $slider_layout = 'one' ){
    $ed_banner         = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $slider_type       = get_theme_mod( 'slider_type', 'latest_posts' );
    $slider_cat        = get_theme_mod( 'slider_cat' );
    $slider_cat_course      = get_theme_mod( 'slider_cat_course' );
    $slider_cat_cuisine     = get_theme_mod( 'slider_cat_cuisine' );
    $slider_cat_cookmethod  = get_theme_mod( 'slider_cat_cookmethod' );
    $slider_cat_recipekey   = get_theme_mod( 'slider_cat_recipekey' );
    $slider_pages      = get_theme_mod( 'slider_pages' );
    $slider_custom     = get_theme_mod( 'slider_custom' );
    $posts_per_page    = get_theme_mod( 'no_of_slides', 6 );
    $ed_full_image     = get_theme_mod( 'slider_full_image', false );
    $ed_caption        = get_theme_mod( 'slider_caption', true );
    $read_more         = get_theme_mod( 'slider_readmore', __( 'Continue Reading', 'cookery' ) );
    
    if( $slider_layout == 'seven' || $slider_layout == 'eight' ){
        $image_size = ( $ed_full_image ) ? 'full' : 'cookery-slider-full';
    }else{
        $image_size = ( $ed_full_image ) ? 'full' : 'cookery-slider';
    }
    
    if( ( $ed_banner == 'static_banner' || $ed_banner == 'static_nl_banner' || $ed_banner == 'static_search_banner' ) && has_custom_header() ){ 

        if( $ed_banner == 'static_banner' ) {
            cookery_static_cta_banner();
        }elseif( $ed_banner == 'static_nl_banner' ) {
            cookery_static_newsletter_banner();
        }elseif( $ed_banner == 'static_search_banner' ) {
            cookery_static_search_banner();
        }
    }elseif( $ed_banner == 'slider_banner' ){
        if( $slider_type == 'latest_posts' || $slider_type == 'cat' || $slider_type == 'pages' || ( is_delicious_recipe_activated() && ( $slider_type == 'latest_recipes' || $slider_type == 'cat_course' || $slider_type == 'cat_cuisine' || $slider_type == 'cat_cookmethod' || $slider_type == 'cat_recipekey' ) ) ){
        
            $args = array(
                'post_status'         => 'publish',            
                'ignore_sticky_posts' => true
            );
            
            if( is_delicious_recipe_activated() && $slider_type == 'cat_course' && $slider_cat_course ) {
                $args['post_type']      = DELICIOUS_RECIPE_POST_TYPE;
                $args['tax_query']      = array( array( 'taxonomy' => 'recipe-course', 'terms' => $slider_cat_course ) ); 
                $args['posts_per_page'] = -1;
            }elseif( is_delicious_recipe_activated() && $slider_type == 'cat_cuisine' && $slider_cat_cuisine ) {
                $args['post_type']      = DELICIOUS_RECIPE_POST_TYPE;
                $args['tax_query']      = array( array( 'taxonomy' => 'recipe-cuisine', 'terms' => $slider_cat_cuisine ) ); 
                $args['posts_per_page'] = -1;
            }elseif( is_delicious_recipe_activated() && $slider_type == 'cat_cookmethod' && $slider_cat_cookmethod ) {
                $args['post_type']      = DELICIOUS_RECIPE_POST_TYPE;
                $args['tax_query']      = array( array( 'taxonomy' => 'recipe-cooking-method', 'terms' => $slider_cat_cookmethod ) ); 
                $args['posts_per_page'] = -1;
            }elseif( is_delicious_recipe_activated() && $slider_type == 'cat_recipekey' && $slider_cat_recipekey ) {
                $args['post_type']      = DELICIOUS_RECIPE_POST_TYPE;
                $args['tax_query']      = array( array( 'taxonomy' => 'recipe-key', 'terms' => $slider_cat_recipekey ) ); 
                $args['posts_per_page'] = -1;
            }elseif( is_delicious_recipe_activated() && $slider_type == 'latest_recipes' ){
                $args['post_type']      = DELICIOUS_RECIPE_POST_TYPE;
                $args['posts_per_page'] = $posts_per_page;          
            }elseif( $slider_type === 'cat' && $slider_cat ){
                $args['post_type']      = 'post';
                $args['cat']            = $slider_cat; 
                $args['posts_per_page'] = -1;  
            }elseif( $slider_type == 'pages' && $slider_pages ){
                $args['post_type']      = 'page';
                $args['posts_per_page'] = -1;
                $args['post__in']       = cookery_get_id_from_page( $slider_pages );
                $args['orderby']        = 'post__in';
            }else{
                $args['post_type']      = 'post';
                $args['posts_per_page'] = $posts_per_page;
            }
                
            $qry = new WP_Query( $args );
        
            if( $qry->have_posts() ){ ?>
            <div id="banner_section" class="site-banner banner-slider style-<?php echo esc_attr( $slider_layout ); ?>">
                <?php if( $slider_layout == 'four' ) echo '<div class="container">'; ?>
                <div class="item-wrapper owl-carousel">
        			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <div class="item">
        				<?php 
                        echo '<div class="item-img">';
                        if( $slider_layout == 'four' ) echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                        if( has_post_thumbnail() ){
        				    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        				}else{ 
        				    cookery_get_fallback_svg( $image_size );//fallback
                        }
                        if( $slider_layout == 'four' ) echo '</a>';
                        echo '</div>';
                        if( $ed_caption ){ ?>                        
            				<div class="banner-caption">
                                <?php if( $slider_layout == 'seven' || $slider_layout == 'eight' ) echo '<div class="container"><div class="banner-caption-inner">'; ?>
                                <?php cookery_slider_meta_contents(); ?>
                                <?php if( $slider_layout == 'seven' || $slider_layout == 'eight' ) echo '</div></div>'; ?>
            				</div>
                        <?php } ?>
        			</div>
        			<?php } ?>                        
        		</div>
                <?php if( $slider_layout == 'four' ) echo '</div>'; ?>
        	</div>
            <?php
            wp_reset_postdata();
            }
        
        }elseif( $slider_type == 'custom' && $slider_custom ){ ?>
            <div id="banner_section" class="site-banner banner-slider style-<?php echo esc_attr( $slider_layout ); ?>">
        		<?php if( $slider_layout == 'four' ) echo '<div class="container">'; ?>
                <div class="item-wrapper owl-carousel">
        			<?php 
                    foreach( $slider_custom as $slide ){ 
                        if( $slide['thumbnail'] ){ ?>
                            <div class="item">
            				<?php
                                echo '<div class="item-img">';
                                if( $slider_layout == 'four' ) echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
            				    $image = wp_get_attachment_image_url( $slide['thumbnail'], $image_size ); ?>
        				        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( strip_tags( $slide['title'] ) );?>" itemprop="image" />
                                <?php
                                if( $slider_layout == 'four' ) echo '</a>';
                                echo '</div>';
                                if( $ed_caption && ( $slide['title'] || $slide['subtitle'] ) ){ ?>                        
                    				<div class="banner-caption">
                    					<?php if( $slider_layout == 'seven' || $slider_layout == 'eight' ) echo '<div class="container"><div class="banner-caption-inner">'; ?>
                							<?php
                                                if( $slide['subtitle'] ){
                                                    echo '<span class="post-cat">';
                                                    if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '">';
                                                    echo esc_html( $slide['subtitle'] ); 
                                                    if( $slide['link'] ) echo '</a>';
                                                    echo '</span>';    
                                                } 
                                                if( $slide['title'] ){
                                                    echo '<h2 class="item-title">';
                                                    if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '" rel="bookmark">';
                                                    echo wp_kses_post( $slide['title'] );
                                                    if( $slide['link'] ) echo '</a>';
                                                    echo '</h2>';    
                                                }
                                                
                                                if( $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four' ){
                                                    if( $read_more ) echo '<a href="' . esc_url( $slide['link'] ) . '" class="btn-more">' . esc_html( $read_more ) . '</a>';                                            
                                                }
                                            ?>
                    					<?php if( $slider_layout == 'seven' || $slider_layout == 'eight' ) echo '</div></div>'; ?>
                    				</div>
                                <?php } ?>
                			</div>
            			<?php 
                        } 
                    } 
                    ?>                        
        		</div>
                <?php if( $slider_layout == 'four' ) echo '</div>'; ?>
        	</div>
            <?php
        }            
    } 
}
endif;

if( ! function_exists( 'cookery_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function cookery_theme_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	   <?php if ( $args['avatar_size'] != 0 ) echo cookery_gravatar( $comment, $args['avatar_size'] ); ?>
        	</div><!-- .comment-author vcard -->
        </footer>
        
        <div class="text-holder">
        	<div class="top">
                <div class="left">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cookery' ); ?></em>
                		<br />
                	<?php endif; ?>
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b> <span class="says">says:</span>', 'cookery' ), get_comment_author_link() ); ?>
                	<div class="comment-metadata commentmetadata">
                        <?php esc_html_e( 'Posted on', 'cookery' );?>
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                    		<time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'cookery' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                	</div>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            	</div>
            </div>            
            <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        </div><!-- .text-holder -->
        
	<?php if ( 'div' != $args['style'] ) : ?>
    </div><!-- .comment-body -->
	<?php endif;
}
endif;

if( ! function_exists( 'cookery_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function cookery_sidebar( $class = false ){
    global $post;
    $return      = false;
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' );
    $array_one   = array( 'five', 'six', 'eight', 'nine' );
    $array_two   = array( 'one', 'two', 'three', 'four', 'seven' );
    
    if( ( is_front_page() && is_home() ) || is_home() ){ 

        $home_sidebar = get_theme_mod( 'home_page_sidebar', 'sidebar' );
        $home_layout  = get_theme_mod( 'home_layout', 'three' );
        
        if( in_array( $home_layout, $array_one ) || ( in_array( $home_layout, $array_one ) && $layout == 'no-sidebar' ) ){  
            $return = $class ? 'full-width' : false; //Fullwidth        
        }elseif( is_active_sidebar( $home_sidebar ) ){
            if( $class ){                
                if( in_array( $home_layout, $array_two ) && $layout == 'right-sidebar' ) $return = 'rightsidebar';
                if( in_array( $home_layout, $array_two ) && $layout == 'left-sidebar' ) $return = 'leftsidebar';                
            }else{
                $return = $home_sidebar; //With Sidebar
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }        
    }
    
    if( is_archive() ){
        //archive page
        $archive_sidebar = get_theme_mod( 'archive_page_sidebar', 'sidebar' );
        $cat_sidebar     = get_theme_mod( 'cat_archive_page_sidebar', 'default-sidebar' );
        $tag_sidebar     = get_theme_mod( 'tag_archive_page_sidebar', 'default-sidebar' );
        $date_sidebar    = get_theme_mod( 'date_archive_page_sidebar', 'default-sidebar' );
        $author_sidebar  = get_theme_mod( 'author_archive_page_sidebar', 'default-sidebar' ); 
        
        if( is_category() ){          
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( $cat_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $cat_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $cat_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                
        }elseif( is_tag() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $tag_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $tag_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $tag_sidebar;
                }           
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_author() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $author_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $author_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $author_sidebar;
                }
            }else{
                $return = $class ? 'full-widthasdsadsa' : false; //Fullwidth
            }            
        }elseif( is_date() ){            
            if( $layout == 'no-sidebar' ) {
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $date_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $date_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $date_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }elseif( cookery_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){ //For Woocommerce            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }       
        }elseif( is_delicious_recipe_activated() && ( is_post_type_archive( 'recipe' ) || is_tax( 'recipe-course' ) || is_tax( 'recipe-cuisine' ) || is_tax( 'recipe-cooking-method' ) || is_tax( 'recipe-key' ) || is_tax( 'recipe-tag' ) ) ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( is_active_sidebar( 'delicious-recipe-sidebar' ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
                }else{
                    $return = 'delicious-recipe-sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            } 
        }else{
            if( is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar';//With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';//With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                      
        }        
    }
    
    if( is_singular() ){         
        $post_sidebar = get_theme_mod( 'single_post_sidebar', 'sidebar' ); //Global sidebar for single post from customizer
        $page_sidebar = get_theme_mod( 'single_page_sidebar', 'sidebar' ); //Global Sidebar for single page from customizer
        $page_layout  = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Pages
        $post_layout  = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Posts        
        
        /**
         * Individual post/page layout
        */
        if( get_post_meta( $post->ID, '_cookery_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_cookery_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        /**
         * Individual post/page sidebar
        */     
        if( get_post_meta( $post->ID, '_cookery_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_cookery_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }
        
        if( is_page() ){
            $dr_template = array( 'templates/pages/recipe-courses.php', 'templates/pages/recipe-cuisines.php', 'templates/pages/recipe-cooking-methods.php', 'templates/pages/recipe-keys.php', 'templates/pages/recipe-tags.php' );
            if( is_page_template( $dr_template ) ){
                if( $page_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }elseif( $page_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( is_active_sidebar( 'delicious-recipe-sidebar' ) ){            
                    if( $class ){
                        if( $page_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                        if( $page_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else{
                        $return = 'delicious-recipe-sidebar';    
                    }                         
                }else{
                    $return = $class ? 'full-width' : false;
                } 
            }elseif( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ){
                $return = $class ? 'full-width' : false;
            }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'centered' ) ){
                $return = $class ? 'full-width centered' : false;
            }elseif( $single_sidebar == 'default-sidebar' && is_active_sidebar( $page_sidebar ) ){
                if( $class ){
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                }else{
                    $return = $page_sidebar;
                }
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $class ){
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                }else{
                    $return = $single_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }
        
        if( is_single() ){
            if( 'product' === get_post_type() ){ //For Product Post Type
                if( $post_layout == 'no-sidebar' || $post_layout == 'centered' ){
                    $return = $class ? 'full-width' : false; //Fullwidth
                }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }elseif( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE === get_post_type() ){ //For Product Post Type
                if( $post_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false; //Fullwidth
                }elseif( $post_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false; //Fullwidth
                }elseif( is_active_sidebar( 'delicious-recipe-sidebar' ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else{
                        $return = 'delicious-recipe-sidebar';
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }elseif( 'post' === get_post_type() ){ //For default post type
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( $single_sidebar == 'default-sidebar' && is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }elseif( is_active_sidebar( $single_sidebar ) ){
                    if( $class ){
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                    }else{
                        $return = $single_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }else{ //Custom Post Type
                if( $post_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }elseif( $post_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar';
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }
        }
    } 
        
    if( is_search() ){
        $search_sidebar = get_theme_mod( 'search_page_sidebar', 'sidebar' );       
        
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( $search_sidebar ) ){
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar';
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = $search_sidebar;
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }        
    }
      
    return $return; 
}
endif;

if( ! function_exists( 'cookery_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function cookery_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'cookery' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            if( $slug ){
                $post_options[ $posts->post_title ] = $posts->post_title;
            }else{
                $post_options[ $posts->ID ] = $posts->post_title;    
            }
        }
    }
    return $post_options;
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'cookery_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function cookery_get_categories( $select = true, $taxonomy = 'category', $slug = false, $hide_empty = false ){    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => $hide_empty,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'cookery' );
    foreach( $catlists as $category ){
        if( $slug ){
            $categories[$category->slug] = $category->name;
        }else{
            $categories[$category->term_id] = $category->name;    
        }        
    }
    
    return $categories;
}
endif;

if( ! function_exists( 'cookery_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function cookery_get_id_from_page( $slider_pages ){
    if( $slider_pages ){
        $ids = array();
        foreach( $slider_pages as $p ){
             if( !empty( $p['page'] ) ){
                $page_ids = get_page_by_title( $p['page'] );
                $ids[] = $page_ids->ID;
             }
        }   
        return $ids;
    }else{
        return false;
    }
}
endif;

if( ! function_exists( 'cookery_get_patterns' ) ) :
/**
 * Function to list Custom Pattern
*/
function cookery_get_patterns(){
    $patterns = array();
    $patterns['nobg'] = get_template_directory_uri() . '/images/patterns_thumb/' . 'nobg.png';
    for( $i=0; $i<38; $i++ ){
        $patterns['pattern'.$i] = get_template_directory_uri() . '/images/patterns_thumb/' . 'pattern' . $i .'.png';
    }
    for( $j=1; $j<26; $j++ ){
        $patterns['hbg'.$j] = get_template_directory_uri() . '/images/patterns_thumb/' . 'hbg' . $j . '.png';
    }
    return $patterns;
}
endif;

if( ! function_exists( 'cookery_get_dynamnic_sidebar' ) ) :
/**
 * Function to list dynamic sidebar
*/
function cookery_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'cookery' );
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'cookery' );
    
    if( $sidebars ){        
        foreach( $sidebars as $sidebar ){            
            $id = $sidebar['name'] ? sanitize_title( $sidebar['name'] ) : 'cookery-sidebar-one';
            $sidebar_arr[$id] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'cookery' );
    
    return $sidebar_arr;
}
endif;

if( ! function_exists( 'cookery_create_post' ) ) :
/**
 * A function used to programmatically create a post and assign a page template in WordPress. 
 *
 * @link https://tommcfarlin.com/programmatically-create-a-post-in-wordpress/
 * @link https://tommcfarlin.com/programmatically-set-a-wordpress-template/
 */
function cookery_create_post( $title, $slug, $template ){

	// Setup the author, page
	$author_id = 1;
    
    // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
    // Otherwise, set it to the page's ID.
    $page = get_page_by_title( $title, OBJECT, 'page' );
    $page_id = ( null == $page ) ? -1 : $page->ID;
    
	// If the page doesn't already exist, then create it
	if( $page_id == -1 ){

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status' =>	'closed',
				'ping_status'	 =>	'closed',
				'post_author'	 =>	$author_id,
				'post_name'		 =>	$slug,
				'post_title'	 =>	$title,
				'post_status'	 =>	'publish',
				'post_type'		 =>	'page'
			)
		);
        
        if( $post_id ) update_post_meta( $post_id, '_wp_page_template', $template );

	// Otherwise, we'll stop
	}else{
	   update_post_meta( $page_id, '_wp_page_template', $template );
	} // end if

} // end programmatically_create_post
endif;

if( ! function_exists( 'cookery_get_page_template_url' ) ) :
/**
 * Returns page template url if not found returns home page url
*/
function cookery_get_page_template_url( $page_template ){
    $args = array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $page_template,
        'post_type'  => 'page',
        'fields'     => 'ids',
    );
    
    $posts_array = get_posts( $args );
    
    $url = ( $posts_array ) ? get_permalink( $posts_array[0] ) : get_permalink( get_option( 'page_on_front' ) );
    return $url;    
}
endif;

if( ! function_exists( 'cookery_author_social' ) ) :
/**
 * Author Social Links
*/
function cookery_author_social(){
    $id      = get_the_author_meta( 'ID' );
    $socials = get_user_meta( $id, '_cookery_user_social_icons', true );
    $fonts   = array(
        'facebook'  => 'fab fa-facebook-f', 
        'twitter'   => 'fab fa-twitter',
        'instagram' => 'fab fa-instagram',
        'snapchat'  => 'fab fa-snapchat',
        'pinterest' => 'fab fa-pinterest',
        'linkedin'  => 'fab fa-linkedin-in',
        'youtube'   => 'fab fa-youtube'
    );
    
    if( $socials ){
        echo '<div class="author-social"><ul class="social-networks">';
        foreach( $socials as $key => $link ){
            $add = ( $key == 'youtube' ) ? '-play' : '';
            if( $link ) echo '<li><a href="' . esc_url( $link ) . '" target="_blank" rel="nofollow noopener"><i class="' . esc_attr( $fonts[$key] ) . '"></i></a></li>';
        }
        echo '</ul></div>';
    }
}
endif;

if( ! function_exists( 'cookery_get_real_ip_address' )):
/**
 * Get the actual ip address 
*/
function cookery_get_real_ip_address(){
    if( getenv( 'HTTP_CLIENT_IP' ) ){
        $ip = getenv( 'HTTP_CLIENT_IP' );
    }elseif( getenv( 'HTTP_X_FORWARDED_FOR' ) ){
        $ip = getenv('HTTP_X_FORWARDED_FOR' );
    }elseif( getenv( 'HTTP_X_FORWARDED' ) ){
        $ip = getenv( 'HTTP_X_FORWARDED' );
    }elseif( getenv( 'HTTP_FORWARDED_FOR' ) ){
        $ip = getenv( 'HTTP_FORWARDED_FOR' );
    }elseif( getenv( 'HTTP_FORWARDED' ) ){
        $ip = getenv( 'HTTP_FORWARDED' );
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    return $ip;
}
endif;

if( ! function_exists( 'cookery_likes_can' ) ) :
/**
 * Check if the current IP already liked the content or not.
 */
function cookery_likes_can( $id = 0 ) {
    // Return early if $id is not set.
    if( ! $id ){
        return false;
    }
    
    $ip_list = ( $ip = get_post_meta( $id, '_cookery_post_like_ip', true ) ) ? $ip  : array();

    if( ( $ip_list == '' ) || ( is_array( $ip_list ) && ! in_array( cookery_get_real_ip_address(), $ip_list ) ) ){
        return true;
    }

    return false;
}
endif;

if( ! function_exists( 'cookery_like_count' ) ) :
/**
 * Prints like count of post
*/
function cookery_like_count(){
    $ed_post_like = get_theme_mod( 'ed_post_like', true );
    if( $ed_post_like ) :
        global $post;
        $likes_count = get_post_meta( $post->ID, '_cookery_post_like', true );
        $class = ( cookery_likes_can( $post->ID ) ) ? 'like' : 'liked';
        // $icon  = ( cookery_likes_can( $post->ID ) ) ? 'far fa-heart' : 'fas fa-heart';
        $add_structure  = ( cookery_likes_can( $post->ID ) ) ? '<a href="javascript:void(0);">' : '<span class="liked-icon">';
        $add_structure_end  = ( cookery_likes_can( $post->ID ) ) ? '</a>' : '</span>';
        echo '<div class="cookery_ajax_like" id="like-' . esc_attr( $post->ID ) . '"><span class="favourite ' . esc_attr( $class ) . '">' . $add_structure . '<svg xmlns="http://www.w3.org/2000/svg" width="17.928" height="17.058" viewBox="0 0 17.928 17.058"><path d="M24.445,20A4.434,4.434,0,0,0,20,24.445c0,5,5.038,6.3,8.445,11.223,3.26-4.889,8.482-6.408,8.482-11.223a4.453,4.453,0,0,0-8.482-1.889A4.39,4.39,0,0,0,24.445,20Z" transform="translate(-19.5 -19.5)" fill="none" stroke="#db0c18" stroke-width="1"/></svg>' . $add_structure_end . '<span class="fav-count">' . absint( $likes_count ) . '</span></span></div>';
    endif;
}
endif;

if( ! function_exists( 'cookery_get_like_count' ) ) :
/**
 * Return post like count
*/
function cookery_get_like_count( $post_id ){
    $count = get_post_meta( $post_id, '_cookery_post_like', true );
    if( $count ){
        return $count;
    }else{
        return 0;
    }   
}
endif;

if( ! function_exists( 'cookery_get_ad_block' ) ) :
/**
 * Display AD block
 * 
 * @param $image     - Ad Image file
 * @param $link      - Ad Link
 * @param $target    - Link target
 * @param $adcode    - Adsence Adcode
 * @param $ed_adcode - Enable/disable Adcode
*/
function cookery_get_ad_block( $image, $link = false, $target = '_blank', $adcode = false, $ed_adcode = false ){
    ?>
    <div class="advertisement-block">
        <?php 
            if( $ed_adcode && $adcode ){
                echo $adcode; 
            }elseif( $image && ! $ed_adcode ){
                if( $link ) echo '<a href="' . esc_url( $link ) . '"' . $target . '>'; ?>
                    <img src="<?php echo esc_url( $image ); ?>" />
                <?php 
                if( $link ) echo '</a>'; 
            }
        ?>      
    </div>
    <?php    
}
endif; 

if( ! function_exists( 'cookery_home_ads' ) ) :
/**
 * Prints Home Page ADs
*/
function cookery_home_ads(){
    $ed_ad          = get_theme_mod( 'ed_home_ad' );
    $target         = get_theme_mod( 'open_link_diff_tab_home', true ) ? 'target="_blank"' : '';
    $ed_ad_code     = get_theme_mod( 'ed_home_ad_code' );
    $ad_code        = get_theme_mod( 'home_ad_code' ); 
    $after_n_post   = get_theme_mod( 'after_n_post', 2 );
    $repeat_n_times = get_theme_mod( 'repeat_n_times', 3 );
    $ad_img_one     = get_theme_mod( 'home_ad_one' ); 
    $ad_link_one    = get_theme_mod( 'home_ad_one_link' );
    $ad_img_two     = get_theme_mod( 'home_ad_two' ); 
    $ad_link_two    = get_theme_mod( 'home_ad_two_link' );
    $ad_img_three   = get_theme_mod( 'home_ad_three' ); 
    $ad_link_three  = get_theme_mod( 'home_ad_three_link' );
    $ad_img_four    = get_theme_mod( 'home_ad_four' ); 
    $ad_link_four   = get_theme_mod( 'home_ad_four_link' );
    
    if( $ad_img_one ){
        $image_one = wp_get_attachment_image_url( $ad_img_one, 'full' );
    }else{
        $image_one = false;
    }
    
    if( $ad_img_two ){
        $image_two = wp_get_attachment_image_url( $ad_img_two, 'full' );
    }else{
        $image_two = false;
    }
    
    if( $ad_img_three ){
        $image_three = wp_get_attachment_image_url( $ad_img_three, 'full' );
    }else{
        $image_three = false;
    }

    if( $ad_img_four ){
        $image_four = wp_get_attachment_image_url( $ad_img_four, 'full' );
    }else{
        $image_four = false;
    }
    
    static $count     = 0;
    static $repeated  = 0;
    static $img_count = 0;
    
    if( $ed_ad ){
        if( $ed_ad_code && $ad_code ){ //AD Code
            if( ( $count % $after_n_post == 0 ) && ( $count > 0 ) && ( $repeated < $repeat_n_times ) ){
                cookery_get_ad_block( false, false, false, $ad_code, $ed_ad_code );
                $repeated ++;    
            }
        }else{ //AD Image
            if( ( $count % $after_n_post == 0 ) && ( $count > 0 ) ){
                $img_count ++;                
                if( $img_count == 1 ){
                    cookery_get_ad_block( $image_one, $ad_link_one, $target, false, false );
                }
                if( $img_count == 2 ){
                    cookery_get_ad_block( $image_two, $ad_link_two, $target, false, false );
                }
                if( $img_count == 3 ){
                    cookery_get_ad_block( $image_three, $ad_link_three, $target, false, false );
                }
                if( $img_count == 4 ){
                    cookery_get_ad_block( $image_four, $ad_link_four, $target, false, false );
                }            
            }
        }
        $count ++;
    }
}
endif;

if( ! function_exists( 'cookery_loop_start' ) ) :
/**
 * Injecting home page AD inside loop 
*/
function cookery_loop_start( $query ){
    if( is_home() && $query->is_main_query() ){
        add_action( 'the_post', 'cookery_home_ads' );
        add_action( 'loop_end', 'cookery_loop_end' );
    }else{
        remove_action( 'the_post', 'cookery_home_ads', 10 );
    }    
}
endif;
add_action( 'loop_start', 'cookery_loop_start' );

if( ! function_exists( 'cookery_loop_end' ) ) :
/**
 * Remove home page Ad from the loop 
*/
function cookery_loop_end(){
    remove_action( 'the_post', 'cookery_home_ads', 10 );
}
endif;

if( ! function_exists( 'cookery_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function cookery_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'cookery_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function cookery_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = cookery_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
            <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if ( ! function_exists( 'cookery_comment_toggle' ) ):
/**
 * Function toggle comment section position
*/
function cookery_comment_toggle(){
    $comment_postion = get_theme_mod( 'toggle_comments', false );

    if ( $comment_postion ) {
        $priority = 5;
    }else{
        $priority = 45;
    }
    return absint( $priority ) ;
}
endif;

if( ! function_exists( 'wp_body_open' ) ) :
/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
*/
function wp_body_open() {
	/**
	 * Triggered after the opening <body> tag.
    */
	do_action( 'wp_body_open' );
}
endif;

if( ! function_exists( 'cookery_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function cookery_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if ( ! function_exists( 'cookery_apply_theme_shortcode' ) ) :
/**
 * Footer Shortcode
*/
function cookery_apply_theme_shortcode( $string ) {
    if ( empty( $string ) ) {
        return $string;
    }
    $search = array( '[the-year]', '[the-site-link]' );
    $replace = array(
        date_i18n( esc_html__( 'Y', 'cookery' ) ),
        '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>',
    );
    $string = str_replace( $search, $replace, $string );
    return $string;
}
endif;

/**
 * Is Blossom Theme Toolkit active or not
*/
function is_bttk_activated(){
    return class_exists( 'Blossomthemes_Toolkit' ) ? true : false;
}

/**
 * Is BlossomThemes Email Newsletters active or not
*/
function is_btnw_activated(){
    return class_exists( 'Blossomthemes_Email_Newsletter' ) ? true : false;        
}

/**
 * Query WooCommerce activation
 */
function cookery_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Check if Delicious Recipe Plugin is installed
*/
function is_delicious_recipe_activated(){
    return class_exists( 'WP_Delicious\DeliciousRecipes' ) ? true : false;
}

/**
 * Check if Contact Form 7 Plugin is installed
*/
function is_cf7_activated(){
    return class_exists( 'WPCF7' ) ? true : false;
}

/**
 * Query Jetpack activation
*/
function is_jetpack_activated( $gallery = false ){
	if( $gallery ){
        return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) ? true : false;
	}else{
        return class_exists( 'jetpack' ) ? true : false;
    }           
}

/**
 * Checks if elementor is active or not
*/
function cookery_is_elementor_activated(){
    return class_exists( 'Elementor\\Plugin' ) ? true : false; 
}

if( cookery_is_elementor_activated() ){
    
    /**Disable Default Colours and Default Fonts of elementor on Theme Activation*/

    $fresh        = get_option( 'cookery_flag' );
    if( ! $fresh ){
        update_option('elementor_disable_color_schemes', 'yes');
        update_option('elementor_disable_typography_schemes', 'yes');
        update_option( 'cookery_flag', true ); 
    }
}

/**
 * Checks if elementor has override that particular page/post or not
*/
function cookery_is_elementor_activated_post(){
    if( cookery_is_elementor_activated() && is_singular() ){
        global $post;
        $post_id = $post->ID;
        return \Elementor\Plugin::$instance->documents->get( $post_id )->is_built_with_elementor() ? true : false;
    }else{
        return false;
    }
}

/**
 * Checks if classic editor is active or not
*/
function is_classic_editor_activated(){
    return class_exists( 'Classic_Editor' ) ? true : false; 
}

if ( ! function_exists( 'cookery_static_cta_banner' ) ) :
/**
 * Static Cta Banner
*/
function cookery_static_cta_banner() { 
    $style_class      = get_theme_mod( 'static_cta_layout', 'one' ); 
    $banner_title     = get_theme_mod( 'banner_title', __( 'Hey there, Welcome. I’m Rebbeca Alvarado', 'cookery' ) );
    $banner_subtitle  = get_theme_mod( 'banner_subtitle', __( 'A certified Holistic Nutritionist, yoga-lover, girl\'s mom, and founder of Blossom Cookery. It’s nice to meet you.. It’s the perfect base for your favorite salad toppings.', 'cookery' ) );
    $button_one       = get_theme_mod( 'button_one', __( 'Get Started', 'cookery' ) );
    $button_one_url   = get_theme_mod( 'button_one_url', '#' );
    $button_two       = get_theme_mod( 'button_two', __( 'Know More', 'cookery' ) );
    $button_two_url   = get_theme_mod( 'button_two_url', '#' );
    $button_one_new   = get_theme_mod( 'button_one_tab_new', false );
    $button_two_new   = get_theme_mod( 'button_two_tab_new', false );
    $static_banner_bg = get_theme_mod( 'static_banner_bg', get_template_directory_uri() . '/images/static-banner-bg.jpg' );
    $target_one = $target_two = '';
    $cta_banner_alignment   = get_theme_mod( 'cta_banner_alignment', 'right' );

    ?>
    <div id="banner_section" class="site-banner static-cta<?php echo ' style-' . esc_attr( $style_class ); ?><?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
        <div class="item <?php echo esc_html( $cta_banner_alignment ); ?>" <?php if( $static_banner_bg ) { ?> style="background-image: url('<?php echo esc_url ( $static_banner_bg ); ?>');"<?php } ?>>
            <?php 
            if( $style_class != 'one' ) echo '<div class="container">';
                echo '<div class="item-img">';
                the_custom_header_markup(); 
                echo '</div>';

                if( $banner_title || $banner_subtitle || ( $button_one && $button_one_url ) || ( $button_two && $button_two_url ) ){
                    echo '<div class="banner-caption">';
                        if( $banner_title ) echo '<h2 class="item-title">' . esc_html( $banner_title ) . '</h2>';
                        if( $banner_subtitle ) echo '<div class="item-desc">' . wp_kses_post( $banner_subtitle ) . '</div>';
                        if( ( $button_one && $button_one_url ) || ( $button_two && $button_two_url ) ) {
                            echo '<div class="button-wrap">';
                            if( $button_one && $button_one_url ) {
                                if( $button_one_new ) $target_one = ' target="_blank"';
                                echo '<a href="' . esc_url( $button_one_url ) . '" class="btn-readmore btn1"' . $target_one . '>' . esc_html( $button_one ) . '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689">
                                <g transform="translate(0.75 1.061)">
                                    <path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none"
                                        stroke="#232323" stroke-linecap="round" stroke-width="1.5"></path>
                                    <path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323"
                                        stroke-linecap="round" stroke-width="1.5"></path>
                                </g>
                            </svg></a>';                              
                            }
                            if( $button_two && $button_two_url ) {
                                if( $button_two_new ) $target_two = ' target="_blank"';
                                echo '<a href="' . esc_url( $button_two_url  ) . '" class="btn-readmore btn2"' . $target_two . '>' . esc_html( $button_two ) . '<svg xmlns="http://www.w3.org/2000/svg" width="18.479" height="12.689" viewBox="0 0 18.479 12.689">
                                <g transform="translate(0.75 1.061)">
                                    <path d="M7820.11-1126.021l5.284,5.284-5.284,5.284" transform="translate(-7808.726 1126.021)" fill="none"
                                        stroke="#232323" stroke-linecap="round" stroke-width="1.5"></path>
                                    <path d="M6558.865-354.415H6542.66" transform="translate(-6542.66 359.699)" fill="none" stroke="#232323"
                                        stroke-linecap="round" stroke-width="1.5"></path>
                                </g>
                            </svg></a>';
                            }  
                            echo '</div>';                            
                        }
                    echo '</div>';
                }

            if( $style_class != 'one' ) echo '</div>';
            ?>
        </div>
    </div>
<?php
}
endif;

if ( ! function_exists( 'cookery_static_newsletter_banner' ) ) :
/**
 * Static Newsletter Banner
*/
function cookery_static_newsletter_banner() { 
    $style_class        = get_theme_mod( 'static_newsletter_layout', 'one' ); 
    $banner_newsletter  = get_theme_mod( 'banner_newsletter' ); 
    $static_banner_bg   = get_theme_mod( 'static_banner_bg' );
    $static_banner_thumb   = get_theme_mod( 'static_newsletter_banner_thumb' );
    
    ?>
    <div id="banner_section" class="site-banner static-newsletter<?php echo ' style-' . esc_attr( $style_class ); ?><?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
        <div class="item"<?php if( $style_class == 'one' || $style_class == 'three' ) { ?> style="background-image: url('<?php echo esc_url ( $static_banner_bg ); ?>');"<?php } ?>>
            <?php if( $style_class == 'three' ) echo '<div class="container">';

                echo '<div class="item-img">';
                the_custom_header_markup(); 
                echo '</div>';

                if( $banner_newsletter ){
                    echo '<div class="banner-caption">';
                    if( $style_class == 'two' ) echo '<div class="container">';
                    if( $style_class == 'two' && $static_banner_thumb ) {
                        echo '<div class="item-img-thumb">';
                        echo wp_get_attachment_image( $static_banner_thumb );
                        echo '</div>';
                    }
                    echo do_shortcode( wp_kses_post( $banner_newsletter ) );
                    if( $style_class == 'two' ) echo '</div>';
                    echo '</div>';
                }   
            if( $style_class == 'three' ) echo '</div>';
            ?>
        </div>
    </div>
<?php
}
endif;

if ( ! function_exists( 'cookery_static_search_banner' ) ) :
/**
 * Static Search Banner
*/
function cookery_static_search_banner() { 
    $style_class        = get_theme_mod( 'static_search_layout', 'one' ); 
    $banner_title     = get_theme_mod( 'banner_title', __( 'Hey there, Welcome. I’m Rebbeca Alvarado', 'cookery' ) );
    $banner_subtitle  = get_theme_mod( 'banner_subtitle', __( 'A certified Holistic Nutritionist, yoga-lover, girl\'s mom, and founder of Blossom Cookery. It’s nice to meet you.. It’s the perfect base for your favorite salad toppings.', 'cookery' ) );
    
    ?>
    <div id="banner_section" class="site-banner static-search<?php echo ' style-' . esc_attr( $style_class ); ?><?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
        <div class="item">
                <?php 
                echo '<div class="item-img">';
                the_custom_header_markup(); 
                echo '</div>';

                echo '<div class="banner-caption"><div class="container">';
                    if( $banner_title ) echo '<h2 class="item-title">' . esc_html( $banner_title ) . '</h2>';
                    if( $banner_subtitle ) echo '<div class="item-desc">' . wp_kses_post( $banner_subtitle ) . '</div>';
                    ?>
                    <div class="advance-search-wrap">
                        <div class="search-form-wrap">
                            <?php echo cookery_banner_search_form(); ?>
                        </div>
                    </div>
                <?php        
                echo '</div></div>';
            ?>
        </div>
    </div>
<?php
}
endif;

if( ! function_exists( 'cookery_banner_search_form' ) ):
/**
 * Filter to modify search
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */
function cookery_banner_search_form(){
    global $post;         
    $parent  = get_post_ancestors( $post->ID );      
    $post_id = ( $post->post_parent == 0 ) ? $post->ID : end( $parent );
    $form    = '<form role="search" method="get" autocomplete="off" class="search-form" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">                
        <label>
            <span class="screen-reader-text" for="s">' . _x( 'Search for:', 'label', 'cookery' ) . '</span>
            <input type="search" class="search-field" value="' . esc_attr( get_search_query() ) . '" name="s" placeholder="' . esc_attr_x( 'Search here...', 'placeholder', 'cookery' ) . '"/>
        </label>
        <input type="submit" class="search-submit" value="Submit" />
    </form>';

    return $form;
}
endif;

if( ! function_exists( 'cookery_slider_meta_contents' ) ):
/**
 * Slider Meta
*/
function cookery_slider_meta_contents(){
    $slider_layout  = get_theme_mod( 'slider_layout', 'one' );
    $show_date      = get_theme_mod( 'slider_show_date', true );
    
    if( is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ) {
        if( $slider_layout == 'one' || $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'six' ){
            if( $slider_layout == 'six' ) cookery_recipe_category();
            the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            echo '<div class="item-meta">';
            cookery_recipe_keywords();
            cookery_prep_time();
            cookery_difficulty_level();
            echo '</div>';
        }

        if( $slider_layout == 'four' || $slider_layout == 'five' ){
            cookery_recipe_category();
            the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            echo '<div class="item-meta">';
            if( $show_date ) cookery_posted_on();
            cookery_comment_count();
            cookery_recipe_rating();
            echo '</div>';

            echo '<div class="item-content">';
            the_excerpt();
            echo '</div>';

            echo '<footer class="item-footer">';
            cookery_posted_by();
            cookery_recipe_keywords();
            cookery_prep_time();
            cookery_difficulty_level();
            echo '</footer>';
        }

        if( $slider_layout == 'seven' || $slider_layout == 'eight' ){
            cookery_recipe_keywords();
            cookery_recipe_category();
            the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            echo '<div class="item-meta">';
            cookery_prep_time();
            cookery_difficulty_level();
            cookery_recipe_rating();
            echo '</div>';
        }
    }else{
        cookery_category();
        the_title( '<h2 class="item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

        if( $slider_layout == 'four' || $slider_layout == 'five' ){
            echo '<div class="item-content">';
            the_excerpt();
            echo '</div>';
        }

        if( 'post' == get_post_type() && $show_date ) :
            echo '<div class="item-meta">';
                cookery_posted_on();
            echo '</div>';
        endif;
    }
}
endif;

if( ! function_exists( 'cookery_add_home_class' ) ):
/**
 * Home Class
*/
function cookery_add_home_class(){
    $home_layout    = get_theme_mod( 'home_layout', 'three' );
    
    switch( $home_layout ) {
        case 'one' :
        $add_home_class = 'classic-with-tall-img';
        break;
        
        case 'two' :
        $add_home_class = 'classic-with-square-img';
        break;
        
        case 'three' :
        $add_home_class = 'list-with-first-lg';
        break;

        case 'four' :
        $add_home_class = 'list-with-all-square-img';
        break;

        case 'five' :
        $add_home_class = 'list-sticky-with-tall-img';
        break;

        case 'six' :
        $add_home_class = 'list-sticky-with-square-img';
        break;

        case 'seven' :
        $add_home_class = 'grid-with-first-lg';
        break;

        case 'eight' :
        $add_home_class = 'masonry-grid';
        break;

        case 'nine' :
        $add_home_class = 'masonry-grid-with-boxshadow';
        break;

        default :
        $add_home_class = 'list-with-first-lg';
        break;
    }
        
    return $add_home_class;

}
endif;

if( ! function_exists( 'cookery_home_image_size' ) ):
/**
 * Home Class
*/
function cookery_home_image_size(){
    global $wp_query;
    $home_layout    = get_theme_mod( 'home_layout', 'three' );
    $sidebar        = cookery_sidebar();
    
    if( $home_layout == 'one' ) {
        $image_size = ( $sidebar ) ? 'cookery-blog-classic-lg' : 'cookery-blog-large';
    }elseif( $home_layout == 'two' ) {
        $image_size = ( $sidebar ) ? 'cookery-blog-list-lg' : 'cookery-blog-large';
    }elseif( $home_layout == 'three' ) {
        if( $wp_query->current_post == 0 ) {
            $image_size = ( $sidebar ) ? 'cookery-blog-list-lg' : 'cookery-blog-large';
        }else{
            $image_size = ( $sidebar ) ? 'cookery-blog' : 'cookery-slider';
        }
    }elseif( $home_layout == 'four' ) {
        if( $wp_query->current_post == 0 ) {
            $image_size = ( $sidebar ) ? 'cookery-blog-list-lg' : 'cookery-blog-large';
        }else{
            $image_size = ( $sidebar ) ? 'cookery-blog-list-square' : 'cookery-blog-list-lg';
        }
    }elseif( $home_layout == 'five' ) {
        if( $wp_query->current_post == 0 ) {
            $image_size = 'cookery-blog-list-lg';
        }else{
            $image_size = 'cookery-blog';
        }
    }elseif( $home_layout == 'six' ) {
        if( $wp_query->current_post == 0 ) {
            $image_size = 'cookery-blog-list-lg';
        }else{
            $image_size = 'cookery-blog-list-square';
        }
    }elseif( $home_layout == 'seven' ) {
        if( $wp_query->current_post == 0 ) {
            $image_size = ( $sidebar ) ? 'cookery-blog-classic-lg' : 'cookery-blog-large';
        }else{
            $image_size = ( $sidebar ) ? 'cookery-blog-grid' : 'cookery-blog-grid-full';
        }
    }elseif( $home_layout == 'eight' || $home_layout == 'nine' ) {
        $image_size = 'full';
    }else{
        $image_size = 'cookery-blog';
    }

    return $image_size;
}
endif;

if( ! function_exists( 'cookery_recipe_single_header' ) ):
/**
 * Home Class
*/
function cookery_recipe_single_header( $make = true ){
    /**
     * Recipe page header.
    */
    global $recipe;
    $recipe_post  = get_post( get_the_ID() );
    $recipe = delicious_recipes_get_recipe( $recipe_post );

    // Get global toggles.
    $global_toggles = delicious_recipes_get_global_toggles_and_labels();

    $the_permalink       = get_the_permalink();
    $the_print_permalink = add_query_arg( 'print_recipe', 'true', $the_permalink );

    $recipe_global = delicious_recipes_get_global_settings();

    $single_recipe_layout = get_theme_mod( 'single_recipe_layout', 'one' );

    if( $single_recipe_layout == 'five' && $make ) : ?>
        <div class="post-title-wrap">
            <div class="dr-category">
                <?php the_terms( $recipe->ID, 'recipe-course', '', '', '' ); ?>
            </div>
            <h1 class="dr-entry-title"><?php echo esc_html( $recipe->name ); ?></h1>
        </div>
    <?php endif; 
    if( ( $single_recipe_layout != 'five' ) || ( $single_recipe_layout == 'five' && !$make ) ) : ?>
        <header class="dr-entry-header">
            <?php 
            $enableRecipeSingleHead = isset( $recipe_global['enableRecipeSingleHead'][0] ) && 'yes' === $recipe_global['enableRecipeSingleHead'][0] ? true : false;

            if ( $enableRecipeSingleHead ) :
                
                if( $single_recipe_layout != 'five' ) : ?>
                    <div class="dr-category">
                        <?php the_terms( $recipe->ID, 'recipe-course', '', '', '' ); ?>
                    </div>
                    <h1 class="dr-entry-title"><?php echo esc_html( $recipe->name ); ?></h1>
                <?php endif; ?>
                <div class="dr-entry-meta">
                    <?php if ( $global_toggles['enable_recipe_author'] ): ?>
                        <span class="dr-byline">
                            <?php echo get_avatar( $recipe->author_id, 32 ); ?>
                            <a href="<?php echo esc_url( get_author_posts_url( $recipe->author_id ) ) ?>" class="fn"><?php echo esc_html( $recipe->author ); ?></a>
                        </span>
                    <?php endif; ?>

                    <?php if ( $global_toggles['enable_published_date'] ): ?>
                        <span class="dr-posted-on">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="31" viewBox="0 0 33 31"><defs><filter id="Rectangle_1344" x="0" y="0" width="33" height="31" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="blur"/><feFlood flood-color="#e84e3b" flood-opacity="0.102"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g id="Group_5559" data-name="Group 5559" transform="translate(-534.481 -811)"><g transform="matrix(1, 0, 0, 1, 534.48, 811)" filter="url(#Rectangle_1344)"><rect id="Rectangle_1344-2" data-name="Rectangle 1344" width="15" height="13" transform="translate(9 6)" fill="#fff"/></g><path id="Path_30675" data-name="Path 30675" d="M5.84,23.3a2.279,2.279,0,0,1-2.277-2.277V10.1A2.279,2.279,0,0,1,5.84,7.821H7.206V6.455a.455.455,0,0,1,.911,0V7.821h6.375V6.455a.455.455,0,0,1,.911,0V7.821h1.366A2.28,2.28,0,0,1,19.044,10.1V21.026A2.279,2.279,0,0,1,16.767,23.3ZM4.474,21.026A1.367,1.367,0,0,0,5.84,22.392H16.767a1.368,1.368,0,0,0,1.366-1.366V12.374H4.474ZM5.84,8.732A1.367,1.367,0,0,0,4.474,10.1v1.366h13.66V10.1a1.368,1.368,0,0,0-1.366-1.366Z" transform="translate(539.437 808)" fill="#abadb4"/><g id="Group_5542" data-name="Group 5542" transform="translate(547.149 822.506)"><path id="Path_30676" data-name="Path 30676" d="M1036.473-439.908a.828.828,0,0,1,.831.814.832.832,0,0,1-.833.838.831.831,0,0,1-.825-.822A.826.826,0,0,1,1036.473-439.908Z" transform="translate(-1035.646 439.908)" fill="#374757"/><path id="Path_30677" data-name="Path 30677" d="M1105.926-439.908a.826.826,0,0,1,.831.826.832.832,0,0,1-.821.826.831.831,0,0,1-.836-.823A.827.827,0,0,1,1105.926-439.908Z" transform="translate(-1099.534 439.908)" fill="#374757"/><path id="Path_30678" data-name="Path 30678" d="M1071.255-439.909a.821.821,0,0,1,.81.844.825.825,0,0,1-.847.809.825.825,0,0,1-.8-.851A.821.821,0,0,1,1071.255-439.909Z" transform="translate(-1067.628 439.909)" fill="#374757"/><path id="Path_30679" data-name="Path 30679" d="M1036.473-439.908a.828.828,0,0,1,.831.814.832.832,0,0,1-.833.838.831.831,0,0,1-.825-.822A.826.826,0,0,1,1036.473-439.908Z" transform="translate(-1035.646 443.397)" fill="#374757"/><path id="Path_30680" data-name="Path 30680" d="M1105.926-439.908a.826.826,0,0,1,.831.826.832.832,0,0,1-.821.826.831.831,0,0,1-.836-.823A.827.827,0,0,1,1105.926-439.908Z" transform="translate(-1099.534 443.397)" fill="#374757"/><path id="Path_30681" data-name="Path 30681" d="M1071.255-439.909a.821.821,0,0,1,.81.844.825.825,0,0,1-.847.809.825.825,0,0,1-.8-.851A.821.821,0,0,1,1071.255-439.909Z" transform="translate(-1067.628 443.397)" fill="#374757"/></g></g></svg>
                            <time><?php echo esc_html( delicious_recipes_get_formated_date( $recipe->date_published ) ); ?></time>
                        </span>
                    <?php endif; ?>

                    <?php if ( $global_toggles['enable_comments'] ): ?>
                        <span class="dr-comment">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35.556" height="36.263" viewBox="0 0 35.556 36.263"><defs><filter id="a" x="0" y="0" width="35.556" height="36.263" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="b"/><feFlood flood-color="#e84e3b" flood-opacity="0.102"/><feComposite operator="in" in2="b"/><feComposite in="SourceGraphic"/></filter></defs><g transform="translate(-867.5 -4569.5)"><g transform="matrix(1, 0, 0, 1, 867.5, 4569.5)" filter="url(#a)"><path d="M14.191,128H2.365A2.574,2.574,0,0,0,0,130.365v7.1a2.316,2.316,0,0,0,2.365,2.365H3.548v4.73l4.73-4.73h5.913a2.638,2.638,0,0,0,2.365-2.365v-7.1A2.574,2.574,0,0,0,14.191,128Z" transform="translate(9.5 -121.5)" fill="#fff" stroke="rgba(55,71,87,0.42)" stroke-width="1"/></g><path d="M1036.824-439.908a1.181,1.181,0,0,1,1.185,1.161,1.186,1.186,0,0,1-1.187,1.2,1.184,1.184,0,0,1-1.176-1.172A1.177,1.177,0,0,1,1036.824-439.908Z" transform="translate(-155.677 5020.164)" fill="#374757"/><path d="M1106.277-439.908a1.178,1.178,0,0,1,1.185,1.178,1.186,1.186,0,0,1-1.171,1.178,1.184,1.184,0,0,1-1.193-1.173A1.179,1.179,0,0,1,1106.277-439.908Z" transform="translate(-217.195 5020.164)" fill="#374757"/><path d="M1071.613-439.909a1.171,1.171,0,0,1,1.155,1.2,1.177,1.177,0,0,1-1.207,1.153,1.177,1.177,0,0,1-1.146-1.214A1.171,1.171,0,0,1,1071.613-439.909Z" transform="translate(-186.473 5020.166)" fill="#374757"/></g></svg>
                            <a href="#comments"><?php 
                                /* translators: %s: total comments count */
                                echo sprintf( _nx( '%s Comment', '%s Comments', number_format_i18n( $recipe->comments_number ), 'number of comments', 'cookery' ), number_format_i18n( $recipe->comments_number ) ); 
                            ?></a>
                        </span>
                    <?php endif; ?>

                    <?php if ( $recipe->rating && $global_toggles['enable_ratings'] ): ?>
                        <span class="dr-rating">
                            <svg class="icon">
                                <use xlink:href="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ?>assets/images/sprite.svg#rating"></use>
                            </svg>
                            <a href="#comments"><?php echo esc_html( $recipe->rating ); ?></a>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ( isset( $recipe->recipe_subtitle )  && ! empty( $recipe->recipe_subtitle ) ) : ?>
                <div class="dr-info">
                    <?php echo wp_kses_post( $recipe->recipe_subtitle ) ?>
                </div>
            <?php endif; ?>
            <div class="dr-buttons">
                <?php if ( $global_toggles['enable_jump_to_recipe'] ) : ?>
                    <a href="#dr-recipe-meta-main-<?php echo absint($recipe->ID); ?>" class="dr-btn-link dr-btn1"><?php echo esc_html( $global_toggles['jump_to_recipe_lbl'] ); ?> <svg xmlns="http://www.w3.org/2000/svg" width="9.647" height="14.193" viewBox="0 0 9.647 14.193"><g transform="translate(8.94 0.5) rotate(90)"><path d="M7820.11-1126.021l4.117,4.116-4.117,4.116" transform="translate(-7811.241 1126.021)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1"/><path d="M6555.283-354.415h-12.624" transform="translate(-6542.659 358.532)" fill="none" stroke="#232323" stroke-linecap="round" stroke-width="1"/></g></svg></a>
                <?php endif; ?>

                <?php if ( ! empty( $recipe->video_gallery ) && $global_toggles['enable_jump_to_video'] ) : ?>
                    <a href="#dr-video-gallery-<?php echo absint($recipe->ID); ?>" class="dr-btn-link dr-btn1"><i class="fas fa-play"></i><?php echo esc_html( $global_toggles['jump_to_video_lbl'] ); ?></a>
                <?php endif; ?>

                <?php
                    if ( $global_toggles['enable_print_recipe'] ) {
                        delicious_recipes_get_template_part( 'recipe/print', 'btn' );
                    }
                ?>
                <?php 
                   do_action( 'delicious_recipes_wishlist_button' );             
                ?>
            </div>
        </header>
    <?php endif;
}
endif;

if( ! function_exists( 'cookery_recipe_single_thumbnail' ) ):
/**
 * Home Class
*/
function cookery_recipe_single_thumbnail(){
    /**
     * Recipe page header.
    */
    $recipe_post  = get_post( get_the_ID() );
    $recipe = delicious_recipes_get_recipe( $recipe_post );
    $single_recipe_layout = get_theme_mod( 'single_recipe_layout', 'one' );

    if( $single_recipe_layout == 'two' ) {
        $image_size = 'cookery-blog-single-two';
    }elseif( $single_recipe_layout == 'three' ) {
        $image_size = 'cookery-blog-list-lg';
    }elseif( $single_recipe_layout == 'four' ) {
        $image_size = 'cookery-blog-list-lg';
    }elseif( $single_recipe_layout == 'five' ) {
        $image_size = 'large';
    }

    // Check for images.
    if ( ! isset( $recipe->thumbnail_id ) || empty( $recipe->thumbnail_id ) ) {
        return;
    }
    ?>
    <figure class="dr-feature-image">
        <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'recipe-feat-gallery' ); 
            } else {
                echo wp_get_attachment_image( $recipe->thumbnail_id, 'recipe-feat-gallery' );
            }
        ?>
        <span class="post-pinit-button">
            <a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>/&media=<?php echo esc_url( $recipe->thumbnail ); ?>&description=So%20delicious!" data-pin-custom="true">
                <img src="<?php echo plugin_dir_url( DELICIOUS_RECIPES_PLUGIN_FILE ) ?>/assets/images/pinit-sm.png" alt="pinit">
            </a>
        </span>
        <?php if ( isset( $recipe->image_gallery ) && ! empty( $recipe->image_gallery ) ) : ?>
            <a href="#" class="view-gallery-btn del-recipe-gallery-link">
                <b><?php echo esc_html__( 'View Gallery', 'cookery' ); ?></b>
                <span><?php 
                    /* translators: %1$s: gallery images count */
                    echo sprintf( _nx( '%1$s photo', '%1$s photos', count( $recipe->image_gallery ), 'delicious-recipes', 'cookery' ), number_format_i18n( count( $recipe->image_gallery ) ) ); 
                ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14.796" height="10.354" viewBox="0 0 14.796 10.354"><g transform="translate(0.75 1.061)"><path d="M7820.11-1126.021l4.117,4.116-4.117,4.116" transform="translate(-7811.241 1126.021)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"/><path d="M6555.283-354.415h-12.624" transform="translate(-6542.659 358.532)" fill="none" stroke="#374757" stroke-linecap="round" stroke-width="1.5"/></g></svg>
            </a>
            <div class="del-recipe-gallery">
                <?php foreach( $recipe->image_gallery as $key => $img ) : 
                    $image_id = isset( $img['imageID'] ) ? $img['imageID'] : false;
                    if ( $image_id ) :
                        $image_url = wp_get_attachment_image_url( $image_id, 'recipe-feat-gallery' );
                        ?>
                            <a href="<?php echo esc_url( $image_url ); ?>"></a>
                        <?php 
                    endif;
                endforeach; ?>
            </div>
        <?php endif; ?>
    </figure>
<?php
}
endif;

if( ! function_exists( 'cookery_post_second_entry_header' ) ):
/**
 * Entry Header
*/
function cookery_post_second_entry_header(){ 
    $image_size     = 'thumbnail';
    $ed_featured    = get_theme_mod( 'ed_featured_image', true );
    $ed_crop_single = get_theme_mod( 'ed_crop_single', false );
    ?>
    
    <header class="entry-header">
    <?php 
        cookery_category();

        if( is_singular() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        }else{
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
    
        if( 'post' === get_post_type() ){
            echo '<div class="entry-meta">';
            cookery_posted_on();
            cookery_comment_count();
            echo '</div>';
        }       

    ?>
    </header>         
    <?php    

    $image_size = 'cookery-single-two';
    if( is_single() ){
        if( $ed_featured && has_post_thumbnail() ){
            echo '<div class="post-thumbnail">';
            if( $ed_crop_single ){
                the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
            }else{
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
            }
            echo '</div>';    
        }
    }
}
endif;

if( ! function_exists( 'cookery_single_meta_layout' ) ) :
/**
 * Single Layout
*/
function cookery_single_meta_layout(){

    if( !is_single() ) return false;

    global $post;

    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    $single_meta   = get_post_meta( $post->ID, '_cookery_single_layout', true ); 

    if( $single_meta && $single_meta != 'default' ){
        $single_layout_meta = $single_meta;
    }else{
        $single_layout_meta = $single_layout;
    }

    return $single_layout_meta;                               
}
endif;

if( ! function_exists( 'cookery_single_article_meta' ) ) :
/**
 * Single Article Meta
*/
function cookery_single_article_meta(){

    echo '<div class="floated-meta"><div class="floated-meta-inner">';
    cookery_social_share();
    cookery_like_count();
    echo '</div></div>';                             
}
endif;

/**
 * Include required files.
 *
 * @return void
 */
function cookery_demo_importer() {
    //Demo importer hooks corrected
    add_filter( 'demo_importer_plus_is_pro', '__return_true' );
    add_filter( 'demo_importer_plus_license_page', function() { return esc_url( admin_url('admin.php?page=cookery-dashboard#license') ); } );
    
    add_filter( 'demo_importer_plus_pro_active', function() {
        $status  = get_option( 'cookery_license_key_status' );

        if( $status !== false && $status == 'valid' ){
            return true;
        }
    } );
}

cookery_demo_importer();

/**
 * Add filter only if function exists
 */
if (function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_url',
        function () {
            return 'https://blossomthemesdemo.com/';
        }
    );
}

add_filter( 'demo_importer_plus_get_pro_text', '__return_false' );
add_filter( 'demo_importer_plus_get_pro_url', '__return_false' );

/**
 * Add filter only if function exists
 */
if (function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_id',
        function () {
            return array( '161' );
        }
    );
}