<?php get_header(); ?>

	<div class="wrapper">
	
	<div id="frame">  
	
	<div id="content">
  
		<div id="main">
          
  			<div class="box">

				<div class="title">
					<h2><?php _e('Error 404 - Nothing Found', 'wpzoom'); ?></h2>
				</div><!-- end .title -->
	            
	            <p class="medium"><?php _e('The page you are looking for could not be found.', 'wpzoom');?> </p>

				<div class="divider">&nbsp;</div>
		            <div class="title blue">
						<h2><?php _e('Browse Categories', 'wpzoom'); ?></h2>
		            </div><!-- end .title -->

					<ul class="medium">
						<?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>	
					</ul>
					
		            <div class="title blue">
						<h2><?php _e('Monthly Archives', 'wpzoom'); ?></h2>
		            </div><!-- end .title -->

					<ul class="medium">
						<?php wp_get_archives('type=monthly&show_post_count=1'); ?>	
					</ul>

		</div>
          
		</div><!-- end #main -->
          
		<div id="sidebar">
          
			<?php get_sidebar(); ?>
            
		</div><!-- end #sidebar -->
 
		<div class="cleaner">&nbsp;</div>
	</div><!-- end #content -->

<?php get_footer(); ?>