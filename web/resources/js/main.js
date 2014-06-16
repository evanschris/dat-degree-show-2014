$(document).ready(function(){
	
	var iframe = document.getElementById('video');
	
	// $f == Froogaloop
	var player = $f(iframe);
	
if($(".vimeo-container").length > 0)
{
	
}


if($("#login").length > 0){
	$("#login").submit(function(){
		login();
		return false;
	});
}

});


$('#overlay').click(function() {
	$(this).fadeOut();
	player.api("play");
});