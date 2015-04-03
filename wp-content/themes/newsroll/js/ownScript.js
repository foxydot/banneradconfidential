jQuery(document).ready(function(){

	// hide .scrollTo_top first
		jQuery(".scrollTo_top").hide();
	// fade in .scrollTo_top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.scrollTo_top').fadeIn();
			} else {
				jQuery('.scrollTo_top').fadeOut();
			}
		});

		// scroll body to 0px on click
	jQuery('.scrollTo_top a').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 500 );
		return false;
	});
	});
	
	

/* slider image hover effect */	
jQuery('#tabsmall li img').animate({opacity: 0.4}, "slow");
	jQuery('#tabsmall li img').hover(function() {
		jQuery(this).animate({opacity: 1}, "slow");
		}, function() {
	jQuery(this).animate({opacity: 0.4}, "slow");
});


/* slider image hover effect */	
jQuery('#tabsmallss li img').animate({opacity: 0.6}, "slow");
	jQuery('#tabsmallss li img').hover(function() {
		jQuery(this).animate({opacity: 1}, "slow");
		}, function() {
	jQuery(this).animate({opacity: 0.6}, "slow");
});


/* end line posts hover */

jQuery('.item_full img,.item_full2 img,.es-carousel ul li img').hover(function() {
	jQuery(this).animate({opacity: 0.1}, "normal");
	}, function() {
	jQuery(this).animate({opacity: 1}, "normal");
	}); 


jQuery('.item-big img,.twins img').hover(function() {
	jQuery(this).animate({opacity: 0.7}, "normal");
	}, function() {
	jQuery(this).animate({opacity: 1}, "normal");
	}); 

jQuery('.twins-small img,.fblock img,.tab-post img').hover(function() {
	jQuery(this).animate({opacity: 1}, "normal");
	}, function() {
	jQuery(this).animate({opacity: .85}, "normal");
	});

jQuery('.item_plain').hoverIntent(function() {
	jQuery(this).css({});
	jQuery(this).find('.folioinfo')
		.animate({
			opacity: '1',	
		}, 400); 
	jQuery(this).find('img')
		.animate({
			opacity: '0.6', 	
		}, 400); 

	} , function() {
	jQuery(this).css({}); 
	jQuery(this).find('.folioinfo')
		.animate({
			opacity: '0',
		}, 800);
	jQuery(this).find('img')
		.animate({
			opacity: '1', 	
		}, 400); 
});





	/* Tooltips */
		jQuery("body").prepend('<div class="tooltip body2"><p></p></div>');
		var tt = jQuery("div.tooltip");
		
		jQuery(".flickr_badge_image a img,.audio-ico,.video-ico,.gallery-ico").hover(function() {								
			var btn = jQuery(this);
			
			tt.children("p").text(btn.attr("title"));								
						
			var t = Math.floor(tt.outerWidth(true)/2),
				b = Math.floor(btn.outerWidth(true)/2),							
				y = btn.offset().top - 40,
				x = btn.offset().left - (t-b);
						
			tt.css({"top" : y+"px", "left" : x+"px", "display" : "block"});			
			   
		}, function() {		
			tt.hide();			
		});


	/* Resize too large images */
	var size = 613;
	var image = jQuery('.entry img');
	
	for (i=0; i<image.length; i++) {
		var bigWidth = image[i].width;
		var bigHeight = image[i].height;
	
		if (bigWidth > size) {	
			var newHeight = bigHeight*size/bigWidth;
			image[i].width = size;
			image[i].height = newHeight;
		}
	}




});





