<?php get_header(); ?>

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    
	<?php if (have_posts()) : ?>
    
<div class="container" style="padding:0;">
<div class="row" style="overflow:visible;">


	<div id="content" class="eightcol first">
        
        

			<div class="postauthor">
        		<h2 class="leading"><span class="inn"><?php _e('Author archives: ','themnific');?> <?php echo $curauth->nickname; ?></span></h2>
                <?php echo get_avatar($curauth->user_email, 80 ); ?>
                <p><?php _e('Website: ','themnific');?><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
                <p><?php _e('Bio: ','themnific');?><?php echo $curauth->user_description; ?></p>
            </div>
            <div style="clear: both;"></div>



      		<ul class="archivepost">
          
    			<?php while (have_posts()) : the_post(); ?>
                                              		
            		<li <?php post_class('twinsbox'); ?>><?php get_template_part('/includes/post-types/archivepost');?></li>
                    
   				<?php endwhile; ?>   <!-- end post -->
                    
     		</ul><!-- end latest posts section-->
            
            <div style="clear: both;"></div>

					<div class="pagination"><?php pagination('«', '»'); ?></div>

					<?php else : ?>
			

                        <h1>Sorry, no posts matched your criteria.</h1>
                        <?php get_search_form(); ?><br/>
					<?php endif; ?>

        </div><!-- end #core .eightcol-->

    
    
        <div id="sidebar" class="fourcol">
        
        	<?php get_sidebar(); ?>
        
        </div>
        
	</div><!--end #core .row-->
    
   <div style="clear: both;"></div>
   
</div><!--end #core-->

<?php get_footer(); ?>