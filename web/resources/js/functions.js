	
	function login(){
		console.log('Logging in...');

		$.post('/resources/ajax/login.php', $("#login").serialize(), function(data){
			console.log(data);
			var arrLogin = jQuery.parseJSON(data);
			$("#login_results").html(arrLogin['message']);

			if(arrLogin['success'] == 1){
				$("#login").slideUp();
				setTimeout(function(){
					window.location.href = "/";
				}, 2000);
			}
		});

	}