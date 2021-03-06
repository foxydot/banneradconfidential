<?php 

/*-----------------------------------------------------------------------------------*/
/* Custom functions */
/*-----------------------------------------------------------------------------------*/


	global $themnific_options;
	$output = '';

// Add custom styling
add_action('themnific_head','themnific_custom_styling');
function themnific_custom_styling() {
	
	// Get options
	$home = home_url();
	$home_theme  = get_template_directory_uri();
	
	$sec_body_color = get_option('themnific_custom_color');
	$thi_body_color = get_option('themnific_thi_body_color');
	$for_body_color = get_option('themnific_for_body_color');
	$body_color = get_option('themnific_body_color');
	$text_color = get_option('themnific_text_color');
	$text_color_alter = get_option('themnific_text_color_alter');
	$body_color_sec = get_option('themnific_body_color_sec');
	$sec_text_color = get_option('themnific_sec_text_color');
	$thi_text_color = get_option('themnific_thi_text_color');
	$link = get_option('themnific_link_color');
	$link_alter = get_option('themnific_link_color_alter');
	$hover = get_option('themnific_link_hover_color');
	$sec_link = get_option('themnific_sec_link_color');
	$sec_hover = get_option('themnific_sec_link_hover_color');
	$thi_hover = get_option('themnific_thi_link_hover_color');
	$body_bg = get_option('themnific_body_bg');
	$body_bg_sec = get_option('themnific_body_bg_sec');
	$shadows = get_option('themnific_shadows_color');
	$shadows_sec = get_option('themnific_shadows_color_sec');
	$shadows_thi = get_option('themnific_shadows_color_thi');
	$border = get_option('themnific_border_color');
	$border_sec = get_option('themnific_border_color_sec');
	    $custom_css = get_option('themnific_custom_css');
		
	// Add CSS to output
		if ($custom_css)
		$output .= $custom_css ;
	
	if ($body_color)
		$output = 'body,.searchformhead input.s,#navigation,#navigation .nav li ul,ul#serinfo,
		#serinfo-nav li.current,h4.homepage span{background-color:'.$body_color.' !important}' . "\n";
	if ($sec_body_color)
		$output .= '
		.body2,.boorder,.nav>li>a:hover,#homes,.message a,.secmenu li ul
		{background-color:'.$sec_body_color.'}' . "\n";
	if ($thi_body_color)
		$output .= '
		.body3
		{background-color:'.$thi_body_color.'}' . "\n";
	if ($for_body_color)
		$output .= '
		#sliderwarp span#bg,
		#sldback,
		.inpost3
		{background-color:'.$for_body_color.'}' . "\n";
	if ($text_color)
		$output .= 'body,.body1 {color:'.$text_color.'}' . "\n";	
	if ($sec_text_color)
		$output .= '
		.body2
		{color:'.$sec_text_color.'}' . "\n";
	if ($text_color_alter)
		$output .= '.body3,.twins p.meta,.twins-small p.meta {color:'.$text_color_alter.' !important}' . "\n";
	if ($link)
		$output .= '.body1 a, a:link, a:visited,#serinfo h4 a,#navigation .nav li ul li a,#navigation .nav li a {color:'.$link.'}' . "\n";
	if ($link_alter)
		$output .= '.body3 a,h4.homepage a {color:'.$link_alter.'}' . "\n";
		
		$output .= '#tabsmallss li img,#topnav {border-color:'.$link_alter.' !important}' . "\n";
		$output .= '.slidecat,a.slidelink {background:'.$link_alter.' !important}' . "\n";
		
	if ($hover)
		$output .= 'a:hover,.body1 a:hover,#serinfo a:hover,
		.nav li.current_page_item a,
		.nav li.current_page_parent a,
		.nav li.current-menu-ancestor a,
		.nav li.current-cat a,
		.nav li.li.current-menu-item a,
		.nav li.sfHover a,
		.page-numbers.current,
		#portfolio-filter a.current,li.current-cat a {color:'.$hover.'}' . "\n";
	if ($sec_link)
		$output .= '
		.body2 a,a.body2,.nav>li>a:hover {color:'.$sec_link.' !important}' . "\n";
	if ($sec_hover)
		$output .= '
		.body2 a:hover,p.body2 a:hover,#navigation ul.nav>li>a:hover
		{color:'.$sec_hover.'!important}' . "\n";
	if ($thi_hover)
		$output .= '
		.body3 a:hover
		{color:'.$thi_hover.'}' . "\n";
		
		
		

	if ($body_bg)
		$output .= '
		body,.body1
		{background-image:url('.$home_theme.'/images/bg/'.$body_bg.')}' . "\n";
		
		
	if ($border)
		$output .= '#tagline,.bags,#sidebar h2,ul#serinfo-nav li,#serinfo,.nav a,#navigation,#navigation .nav li ul,#sidebar .fblock,.searchform input.s,.searchformhead input.s,.twinsbox,.fullbox,.social-item ,.pagination,input, textarea,input checkbox,input radio,select, file{border-color:'.$border.' !important}' . "\n";	

	if ($border_sec)
		$output .= '.slider img,ul.slides li iframe,.twins img,.item-big img,.flickr_badge_image,.es-carousel ul li img,.tabbig_small img,.slpost_small,.item_full img,.tabbig_small iframe,.ei-title h2 {border-color:'.$border_sec.' !important}' . "\n";

	if ($shadows)
		$output .= 'body,.body1,.ei-title h2 {text-shadow:0 1px 1px '.$shadows.'}' . "\n";
		
	if ($shadows_sec)
		$output .= '.body2 {text-shadow:0 1px 1px '.$shadows_sec.'}' . "\n";
		
	if ($shadows_thi)
		$output .= '.body3 {text-shadow:0 1px 1px '.$shadows_thi.'}' . "\n";




		// General Typography		
		$font_text = get_option('themnific_font_text');	
		$font_text_sec = get_option('themnific_font_text_sec');	
		
		$font_nav = get_option('themnific_font_nav');
		$font_h1 = get_option('themnific_font_h1');	
		$font_h2 = get_option('themnific_font_h2');	
		$font_h3 = get_option('themnific_font_h3');	
		$font_h4 = get_option('themnific_font_h4');	
		$font_h5 = get_option('themnific_font_h5');	
		$font_h6 = get_option('themnific_font_h5');	
		
		
		$font_h2_tagline = get_option('themnific_font_h2_tagline');	
	
	
		if ( $font_text )
			$output .= 'body,textarea,input checkbox,input radio,select, file {font:'.$font_text["style"].' '.$font_text["size"].'px/1.9em '.stripslashes($font_text["face"]).';color:'.$font_text["color"].'}' . "\n";
			$output .= '.ei-title h2,#serinfo-nav li.current a {color:'.$font_text["color"].'}' . "\n";
			
		if ( $font_text_sec )
			$output .= '.body2, .body2#toggleArchives {font:'.$font_text_sec["style"].' '.$font_text_sec["size"].'px/1.9em '.stripslashes($font_text_sec["face"]).';color:'.$font_text_sec["color"].'}' . "\n";
			$output .= '.body2 h2,.body2 h3,.body2 h4 {color:'.$font_text_sec["color"].'}' . "\n";
			
			$output .= ' {font:'.$font_nav["style"].' '.$font_nav["size"].'px/1.5em '.stripslashes($font_nav["face"]).';color:'.$font_nav["color"].'}' . "\n";

		if ( $font_h1 )
			$output .= 'h1 {font:'.$font_h1["style"].' '.$font_h1["size"].'px/1.5em '.stripslashes($font_h1["face"]).';color:'.$font_h1["color"].'}';	
		if ( $font_h2 )
			$output .= 'h2 {font:'.$font_h2["style"].' '.$font_h2["size"].'px/1.3em '.stripslashes($font_h2["face"]).';color:'.$font_h2["color"].'}';	
		if ( $font_h3 )
			$output .= 'h3,#toggleArchives {font:'.$font_h3["style"].' '.$font_h3["size"].'px/1.5em '.stripslashes($font_h3["face"]).';color:'.$font_h3["color"].'}';	
		if ( $font_h4 )
			$output .= 'h4 {font:'.$font_h4["style"].' '.$font_h4["size"].'px/1.5em '.stripslashes($font_h4["face"]).';color:'.$font_h4["color"].'}';	
		if ( $font_h5 )
			$output .= 'h5 {font:'.$font_h5["style"].' '.$font_h5["size"].'px/1.5em '.stripslashes($font_h5["face"]).';color:'.$font_h5["color"].'}';	
		if ( $font_h6 )
			$output .= 'h6 {font:'.$font_h6["style"].' '.$font_h6["size"].'px/1.5em '.stripslashes($font_h6["face"]).';color:'.$font_h6["color"].'}' . "\n";
			
			
		if ( $font_h2_tagline )
			$output .= 'h1.tagline {font:'.$font_h2_tagline["style"].' '.$font_h2_tagline["size"].'px/1.5em '.stripslashes($font_h2_tagline["face"]).';color:'.$font_h2_tagline["color"].'}';	
		
		
		
	// custom stuff	
		if ( $font_text )
			$output .= '.tab-post small a,.taggs a,.ei-slider-thumbs li a {color:'.$font_text["color"].'}' . "\n";	
	
	// Output styles
		if ($output <> '') {
			$output = "<!-- Themnific Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
	}
		
} 

// Add alternative styling
add_action('themnific_head','themnific_alt_stylesheet');
	// Add stylesheet for shortcodes to HEAD
	function themnific_alt_stylesheet() {
		$alt_style = get_option('themnific_alt_stylesheet');
				if($alt_style == 'light')  {
					echo '<link href="'. get_template_directory_uri() . '/styles/light.css" rel="stylesheet" type="text/css" />'."\n\n";
				}elseif($alt_style == 'dark'){
					echo '<link href="'. get_template_directory_uri() . '/styles/dark.css" rel="stylesheet" type="text/css" />'."\n\n";				}elseif($alt_style == ''){
				}
	}

// Add custom styling
add_action('themnific_head','themnific_mobile_styling');
	// Add stylesheet for shortcodes to HEAD
	function themnific_mobile_styling() {
		echo "<!-- Themnific Mobile CSS -->\n";
		echo '<link href="'. get_template_directory_uri() . '/styles/mobile.css" rel="stylesheet" type="text/css" />'."\n\n";

} 
?>