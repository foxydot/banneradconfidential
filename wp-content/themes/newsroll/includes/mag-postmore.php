		<div class="postauthor">
        	<h4 class="homepage"><span class="inn"><span><?php _e('About the Author','themnific');?>: <?php the_author_posts_link(); ?></span></h4>
			<?php  echo get_avatar( get_the_author_id(), '60' );   ?>
 			<?php the_author_meta('description'); ?>
		</div>

		
		
		
		
		<div id="relatedpop">
		
				
		<!-- start related posts -->		
        <h4 class="homepage"><span class="inn"><?php _e('Related Posts','themnific');?></span></h4>
			<ul class="related">	
				
			<?php
			$backup = $post;
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>3, // Number of related posts that will be shown.
					'caller_get_posts'=>1
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
					echo '';
					while ($my_query->have_posts()) {
						$my_query->the_post();
			?>
            
            <?php
			if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
				$icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
			} else { $icon = '';}?>
					<li>
			<?php echo $icon; ?>
				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'related-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>
						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<?php echo pov_excerpt( get_the_excerpt(), '130'); ?>

					</li>
			<?php
					}
					echo '';
				}
			}
			$post = $backup;
			wp_reset_query(); 
			?>
			</ul>
					
			<!-- end related posts -->
		
		</div>
	<div class="clear"></div>