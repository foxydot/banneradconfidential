<?php get_header(); ?>

<div id="main">

	<h3 class="catname"><?php _e('Search Results for:', 'wpzoom'); ?> <strong>"<?php the_search_query(); ?>"</strong></h3>

	<?php if ( have_posts() ) :

		$post = $posts[0]; // Hack. Set $post so that the_date() works.

		while ( have_posts() ) :

			the_post();

			?><div class="archiveposts">
				<?php if ( $img = ui::getImage('70', '65') ) printf( '<a href="%1$s" rel="bookmark" title="%2$s"><img src="%3$s" alt="%2$s" /></a>', get_permalink(), the_title_attribute('echo=0'), $img ); ?>
				<span class="date"><?php the_date(); ?> <?php the_time(); ?></span>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div> <!-- /.archive --><?php

		endwhile;

		get_template_part('pagination');

	else :

		?><div class="archive">
			<div class="entry">
				<h2><?php _e('No results', 'wpzoom'); ?></h2>
				<?php get_template_part('searchform'); ?>
			</div>
		</div><?php

	endif; ?>

</div> <!-- /#main -->
<?php get_sidebar(); ?>

<?php
wp_reset_query();

get_footer();
?>