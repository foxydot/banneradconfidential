
<?php 
	$featucat = get_option('themnific_slider1_category');
	$my_query = new WP_Query('showposts=5&category_name='. $featucat .'');	 
	if ($my_query->have_posts()) :
?>
  
   	<div class="flexslider">
	<ul class="slides">
		<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	  
	    	<li>
                    <?php $video_input = get_post_meta($post->ID, 'dbt_video', true);?>
					<?php if($video_input) {?>
                    		<?php echo ($video_input); ?>
                    <?php } else {?>
                
                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'flex-thumb' ); } ?>
                    </a>
                    	<div class="stuff body2">
	    					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    		<p class="meta sserif">
							<span>By</span> <?php the_author_posts_link(); ?> &bull; <span>In</span> <?php the_category(', ') ?></p>
						
                        </div>
                        
                    <?php }?>  


          	</li>
 		<?php endwhile; ?>
	</ul>
	</div>

<?php endif; ?>