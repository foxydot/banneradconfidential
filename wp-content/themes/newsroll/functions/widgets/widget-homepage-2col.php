<?php
add_action('widgets_init', 'tmnf_homepage_2col_load_widgets');

function tmnf_homepage_2col_load_widgets()
{
	register_widget('tmnf_Homepage_2col_Widget');
}

class tmnf_Homepage_2col_Widget extends WP_Widget {
	
	function tmnf_Homepage_2col_Widget()
	{
		$widget_ops = array('classname' => 'tmnf_homepage_2col', 'description' => 'Homepage 2 Categories widget.');

		$control_ops = array('id_base' => 'tmnf_homepage_2col-widget');

		$this->WP_Widget('tmnf_homepage_2col-widget', 'Themnific - Homepage Posts 2', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$images = true;

		$title_2 = $instance['title_2'];
		$post_type_2 = 'all';
		$categories_2 = $instance['categories_2'];
		$posts_2 = $instance['posts_2'];
		$images_2 = true;
		
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

		<div class="twinsbox" style="margin-bottom:10px;">

		
		<div class="twins2col">
			<h4 class="homepage"><a href="<?php echo get_category_link($categories); ?>"><span class="inn"><?php echo $title; ?> &raquo;</span></a></h4>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
			<?php $counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
			<?php
			if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
				$icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
			} else {
				$icon = '';
			}
			?>
			<?php if($counter == 1): ?>
			<div class="item-big">
            <?php echo $icon; ?>
            
				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'widget-big-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>
                
				<p class="meta sserif"><?php the_time('F j, Y'); ?>, <?php comments_popup_link(); ?></p>
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 10); ?></a></h2>
				<p class="excerpt"><?php echo pov_excerpt( get_the_excerpt(), '150'); ?></p>
			</div>
			<?php else: ?>
			<div class="twins-small halfs">
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
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type_2 == 'all') {
			$post_type_2_array = $post_types;
		} else {
			$post_type_2_array = $post_type;
		}
		?>
		
		<div class="twins2col last">
			<h4 class="homepage"><a href="<?php echo get_category_link($categories_2); ?>"><span class="inn"><?php echo $title_2; ?> &raquo;</span></a></h4>

			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts_2,
				'cat' => $categories_2,
			));
			?>			
			<?php $counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
			<?php
			if(has_post_format('video') || has_post_format('audio') || has_post_format('gallery')) {
				$icon = '<span title="'. get_post_format($post->ID) .' post" class="' . get_post_format($post->ID) . '-ico"></span>';
			} else {
				$icon = '';
			}
			?>
			<?php if($counter == 1): ?>
			<div class="item-big">
            <?php echo $icon; ?>

				<?php if ( has_post_thumbnail()) : ?>
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     <?php the_post_thumbnail( 'widget-big-thumb',array('title' => "")); ?>
                     </a>
                <?php endif; ?>
                
				<p class="meta sserif"><?php the_time('F j, Y'); ?>, <?php comments_popup_link(); ?></p>
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 10); ?></a></h2>
				<p class="excerpt"><?php echo pov_excerpt( get_the_excerpt(), '150'); ?></p>
			</div>
			<?php else: ?>
			<div class="twins-small halfs">
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
		
		$instance['title_2'] = $new_instance['title_2'];
		$instance['post_type_2'] = 'all';
		$instance['categories_2'] = $new_instance['categories_2'];
		$instance['posts_2'] = $new_instance['posts_2'];
		$instance['show_images_2'] = true;
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('show_excerpt' => null, 'title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 4, 'title_2' => 'Recent Posts', 'post_type_2' => 'all', 'categories_2' => 'all', 'posts_2' => 4);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		
		<h3>Column One</h3>
		
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
		
		<h3 style='margin-top: 40px;'>Column Two</h3>
		
		<p>
			<label for="<?php echo $this->get_field_id('title_2'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" value="<?php echo $instance['title_2']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories_2'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories_2'); ?>" name="<?php echo $this->get_field_name('categories_2'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories_2']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories_2']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_2'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts_2'); ?>" name="<?php echo $this->get_field_name('posts_2'); ?>" value="<?php echo $instance['posts_2']; ?>" />
		</p>
	<?php }
}
?>