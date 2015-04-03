<?php
add_action('widgets_init', 'tmnf_featured_widget2');

function tmnf_featured_widget2()
{
	register_widget('tmnf_featured_widget2');
}

class tmnf_featured_widget2 extends WP_Widget {
	
	function tmnf_featured_widget2()
	{
		$widget_ops = array('classname' => 'tmnf_featured_widget2', 'description' => 'Sidebar posts widget.');

		$control_ops = array('id_base' => 'tmnf_featured_widget2');

		$this->WP_Widget('tmnf_featured_widget2', 'Themnific - Featured', $widget_ops, $control_ops);
	}
	
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
		
		<div class="twinsbox">
			<h4 class="homepage"><a href="<?php echo get_category_link($categories); ?>"><span class="inn"><?php echo $title; ?></span></a></h4>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
            <ul>
			<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>

			<li class="fblock">
                    <p class="meta sserif"><?php the_time('F j, Y'); ?>, <?php comments_popup_link(); ?></p>
                    <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    
						<?php if ( has_post_thumbnail()) : ?>
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             <?php the_post_thumbnail( 'widget-thumb',array('title' => "")); ?>
                             </a>
                        <?php endif; ?>
                        
                    <p><?php echo pov_excerpt( get_the_excerpt(), '350'); ?></p>
			</li>

			<?php  endwhile; ?>
			</ul>

        
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