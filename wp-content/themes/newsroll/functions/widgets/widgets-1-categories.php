<?php
/*---------------------------------------------------------------------------------*/
/* Categories widget */
/*---------------------------------------------------------------------------------*/
class Categories extends WP_Widget {

   function Categories() {
	   $widget_ops = array('description' => 'This is categories widget.' );
       parent::WP_Widget(false, __('Themnific - Categories', ''),$widget_ops);      
   }

   function widget($args, $instance) {  
    extract( $args );
   	$title = $instance['title'];
   	$depth = $instance['depth'];
	?>
		<?php echo $before_widget; ?>
    	<div class="twinsbox">
        <?php if ($title) { echo $before_title . $title . $after_title; } ?>
        <ul class="lists">
        	<?php wp_list_categories('sort_column=menu_order&depth='.$depth.'&title_li') ?>
        </ul>
		</div>
		<?php echo $after_widget; ?>   
   <?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) { 
   
   		$defaults = array('title' => '', 'depth' => '');
		$instance = wp_parse_args((array) $instance, $defaults);      
   
       $title = esc_attr($instance['title']);
       $depth = esc_attr($instance['depth']);

       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',''); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
       
       <p>
	   	   <label for="<?php echo $this->get_field_id('depth'); ?>"><?php _e('Levels of Categories:',''); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('depth'); ?>"  value="<?php echo $depth; ?>" class="widefat" id="<?php echo $this->get_field_id('depth'); ?>" />
       </p>
      <?php
   }
} 

register_widget('Categories');
?>