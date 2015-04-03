<?php
add_action('widgets_init', 'tmnf_homepage_1col_load_widgets');

function tmnf_homepage_1col_load_widgets()
{
	register_widget('tmnf_Homepage_1col_Widget');
}

class tmnf_Homepage_1col_Widget extends WP_Widget {
	
	function tmnf_Homepage_1col_Widget()
	{
		$widget_ops = array('classname' => 'tmnf_homepage_1col', 'description' => 'Homepage 1 Category widget.');

		$control_ops = array('id_base' => 'tmnf_homepage_1col-widget');

		$this->WP_Widget('tmnf_homepage_1col-widget', 'Themnific - Homepage Posts 1', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$images = true;
		$rating = true;
		$show_excerpt = isset($instance['show_excerpt']) ? 'true' : 'false';
		
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
			
			<h4 class="homepage"><a href="<?php echo get_category_link($categories); ?>"><span class="inn"><?php echo $title; ?> &raquo;</span></a></h4>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
			<?php
			$big_count = round($posts / 5);
			if(!$big_count) { $big_count = 1; }
			?>
			<?php $counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
			<?php
			if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
				$icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
			} else {
				$icon = '';
			}
			?>
			<?php if($counter <= $big_count): ?>
			<?php if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; }?>
			<div class="twins">
			<?php echo $icon; ?>

				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'widget-big-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>
                
				<p class="meta sserif"><?php the_time('F j, Y'); ?>, <?php comments_popup_link(); ?></p>
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 15); ?></a></h2>
				<?php if($show_excerpt == 'true'): ?><p class="excerpt"><?php echo pov_excerpt( get_the_excerpt(), '235'); ?></p><?php endif; ?>
			</div><!-- end big post -->
			<?php else: ?>

			<div class="twins-small <?php echo $last; ?> last">
            <?php echo $icon; ?>
            
				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'widget-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>
                        
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 10); ?></a></h2>
				<p class="meta sserif"><?php the_time('F j, Y'); ?>, <?php comments_popup_link(); ?></p>
			</div>
			<?php endif; ?>
			<?php $counter++; endwhile; ?>

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
		$instance['show_images'] = true;
		$instance['show_rating'] = true;
		$instance['show_excerpt'] = $new_instance['show_excerpt'];
		
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
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_excerpt'], 'on'); ?> id="<?php echo $this->get_field_id('show_excerpt'); ?>" name="<?php echo $this->get_field_name('show_excerpt'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_excerpt'); ?>">Show excerpt</label>
		</p>
	<?php }
}
?>