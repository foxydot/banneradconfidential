		<?php 
			$the_query = new WP_Query('&showposts=5&orderby=post_date&order=desc');	
			while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
		?>	
        <div class="tab-post">


				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'tab-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>

                    <h3><a href="<?php the_permalink(); ?>"><?php 
					// short_title($after, $length)
					echo short_title('...', 10); 
					?></a></h3>
		          	<p class="meta sserif"><?php the_time('M j, y') ?> &bull; <?php comments_popup_link(); ?></p>
		</div>
		<?php endwhile; ?>