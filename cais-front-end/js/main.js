$(document).ready(function(){
	
	var iframe = document.getElementById('video');
	
	// $f == Froogaloop
	var player = $f(iframe);	

$('#overlay').click(function() {
	$('.play-button').fadeOut('fast',function(){
	$('#overlay').fadeOut('fast');
	player.api("play");
	});
});
});