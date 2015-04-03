<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    

	

<div class="container" style="padding:0;">
<div class="row">




	<div id="content" class="eightcol first">

        	<div <?php post_class('twinsbox'); ?>>
					



<p class="meta"><?php the_breadcrumb(); ?></p>
                  <h2 class=""> <?php the_title(); ?></h2>

                    <p class="meta sserif">
                      <?php _e('on','themnific');?> <?php the_time('M j, y') ?> &bull; 
            <?php _e('by','themnific');?> <?php the_author_posts_link(); ?> &bull; 
                        <?php _e('with','themnific');?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><br/>
                        </p>



                 
						<?php get_template_part('/includes/mag-buttons');?>
                 
                    	

                       
                   <div class="entry">
                   <?php the_content(); ?>
                      <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) ); ?>
                      <p class="tagssingle"><?php the_tags( '','',  ''); ?></p>
                      
                   
                 	<?php get_template_part('/includes/mag-postmore');?>
                          <?php echo do_shortcode('[fbcomments]'); ?>

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