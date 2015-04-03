	<?php
    if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
        $icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
    } else {
        $icon = '';
    }
    ?>
    <?php echo $icon; ?>


					  <?php if ( has_post_thumbnail()) : ?>
                           <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                           <?php the_post_thumbnail('coin-small-thumb', array('title'	=> trim(strip_tags( $attachment->post_title )),)); ?>
                           </a>
                      <?php endif; ?> 

   						<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    
                        	<p class="meta sserif">
                        
                        <?php _e('on','themnific');?> <?php the_time('M j, y') ?> &bull; 
						<?php _e('in','themnific');?> <?php the_category(', ') ?> &bull; 
                        <?php _e('with','themnific');?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                        </p>
    