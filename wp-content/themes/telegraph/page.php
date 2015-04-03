<?php get_header(); ?>

<div class="wrapper">

<div id="frame">  

<div id="content" class="page">
  
	<div id="main">
	
		<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="box boxSingle">

			<div class="title blue">
				<?php echo '<h2>'; wpzoom_breadcrumbs(); echo'</h2>'; ?>
			</div><!-- end .title -->
			
			<h1><?php the_title(); ?></h1>
			<p class="postmetadata"><?php edit_post_link( __('EDIT', 'wpzoom'), ' ', ''); ?></p>
			
			<div class="sep">&nbsp;</div>
			
			<div class="single singleFull">
			    
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<div class="cleaner">&nbsp;</div>
			</div><!-- end .single -->
			
			<div class="cleaner">&nbsp;</div>
			
			<?php if (option::get('post_comments') == 'on') { ?>
			<?php comments_template(); ?>  
			<?php } ?>
			
			<div class="cleaner">&nbsp;</div>

		</div><!-- end .box -->

		<?php endwhile; else: ?>

			<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>

		<?php endif; ?>
		
		<div class="cleaner">&nbsp;</div>          
	          
	</div><!-- end #main -->
	          
	<div id="sidebar">
	          
		<?php get_sidebar(); ?>
	            
	</div><!-- end #sidebar -->
	 
	<div class="cleaner">&nbsp;</div>

</div><!-- end #content -->

<?php get_footer(); ?>