<?php
$loop = new WP_Query( 
array( 
	'post__not_in' => get_option( 'sticky_posts' ),
	'posts_per_page' => option::get('featured_number'),
	'meta_key' => 'wpzoom_is_featured',
	'meta_value' => 1				
) );
?>

<div id="featPosts" class="box">

	<div class="title <?php echo strtolower(option::get('featured_posts_color')); ?>">
		<h2><?php _e('Featured Posts','wpzoom');?></h2>
	</div><!-- end .title -->

		<?php 
		$i = 0;
		if ( $loop->have_posts() ) : ?>

		<ul class="posts jcarousel-skin-wpzoom" id="jCarousel">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); $i++;    
			unset($posttype, $image,$cropLocation);
			$posttype = get_post_meta($post->ID, 'wpzoom_post_type', true);
			$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
			?>
			<li id="post-<?php the_ID(); ?>">

				<?php
				$image = ui::getImage('280', '160',$cropLocation); 
				
				if ($image) { ?>
					<div class="cover">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" /></a>
						<p class="datetime"><?php the_time("M j, Y G:i"); ?></p><?php if ($posttype != 'Default (no icon)' && $posttype) { echo'<span class="'.strtolower($posttype).'">&nbsp;</span>'; } ?>
					</div>
				<?php } ?>

				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<div class="cleaner">&nbsp;</div>
			</li><!-- end #post-<?php the_ID(); ?> -->
			<?php endwhile; //  ?>

		</ul>
	
	<?php else : ?>
	  
	<p class="title"><?php _e('There are no posts in this category', 'wpzoom');?></p>
	  
	<?php endif; ?>
	<div class="cleaner">&nbsp;</div>
</div><!-- end #featPosts -->

<?php wp_reset_query(); ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#jCarousel').jcarousel({
		<?php if (option::get('featured_posts_autoplay') > 0) { ?>auto: <?php echo option::get('featured_posts_autoplay') . ','; } ?>
		scroll: 1,
		visible: 2,
		wrap: 'circular'
	});
});
</script>