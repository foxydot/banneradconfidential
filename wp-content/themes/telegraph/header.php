<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php ui::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
    
	<?php 
	if ($paged < 2 && option::get('featured_enable') == 'on' && is_home()) {
    	ui::js("jcarousel"); 
	}
	// ui::js("loopedslider.min");
	?>

	<!--[if IE 7.0]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style_ie7.css" />
	<![endif]-->

</head>
<body <?php body_class() ?>>

<div id="container">
	<div id="header">
	
		<div class="wrapper">
			<div id="logo">
				<a href="<?php echo home_url('/'); ?>"><img src="<?php echo ui::logo(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
			</div><!-- end #logo -->

			<?php if (option::get('banner_header_enable') == 'on') { ?>
			<div class="bannerHead">
					
				<?php if ( option::get('banner_header_html') <> "") { 
					echo stripslashes(option::get('banner_header_html'));             
				} else { ?>
					<a href="<?php echo option::get('banner_header_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_header_alt'); ?>"><img src="<?php echo option::get('banner_header'); ?>" alt="<?php echo option::get('banner_header_alt'); ?>" /></a>
				<?php } ?>		   	
							
			</div><!-- end #bannerHead -->
			<?php } ?>

			<div class="cleaner">&nbsp;</div>
		</div><!-- end .wrapper -->
	
	</div><!-- end #header -->
	  
	<div class="wrapper">
	
		<?php if (option::get('menu_top_show') == 'on') { ?>
		<div id="navigation">
			<img src="<?php bloginfo('template_url'); ?>/images/men_crn_left.png" width="3" height="34" alt="" class="alignleft" />
			<img src="<?php bloginfo('template_url'); ?>/images/men_crn_right.png" width="3" height="34" alt="" class="alignright" />
			      
			<div id="menu" class="dropdown">
				<?php if (has_nav_menu( 'primary' )) {

				$homeLink = '<a href="' . get_option('home') . '"rel="nofollow"><img src="' . get_bloginfo('template_url') .'/images/men_icon_home.png" width="37" height="34" alt="" /></a>';
				
				$menu = wp_nav_menu(array(
					'container' => '', 
					'container_class' => '', 
					'menu_class' => 'home', 
					'menu_id' => 'nav', 
					'echo' => false, 
					'sort_column' =>'menu_order', 
					'theme_location' =>'primary', 
					'items_wrap'=>'<ul id="%s"><li class="%s">'.$homeLink.'</li>%s<li class="cleaner">&nbsp;</li></ul>'
				));
				
				print $menu;
				} // if menu is set
				?>
			</div><!-- end #menu -->
		
		</div><!-- end #navigation -->
		<?php } ?>
		<?php if (option::get('menu_top_secondary_show') == 'on') { ?>
		<div id="navigation2">
			
			<?php if (option::get('social_icons_show') == 'on') { ?>
			<div id="menuSocial">
				<ul>
					<?php if (option::get('social_icons_twitter')) { ?><li><a href="<?php echo option::get('social_icons_twitter'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_twitter.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_facebook')) { ?><li><a href="<?php echo option::get('social_icons_facebook'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_facebook.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_linkedin')) { ?><li><a href="<?php echo option::get('social_icons_linkedin'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_linkedin.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_flickr')) { ?><li><a href="<?php echo option::get('social_icons_flickr'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_flickr.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_picasa')) { ?><li><a href="<?php echo option::get('social_icons_picasa'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_picasa.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_skype')) { ?><li><a href="skype:<?php echo option::get('social_icons_skype'); ?>?chat" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_skype.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_vimeo')) { ?><li><a href="<?php echo option::get('social_icons_vimeo'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_vimeo.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<?php if (option::get('social_icons_youtube')) { ?><li><a href="<?php echo option::get('social_icons_youtube'); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_youtube.png" width="16" height="16" alt="" /></a></li><?php } ?>
					<li><a href="<?php ui::rss(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icons/soc_rss.png" width="16" height="16" alt="" /></a></li>
				</ul>
			</div><!-- end #menuSocial -->
			<?php } ?>      
			<?php if (has_nav_menu( 'secondary' )) {
				wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'menu', 'menu_id' => 'nav2', 'sort_column' => 'menu_order', 'depth' => '1', 'theme_location' => 'secondary' ) );
			} ?>
		
		</div><!-- end #navigation -->
		<?php } ?>
	</div><!-- end .wrapper -->