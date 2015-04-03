<?php if (get_option('themnific_dis_foowidgets') <> "true") { ?>
	<div id="footer" class="body2">
    <div class="container">    
    
            <?php get_template_part('/includes/uni-bottombox');?>
	
	</div><!-- end #footer container -->
    
	</div><!-- /#footer  -->
<?php } ?>

<div id="copyright" class="container">
        <div class="row">
          	<div class="fl">

                
            <?php if(get_option('themnific_footer_left') == 'true'){
            
                echo stripslashes(get_option('themnific_footer_left_text'));
            
            } else { ?>
				<p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>&trade;</p>
            <?php } ?>
               
			</div>
        
        
        	<div class="fr">
            <?php if(get_option('themnific_footer_right') == 'true'){
            
                echo stripslashes(get_option('themnific_footer_right_text'));
            
            } else { ?>
				<p><?php _e('Powered by','themnific');?> <a href="http://www.wordpress.org">Wordpress</a>. <?php _e('Designed by','themnific');?> <a href="http://themnific.com">Themnific</a></p>
            <?php } ?>
			</div>
    	</div>
</div>









<div class="scrollTo_top" style="display: block">
<a title="Scroll to top" href="#">
<img src="<?php echo get_template_directory_uri(); ?>/images/icons/up.png" alt="Scroll to top"/>
</a>
</div>
<?php wp_footer(); ?>
<?php themnific_foot(); ?>
</body>
</html>