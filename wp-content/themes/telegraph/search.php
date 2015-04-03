<?php get_header(); ?>

<div class="wrapper">

	<div id="frame">  
	
		<div id="content">
		  
			<div id="main">
			          
				<?php get_template_part('loop'); ?>
			          
			</div><!-- end #main -->
			          
			<div id="sidebar">
			          
				<?php get_sidebar(); ?>
			            
			</div><!-- end #sidebar -->
			 
			<div class="cleaner">&nbsp;</div>
		</div><!-- end #content -->

<?php get_footer(); ?>