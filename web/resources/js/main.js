$(document).ready(function(){

	if($("#login").length > 0){

		$("#login").submit(function(){

			login();
			return false;
		});

	}

});
