<?php
/*---------------------------------------------------------------------------------*/
/* Featured_Slider Widget */
/*---------------------------------------------------------------------------------*/
add_action( 'widgets_init', '_featured_slider_widgets' );

/*
 * Register widget.
 */
function _featured_slider_widgets() {
	register_widget( 'Featured_Slider_Widget' );
}

/*
 * Widget class.
 */
class featured_slider_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */

	function Featured_Slider_Widget() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'featured_slider-post-widget', 'description' => __('A widget that slides your posts (in content area).', '') );

		
		/* Create the widget. */
		$this->WP_Widget( 'featured_slider_widget', __('Themnific - Homepage Posts 4 - Slider', ''), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */

	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		echo $before_widget;
		?>
		
		<?php
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>
        
        	<div id="carousel1" class="es-carousel-wrapper">
			<h4 class="homepage"><a href="<?php echo get_category_link($categories); ?>"><span class="inn"><?php echo $title; ?> &raquo;</span></a></h4>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>	
                <div class="es-carousel">

            <ul>
			<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>

			<li>		<?php
			if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
				$icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
			} else {
				$icon = '';
			}
			?>
            <?php echo $icon; ?>
				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'widget-slider-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>
                    <h2><?php echo short_title('...', 6); ?></h2>
			</li>

			<?php  endwhile; ?>
			</ul>
          	</div>
		</div>
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['post_type'] = 'all';
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 4, 'show_excerpt' => null);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		

	<?php }
}
?>