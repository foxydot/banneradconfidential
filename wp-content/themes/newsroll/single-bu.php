<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    

	

<div class="container" style="padding:0;">
<div class="row">




	<div id="content" class="eightcol first">

        	<div <?php post_class('twinsbox'); ?>>
					
             	<div class="posthead body2">

                        
                        
						<?php $video_input = get_post_meta($post->ID, 'dbt_video', true);?>
                        <?php if($video_input) {?>
                                <?php echo ($video_input); ?><div style="clear: both;"></div>
                        <?php } else {?>

							<?php if ( has_post_thumbnail()) : ?>
                                 <?php the_post_thumbnail('medpost-thumb', array('class' => 'headimg', 'title'	=> trim(strip_tags( $attachment->post_title )),)); ?>
                            <?php endif; ?>
                        <?php }?>  

        				<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    	<p class="meta sserif">
                    	<?php _e('on','themnific');?> <?php the_time('M j, y') ?> &bull; 
						<?php _e('by','themnific');?> <?php the_author_posts_link(); ?> &bull; 
                        <?php _e('with','themnific');?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><br/>
                        </p>
                        
                        <?php echo pov_excerpt( get_the_excerpt(), '320'); ?>

                 </div>    
                 <div class="clear"></div>
                 
                 
						<?php get_template_part('/includes/mag-buttons');?>
                 
                    	<p class="meta"><?php the_breadcrumb(); ?></p>

                       
                   <div class="entry">
                   <?php the_content(); ?>
                      <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) ); ?>
                      <p class="tagssingle"><?php the_tags( '','',  ''); ?></p>
                      
                   
                 	<?php get_template_part('/includes/mag-postmore');?>
                   <?php comments_template(); ?>
                  </div>
            </div>



	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria','themnific');?>.</p>

	<?php endif; ?>

                <div style="clear: both;"></div>

        </div><!-- end #core .eightcol-->

    
    
    
        <div id="sidebar" class="fourcol last">
        
        		<?php get_sidebar(); ?>
        
        </div>
	</div><!--end #core .row-->

    
   <div style="clear: both;"></div>
</div><!--end #core-->


<?php get_footer(); ?>