<?php
add_action('widgets_init', 'themnific_social_counter_load_widgets');

function themnific_social_counter_load_widgets()
{
	register_widget('themnific_Social_Counter_Widget');
}

class themnific_Social_Counter_Widget extends WP_Widget {
	
	function themnific_Social_Counter_Widget()
	{
		$widget_ops = array('classname' => 'themnific_social_counter', 'description' => 'Show number of RSS subscribes, twitter followers and facebook fans.');

		$control_ops = array('id_base' => 'themnific_social_counter-widget');

		$this->WP_Widget('themnific_social_counter-widget', 'Themnific - Social Counter', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);

		echo $before_widget;
			echo	'<div class="twinsbox">';
		if($title) {
			echo $before_title.$title.$after_title;
		}		
		?>
		<!-- BEGIN WIDGET -->
		<?php
		if(get_option('themnific_feedburner')) {
			$rss = get_option('themnific_feedburner');
		} else {
			$rss = get_bloginfo('rss2_url');
		}
		?>
		
		<div class="social-item">
			<a href='<?php echo $rss; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon_rss.png" alt="RSS"  /></a>
			
			<?php
			if(get_option('themnific_feedburner')) {
				$interval = 43200;
				
				
					$api = wp_remote_get('http://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=' . get_option('themnific_feedburner'));
					$xml = new SimpleXmlElement($api['body'], LIBXML_NOCDATA);
					$feedburner_followers = (string) $xml->feed->entry['circulation'];
					
					update_option('feedburner_followers', $feedburner_followers);
				
			}
			?>
			
			<?php if(get_option('feedburner_followers')): ?>
			<span class="social-count"><?php echo get_option('feedburner_followers'); ?></span>
			<span class="social-descrip"><?php _e('Readers','themnific'); ?></span>
			<?php endif; ?>
		</div>
		
		<?php if(get_option('themnific_twitter_id')): ?>
		<div class="social-item item">
			<a href='http://twitter.com/<?php echo get_option('themnific_twitter_id'); ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon_twitter.png" alt="Twitter" /></a>
			<?php
			$interval = 3600;
			
			if($_SERVER['REQUEST_TIME'] > get_option('themnific_twitter_cache_time')) {
				$api = wp_remote_get('http://twitter.com/statuses/user_timeline/' . get_option('themnific_twitter_id') . '.json');
				$json = json_decode($api['body']);
				
				update_option('themnific_twitter_cache_time', $_SERVER['REQUEST_TIME'] + $interval);
				update_option('themnific_twitter_followers', $json[0]->user->followers_count);
			}
			?>
			<span class="social-count"><?php echo get_option('themnific_twitter_followers'); ?></span>
			<span class="social-descrip"><?php _e('Followers','themnific'); ?></span>
		</div>
		<?php endif; ?>
		
		<?php if(get_option('themnific_facebook_id')): ?>
		<div class="social-item last" style=" width:27%;border:none;">
			<?php
			$interval = 3600;
			
			if($_SERVER['REQUEST_TIME'] > get_option('themnific_facebook_cache_time')) {
				$api = wp_remote_get('http://graph.facebook.com/' . get_option('themnific_facebook_id'));
				$json = json_decode($api['body']);
				
				update_option('themnific_facebook_cache_time', $_SERVER['REQUEST_TIME'] + $interval);
				update_option('themnific_facebook_followers', $json->likes);
				update_option('themnific_facebook_link', $json->link);
			}
			?>
			
			<a href='<?php echo get_option('themnific_facebook_link'); ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon_facebook.png" alt="Facebook"  /></a>
			
			<span class="social-count" style=" width:60%;"><?php echo get_option('themnific_facebook_followers'); ?></span>
			<span class="social-descrip" style=" width:60%;"><?php _e('Fans','themnific'); ?></span>
		</div>
		<?php endif; ?>
		<!-- END WIDGET -->
		<?php
		echo $after_widget.'</div>';
	}
	
	function update($new_instance, $old_instance)
	{
	}

	function form($instance)
	{
	}
}
?>