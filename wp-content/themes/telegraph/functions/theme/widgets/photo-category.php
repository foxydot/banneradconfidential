<?php

wp_register_script('looped_slider', get_bloginfo('template_directory') . '/js/loopedslider.min.js');
wp_register_script('tabber-minimized', get_bloginfo('template_directory') . '/js/tabber-minimized.js');

function check_widget() {
    if( is_active_widget(false, false, 'wpzoom-widget-photo-category', true ) ) { // check if photo category widget is used
       // enqueue the script
       wp_enqueue_script('looped_slider');
    }

     if( is_active_widget(false, false, 'tabbed-widget', true ) ) {
       // enqueue the script
       wp_enqueue_script('tabber-minimized');
    }
}
add_action( 'init', 'check_widget' );

/*------------------------------------------*/
/* WPZOOM: Photo Category		*/
/*------------------------------------------*/

class wpzoom_widget_photo_category extends WP_Widget {

	/* Widget setup. */
	function wpzoom_widget_photo_category() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'wpzoom', 'description' => __('Custom WPZOOM widget. Displays posts from a category in a slideshow. Insert only into Sidebar sidebar.', 'wpzoom') );
		
		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'wpzoom-widget-photo-category' );
		
		/* Create the widget. */
		$this->WP_Widget( 'wpzoom-widget-photo-category', __('WPZOOM: Photo Category', 'wpzoom'), $widget_ops, $control_ops );
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
		
		echo $before_widget;

		?>

			<div class="title <?php echo $instance['color']; ?>">
				<h2><a href="<?php echo"$category_link";?>"><?php echo"$category->name";?></a></h2>
			</div><!-- end .title -->

			<div class="featPhotos">
			          
				<div class="postsBig">
					<div class="container">
			
					<?php 
					$i = 0;
					
					$loop = new WP_Query( array( 'posts_per_page' => $instance['posts'], 'orderby' => 'date', 'order' => 'DESC', 'cat' => $category->cat_ID ) );
					?>
		
					<?php if ( $loop->have_posts() ) : ?>

		            <ul class="posts slides">
	
					<?php    
					$x = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); global $post;
	
					unset($image, $prev, $videocode);		
				
					$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
					$image = ui::getImage('300', '200',$cropLocation);
	
					?>
	
					<li class="slide" id="post-<?php the_ID(); ?>">
					
						<?php if ($image) { ?>
						<div class="cover">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" width="300" height="200" alt="<?php the_title_attribute(); ?>" /></a>
							<p class="datetime"><?php the_time("M j, Y G:i"); ?></p>
						</div>
						<?php } ?>
						<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="cleaner">&nbsp;</div>
	
					</li><!-- end .slide, #post-<?php the_ID(); ?> -->
					<?php endwhile; //  ?>
				
					</ul>
					<?php else : ?>
					
					<ul class="posts"><li><h3><?php _e('There are no posts in this category', 'wpzoom'); ?></h3></li></ul>
					  
					<?php endif; ?>
              
					<div class="cleaner">&nbsp;</div>
	
					</div><!-- end .container -->
				</div><!-- end #postsBig -->

				<div class="postsSmall">
				
					<?php 
					rewind_posts($loop);
					if ( $loop->have_posts() ) : ?>

					<ul class="pagination">

						<?php while ( $loop->have_posts() ) : $loop->the_post(); global $post; ?>
	
						<li id="post-<?php the_ID(); ?>">
							<a href="#" rel="nofollow"><img src="<?php bloginfo('template_url'); ?>/images/x.gif" width="16" height="16" alt="" /></a>
						</li><!-- end .slide, #post-<?php the_ID(); ?> -->

						<?php endwhile; ?>

					<div class="cleaner">&nbsp;</div>

					</ul><!-- end .pagination --><?php endif; ?>

					<div class="cleaner">&nbsp;</div>
	
				</div><!-- end #postsSmall -->
				
				<div class="cleaner">&nbsp;</div>
			
			</div><!-- end #featPhotos -->

		<?php echo $after_widget; ?> 

		<script type="text/javascript" charset="utf-8">
		jQuery(document).ready(
		function($)
		{
			$('.featPhotos').loopedSlider({
				autoStart: 5000,
				autoHeight: true,
				hoverPause: true,
				containerClick: false,
				slidespeed: 350,
				fadespeed: 0
			});
		});
		</script>

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

function wpzoom_register_pc_widget() {
	register_widget('wpzoom_widget_photo_category');
}
add_action('widgets_init', 'wpzoom_register_pc_widget');
?>