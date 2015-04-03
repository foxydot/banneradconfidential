<?php
if ( ! is_admin() ) { add_action( 'wp_print_scripts', 'themnific_add_javascript' ); }

if ( ! function_exists( 'themnific_add_javascript' ) ) {
	function themnific_add_javascript() {

		// Load Common scripts	
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'superfish', get_template_directory_uri().'/js/superfish.js');
		wp_enqueue_script( 'jquery.hoverIntent.minified', get_template_directory_uri().'/js/jquery.hoverIntent.minified.js');
		wp_enqueue_script( 'css3-mediaqueries', get_template_directory_uri().'/js/css3-mediaqueries.js');
		wp_enqueue_script('tabs', get_stylesheet_directory_uri() .'/js/tabs.js');
		wp_enqueue_script('ownScript', get_stylesheet_directory_uri() .'/js/ownScript.js','','', true);

		// Load Slider scripts		
		$type_slider_mag = get_option('themnific_type_slider_mag');
		if (get_option('themnific_slider_dis') <> "true") { 
			if ( is_page_template('template-blog.php') || is_home()) { 
				if($type_slider_mag == 'flexslider'){
						wp_enqueue_script('jquery.flexslider-min', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js');
						wp_enqueue_script('slider.start2', get_stylesheet_directory_uri() .'/js/slider.start2.js');
				}elseif($type_slider_mag == 'coin'){
					wp_enqueue_script('jquery-ui-personalized-1.5.2.packed', get_stylesheet_directory_uri() .'/js/jquery-ui-personalized-1.5.2.packed.js');
					wp_enqueue_script('coin-slider.min', get_stylesheet_directory_uri() .'/js/coin-slider.min.js');
					wp_enqueue_script('sprinkle', get_stylesheet_directory_uri() .'/js/sprinkle.js');
				}elseif($type_slider_mag == ''){
				}
			} 
		}
		
		// Load Mediabox scripts
		if (is_page_template('template-portfolio4.php') || 
			is_single() || is_archive()){
				wp_enqueue_script('mootools.core', get_stylesheet_directory_uri() .'/js/mediabox/mootools-1.2.4-core.js');
				wp_enqueue_script('mediabox.advanced', get_stylesheet_directory_uri() .'/js/mediabox/mediabox-1.2.4.js');
		}
		
		// Load Elastislider scripts
		if (is_page_template('template-altindex.php') || is_home() || is_archive()){
				wp_enqueue_script('jquery.easing.1.3', get_stylesheet_directory_uri() .'/js/jquery.easing.1.3.js','','', true);
				wp_enqueue_script('jquery.elastislide', get_stylesheet_directory_uri() .'/js/jquery.elastislide.js','','', true);
				wp_enqueue_script('jquery.elastislide.start', get_stylesheet_directory_uri() .'/js/jquery.elastislide.start.js','','', true);
				wp_enqueue_script('jquery.elastislide.start2', get_stylesheet_directory_uri() .'/js/jquery.elastislide.start2.js','','', true);
		}
		
		
		
		// Index Alt scripts
		if (is_page_template('template-altindex.php' )){
						wp_enqueue_script('jquery.flexslider-min', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js');
						wp_enqueue_script('slider.start2', get_stylesheet_directory_uri() .'/js/slider.start2.js');
		}		
		
		
		
		
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}
}
?>