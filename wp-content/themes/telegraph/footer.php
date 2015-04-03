			<div id="footer" class="box">
			  
				<div class="title"><h2><a href="#header" rel="nofollow"><?php _e('Return to top of page', 'wpzoom') ?></a></h2></div><!-- end .title -->
				      
				<p class="wpzoom"><a href="http://www.wpzoom.com" target="_blank" title="Magazine WordPress Theme"><img src="<?php bloginfo('template_directory'); ?>/images/wpzoom.png" alt="Magazine WordPress Themes" /></a> <a href="http://www.wpzoom.com" target="_blank"><?php _e('Magazine WordPress Theme', 'wpzoom'); ?></a> by</p>
				<p class="copy"><?php _e('Copyright', 'wpzoom'); ?> &copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'wpzoom'); ?>.</p>
			  
			</div><!-- end #footer -->
		
		</div><!-- end #frame -->
	</div><!-- end .wrapper -->
    
</div><!-- end #container -->

<?php wp_footer(); ?>

<?php if (is_single()) { ?>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<?php } ?>

<?php if (option::get('twitter_enable') == 'on' && is_home() && $paged < 2) { ?>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo option::get('twitter_account'); ?>.json?callback=twitterCallback2&count=1"></script>
<?php } ?>

</body>
</html>
