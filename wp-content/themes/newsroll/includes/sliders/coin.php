
<div id="coinslid" class="slpost_small body2">
<?php 

	$featucat = get_option('themnific_slider1_category');
	$my_query = new WP_Query('showposts=6&category_name='. $featucat .'');	 
	if ($my_query->have_posts()) :
?>
	<!-- Start Slider Image -->
	<div class="tabbig_small">
	<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
	
		<div id="feature-<?php the_ID(); ?>">
        	
            <div class="slidecat"><?php the_category(', ') ?></div>
        
        	<?php if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
					$icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
				} else {
					$icon = '';
			}?>
    		<?php echo $icon; ?>
                <?php $video_input = get_post_meta($post->ID, 'dbt_video', true);?>
				<?php if($video_input) {?>
                    	<?php echo ($video_input); ?>
                <?php } else {?>
                    
                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'folio-image'); ?>
                <a href="<?php the_permalink() ?>"><?php echo $icon; ?>
                 <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'coin-big-thumb' ); } ?>
                </a>
				<div class="inpost">
                			<p class="inmeta"><span>by</span> <?php the_author_posts_link(); ?> &bull; <?php comments_popup_link(); ?></p>
                            <h2><a href="<?php the_permalink() ?>">
                            <?php echo short_title('...', 14); ?>
                            </a></h2>
                            <p class="excerpt"><?php echo pov_excerpt( get_the_excerpt(), '245'); ?></p>
                            <p class="fl"><a class="slidelink" href="<?php the_permalink(); ?>"><?php _e('Read More','themnific');?> &#187;</a></p>
                </div>
                <?php }?>
		</div>
		
		
		<?php endwhile; ?>
	
	
	
	</div>
	<?php endif; ?>
	<!-- End Slider Image -->



	<!-- Start Slider Small -->
	<?php if ($my_query->have_posts()) :?>

		<ul id="tabsmallss">
		<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
    		<li>
            <a class="sidnav" title="<?php echo short_title('...', 9); ?>" href="#feature-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'coin-small-thumb' ); } ?>
            <span class="sserif"><?php the_time('F j, Y'); ?></span><br/>
			<?php echo short_title('...', 8); ?>
			</a>
            </li>
		<?php endwhile; ?>
		</ul>
	
	<?php endif; ?>
	<!-- End Slider Small -->


</div>
<div style="clear: both;"></div>
<!-- end slider -->