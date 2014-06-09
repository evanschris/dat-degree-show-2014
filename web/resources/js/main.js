$(".project-image").hover(function() {
	var pLeft = $(".sequence").position();
	pLeft = pLeft.left;
	var frames = $(".sequence").data("frames");
	var total = frames * 216
	
	$(".sequence").css( "left", (pLeft - 216) );
});