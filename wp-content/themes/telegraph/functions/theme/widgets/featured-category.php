<?php

/*------------------------------------------*/
/* WPZOOM: Featured Category		*/
/*------------------------------------------*/

class wpzoom_widget_feat_category extends WP_Widget {

	/* Widget setup. */
	function wpzoom_widget_feat_category() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'wpzoom', 'description' => __('Custom WPZOOM widget. Displays posts from a category in 2 columns. Insert only into Homepage: Content Widgets sidebar.', 'wpzoom') );
		
		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'wpzoom-widget-feat-category' );
		
		/* Create the widget. */
		$this->WP_Widget( 'wpzoom-widget-feat-category', __('WPZOOM: Featured Category', 'wpzoom'), $widget_ops, $control_ops );
	}
	
	/* How to display the widget on the screen. */
	function widget( $args, $instance ) {
	
		extract( $args );
		
		/* Our variables from the widget settings. */

		$category1 = get_category($instance['category1']);
		if ($category1) {
			$categoryLink1 = get_category_link($category1);
		}
	
		$title = apply_filters('widget_title', $instance['title'] );
		$showCategory = $instance['category_title'];
		$showDate = $instance['datetime'];
	
		$category = get_category($instance['category1']);
		if ($category) {
			$category_link = get_category_link($category);
		}

		?>

		<div class="box featCategory">
		
			<div class="title <?php echo $instance['color']; ?>">
				<h2><a href="<?php echo"$category_link";?>"><?php echo"$category->name";?></a><span class="morePosts"><a href="<?php echo"$category_link";?>"><?php _e('More in','wpzoom');?> <?php echo"$category->name";?></a></span></h2>
			</div><!-- end .title -->
			
			<?php 
			$i = 0;
			
			$loop = new WP_Query( array( 'posts_per_page' => $instance['posts'], 'orderby' => 'date', 'order' => 'DESC', 'cat' => $category->cat_ID ) );
			?>

			<?php if ( $loop->have_posts() ) : ?>

	            <ul class="posts">

				<?php    
				$x = 0;
				while ( $loop->have_posts() ) : $loop->the_post(); global $post;

				$x++;
				if ($x == 1)
				{ 

					unset($image, $prev, $videocode);		
			
					$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
					$image = ui::getImage('100', '80',$cropLocation);

				?>

					<li class="main" id="post-<?php the_ID(); ?>">
					
						<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<?php if ($image) { ?>
						<div class="cover">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" width="100" height="80" alt="<?php the_title_attribute(); ?>" /></a>
							<?php if ($showDate == 'on') { ?><p class="datetime"><?php the_time("M j, Y G:i"); ?></p><?php } if ($posttype != 'Default (no icon)' && $posttype) { echo'<span class="'.strtolower($posttype).'">&nbsp;</span>'; } ?>
						</div>
						<?php } ?>
						
						<p><?php the_content_limit(140);?></p>
	
						<div class="cleaner">&nbsp;</div>
	
					</li><!-- end .main, #post-<?php the_ID(); ?> -->
				</ul>
				<ul class="posts postsList">
				<?php } // if $x == 1
				else { ?>
				<li id="post-<?php the_ID(); ?>">
					<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php if ($showDate == 'on') { ?><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time("j F Y"); ?></time><?php } ?></h3>
				</li><!-- end #post-<?php the_ID(); ?> --><?php } // else ?>
				<?php endwhile; //  ?>
			
				</ul>
				<?php else : ?>
				
				<ul class="posts"><li><h3><?php _e('There are no posts in this category', 'wpzoom'); ?></h3></li></ul>
				  
				<?php endif; ?>
              
				<div class="cleaner">&nbsp;</div>
			
			</div><!-- end .box -->
			
			<div class="cleaner">&nbsp;</div>

		<?php 
		}
	
		/* Update the widget settings.*/
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
	
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['category1'] = $new_instance['category1'];
			
			$instance['posts'] = $new_instance['posts'];
			$instance['color'] = $new_instance['color'];
			$instance['datetime'] = $new_instance['datetime'];
	 
			return $instance;
		}
	
		/** Displays the widget settings controls on the widget panel.
		 * Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff. */
		function form( $instance ) {
	
			/* Set up some default widget settings. */
			$defaults = array('title' => 'Widget Title','category1' => '0','posts'=>'5', 'color'=>'blue', 'datetime' => 'on');
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			$colors = array('Blue','Blue2','Blue3','Dark','Green','Grey','Grey2','Pink','Purple','Red');
			
	    ?>
	
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label><br />
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
			</p>

			<p>
				<?php _e('Category:', 'wpzoom'); ?>
				<select id="<?php echo $this->get_field_id('category1'); ?>" name="<?php echo $this->get_field_name('category1'); ?>" style="width:90%;">
					<option value="0">Choose category:</option>
					<?php
					$cats = get_categories('hide_empty=0');
					
					foreach ($cats as $cat) {
					$option = '<option value="'.$cat->term_id;
					if ($cat->term_id == $instance['category1']) { $option .='" selected="selected';}
					$option .= '">';
					$option .= $cat->cat_name;
					$option .= ' ('.$cat->category_count.')';
					$option .= '</option>';
					echo $option;
					}
				?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Posts to display:', 'wpzoom'); ?></label>
				<select id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" style="width:90%;">
				<?php
					$m = 0;
					while ($m < 11) {
						$m++;
						$option = '<option value="'.$m;
						if ($m == $instance['posts']) { $option .='" selected="selected';}
						$option .= '">';
						$option .= $m;
						$option .= '</option>';
						echo $option;
					}
				?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color for the title background:', 'wpzoom'); ?></label>
				<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" style="width:90%;">
				<?php
					foreach ($colors as $color) {
						$color = strtolower($color);
						$option = '<option value="'.$color;
						if ($color == $instance['color']) { $option .='" selected="selected';}
						$option .= '">' . $color;
						$option .= '</option>';
						echo $option;
					}
				?>
				</select>
			</p>

		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('datetime'); ?>" name="<?php echo $this->get_field_name('datetime'); ?>" <?php if ($instance['datetime'] == 'on') { echo ' checked="checked"';  } ?> /> 
			<label for="<?php echo $this->get_field_id('datetime'); ?>"><?php _e('Display date', 'wpzoom'); ?></label>
			<br/>
		</p>
		
		<?php
		}
}

function wpzoom_register_fc_widget() {
	register_widget('wpzoom_widget_feat_category');
}
add_action('widgets_init', 'wpzoom_register_fc_widget');
?>