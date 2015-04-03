
    <?php 
	$video_input = get_post_meta($post->ID, 'dbt_video', true);
		$fea_class = get_post_meta($post->ID, 'dbt_class', true);
	?>

	<span class="<?php echo $fea_class; ?>"></span>
        			<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    	<p class="meta sserif">
                        
                        <?php _e('on','themnific');?> <?php the_time('M j, y') ?> &bull; 
						<?php _e('in','themnific');?> <?php the_category(', ') ?> &bull; 
                        <?php _e('with','themnific');?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>                        </p>
                        
                        
						<?php $video_input = get_post_meta($post->ID, 'dbt_video', true);?>
                        <?php if($video_input) {?>
                                <?php echo ($video_input); ?>
                        <?php } else {?>

							<?php if ( has_post_thumbnail()) : ?>
                                 <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                                 <?php the_post_thumbnail('medpost-thumb', array('class' => 'headimg', 'title'	=> trim(strip_tags( $attachment->post_title )),)); ?>
                                 </a>
                            <?php endif; ?>
                            
                        <?php }?>  

    <?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?> 
    <a class="mainbutton fl" href="<?php the_permalink(); ?>"><?php _e('Read More','themnific');?> &#187;</a>
