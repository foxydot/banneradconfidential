jQuery('#carousel1').elastislide({
	imageW 		: 142,
	border		: 0,
	margin		: 30,
	onClick : function( $item ) {
window.location.replace( $item.a.attr("href") )
} // click item callback
});
