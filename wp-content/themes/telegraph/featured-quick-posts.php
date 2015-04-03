<?php

if (option::get('promoted_wide_category') != 0) {

$cat = get_category(option::get('promoted_wide_category'),false);
$catlink = get_category_link(option::get('promoted_wide_category'));
          
$loop = new WP_Query( 
array( 
	'post__not_in' => get_option( 'sticky_posts' ),
	'posts_per_page' => option::get('promoted_wide_number'),
	'cat' => option::get('promoted_wide_category')
) );

?>

<div id="smallPosts" class="box">
  
	<div class="title <?php echo strtolower(option::get('promoted_wide_category_color')); ?>">
		<h2><a href="<?php echo"$catlink";?>"><?php echo"$cat->name";?></a></h2>
	</div><!-- end .title -->
	
	<ul class="posts">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); $i++;    
		unset($posttype, $image,$cropLocation);
		
		$posttype = get_post_meta($post->ID, 'wpzoom_post_type', true);
		$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
		?>
		<li id="post-<?php the_ID(); ?>"<?php if (($i % 6) == 0) {echo ' class="last"';} ?>>
			
			<?php
			$image = ui::getImage('145', '100',$cropLocation); 
			
			if ($image) { ?>
				<div class="cover">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" width="145" height="100" alt="<?php the_title_attribute(); ?>" /></a>
					<p class="datetime"><?php the_time("M j G:i"); ?></p><?php if ($posttype != 'Default (no icon)' && $posttype) { echo'<span class="'.strtolower($posttype).'">&nbsp;</span>'; } ?>
				</div>
			<?php } ?>
			
			<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<?php if (!$image) { ?>
			<time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time("j F Y"); ?></time>
			<?php } // if there is no thumb ?>
			<div class="cleaner">&nbsp;</div>
		</li><!-- end #post-<?php the_ID(); ?> -->
		<?php endwhile; //  ?>
	</ul>
	<div class="cleaner">&nbsp;</div>
</div>

<?php wp_reset_query(); ?>
<?php } else { ?>

<div id="smallPosts" class="box">

	<div class="title dark">
		<h2><?php _e('No category selected','wpzoom');?></h2>
	</div><!-- end .title -->
	<p class="install-notice">Please go to: <strong>Dashboard > WPZOOM Theme Options > Homepage > Promoted Wide Category</strong> and select a category show in this place.</p>
	
	<div class="cleaner">&nbsp;</div>
</div><!-- end #quickPosts -->

<?php } ?>