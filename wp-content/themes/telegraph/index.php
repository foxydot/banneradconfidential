<?php get_header(); ?>

	<div class="wrapper">
	
	<div id="frame">  
	
		<?php if ($paged < 2) { 

			if (option::get('featured_enable') == 'on' && is_home()) { get_template_part('featured-posts'); }

			if (option::get('promoted_category_display') == 'on' && is_home()) { get_template_part('promoted-category'); }

		} // if $paged < 2 ?>

		<div class="cleaner">&nbsp;</div>
		  
		<?php if (option::get('promoted_wide_category_display') == 'on' && is_home() && $paged < 2) { get_template_part('featured-quick-posts'); } ?>
		  
		<div class="cleaner">&nbsp;</div>
		
		<div id="content">
		  
			<div id="main">
			          
				<?php if ($paged < 2) {  
					
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage: Content Widgets') ) : ?> <?php endif; ?>
					
					<?php if (option::get('twitter_enable') == 'on') { get_template_part('twitter'); } ?>
				
				<?php } ?>

				<?php if (option::get('recent_part_enable') == 'on') { get_template_part('loop', 'index'); } ?>
			          
			</div><!-- end #main -->
			          
			<div id="sidebar">
			          
				<?php get_sidebar(); ?>
			            
			</div><!-- end #sidebar -->
			 
			<div class="cleaner">&nbsp;</div>
	
		</div><!-- end #content -->

<?php get_footer(); ?>