<?php $type_slider_mag = get_option('themnific_type_slider_mag'); ?>
<?php if($type_slider_mag == 'flexslider'){
	get_template_part('/includes/sliders/flexslider' );
	}elseif($type_slider_mag == 'coin'){
	get_template_part('/includes/sliders/coin' );
	} else {
	get_template_part('/includes/sliders/coin' );
}?>