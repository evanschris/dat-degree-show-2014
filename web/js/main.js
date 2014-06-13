$(document).ready(function(){
	
	var iframe = document.getElementById('video');
	
	// $f == Froogaloop
	var player = $f(iframe);
	
if($(".vimeo-container").length > 0)
{
	
}
});


$('#overlay').click(function() {
	$(this).fadeOut();
	player.api("play");
});