	<div class="row">

              <div class="threecol first"> 
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 1") ) : ?>
               <?php endif; ?>
               </div>
              
              
              <div class="threecol">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 2") ) : ?>
              <?php endif; ?>
              </div>
              
              <div class="threecol"> 
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 3") ) : ?>
               <?php endif; ?>
               </div>
              
              
              <div class="threecol">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 4") ) : ?>
              
                <div class="aboutus">
              
              		<?php if(get_option('themnific_about_img')) { ?>
                    
                    	<a href="<?php echo home_url(); ?>/"><img src="<?php echo get_option('themnific_about_img');?>" alt="<?php bloginfo('name'); ?>"/></a><?php } 
					
                    else {} ?>
              
			  		<p><?php echo stripslashes(get_option('themnific_aboutus_text'));?></p>
             	</div>
              
              <?php endif; ?>
              </div>
		</div>