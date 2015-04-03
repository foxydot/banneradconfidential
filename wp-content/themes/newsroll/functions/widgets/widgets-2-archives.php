<?php
/*---------------------------------------------------------------------------------*/
/* Archives widget */
/*---------------------------------------------------------------------------------*/
class Archives extends WP_Widget {

   function Archives() {
	   $widget_ops = array('description' => 'This is search widget.' );
       parent::WP_Widget(false, __('Themnific - Archives', ''),$widget_ops);      
   }

   function widget($args, $instance) {  
    extract( $args );
   	$title = $instance['title'];
	?>
		<?php echo $before_widget; ?>
    	<div class="twinsbox">
        <?php if ($title) { echo $before_title . $title . $after_title; } ?>
        <ul class="lists">
        	<?php wp_get_archives(); ?>
        </ul>
		</div>
		<?php echo $after_widget; ?>   
   <?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {   
   
   		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults);     
   
       $title = esc_attr($instance['title']);

       ?>
       <p>
	   	   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',''); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
       
      <?php
   }
} 

register_widget('Archives');
?>