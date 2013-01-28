<?php

/* Functions file for Jessica Chan Studios custom theme V2 */

// Register the universal header menu
function jcs_register_universal_menu() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ) )
  );
}
add_action('init', 'jcs_register_universal_menu');

// Register a widget area to be used on the front page

function jcs_register_frontpage_widgetarea() {
    // Adding a sidebar to the front page
    register_sidebar( array(
		'name' => __( 'Front Page Sidebar', 'twentyten' ),
		'id' => 'front-page-sidebar',
		'description' => __( 'Goes on the side of the Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'jcs_register_frontpage_widgetarea' );

// Register a widget area to be used on the portfolio post sidebar

function jcs_register_portfoliopost_widgetarea() {
    // Adding a sidebar to the portfolio post
    register_sidebar( array(
		'name' => __( 'Portfolio PPost Sidebar', 'twentyten' ),
		'id' => 'portfolio-post-sidebar',
		'description' => __( 'Goes on the side of the Portfolio post', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'jcs_register_portfoliopost_widgetarea' );


// adding a post type for portfolio pieces

function jcs_register_portfolio_post_type() {

    $labels = array(
        'name' => _x('Portfolio Posts', 'post type general name'),
        'singular_name' => _x('Portfolio Post', 'post type singular name'),
        'add_new' => _x('Add New', 'Portfolio Post'), 'add_new_item' => __('Add New Portfolio Post'),
        'edit_item' => __('Edit Portfolio Post'),
        'new_item' => __('New Portfolio Post'),
        'view_item' => __('View Portfolio Post'),
        'search_items' => __('Search Portfolio Post'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
	'taxonomies' => array('portfolio_cats', 'portfolio_skills'),
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(
			    'title',
			    'editor',
			    'thumbnail',
			    'custom-fields'
			    )
    );

register_post_type( 'portfolio_post', $args );
}

add_action('init', 'jcs_register_portfolio_post_type');

/* Adds a taxonomy to categorize the portfolio pieces */

function jcs_register_portfolio_taxonomy() {
	
	$labels = array(
		'name' => _x('Portfolio Categories', 'portfolio category taxonomy'),
		'singular_name' => _x('Portfolio Category', 'portfolio category singular'),
		'menu_name' => __('Portfolio Categories')
	);
	
	$args = array (
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true
		);	
	register_taxonomy('portfolio_cats', 'portfolio_post', $args );
}

add_action('init', 'jcs_register_portfolio_taxonomy');

/* Adds tags to display skills for each portfolio piece */
function jcs_register_portfolio_skills() {
	
	$labels = array(
		'name' => _x('Portfolio Skills', 'portfolio skills taxonomy'),
		'singular_name' => _x('Portfolio Skill', 'portfolio skill singular'),
		'menu_name' => __('Portfolio Skills Tags')
	);
	
	$args = array (
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false
		);	
	register_taxonomy('portfolio_skills', 'portfolio_post', $args );
}

add_action('init', 'jcs_register_portfolio_skills');

/* Adds some filters to make Blog Excerpts longer and include a Continue Reading... link */

function custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
	global $post;
	return ' ... <a id="continue" href="'. get_permalink($post->ID) . '">Continue Reading</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Define some image sizes

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9

  add_theme_support( 'post-thumbnails' );

  add_image_size('featured-slideshow',760,408,true);

  add_image_size('featured-big',369,408,true);

  add_image_size('featured-medium',300,194,true);

  add_image_size('featured-small',60,58,true);

  add_image_size('featured-blog',760,291,true);
  
  set_post_thumbnail_size( 300, 194, true );

}


// Crops thumbnails for Featured Image from the top rather than the middle

function my_awesome_image_resize_dimensions( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop ){  
  
    // Change this to a conditional that decides whether you   
    // want to override the defaults for this image or not.  
    if( false )  
        return $payload;  
  
    if ( $crop ) {  
        // crop the largest possible portion of the original image that we can size to $dest_w x $dest_h  
        $aspect_ratio = $orig_w / $orig_h;  
        $new_w = min($dest_w, $orig_w);  
        $new_h = min($dest_h, $orig_h);  
  
        if ( !$new_w ) {  
            $new_w = intval($new_h * $aspect_ratio);  
        }  
  
        if ( !$new_h ) {  
            $new_h = intval($new_w / $aspect_ratio);  
        }  
  
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);  
  
        $crop_w = round($new_w / $size_ratio);  
        $crop_h = round($new_h / $size_ratio);  
  
        $s_x = 0; // [[ formerly ]] ==> floor( ($orig_w - $crop_w) / 2 );  
        $s_y = 0; // [[ formerly ]] ==> floor( ($orig_h - $crop_h) / 2 );  
    } else {  
        // don't crop, just resize using $dest_w x $dest_h as a maximum bounding box  
        $crop_w = $orig_w;  
        $crop_h = $orig_h;  
  
        $s_x = 0;  
        $s_y = 0;  
  
        list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );  
    }  
  
    // if the resulting image would be the same size or larger we don't want to resize it  
    if ( $new_w >= $orig_w && $new_h >= $orig_h )  
        return false;  
  
    // the return array matches the parameters to imagecopyresampled()  
    // int dst_x, int dst_y, int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h  
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );  
  
}  
add_filter( 'image_resize_dimensions', 'my_awesome_image_resize_dimensions', 10, 6 ); 

// Pre-load Google Fonts

function load_font_sortsmillgoudy() {
          wp_register_style('googleFontsSpecialElite', 'http://fonts.googleapis.com/css?family=Special+Elite');
          wp_register_style('googleFontsPTSans', 'http://fonts.googleapis.com/css?family=PT+Sans');
          wp_register_style('googleFontsOpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
          wp_enqueue_style( 'googleFontsSpecialElite');
          wp_enqueue_style( 'googleFontsOpenSans');
          wp_enqueue_style( 'googleFontsPTSans');
     }

add_action('wp_print_styles', 'load_font_sortsmillgoudy');

// Add Respond javascript

//   function script_enqueuer_respond() {
//     wp_register_script( 'respond', get_stylesheet_directory_uri().'/js/respond.min.js' );
//     wp_enqueue_script( 'respond' );
//     }

// add_action('wp_enqueue_scripts', 'script_enqueuer_respond');

?>