<?php $posts = get_posts('orderby=rand&numberposts=5'); foreach($posts as $post) { ?>
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
		          	<small><?php the_time('M j, y') ?> &bull; <?php comments_popup_link(); ?></small>
		</div>	
<?php } ?>