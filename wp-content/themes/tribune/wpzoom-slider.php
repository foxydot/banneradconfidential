<div id="departments">

	<h4><?php echo option::get('slider_head'); ?></h4>

	<div class="items-out">

		<ul class="items">

			<?php
			wp_reset_query();

			$cats = '';
			if ( option::get('slider_cats') != 'off' ) {
				if ( count(option::get('slider_cats')) ) {
					$cats = is_array(option::get('slider_cats')) ? implode(",", option::get('slider_cats')) : option::get('slider_cats');
				}
			}
			query_posts("&cat=$cats&showposts=" . option::get('slider_num_posts'));

			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();

					?><li class="item">

 						<?php get_the_image( array( 'size' => 'carousel',  'width' => 180, 'height' => 120 ) );  ?>

						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

					</li><?php

				}

			}
			?>

		</ul>

	</div>

	<div class="nav">
		<a href="#" class="prev">&larr; <?php _e('previous', 'wpzoom'); ?></a>
		<a href="#" class="next"><?php _e('next', 'wpzoom'); ?> &rarr;</a>
	</div>

</div>