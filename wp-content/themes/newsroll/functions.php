<?php


if ( ! isset( $content_width ) )
	$content_width = 613;
	
	
/*-----------------------------------------------------------------------------------*/
/* Start Themnific Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to Themnific Framework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/functions/';

// Framework
require_once ($functions_path . 'admin-init.php');			// Framework Init

// Theme specific functionality
require_once ($includes_path . 'theme-options.php'); 		// Options panel settings and custom settings
require_once ($includes_path . 'theme-actions.php');		// Theme actions & user defined hooks
require_once ($includes_path . 'theme-scripts.php'); 				// Load JavaScript via wp_enqueue_script


//Add Custom Post Types
require_once ($includes_path . 'posttypes/ptype-portfolio.php'); 	// portfolio post type
require_once ($includes_path . 'posttypes/post-metabox.php'); 		// custom meta box

/*-----------------------------------------------------------------------------------

- Loads all the .php files found in /admin/widgets/ directory

----------------------------------------------------------------------------------- */

	$preview_template = _preview_theme_template_filter();

	if(!empty($preview_template)){
		$widgets_dir = WP_CONTENT_DIR . "/themes/".$preview_template."/functions/widgets/";
	} else {
    	$widgets_dir = WP_CONTENT_DIR . "/themes/".get_option('template')."/functions/widgets/";
    }
    
    if (@is_dir($widgets_dir)) {
		$widgets_dh = opendir($widgets_dir);
		while (($widgets_file = readdir($widgets_dh)) !== false) {
  	
			if(strpos($widgets_file,'.php') && $widgets_file != "widget-blank.php") {
				include_once($widgets_dir . $widgets_file);
			
			}
		}
		closedir($widgets_dh);
	}
	

// Deregister Default Widgets 
function deregister_widgets(){
    unregister_widget('WP_Widget_Search');
	unregister_widget( 'WP_Widget_Pages' );
	//unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	//unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Categories' );
	//unregister_widget( 'WP_Widget_Recent_Posts' );         
}
add_action('widgets_init', 'deregister_widgets'); 

add_theme_support( 'post-formats', array( 'video','audio', 'gallery' ) );


// widgets
if ( function_exists('register_sidebar') ) 
{ 

// sidebar widget
register_sidebar(array('name' => 'Sidebar',
'before_widget' => '','after_widget' => '','before_title' => '<h4 class="homepage"><span class="inn">','after_title' => '</span></h4>')); 


//index widgets
register_sidebar(array('name' => 'Homepage',
'before_widget' => '','after_widget' => '','before_title' => '<h4 class="homepage"><span class="inn">','after_title' => '</span></h4>')); 



//footer widgets
register_sidebar(array('name' => 'Footer 1',
'before_widget' => '','after_widget' => '','before_title' => '<h4 class="homepage"><span class="inn">','after_title' => '</span></h4>')); 
  
  
register_sidebar(array('name' => 'Footer 2',
'before_widget' => '','after_widget' => '','before_title' => '<h4 class="homepage"><span class="inn">','after_title' => '</span></h4>'));


register_sidebar(array('name' => 'Footer 3',
'before_widget' => '','after_widget' => '','before_title' => '<h4 class="homepage"><span class="inn">','after_title' => '</span></h4>'));
 
 
register_sidebar(array('name' => 'Footer 4',
'before_widget' => '','after_widget' => '','before_title' => '<h4 class="homepage"><span class="inn">','after_title' => '</span></h4>'));  
}

// Make theme available for translation
	load_theme_textdomain( 'themnific', get_template_directory() . '/lang' );




// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

// Shordcodes
require_once (get_template_directory().'/functions/admin-shortcodes.php' );				// Shortcodes
require_once (get_template_directory().'/functions/admin-shortcode-generator.php' ); 	// Shortcode generator 

// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// navigation menu
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => "Primary Menu" ,
			'top-menu' => "Top Menu"
		)
	);
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );


// Add Theme Support Functions
add_theme_support( 'custom-background' );
add_editor_style();
add_theme_support( 'custom-header');

// Shorten post title
function short_title($after = '', $length) {
	$mytitle = explode(' ', get_the_title(), $length);
	if (count($mytitle)>=$length) {
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	} else {
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}


// managed excerpt

function wpe_excerptlength_teaser($length) {
    return 95;
    }
function wpe_excerptlength_index($length) {
    return 50;
    }
function wpe_excerptmore($more) {
    return '...';
    }

// new excerpt function

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
    add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
    add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
    }



// Old Shorten Excerpt text for use in theme
function pov_excerpt($text, $chars = 1620) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."...";
	return $text;
}

function trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

// Post thumbnail support
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(640, 265, true); // Normal post thumbnails
	add_image_size('flex-thumb', 700, 320, true);
	add_image_size('coin-big-thumb', 342, 230, true);
	add_image_size('coin-small-thumb', 77, 65, true);
	add_image_size('folio-thumb', 400, 200, true);
	add_image_size('medpost-thumb', 280, 250, true);
	add_image_size('single-thumb', 348, 350, true);
	add_image_size('related-thumb', 198, 85, true);
	add_image_size('tab-thumb', 55, 45, true);
	add_image_size('widget-big-thumb', 317, 130, true);
	add_image_size('widget-thumb', 80, 55, true);
	add_image_size('widget-slider-thumb', 142, 110, true);
}




function thumb_url(){
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2100,2100 ));
return $src[0];
}


// pagination

function pagination($prev = '«', $next = '»') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => $prev,
        'next_text' => $next,
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links( $pagination );
};


// add prettyPhoto rel to the images

add_filter('the_content', 'addshadowboxrel', 12);
add_filter('get_comment_text', 'addshadowboxrel');
function addshadowboxrel ($content)
{   global $post;
	$size = get_post_meta($post->ID, 'pov_size', true);
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 rel="lightbox[ set1 '. $size.']"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}


//First Image
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}


//Breadcrumbs
function the_breadcrumb() {
	if (!is_home()) {

		echo '<a href="'. home_url().'">';
		echo 'Home';
		echo "</a> &raquo; ";
		if (is_category() || is_single()) {
		the_category(', ');
		if (is_single()) {
		echo " &raquo; ";
	the_title();
	}
	} elseif (is_page()) {
	echo the_title();}
	}
}





	
?>