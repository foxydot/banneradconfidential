<div class="title"><h2><?php _e('Related Posts','wpzoom');?></h2></div><!-- end .title -->
<ul class="posts postsRelated">

	<?php $category = get_the_category();
	
	$exclude = get_option( 'sticky_posts' );
	$exclude[] = $post->ID;
	
	$loop = new WP_Query( 
		array( 
			'post__not_in' => $exclude,
			'posts_per_page' => 3,
			'cat' => $category[0]->term_id
			) );
	
	$m = 0;
	
	while ( $loop->have_posts() ) : $loop->the_post(); $m++;
	unset($cropLocation, $image,$prev);
	$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
	?>

	<li id="post-<?php the_ID(); ?>">
		<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title_attribute(); ?></a></h3>
		<time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time("j F Y"); ?></time>
	</li><!-- end #post-<?php the_ID(); ?> -->
	
	<?php endwhile; ?>
	
</ul><!-- end .posts -->
	
<?php wp_reset_query(); ?>