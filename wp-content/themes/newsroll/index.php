<?php get_header(); ?>


<div class="container" style="padding:0;">
<div class="row" style="overflow:visible;">


	<div id="content" class="eightcol first">
    
        <?php if (get_option('themnific_slider_dis') <> "true") { ?>

              	<?php get_template_part('/includes/mag-sliders');?>

        <?php } ?>



		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage") ) : ?>
        <h4>To set magazine homepage go to Dashboard > Apperance > Widgets<br/>and use cusom widgets with "Themnific - Homepage" prefix</h4>
        <?php endif; ?>




	</div><!-- end #content -->











	<div id="sidebar" class="fourcol">
        		<?php get_sidebar(); ?>
	</div><!-- end #sidebar -->




 <div style="clear: both;"></div> 
</div><!-- end main row -->
</div><!-- end main container-->

 <div style="clear: both;"></div> 

<?php get_footer(); ?>