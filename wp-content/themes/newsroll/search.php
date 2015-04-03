<?php get_header(); ?>
<div class="container" style="padding:0;">

	<div class="row">

			<h4 class="homepage"><span class="inn"><?php _e('Search Results for','themnific');?> "<?php echo $s; ?>"</span></h4>

		<?php if (have_posts()) : ?>
	
        <div class="eightcol first">

      		<ul class="medpost">
          
    			<?php while (have_posts()) : the_post(); ?>
                                              		
            		<li <?php post_class('twinsbox'); ?>><?php get_template_part('/includes/post-types/medpost');?></li>
                    
   				<?php endwhile; ?>   <!-- end post -->
                    
     		</ul><!-- end latest posts section-->
            
            <div style="clear: both;"></div>

					<div class="pagination"><?php pagination('«', '»'); ?></div>

					<?php else : ?>
                    
        				<div class="eightcol first">

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