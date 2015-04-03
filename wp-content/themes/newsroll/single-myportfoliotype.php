<?php get_header(); ?>
<div class="container-topfix">
<div class="fullbox" style="padding-bottom:20px">
	<div class="row">
		<div class="post twelvecol">
        		<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php the_post(); ?>
		       <?php
				$file = get_post_meta($post->ID, 'pov_file', true);
				$title = get_post_meta($post->ID, 'pov_title', true);
				$url = get_post_meta($post->ID, 'pov_url', true);
				$size = get_post_meta($post->ID, 'pov_size', true);
		      ?>
			<?php the_content(); ?>
       	</div>
	</div>
   	<div style="clear: both;"></div>
</div>
</div>
<?php get_footer(); ?>