$(document).ready(function(){
	
	var iframe = document.getElementById('video');
	
	// $f == Froogaloop
	var player = $f(iframe);	

$('#overlay').click(function() {
	$(this).fadeOut();
	player.api("play");
});
});