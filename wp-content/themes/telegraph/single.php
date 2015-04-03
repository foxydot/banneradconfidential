<?php
$template = get_post_meta($post->ID, 'wpzoom_post_template', true);
$posttype = get_post_meta($post->ID, 'wpzoom_post_type', true);
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>

<div class="wrapper">

<div id="frame">  

<div id="content"<?php 
if ($template == 'side-left') {echo' class="side-left"';}
if ($template == 'full') {echo' class="full-width full-width-post"';} 
?>>
  
	<div id="main">
	
		<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="box boxSingle">
			<div class="title blue">
				<?php echo '<h2>'; wpzoom_breadcrumbs(); echo'</h2>'; ?>
			</div><!-- end .title -->
			
			<h1><?php the_title(); ?></h1>
			<p class="postmetadata">
				<?php if (option::get('post_author') == 'on') { _e('By','wpzoom');?> <?php the_author_posts_link(); } 
				if (option::get('post_date') == 'on') { ?> <?php _e('on','wpzoom');?> <?php the_time("$dateformat $timeformat"); } 
				if (option::get('post_category') == 'on') { ?> <?php _e('in','wpzoom');?> <?php the_category(', '); } 
				if (option::get('post_comments') == 'on') { ?> / <a href="<?php the_permalink() ?>#commentspost" title="Jump to the comments"><?php comments_number(__('no comments', 'wpzoom'),__('1 comment', 'wpzoom'),__('% comments', 'wpzoom')); ?></a><?php } ?>
				<?php edit_post_link( __('EDIT', 'wpzoom'), ' / ', ''); ?></p>
			
			<div class="sep">&nbsp;</div>
			
			<div class="single<?php if (option::get('post_metabar') == 'off') { echo ' single-nometa'; } ?>">
			    
				<?php if (option::get('banner_post_top_enable') == 'on') { ?>
				<div class="banner">
						
					<?php if ( option::get('banner_post_top_html') <> "") { 
						echo stripslashes(option::get('banner_post_top_html'));             
					} else { ?>
						<a href="<?php echo option::get('banner_post_top_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_post_top_alt'); ?>"><img src="<?php echo option::get('banner_post_top'); ?>" alt="<?php echo option::get('banner_post_top_alt'); ?>" /></a>
					<?php } ?>		   	
								
				</div><!-- end .banner -->
		
				<div class="cleaner">&nbsp;</div>
				<?php } ?>
				    
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<div class="cleaner">&nbsp;</div>

				<?php if (option::get('banner_post_bottom_enable') == 'on') { ?>
				<div class="banner">
						
					<?php if ( option::get('banner_post_bottom_html') <> "") { 
						echo stripslashes(option::get('banner_post_bottom_html'));             
					} else { ?>
						<a href="<?php echo option::get('banner_post_bottom_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_post_bottom_alt'); ?>"><img src="<?php echo option::get('banner_post_bottom'); ?>" alt="<?php echo option::get('banner_post_bottom_alt'); ?>" /></a>
					<?php } ?>		   	
								
				</div><!-- end .banner -->
				
				<?php } ?>

			
			</div><!-- end .single -->
			
			<?php if (option::get('post_metabar') == 'on') { ?>

			<div class="metabox">

				<?php
				$image = ui::getImage('160', '120',$cropLocation); 
				
				if ($image) { ?>
					<div class="cover">
						<img src="<?php echo $image; ?>" width="160" height="120" alt="<?php the_title_attribute(); ?>" />
					</div>
				<?php } ?>

				<?php if (option::get('post_share') == 'on') { ?>
				<div class="title"><h2><?php _e('Share this Post','wpzoom');?></h2></div>

					<span class="share_btn"><a href="http://twitter.com/share" data-url="<?php the_permalink() ?>" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span>
					<span class="share_btn"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></span>
					<span class="share_btn"><g:plusone size="medium"></g:plusone></span>
					<div class="cleaner">&nbsp;</div>

				<?php } ?>

				<?php if (option::get('post_tags') == 'on') { ?>
				<?php the_tags( '<div class="title"><h2>' . __('Tags','wpzoom') . '</h2></div><!-- end .title --><p class="tags">', ', ', '</p>'); } ?>
				

				<?php if (option::get('post_related') == 'on') { 
					get_template_part('related-posts');
				} ?>

				<?php if (option::get('post_author') == 'on') { ?>
				<div class="title"><h2><?php _e('About the author','wpzoom');?></h2></div><!-- end .title -->
				<?php if (get_the_author_meta('user_url')) { ?><a href=""><?php echo get_avatar( get_the_author_id() , 60 ); ?></a><?php } else { ?><?php echo get_avatar( get_the_author_id() , 60 ); ?><?php } ?>
				<p class="author"><?php the_author_description(); ?></p>
				<?php } // if author information should be shown ?>

			</div><!-- end .metabox -->

			<?php } ?>

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
	          
	<?php if ($template != 'full') { ?>
	<div id="sidebar">
	         
		<?php get_sidebar(); ?>
	            
	</div><!-- end #sidebar -->
	<?php } //if template is not full width  ?>
	 
	<div class="cleaner">&nbsp;</div>
</div><!-- end #content -->

<?php get_footer(); ?>