<?php
if ( function_exists('has_nav_menu') && has_nav_menu('top-menu') ) {
	wp_nav_menu( array( 'depth' => 2, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_class' => 'secmenu', 'menu_id' => '' , 'theme_location' => 'top-menu' ) );
} else {
?>
    <ul class="secmenu">
        <?php 
                wp_list_pages('sort_column=menu_order&depth=2&title_li=&exclude='.get_option('themnific_nav_exclude')); 
        ?>
    </ul><!-- /#nav -->
<?php } ?>

	  