<?php get_header(); ?>
  	<div class="singlepost container" style="padding-top:0 !important; margin-top:0;">
        <div class="row">

			<h3><?php _e('Nothing found here','themnific');?></h3>
            
           	<h4><?php _e('Perhaps You will find something interesting form these lists...','themnific');?></h4>
            
            <div class="hrlineB"></div>


            

            <div class="threecol first">

                <h3><?php _e('Pages','themnific');?></h3>

                <ul><?php wp_list_pages("title_li="); ?></ul>

            </div>
            
          	<div class="threecol">
            
               	<h3><?php _e('Categories','themnific');?></h3>
                
				<ul><?php wp_list_categories("title_li="); ?></ul>
                
            </div>            

            <div class="sixcol">

                <h3><?php _e('All Blog Posts','themnific');?>:</h3>

                <ul style="list-style:decimal inside"><?php $archive_query = new WP_Query('showposts=1000');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                    <li style="margin-bottom:10px">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?>

                        </a>
                    </li>

                    <?php endwhile; ?>
                </ul>

            </div>
            



    </div>

</div>
<?php get_footer(); ?>
