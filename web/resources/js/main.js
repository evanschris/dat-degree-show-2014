
$(".project-image").hover(function() {
	var pLeft = $(".sequence").position();
	pLeft = pLeft.left;
	var frames = $(".sequence").data("frames");
	var total = frames * 216
	for (var i = 0; i < total; i++) {
		$(".sequence").css( "left", (pLeft - 216) );
	}
});

$(document).ready(function(){

	if($("#login").length > 0){

		$("#login").submit(function(){

			login();
			return false;
		});

	}

});
