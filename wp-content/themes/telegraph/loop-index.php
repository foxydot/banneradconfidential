<?php wp_reset_query(); $m = 0; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // gets current page number

global $query_string; // required

/* Exclude categories from Recent Posts */
if (option::get('recent_part_exclude') != 'off') {
	if (count(option::get('recent_part_exclude'))){
		$exclude_cats = implode(",-",option::get('recent_part_exclude'));
		$exclude_cats = '-' . $exclude_cats;
		$args['cat'] = $exclude_cats;
	}
}

/* Exclude featured posts from Recent Posts */
if (option::get('hide_featured') == 'on') {
	
	$featured_posts = new WP_Query( 
		array( 
			'post__not_in' => get_option( 'sticky_posts' ),
			'posts_per_page' => option::get('featured_number'),
			'meta_key' => 'wpzoom_is_featured',
			'meta_value' => 1				
			) );
		
	while ($featured_posts->have_posts()) {
		$featured_posts->the_post();
		global $post;
		$postIDs[] = $post->ID;
	}
	$args['post__not_in'] = $postIDs;
}

$args['paged'] = $paged;
if (count($args) >= 1) {
	query_posts($args);
}
?>

<div class="box archive">

	<?php if (is_category()) { ?>
	
	<div class="title <?php echo strtolower(option::get('recent_posts_color')); ?>">
		<?php $cat_ID = get_query_var('cat'); ?>
		<?php echo '<h2>'; wpzoom_breadcrumbs(); echo'</h2>'; ?>
	</div><!-- end .title -->
	
	<?php }	elseif (!is_category() && !is_home()) { ?>
	
	<div class="title <?php echo strtolower(option::get('recent_posts_color')); ?>">
		<?php echo '<h2>'; wpzoom_breadcrumbs(); echo'</h2>'; ?>
	</div><!-- end .title -->
	            
	<?php }	else { ?>
	<div class="title <?php echo strtolower(option::get('recent_posts_color')); ?>"><h2><?php _e('Recent Posts','wpzoom');?></h2></div><!-- end .title -->
	<?php } ?>
	
	<?php if (have_posts()) : $i = 0; ?>

	<ul class="posts">
		<?php    
		while (have_posts()) : the_post(); $i++;

		unset($posttype, $image,$cropLocation);
		$posttype = get_post_meta($post->ID, 'wpzoom_post_type', true);
		$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
		?>

		<li id="post-<?php the_ID(); ?>"<?php if (($i % 2) == 0) {echo ' class="last"';} ?>>
			
			<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			
			<?php
			$image = ui::getImage('100', '80',$cropLocation); 
			
			if ($image) { ?>
				<div class="cover">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" width="100" height="80" alt="<?php the_title_attribute(); ?>" /></a>
					<?php if (option::get('display_date') == 'on') { ?><p class="datetime"><?php the_time("M j, Y G:i"); ?></p><?php if ($posttype != 'Default (no icon)' && $posttype) { echo'<span class="'.strtolower($posttype).'">&nbsp;</span>'; } ?><?php } ?>
				</div>
			<?php } ?>

			<p><?php the_content_limit(120);?></p>
			<?php if (!$image) { ?><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time("j F Y"); ?></time><?php } ?>
			<div class="cleaner">&nbsp;</div>

		</li><!-- end #post-<?php the_ID(); ?> -->

		<?php endwhile; //  ?>

	</ul><!-- end .posts -->

	<div class="cleaner">&nbsp;</div>
	
	<?php get_template_part( 'pagination'); ?>
	
	<?php else : ?>
	  
	<p class="title"><?php _e('There are no posts in this category', 'wpzoom');?></p>
	  
	<?php endif; ?>

	<div class="cleaner">&nbsp;</div>
</div><!-- end .box .archive -->

<div class="cleaner">&nbsp;</div>